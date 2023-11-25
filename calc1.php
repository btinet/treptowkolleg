<?php

// Funktion deklarieren
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

// Optionen für Kommandozeilenprogramm definieren
$shortOptions  = "a:";
$shortOptions .= "b:";
$shortOptions .= "c:";

// Optionen abfragen
$options = getopt($shortOptions, []);

// Eingabe der Optionen prüfen
if(!array_key_exists("a",$options)) exit("Option a ist erforderlich!");
if(!array_key_exists("b",$options)) exit("Option b ist erforderlich!");
if(!array_key_exists("c",$options)) exit("Option c ist erforderlich!");

// Funktion ausführen
printText($options['a'],$options['b'],$options['c']);