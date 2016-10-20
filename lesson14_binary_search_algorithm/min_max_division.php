<?php

/**
 * You are given integers K, M and a non-empty zero-indexed array A consisting of N integers. Every element of the array is not greater than M.
 *
 * You should divide this array into K blocks of consecutive elements. The size of the block is any integer between 0 and N. Every element of the array should belong to some block.
 *
 * The sum of the block from X to Y equals A[X] + A[X + 1] + ... + A[Y]. The sum of empty block equals 0.
 *
 * The large sum is the maximal sum of any block.
 *
 * For example, you are given integers K = 3, M = 5 and array A such that:
 *
 * A[0] = 2
 * A[1] = 1
 * A[2] = 5
 * A[3] = 1
 * A[4] = 2
 * A[5] = 2
 * A[6] = 2
 * The array can be divided, for example, into the following blocks:
 *
 * [2, 1, 5, 1, 2, 2, 2], [], [] with a large sum of 15;
 * [2], [1, 5, 1, 2], [2, 2] with a large sum of 9;
 * [2, 1, 5], [], [1, 2, 2, 2] with a large sum of 8;
 * [2, 1], [5, 1], [2, 2, 2] with a large sum of 6.
 * The goal is to minimize the large sum. In the above example, 6 is the minimal large sum.
 *
 * Write a function:
 *
 * function solution($K, $M, $A);
 * that, given integers K, M and a non-empty zero-indexed array A consisting of N integers, returns the minimal large sum.
 *
 * For example, given K = 3, M = 5 and array A such that:
 *
 * A[0] = 2
 * A[1] = 1
 * A[2] = 5
 * A[3] = 1
 * A[4] = 2
 * A[5] = 2
 * A[6] = 2
 * the function should return 6, as explained above.
 *
 * Assume that:
 *
 * N and K are integers within the range [1..100,000];
 * M is an integer within the range [0..10,000];
 * each element of array A is an integer within the range [0..M].
 * Complexity:
 *
 * expected worst-case time complexity is O(N*log(N+M));
 * expected worst-case space complexity is O(1), beyond input storage (not counting the storage required for input arguments).
 * Elements of input arrays can be modified.
 */

function devide($K, $M, &$A) {
    $divided = [];
//    $step = intval(count($A) / $K);
//    for ($i = 0; $i < $K; $i++) {
//        if (count($A) >= ($step * ($i + 1))) {
//            if ($i === $K - 1) {
//                $divided[] = array_slice($A, $step * $i);
//            } else {
//                $divided[] = array_slice($A, $step * $i, $step);
//            }
//        } else {
//            $divided[] = [];
//        }
//    }

    $indexOfMax = array_search($M, $A);
    if ($indexOfMax === 0) {
        $divided[] = [$M];
    } else if ($indexOfMax === (count($A) - 1)) {
        $divided[] = [$M];
    } else {
        $divided[] = array_slice($A, 0, $indexOfMax);
        $divided[] = [$M];
        $divided[] = array_slice($A, $indexOfMax + 1);
    }
//    $step = intval(count($A) / $K);
//    for ($i = 0; $i < $K; $i++) {
//        if (count($A) >= ($step * ($i + 1))) {
//            if ($i === $K - 1) {
//                $divided[] = array_slice($A, $step * $i);
//            } else {
//                $divided[] = array_slice($A, $step * $i, $step);
//            }
//        } else {
//            $divided[] = [];
//        }
//    }
    return $divided;
}

function solution($K, $M, $A)
{
    $divided = devide($K, $M, $A);

    var_dump($divided);
}

//print solution(3, 5, [2, 1, 5, 1, 2, 2, 2]) . "\n";
//print solution(3, 5, [5, 1, 2, 1, 2, 2, 2]) . "\n";
print solution(3, 5, [2, 1, 1, 1, 2, 2, 5]) . "\n";

