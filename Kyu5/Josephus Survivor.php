<?php
/* 
    josephus_survivor(7,3) => means 7 people in a circle;
    
    one every 3 is eliminated until one remains
    [1,2,3,4,5,6,7] - initial sequence
    [1,2,4,5,6,7] => 3 is counted out
    [1,2,4,5,7] => 6 is counted out
    [1,4,5,7] => 2 is counted out
    [1,4,5] => 7 is counted out
    [1,4] => 5 is counted out
    [4] => 1 counted out, 4 is the last element - the survivor!
*/

function josephus_survivor(int $num, int $k): int {
    $a = range(1, $num);
    $pivot = 0;
    while(count($a) > 1){
        $pivot += $k - 1;
        $pivot %= count($a);
        array_splice($a, $pivot, 1);
    }
    return $a[0];
}

// simple tests
assert(josephus_survivor(7, 3) === 4);
assert(josephus_survivor(1, 300) === 1);
assert(josephus_survivor(14, 2) === 13);
assert(josephus_survivor(100, 1) === 100);