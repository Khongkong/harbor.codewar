<?php
/*
    Write a function that accepts a square matrix (N x N 2D array) and returns the determinant of the matrix.

    How to take the determinant of a matrix -- it is simplest to start with the smallest cases:

    A 1x1 matrix |a| has determinant a.

    A 2x2 matrix [ [a, b], [c, d] ] or

    |a  b|
    |c  d|
    has determinant: a*d - b*c.

    The determinant of an n x n sized matrix is calculated by reducing the problem to the calculation of the determinants of n matrices ofn-1 x n-1 size.

    For the 3x3 case, [ [a, b, c], [d, e, f], [g, h, i] ] or

    |a b c|  
    |d e f|  
    |g h i|  
    the determinant is: a * det(a_minor) - b * det(b_minor) + c * det(c_minor) where det(a_minor) refers to taking the determinant of the 2x2 matrix created by crossing out the row and column in which the element a occurs:

    |- - -|
    |- e f|
    |- h i|  
    Note the alternation of signs.

    The determinant of larger matrices are calculated analogously, e.g. if M is a 4x4 matrix with first row [a, b, c, d], then:

    det(M) = a * det(a_minor) - b * det(b_minor) + c * det(c_minor) - d * det(d_minor)
*/

function determinant(array $matrix): int {
    $matrixSize = count($matrix);
    if($matrixSize != 1){
        $det = 0;
        $firstRow = $matrix[0];
        for($i = 0; $i < $matrixSize; $i++){
            $det += (-1) ** $i * $firstRow[$i] * determinant(kthMirror($i, $matrix));
        }
        return $det;
    }
    return $matrix[0][0];
}

function kthMirror($number, $matrix){
    $mirror = $matrix;
    array_shift($mirror);
    foreach($mirror as &$row){
        unset($row[$number]);
        $row = array_values($row);
    }
    return $mirror;
}

// simple tests
assert(1 == determinant([[1]]));
assert(-1 == determinant([
    [1, 3],
    [2, 5]
]));
assert(-20 == determinant([
    [2, 5, 3],
    [1, -2, -1],
    [1, 3, 4]
]));