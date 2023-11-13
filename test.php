<?php

use App\{CPU, Customer, Form, PayPalAccount, Sort, StoreProduct as MyProduct, TextFieldType};

// require 'vendor/autoload.php';
require 'autoload.php';




// Array mit Objekten
$array = [new CPU("Intel"), new CPU("AMD"), new CPU("Texas Instruments"), new CPU("Analog Devices")];

// Methode zum Sortieren von Arrays
// uasort(array &$array, callable $callback);
uasort($array, new Sort('name'));

// Gibt Objekte sortiert nach Name aus.
//print_r($array);

$microwaveProduct = new MyProduct('Mikrowelle',20);
$customer = new Customer();
$paypal = new PayPalAccount();
$customer->payFor($microwaveProduct,$paypal);
$paypal->deposit(50);
$customer->payFor($microwaveProduct,$paypal);

/**
 * @var $myVar int Variable, die wir gleich dynamisch deklarieren werden.
 */

$name = "myVar";

${$name} = "Die Variable $name wurde jetzt deklariert.";

echo $myVar;


$form = new Form(name: 'myForm', options: ['class' => 'form-control']);

$form->addField(name: 'user',options: [
        'label' => 'Benutzername'
]);

echo $form->render();

?>
<h1>Formular</h1>
<form method="post">
    <label>
        Benutzername
        <input name="user" type="text" required>
    </label>
    <button type="submit">
        Absenden
    </button>
</form>

<?php if ( $form->isPost() ): ?>
    <h2>Formulardaten</h2>
    <p>Benutzername: <b><?=$form->getFieldData('user')?></b></p>
<?php endif ?>

