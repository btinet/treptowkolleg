# Entwicklungsumgebung für PHP

## Benötigte Software

### Windows

Für die Installation erforderlicher Software für die PHP-Entwicklung, aber auch für andere
Programmiersprachen, benötigen wir einen Softwarepaketmanager. Ein einfacher Paketmanager
**Chocolatey**.

Öffne die Windows Powershell mit Administratorrechten und gib folgenden Befehl ein:

``Get-ExecutionPolicy ``

Sollte ''Restricted'' zurückgegeben werden, führe

``Set-ExecutionPolicy AllSigned`` oder ``Set-ExecutionPolicy Bypass -Scope Process``

aus.

Installiere abschließend **Chocolatey** mit:

````shell
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))
````

Wenn alles geklappt hat, kannst du mit dem Befehl ``choco -?`` überprüfen, ob **Chocolatey** nun verfügbar ist.

## Empfohlene Software für die PHP-Entwicklung

- PHP Binary
- Composer
- Git
- Node.js (npm)
- Yarn
- PHP IDE

### PHP Binary

````shell
choco install php
````

### Composer
Composer ist ein Paketmanager für Softwareabhängigkeiten in PHP. Außerdem versorgt dich Composer
mit einem praktischen Autoloader für deine PHP-Klassen. Andernfalls müssten wir uns einen
eigenen Autoloader entwickeln.

````shell
choco install composer
````

### Git
Git ist perfekt für die Versionierung von Softwareprojekten. Git hilft dir außerdem dabei, von
überall aus auf deine Dateien zugreifen zu können.

*Da Git ziemlich kompliziert ist, wird es dazu eine eigene Sektion geben.*

````shell
choco install git
````

### Node.js

Node.js ist ein Paketmanager für Javascript- und Stylesheet-Frameworks. Wir benötigen ihn
außerdem, um **Yarn** installieren zu können.

````shell
choco install nodejs-lts
````

### Yarn Package Manager

Bevor **Yarn** installiert werden kann, muss Node.js installiert sein.

````shell
npm install --global yarn
````

### PHP IDE (Integrated Development Environment)

Für die eigentliche Entwicklungsarbeit sollten wir auf eine IDE zurückgreifen. Ein
einfacher Editor tut es zwar auch, jedoch mangelt es ihm an vielen nützlichen Funktionen.

Es gibt aktuell nur sehr wenige gute PHP IDEs, die gleichzeitig kostenfrei sind. Obwohl
sich Microsofts Visual Studio Code prinzipiell eignet, ist es weniger zu empfehlen, da VSC
nicht speziell für PHP gedacht ist. Das macht sich bei der Arbeit mit der Software bemerkbar.

Ein klarer Sieger ist die **Eclipse IDE for PHP Developers**. Sie bietet alles, was das
PHP-Herz begehrt. Mit dabei sogar eine Git- und Composer-Integration. Letzteres kann sogar
On-The-Fly projektweit installiert werden.

Neben einer **PHP-IDE** bietet Eclipse aber auch IDEs für andere Programmiersprachen an.
Den Installer findest du unter:

[https://www.eclipse.org/downloads/](https://www.eclipse.org/downloads/)