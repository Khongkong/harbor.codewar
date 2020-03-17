<?php
/*
Finish the solution so that it takes an input n (integer) and returns a string that is the decimal representation of the number grouped by commas after every 3 digits.

Assume: 0 <= n < 2147483647

Examples

       1  ->           "1"
      10  ->          "10"
     100  ->         "100"
    1000  ->       "1,000"
   10000  ->      "10,000"
  100000  ->     "100,000"
 1000000  ->   "1,000,000"
35235235  ->  "35,235,235"
*/

function groupByCommas($n) {
    return number_format($n);
}

// simple tests
assert('1' === groupByCommas(1));
assert('10' === groupByCommas(10));
assert('100' === groupByCommas(100));
assert('1,000' === groupByCommas(1000));
assert('10,000' === groupByCommas(10000));
assert('100,000' === groupByCommas(100000));
assert('1,000,000' === groupByCommas(1000000));
assert('35,235,235' === groupByCommas(35235235));
