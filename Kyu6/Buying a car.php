<?php
/*
    Let us begin with an example:

    A man has a rather old car being worth $2000. He saw a secondhand car being worth $8000. He wants to keep his old car until he can buy the secondhand one.

    He thinks he can save $1000 each month but the prices of his old car and of the new one decrease of 1.5 percent per month. Furthermore this percent of loss increases of 0.5 percent at the end of every two months. Our man finds it difficult to make all these calculations.

    Can you help him?

    How many months will it take him to save up enough money to buy the car he wants, and how much money will he have left over?

    Parameters and return of function:

    parameter (positive int or float, guaranteed) startPriceOld (Old car price)
    parameter (positive int or float, guaranteed) startPriceNew (New car price)
    parameter (positive int or float, guaranteed) savingperMonth 
    parameter (positive float or int, guaranteed) percentLossByMonth

    nbMonths(2000, 8000, 1000, 1.5) should return [6, 766] or (6, 766)
    Detail of the above example:

    end month 1: percentLoss 1.5 available -4910.0
    end month 2: percentLoss 2.0 available -3791.7999...
    end month 3: percentLoss 2.0 available -2675.964
    end month 4: percentLoss 2.5 available -1534.06489...
    end month 5: percentLoss 2.5 available -395.71327...
    end month 6: percentLoss 3.0 available 766.158120825...
    return [6, 766] or (6, 766)
*/

function nbMonths($startPriceOld, $startPriceNew, $savingPerMonth, $percentLossByMonth) {
    $count = 1;
    $currentOld = $startPriceOld * (1 - $percentLossByMonth/100);
    $currentNew = $startPriceNew * (1 - $percentLossByMonth/100);
    if ($startPriceOld - $startPriceNew >= 0){
        return [0, $startPriceOld - $startPriceNew];
    }else{
      While($currentOld - $currentNew + $savingPerMonth * $count < 0){
            $count++;
            if($count % 2 == 0){
                $percentLossByMonth += 0.5;
            }
            $currentOld *= (1 - $percentLossByMonth/100);
            $currentNew *= (1 - $percentLossByMonth/100);
        }
        return [$count, round($currentOld - $currentNew + $savingPerMonth * $count)];
    }
}

// simple tests

// Q: 弱型別判斷能通過，強等於就不會通過
assert(nbMonths(2000, 8000, 1000, 1.5) == [6, 766]);
assert(nbMonths(12000, 8000, 1000, 1.5) == [0, 4000]);
assert(nbMonths(8000, 12000, 500, 1) == [8, 597]);
