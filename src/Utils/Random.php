<?php

namespace Brain\Games\Utils\Random;

function genRandNumber($min = 1, $max = 100): int
{
    return random_int($min, $max);
}

function genRandPairOfNumbers($min = 1, $max = 100): array
{
    $num1 = genRandNumber($min, $max);
    $num2 = genRandNumber($min, $max);

    return [$num1, $num2];
}

function getRandArrayElem(array $array): mixed
{
    $index = array_rand($array, 1);
    return $array[$index];
}
