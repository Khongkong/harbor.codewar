<?php
/*
    Given an n x n array, return the array elements arranged from outermost elements to the middle element, traveling clockwise.

    array = [[1,2,3],
            [4,5,6],
            [7,8,9]]
    snail(array) #=> [1,2,3,6,9,8,7,4,5]
    For better understanding, please follow the numbers of the next array consecutively:

    array = [[1,2,3],
            [8,9,4],
            [7,6,5]]
    snail(array) #=> [1,2,3,4,5,6,7,8,9]
*/
function snail(array $a): array {
    $result = [];
    if($a == [[]]){
        return [];
    }
    while($a){
        for($i = 0; $i < count($a); $i++){
            $result[] = array_shift($a[0]);
        }
        array_shift($a);
        foreach($a as &$val){
            $result[] = array_pop($val);
        }
        $b = end($a);
        for($i = 0; $i < count($a); $i++){
            $result[] = array_pop($b);                
        }
        array_pop($a);
        $c = [];
        foreach($a as &$val){
            array_unshift($c, array_shift($val));
        }
        for($i = 0; $i < count($c); $i++){
            $result[] = $c[$i];
        }
    }
    return $result;
}

// simple tests
assert([1, 2, 3, 6, 9, 8, 7, 4, 5] == snail([
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
  ]));
  assert([1, 2, 3, 4, 5, 6, 7, 8, 9] ==snail([
    [1, 2, 3],
    [8, 9, 4],
    [7, 6, 5]
  ]));
  assert([1, 2, 3, 1, 4, 7, 7, 9, 8, 7, 7, 4, 5, 6, 9, 8] ==snail([
    [1, 2, 3, 1],
    [4, 5, 6, 4],
    [7, 8, 9, 7],
    [7, 8, 9, 7]
  ]));
  assert( [] == snail([[]]) );