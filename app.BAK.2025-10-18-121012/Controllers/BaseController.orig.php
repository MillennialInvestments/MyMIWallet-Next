<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class BaseController extends Controller
{
    protected $helpers = ['url', 'theme']; // add the theme helper

    protected string $theme;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        // Default to public theme; dashboard controllers will override
        $this->theme = config(\Config\Theme::class)->default;
        view()->setVar('theme', $this->theme); // available in all views
    }

    protected function useTheme(string $theme): void
    {
        $this->theme = $theme;
        view()->setVar('theme', $theme);
    }

    // Convenience: render a themed view that already "extends" the theme layout
    protected function themed(string $view, array $data = [])
    {
        return view($view, $data);
    }
}
