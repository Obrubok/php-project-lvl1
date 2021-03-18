<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Game\game;

const TARGET = 'Answer "yes" if the number is prime, otherwise answer "no".';

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2, $max = (int)sqrt($number); $i <= $max; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function run()
{
    $getTask = function () {
        $question = random_int(1, 100);
        $answer = isPrime($question) ? 'yes' : 'no';
        return [$question, $answer];
    };
    game($getTask, TARGET);
}
