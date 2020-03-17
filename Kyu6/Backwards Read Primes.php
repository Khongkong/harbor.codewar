<?php
/*
    Backwards Read Primes are primes that when read backwards in base 10 (from right to left) are a different prime. (This rules out primes which are palindromes.)

    Examples:
    13 17 31 37 71 73 are Backwards Read Primes
    13 is such because it's prime and read from right to left writes 31 which is prime too. Same for the others.

    Task

    Find all Backwards Read Primes between two positive given numbers (both inclusive), the second one always being greater than or equal to the first one. The resulting array or the resulting string will be ordered following the natural order of the prime numbers.

    Example

    backwardsPrime(2, 100) => [13, 17, 31, 37, 71, 73, 79, 97] backwardsPrime(9900, 10000) => [9923, 9931, 9941, 9967] backwardsPrime(501, 599) => []

    Note for Forth

    Return only the first backwards-read prime between start and end or 0 if you don't find any

    backwardsPrime(2, 100) => [13, 17, 31, 37, 71, 73, 79, 97] 
    backwardsPrime(9900, 10000) => [9923, 9931, 9941, 9967]
*/

function backwardsPrime($start, $stop){
    $result = array();
    for($num = $start; $num <= $stop; $num++){
        $reverseNum = intval(strrev($num));
        if($num !== $reverseNum){
            if(is_prime($num) && is_prime($reverseNum)){
                $result[] = $num;
            }
        }
    }
    return $result;
}

function is_prime($n){
    if($n == 2 || $n ==3){
        return true;
    }else{
        for($i = 2; $i <= round(sqrt($n)); $i++){
            if($n % $i == 0){
                return false;
            }
        }
        return true;
    }
}

// simple tests
$a = [7027, 7043, 7057];
$b = [70001, 70009, 70061, 70079, 70121, 70141, 70163, 70241];
$c = [70489, 70529, 70573, 70589];
assert(backwardsPrime(7000, 7100) == $a);
assert(backwardsPrime(70000, 70245) == $b);
assert(backwardsPrime(70485, 70600) == $c);