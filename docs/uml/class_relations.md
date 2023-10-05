# Unified Modeling Language
## Klassenbeziehungen
### Generalisierung/Spezialisierung (B erbt von A)

![Klassendiagramm](/docs/img/uml-inherit.png)

Bei der Generalisierung/Spezialisierung spricht man davon, dass die **Unterklasse**
Attribute und Methoden der **Oberklasse** erbt. Die Unterklasse ist eine spezialisierte
Variante der Oberklasse.

#### PHP
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
    // SubClass hat nun die Attribute und Methoden von SuperClass geerbt
    // Der direkte Zugriff ist aber nur auf protected/public Attribute möglich
    
    $this->myProtectedAttribute = 5;
    
    $this->setMyPrivateAttribute($myParameter);
    
}
````
#### JAVA
````php
public class SuperClass {

    private int myPrivateAttribute;
    protected int myProtectedAttribute;
    
    protected void setMyPrivateAttribute(int parameter) {
        this.myPrivateAttribute = parameter;
    }
    
}

public class SubClass extends SuperClass {
    // SubClass hat nun die Attribute und Methoden von SuperClass geerbt
    // Der direkte Zugriff ist aber nur auf protected/public Attribute möglich    
    this.myProtectedAttribute = 5;
    
    this.setMyPrivateAttribute(5);
    
}
````