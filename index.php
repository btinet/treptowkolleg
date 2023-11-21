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

$file = './';
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
        'exercise' => 'Übungen',
        'class' => 'Klassen',
        '_index' => 'Einleitung',
        'projection' => 'Projektion',
        'selection' => 'Selektion',
        'hesse' => 'Hesse',
        'orm' => 'ORM',
        'erm' => 'ERM',
        'associations' => 'Beziehungen',
        'vars' => 'Variablen & Konstanten',
        'magic_methods' => 'Magische Methoden',
        'tables' => 'Tabellen',
        'php-ide' => 'PHP Entwicklungsumgebung',
        'relations' => 'Beziehungen',
        'object_relations' => 'Objektbeziehungen',
        'class_relations' => 'Klassenbeziehungen',
        'typo' => 'Typographie',
        'control' => 'Kontrollstrukturen',
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

$currentSection = "";
$currentSubSection = "";

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <style>
        code {
            color: #c7254e;
            background-color: #f6f8fa!important;

        }

        pre  {
            position: relative!important;
            overflow: auto!important;
        }

        pre button {
            position: absolute!important;
            top: 10px;
            right: 10px;


            font-size: 0.9rem;
            padding: 0.5rem;
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



<div class="pf-v5-c-page" id="doc-site">
    <div class="pf-v5-c-skip-to-content">
        <a class="pf-v5-c-button pf-m-primary" href="#main-content-page-demo-basic">Skip to content</a>
    </div>
    <header class="pf-v5-c-masthead" id="card-view-basic-example-masthead">
        <button id="nav-toggle" aria-expanded="true" aria-disabled="false" aria-label="Global navigation" class="pf-v5-c-button pf-m-plain" type="button" data-ouia-component-type="PF5/Button" data-ouia-safe="true" data-ouia-component-id="OUIA-Generated-Button-plain-1"><svg class="pf-v5-svg" viewBox="0 0 448 512" fill="currentColor" aria-hidden="true" role="img" width="1em" height="1em"><path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg></button>
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
    <div class="pf-v5-c-page__sidebar" id="sidebar" style="transform: translateX(0)">
        <div class="pf-v5-c-page__sidebar-body">
            <nav class="pf-v5-c-nav" id="page-demo-sticky-top-section-group-primary-nav" aria-label="Global">
                <div
                        class="pf-v5-c-page__sidebar-body pf-m-fill"
                >
                    <?php
                    asort($entries);
                    foreach ($entries as $dir => $value) {
                        if ($dir != "img") {


                            if(is_array($value)) {
                                echo '<div class="pf-v5-c-nav__section-title pf-m-page-insets" style="background-color: #0d0d0d;font-weight: 700; margin-bottom: 0;">';
                                echo strtoupper($dir);
                                echo '</div>';
                                echo '<ul role="list" class="pf-v5-c-nav__list" style="padding: 0">';
                                foreach ($value as $key => $subValue) {
                                    $active = '';
                                    if($file == './docs/'.strtolower($dir).'/'.$subValue)
                                    {
                                        $active = 'pf-m-current';
                                        $currentSection = strtoupper($dir);
                                        $currentSubSection = getName($subValue);
                                    }
                                    echo '<li class="pf-v5-c-nav__item '.$active.'">';
                                    echo '<a class="pf-v5-c-nav__link" href="/docs/' .$dir . '/' . $subValue . '">';
                                    echo getName($subValue);
                                    echo '</a>';
                                    echo '</li>';
                                }
                                echo '</ul>';
                            }
                        }
                    }
                    ?>
                </div>
            </nav>
        </div>
    </div>
        <main
                class="pf-v5-c-page__main"
                tabindex="-1"
                id="main-content-card-view-basic-example"
        >
            <a class="pf-v5-c-button pf-m-primary" href="#" id="myBtn">
                nach oben
                <span class="pf-v5-c-button__icon pf-m-end">
          <i class="fas fa-angle-up" aria-hidden="true"></i>
        </span>
            </a>
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
                        <h1><?= $currentSection ?? 'Unterrichtsmaterial'?>
                        <small><?= $currentSubSection ?? 'Wissenswertes und Ergänzungen'?></small>
                        </h1>
                    </div>
                </div>
            </section>


            <section class="pf-v5-c-page__main-section pf-m-limit-width">
                <div class="pf-v5-c-page__main-body">
                    <div class="pf-v5-l-grid pf-m-gutter">
                        <div class="pf-v5-l-grid__item pf-m-gutter pf-m-12-col-on-md" id="content">
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
</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/twig.min.js" integrity="sha512-3kQBGi/HB8ThRiz8aVvTl4O7Nk7Invm1642qH8XmgMZH86ANSrNdfH6+T7kuVx+HCu/4kG0G0GCbBAY2TninwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/languages/java.min.js" integrity="sha512-QKVBmhfjJaMu0msCCdZ6rzwE9Iw6GHpcs7MdjZmJGI5ALVMUs5Bv9rOw5Z/UlYisn5oduATamQWJ5deVH6ewCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>hljs.highlightAll();</script>
<!-- docsify (latest v4.x.x)-->
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
<script src="
https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js
"></script>
<script type="text/javascript">
    (function() {
        $('div.tables-begin').nextUntil('div.tables-end', 'table').addClass('table table-bordered');
    })();
</script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script>

    const elements = document.querySelectorAll('table');

    elements.forEach((element) => {
        element.classList.add('display');
    });

    document.addEventListener("DOMContentLoaded", function(event) {
        const copyButtonLabel = "<i class='fas fa-copy' style='color:#3c3f42'></i>";
        const copiedButtonLabel = "kopiert <i class='fas fa-check' style='color:#06c'></i>";

        let button = document.getElementById("myBtn");




        new DataTable('table.display', {
            info: false,
            ordering: false,
            searching: false,
            paging: false
        });

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
                button.innerHTML = copyButtonLabel;
                button.addEventListener("click", async () => {
                    await copyCode(block);
                    await rollBackButtonText(button);
                });
            }
        });

        let toggleButton = document.getElementById("nav-toggle");
        let sidebar = document.getElementById("sidebar");

        toggleButton.addEventListener("click", () => {
            console.log("Toggle-Click");
            if(document.body.clientWidth < 1200) {
                if(sidebar.style.transform === "translateX(-100%)") {
                    sidebar.style.transform = "translateX(0)";
                } else {
                    sidebar.style.transform = "translateX(-100%)";
                }
            }
        });

        if(document.body.clientWidth >= 1200) {
            sidebar.style.transform = "translateX(0)";
        } else {
            sidebar.style.transform = "translateX(-100%)";
        }

        addEventListener("resize", (event) => {
            if(document.body.clientWidth >= 1200) {
                sidebar.style.transform = "translateX(0)";
            } else {
                sidebar.style.transform = "translateX(-100%)";
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
            button.innerHTML = copiedButtonLabel;
            await Sleep(1000); // Pausiert die Funktion für 3 Sekunden
            button.innerHTML = copyButtonLabel;
        }
    });
</script>

</body>
</html>
