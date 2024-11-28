<?php
// Incluimos las clases
include './classes/Account_v2.php';

// Creamos un objeto para guardarlo en la propiedad de la clase base Account
$numbers = new AccountNumber(12345678, 987654321);

// Creamos una instancia de la clase Cuenta + sus propiedades
$account = new Account($numbers, 'Savings', 10.00);

?>

<?php include 'includes/header.php'; ?>

    <h2><?= $account->type ?> Account</h2>
    <p>Account: <?= $account->number->accountNumber ?></p>
    <p>Routing: <?= $account->number->routingNumber ?></p>

<?php include 'includes/footer.php'; ?>