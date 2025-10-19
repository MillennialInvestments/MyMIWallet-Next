<?php 
namespace App\Modules\APIs\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class PredictionsController extends BaseController
{
    use ResponseTrait;

    protected function svc()
    {
        return service('mymipredictions');
    }

    protected function uid(): int
    {
        return (int) (service('auth')->id() ?? 0);
    }

    public function listMarkets()
    {
        $page   = max(1, (int) $this->request->getGet('page'));
        $limit  = (int) ($this->request->getGet('limit') ?? 50);
        $limit  = max(1, min($limit, 100));
        $offset = ($page - 1) * $limit;

        $filters = [
            'state'    => $this->request->getGet('state') ?: null,
            'category' => $this->request->getGet('category') ?: null,
            'search'   => $this->request->getGet('search') ?? $this->request->getGet('q'),
        ];

        $filters = array_filter($filters, static fn ($value) => $value !== null && $value !== '');

        return $this->respond([
            'status'  => 'success',
            'data'    => $this->svc()->listMarkets($filters, $limit, $offset),
            'filters' => $filters,
            'page'    => $page,
            'limit'   => $limit,
        ]);
    }

    public function createMarket()
    {
        $payload = $this->request->getJSON(true) ?? [];

        try {
            $id = $this->svc()->createMarket($payload, $this->uid());
            return $this->respondCreated(['status' => 'success', 'market_id' => $id]);
        } catch (\Throwable $e) {
            log_message('error', 'Predictions createMarket failed: {m}', ['m' => $e->getMessage()]);
            return $this->failValidationErrors($e->getMessage());
        }
    }

    public function placeOrder()
    {
        $payload = $this->request->getJSON(true) ?? [];
        try {
            $out = $this->svc()->placeOrder($payload, $this->uid());
            return $this->respond(['status' => 'success', 'data' => $out]);
        } catch (\Throwable $e) {
            log_message('error', 'Predictions placeOrder failed: {m}', ['m' => $e->getMessage()]);
            return $this->failValidationErrors($e->getMessage());
        }
    }

    public function cancelOrder()
    {
        return $this->respond(['status' => 'success', 'message' => 'TODO']);
    }

    public function settle($marketId)
    {
        $payload = $this->request->getJSON(true) ?? [];

        try {
            $out = $this->svc()->settleMarket(
                (int) $marketId,
                $this->uid(),
                (int) ($payload['winning_option_id'] ?? 0),
                $payload['note'] ?? ''
            );

            return $this->respond(['status' => 'success', 'data' => $out]);
        } catch (\Throwable $e) {
            log_message('error', 'Predictions settle failed: {m}', ['m' => $e->getMessage()]);
            return $this->failValidationErrors($e->getMessage());
        }
    }

    public function addLiquidity()
    {
        return $this->respond(['status' => 'success', 'message' => 'TODO']);
    }

    public function removeLiquidity()
    {
        return $this->respond(['status' => 'success', 'message' => 'TODO']);
    }

    public function lockMarkets()
    {
        $now = date('Y-m-d H:i:s');
        $M = new \App\Modules\Predictions\Models\MarketsModel();
        $toLock = $M->where('state','OPEN')->where('lock_at <=', $now)->findAll(200);
        foreach ($toLock as $m) { $this->svc()->lockMarket((int)$m['id'], 0); }
        return $this->response->setJSON(['ok'=>true,'locked'=>count($toLock)]);
    }

    public function processPayouts()
    {
        $P = new \App\Modules\Predictions\Models\PayoutsModel();
        $pending = $P->pending(200);
        $n = 0;
        foreach ($pending as $row) { $this->svc()->processPayout((int)$row['id']); $n++; }
        return $this->response->setJSON(['ok'=>true,'processed'=>$n]);
    }

    // public function rebalanceOdds()
    // {
    //     $M = new \App\Modules\Predictions\Models\MarketsModel();
    //     $active = $M->whereIn('state',['OPEN','LOCKED'])->findAll(500);
    //     $n=0; foreach ($active as $m) { $this->svc()->rebalanceOdds((int)$m['id']); $n++; }
    //     return $this->response->setJSON(['ok'=>true,'rebalanced'=>$n]);
    // }

    public function cronDistributeFees(): ResponseInterface
    {
        return $this->respondCron('distribute_fees', static function (): array {
            $today = date('Y-m-d');
            $start = $today . ' 00:00:00';
            $end   = $today . ' 23:59:59';

            $tradeSumModel = new TradesModel();
            $sumRow = $tradeSumModel
                ->selectSum('fee_amount', 'fee_total')
                ->where('created_at >=', $start)
                ->where('created_at <=', $end)
                ->first();

            $tradeCount = (new TradesModel())
                ->where('created_at >=', $start)
                ->where('created_at <=', $end)
                ->countAllResults();

            return [
                'date'         => $today,
                'fee_total'    => (float) ($sumRow['fee_total'] ?? 0.0),
                'trades_count' => (int) $tradeCount,
            ];
        });
    }

    public function cronFetchMarketData(): ResponseInterface
    {
        return $this->respondCron('fetch_market_data', static function (): array {
            $total = (int) (new MarketsModel())->countAllResults();
            $states = ['DRAFT', 'OPEN', 'LOCKED', 'RESOLVED', 'CANCELED'];
            $counts = [];
            foreach ($states as $state) {
                $counts[$state] = (int) (new MarketsModel())
                    ->where('state', $state)
                    ->countAllResults();
            }

            $recentRows = (new MarketsModel())
                ->orderBy('created_at', 'DESC')
                ->limit(5)
                ->findAll();

            $recent = array_map(static function ($row) {
                return [
                    'id'    => isset($row['id']) ? (int) $row['id'] : 0,
                    'title' => (string) ($row['title'] ?? ''),
                    'state' => (string) ($row['state'] ?? ''),
                ];
            }, $recentRows ?? []);

            return [
                'total'    => $total,
                'by_state' => $counts,
                'recent'   => $recent,
            ];
        });
    }

    public function cronFetchUserData(): ResponseInterface
    {
        return $this->respondCron('fetch_user_data', static function (): array {
            $ordersModel    = new OrdersModel();
            $positionsModel = new PositionsModel();
            $payoutsModel   = new PayoutsModel();
            $tradesModel    = new TradesModel();

            $ordersTotal    = (int) $ordersModel->countAllResults();
            $positionsTotal = (int) $positionsModel->countAllResults();
            $tradesTotal    = (int) $tradesModel->countAllResults();
            $payoutsPending = (int) $payoutsModel->where('status', 'PENDING')->countAllResults();

            $orderUsers    = $ordersModel->select('DISTINCT user_id AS user_id')->findColumn('user_id') ?? [];
            $positionUsers = $positionsModel->select('DISTINCT user_id AS user_id')->findColumn('user_id') ?? [];
            $activeUsers   = array_unique(array_filter(array_merge($orderUsers, $positionUsers)));

            return [
                'orders_total'         => $ordersTotal,
                'positions_total'      => $positionsTotal,
                'trades_total'         => $tradesTotal,
                'payouts_pending'      => $payoutsPending,
                'active_user_estimate' => count($activeUsers),
            ];
        });
    }

    public function cronSettleMarkets(): ResponseInterface
    {
        return $this->respondCron('settle_markets', static function (): array {
            $now = date('Y-m-d H:i:s');
            $candidates = (new MarketsModel())
                ->where('state', 'LOCKED')
                ->where('resolve_at <=', $now)
                ->findAll(100);

            return [
                'count'      => count($candidates),
                'market_ids' => array_map('intval', array_column($candidates, 'id')),
            ];
        });
    }

    public function cronExpireMarkets(): ResponseInterface
    {
        return $this->respondCron('expire_markets', function (MyMIPredictions $svc): array {
            return $this->runExpireMarkets($svc);
        });
    }

    public function cronUpdateMarketPrices(): ResponseInterface
    {
        return $this->respondCron('update_market_prices', function (MyMIPredictions $svc): array {
            return $this->runRebalanceOdds($svc);
        });
    }

    public function cronUpdateMarketStates(): ResponseInterface
    {
        return $this->respondCron('update_market_states', function (MyMIPredictions $svc): array {
            $expired = $this->runExpireMarkets($svc);
            $now = date('Y-m-d H:i:s');
            $awaitingResolution = (int) (new MarketsModel())
                ->where('state', 'LOCKED')
                ->where('resolve_at <=', $now)
                ->countAllResults();

            return array_merge($expired, [
                'awaiting_resolution' => $awaitingResolution,
                'open_markets'        => (int) (new MarketsModel())
                    ->where('state', 'OPEN')
                    ->countAllResults(),
            ]);
        });
    }

    public function cronUpdateUserPositions(): ResponseInterface
    {
        return $this->respondCron('update_user_positions', static function (): array {
            $positionsModel = new PositionsModel();
            $grouped = $positionsModel
                ->select('stake_asset, COUNT(*) AS positions, SUM(stake_total) AS stake_total, SUM(payout_max) AS payout_total')
                ->groupBy('stake_asset')
                ->findAll();

            $byAsset = array_map(static function ($row) {
                return [
                    'asset'        => (string) ($row['stake_asset'] ?? 'MIMG'),
                    'positions'    => (int) ($row['positions'] ?? 0),
                    'stake_total'  => (float) ($row['stake_total'] ?? 0.0),
                    'payout_total' => (float) ($row['payout_total'] ?? 0.0),
                ];
            }, $grouped ?? []);

            return [
                'by_asset'        => $byAsset,
                'total_positions' => (int) (new PositionsModel())->countAllResults(),
            ];
        });
    }

    public function cronUpdateUserStakes(): ResponseInterface
    {
        return $this->respondCron('update_user_stakes', static function (): array {
            $orderTotals = (new OrdersModel())
                ->selectSum('stake_amount', 'stake_total')
                ->first();
            $positionTotals = (new PositionsModel())
                ->selectSum('stake_total', 'position_stake_total')
                ->first();

            $ordersModel  = new OrdersModel();
            $totalOrders  = (int) $ordersModel->countAllResults();
            $filled       = (int) (new OrdersModel())->where('state', 'FILLED')->countAllResults();
            $canceled     = (int) (new OrdersModel())->where('state', 'CANCELED')->countAllResults();

            return [
                'order_stake_total'    => (float) ($orderTotals['stake_total'] ?? 0.0),
                'position_stake_total' => (float) ($positionTotals['position_stake_total'] ?? 0.0),
                'orders' => [
                    'total'    => $totalOrders,
                    'filled'   => $filled,
                    'canceled' => $canceled,
                    'open'     => max(0, $totalOrders - $filled - $canceled),
                ],
            ];
        });
    }

    public function cronUpdateUserFees(): ResponseInterface
    {
        return $this->respondCron('update_user_fees', static function (): array {
            $tradeTotals = (new TradesModel())
                ->selectSum('fee_amount', 'fee_total')
                ->first();
            $orderFeeBips = (new OrdersModel())
                ->selectSum('fee_bips', 'fee_bips_total')
                ->first();

            return [
                'trade_fee_total' => (float) ($tradeTotals['fee_total'] ?? 0.0),
                'order_fee_bips'  => (int) ($orderFeeBips['fee_bips_total'] ?? 0),
            ];
        });
    }

    public function cronUpdateUserPnL(): ResponseInterface
    {
        return $this->respondCron('update_user_pnl', function (): array {
            return $this->buildUserLeaderboard();
        });
    }

    public function cronUpdateUserRankings(): ResponseInterface
    {
        return $this->respondCron('update_user_rankings', function (): array {
            return $this->buildUserLeaderboard();
        });
    }

    public function cronUpdateUserLeaderboard(): ResponseInterface
    {
        return $this->respondCron('update_user_leaderboard', function (): array {
            return $this->buildUserLeaderboard();
        });
    }

    public function cronUpdateUserStats(): ResponseInterface
    {
        return $this->respondCron('update_user_stats', static function (): array {
            $ordersUsers    = (new OrdersModel())->select('DISTINCT user_id AS user_id')->findColumn('user_id') ?? [];
            $positionsUsers = (new PositionsModel())->select('DISTINCT user_id AS user_id')->findColumn('user_id') ?? [];
            $allUsers       = array_unique(array_filter(array_merge($ordersUsers, $positionsUsers)));
            sort($allUsers);

            return [
                'users_with_orders'    => count($ordersUsers),
                'users_with_positions' => count($positionsUsers),
                'active_users'         => count($allUsers),
            ];
        });
    }

    public function cronUpdateUserNotifications(): ResponseInterface
    {
        return $this->respondCron('update_user_notifications', static function (): array {
            $pending = (int) (new PayoutsModel())
                ->where('status', 'PENDING')
                ->countAllResults();
            $sent    = (int) (new PayoutsModel())
                ->where('status', 'SENT')
                ->countAllResults();

            return [
                'pending_notifications' => $pending,
                'sent_notifications'    => $sent,
            ];
        });
    }

    public function cronProcessExpiredMarkets(): ResponseInterface
    {
        return $this->respondCron('process_expired_markets', function (MyMIPredictions $svc): array {
            return $this->runExpireMarkets($svc);
        });
    }

    public function cronProcessSettledMarkets(): ResponseInterface
    {
        return $this->respondCron('process_settled_markets', function (MyMIPredictions $svc): array {
            return $this->runProcessPayouts($svc);
        });
    }

    public function cronProcessUserOrders(): ResponseInterface
    {
        return $this->respondCron('process_user_orders', static function (): array {
            $states = (new OrdersModel())
                ->select('state, COUNT(*) AS total')
                ->groupBy('state')
                ->findAll();

            $byState = [];
            foreach ($states as $row) {
                $state = (string) ($row['state'] ?? 'UNKNOWN');
                $byState[$state] = (int) ($row['total'] ?? 0);
            }

            return [
                'total'   => (int) (new OrdersModel())->countAllResults(),
                'by_state' => $byState,
            ];
        });
    }

    public function cronProcessUserPositions(): ResponseInterface
    {
        return $this->respondCron('process_user_positions', static function (): array {
            $positions = (new PositionsModel())
                ->select('market_id, COUNT(*) AS total')
                ->groupBy('market_id')
                ->orderBy('total', 'DESC')
                ->limit(10)
                ->findAll();

            return [
                'top_markets'     => array_map(static function ($row) {
                    return [
                        'market_id' => (int) ($row['market_id'] ?? 0),
                        'positions' => (int) ($row['total'] ?? 0),
                    ];
                }, $positions ?? []),
                'total_positions' => (int) (new PositionsModel())->countAllResults(),
            ];
        });
    }

    public function cronProcessUserStakes(): ResponseInterface
    {
        return $this->respondCron('process_user_stakes', static function (): array {
            $totals = (new PositionsModel())
                ->select('user_id, SUM(stake_total) AS stake_total')
                ->groupBy('user_id')
                ->orderBy('stake_total', 'DESC')
                ->limit(10)
                ->findAll();

            return [
                'top_users' => array_map(static function ($row) {
                    return [
                        'user_id'     => (int) ($row['user_id'] ?? 0),
                        'stake_total' => (float) ($row['stake_total'] ?? 0.0),
                    ];
                }, $totals ?? []),
                'aggregate_stake' => (float) ((new PositionsModel())
                    ->selectSum('stake_total', 'stake_total')
                    ->first()['stake_total'] ?? 0.0),
            ];
        });
    }

    public function cronProcessUserFees(): ResponseInterface
    {
        return $this->respondCron('process_user_fees', static function (): array {
            $rows = (new TradesModel())
                ->select('user_id, SUM(fee_amount) AS fee_total')
                ->groupBy('user_id')
                ->orderBy('fee_total', 'DESC')
                ->limit(10)
                ->findAll();

            return [
                'top_users' => array_map(static function ($row) {
                    return [
                        'user_id'   => (int) ($row['user_id'] ?? 0),
                        'fee_total' => (float) ($row['fee_total'] ?? 0.0),
                    ];
                }, $rows ?? []),
                'aggregate_fees' => (float) ((new TradesModel())
                    ->selectSum('fee_amount', 'fee_total')
                    ->first()['fee_total'] ?? 0.0),
            ];
        });
    }

    public function cronProcessUserPnL(): ResponseInterface
    {
        return $this->respondCron('process_user_pnl', function (): array {
            return $this->buildUserLeaderboard();
        });
    }

    public function cronProcessUserRankings(): ResponseInterface
    {
        return $this->respondCron('process_user_rankings', function (): array {
            return $this->buildUserLeaderboard();
        });
    }

    public function cronProcessUserLeaderboard(): ResponseInterface
    {
        return $this->respondCron('process_user_leaderboard', function (): array {
            return $this->buildUserLeaderboard();
        });
    }

    public function cronProcessUserStats(): ResponseInterface
    {
        return $this->respondCron('process_user_stats', static function (): array {
            $ordersUsers    = (new OrdersModel())->select('DISTINCT user_id AS user_id')->findColumn('user_id') ?? [];
            $positionsUsers = (new PositionsModel())->select('DISTINCT user_id AS user_id')->findColumn('user_id') ?? [];
            $allUsers       = array_unique(array_filter(array_merge($ordersUsers, $positionsUsers)));
            sort($allUsers);

            return [
                'users_with_orders'    => count($ordersUsers),
                'users_with_positions' => count($positionsUsers),
                'active_users'         => count($allUsers),
            ];
        });
    }

    public function cronProcessUserNotifications(): ResponseInterface
    {
        return $this->respondCron('process_user_notifications', static function (): array {
            $pending = (int) (new PayoutsModel())
                ->where('status', 'PENDING')
                ->countAllResults();
            $sent    = (int) (new PayoutsModel())
                ->where('status', 'SENT')
                ->countAllResults();

            return [
                'pending_notifications' => $pending,
                'sent_notifications'    => $sent,
            ];
        });
    }

    public function cronProcessUserSettlements(): ResponseInterface
    {
        return $this->respondCron('process_user_settlements', function (MyMIPredictions $svc): array {
            return $this->runProcessPayouts($svc);
        });
    }

    public function lock(): ResponseInterface
    {
        return $this->respondCron('lock_markets', function (MyMIPredictions $svc): array {
            return $this->runExpireMarkets($svc);
        });
    }

    public function rebalanceOdds(): ResponseInterface
    {
        return $this->respondCron('rebalance_markets', function (MyMIPredictions $svc): array {
            return $this->runRebalanceOdds($svc);
        });
    }

    public function unlock(): ResponseInterface
    {
        return $this->respondCron('unlock_markets', static function (): array {
            return [
                'message' => 'No automatic unlock routine defined; no markets modified.',
            ];
        });
    }

    protected function respondCron(string $task, ?callable $callback = null): ResponseInterface
    {
        $payload = [
            'status'    => 'success',
            'task'      => $task,
            'timestamp' => date(DATE_ATOM),
        ];

        try {
            if ($callback) {
                $result = $callback($this->svc());
                if (is_array($result)) {
                    $payload['result'] = $result;
                } elseif ($result !== null) {
                    $payload['result'] = ['value' => $result];
                } else {
                    $payload['result'] = [];
                }
            } else {
                $payload['result'] = [];
            }

            return $this->response->setJSON($payload);
        } catch (\Throwable $e) {
            log_message('error', 'Predictions cron task {task} failed: {error}', [
                'task'  => $task,
                'error' => $e->getMessage(),
            ]);

            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'status'    => 'error',
                    'task'      => $task,
                    'timestamp' => date(DATE_ATOM),
                    'message'   => $e->getMessage(),
                ]);
        }
    }

    protected function runExpireMarkets(MyMIPredictions $svc): array
    {
        $now = date('Y-m-d H:i:s');
        $rows = (new MarketsModel())
            ->where('state', 'OPEN')
            ->where('lock_at <=', $now)
            ->findAll(200);

        $ids = [];
        $locked = 0;
        foreach ($rows as $row) {
            $id = (int) ($row['id'] ?? 0);
            if ($id <= 0) {
                continue;
            }
            $ids[] = $id;
            if ($svc->lockMarket($id, 0)) {
                $locked++;
            }
        }

        return [
            'candidate_ids'  => $ids,
            'locked'         => $locked,
            'open_remaining' => (int) (new MarketsModel())
                ->where('state', 'OPEN')
                ->countAllResults(),
        ];
    }

    protected function runRebalanceOdds(MyMIPredictions $svc): array
    {
        $activeIds = (new MarketsModel())
            ->whereIn('state', ['OPEN', 'LOCKED'])
            ->findColumn('id') ?? [];

        $rebalanced = 0;
        $skipped = [];
        foreach ($activeIds as $id) {
            $id = (int) $id;
            if ($id <= 0) {
                continue;
            }
            if ($svc->rebalanceOdds($id)) {
                $rebalanced++;
            } else {
                $skipped[] = $id;
            }
        }

        return [
            'active_markets' => count($activeIds),
            'rebalanced'     => $rebalanced,
            'skipped'        => $skipped,
        ];
    }

    protected function runProcessPayouts(MyMIPredictions $svc, int $limit = 200): array
    {
        $pending = (new PayoutsModel())->pending($limit);
        $processed = 0;
        $errors = [];

        foreach ($pending as $row) {
            $id = (int) ($row['id'] ?? 0);
            if ($id <= 0) {
                continue;
            }

            try {
                if ($svc->processPayout($id)) {
                    $processed++;
                }
            } catch (\Throwable $e) {
                $errors[$id] = $e->getMessage();
            }
        }

        return [
            'pending'   => count($pending),
            'processed' => $processed,
            'errors'    => $errors,
        ];
    }

    protected function buildUserLeaderboard(int $limit = 10): array
    {
        $rows = (new PositionsModel())
            ->select('user_id, SUM(stake_total) AS stake_total, SUM(payout_max) AS payout_total')
            ->groupBy('user_id')
            ->findAll();

        $leaderboard = [];
        $totalStake = 0.0;
        $totalPayout = 0.0;

        foreach ($rows as $row) {
            $stake  = (float) ($row['stake_total'] ?? 0.0);
            $payout = (float) ($row['payout_total'] ?? 0.0);
            $pnl    = $payout - $stake;

            $leaderboard[] = [
                'user_id'      => (int) ($row['user_id'] ?? 0),
                'stake_total'  => $stake,
                'payout_total' => $payout,
                'pnl'          => $pnl,
            ];

            $totalStake  += $stake;
            $totalPayout += $payout;
        }

        usort($leaderboard, static function ($a, $b) {
            return $b['pnl'] <=> $a['pnl'];
        });

        return [
            'leaderboard' => array_slice($leaderboard, 0, $limit),
            'totals' => [
                'stake_total'  => $totalStake,
                'payout_total' => $totalPayout,
                'pnl_total'    => $totalPayout - $totalStake,
            ],
        ];
    }
}