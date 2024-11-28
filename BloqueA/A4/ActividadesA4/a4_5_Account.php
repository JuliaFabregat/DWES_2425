<?php
// Incluimos la clase ya que la hemos independizado
include './classes/Account.php';

// Clase Account
// Almacenar un array en una propiedad de un objeto
$numbers = [
    'account_number' => 12345678,
    'routing_number' => 987654321,
];


//$account = new Account(20148896, 'Savings', 80.00);
$account = new Account($numbers, 'Savings', 10.00);
$account->setOwner('Maria');
$account->surname = 'Hernandez';


$secondAccount = new Account(['account_number' => 23232323, 'routing_number' => 123456789], 'Savings', 200);
$secondAccount->setOwner('Marcus'); // Establecemos el nombre del Owner
$secondAccount->surname = 'Smith';

?>

<?php include 'includes/header.php'; ?>

<!-- Type -> 'Savings' Significa que es una cuenta de ahorros -->
  <h2><?= $account->type ?> account</h2>
  <p> Owner: <?= $account->getOwner() . " ". $account->surname ?></p>
  <p> Account: <?= $account->numbers['account_number'] ?></p>
  <p> Routing: <?= $account->numbers['routing_number'] ?></p>

<?php include 'includes/footer.php'; ?>
