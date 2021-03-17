<?php

namespace Brain\Games\Games\GCD;

use function Brain\Games\Game\game;
use function Brain\Games\Utils\Random\genRandPairOfNumbers;

function gcd($num1, $num2)
{
    return ($num1 % $num2) ? gcd($num2, $num1 % $num2) : (string)abs($num2);
}

function question($min, $max)
{
    [$num1, $num2] = genRandPairOfNumbers($min, $max);
    $questionString = "{$num1} {$num2}";
    $question = [$num1, $num2];
    return [$question, $questionString];
}

function answer($question)
{
    [$num1, $num2] = $question;
    return gcd($num1, $num2);
}

function runGcd()
{
    $target = "Find the greatest common divisor of given numbers.";
    $getTask = function () {
        $minNum = 1;
        $maxNum = 100;
        [$question, $questionString] = question($minNum, $maxNum);
        $answer = answer($question);
        return [$questionString, $answer];
    };
    game($getTask, $target);
}