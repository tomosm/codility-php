<?php

/**
 * A string S consisting of N characters is considered to be properly nested if any of the following conditions is true:
 *
 * S is empty;
 * S has the form "(U)" or "[U]" or "{U}" where U is a properly nested string;
 * S has the form "VW" where V and W are properly nested strings.
 * For example, the string "{[()()]}" is properly nested but "([)()]" is not.
 *
 * Write a function:
 *
 * function solution($S);
 * that, given a string S consisting of N characters, returns 1 if S is properly nested and 0 otherwise.
 *
 * For example, given S = "{[()()]}", the function should return 1 and given S = "([)()]", the function should return 0, as explained above.
 *
 * Assume that:
 *
 * N is an integer within the range [0..200,000];
 * string S consists only of the following characters: "(", "{", "[", "]", "}" and/or ")".
 * Complexity:
 *
 * expected worst-case time complexity is O(N);
 * expected worst-case space complexity is O(N) (not counting the storage required for input arguments).
 */

// https://codility.com/demo/results/trainingNB7FDD-P9G/

function solution($S)
{
    $openCombinations = ["(" => ")", "[" => "]", "{" => "}"];
    $closeCombinations = [")" => "(", "]" => "[", "}" => "{"];
    $stack = [];
    for ($i = 0, $l = strlen($S); $i < $l; $i++) {
        $c = $S[$i];
        if (!empty($openCombinations[$c])) {
            $stack[] = $c;
        } else if (!empty($closeCombinations[$c])) {
            $previous = array_pop($stack);
            if ($previous !== $closeCombinations[$c]) {
                return 0;
            }
        } else {
            return 0;
        }
    }
    return count($stack) === 0 ? 1 : 0;
}

print solution("") . "\n";
print solution("{[()()]}") . "\n";
print solution("([)()]") . "\n";
print solution("{{{{") . "\n";
