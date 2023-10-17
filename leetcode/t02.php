<?php
/**
 * Add Two Numbers.
 *
 * You are given two non-empty linked lists representing two non-negative integers.
 * The digits are stored in reverse order, and each of their nodes contains a single digit.
 * Add the two numbers and return the sum as a linked list.
 *
 * You may assume the two numbers do not contain any leading zero, except the number 0 itself.
 *
 * Example 1:
        Input: l1 = [2,4,3], l2 = [5,6,4]
        Output: [7,0,8]
        Explanation: 342 + 465 = 807.
 *
 * Example 2:
    Input: l1 = [0], l2 = [0]
    Output: [0]
 *
 * Example 3:
    Input: l1 = [9,9,9,9,9,9,9], l2 = [9,9,9,9]
    Output: [8,9,9,9,0,0,0,1]
 *
 * Constraints:
 * The number of nodes in each linked list is in the range [1, 100].
 * 0 <= Node.val <= 9
 * It is guaranteed that the list represents a number that does not have leading zeros.
 */

class Solution {
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode
    {
        $l1Arr = $this->convertListToArray($l1);
        $l2Arr = $this->convertListToArray($l2);

        $baseArray = count($l1Arr) > count($l2Arr) ? $l1Arr : $l2Arr;
        $secondArray = count($l1Arr) > count($l2Arr) ? $l2Arr : $l1Arr;

        $ost = null;
        foreach ($baseArray as $key => $value) {
            $secondElem = $secondArray[$key] ?? null;
            if ($secondElem === null) {
                if ($ost === null) {
                    continue;
                } else {
                    $sum2 = $value + $ost;
                    if ($sum2 >= 10) {
                        $sum2 = $sum2 - 10;
                        $baseArray[$key] = $sum2;
                        $ost = 1;
                    } else {
                        $baseArray[$key] = $sum2;
                        $ost = null;
                    }
                }
            } else {
                $sum = $secondElem + $value;
                if ($ost !== null) {
                    $sum = $sum + $ost;
                }

                if ($sum >= 10) {
                    $sum = $sum-10;
                    $ost = 1;
                } else {
                    $ost = null;
                }

                $baseArray[$key] = $sum;
            }
        }

        if ($ost !== null) {
            $baseArray[] = $ost;
        }

        return $this->convertArrayToList(array_reverse($baseArray));
    }

    private function convertListToArray(ListNode $listNode): array
    {
        $res = [];
        $res[] = $listNode->val;
        if ($listNode->next !== null) {
            $getNext = $this->convertListToArray($listNode->next);
            $res = array_merge($res, $getNext);
        }
        return $res;
    }

    public function convertArrayToList(array $arr): ListNode
    {
        $firstKey = array_key_first($arr);
        $value = $arr[$firstKey];
        unset($arr[$firstKey]);

        if (count($arr) >= 1) {
            $next = $this->convertArrayToList($arr);
        } else {
            $next = null;
        }
        return new ListNode($value, $next);
    }
}

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

$arr1 = [2,4,9];
$arr2 = [5,6,4,9];
$obj = new Solution();
$list1 = $obj->convertArrayToList($arr1);
$list2 = $obj->convertArrayToList($arr2);

$res = $obj->addTwoNumbers($list1, $list2);
print_r($res);


