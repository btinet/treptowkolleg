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

Nutzt alle verfügbaren Ressourcen wie die [PHP Dokumentation](https://www.php.net/manual/de/)
oder euer gemeinsames Wissen. Im schlimmsten Fall erarbeiten wir die Lösung in der nächsten
Stunde zusammen.

Wir werden die ``Form``-Klasse dann für unsere ersten richtigen Formularabfragen nutzen.