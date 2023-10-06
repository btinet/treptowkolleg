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

### Schnittstellen (Interfaces)

![Interface](/docs/img/uml-interface.png)

Schnittstellen bzw. Interfaces werden zur losen Kopplung zwischen Klassen genutzt. Ändert sich
die Klasse, die eine Schnittstelle implementiert, kann ein anderes Objekt, dass diese Schnittstelle
nutzt, unverändert bleiben. Denn die Schnittstelle selbst bleibt dieselbe. Jede Klasse, die
ein Interface implementiert, muss zwanghaft alle Interface-Methoden implementieren.

Interfaces können statische Attribute und default-Implementierungen,
also nur Methodenköpfe, enthalten.

#### PHP

````php
<?php

interface BankAccountInterface
{
    public function deposit(int $amount): bool;
    public function withdraw(int $amount): bool;
}

class PayPalAccount implements BankAccountInterface
{
    private int $money = 0;

    public function deposit(int $amount): bool
    {
        $this->money += $amount;
        echo sprintf("Es wurden %s per PayPal eingezahlt.",$amount). PHP_EOL;
        return true;
    }

    public function withdraw(int $amount): bool
    {
        if($this->money - $amount >= 0) {
            $this->money -= $amount;
            echo sprintf("Es wurden %s per PayPal gezahlt.",$amount). PHP_EOL;
            return true;
        } else {
            echo "Der Verfügungsrahmen reicht nicht aus." . PHP_EOL;
            return false;
        }
    }
}

class Customer
{
    private array $myProducts = [];

    public function payFor(StoreProduct $product, BankAccountInterface $bankAccount) : void
    {
        if($bankAccount->withdraw($product->getPrice())) {
            echo sprintf("%s wurde gekauft.",$product->getLabel()). PHP_EOL;
            $this->myProducts[] = $product;
        }
    }
}

function clientCode() {
    $microwaveProduct = new StoreProduct('Mikrowelle',20);
    $customer = new Customer();
    $paypal = new PayPalAccount();
    $paypal->deposit(50);
    $customer->payFor($microwaveProduct,$paypal);
}

````