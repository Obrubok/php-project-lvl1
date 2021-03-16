<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Game\game;

function even()
{
    $target = 'Answer "yes" if the number is even, otherwise answer "no".';
    $rounds = 3;
    $isEven = function ($num) {
        return $num % 2 === 0;
    };
    $getTask = function () use ($isEven) {
        $minNum = 1;
        $maxNum = 100;
        $question = random_int($minNum, $maxNum);
        $answer = $isEven($question) ? 'yes' : 'no';
        return [$question, $answer];
    };
    $getParams = function () use ($target, $getTask, $rounds) {
        return [$target, $getTask, $rounds];
    };
    game($getParams);
}
