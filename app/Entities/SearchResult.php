<?php

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * Representation of a search result item across projects, assets, posts, and alerts.
 */
class SearchResult extends Entity
{
    public string $type;
    public int $id;
    public string $title;
    public string $snippet;
    public string $url;
    public float $score;
    public string $createdAt;

    public function __construct(
        string $type = '',
        int $id = 0,
        string $title = '',
        string $snippet = '',
        string $url = '',
        float $score = 0.0,
        string $createdAt = ''
    ) {
        parent::__construct();

        $this->type = $type;
        $this->id = $id;
        $this->title = $title;
        $this->snippet = $snippet;
        $this->url = $url;
        $this->score = $score;
        $this->createdAt = $createdAt;
    }
}
