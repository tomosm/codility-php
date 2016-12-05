<?php
/**
 * Two positive integers N and M are given. Integer N represents the number of chocolates arranged in a circle, numbered from 0 to N − 1.
 *
 * You start to eat the chocolates. After eating a chocolate you leave only a wrapper.
 *
 * You begin with eating chocolate number 0. Then you omit the next M − 1 chocolates or wrappers on the circle, and eat the following one.
 *
 * More precisely, if you ate chocolate number X, then you will next eat the chocolate with number (X + M) modulo N (remainder of division).
 *
 * You stop eating when you encounter an empty wrapper.
 *
 * For example, given integers N = 10 and M = 4. You will eat the following chocolates: 0, 4, 8, 2, 6.
 *
 * The goal is to count the number of chocolates that you will eat, following the above rules.
 *
 * Write a function:
 *
 * function solution($N, $M);
 * that, given two positive integers N and M, returns the number of chocolates that you will eat.
 *
 * For example, given integers N = 10 and M = 4. the function should return 5, as explained above.
 *
 * Assume that:
 *
 * N and M are integers within the range [1..1,000,000,000].
 * Complexity:
 *
 * expected worst-case time complexity is O(log(N+M));
 * expected worst-case space complexity is O(log(N+M)).
 */

// https://codility.com/demo/results/trainingGYREEA-Z9H/

function gcd($val1, $val2)
{
    $gcd = $val2;
    while (0 !== ($val1 % $val2)) {
        $gcd = $val1 % $val2;
        $val1 = $val2;
        $val2 = $gcd;
    }
    return $gcd;

}

// val1 * val2 / gcd;
function lcm($val1, $val2)
{
    return $val1 * $val2 / gcd($val1, $val2);
}

function solution($N, $M)
{
    return lcm($N, $M) / $M;
}

// test
print solution(10, 4) . "\n";
print solution(100, 4) . "\n";
print solution(101, 4) . "\n";

