# PHP
## Übung 1

### Voraussetzungen

- Aufbau von Klassen 
- Namenskonventionen 
- Umgang mit Konstruktoren 
- Umgang mit Arrays 
- Verwenden einseitiger Kontrollstrukturen

### Aufgabenstellung

1. Erstellen Sie die Klasse ``Form``
2. Mit Instantiierung des ``Form``-Objekts soll einem `$data`-Attribut die PHP-Konstante (array) ``$_POST`` zugewiesen werden (constructor).
3. Die Klasse soll über einen Getter verfügen, mit dem der Wert (string) eines bestimmten Schlüssels von ``$_POST`` zurückgegeben werden kann.
4. Speichere die Datei entsprechend PSR-0 unter ``src/Form.php``.

Kurze Erinnerung zu Arrays und Verwendung einer einseitigen Kontrollstruktur:
````php
<?php

$myArray = []; // neues leeres Array
$myArray[] = $value; // Dem nächsten Schlüssel den Wert $value geben
$myArray['meinSchlüssel'] = 'Wert'; // Dem Schlüssel 'meinSchlüssel' den Wert 'Wert' zuweisen

// mit isset($element) prüfen, ob ein bestimmter Schlüssel existiert.
if( isset($myArray[$key]) ) {
    $myString = $myArray[$key]; // der Variable $myString den Wert aus dem Array zuweisen
}
````


### ClientCode

Die erstellte Klasse ``Form`` soll beispielsweise in folgenden ClientCode eingearbeitet werden.

````php
<?php
# index.php

require 'src/Form.php';

// testweise Zuweisung
$_POST['username'] = 'Ingo';

$myForm = new Form();
$myUsername = $myForm->getField('username');

echo "Der Benutzername lautet: $myUsername";
// Ausgabe: Der Benutzername lautet: Ingo
````

### Tipps und Hinweise

Nutzt alle verfügbaren Ressourcen wie die Dokumentationen über
[Arrays](https://www.php.net/manual/de/language.types.array.php),
[Kontrollstrukturen](https://www.php.net/manual/de/control-structures.if.php) und
[isset()](https://www.php.net/manual/de/function.isset.php)
oder euer gemeinsames Wissen. Im schlimmsten Fall erarbeiten wir die Lösung in der nächsten
Stunde zusammen.

Wir werden die ``Form``-Klasse dann für unsere ersten richtigen Formularabfragen nutzen.

## Übung 2

### Aufgaben

1. Zeichne zur besseren Übersicht einen Ablaufplan des Programms.
2. Markiere die zueinander gehörenden Klammerpaare jeweils farbig.
3. Bestimme die Werte, die für die variablen ``$d`` und ``$e`` ausgegeben werden.

````php
<?php

int $a,$b,$c;

function calculate($a, $b, $c) {
    $d = 0;
    $e = 0;    
    if($a < $b) {
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
    echo "D = $d";
    echo "E = $e";
}

# Funktion ausführen:
calculate(7,3,4);
````

|a|b|c|d|e
| -------- | ------- | ------- | ------- | ------- |
|$7$|$3$|$4$| | |
|$-3$|$11$|$46$| | |
|$9$|$-5$|$5$| | |
|$12$|$4$|$2$| | |