<?php

/**
 * Pascal's Triangle II.
 *
 * Given an integer rowIndex, return the rowIndexth (0-indexed) row of the Pascal's triangle.
 * In Pascal's triangle, each number is the sum of the two numbers directly above it.
 *
 * Example 1:
 * Input: rowIndex = 3
 * Output: [1,3,3,1]
 *
 * Example 2:
 * Input: rowIndex = 0
 * Output: [1]
 *
 * Example 3:
 * Input: rowIndex = 1
 * Output: [1,1]
 *
 * Constraints: 0 <= rowIndex <= 33
 */

class Solution {

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     * @throws Exception
     */
    public function getRow(int $rowIndex): array
    {
        if ($rowIndex < 0 || 33 < $rowIndex) {
            throw new \Exception('Invalid row index.');
        }

        if ($rowIndex === 0) {
            return [1];
        }

        // Формула для конкретного элемента C = n! / (k! * (n - k)!). n - номер строки, к - номер элемента.
        $rowFactorial = $this->factorial($rowIndex);

        $rowElemCount = $rowIndex + 1; // Количество элементов в строке.

        $result = [1]; // Т.к. первый элемент всегда будет равен 1.
        for ($colIndex = 1; $colIndex < $rowElemCount-1; $colIndex++) {
            $colFactorial = $this->factorial($colIndex);

            $diff = $rowIndex - $colIndex;
            $diffFactorial = $this->factorial($diff);

            $elRes = $rowFactorial / ($colFactorial * $diffFactorial);

            $result[] = $elRes;
        }
        $result[] = 1; // Т.к. последний элемент всегда будет равен 1.

        return $result;
    }

    private function factorial(int $n): int
    {
        if (($n < 0) || ($n == 0)) {
            return 1;
        }

        $i = 1;
        $factorial = 1;
        while ($i <= $n) {
            $factorial *=$i;
            $i++;
        }
        return $factorial;
    }
}

$obj = new Solution();
$ex1 = $obj->getRow(3);
print_r($ex1);

$ex2 = $obj->getRow(0);
print_r($ex2);

$ex3 = $obj->getRow(1);
print_r($ex3);

$ex4 = $obj->getRow(8);
print_r($ex4);