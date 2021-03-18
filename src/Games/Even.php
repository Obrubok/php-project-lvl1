<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Game\game;

const TARGET = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($number)
{
    return $number % 2 === 0;
}

function run()
{
    $getTask = function () {
        $question = random_int(1, 100);
        $answer = isEven($question) ? 'yes' : 'no';
        return [$question, $answer];
    };
    game($getTask, TARGET);
}
