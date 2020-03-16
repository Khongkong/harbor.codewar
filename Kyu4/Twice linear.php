<?php
/*
    Consider a sequence u where u is defined as follows:

    The number u(0) = 1 is the first one in u.
    For each x in u, then y = 2 * x + 1 and z = 3 * x + 1 must be in u too.
    There are no other numbers in u.
    Ex: u = [1, 3, 4, 7, 9, 10, 13, 15, 19, 21, 22, 27, ...]

    1 gives 3 and 4, then 3 gives 7 and 10, 4 gives 9 and 13, then 7 gives 15 and 22 and so on...

    Task:

    Given parameter n the function dbl_linear (or dblLinear...) returns the element u(n) of the ordered (with <) sequence u (so, there are no duplicates).

    Example:

    dbl_linear(10) should return 22
*/

function dblLinear($n) {
    $result = array(1);
    $a1 = 0; 
    $a2 = 0;
    $c =0;
    while($a1 + $a2 < $n + $c){
        $x = $result[$a1] * 2 + 1;
        $y = $result[$a2] * 3 + 1;
        if($x < $y){
            $result[] = $x;
            $a1++;
        }elseif($x > $y){
            $result[] = $y;
            $a2++;
        }else{
            $result[] = $x;
            $a1++;
            $a2++;
            $c++;
        }
    }
    return $result[$n];
}

// simple tests

assert(dblLinear(10) === 22);
assert(dblLinear(20) === 57);
assert(dblLinear(30) === 91);
assert(dblLinear(50) === 175);
assert(dblLinear(100) === 447);