<?php

declare(strict_types=1);

namespace App;

use App\Strategies\AdditionStrategy;

class Calculator
{
    protected OperationInterface $operation;

    public function __construct(OperationInterface $operation = null)
    {
        $this->operation = $operation ?? new AdditionStrategy();
    }

    public function execute(int|float $a, int|float $b): int|float
    {
        return $this->operation->doOperation($a, $b);
    }

    public function setOperation(OperationInterface $operation): static
    {
        $this->operation = $operation;

        return $this;
    }

    public function __call($method, $arguments): int|float
    {
        // Necesitamos agregar el namespace completo de la clase
        $classname = '\\App\\Strategies\\'. ucfirst($method) . 'Strategy';

        // list($a, $b) = $arguments; [] hace lo mismo que list, pero es más corto.
        [$a, $b] = $arguments;

        $this->setOperation(new $classname);

        return $this->execute($a, $b);
    }
}
