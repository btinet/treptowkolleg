# PHP Web Development

![PHP-Logo](/docs/img/new-php-logo.png)

**Wichtige Links**


[PHP Dokumentation](https://www.php.net/manual/de/)

[Programming Standard Recommendations](https://www.php-fig.org/psr/)

[Packagist](https://packagist.org/)

## Einleitung

PHP ist ein serverseitiger Text-Interpreter, der PHP-Code kompiliert und als Text,
zum Beispiel in Form von HTML ausgibt. PHP-Code wird mit einem PHP-Tag gekennzeichnet:

````php
<?php
    // Quellcode
?>
````

Folgt nach dem PHP-Quellcode kein HTML mehr, kann das schließende Tag weggelassen werden.

### Dateiendungen

PHP-Dateien sollten die Endung ``.php`` aufweisen, damit der PHP-Interpreter den Quellcode verarbeiten kann.
Der Einstiegspunkt der Webanwendung ist demnach ``index.php`` (ohne PHP ist es sonst ``index.html``).

Allerdings kannst du hier auch tricksen. Schau dir mal die URL dieser Website an. Ist dir
aufgefallen, dass hier nicht auf eine ``.php``-Datei, sondern auf eine Markdowndatei (``_index.md``)
verwiesen wird? Tatsächlich sieht es so aus. Jedoch habe ich den Webserver so eingestellt,
dass der Pfad als Parameter an die ``index.php`` übergeben wird:

````apacheconf
Options +FollowSymLinks
RewriteEngine On
RewriteCond %{REQUEST_URI} !^.*\.(jpg|css|js|gif|png|otf|svg|woff|woff2)$ [NC]
RewriteRule ^(.*)$ index.php?file=$1 [L,QSA]
````

Die obige Konfiguration würde am Beispiel der aktuellen URL also Folgendes ausgeben:

````shell
https://it.treptowkolleg.de/index.php?file=docs/php/_index.md
````

Mehr zu diesem Thema jedoch erst an anderer Stelle.




