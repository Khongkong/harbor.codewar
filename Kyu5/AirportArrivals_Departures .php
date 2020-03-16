<?php
/* 
You notice that each flap character is on some kind of a rotor and the order of characters on each rotor is:

ABCDEFGHIJKLMNOPQRSTUVWXYZ ?!@#&()|<>.:=-+* /0123456789

And after a long while you deduce that the display works like this:

    Starting from the left, all rotors (from the current one to the end of the line) flap together until the left-most rotor character is correct.
    Then the mechanism advances by 1 rotor to the right...
    ...REPEAT this rotor procedure until the whole line is updated
    ...REPEAT this line procedure from top to bottom until the whole display is updated
    Example
    
    Consider a flap display with 3 rotors and one 1 line which currently spells CAT
    
    Step 1  (current rotor is 1)
    Flap x 1
    Now line says DBU
    Step 2  (current rotor is 2)
    Flap x 13
    Now line says DO)
    Step 3  (current rotor is 3)
    Flap x 27
    Now line says DOG
    This can be represented as
    
    lines  // array of strings. Each string is a display line of the initial configuration
    rotors // array of array-of-rotor-values. Each array-of-rotor-values is applied to the corresponding display line
    result // array of strings. Each string is a display line of the final configuration
    e.g.
    
    lines = ["CAT"]
    rotors = [[1,13,27]]
    result = ["DOG"]
    Kata Task
    
    Given the initial display lines and the rotor moves for each line, determine what the board will say after it has been fully updated.
    
    For your convenience the characters of each rotor are in the pre-loaded constant ALPHABET which is a string.
*/

function flap_display($lines, $rotors) {
    $characters = array(
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 
            'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
            'U', 'V', 'W', 'X', 'Y','Z', ' ', '?', '!', '@', 
            '#', '&', '(', ')', '|', '<', '>', '.', ':','=',
            '-', '+', '*', '/', '0', '1', '2', '3', '4', '5', 
            '6', '7', '8', '9'
        );
    $chrsNum = count($characters);
    
    // 每個字元各往後加多少次
    $totals = array();
    foreach($rotors as $key => $rotor){
        $totals[$key] = array();
        while($rotor !== array()){
            $a = array_pop($rotor);
            array_unshift($totals[$key], $a + array_sum($rotor));    
        }
    }
    $result = array();
    foreach($lines as $k => &$line){
        $total = $totals[$k];
        for($i = 0; $i < strlen($line); $i++){
            $b = (array_search($line[$i], $characters) + $total[$i]) % $chrsNum;
            $line[$i] = $characters[$b];
            
        }
    }
    return $lines;
}

//simple tests
assert(flap_display(["CAT"], [[1, 13, 27]]) === ["DOG"]);