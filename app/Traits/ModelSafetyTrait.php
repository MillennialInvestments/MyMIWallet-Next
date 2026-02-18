<?php

declare(strict_types=1);

namespace App\Traits;

trait ModelSafetyTrait
{
    protected function enforceLimit($builder, int $max = 20)
    {
        if (! is_object($builder) || ! method_exists($builder, 'getCompiledSelect')) {
            return $builder;
        }

        $sql = $builder->getCompiledSelect(false);

        if (stripos($sql, ' limit ') === false) {
            $builder->limit($max);
        }

        return $builder;
    }
}
