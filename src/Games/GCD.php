<?php

namespace Brain\Games\Games\GCD;

use function Brain\Games\Game\game;

const TARGET = 'Find the greatest common divisor of given numbers.';

function gcd(int $number1, int $number2): int
{
    return ($number1 % $number2 !== 0) ? gcd($number2, $number1 % $number2) : abs($number2);
}

function run(): void
{
    $getTask = function (): array {
        $number1 = random_int(1, 100);
        $number2 = random_int(1, 100);
        $question = "{$number1} {$number2}";
        $answer = (string)gcd($number1, $number2);
        return [$question, $answer];
    };
    game($getTask, TARGET);
}
