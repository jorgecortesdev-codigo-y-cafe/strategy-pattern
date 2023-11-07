<?php

declare(strict_types=1);

namespace App;

interface OperationInterface
{
    public function doOperation(int|float $a, int|float $b): int|float;
}
