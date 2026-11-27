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

    // Social Gamification & UIGEA Fantasy Tournament Leaderboards
    $routes->get('Leaderboard', 'SportsController::leaderboard');
    $routes->get('leaderboard', 'SportsController::leaderboard');

    // Licensed Crypto On-Ramp (MoonPay & Stripe Crypto Onramp with OFAC Screening)
    $routes->get('Onramp', 'SportsController::onramp');
    $routes->get('onramp', 'SportsController::onramp');
    $routes->post('Onramp/Checkout', 'SportsController::onrampCheckout');
});
