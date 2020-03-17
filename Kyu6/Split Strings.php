<?php
/*
    Complete the solution so that it splits the string into pairs of two characters. If the string contains an odd number of characters then it should replace the missing second character of the final pair with an underscore ('_').

    Examples:

    solution('abc') // should return ['ab', 'c_']
    solution('abcdef') // should return ['ab', 'cd', 'ef']
*/

function solution($str) {
    if(strlen($str) % 2 != 0){
      $str .= "_";
    }
    if($str == ""){
        return [];
    }
    return str_split($str, 2);
}

// simple tests
assert(["ab", "cd", "ef"] === solution("abcdef"));
assert(["ab", "cd", "ef", "g_"] === solution("abcdefg"));
assert([] === solution(""));