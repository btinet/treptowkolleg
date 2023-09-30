<?php
// Startdatei, die über den Webserver standardmäßig aufgerufen wird.

// Namespace-Importe
use App\Computer;
use App\CPU;



// Zuerst mal die erstellten Klassen einbinden:
require 'vendor/autoload.php';

// Dann instantiieren wir ein CPU- und ein Computer-Objekt:
$intelCPU = new CPU("Intel i7");
$ibmComputer = new Computer(16,512,$intelCPU);

$mdParser = new ParsedownExtra();

/*
 * Geben wir mal den Namen des CPUs vom Intel Computer aus:
 *
 * echo:                    Ausgabe einer Zeichenkette
 * $ibmComputer->getCpu():  Gibt laut Methode ein CPU-Objekt zurück, ab hier sind also die Methoden von CPU verfügbar
 * ->getName():             gibt den Namen des CPU-Objekts zurück
 */


/*
 * Habt ihr gesehen? Da ist ja noch eine Konstante: PHP_EOL
 * Dank der Namenskonventionen haben wir sie auch gleich erkannt.
 * Diese Konstante enthält ein systemabhängiges Umbruchzeichen, unter Windows ist das: \n
 * Wir können auch eigene Konstanten definieren:
 */
const INF_EOL = "\n";

// Für komplexe Definitionen von Konstanten nehmen wir jedoch 'define();':
define('CPU_I7', $intelCPU->getName() );


$md = file_get_contents("./docs/index.md");
if (isset($_GET['file'])) {
    if ($_GET['file'] == 'php-class') {
        $md = file_get_contents("./docs/php/class.md");
    }
    if ($_GET['file'] == 'php-index') {
        $md = file_get_contents("./docs/php/index.md");
    }
}


// Wie wir sehen, führen viele Wege nach Rom. Denn die Ausgaben aus Zeilen 25 und 38 sind von außen betrachtet identisch.
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/atom-one-dark.min.css" integrity="sha512-Jk4AqjWsdSzSWCSuQTfYRIF84Rq/eV0G2+tu07byYwHcbTGfdmLrHjUSwvzp5HvbiqK4ibmNwdcG49Y5RGYPTg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        h1,h2,h3 {
            margin-bottom: 1.5rem;
        }
        h1{font-size: 1.6rem!important;}
        h2{font-size: 1.3rem!important;}
        h3{font-size: 1.15rem!important;}
        h4{font-size: 1rem!important;}
    </style>

    <title>Hello, world!</title>
</head>
<body data-spy="scroll" class="px-2" style="margin-top: 60px;">

<div class="bg-primary">

</div>
<nav class="navbar navbar-expand bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#services">Informatik | TK</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row g-3">
            <div class="col-12">
                <?=$mdParser->text($md)?>
            </div>
        </div>

    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
<script>hljs.highlightAll();</script>

</body>
</html>
