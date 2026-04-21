<?php
/*
PROBLEM STATEMENT
The Fibonacci series is a sequence where each number (Fibonacci number) is the sum of the two preceding ones, 
usually starting with 0 and 1. The sequence begins: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, ....
F = f(n-1) + f(n-2) for n >= 2
*/

$times = readline("Enter how many fibaonacci numbers needed: ");

settype($times,'integer');

function fibaonacci($times, &$series = [0]){
    if($times > 1 && count($series) < $times){
        $series[] = $series[count($series) - 1] + (isset($series[count($series) - 2]) ? $series[count($series) - 2] : 1);
        fibaonacci($times, $series);
    }else{
        return;
    }
}
echo 'Entered series count: '. $times; echo PHP_EOL;
$series = [0];
fibaonacci($times,$series);
echo 'Series: '.PHP_EOL;
echo implode(',',$series);