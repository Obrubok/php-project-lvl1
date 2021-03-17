<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Game\game;
use function Brain\Games\Utils\Random\{genRandPairOfNumbers, getRandArrayElem};

function calculate($num1, $num2, $operation)
{
    $result = match ($operation) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        '*' => $num1 * $num2
    };
    return (string)$result;
}

function question($min, $max)
{
    $operations = ['+', '-', '*'];
    [$operand1, $operand2] = genRandPairOfNumbers($min, $max);
    $operator = getRandArrayElem($operations);
    $questionString = "{$operand1} {$operator} {$operand2}";
    $question = [$operand1, $operand2, $operator];
    return [$question, $questionString];
}

function answer($question)
{
    [$operand1, $operand2, $operation] = $question;
    return calculate($operand1, $operand2, $operation);
}

function calc()
{
    $target = "What is the result of the expression?";
    $getTask = function () {
        $minNum = 1;
        $maxNum = 100;
        [$question, $questionString] = question($minNum, $maxNum);
        $answer = answer($question);
        return [$questionString, $answer];
    };
    game($getTask, $target);
}
