<?php
/*
PROBLEM STATEMENT
 Determining if a string can be segmented into a space-separated sequence of dictionary words, 
 often solved using recursion with memoization to handle overlapping subproblems.
*/

function breakWord(string $word, array $dict){
    $memo = [];
    if(!function_exists('canBreak')){
        function canBreak($start, $word, $dict, &$memo){
            $n = strlen($word);
            if($n == $start){
                return true;
            }
            if(array_key_exists($start, $memo)){
                return $memo[$start];
            }
            foreach(range(1, ($n - $start)) as $length){
                $prefix = substr($word, $start, $length);
                if(in_array($prefix, $dict) && canBreak(($start + $length), $word, $dict, $memo)){
                    $memo[$start] = True;
                    return true;
                }
            }
            $memo[$start] = false;
            return false;
        }
    }
    return canBreak(0, $word, $dict, $memo);
}

var_dump(breakWord("ilikecod", ["i", "like"]));
var_dump(breakWord("applepenapple", ["apple", "pen"]));