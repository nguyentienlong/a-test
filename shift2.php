<?php

function shift($text, $step)
{
    $vowels = ['a', 'o', 'e', 'i', 'u'];

    $chars = str_split($text);

    $vowelIdxArr = [];

    // find $vowels and add to $vowelIdxArr
    // O(n)
    foreach ($chars as $key => $char) {
        if (in_array($char, $vowels)) {
            array_push($vowelIdxArr, $key);
        }
    }

    // store first vowels into $temp
    $temp = $chars[$vowelIdxArr[0]];
    // loop through $vowelIdxArr, replace $chars[$index_of_vowels] = $chars[$vowelIdxArr[$index_of_vowels+$step]]
    // O(n)
    foreach ($vowelIdxArr as $k => $v) {
        if($k + $step < count($vowelIdxArr)){ 
            $chars[$v] = $chars[$vowelIdxArr[$k+$step]];
        } else {
            $chars[$v] = $temp;
        }
    }

    return $chars;
}

$text = isset($argv[1])? $argv[1] : '';

$step = isset($argv[2])? $argv[2] : 1;

if(empty($text)) {
    $text = "2a 3d 4e 5i 6g 7h 8u 9h 10i 12o 13k";
}
echo 'before:' . PHP_EOL;
echo $text . PHP_EOL;

echo '---after' . PHP_EOL;
$rs = shift($text, $step);

print(implode('', $rs));
