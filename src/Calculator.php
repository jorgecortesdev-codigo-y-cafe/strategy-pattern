<?php

declare(strict_types=1);

namespace App;

use App\Strategies\AdditionStrategy;

/**
 * @method int|float addition(int|float $a, int|float $b)
 * @method int|float subtraction(int|float $a, int|float $b)
 * @method int|float multiplication(int|float $a, int|float $b)
 */
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

    /**
     * @param string $method
     * @param non-empty-array<int|float, int|float> $arguments
     * @return int|float
     */
    public function __call(string $method, array $arguments): int|float
    {
        // Necesitamos agregar el namespace completo de la clase
        $classname = '\\App\\Strategies\\' . ucfirst($method) . 'Strategy';

        // list($a, $b) = $arguments; [] hace lo mismo que list, pero es más corto.
        [$a, $b] = $arguments;

        /** @var OperationInterface $instance */
        $instance = new $classname();
        $this->setOperation($instance);

        return $this->execute($a, $b);
    }
}
