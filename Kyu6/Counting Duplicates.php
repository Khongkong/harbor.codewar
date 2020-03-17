<?php
/*
    Count the number of Duplicates

    Write a function that will return the count of distinct case-insensitive alphabetic characters and numeric digits that occur more than once in the input string. The input string can be assumed to contain only alphabets (both uppercase and lowercase) and numeric digits.

    Example

    "abcde" -> 0 # no characters repeats more than once
    "aabbcde" -> 2 # 'a' and 'b'
    "aabBcde" -> 2 # 'a' occurs twice and 'b' twice (`b` and `B`)
    "indivisibility" -> 1 # 'i' occurs six times
    "Indivisibilities" -> 2 # 'i' occurs seven times and 's' occurs twice
    "aA11" -> 2 # 'a' and '1'
    "ABBA" -> 2 # 'A' and 'B' each occur twice
*/

function duplicateCount($text) {
    // exception 
    if($text == ""){
        return 0;
    }
    $chrs = str_split(strtolower($text), 1);
    
    $chrsCount = array();
    foreach($chrs as &$chr){
        $chrsCount[$chr] = isset($chrsCount[$chr])? $chrsCount[$chr] + 1: 1;
    }
    $result = array_filter($chrsCount, function($val){ return ($val > 1); });
    return count($result);
}

// simple tests
assert(0 == duplicateCount(""));
assert(0 == duplicateCount("abcde"));
assert(2 == duplicateCount("aabbcde"));
assert(2 == duplicateCount("aabBcde"),);
assert(1 == duplicateCount("Indivisibility"));
assert(2 == duplicateCount("Indivisibilities"));