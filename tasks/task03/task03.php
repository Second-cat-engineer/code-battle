<?php

function solution($first, $second)
{
    $position = strpos($first, $second, 0);
    if ($position === false) {
        return -1;
    }

    return $position;
}

echo solution("test", "t");