<?php
/*
    Task

    A rectangle with sides equal to even integers a and b is drawn on the Cartesian plane. Its center (the intersection point of its diagonals) coincides with the point (0, 0), but the sides of the rectangle are not parallel to the axes; instead, they are forming 45 degree angles with the axes.

    How many points with integer coordinates are located inside the given rectangle (including on its sides)?

    Example

    For a = 6 and b = 4, the output should be 23

    The following picture illustrates the example, and the 23 points are marked green.
*/

function rectangle_rotation($a, $b): int {
    $big = max($a, $b);
    $small = min($a, $b);
    $x1 = ($big - $small) * sqrt(2) / 4;
    $x2 = ($big + $small) * sqrt(2) / 4;
    $pointsAtAxis = 0;
    $halfPoints = 0;
    for($x = 0; $x <= floor($x1); $x++){
        if($x == 0){
            $pointsAtAxis += floor($small / sqrt(2)) - ceil(- $small / sqrt(2)) + 1;
        }else{
            $halfPoints += floor($x + $small / sqrt(2)) - ceil($x - $small / sqrt(2)) + 1;
        }
    }
    
    for($x = floor($x1) + 1; $x <= floor($x2); $x++){
        if($x == 0){
            $pointsAtAxis += floor($big / sqrt(2)) - ceil(- $small / sqrt(2)) + 1;
        }else{
            $halfPoints += floor($big / sqrt(2) - $x) - ceil($x - $small / sqrt(2)) + 1;
        }
    }
    return $pointsAtAxis + $halfPoints * 2;
}

//simple tests
assert(23 === rectangle_rotation(6, 4));
assert(65 === rectangle_rotation(30, 2));
assert(49 === rectangle_rotation(8, 6));
assert(333 === rectangle_rotation(16, 20));