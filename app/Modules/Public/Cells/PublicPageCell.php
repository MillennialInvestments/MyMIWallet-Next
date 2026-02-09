<?php

declare(strict_types=1);

namespace App\Modules\Public\Cells;

use CodeIgniter\View\Cells\Cell;
use Config\Database;

class PublicPageCell extends Cell
{
    public string $slug = '';

    public function render(): string
    {
        $db = Database::connect();
        $row = $db->query('SELECT p.*, c.slug FROM bf_public_pages_published p JOIN bf_public_pages_catalog c ON c.id=p.page_id WHERE c.slug=? ORDER BY p.version DESC LIMIT 1', [$this->slug])->getRowArray();
        if (! $row) {
            return '<div class="container py-5"><h1>Page Not Found</h1></div>';
        }

        return view('App\\Modules\\Public\\Views\\pages\\public_page', ['page' => $row]);
    }
}
