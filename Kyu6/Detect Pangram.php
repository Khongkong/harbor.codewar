<?php
/*
    A pangram is a sentence that contains every single letter of the alphabet at least once. 
    
    For example, the sentence "The quick brown fox jumps over the lazy dog" is a pangram, because it uses the letters A-Z at least once (case is irrelevant).

    Given a string, detect whether or not it is a pangram. Return True if it is, False if not. Ignore numbers and punctuation.
*/

function detect_pangram($str) { 
    $list = [];
    $str = strtoupper($str);
    $length = strlen($str);
    for($i = 0; $i < $length; $i++){
        if(ord($str[$i]) >= ord("A") && ord($str[$i]) <= ord("Z")){
            $list[ord($str[$i])] = $str[$i];
        }
    }
    if(count($list) == 26){
        return true;
    }else{
        return false;
    }
}

// simple tests
#
 Pangrams:

$result3 = detect_pangram("The quick brown fox jumps over the lazy dog.");
assert(true === $result3);
$result4 = detect_pangram("1L%r+f4G!e7w V z q6M h4d F3b+t O2n e K^g+c#S^i4i X7c-u P5d7j Y6a(a B");
assert(true, $result4);

# Not pangrams:
$result1 = detect_pangram("A pangram is a sentence that contains every single letter of the alphabet at least once.");
assert(false === $result1 );
$result2 = detect_pangram("5B!e i J x*p F h d!A:o q D y n6L%u9i.G9f2g4C a h+K!m+z:R t!j:B w s C");
assert(false === $result2);