<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\ModelSafetyTrait;
use CodeIgniter\Model;

class BaseModel extends Model
{
    use ModelSafetyTrait;
}
