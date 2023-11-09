# PHP Web Development
## Kontrollstrukturen

Kontrollstrukturen erlauben uns, Code nur unter bestimmten Bedingungen auszuführen. Daher
werden diese Strukturen auch als Algorithmen bezeichnet.

## if-Strukturen

````php
<?php

$a = 2;
$b = 3;

# einseitig
if ($a == $b) {
    echo "$a ist gleich $b";
}

# zweiseitig
if ($a == $b) {
    echo "$a ist gleich $b";
} else {
    echo "$a ist ungleich $b";
}
````
<div class="tables-start"></div>
|Operator|Bedeutung|
| -------- | ------- |
|$a == b$|a gleich b|
|$a === b$|a gleich b und gleiche Datentypen|
|$a != b$|a ungleich b|
|$a !== b$|a ungleich b und gleiche Datentypen|
<div class="tables-end"></div>