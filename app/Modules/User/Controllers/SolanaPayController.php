<?php

namespace App\Modules\User\Controllers;

use App\Controllers\UserController;
use App\Filters\FeatureFlagFilter;
use App\Libraries\SolanaPay\Fulfillers;
use App\Libraries\SolanaPay\SolanaPayFactory;
use App\Libraries\SolanaPay\SolanaPayService;
use App\Models\ProjectsModel;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use CodeIgniter\HTTP\ResponseInterface;
use Config\SolanaPay as SolanaPayConfig;

/**
 * Pay for MyMI products with USDC on Solana (Solana Pay). Prices are always
 * set here from MyMI's own config, never taken from the browser as a price.
 */
class SolanaPayController extends UserController
{
    private ?SolanaPayService $svc = null;

    private function service(): ?SolanaPayService
    {
        return $this->svc ??= SolanaPayFactory::make();
    }

    private function userId(): int
    {
        return (int) ($this->cuID ?? 0);
    }

    /** @return list<string> purposes whose feature switch is on */
    private function openPurposes(): array
    {
        return array_keys(array_filter(SolanaPayConfig::PURPOSES, static fn (string $flag): bool => FeatureFlagFilter::enabled($flag)));
    }

    private function json(array $body, int $code = 200): ResponseInterface
    {
        return $this->response->setStatusCode($code)->setHeader('Cache-Control', 'no-store')->setJSON($body);
    }

    public function index()
    {
        if ($this->service() === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $plans = [];
        foreach (['Starter', 'Basic', 'Pro', 'Premium'] as $slug) {
            if (($p = config('MembershipPlans')->find($slug)) !== null) {
                $plans[] = $p;
            }
        }
        $this->data['pageTitle'] = 'Pay with Solana | MyMI Wallet';
        $this->data['solanaPay'] = [
            'purposes' => $this->openPurposes(),
            'plans'    => $plans,
            'goldUsd'  => Fulfillers::goldValue(),
            'fee'      => (int) (config('SolanaFees')->lamports['payment_processing'] ?? 0),
            'cluster'  => config(SolanaPayConfig::class)->cluster,
            'preset'   => [
                'purpose' => (string) $this->request->getGet('purpose'),
                'plan'    => (string) $this->request->getGet('plan'),
                'project' => (string) $this->request->getGet('project'),
                'lot'     => (string) $this->request->getGet('lot'),
                'gold_cents' => (string) $this->request->getGet('gold_cents'),
            ],
        ];
        return $this->renderTheme('App\Modules\User\Views\SolanaPay\index', $this->data);
    }

    public function checkout()
    {
        $svc = $this->service();
        if ($svc === null) {
            return $this->json(['ok' => false, 'error' => 'not_found'], 404);
        }
        if ($this->userId() <= 0) {
            return $this->json(['ok' => false, 'error' => 'sign_in_required'], 401);
        }
        $in = $this->request->getJSON(true);
        $in = is_array($in) ? $in : (array) $this->request->getPost();
        $purpose = is_string($in['purpose'] ?? null) ? $in['purpose'] : '';
        if (! in_array($purpose, $this->openPurposes(), true)) {
            return $this->json(['ok' => false, 'error' => 'not_available'], 422);
        }

        [$cents, $ref, $error] = $this->price($purpose, $in);
        if ($error !== null) {
            return $this->json(['ok' => false, 'error' => $error], 422);
        }
        $r = $svc->checkout($this->userId(), $purpose, $ref, $cents);
        if (! $r['ok']) {
            return $this->json($r, $r['error'] === 'recipient_usdc_account_missing' ? 503 : 422);
        }
        $r['qr'] = (new QRCode(new QROptions([
            'outputType' => QRCode::OUTPUT_MARKUP_SVG, 'imageBase64' => true, 'eccLevel' => QRCode::ECC_M, 'addQuietzone' => true,
        ])))->render($r['url']);
        return $this->json($r);
    }

    public function status($reference = '')
    {
        $svc = $this->service();
        if ($svc === null) {
            return $this->json(['ok' => false, 'error' => 'not_found'], 404);
        }
        $r = $svc->confirm((string) $reference, $this->userId());
        return $this->json($r, $r['status'] === 'not_found' ? 404 : 200);
    }

    /**
     * Server-side price in US cents and the order reference for each purpose.
     *
     * @return array{0: int, 1: string, 2: ?string} [cents, purposeRef, error]
     */
    private function price(string $purpose, array $in): array
    {
        $num = static fn ($v): ?float => is_numeric($v) ? (float) $v : null;
        switch ($purpose) {
            case 'mymigold':
                $usd = $num($in['amount_usd'] ?? null);
                if ($usd === null) {
                    return [0, '', 'amount_required'];
                }
                $wallet = (string) ($in['wallet_id'] ?? '');
                if ($wallet !== '' && (! ctype_digit($wallet) || db_connect()->table('bf_users_wallet')->select('id')
                    ->where('id', (int) $wallet)->where('user_id', $this->userId())->limit(1)->get()->getRowArray() === null)) {
                    return [0, '', 'wallet_not_yours'];
                }
                return [(int) round($usd * 100), $wallet, null];
            case 'membership':
                $plan = config('MembershipPlans')->find((string) ($in['plan'] ?? ''));
                return $plan === null ? [0, '', 'unknown_plan'] : [(int) round($plan['price'] * 100), $plan['slug'], null];
            case 'auction_topup':
                $gold = $num($in['gold_cents'] ?? null);
                if ($gold === null || $gold < 1) {
                    return [0, '', 'amount_required'];
                }
                $lot = (string) ($in['lot_id'] ?? '');
                return [(int) ceil($gold * Fulfillers::goldValue()), ctype_digit($lot) ? $lot : '', null];
            case 'fund_units':
                $usd = $num($in['investment_amount'] ?? null);
                $project = (int) ($in['project_id'] ?? 0);
                if ($usd === null || $project <= 0) {
                    return [0, '', 'amount_required'];
                }
                if ($usd < (float) config('MyMI')->fund_minimum_investment) {
                    return [0, '', 'below_minimum'];
                }
                if (! model(ProjectsModel::class)->isEligibleFundInvestor($project, $this->userId())) {
                    return [0, '', 'not_eligible'];
                }
                return [(int) round($usd * 100), (string) $project, null];
        }
        return [0, '', 'not_available'];
    }
}
