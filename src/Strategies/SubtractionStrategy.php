<?php

declare(strict_types=1);

namespace App\Strategies;

use App\OperationInterface;

class SubtractionStrategy implements OperationInterface
{
    public function doOperation(int|float $a, int|float $b): int|float
    {
        return $a - $b;
    }
}
