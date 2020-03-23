<?php
/*
    Common denominators

    You will have a list of rationals in the form

    { {numer_1, denom_1} , ... {numer_n, denom_n} } 
    or

    [ [numer_1, denom_1] , ... [numer_n, denom_n] ] 
    or

    [ (numer_1, denom_1) , ... (numer_n, denom_n) ] 
    where all numbers are positive ints.

    You have to produce a result in the form

    (N_1, D) ... (N_n, D) 
    or

    [ [N_1, D] ... [N_n, D] ] 
    or

    [ (N_1', D) , ... (N_n, D) ] 
    or

    {{N_1, D} ... {N_n, D}} 
    or

    "(N_1, D) ... (N_n, D)"
    depending on the language (See Example tests)

    in which D is as small as possible and

    N_1/D == numer_1/denom_1 ... N_n/D == numer_n,/denom_n.

    Example:
    convertFracs [(1, 2), (1, 3), (1, 4)] `shouldBe` [(6, 12), (4, 12), (3, 12)]
*/

function convertFrac($lst){
    $lst = array_map(function($val){ 
        return [$val[0] / gcd($val[0], $val[1]), $val[1] / gcd($val[0], $val[1])]; 
    }, $lst);
    $l = array_map(function($val){ 
        return $val[1]; 
    }, $lst);
    $lcm = lcm($l);
    $result = '';
    foreach($lst as $val){
        $a = $lcm / $val[1] * $val[0];
        $result .= "($a,$lcm)";
    }
    return $result;
}

function gcd($a, $b){
    if($a == 0){
        return $b;
    }
    return gcd($b % $a, $a);
}

function lcm($l){
    $r = 1;
    for($i = 0; $i < count($l); $i++){
        $r = ($r * $l[$i]) / gcd($r, $l[$i]);
    }
    return $r;
}

// simple tests

$lst = [ [1, 2], [1, 3], [1, 4] ];
assert(convertFrac($lst) == "(6,12)(4,12)(3,12)");
$lst = [ [69, 130], [87, 1310], [3, 4] ];
assert(convertFrac($lst) == "(18078,34060)(2262,34060)(25545,34060)");
$lst = [  ];
assert(convertFrac($lst) == "");
$lst = [ [77, 130], [84, 131], [3, 4] ];
assert(convertFrac($lst) == "(20174,34060)(21840,34060)(25545,34060)");