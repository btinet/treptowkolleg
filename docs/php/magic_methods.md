# PHP Web Development
## Magische Methoden

Magische Methoden sind Methoden, die PHPs Standardverhalten überschreiben, wenn bestimmte Aktionen mit einem Objekt durchgeführt werden.

Die folgenden Methodennamen werden als magisch betrachtet: ``__construct()``,
``__destruct()``, ``__call()``, ``__callStatic()``,`` __get()``, ``__set()``,
``__isset()``, ``__unset()``, ``__sleep()``, ``__wakeup()``, ``__serialize()``,
``__unserialize()``, ``__toString()``, ``__invoke()``, ``__set_state()``,
``__clone()`` und ``__debugInfo()``.

**Ein Beispiel**: *Sleep- und Wakeup-Beispiel*

````php
<?php # Connection.php

class Connection
{
    protected $link;
    private $dsn, $username, $password;

    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    private function connect()
    {
        $this->link = new PDO($this->dsn, $this->username, $this->password);
    }

    public function __sleep()
    {
        return array('dsn', 'username', 'password');
    }

    public function __wakeup()
    {
        $this->connect();
    }
}
````

Der Zweck von von ``__sleep()`` ist, nicht gespeicherte Daten zu sichern oder ähnliche Aufräumarbeiten zu erledigen. Die Funktion ist ebenfalls nützlich, wenn ein sehr großes Objekt nicht komplett gespeichert werden muss.

Umgekehrt überprüft ``unserialize()``, ob eine Funktion mit dem magischen Namen ``__wakeup()`` vorhanden ist. Falls vorhanden, kann diese Funktion alle Ressourcen, die das Objekt möglicherweise hat, wiederherstellen.

Der Zweck von ``__wakeup()`` ist es, alle Datenbankverbindungen, die bei der Serialisierung verlorengegangen sind, wiederherzustellen und andere Aufgaben der erneuten Initialisierung durchzuführen.

### __construct()

Mit Konstruktoren kann im **Client Code** ein Objekt dazu gezwungen werden, bestimmte Attributwerte
anzunehmen und Methoden auszuführen. Im folgenden Beispiel werden bei Instantiierung eines
``Connection``-Objekts die Zugangsdaten für die Herstellung einer Datenbankverbindung zwingend
erwartet, da die nachgestellte Instantiierung des ``PDO``-Objekts genau diese Angaben benötigt.

````php
<?php # Connection.php

class Connection
{
    protected $link;
    private $dsn, $username, $password;

    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    private function connect()
    {
        $this->link = new PDO($this->dsn, $this->username, $this->password);
    }

}
````

Nachdem die drei Parameter den Klassenattributen zugewiesen wurden, wird die Klassenmethode
``connect()`` ausgeführt, die dem Attribut ``$link`` das neue ``PDO``-Objekt zuweist.

### __toString()

Manchmal wollen wir einen bestimmten Inhalt eines Objekts ausgeben, ohne erst zu überlegen,
welche Methoden die vielen Objekte haben, um gewisse Informationen auszugeben. Mithilfe der
magischen Methode ``toString()`` können wir dieses Problem umgehen. Denn jede Instanz (Objekt)
einer Klasse, die diese Methode implementiert, nutzt genau diese Methode zur Ausgabe eines
ebensolchen Strings:

````php
<?php # Connection.php

class Person
{
    protected $firstname;
    protected $lastname;

    public function __toString()
    {
        return $this->firstname . " " . $this->firstname;
    }

}
````