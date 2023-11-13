<?php

use App\{CPU, Customer, Form, PayPalAccount, Sort, StoreProduct as MyProduct, SubmitButtonType, TextFieldType};

// require 'vendor/autoload.php';
require 'autoload.php';




// Array mit Objekten
$array = [new CPU("Intel"), new CPU("AMD"), new CPU("Texas Instruments"), new CPU("Analog Devices")];

// Methode zum Sortieren von Arrays
// uasort(array &$array, callable $callback);
uasort($array, new Sort('name'));

// Gibt Objekte sortiert nach Name aus.
//print_r($array);

//$microwaveProduct = new MyProduct('Mikrowelle',20);
//$customer = new Customer();
//$paypal = new PayPalAccount();
//$customer->payFor($microwaveProduct,$paypal);
//$paypal->deposit(50);
//$customer->payFor($microwaveProduct,$paypal);

/**
 * @var $myVar int Variable, die wir gleich dynamisch deklarieren werden.
 */

$name = "myVar";

${$name} = "Die Variable $name wurde jetzt deklariert.";

//echo $myVar;


$form = new Form(name: 'myForm');

$form
    ->addField(name: 'user',options: [
            'label' => 'Benutzername',
            'class' => 'input',
            'required' => 'required'
    ])
    ->addField(name: 'email',options: [
            'label' => 'E-Mail-Adresse',
            'class' => 'input',
            'required' => 'required'
    ])
    ->addField('submit',SubmitButtonType::class,[
            'label' => 'Absenden',
            'class' => 'button is-primary'
    ])
;

?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Informatik AG!</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    </head>
    <body>
    <section class="section">
        <div class="container mb-5">
            <h1 class="title">Formular</h1>
            <?=$form->render()?>
        </div>
        <div class="container mb-3">
            <?php if ( $form->isPost() ): ?>
                <h2 class="subtitle">Formulardaten</h2>
                <ul>
                    <?php foreach ($form->getChildren() as $child): ?>
                        <li>
                            <?=$child->getName()?>: <b><?=$child->getData()?></b>
                        </li>
                    <?php endforeach;?>
                </ul>
            <?php endif ?>
        </div>
    </section>
    </body>

</html>


