<?php

function solution($cups)
{
    return $cups + floor($cups/6);
}

echo solution(12) . "\n";
echo solution(831);