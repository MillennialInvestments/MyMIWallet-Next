<?php

namespace App\Libraries;
use App\Libraries\{BaseLoader};
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\CURLRequest;
use Config\APIs; // Assume you have a configuration file under app/Config named APIs.php
use Exception;
use InvalidArgumentException;

#[\AllowDynamicProperties]
class FRED
{

    protected $apiBase;
    protected $apiKey;
    protected $curlrequest;

    public function __construct()
    {
        // Assuming APIs is a configuration class that you have under app/Config
        $config = config(APIs::class);
        $this->curlrequest = service('curlrequest');
        $this->apiBase = 'https://api.stlouisfed.org/fred/';
        $this->apiKey = $config->fredApiKey; // Make sure you have fredApiKey in your APIs config class

        // CI4 logging is used as follows
        // log('debug', 'FRED API Key: ' . $this->apiKey);
    }

    public function fetchData($series_id)
    {
        if (!is_string($series_id) || !is_string($this->apiKey)) {
            throw new InvalidArgumentException('Series ID and API key must be strings.');
        }

        try {
            $client = $this->curlrequest;

            $response = $client->request('GET', $this->apiBase . 'series/observations', [
                'query' => [
                    'series_id' => $series_id,
                    'api_key' => $this->apiKey,
                    'file_type' => 'json'
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            $formattedData = [];
            if (isset($data['observations'])) {
                foreach ($data['observations'] as $observation) {
                    $formattedData[] = [
                        'date' => $observation['date'],
                        'value' => $observation['value']
                    ];
                }
            }
            return $formattedData;
        } catch (Exception $e) {
            log('error', 'Error fetching data: ' . $e->getMessage());
            throw $e;
        }
    }

    public function fetchSeriesInfo($series_id)
    {
        if (!is_string($series_id)) {
            throw new InvalidArgumentException('Series ID must be a string.');
        }
        try {
            $client = $this->curlrequest;
            $response = $client->get($this->apiBase . 'series', [
                'query' => [
                    'series_id' => $series_id,
                    'api_key' => $this->apiKey,
                    'file_type' => 'json'
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            log('error', 'Error fetching series info: ' . $e->getMessage());
            throw $e;
        }
    }

    public function searchSeries($keywords)
    {
        if (!is_string($keywords)) {
            throw new InvalidArgumentException('Keywords must be a string.');
        }
        try {
            $client = $this->curlrequest;
            $response = $client->get($this->apiBase . 'series/search', [
                'query' => [
                    'search_text' => $keywords,
                    'api_key' => $this->apiKey,
                    'file_type' => 'json'
                ]
            ]);
    
            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            log('error', 'Error searching series: ' . $e->getMessage());
            throw $e;
        }
    }

    public function fetchCategorySeries($category_id)
    {
        if (!is_numeric($category_id)) {
            throw new InvalidArgumentException('Category ID must be a number.');
        }
        try {
            $client = $this->curlrequest;
            $response = $client->get($this->apiBase . 'category/series', [
                'query' => [
                    'category_id' => $category_id,
                    'api_key' => $this->apiKey,
                    'file_type' => 'json'
                ]
            ]);
    
            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            log('error', 'Error fetching category series: ' . $e->getMessage());
            throw $e;
        }
    }

    public function fetchSeriesUpdates($limit = 10)
    {
        if (!is_numeric($limit)) {
            throw new InvalidArgumentException('Limit must be a number.');
        }

        try {
            $client = $this->curlrequest;
            $response = $client->get($this->apiBase . 'series/updates', [
                'query' => [
                    'api_key' => $this->apiKey,
                    'file_type' => 'json',
                    'limit' => $limit
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            log('error', 'Error fetching series updates: ' . $e->getMessage());
            throw $e;
        }
    }

    public function fetchCategoryChildren($category_id)
    {
        if (!is_numeric($category_id)) {
            throw new InvalidArgumentException('Category ID must be a number.');
        }
        try {
            $client = $this->curlrequest;
            $response = $client->get($this->apiBase . 'category/children', [
                'query' => [
                    'category_id' => $category_id,
                    'api_key' => $this->apiKey,
                    'file_type' => 'json'
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            log('error', 'Error fetching category children: ' . $e->getMessage());
            throw $e;
        }
    }

    public function fetchSeriesReleases($series_id)
    {
        if (!is_string($series_id)) {
            throw new InvalidArgumentException('Series ID must be a string.');
        }
        try {
            $client = $this->curlrequest;
            $response = $client->get($this->apiBase . 'series/releases', [
                'query' => [
                    'series_id' => $series_id,
                    'api_key' => $this->apiKey,
                    'file_type' => 'json'
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            log('error', 'Error fetching series releases: ' . $e->getMessage());
            throw $e;
        }
    }

    public function getCategory($category_id)
    {
        if (!is_numeric($category_id)) {
            throw new InvalidArgumentException('Category ID must be a number.');
        }
        try {
            $client = $this->curlrequest;
            $response = $client->get($this->apiBase . 'category', [
                'query' => [
                    'category_id' => $category_id,
                    'api_key' => $this->apiKey,
                    'file_type' => 'json'
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            log('error', 'Error fetching category: ' . $e->getMessage());
            throw $e;
        }
    }

    public function fetchReleaseSeries($release_id)
    {
        if (!is_numeric($release_id)) {
            throw new InvalidArgumentException('Release ID must be a number.');
        }
        try {
            $client = $this->curlrequest;
            $response = $client->get($this->apiBase . 'release/series', [
                'query' => [
                    'release_id' => $release_id,
                    'api_key' => $this->apiKey,
                    'file_type' => 'json'
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            log('error', 'Error fetching release series: ' . $e->getMessage());
            throw $e;
        }
    }

    public function fetchReleaseSources($release_id)
    {
        if (!is_numeric($release_id)) {
            throw new InvalidArgumentException('Release ID must be a number.');
        }
        try {
            $client = $this->curlrequest;
            $response = $client->get($this->apiBase . 'release/sources', [
                'query' => [
                    'release_id' => $release_id,
                    'api_key' => $this->apiKey,
                    'file_type' => 'json'
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            log('error', 'Error fetching release sources: ' . $e->getMessage());
            throw $e;
        }
    }

    public function fetchSeriesTags($series_id)
    {
        if (!is_string($series_id)) {
            throw new InvalidArgumentException('Series ID must be a string.');
        }
        try {
            $client = $this->curlrequest;
            $response = $client->get($this->apiBase . 'series/tags', [
                'query' => [
                    'series_id' => $series_id,
                    'api_key' => $this->apiKey,
                    'file_type' => 'json'
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            log('error', 'Error fetching series tags: ' . $e->getMessage());
            throw $e;
        }
    }

    public function fetchSeriesRelatedTags($series_id, $tag_names)
    {
        if (!is_string($series_id) || !is_string($tag_names)) {
            throw new InvalidArgumentException('Series ID and tag names must be strings.');
        }
        try {
            $client = $this->curlrequest;
            $response = $client->get($this->apiBase . 'series/related_tags', [
                'query' => [
                    'series_id' => $series_id,
                    'tag_names' => $tag_names,
                    'api_key' => $this->apiKey,
                    'file_type' => 'json'
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            log('error', 'Error fetching series related tags: ' . $e->getMessage());
            throw $e;
        }
    }

    public function fetchReleaseTables($release_id)
    {
        if (!is_numeric($release_id)) {
            throw new InvalidArgumentException('Release ID must be a number.');
        }
        try {
            $client = $this->curlrequest;
            $response = $client->get($this->apiBase . 'release/tables', [
                'query' => [
                    'release_id' => $release_id,
                    'api_key' => $this->apiKey,
                    'file_type' => 'json'
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            log('error', 'Error fetching release tables: ' . $e->getMessage());
            throw $e;
        }
    }

    // Similarly, refactor other methods to use CodeIgniter 4's HTTP client and logging
}
