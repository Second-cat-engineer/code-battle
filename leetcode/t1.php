<?php
/**
 * Two Sum.
 *
 * Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.
 * You may assume that each input would have exactly one solution, and you may not use the same element twice.
 * You can return the answer in any order.
 *
 * Example 1:
        Input: nums = [2,7,11,15], target = 9
        Output: [0,1]
        Explanation: Because nums[0] + nums[1] == 9, we return [0, 1].
 *
 * Example 2:
        Input: nums = [3,2,4], target = 6
        Output: [1,2]
 *
 * Example 3:
        Input: nums = [3,3], target = 6
        Output: [0,1]
 *
 * Constraints:
 * 2 <= nums.length <= 10^4
 * -10^9 <= nums[i] <= 10^9
 * -10^9 <= target <= 10^9
 * Only one valid answer exists.
 */

class Solution
{
    /**
     * @param array $nums
     * @param int $target
     * @return array|null
     * @throws Exception
     */
    function twoSum(array $nums, int $target): ?array
    {
        $numsCount = count($nums);
        if ($numsCount <= 2 || $numsCount >= 10000) {
            throw new Exception('invalid nums');
        }

        $baseElemIndex = array_key_first($nums);
        while (true) {
            $baseElemValue = $nums[$baseElemIndex];

            for ($startIndex = $baseElemIndex + 1; $startIndex <= $numsCount-1; $startIndex++) {

                $sum = $baseElemValue + $nums[$startIndex];
                if ($sum === $target) {
                    return [$baseElemIndex, $startIndex];
                }
            }

            $baseElemIndex++;
            if ($baseElemIndex > $numsCount-1) {
                return null;
            }
        }
    }
}

$obj = new Solution();
$nums1 = [3, 7, 7, 11, 15, 2];
$target = 17;
$res = $obj->twoSum($nums1, $target);
print_r($res);