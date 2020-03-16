<?php
/* 
Write a function called sumIntervals/sum_intervals() that accepts an array of intervals, and returns the sum of all the interval lengths. Overlapping intervals should only be counted once.

Intervals

Intervals are represented by a pair of integers in the form of an array. The first value of the interval will always be less than the second value. Interval example: [1, 5] is an interval from 1 to 5. The length of this interval is 4.

Overlapping Intervals

List containing overlapping intervals:

[
   [1,4],
   [7, 10],
   [3, 5]
]
The sum of the lengths of these intervals is 7. Since [1, 4] and [3, 5] overlap, we can treat the interval as [1, 5], which has a length of 4.

Examples:

sumIntervals( [
   [1,2],
   [6, 10],
   [11, 15]
] ); // => 9

sumIntervals( [
   [1,4],
   [7, 10],
   [3, 5]
] ); // => 7

sumIntervals( [
   [1,5],
   [10, 20],
   [1, 6],
   [16, 19],
   [5, 11]
] ); // => 19
*/
function sum_intervals(array $intervals): int {
    $queue = $intervals;
    sort($queue);
    $sum = 0;
    while($queue !== array()){
        $l = array_shift($queue);
        if($l[0] !== $l[1]){
            $sum += $l[1] - $l[0];
            foreach($queue as &$val){
                if($val[0] >= $l[0] && $val[0] <= $l[1]){
                    if($val[1] >= $l[1]){
                        $val[0] = $l[1];
                    }else{
                        $val[0] = $l[1];
                        $val[1] = $l[1];
                    }
                }
            }
        }
    }
    return $sum;
}

//simple tests

// Non-overlapping intervals
assert(4 === sum_intervals([[1, 5]]));
assert(8 === sum_intervals([
    [1, 5],
    [6, 10]
]));

// Overlapping intervals
assert(4 === sum_intervals([
    [1, 5],
    [1, 5]
]));
assert(7 === sum_intervals([
    [1, 4],
    [7, 10],
    [3, 5]
]));