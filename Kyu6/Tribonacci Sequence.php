<?php
/*
    Well met with Fibonacci bigger brother, AKA Tribonacci.

    As the name may already reveal, it works basically like a Fibonacci, but summing the last 3 (instead of 2) numbers of the sequence to generate the next. And, worse part of it, regrettably I won't get to hear non-native Italian speakers trying to pronounce it :(

    So, if we are to start our Tribonacci sequence with [1, 1, 1] as a starting input (AKA signature), we have this sequence:

    [1, 1 ,1, 3, 5, 9, 17, 31, ...]
    But what if we started with [0, 0, 1] as a signature? As starting with [0, 1] instead of [1, 1] basically shifts the common Fibonacci sequence by once place, you may be tempted to think that we would get the same sequence shifted by 2 places, but that is not the case and we would get:

    [0, 0, 1, 1, 2, 4, 7, 13, 24, ...]
    Well, you may have guessed it by now, but to be clear: you need to create a fibonacci function that given a signature array/list, returns the first n elements - signature included of the so seeded sequence.
*/

function tribonacci($signature, $n) {
    $result = $signature;
    $w = $signature[0];
    $x = $signature[1];
    $y = $signature[2];
    $z = 0;
    if($n >= 3){
        for($i = 0; $i < $n - 3; $i++){
            $z = $w + $x + $y;
            array_push($result, $z);
            $w = $x;
            $x = $y;
            $y = $z;
        }
    }else{
        return array_slice($result, 0, $n);
    }
    return $result;
}

// simple tests
assert([1,1,1,3,5,9,17,31,57,105] === tribonacci([1,1,1],10));
assert([0,0,1,1,2,4,7,13,24,44] === tribonacci([0,0,1],10));
assert([0,1,1,2,4,7,13,24,44,81] === tribonacci([0,1,1],10));
assert([1,0,0,1,1,2,4,7,13,24] === tribonacci([1,0,0],10));
assert([0,0,0,0,0,0,0,0,0,0] === tribonacci([0,0,0],10));
assert([1,2,3,6,11,20,37,68,125,230] === tribonacci([1,2,3],10));
assert([3,2,1,6,9,16,31,56,103,190] === tribonacci([3,2,1],10));
assert([1] === tribonacci([1,1,1],1));
assert([] === tribonacci([300,200,100],0));
assert([0.5,0.5,0.5,1.5,2.5,4.5,8.5,15.5,28.5,52.5,96.5,177.5,326.5,600.5,1104.5,2031.5,3736.5,6872.5,12640.5,23249.5,42762.5,78652.5,144664.5,266079.5,489396.5,900140.5,1655616.5,3045153.5,5600910.5,10301680.5] === tribonacci([0.5,0.5,0.5],30));


