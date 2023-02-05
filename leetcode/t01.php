<?php

//Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.

//An input string is valid if:
// Open brackets must be closed by the same type of brackets.
// Open brackets must be closed in the correct order.
// Every close bracket has a corresponding open bracket of the same type.

function isValid($s)
{
    $availableChars = ['(', ')', '{', '}', '[', ']'];

    $chars = str_split($s); //разбить на символы
    $sUniqueElemsCount = count(array_unique($chars));
    if ($sUniqueElemsCount > count($availableChars)) {
        return false;
    }

    $closedChars = [')', '}', ']'];
    $openedChars = ['(', '{', '['];
    $oppositions = [
        '(' => ')',
        '{' => '}',
        '[' => ']'
    ];

    $stack = [];
    foreach ($chars as $char) {
        if (in_array($char, $openedChars)) {
            $stack[] = $char;
            continue;
        }
        if (in_array($char, $closedChars)) {
            if (empty($stack)) {
                return false;
            }
            $lastKey = array_key_last($stack);
            $lastElem = $stack[$lastKey];
            if (in_array($lastElem, $openedChars) && $oppositions[$lastElem] === $char) {
                unset($stack[$lastKey]);
            } else {
                return false;
            }
        }
    }

    return empty($stack);
}

$s = '()[[{{(}))}}]]';
$res = isValid($s);
if ($res) {
    echo 'valid'."\n";
} else {
    echo 'nooooooo' . "\n";
}