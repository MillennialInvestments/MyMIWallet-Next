<?php
// Ensure this file is being included by a parent file
if (!isset($routes)) {
    throw new \Exception('You cannot access this file directly.');
}

// Define routes specific to the Blog module
$routes->group('blog', ['namespace' => 'App\Modules\Blog\Controllers'], function($routes) {
    $routes->get('/', 'Blog::index');
    // Add other routes for the Blog module here...
});
