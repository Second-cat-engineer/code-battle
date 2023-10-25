<?php

/**
 * Zigzag Conversion
 *
 * The string "PAYPALISHIRING" is written in a zigzag pattern on a given number of rows like this:
 * (you may want to display this pattern in a fixed font for better legibility)
 *
    P   A   H   N
    A P L S I I G
    Y   I   R
 *
 * And then read line by line: "PAHNAPLSIIGYIR"
 *
 * Write the code that will take a string and make this conversion given a number of rows:
 * string convert(string s, int numRows);
 *
 * Example 1:
        Input: s = "PAYPALISHIRING", numRows = 3
        Output: "PAHNAPLSIIGYIR"
 *
 * Constraints:
    1 <= s.length <= 1000
    s consists of English letters (lower-case and upper-case), ',' and '.'.
    1 <= numRows <= 1000
 */

/**
 * @param String $s
 * @param Integer $numRows
 * @return String
 */
function convert($s, $numRows) {
    $res = [];

    $i = 0;
    $progress = true;
    foreach (str_split($s) as $char) {
        $res[$i] .= $char;

        if ($progress) {
            $i++;
            if ($i === $numRows -1) {
                $progress = false;
            }
        } else {
            $i--;
            if ($i === 0) {
                $progress = true;
            }
        }
    }

    return implode('', $res);
}


$s = "PAYPALISHIRING"; //"PINALSIGYAHRPI"
$numRows = 4;

$res = convert($s, $numRows);
print_r($res);
