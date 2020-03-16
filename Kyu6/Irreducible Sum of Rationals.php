<?php
/*
You will have a list of rationals in the form

lst = [ [numer_1, denom_1] , ... , [numer_n, denom_n] ]

where all numbers are positive integers. You have to produce their sum N / D in an irreducible form: this means that N and D have only 1 as a common divisor.

Return the result in the form [N, D]

Example:

[ [1, 2], [1, 3], [1, 4] ]  -->  [13, 12]
*/

function sumFracts($l) {
    $numer = 0;
    $denom = 1;
    
    foreach($l as list($a, $b)){
        $denom *= $b;
    }
    
    foreach($l as list($a, $b)){
        $numer += $a*$denom/$b;
    }
    
    if($numer % $denom == 0){
        return intval($numer/$denom);
    }else{
        $gcd = gcd($numer, $denom);
        $numer /= $gcd;
        $denom /= $gcd;
        return [$numer, $denom];
    }
    
}

function gcd($a,$b) {
    return ($a % $b) ? gcd($b,$a % $b) : $b;
}

// simple tests
assert(sumFracts([[1, 2], [1, 3], [1, 4]]) === [13, 12]); 
assert(sumFracts([[1, 3], [5, 3]]) === 2);
assert(sumFracts([[12, 3], [15, 3]]) === 9);
assert(sumFracts([[2, 7], [1, 3], [1, 12]]) === [59, 84]); 
