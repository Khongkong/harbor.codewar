<?php
/* 
    Once upon a time, on a way through the old wild mountainous west,…

    … a man was given directions to go from one point to another. The directions were "NORTH", "SOUTH", "WEST", "EAST". Clearly "NORTH" and "SOUTH" are opposite, "WEST" and "EAST" too.

    Going to one direction and coming back the opposite direction right away is a needless effort. Since this is the wild west, with dreadfull weather and not much water, it's important to save yourself some energy, otherwise you might die of thirst!

    How I crossed a mountain desert the smart way.

    The directions given to the man are, for example, the following (depending on the language):

    ["NORTH", "SOUTH", "SOUTH", "EAST", "WEST", "NORTH", "WEST"].
    
    You can immediatly see that going "NORTH" and immediately "SOUTH" is not reasonable, better stay to the same place! So the task is to give to the man a simplified version of the plan. A better plan in this case is simply:

    ["WEST"]

    Task

    Write a function dirReduc which will take an array of strings and returns an array of strings with the needless directions removed (W<->E or S<->N side by side).

    The Haskell version takes a list of directions with data Direction = North | East | West | South.
    The Clojure version returns nil when the path is reduced to nothing.
    The Rust version takes a slice of enum Direction {NORTH, SOUTH, EAST, WEST}.
*/

function dirReduc($a){
    $r = array();
    $l = array
        (
            "NORTH" => "SOUTH",
            "SOUTH" => "NORTH",
            "WEST" => "EAST",
            "EAST" => "WEST"
        );
        
    while($a !== array()){
        $x = array_shift($a);
        if($r && $l[end($r)] === $x){
            array_pop($r);
        }else{
            $r[] = $x;
        }
    }
    return $r;
}

// simple tests
$a = ["NORTH", "SOUTH", "SOUTH", "EAST", "WEST", "NORTH", "WEST"];
$b=["NORTH","SOUTH","SOUTH","EAST","WEST","NORTH"];
$c = ["NORTH","SOUTH","SOUTH","EAST","WEST","NORTH","NORTH"];

assert(dirReduc($a) === ["WEST"]);
assert(dirReduc($b) === []);
assert(dirReduc($c) === ["NORTH"]);