<?php
/**
 * Longest Substring Without Repeating Characters
 *
 * Given a string s, find the length of the longest substring without repeating characters.
 *
 * Example 1:
    Input: s = "abcabcbb"
    Output: 3
    Explanation: The answer is "abc", with the length of 3.
 *
 * Example 2:
    Input: s = "bbbbb"
    Output: 1
    Explanation: The answer is "b", with the length of 1.
 *
 * Example 3:
    Input: s = "pwwkew"
    Output: 3
    Explanation: The answer is "wke", with the length of 3.
    Notice that the answer must be a substring, "pwke" is a subsequence and not a substring.
 *
 * Constraints:
 * 0 <= s.length <= 5 * 104
 * s consists of English letters, digits, symbols and spaces.
 */

class Solution {
    /**
     * @param String $s
     * @return int
     * @throws Exception
     */
    function lengthOfLongestSubstring(string $s): int
    {
        $strLen = strlen($s);
        if ($strLen === 0) {
            return 0;
        }
        $chars = str_split($s); //разбить на символы
        $charsCount = count($chars);

        $maxLength = 0;

        for ($i = 0; $i < $charsCount; $i++) {
            $length = 1;

            $arr = [];
            $arr[] = $chars[$i];

            for ($j = $i+1; $j < $charsCount; $j++) {
                $ch2 = $chars[$j];
                if (in_array($ch2, $arr)) {
                    break;
                } else {
                    $arr[] = $ch2;
                    $length++;
                }
            }

            if ($maxLength < $length) {
                $maxLength = $length;
            }
            if ($length + $i > $charsCount) {
                break;
            }

        }

        return $maxLength;
    }
}

$s = "abcabcbb";
$obj = new Solution();
$res = $obj->lengthOfLongestSubstring($s);
print_r($res);
