# Unified Modeling Language
## Objektbeziehungen

### Allgemeine Form

![Klassendiagramm](/docs/img/uml-relations.png)

### Assoziation (A kennt B)

![Klassendiagramm](/docs/img/uml-association.png)

Der Browser kennt den Webserver, was durch die Methode ``addHost(Webserver $server)`` zum Ausdruck
gebracht wird.


#### PHP
````php
<?php

class Webserver
{
    private string $title = 'website title';
    private string $ip = '192.168.0.1';    
}

class Browser
{
    private array $hosts = [];
        
    public function addHost(Webserver $server): void
    {
        $this->hosts[] = $server;
    }    
}
````

#### JAVA
````php


class Webserver {
    private String title = "website title";
    private String ip = "192.168.0.1";    
}

class Browser
{
    private ArrayList<Webserver> hosts = new ArrayList<>();
        
    public void addHost(Webserver server) {
        this.hosts.add(server);
    }    
}
````


### Aggregation (A hat B)

![Klassendiagramm](/docs/img/uml-aggregation.png)

Eine Firma kann nicht ohne einen Mitarbeiter (einschließlich Geschäftsführung) existieren.
Ein Mitarbeiter kann jedoch auch ohne Firma existieren (Dann hat er den Status *arbeitslos*).
Wird eine neue Firma gegründet, muss wenigstens ein Mitarbeiter zugeordnet werden. Das
passiert im Konstruktor.

````php
<?php

class Employee
{
    private Company $company;    
    
    public function setCompany(Company $company)
    {
        $this->company = $company;
    }
    
}

class Company
{
    private array $employees = [];
    
    public function __construct($employee)
    {
        if(is_array($employee)) {
            $this->employees = $employee;
        } elseif($employee instanceof Employee) {
            $this->employees[] = $employee;
        } else {
            throw new \Exception('Construct parameter contains no employee!');
        }
        foreach($this->employees as $employee) {
            $employee->setCompany($this);
        }
    }
        
    public function addEmployee(Employee $employee): void
    {
        $employee->setCompany($this);
        $this->employees[] = $employee;        
    }    
}
````

### Komposition (B ist Teil von A)

![Klassendiagramm](/docs/img/uml-composition.png)

Ein neues Dokument benötigt mindestens einen Absatz. Daher wird bei Instantiierung
eines ``Dokument``-Objekts ein ``Paragraph``-Objekt im Konstruktor instantiiert.

````php
<?php

class Paragraph
{
    private string $text;    
}

class Document
{
    private array $paragraphs = [];
    
    public function __construct()
    {
        $this->paragraphs[] = new Paragraph();
    }

}
````
Ein weiteres Beispiel für eine Komposition findest du auch unter [Magische Methoden](/docs/php/magic_methods.md)
im Abschnitt [PHP](/docs/php/_index.md). Weißt du, welches Beispiel gemeint ist?
