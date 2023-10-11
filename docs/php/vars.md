# PHP Web Development
## Variablen

### Deklarieren

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

### Dynamisch deklarieren

In PHP lässt sich etwas total verrücktes machen, was zum Beispiel in JAVA undenkbar wäre.
Wir können Variablen nämlich auch dynamisch während der Laufzeit deklarieren:

````php
<?php

/**
 * Dies ist ein sogenannter PHP-Docs-Block. Hier können Informationen an die
 * Entwickler weitergegeben werden.
 * 
 * @var $myVar int Variable, die wir gleich dynamisch deklarieren werden.
 */

// Erstmal eine normale Variable vom Typ String deklarieren und initialisieren.
$name = "myVar";

/*
 * Und jetzt deklarieren wir eine Variable, deren Bezeichnung der Wert der zuvor
 * deklarierten Variable ist. Klingt komisch, ist aber so. 
 */ 
${$name} = "Die Variable $name wurde jetzt deklariert.";

echo $myVar;
// Gibt aus: Die Variable myVar wurde jetzt deklariert.
````

Damit die IDE uns nicht aus Versehen warnt, dass die Variable nicht deklariert ist,
haben wir oben den Docs-Block benutzt. Diese Art der Deklaration kann verwendet werden,
um in PHP-Templates Variablen bereitzustellen, ohne vorher den Namen festlegen zu müssen.

Im folgenden Beispiel (Auszug) wird ein Template gerendert, das HTML-Code enthält. Dem Template
wird außerdem ein ``Exam``-Objekt übergeben.

````php
class ExamController extends AbstractController
{
    public function show(int $examId): string
    {
        $exam = $this->repository->setEntity(Exam::class)->find($examId);

        return $this->render('exam/show.html', [
            'exams' => [$exam],
        ]);
    }

}
````

Schauen wir uns das Template (Auszug) an:

````php-template
<?php
/**
 * @var array $exams enthält die MySQL-Tabelle "exam"
 */
?>

<div class="list-group list-group-flush rounded-3 border shadow-sm">
    <?php foreach($exams as $exam): ?>
        <?php $examState = ' key-question '; ?>
        <?php if(date('Y') < ($exam->getYear()+3)):?>
            <?php $examState .= 'key-question-restricted'; ?>
        <?php else: ?>
            <?php if($exam->getUser()):?>
                <?php $examState .= 'key-question-blocked'; ?>
            <?php endif; ?>
        <?php endif; ?>
        <a href="<?=$response->generateUrlFromRoute('exam_show',[$exam->getId()])?>" class="list-group-item <?=$examState?> list-group-item-action lh-sm py-3 d-flex justify-content-between align-items-start">
            <div class="d-flex flex-column justify-content-between align-items-start">

                <div class="d-flex mb-2 small fw-light justify-content-start align-items-center">
                    <?php foreach($exam->getSchoolSubjects() as $subject): ?>
                        <span class="badge me-1 text-capitalize <?=$subject->isMainSchoolSubject() ? 'bg-primary' :'bg-secondary' ?>"><?=$subject->getAbbr()?></span>
                    <?php endforeach; ?>
                    <?php if(date('Y') < ($exam->getYear()+3)):?>
                        <span class="me-1 badge badge-pill text-bg-danger small">gesperrt</span>
                    <?php else: ?>
                        <?php if($exam->getUser()):?>
                            <span class="badge badge-pill text-bg-info small">belegt</span>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <p class="card-text"><?=$exam->getKeyQuestion()?></p>
            </div>
            <div class="d-flex align-items-end flex-column">
                <span class="small badge text-bg-light fw-light bg-gradient border text-nowrap">
                    frei ab
                    <?= $exam->getYear()+3 ?>
                </span>
            </div>
        </a>
    <?php endforeach; ?>
    <?php if(!$exams): ?>
        <li class="list-group-item">Keine Prüfungen gefunden.</li>
    <?php endif; ?>
</div>

````


## Gängige Operatoren

### Mathematische Operatoren

Aufgrund der Typen-Dynamik können wir sogar mit Zeichenketten rechnen. Zumindest, solange die
Zeichenkette einer Zahl entspricht.

````php
<?php

$myString = '5';    // string

$myResult = $myString * 2;  // Multiplikation ergibt 10. $myResult ist vom Typ int
$anotherResult = $myString + 5; // Addition ergibt 10. $anotherResult ist vom Typ int
````

### Zeichenkettenoperatoren

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

### Ausgabe

Der Befehl ``echo`` gibt eine Zeichenkette aus.

````php
<?php

echo $myResult; // gibt 10 aus (siehe obiges Beispiel)
````

## Konstanten

Konstanten enthalten einmalig definierte feste Werte. Mit Konstanten kann genauso verfahren
werden wie mit Variablen, mit Ausnahme von Zuweisungsoperatoren natürlich.

Im Gegensatz zu Variablen wird kein Dollar-Zeichen vorangestellt. Konstanten werden immer groß
geschrieben.

### Deklarieren

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

### Überprüfen

Jede Konstante darf nur einmal existieren. Daher sollten wir vor der Deklaration überprüfen,
ob eine Konstante bereits existiert:

`````php
<?php

$myVar = 'Wert';

if ( !defined(MY_CONST) ) {
    define('MY_CONST' , $myVar); // nicht mit 'const' erlaubt
}
`````


