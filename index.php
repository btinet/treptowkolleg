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



function getName(string $file): string
{
    $fileNames = [
        'basics' => 'Grundlagen',
        'class' => 'Klassen',
        '_index' => 'Einleitung',
        'associations' => 'Beziehungen',
        'vars' => 'Variablen & Konstanten',
        'magic_methods' => 'Magische Methoden',
        'tables' => 'Tabellen',
        'php-ide' => 'PHP Entwicklungsumgebung',
        'typo' => 'Typographie'
    ];
    $fileName = substr($file,0,-3);

    return $fileNames[$fileName];
}

function dirToArray($dir): array
{
    $result = array();
    $cdir = scandir($dir,SCANDIR_SORT_ASCENDING);

    foreach ($cdir as $key => $value)
    {
        if (!in_array($value,array(".","..")))
        {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
            {
                $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
            }
            else
            {
                $result[] = $value;
            }
        }
    }
    return $result;
}

$entries = dirToArray('./docs');

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

    <style>
        code {
            color: #c7254e;
            background-color: #f6f8fa!important;

        }

        pre  {
            position: relative!important;
            overflow: auto!important;

            /* make space  */
            padding-top: 40px;
        }

        pre button {
            position: absolute!important;
            top: 0;
            right: 0;

            font-size: 0.9rem;
            padding: 0.15rem;
            background-color: #f6f8fa;
            border: none;
        }

        pre button:hover {
            cursor: pointer;
            background-color: #eaeef2;
        }

        #myBtn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            display: none;
        }



    </style>

    <title>Informatik AG</title>
</head>
<body>


<a class="pf-v5-c-button pf-m-primary" href="#" id="myBtn">
    nach oben
    <span class="pf-v5-c-button__icon pf-m-end">
      <i class="fas fa-angle-up" aria-hidden="true"></i>
    </span>
</a>

<header class="pf-v5-c-masthead" id="card-view-basic-example-masthead">
    <div class="pf-v5-c-masthead__content">
        <div
                class="pf-v5-c-toolbar pf-m-full-height pf-m-static"
                id="card-view-basic-example-masthead-toolbar"
        >
            <div class="pf-v5-c-toolbar__content">
                <div class="pf-v5-c-toolbar__content-section">
                    <div
                            class="pf-v5-c-toolbar__group pf-m-icon-button-group pf-m-align-left pf-m-spacer-none pf-m-spacer-md-on-md"
                    >
                        <div class="pf-v5-c-toolbar__item">
                            <a
                                    href="/"
                                    class="pf-v5-c-menu-toggle pf-m-plain"
                                    aria-expanded="false"
                                    aria-label="Application launcher"
                            >
                                Informatik Kompendium
                            </a>
                        </div>
                    </div>

                    <div
                            class="pf-v5-c-toolbar__group pf-m-icon-button-group pf-m-align-right pf-m-spacer-none pf-m-spacer-md-on-md"
                    >
                        <div
                                class="pf-v5-c-toolbar__group pf-m-icon-button-group"
                        >
                            <div class="pf-v5-c-toolbar__item">
                                <a
                                        href="/"
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
                                        target="_blank"
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
                <div class="pf-v5-l-grid__item pf-m-gutter pf-m-4-col-on-2xl">
                    <div class="pf-v5-l-flex pf-m-column">
                        <div class="pf-v5-c-content">
                            <div class="pf-v5-c-card">
                                <div class="pf-v5-c-card__header">
                                    <h2 class="pf-v5-c-card__title-text">Inhaltsverzeichnis</h2>
                                </div>
                                <div class="pf-v5-c-card__body">
                                    <ul role="list" class="pf-v5-c-list pf-m-bordered pf-m-plain">
                                        <?php
                                        asort($entries);
                                            foreach ($entries as $dir => $value) {
                                                if ($dir != "img") {
                                                    echo '<li>';

                                                    if(is_array($value)) {
                                                        echo strtoupper($dir);
                                                        echo '<ul role="list" class="pf-v5-c-list pf-m-plain">';
                                                        foreach ($value as $key => $subValue) {
                                                            echo '<li>';
                                                            echo '<a class="pf-v5-c-simple-list__item-link" href="/docs/' .$dir . '/' . $subValue . '">';
                                                            echo getName($subValue);
                                                            echo '</a>';
                                                            echo '</li>';
                                                        }
                                                        echo '</ul>';
                                                    } else {
                                                        echo '<a class="pf-v5-c-simple-list__item-link" href="/docs/'. $value . '">';
                                                        echo getName($value);
                                                        echo '</a>';
                                                    }

                                                    echo '</li>';
                                                }
                                            }
                                        ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="pf-v5-l-grid__item pf-m-gutter pf-m-8-col-on-2xl">
                    <div class="pf-v5-l-flex pf-m-column">
                        <div class="pf-v5-c-content">
                        <div class="pf-v5-c-card">
                            <div class="pf-v5-c-card__body">
                                <?=$mdParser->text($md)?>
                            </div>
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
                <small>&copy;2023 - Benjamin Wagner (Kollegiat am Treptow-Kolleg Berlin - das ziemlich beste Kolleg der Stadt)</small>
            </div>
        </div>
    </section>
</main>



<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
<script>hljs.highlightAll();</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script>
    MathJax = {
        tex: {
            inlineMath: [['$', '$'], ['\\(', '\\)']]
        },
        svg: {
            fontCache: 'global'
        }
    };
</script>
<script type="text/javascript" id="MathJax-script" async
        src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js">
</script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<script>

    document.addEventListener("DOMContentLoaded", function(event) {
        const copyButtonLabel = "kopieren";
        const copiedButtonLabel = "kopiert!";

        let button = document.getElementById("myBtn");


        function myFunction() {
            if (document.body.scrollTop  >= 150 || document.documentElement.scrollTop >= 150) {
                button.style.display = "block";
            } else {
                button.style.display = "none";
            }
        }
        function topFunction(e) {
            e.preventDefault();
            window.scrollTo({top: 0, behavior: 'smooth'});
            //document.body.scrollTop = 0; // For Safari
            //document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
        button.addEventListener("click",topFunction);
        window.onscroll = function () {
            myFunction()
        };

        // use a class selector if available
        let blocks = document.querySelectorAll("pre");

        blocks.forEach((block) => {
            // only add button if browser supports Clipboard API
            if (navigator.clipboard) {
                let button = document.createElement("button");
                block.appendChild(button);
                button.innerText = copyButtonLabel;
                button.addEventListener("click", async () => {
                    await copyCode(block);
                    await rollBackButtonText(button);
                });
            }
        });

        function Sleep(milliseconds) {
            return new Promise(resolve => setTimeout(resolve, milliseconds));
        }

        async function copyCode(block) {
            let code = block.querySelector("code");
            let text = code.innerText;
            await navigator.clipboard.writeText(text);
        }

        async function rollBackButtonText(button) {
            button.innerText = copiedButtonLabel;
            await Sleep(1000); // Pausiert die Funktion für 3 Sekunden
            button.innerText = copyButtonLabel;
        }
    });
</script>

</body>
</html>
