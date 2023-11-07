<?php

declare(strict_types=1);

namespace Tests;

use App\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /** @test */
    public function it_can_sum(): void
    {
        $calculator = new Calculator();

        $result = $calculator->addition(5, 3);

        $this->assertEquals(8, $result);
    }

    /** @test */
    public function it_can_subtract(): void
    {
        $calculator = new Calculator();

        $result = $calculator->subtraction(5, 3);

        $this->assertEquals(2, $result);
    }

    /** @test */
    public function it_can_multiply(): void
    {
        $calculator = new Calculator();

        $result = $calculator->multiplication(5, 3);

        $this->assertEquals(15, $result);
    }
}
