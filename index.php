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


$md = file_get_contents("./README.md");
if (isset($_GET['file']) and !empty($_GET['file']) ) {
    if(file_exists($file = './'. $_GET['file'])) {
        $md = file_get_contents($file );
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
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/github.min.css" integrity="sha512-0aPQyyeZrWj9sCA46UlmWgKOP0mUipLQ6OZXu8l4IcAmD2u31EPEy9VcIMvl7SoAaKe8bLXZhYoMaE/in+gcgA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <title>Informatik AG</title>
</head>
<body data-spy="scroll" class="px-2" style="margin-top: 100px;">

<div class="bg-primary"></div>
<nav class="navbar navbar-expand bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="https://it.treptowkolleg.de">Informatik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://it.treptowkolleg.de/admin">phpMyAdmin</a>
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
<script src="/assets/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
<script>hljs.highlightAll();</script>

</body>
</html>
