<?php

namespace Brain\Games\Game;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function game(callable $getTask, string $target): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name? ', '', '');
    line('Hello, %s!', $name);
    line($target);
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $answer] = $getTask();
        line("Question: {$question}");
        $playerAnswer = mb_strtolower(trim(prompt('Your answer: ', '', '')));
        if ($playerAnswer !== $answer) {
            line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
            line("Let's try again, {$name}!");
            return;
        }
        line("Correct!");
    }
    line("Congratulations, {$name}!");
}
