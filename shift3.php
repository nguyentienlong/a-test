<?php

function shift($text, $step)
{
    $vowels = ['a', 'o', 'e', 'i', 'u'];

    $chars = str_split($text);

    $vowelIdxArr = [];

    // find $vowels and add to $vowelIdxArr
    // O(n)
    $previousVowelIdx = null;
    $firstVowel = null;

    foreach ($chars as $key => $char) {
        if (in_array($char, $vowels)) {
            if ($key+$step >= count($chars)) {
                $previousVowelIdx = $key;
                break;
            }

            // if $chars[$key+$step] is vowel replace
            // else
            //     - replace previous vowel with current one
            //     - update previous vowel idx
            if (in_array($chars[$key+$step], $vowels)) {
               $chars[$key] = $chars[$key+$step];
            } else {
               if(!empty($previousVowelIdx)) {
                   $chars[$previousVowelIdx] = $char;
               }else{
                   $firstVowel = $char; // store first vowel
               }
               $previousVowelIdx = $key;
            }
        }
    }

    $chars[$previousVowelIdx] = $firstVowel;

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
