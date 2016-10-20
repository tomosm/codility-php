<?php

/**
 * A non-empty zero-indexed array A consisting of N integers is given. Array A represents numbers on a tape.
 *
 * Any integer P, such that 0 < P < N, splits this tape into two non-empty parts: A[0], A[1], ..., A[P − 1] and A[P], A[P + 1], ..., A[N − 1].
 *
 * The difference between the two parts is the value of: |(A[0] + A[1] + ... + A[P − 1]) − (A[P] + A[P + 1] + ... + A[N − 1])|
 *
 * In other words, it is the absolute difference between the sum of the first part and the sum of the second part.
 *
 * For example, consider array A such that:
 *
 * A[0] = 3
 * A[1] = 1
 * A[2] = 2
 * A[3] = 4
 * A[4] = 3
 * We can split this tape in four places:
 *
 * P = 1, difference = |3 − 10| = 7
 * P = 2, difference = |4 − 9| = 5
 * P = 3, difference = |6 − 7| = 1
 * P = 4, difference = |10 − 3| = 7
 * Write a function:
 *
 * function solution($A);
 * that, given a non-empty zero-indexed array A of N integers, returns the minimal difference that can be achieved.
 *
 * For example, given:
 *
 * A[0] = 3
 * A[1] = 1
 * A[2] = 2
 * A[3] = 4
 * A[4] = 3
 * the function should return 1, as explained above.
 *
 * Assume that:
 *
 * N is an integer within the range [2..100,000];
 * each element of array A is an integer within the range [−1,000..1,000].
 * Complexity:
 *
 * expected worst-case time complexity is O(N);
 * expected worst-case space complexity is O(N), beyond input storage (not counting the storage required for input arguments).
 * Elements of input arrays can be modified.
 */

// https://codility.com/demo/results/trainingJJVAKA-HGK/

function solution($A)
{
    $leftSum = $A[0];
    $rightSum = array_sum($A) - $leftSum;
    $minGap = abs($rightSum - $leftSum);
    for ($i = 1, $len = count($A) - 1; $i < $len; $i++) {
        $leftSum += $A[$i];
        $rightSum -= $A[$i];
        $currentGap = abs($rightSum - $leftSum);
        if ($currentGap < $minGap) {
            $minGap = $currentGap;
        }
    }

    return $minGap;
}

//function solution($A)
//{
//    $minValue = min($A);
//    $indexOfMinValue = array_search($minValue, $A);
//    switch ($indexOfMinValue) {
//        case 0:
//        case count($A) - 1;
//            if (abs($A[0] - array_sum(array_slice($A, 1))) > abs($A[count($A) - 1] - array_sum(array_slice($A, 0, count($A) - 1)))) {
//                return 1;
//            } else {
//                return count($A) - 1;
//            }
//            break;
//        default:
//            if (abs(array_sum(array_slice($A, 0, $indexOfMinValue + 1)) - array_sum(array_slice($A, $indexOfMinValue + 1)))
//                > abs(array_sum(array_slice($A, 0, $indexOfMinValue)) - array_sum(array_slice($A, $indexOfMinValue)))
//            ) {
//                return $indexOfMinValue + 1;
//            } else {
//                return $indexOfMinValue;
//            }
//            break;
//    }
//}

print solution([3, 1, 2, 4, 3]) . "\n";
print solution([1, 3, 2, 4, 3]) . "\n";
print solution([3, 3, 2, 4, 1]) . "\n";

