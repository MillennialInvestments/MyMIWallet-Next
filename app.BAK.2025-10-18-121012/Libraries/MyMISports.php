<?php

namespace App\Libraries;

use App\Libraries\{BaseLoader};
use App\Models\SportsModel;
use Config\Services;

#[\AllowDynamicProperties]
class MyMISports
{

    private $apiKey;
    private $apiNFLHost;
    private $apiNBAHost;
    private $sportsModel;
    private $request;

    public function __construct()
    {
        $this->apiKey = 'c1e82d6f5beab624c459f7bc89c3321a';
        $this->apiNFLHost = 'v1.american-football.api-sports.io';
        $this->apiNBAHost = 'v2.nba.api-sports.io';
        $this->sportsModel = new SportsModel();
        $this->request = Services::request();
    }

    private function performCurlRequest($url, $host) {
        $client = Services::curlrequest();
        $response = $client->request('GET', $url, [
            'headers' => [
                'x-rapidapi-key' => $this->apiKey,
                'x-rapidapi-host' => $host
            ]
        ]);

        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody(), true);
        } else {
            log_message('error', 'Error in performCurlRequest: ' . $response->getBody());
            return null;
        }
    }

    public function fetchNFLPlayerStats($teamId) {
        $existingStats = $this->sportsModel->checkNFLStatsExist($teamId);
        if ($existingStats) {
            return $existingStats;
        } else {
            $url = "https://{$this->apiNFLHost}/players/statistics?season=2023&team={$teamId}";
            $playerStats = $this->performCurlRequest($url, $this->apiNFLHost);

            if (isset($playerStats['response']) && is_array($playerStats['response'])) {
                $playersDetails = [];
                foreach ($playerStats['response'] as $playerInfo) {
                    $playerDetail = array(
                        'id' => $playerInfo['player']['id'],
                        'firstname' => $playerInfo['player']['firstname'],
                        'lastname'=> $playerInfo['player']['lastname'],
                        'position' => $playerInfo['statistics'][0]['games']['position'],
                        'team' => $playerInfo['statistics'][0]['team']['name'],
                        'teamId' => $teamId,
                        // ... other relevant fields
                    );
                    $playersDetails[] = $playerDetail;
                }

                foreach ($playersDetails as $playerDetail) {
                    $averageStats = $this->calculateNFLPlayerAverages([$playerDetail]);
                    log_message('debug', '$averageStats results: ' . print_r($averageStats, true));
                    $this->sportsModel->storeNFLPlayerStats($averageStats);
                }
                return $playersDetails;
            } else {
                log_message('error', 'Unexpected structure of playerStats: ' . print_r($playerStats, true));
                return [];
            }
        }
    }

    public function calculateNFLPlayerAverages($playerStats)
    {
        $aggregatedStats = [];
        foreach ($playerStats as $stat) {
            $playerId = $stat['player']['id'];
            if (!isset($aggregatedStats[$playerId])) {
                // Initialize player stats
                $aggregatedStats[$playerId] = $this->initializeNFLPlayerStats($playerId, $stat);
            }

            // Aggregate stats for each game
            $this->aggregateNFLStats($aggregatedStats[$playerId], $stat);
        }

        // Calculate averages
        foreach ($aggregatedStats as $playerId => &$stats) {
            $this->calculateNFLAverages($stats);
        }

        return array_values($aggregatedStats);
    }

    private function initializeNFLPlayerStats($playerId, $stat) {
        return [
            'gamesCount' => 0,
            'id' => $playerId,
            'firstName' => $stat['player']['firstname'] ?? 'N/A',
            'lastName' => $stat['player']['lastname'] ?? 'N/A',
            'teamName' => $stat['team']['name'] ?? 'N/A',
            'position' => $stat['position'] ?? 'N/A',
            // Initialize other necessary stat fields with default values
        ];
    }

    private function aggregateNFLStats(&$playerStats, $stat) {
        $playerId = $stat['player']['id'];
    
        // Check if player already exists in $playerStats, if not, initialize
        if (!isset($playerStats[$playerId])) {
            $playerStats[$playerId] = $this->initializeNFLPlayerStats($playerId, $stat);
        }
    
        // Increment games count
        $playerStats[$playerId]['gamesCount']++;
    
        // Aggregate other stats
        // For example:
        // $playerStats[$playerId]['passingYards'] += $stat['passing_yards'] ?? 0;
        // ... and so on for other stats
    }

    public function fetchNBAPlayerStats($teamId)
    {
        $existingStats = $this->sportsModel->checkNBAStatsExist($teamId);
        if ($existingStats) {
            return $existingStats;
        } else {
            $url = "https://{$this->apiNBAHost}/players/statistics?season=2023&team={$teamId}";
            return $this->performCurlRequest($url, $this->apiNBAHost);
        }
    }

    public function calculateNBAPlayerAverages($playerStats) {
        $aggregatedStats = [];
        foreach ($playerStats as $stat) {
            $playerId = $stat['player']['id'];
            if (!isset($aggregatedStats[$playerId])) {
                $aggregatedStats[$playerId] = $this->initializeNBAPlayerStats($playerId, $stat);
            }
    
            $this->aggregateNBAStats($aggregatedStats[$playerId], $stat);
        }
    
        // Calculate averages
        foreach ($aggregatedStats as $playerId => &$stats) {
            $stats['averagePoints'] = $stats['totalPoints'] / $stats['gamesPlayed'];
            $stats['averageAssists'] = $stats['totalAssists'] / $stats['gamesPlayed'];
            // ... other averages
        }
    
        return array_values($aggregatedStats);
    }

    private function initializeNBAPlayerStats($playerId, $stat) {
        return [
            'playerId' => $playerId,
            'gamesPlayed' => 0,
            'totalPoints' => 0,
            'totalAssists' => 0,
            // ... other stat fields initialization
        ];
    }

    public function getAggregatedGameData($selectedDate)
    {
        $aggregatedData = [];
        $gamesData = $this->performCurlRequest("https://{$this->apiNFLHost}/games?date=" . $selectedDate, $this->apiNFLHost);
    
        if (isset($gamesData['response'])) {
            foreach ($gamesData['response'] as $game) {
                $homeTeamId = $game['teams']['home']['id'];
                $awayTeamId = $game['teams']['away']['id'];
    
                $homeTeamPlayers = $this->fetchNFLPlayerStats($homeTeamId);
                $awayTeamPlayers = $this->fetchNFLPlayerStats($awayTeamId);
    
                foreach ($homeTeamPlayers as $player) {
                    $aggregatedData[] = [
                        'gameId' => $game['fixture']['id'],
                        'team' => 'home',
                        'playerName' => $player['firstname'] . ' ' . $player['lastname'],
                        // ... other details
                    ];
                }
    
                foreach ($awayTeamPlayers as $player) {
                    $aggregatedData[] = [
                        'gameId' => $game['fixture']['id'],
                        'team' => 'away',
                        'playerName' => $player['firstname'] . ' ' . $player['lastname'],
                        // ... other details
                    ];
                }
            }
        }
    
        return $aggregatedData;
    }

}
