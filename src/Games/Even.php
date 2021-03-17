<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Game\game;
use function Brain\Games\Utils\Random\genRandNumber;

function isEven($num)
{
    return $num % 2 === 0;
}

function question($min, $max)
{
    return genRandNumber($min, $max);
}

function answer($num)
{
    return isEven($num);
}

function runEven()
{
    $target = 'Answer "yes" if the number is even, otherwise answer "no".';
    $getTask = function () {
        $minNum = 1;
        $maxNum = 100;
        $question = question($minNum, $maxNum);
        $answer = answer($question) ? 'yes' : 'no';
        return [$question, $answer];
    };
    game($getTask, $target);
}
