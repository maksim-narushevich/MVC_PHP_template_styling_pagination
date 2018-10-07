<?php

$function = new Twig_Function('getHumanDiffDate', function ($date) {
    $today = date("Y-m-d H:i:s");
    $datetime1 = new DateTime($today);
    $datetime2 = new DateTime($date);
    $interval = $datetime1->diff($datetime2);


    if($interval->days>365){
        $int_interval=floor($interval->days/365);
        return $int_interval." year".($int_interval>1?'s':'')." ago";
    }

    else if($interval->days>30){
        $int_interval=floor($interval->days/30);
        return $int_interval." month".($int_interval>1?'s':'')." ago";
    }
    else if($interval->days>7){
        $int_interval=floor($interval->days/1);
        return $int_interval." week".($int_interval>1?'s':'')." ago";
    }
    else{
        return $interval->format('%R%a days');
    }
});
$twig->addFunction($function);

$function = new Twig_Function('countArray', function ($array) {
   return count($array);
});
$twig->addFunction($function);

$function = new Twig_Function('ceil', function ($int) {
   return ceil($int);
});
$twig->addFunction($function);