<?php

declare(strict_types=1);

namespace App\Modules\User\Controllers;

/**
 * Class InvestmentController
 *
 * Backward-compatible alias for InvestmentsController to ensure
 * all singular/plural routes resolve seamlessly under CI4 routing.
 */
#[\AllowDynamicProperties]
class InvestmentController extends InvestmentsController
{
}
