<?php
namespace App\Libraries;

use App\Libraries\{BaseLoader};
use CodeIgniter\Router\Router;

#[\AllowDynamicProperties]
class MyRouter extends Router
{

    public function handle($uri)
    {
        // Check if the first segment matches any module route
        $segments = explode('/', $uri);
        $firstSegment = $segments[0];

        // Load the moduleRoutes from a config file (if not already loaded)
        $moduleConfig = config('ModuleName'); // Replace 'ModuleName' with the name of your config file
        $moduleRoutes = $moduleConfig->moduleRoutes;

        if (isset($moduleRoutes[$firstSegment])) {
            // Set the namespace based on the module route
            $this->setNamespace($moduleRoutes[$firstSegment]);
        }

        // Call the parent handle method
        return parent::handle($uri);
    }
}
