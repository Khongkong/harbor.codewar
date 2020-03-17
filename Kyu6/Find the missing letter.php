<?php
/*
    #Find the missing letter

    Write a method that takes an array of consecutive (increasing) letters as input and that returns the missing letter in the array.

    You will always get an valid array. And it will be always exactly one letter be missing. The length of the array will always be at least 2.
    The array will always contain letters in only one case.

    Example:

    ['a','b','c','d','f'] -> 'e' 
    ['O','Q','R','S'] -> 'P'
*/

function find_missing_letter(array $chrs): string {
    $chrOrderCheck = ord($chrs[0]);
    
    $missingChr = "";
    foreach($chrs as $key => $chr){
        if(ord($chr) - $chrOrderCheck != $key){
            $missingChr .= chr($chrOrderCheck + $key);
            $chrOrderCheck += 1;
        }
    }
    return $missingChr;
}

// simple tests
assert("e" === find_missing_letter(['a','b','c','d','f']));
assert("P" === find_missing_letter(["O", "Q", "R", "S"]));

