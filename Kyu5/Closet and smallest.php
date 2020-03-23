<?php
/*
    For each number in strng calculate its "weight" and then find two numbers of strng that have:

    the smallest difference of weights ie that are the closest
    with the smallest weights
    and with the smallest indices (or ranks, numbered from 0) in strng
    Output:

    an array of two arrays, each subarray in the following format:
    [number-weight, index in strng of the corresponding number, original corresponding number instrng]

    or a pair of two subarrays (Haskell, Clojure, FSharp) or an array of tuples (Elixir, C++)

    or a (char*) in C mimicking an array of two subarrays or a string

    or a matrix in R (2 rows, 3 columns, no columns names)

    The two subarrays are sorted in ascending order by their number weights if these weights are different, by their indexes in the string if they have the same weights.

    Examples:

    Let us call that function closest

    strng = "103 123 4444 99 2000"
    the weights are 4, 6, 16, 18, 2 (ie 2, 4, 6, 16, 18)

    closest should return [[2, 4, 2000], [4, 0, 103]] (or ([2, 4, 2000], [4, 0, 103])
    or [{2, 4, 2000}, {4, 0, 103}] or ... depending on the language)
    because 2000 and 103 have for weight 2 and 4, ther indexes in strng are 4 and 0.
    The smallest difference is 2.
    4 (for 103) and 6 (for 123) have a difference of 2 too but they are not 
    the smallest ones with a difference of 2 between their weights.
    ....................

    strng = "80 71 62 53"
    All the weights are 8.
    closest should return [[8, 0, 80], [8, 1, 71]]
    71 and 62 have also:
    - the smallest weights (which is 8 for all)
    - the smallest difference of weights (which is 0 for all pairs)
    - but not the smallest indices in strng.
    ....................

    strng = "444 2000 445 544"
    the weights are 12, 2, 13, 13 (ie 2, 12, 13, 13)

    closest should return [[13, 2, 445], [13, 3, 544]] or ([13, 2, 445], [13, 3, 544])
    or [{13, 2, 445}, {13, 3, 544}] or ...
    444 and 2000 have the smallest weights (12 and 2) but not the smallest difference of weights;
    they are not the closest.
    Here the smallest difference is 0 and in the result the indexes are in ascending order.
    ...................

    closest("444 2000 445 644 2001 1002") --> [[3, 4, 2001], [3, 5, 1002]] or ([3, 4, 2001], 
    [3, 5, 1002]]) or [{3, 4, 2001}, {3, 5, 1002}] or ...
    Here the smallest difference is 0 and in the result the indexes are in ascending order.
    ...................

    closest("239382 162 254765 182 485944 468751 49780 108 54")
    The weights are: 27, 9, 29, 11, 34, 31, 28, 9, 9.
    closest should return  [[9, 1, 162], [9, 7, 108]] or ([9, 1, 162], [9, 7, 108]) 
    or [{9, 1, 162}, {9, 7, 108}] or ...
    108 and 54 have the smallest difference of weights too, they also have 
    the smallest weights but they don't have the smallest ranks in the original string.
    ..................

    closest("54 239382 162 254765 182 485944 468751 49780 108")
    closest should return  [[9, 0, 54], [9, 2, 162]] or ([9, 0, 54], [9, 2, 162])
    or [{9, 0, 54}, {9, 2, 162}] or ...
*/

function closest($str) {
    if($str == ""){ 
        return array(); 
    }
    $a = explode(" ", $str);
    $b = array();
    foreach($a as $key => $val){
        $b[] = array(array_sum(str_split($val)), $key, $val);
    }
    
    usort($b, function($x, $y){
        if ($x[0] == $y[0]) {
            if ($x[1] == $y[1]) {
                return 0;
            }else{
                return ($x[1] < $y[1]) ? -1 : 1;
            }
        }
        return ($x[0] < $y[0]) ? -1 : 1;
    });
    $first = $b[0];
    $second = $b[1];
    $close = $second[0] - $first[0];
    $len = count($a);
    for($i = 1; $i < $len - 1; $i++){
        if($b[$i + 1][0] - $b[$i][0] < $close){
            $first = $b[$i];
            $second = $b[$i + 1];
            $close = $second[0] - $first[0];
        }
    }
    return array($first, $second);
}

// simple test
assert(closest("") == []);
assert(closest("456899 50 11992 176 272293 163 389128 96 290193 85 52") == [[13, 9, 85], [14, 3, 176]]);
assert(closest("239382 162 254765 182 485944 134 468751 62 49780 108 54") == [[8, 5, 134], [8, 7, 62]]);
assert(closest("241259 154 155206 194 180502 147 300751 200 406683 37 57") == [[10, 1, 154], [10, 9, 37]]);
assert(closest("89998 187 126159 175 338292 89 39962 145 394230 167 1") == [[13, 3, 175], [14, 9, 167]]);
assert(closest("462835 148 467467 128 183193 139 220167 116 263183 41 52") == [[13, 1, 148], [13, 5, 139]]);