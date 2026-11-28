<?php

use CodeIgniter\Router\RouteCollection;

/**
 * MyMI Sports: NFL running back prop analytics (read-only, no wagering).
 * Matches the existing dashboard sidebar links (/MyMISports, /MyMISports/NFL, /MyMISports/NBA).
 *
 * @var RouteCollection $routes
 */
$routes->group('MyMISports', ['namespace' => 'App\Modules\Sports\Controllers', 'filter' => ['login', 'noStore']], static function ($routes) {
    $routes->get('/', 'SportsController::index');

    // NFL Intelligence & Matchup Routes
    $routes->get('NFL', 'SportsController::nfl');
    $routes->get('nfl', 'SportsController::nfl');
    $routes->get('NFL/Player/(:num)', 'SportsController::player/$1');
    $routes->get('NFL/Matchup/(:segment)/(:segment)', 'SportsController::matchup/$1/$2');
    $routes->get('NFL/Matchups', 'SportsController::matchups');
    $routes->get('NFL/API/Goldilocks', 'SportsController::goldilocksApi');
    $routes->post('NFL/Refresh', 'SportsController::refreshStats');
    $routes->post('NFL/RefreshLines/(:num)', 'SportsController::refreshLines/$1');

    // NBA Intelligence & Matchup Routes
    $routes->get('NBA', 'SportsController::nba');
    $routes->get('nba', 'SportsController::nba');
    $routes->get('NBA/Player/(:num)', 'SportsController::nbaPlayer/$1');
    $routes->post('NBA/Refresh', 'SportsController::refreshNbaStats');

    // MLB Intelligence & Matchup Routes
    $routes->get('MLB', 'SportsController::mlb');
    $routes->get('mlb', 'SportsController::mlb');
    $routes->get('MLB/Player/(:num)', 'SportsController::mlbPlayer/$1');
    $routes->post('MLB/Refresh', 'SportsController::refreshMlbStats');

    // NHL Intelligence & Matchup Routes
    $routes->get('NHL', 'SportsController::nhl');
    $routes->get('nhl', 'SportsController::nhl');
    $routes->get('NHL/Player/(:num)', 'SportsController::nhlPlayer/$1');
    $routes->post('NHL/Refresh', 'SportsController::refreshNhlStats');

    // Same-Game Parlay (SGP) Correlation Engine Routes
    $routes->get('SGP', 'SportsController::sgp');
    $routes->get('sgp', 'SportsController::sgp');
    $routes->post('SGP/Calculate', 'SportsController::sgpCalculateApi');

    // Automated +EV SGP & Arbitrage Value Finder Radar
    $routes->get('Value-Finder', 'SportsController::valueFinder');
    $routes->get('value-finder', 'SportsController::valueFinder');
    $routes->post('Value-Finder/Scan', 'SportsController::valueFinderScanApi');
    $routes->post('value-finder/scan', 'SportsController::valueFinderScanApi');

    // Soccer Analytics & Poisson xG Routes
    $routes->get('Soccer', 'SportsController::soccer');
    $routes->get('soccer', 'SportsController::soccer');
    $routes->post('Soccer/Simulate', 'SportsController::soccerSimulateApi');

    // College Sports (NCAAF / NCAAB) Routes
    $routes->get('College', 'SportsController::college');
    $routes->get('college', 'SportsController::college');
    $routes->post('College/Simulate', 'SportsController::collegeSimulateApi');

    // Bet Tracker & Bankroll Ledger Routes
    $routes->get('Tracker', 'SportsController::tracker');
    $routes->get('tracker', 'SportsController::tracker');
    $routes->post('Tracker/Create', 'SportsController::createBet');
    $routes->post('Tracker/UpdateStatus/(:num)', 'SportsController::updateBetStatus/$1');
    $routes->post('Tracker/Delete/(:num)', 'SportsController::deleteBet/$1');
    $routes->post('Tracker/Import', 'SportsController::importBets');
    $routes->get('Tracker/Export', 'SportsController::exportBets');

    // Multi-Book Line Shopping & Odds Comparison Matrix
    $routes->get('Odds', 'SportsController::odds');
    $routes->get('odds', 'SportsController::odds');

    // Quantitative Betting & Sizing Calculators (+EV, Kelly, Arbitrage)
    $routes->get('Calculators', 'SportsController::calculators');
    $routes->get('calculators', 'SportsController::calculators');
    $routes->post('Calculators/Calculate', 'SportsController::calculateApi');

    // User BYOK API Credentials & Non-Custodial Settings
    $routes->get('Settings', 'SportsController::settings');
    $routes->get('settings', 'SportsController::settings');
    $routes->post('Settings/Save', 'SportsController::saveSettings');

    // Prediction Markets Hub (Polymarket & Kalshi Aggregation)
    $routes->get('Predictions', 'SportsController::predictions');
    $routes->get('predictions', 'SportsController::predictions');
    $routes->post('Predictions/Order', 'SportsController::placePredictionOrder');
    $routes->post('Predictions/Confirm', 'SportsController::confirmPredictionOrder');
    $routes->post('Predictions/Paper-Trade', 'SportsController::paperTradePredictionOrder');
    $routes->post('Predictions/Reset-Balance', 'SportsController::resetPaperBalance');

    // Social Gamification & UIGEA Fantasy Tournament Leaderboards
    $routes->get('Leaderboard', 'SportsController::leaderboard');
    $routes->get('leaderboard', 'SportsController::leaderboard');

    // Licensed Crypto On-Ramp (MoonPay & Stripe Crypto Onramp with OFAC Screening)
    $routes->get('Onramp', 'SportsController::onramp');
    $routes->get('onramp', 'SportsController::onramp');
    $routes->post('Onramp/Checkout', 'SportsController::onrampCheckout');
});

/**
 * Dedicated /My-Predictions & /Predictions Routes:
 * First-class navigation endpoints for the non-custodial Prediction Markets Hub,
 * Social Leaderboard, and Licensed Crypto On-Ramp.
 */
$predictionGroups = ['My-Predictions', 'my-predictions', 'Predictions', 'predictions'];
foreach ($predictionGroups as $group) {
    $routes->group($group, ['namespace' => 'App\Modules\Sports\Controllers', 'filter' => ['login', 'noStore']], static function ($routes) {
        $routes->get('/', 'SportsController::predictions');
        $routes->post('Order', 'SportsController::placePredictionOrder');
        $routes->post('order', 'SportsController::placePredictionOrder');
        $routes->post('Confirm', 'SportsController::confirmPredictionOrder');
        $routes->post('confirm', 'SportsController::confirmPredictionOrder');
        $routes->post('Paper-Trade', 'SportsController::paperTradePredictionOrder');
        $routes->post('paper-trade', 'SportsController::paperTradePredictionOrder');
        $routes->post('Reset-Balance', 'SportsController::resetPaperBalance');
        $routes->post('reset-balance', 'SportsController::resetPaperBalance');
        $routes->get('Leaderboard', 'SportsController::leaderboard');
        $routes->get('leaderboard', 'SportsController::leaderboard');
        $routes->get('Onramp', 'SportsController::onramp');
        $routes->get('onramp', 'SportsController::onramp');
        $routes->post('Onramp/Checkout', 'SportsController::onrampCheckout');
        $routes->post('onramp/checkout', 'SportsController::onrampCheckout');
    });
}

/**
 * Dedicated /My-Bets Routes:
 * First-class navigation endpoints for the Personal Bet Tracker, Bankroll Ledger,
 * Line Shopping Matrix, Quantitative Calculators, and BYOK Settings.
 */
$betsGroups = ['My-Bets', 'my-bets'];
foreach ($betsGroups as $group) {
    $routes->group($group, ['namespace' => 'App\Modules\Sports\Controllers', 'filter' => ['login', 'noStore']], static function ($routes) {
        $routes->get('/', 'SportsController::tracker');
        $routes->post('Create', 'SportsController::createBet');
        $routes->post('create', 'SportsController::createBet');
        $routes->post('UpdateStatus/(:num)', 'SportsController::updateBetStatus/$1');
        $routes->post('updateStatus/(:num)', 'SportsController::updateBetStatus/$1');
        $routes->post('Delete/(:num)', 'SportsController::deleteBet/$1');
        $routes->post('delete/(:num)', 'SportsController::deleteBet/$1');
        $routes->post('Import', 'SportsController::importBets');
        $routes->post('import', 'SportsController::importBets');
        $routes->get('Export', 'SportsController::exportBets');
        $routes->get('export', 'SportsController::exportBets');
        $routes->get('Odds', 'SportsController::odds');
        $routes->get('odds', 'SportsController::odds');
        $routes->get('SGP', 'SportsController::sgp');
        $routes->get('sgp', 'SportsController::sgp');
        $routes->post('SGP/Calculate', 'SportsController::sgpCalculateApi');
        $routes->post('sgp/calculate', 'SportsController::sgpCalculateApi');
        $routes->get('Value-Finder', 'SportsController::valueFinder');
        $routes->get('value-finder', 'SportsController::valueFinder');
        $routes->post('Value-Finder/Scan', 'SportsController::valueFinderScanApi');
        $routes->post('value-finder/scan', 'SportsController::valueFinderScanApi');
        $routes->get('Calculators', 'SportsController::calculators');
        $routes->get('calculators', 'SportsController::calculators');
        $routes->post('Calculators/Calculate', 'SportsController::calculateApi');
        $routes->post('calculators/calculate', 'SportsController::calculateApi');
        $routes->get('Settings', 'SportsController::settings');
        $routes->get('settings', 'SportsController::settings');
        $routes->post('Settings/Save', 'SportsController::saveSettings');
        $routes->post('settings/save', 'SportsController::saveSettings');
    });
}
