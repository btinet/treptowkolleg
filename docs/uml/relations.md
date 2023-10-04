# Unified Modeling Language
## Klassenbeziehungen

### Allgemeine Form

![Klassendiagramm](/docs/img/uml-relations.png)

### Assoziation (A kennt B)

![Klassendiagramm](/docs/img/uml-association.png)

Der Browser kennt den Webserver, was durch die Methode ``addHost(Webserver $server)`` zum Ausdruck
gebracht wird.

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
        $this->$employees[] = $employee;        
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

### Generalisierung/Spezialisierung (B erbt von A)

![Klassendiagramm](/docs/img/uml-inherit.png)

Bei der Generalisierung/Spezialisierung spricht man davon, dass die **Unterklasse**
Attribute und Methoden der **Oberklasse** erbt. Die Unterklasse ist eine spezialisierte
Variante der Oberklasse.

````php
<?php

class SuperClass
{
    private $myPrivateAttribute;
    protected $myProtectedAttribute;
    
    protected function setMyPrivateAttribute($parameter)
    {
        $this->myPrivateAttribute = $parameter;
    }
    
}

class SubClass extends SuperClass
{
    // SubClass hat nun die Attribute von SuperClass geerbt
    // Der direkte Zugriff ist aber nur auf protected Attribute möglich
    
    $this->myProtectedAttribute = 5;
    
    $this->setMyPrivateAttribute($myParameter);
    
}
````
