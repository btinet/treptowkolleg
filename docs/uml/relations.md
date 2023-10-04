# Unified Modeling Language
## Klassenbeziehungen

### Allgemeine Form

![Klassendiagramm](/docs/img/uml-relations.png)

### Assoziation (A kennt B)

![Klassendiagramm](/docs/img/uml-association.png)

````php
<?php

class Browser
{
    private array $hosts = [];
        
    protected function addHost(Webserver $server): void
    {
        $this->hosts[] = $server;
    }    
}

class Webserver
{
    private string $title = 'website title';
    private string $ip = '192.168.0.1';    
}
````

### Aggregation (A hat B)

![Klassendiagramm](/docs/img/uml-aggregation.png)

### Komposition (B ist Teil von A)

![Klassendiagramm](/docs/img/uml-composition.png)

### Generalisierung/Spezialisierung (B erbt von A)

Bei der Generalisierung/Spezialisierung spricht man davon, dass die **Unterklasse**
Attribute und Methoden der **Oberklasse** erbt. Die Unterklasse ist eine spezialisierte
Variante der Oberklasse.

![Klassendiagramm](/docs/img/uml-inherit.png)

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
