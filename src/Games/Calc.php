<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Game\game;

function calc()
{
    $target = 'What is the result of the expression?';
    $rounds = 3;
    $calculate = function ($num1, $num2, string $operation) {
        switch ($operation) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
        }

        return (string)$result;
    };
    $getTask = function () use ($calculate) {
        $operations = ['+', '-', '*'];
        $minNum = 1;
        $maxNum = 100;
        $operand1 = random_int($minNum, $maxNum);
        $operand2 = random_int($minNum, $maxNum);
        $operation = $operations[array_rand($operations, 1)];
        $question = "{$operand1} {$operation} {$operand2}";
        $answer = $calculate($operand1, $operand2, $operation);

        return [$question, $answer];
    };
    $getParams = function () use ($target, $getTask, $rounds) {
        return [$target, $getTask, $rounds];
    };
    game($getParams);
}
