<?php
// Creación de una clase

class Customer{
    // Propiedades
    public string $forename;
    public string $surname;
    public string $email;
    public string $password;
}

class Account{
  // Propiedades
  public int $number;
  public string $type;
  public float $balance;

  // MÉTODOS ----
}

// Creamos los objetos de las clases propuestas
$customer = new Customer();
$account = new Account();

// Rellenamos los datos de las clases
// Clase Customer
$customer->email = 'ivy@eg.link';
$customer->forename = 'Ivy';
$customer->surname = 'Hernandez';

// Clase Account
$account->balance = 1000.00;

?>


<!-- HTML -->
<?php include 'includes/header.php'; ?>

  <p>Name: <?= $customer->forename . " " . $customer->surname ?></p>
  <p>Email: <?= $customer->email ?></p>
  <p>Balance: $<?= $account->balance ?></p>
  
<?php include 'includes/footer.php'; ?>
