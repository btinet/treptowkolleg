# PHP Web Development
## Grundlagen

### PHP-Tags
PHP ist ein serverseitiger Text-Interpreter, der PHP-Code kompiliert und als Text,
zum Beispiel in Form von HTML ausgibt. PHP-Code wird mit einem PHP-Tag gekennzeichnet:

````php
<?php
    // Quellcode
?>
````

Folgt nach dem PHP-Quellcode kein HTML mehr, kann das schließende Tag weggelassen werden.

### Dateiendungen

PHP-Dateien sollten die Endung ``.php`` aufweisen, damit der PHP-Interpreter den Quellcode verarbeiten kann.
Der Einstiegspunkt der Webanwendung ist demnach ``index.php`` (ohne PHP ist es sonst ``index.html``).

### Variablen

#### Deklarieren

Variablen werden immer mit einem Dollar-Zeichen markiert. PHP ist Typen-dynamisch (im Gegensatz zu JAVA),
weshalb keine Angabe des Datentypen erfolgt. Die Art des Datentyps ergibt sich aufgrund der
Zuweisung eines Wertes.

````php
<?php

$myInt = 0; // int
$myFloat = 0.2; // float
$myString = '5';    // string
$myArray = [];  // array
$myArray = true;  // bool
````

#### Mathematische Operatoren

Aufgrund der Typen-Dynamik können wir sogar mit Zeichenketten rechnen. Zumindest, solange die
Zeichenkette einer Zahl entspricht.

````php
<?php

$myString = '5';    // string

$myResult = $myString * 2;  // Multiplikation ergibt 10. $myResult ist vom Typ int
````

#### Zeichenkettenoperatoren

Mit dem Punkt (``.``) können Zeichenketten verknüpft werden. Zeichenketten, die in einfachen
Anführungszeichen notiert sind, werden 1:1 ausgegeben. Zeichenketten in doppelten Anführungszeichen
können Variablen enthalten. Wollen wir auf Attribute oder Methoden zugreifen, umschließen
wir den Ausdruck zusätzlich mit einer geschweiften Klammer:

````php
<?php

$stringA = 'Ich mag';
$stringB = 'Informatik';

$stringC = $stringA . ' ' . $stringB; // ergibt: Ich mag Informatik
$stringD = "$stringA $stringB";
$stringE = "Mein Objekt heißt {$myObject->getName()}";
````

#### Ausgabe

Der Befehl ``echo`` gibt eine Zeichenkette aus.

````php
<?php

echo $myResult; // gibt 10 aus (siehe obiges Beispiel)
````

### Konstanten

Konstanten enthalten einmalig definierte feste Werte. Mit Konstanten kann genauso verfahren
werden wie mit Variablen, mit Ausnahme von Zuweisungsoperatoren natürlich.

Im Gegensatz zu Variablen wird kein Dollar-Zeichen vorangestellt. Konstanten werden immer groß
geschrieben.

#### Deklarieren

Ein skalarer Wert kann mit dem Schlüsselwort ``const`` erfolgen:

````php
<?php

const MY_INT_CONST = 5;
const MY_STRING_CONST = 'Nummer: ' . MY_INT_CONST;
````

Für Zuweisung eines variablen Ausdrucks ist die Funktion ``define`` geeignet:

`````php
<?php

$myVar = 'Wert';

define('MY_CONST' , $myVar); // nicht mit 'const' erlaubt
`````

#### Überprüfen

Jede Konstante darf nur einmal existieren. Daher sollten wir vor der Deklaration überprüfen,
ob eine Konstante bereits existiert:

`````php
<?php

$myVar = 'Wert';

if ( !defined(MY_CONST) ) {
    define('MY_CONST' , $myVar); // nicht mit 'const' erlaubt
}
`````


