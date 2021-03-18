<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Game\game;

const TARGET = 'What number is missing in the progression?';

function generateProgression($initial, $step, $length)
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $initial + $step * $i;
    }
    return $progression;
}

function hideItemByKey($key, $progression, $replacement = '..')
{
    $result = $progression;
    $result[$key] = $replacement;
    return $result;
}

function run()
{
    $getTask = function () {
        $initial = random_int(1, 20);
        $step = random_int(1, 10);
        $length = random_int(5, 15);
        $progression = generateProgression($initial, $step, $length);
        $hiddenItemKey = array_rand($progression, 1);
        $question = implode(' ', hideItemByKey($hiddenItemKey, $progression));
        $answer = (string)$progression[$hiddenItemKey];
        return [$question, $answer];
    };
    game($getTask, TARGET);
}
