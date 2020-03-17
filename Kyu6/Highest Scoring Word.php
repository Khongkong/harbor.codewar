<?php
/*
    Given a string of words, you need to find the highest scoring word.

    Each letter of a word scores points according to its position in the alphabet: a = 1, b = 2, c = 3 etc.

    You need to return the highest scoring word as a string.

    If two words score the same, return the word that appears earliest in the original string.

    All letters will be lowercase and all inputs will be valid.
*/

function high($x) {
    $x = strtolower($x);
    $words = explode(" ", $x);
    
    $maxWord = $words[0];
    $maxWordCount = wordCount($words[0]);
    foreach($words as &$word){
        if($maxWordCount < wordCount($word)){
            $maxWord = $word;
            $maxWordCount = wordCount($word);
        }
    }
    return $maxWord;
}
  
function wordCount($word){
    $result = 0;
    for($chrIndex = 0; $chrIndex < strlen($word); $chrIndex++){
        $result += ord($word[$chrIndex]) - ord("a") + 1;
    }
    return $result;
}

// simple tests
assert('taxi' === high('man i need a taxi up to ubud'));
assert('volcano' === high('what time are we climbing up the volcano'));
assert('semynak' === high('take me to semynak'));