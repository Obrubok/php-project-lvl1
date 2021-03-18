<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Game\game;

const TARGET = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];

function calculate(int $number1, int $number2, string $operation): int
{
    return match ($operation) {
        '+' => $number1 + $number2,
        '-' => $number1 - $number2,
        '*' => $number1 * $number2
    };
}

function run(): void
{
    $getTask = function (): array {
        $number1 = random_int(1, 100);
        $number2 = random_int(1, 100);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $question = "{$number1} {$operator} {$number2}";
        $answer = (string)calculate($number1, $number2, $operator);
        return [$question, $answer];
    };
    game($getTask, TARGET);
}
