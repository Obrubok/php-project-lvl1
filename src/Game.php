<?php

namespace Brain\Games\Game;

use function cli\line;
use function cli\prompt;

function game(callable $getParams)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name? ');
    line('Hello, %s!', $name);
    [$target, $getTask, $rounds] = $getParams();
    line($target);
    for ($i = 0; $i < $rounds; $i++) {
        [$question, $answer] = $getTask();
        line("Question: {$question}");
        $playerAnswer = mb_strtolower(trim(prompt('Your answer: ')));
        if ($playerAnswer !== $answer) {
            line("{$playerAnswer} is wrong answer ;(. Correct answer was '{$answer}'");
            line("Let's try again, {$name}");
            return;
        }
        line("Correct!");
    }
    line("Congratulations, {$name}!");
}
