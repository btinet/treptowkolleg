# Cascading Stylesheets

![css-logo](/docs/img/CSS3_logo_and_wordmark.png)

## Entstehung
Das World Wide Web Konsortium (W3C) entwickelte CSS, um zum ursprünglichen
Grundgedanken von HTML zurückzukehren: die Trennung der Informationen von der
Präsentation. Ohne CSS ist HTML für Inhalt, Struktur und Aussehen zuständig. Ein
aufgeblähter und unübersichtlicher Code entsteht.

## Trennung von Inhalt und Design
Ein extrem großer Vorteil von CSS ist die Trennung des eigentlichen Inhalts vom
Design. Das Design wird in eine eigene Datei ausgelagert und kann für alle Seiten
eines Internetauftritts verwendet werden. Werden Änderungen am Design gemacht,
sind durch eine Datei sofort alle Einzelseiten up to date.

## Aufbau von CSS
CSS-Dokumente stellen eine Art Liste dar, in der definiert ist, welche HTML-Elemente wie aussehen sollen.
Dies geschieht nach folgendem Muster:

**Selector { Eigenschaft1:Wert; Eigenschaft2: Wert; }**

Beispiel:

````css
h1 { color:red; font-size:48px; }
````
Im obigen Beispiel haben alle Überschriften **h1** eine **rote Textfarbe** und eine **Schriftgröße von 48px**.

##  CSS in HTML einbinden

### Direkt im Quellcode
Im folgenden Beispiel haben wir die CSS-Informationen direkt im ``<h1>``-Tag geschrieben.
````html
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="title" content="Titel der Website">
        <meta name="description" content="Beschreibung der Website">
        <title>Titel der Website</title>
    </head>
    <body>
        <h1 style="color: red;font-size: 48px">Titel der Website</h1>
        <p>Dies ist ein Absatz</p>
    </body>
</html>
````

### Im HTML-Kopf
````html
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="title" content="Titel der Website">
        <meta name="description" content="Beschreibung der Website">
        <title>Titel der Website</title>
        <style>
            h1{color: red;font-size: 48px}
        </style>
    </head>
    <body>
        <h1>Titel der Website</h1>
        <p>Dies ist ein Absatz</p>
    </body>
</html>
````

### Ausgelagert
Die dritte variante trennt HTML und CSS am deutlichsten.

Die ``HTML-Datei``:
````html
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="title" content="Titel der Website">
        <meta name="description" content="Beschreibung der Website">
        <title>Titel der Website</title>
        <link href="../assets/styles/css_grundlagen.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <h1>Titel der Website</h1>
        <p>Dies ist ein Absatz</p>
    </body>
</html>
````
Die ``CSS-Datei``:
````css
h1
{
    color: red;
    font-size: 48px
}
````