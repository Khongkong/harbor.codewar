<?php
/*
    Given a positive number n > 1 find the prime factor decomposition of n. The result will be a string with the following form :

    "(p1**n1)(p2**n2)...(pk**nk)"
    with the p(i) in increasing order and n(i) empty if n(i) is 1.

    Example: n = 86240 should return "(2**5)(5)(7**2)(11)"
*/

function primeFactors($n) {
    $number = $n;
    $primes = array();
    while($number !== 1){
        for($i = 2; $i <= $number; $i++){
            if($number % $i == 0){
                $number /= $i;
                // 原寫法 $primes[$i] += 1, 會跳出 Undefined offset. 原因是因為沒有確認 $primes[$i] 是否已經存在於 $primes 中
                $primes[$i] = isset($primes[$i])? $primes[$i] + 1: 1;
                break;
            }
        }
    }
    $result = "";
    foreach($primes as $prime => $times){
        if($times == 1){
            $result .= "($prime)";
        }else{
            $result .= "($prime**$times)";
        }
    }
    return $result;
}

// simple tests
assert(primeFactors(7775460) === "(2**2)(3**3)(5)(7)(11**2)(17)");
assert(primeFactors(7919) === "(7919)");
assert(primeFactors(17*17*93*677) === "(3)(17**2)(31)(677)");