<?php

function solution($sentence)
{
    $res = [];

    $words = explode(" ", $sentence);
    foreach ($words as $word) {
        $length = strlen($word);

        if ($length % 2 === 0) {
            $res[] = $word;
        }
    }

    return implode(" ", $res);
}

echo solution("some test words with odd length") . "\n";
echo solution("learn clojure be happy") . "\n";