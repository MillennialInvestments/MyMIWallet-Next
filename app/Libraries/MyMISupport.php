<?php

namespace App\Libraries;

/**
 * Simple utility to load file-based support articles.
 */
#[\AllowDynamicProperties]
class MyMISupport
{
    /**
     * Base path where article view files are stored.
     */
    protected string $articlePath = APPPATH . 'Modules/Support/Views/articles/';

    /**
     * Retrieve article data by slug.
     *
     * @param string $slug
     * @return array|null
     */
    public function getArticle(string $slug): ?array
    {
        $slug = trim($slug, '/');
        $file = $this->articlePath . $slug . '.php';

        if (! is_file($file)) {
            return null;
        }

        $content = file_get_contents($file);

        // Try to extract the title from the first <h1> tag.
        if (preg_match('/<h1[^>]*>(.*?)<\/h1>/', $content, $matches)) {
            $title = strip_tags($matches[1]);
        } else {
            $title = ucfirst(str_replace('-', ' ', $slug));
        }

        $lastModified = date(DATE_ATOM, filemtime($file));

        return [
            'slug'         => $slug,
            'title'        => $title,
            'content'      => $content,
            'lastModified' => $lastModified,
        ];
    }
}
?>
