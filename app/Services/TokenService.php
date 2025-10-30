<?php
namespace App\Services;

use App\Contracts\TokenServiceInterface;
use App\DTO\SwapQuoteDTO;
use App\DTO\TokenDTO;
use App\Exceptions\TokenException;
use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\HTTP\Files\UploadedFile;
use Psr\Log\LoggerInterface;

/**
 * Handles token records for project assets.
 */
class TokenService implements TokenServiceInterface
{
    public function __construct(
        protected BaseConnection $db,
        protected CacheInterface $cache,
        protected LoggerInterface $logger
    ) {
    }

    /**
     * {@inheritDoc}
     * @throws TokenException
     */
    public function createOrAttachToken(array $spec, int $actorId, ?string $idempotencyKey = null): TokenDTO
    {
        throw new TokenException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws TokenException
     */
    public function updateToken(int $tokenId, array $patch, int $actorId, ?string $idempotencyKey = null): TokenDTO
    {
        throw new TokenException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws TokenException
     */
    public function getToken(int $tokenId): TokenDTO
    {
        throw new TokenException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws TokenException
     */
    public function findByChainAddress(string $chain, string $address): ?TokenDTO
    {
        throw new TokenException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws TokenException
     */
    public function logoUpload(int $tokenId, UploadedFile $file, int $actorId, ?string $idempotencyKey = null): TokenDTO
    {
        throw new TokenException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws TokenException
     */
    public function mint(string $chain, string $mint, string $dest, string $amount, array $opts, int $actorId, ?string $idempotencyKey = null): array
    {
        throw new TokenException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws TokenException
     */
    public function burn(string $chain, string $mint, string $amount, array $opts, int $actorId, ?string $idempotencyKey = null): array
    {
        throw new TokenException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws TokenException
     */
    public function airdrop(string $chain, string $mint, array $recipients, array $opts, int $actorId, ?string $idempotencyKey = null): array
    {
        throw new TokenException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws TokenException
     */
    public function quoteSwap(string $chain, array $params): SwapQuoteDTO
    {
        throw new TokenException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws TokenException
     */
    public function executeSwap(string $chain, array $execution, ?string $idempotencyKey = null): array
    {
        throw new TokenException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws TokenException
     */
    public function defineVesting(int $tokenId, array $schedules, int $actorId, ?string $idempotencyKey = null): array
    {
        throw new TokenException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws TokenException
     */
    public function vestingStatus(int $tokenId, array $filters = []): array
    {
        throw new TokenException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws TokenException
     */
    public function submitForListing(array $payload, int $actorId, ?string $idempotencyKey = null): array
    {
        throw new TokenException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * {@inheritDoc}
     * @throws TokenException
     */
    public function topPerformers(array $filters = [], int $limit = 50): array
    {
        throw new TokenException('Not implemented', 'NOT_IMPLEMENTED');
    }

    /**
     * Create a token entry.
     */
    public function createToken(int $projectId, array $data): bool
    {
        $this->logger->debug('TokenService::createToken start', ['projectId' => $projectId]);
        $data['project_id'] = $projectId;
        $valid = service('validation')->setRules(config('Validation')->token)->run($data);
        if (! $valid) {
            $this->logger->error('TokenService validation failed', service('validation')->getErrors());
            return false;
        }
        return $this->db->table('asset_tokens')->insert($data);
    }

    public function createForProject(int $projectId, string $symbol, int $totalSupply, array $config): int
    {
        $pm = model('ProjectsModel');

        // 1) Insert/Update bf_project_tokens (pre-listing record)
        $tokenId = $pm->tokenCreate([
            'project_id'   => $projectId,
            'chain'        => $config['chain'] ?? 'solana',
            'symbol'       => $symbol,
            'decimals'     => $config['decimals'] ?? 0,
            'total_supply' => $totalSupply,
            'minted_supply'=> $config['minted_supply'] ?? 0,
            'config_json'  => json_encode([
                'split'     => $config['split'] ?? '34/33/33',    // or '50/25/25+15R'
                'insurance' => $config['insurance'] ?? null,     // e.g., 0.15 on public
            ], JSON_UNESCAPED_SLASHES),
        ]);
        if (!$tokenId) return 0;

        // 2) Mirror into bf_exchanges_assets as a TOKEN role
        $pm->exchangeAssetUpsert(
            ['asset_role'=>'token','project_id'=>$projectId,'token_symbol'=>$symbol],
            [
                'token_id'      => $tokenId,
                'chain'         => $config['chain'] ?? 'solana',
                'token_address' => $config['token_address'] ?? null,
                'decimals'      => $config['decimals'] ?? 0,
                'total_supply'  => $totalSupply,
                'minted_supply' => $config['minted_supply'] ?? 0,
                'token_status'  => 'draft',
                'parent_asset_id'=> $config['parent_asset_id'] ?? null,
            ]
        );

        return $tokenId;
    }
}
?>