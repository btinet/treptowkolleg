<?php
$a = 5;
$b = 3;
$c = 99;

function printText($a, $b, $c) {
    $string = '';
    if($a == $b or $b > 2)
        $string .= "Ich ";
    if($a < 5 and $b > 2)
        $string .= "Du ";
    if($a == 5 and $b == 2)
        $string .= "hatten ";
    if($c != 6 and $b > 10)
        $string .= "hast ";
    else
        $string .= "habe ";
    if($b == 3 and $c == 99)
        $string .= "viel ";
    if($a == 1 and $b == 2)
        $string .= "keinen ";
    if(!($a < 5 and $b > 2))
        $string .= "Spaß! ";
    echo $string . PHP_EOL;
}

printText($a,$b,$c);