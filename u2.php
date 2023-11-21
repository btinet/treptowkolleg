<?php

// Funktion deklarieren
function calculate($a,$b, $c) {

    $d = 0;
    $e = 0;

    if ($a < $b) {
        $d = $a + $b;
    }

    if($a > $c) {

        if($b > $c) {
            $d = $a * $b;
        } else {
            $d = $a * $c;
        }

    } else {
        $e = $a + $b + $c;
    }

    echo "Ergebnis für $a, $b und $c ist D: $d und E: $e";

}

// Variablen deklarieren und initialisieren
$x = 12;
$y = 4;
$z = 2;

// Funktion mit Variablen $x, $y und $z als Parameter für $a, $b und $c ausführen.
calculate($x,$y,$z);