<?php

// Определите, является ли переданное число совершенным. Положительное целое число является совершенным, если оно равно
// сумме своих собственных делителей (то есть всех положительных делителей, отличных от самого числа)

//Примеры:
//true  == solution(6)
//false  == solution(7)
//true  == solution(496)
//false  == solution(500)
//true  == solution(8128)

function solution($num)
{
    if ($num < 0) {
        return false;
    }

    $sum = 0;
    for ($i = 1; $i < $num; $i++) {
        if ($num % $i === 0) {
            $sum += $i;
        }
    }

    return $sum === $num;
}

echo solution(6) . "\n";
