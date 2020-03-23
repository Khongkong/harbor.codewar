<?php
/*
    The function must accept a non-negative integer. If it is zero, it just returns "now". Otherwise, the duration is expressed as a combination of years, days, hours, minutes and seconds.

    It is much easier to understand with an example:

    format_duration(62)    # returns "1 minute and 2 seconds"
    format_duration(3662)  # returns "1 hour, 1 minute and 2 seconds"
    For the purpose ofassertis 365 days and a day is 24 hours.
*/

function format_duration($seconds) {
    if($seconds == 0){
        return "now";
    }
    $minutes = 60;
    $hours = 60 * $minutes;
    $days = 24 * $hours;
    $years = 365 * $days;
    $l = array
        (
            "years" => 0, 
            "days" => 0, 
            "hours" => 0, 
            "minutes" => 0, 
            "seconds" => 0
        );
    if(floor($seconds / $years) > 0){
        $l["years"] += floor($seconds / $years);
        $seconds %= $years;
    }
    if(floor($seconds / $days) > 0){
        $l["days"] += floor($seconds / $days);
        $seconds %= $days;
    }
    if(floor($seconds / $hours) > 0){
        $l["hours"] += floor($seconds / $hours);
        $seconds %= $hours;
    }
    if(floor($seconds / $minutes) > 0){
        $l["minutes"] += floor($seconds / $minutes);
        $seconds %= $minutes;
    }
    if($seconds > 0){
        $l["seconds"] += $seconds;
    }
    $l = array_filter($l, function($val){
        return ($val > 0)? true: false;
    });
    if(count($l) > 1){
        foreach($l as $key => &$val){
            $time = ($val > 1)? $key: substr($key, 0, -1);
            $val .= " $time";
        }
        $l = array_values($l);
        for($i = 0; $i < count($l); $i++){
            if($i < count($l) - 2){
                $l[$i] .= ", ";
            }elseif($i == count($l) - 2){
                $l[$i] .= " and ";
            }
        }
        return implode("", $l);
    }
    $k = array_search(end($l), $l);
    $time = (end($l) > 1)? $k: substr($k, 0, -1);
    return end($l). " $time"; 
}

//
assert("1 second" == format_duration(1));
assert("1 minute and 2 seconds" == format_duration(62));
assert("2 minutes" == format_duration(120));
assert("1 hour" == format_duration(3600));
assert("1 hour, 1 minute and 2 seconds" == format_duration(3662));