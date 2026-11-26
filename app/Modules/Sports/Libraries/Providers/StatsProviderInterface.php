<?php

declare(strict_types=1);

namespace App\Modules\Sports\Libraries\Providers;

/**
 * Pluggable source of NFL running back game logs and defense ranks.
 *
 * Bundled: CsvStatsProvider (any CSV export, plus the bundled sample set).
 * A live API provider (for example API-Sports) can implement this interface
 * later; it needs an owner-approved key read from .env, never hardcoded.
 */
interface StatsProviderInterface
{
    /** Short provider id stored on every imported row (e.g. "sample", "csv"). */
    public function name(): string;

    /**
     * @return iterable<array{external_id:string, player_name:string, team:string, position:string,
     *   season:int, week:int, game_date:?string, opponent:string, home_away:string,
     *   rush_att:int, rush_yds:int, rush_td:int, targets:int, receptions:int, rec_yds:int, rec_td:int}>
     */
    public function gameLogs(): iterable;

    /**
     * Week 0 means a season-level rank. Ranks are 1 (best defense) to 32.
     *
     * @return iterable<array{season:int, week:int, team:string, rush_def_rank:int, rb_rec_def_rank:?int, rush_yds_allowed_pg:?float}>
     */
    public function defenseRanks(): iterable;
}
