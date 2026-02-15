<?php

declare(strict_types=1);

namespace App\Controllers;

class Test extends BaseController
{
    public function crash(): void
    {
        undefined_function_call_here();
    }
}
