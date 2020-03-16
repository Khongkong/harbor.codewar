<?php
/* 
    n mathematics, a Diophantine equation is a polynomial equation, usually with two or more unknowns, such that only the integer solutions are sought or studied.

    In this kata we want to find all integers x, y (x >= 0, y >= 0) solutions of a diophantine equation of the form:

    x^2 - 4 * y^2 = n

    (where the unknowns are x and y, and n is a given positive number) in decreasing order of the positive xi.

    If there is no solution return [] or "[]" or "". (See "RUN SAMPLE TESTS" for examples of returns).

    Examples:
    solEquaStr(90005) --> "[[45003, 22501], [9003, 4499], [981, 467], [309, 37]]"
    solEquaStr(90002) --> "[]"

    Hint: x^2 - 4 * y^2 = (x - 2*y) * (x + 2*y)
*/

function solequa($n) {
    $result = array();
    $bound = floor(sqrt($n));
    for($i = 0; $i < $bound; $i++){
        if($n % ($i + 1) === 0 && $n/($i + 1) >= $i + 1){
            $u = $n/($i + 1);
            $v = $i + 1;
            if(is_x_and_y($u, $v)){
                $result[] = [($u + $v)/2, ($u - $v)/4];
            }
        }
    }
    return $result;
}

function is_x_and_y($u, $v){
     if(($u - $v) % 4 === 0 && ($u + $v) % 2 === 0){
        return true;
    }else{
        return false;
    }
}

// simple tests
assert(solequa(5) === [[3, 1]]);
assert(solequa(90002) === []);
assert(solequa(90005) === [[45003, 22501], [9003, 4499], [981, 467], [309, 37]]);
assert(solequa(9005) === [[4503, 2251], [903, 449]]);