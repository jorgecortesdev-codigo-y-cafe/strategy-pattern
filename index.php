<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Calculator;

$calculator = new Calculator();
$result = $calculator->addition(5, 3);

var_dump($result);

$result = $calculator->subtraction(5, 3);

var_dump($result);

$result = $calculator->multiplication(5, 3);

var_dump($result);
