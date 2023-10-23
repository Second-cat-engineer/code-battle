<?php

/**
 * Longest Palindromic Substring
 *
 * Given a string s, return the longest palindromic substring in s.
 *
 * Example 1:
    Input: s = "babad"
    Output: "bab"
    Explanation: "aba" is also a valid answer.
 *
 * Example 2:
    Input: s = "cbbd"
    Output: "bb"
 *
 * Constraints:
    1 <= s.length <= 1000
    s consist of only digits and English letters.
 *
 */
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        $strLen = strlen($s);
        if ($strLen < 1) {
            return "";
        }

        $chars = str_split($s); //разбить на символы
        $charsCount = count($chars);

        $maxPalindrome = '';
        for ($i = 0; $i < $charsCount; $i++) {
            $newStr = $chars[$i];
            if (strlen($maxPalindrome) === 0) {
                $maxPalindrome = $newStr;
            }

            for ($j = $i+1; $j < $charsCount; $j++) {
                $newStr .= $chars[$j];

                if (strrev($newStr) === $newStr) {
                    if (strlen($maxPalindrome) < strlen($newStr)) {
                        $maxPalindrome = $newStr;
                    }
                }
            }
        }

        return $maxPalindrome;
    }
}

$s = 'a';
$obj = new Solution();
$res = $obj->longestPalindrome($s);

print_r([$res]);