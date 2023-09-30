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
<html lang="de">
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
    <link rel="stylesheet" href="/node_modules/@patternfly/patternfly/patternfly.css">
    <link rel="stylesheet" href="/node_modules/@patternfly/patternfly/patternfly-addons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/github.min.css" integrity="sha512-0aPQyyeZrWj9sCA46UlmWgKOP0mUipLQ6OZXu8l4IcAmD2u31EPEy9VcIMvl7SoAaKe8bLXZhYoMaE/in+gcgA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <title>Informatik AG</title>
</head>
<body>

<header class="pf-v5-c-masthead" id="card-view-basic-example-masthead">
    <div class="pf-v5-c-masthead__content">
        <div
                class="pf-v5-c-toolbar pf-m-full-height pf-m-static"
                id="card-view-basic-example-masthead-toolbar"
        >
            <div class="pf-v5-c-toolbar__content">
                <div class="pf-v5-c-toolbar__content-section">
                    <div
                            class="pf-v5-c-toolbar__group pf-m-icon-button-group pf-m-align-right pf-m-spacer-none pf-m-spacer-md-on-md"
                    >
                        <div
                                class="pf-v5-c-toolbar__group pf-m-icon-button-group"
                        >
                            <div class="pf-v5-c-toolbar__item">
                                <a
                                        href=""
                                        class="pf-v5-c-menu-toggle pf-m-plain"
                                        aria-expanded="false"
                                        aria-label="Application launcher"
                                >
                                    <i class="fas fa-home" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="pf-v5-c-toolbar__item">
                                <a
                                        href="https://it.treptowkolleg.de/admin"
                                        class="pf-v5-c-menu-toggle pf-m-plain"
                                        aria-expanded="false"
                                        aria-label="Settings"
                                >
                                    <i class="fas fa-cog" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<main
        class="pf-v5-c-page__main"
        tabindex="-1"
        id="main-content-card-view-basic-example"
>
    <section class="pf-v5-c-page__main-breadcrumb pf-m-limit-width">
        <div class="pf-v5-c-page__main-body">
            <nav class="pf-v5-c-breadcrumb" aria-label="breadcrumb">
                <ol class="pf-v5-c-breadcrumb__list" role="list">
                    <li class="pf-v5-c-breadcrumb__item">
                        <a href="https://it.treptowkolleg.de" class="pf-v5-c-breadcrumb__link">Informatik AG</a>
                    </li>
                    <li class="pf-v5-c-breadcrumb__item">
              <span class="pf-v5-c-breadcrumb__item-divider">
                <i class="fas fa-angle-right" aria-hidden="true"></i>
              </span>

                        <a
                                href="#"
                                class="pf-v5-c-breadcrumb__link pf-m-current"
                                aria-current="page"
                        >Dokumentation</a>
                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="pf-v5-c-page__main-section pf-m-limit-width pf-m-light">
        <div class="pf-v5-c-page__main-body">
            <div class="pf-v5-c-content">
                <h1>Unterrichtsmaterial</h1>
                <p>Wissenswertes und Ergänzungen</p>
            </div>
        </div>
    </section>

    <section class="pf-v5-c-page__main-section pf-m-limit-width">
        <div class="pf-v5-c-page__main-body">
            <div class="pf-v5-l-grid pf-m-gutter">
                <div class="pf-v5-l-grid__item pf-m-gutter pf-m-8-col-on-lg">
                    <div class="pf-v5-l-flex pf-m-column">
                        <div class="pf-v5-c-card">
                            <div class="pf-v5-c-card__body">
                                <?=$mdParser->text($md)?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pf-v5-c-page__main-section pf-m-limit-width pf-m-light">
        <div class="pf-v5-c-page__main-body">
            <div class="pf-v5-c-content">
            </div>
        </div>
    </section>



<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
<script>hljs.highlightAll();</script>

</body>
</html>
