<?php
/*
    The marketing team is spending way too much time typing in hashtags.
    Let's help them with our own Hashtag Generator!

    Here's the deal:

    It must start with a hashtag (#).
    All words must have their first letter capitalized.
    If the final result is longer than 140 chars it must return false.
    If the input or the result is an empty string it must return false.
*/

function generateHashtag($str) {
    if($str != ""){
        $tag = str_replace(" ", "", ucWords($str));
        $tagLength = strlen($tag);
        if($tagLength != 0 && $tagLength < 140){
            return "#". $tag;
        }
    }
    return false;
}

// simple tests
assert('#Codewars' === generateHashtag('Codewars'));
assert('#Codewars' === generateHashtag('Codewars      '));
assert('#CodewarsIsNice' === generateHashtag('Codewars Is Nice'));
assert('#CodewarsIsNice' === generateHashtag('codewars is nice'));
assert('#CodeWars' === generateHashtag('Code' . str_repeat(' ', 140) . 'wars'));
assert("#A" . str_repeat("a", 138) === generateHashtag(str_repeat("a", 139)));
assert(false === generateHashtag(''));
assert(false === generateHashtag(str_repeat(' ', 200)));
assert(false === generateHashtag(str_repeat("a", 140)));
assert(false === generateHashtag('Looooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooong Cat'));