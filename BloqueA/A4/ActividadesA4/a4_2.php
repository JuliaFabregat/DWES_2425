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
  public function deposit(float $amount): float{
    //Añade el valor pasado por parámetro a la propiedad balance y devuelve su nuevo valor
    $this->balance += $amount;

    return $this->balance;
  }

  public function withdraw(float $amount): float{
    // Quita el valor pasado por parámetro a la propiedad balance y devuelve su nuevo valor
    $this->balance -= $amount;

    return $this->balance;
  }
}

// Clase Customer
$customer = new Customer();
// Rellenamos los datos de las clases
$customer->email = 'ivy@eg.link';
$customer->forename = 'Ivy';
$customer->surname = 'Hernandez';

// Clase Account
$account = new Account();
// Rellenamos los datos de las clases
$account->balance = 100.00;

?>

<?php include 'includes/header.php'; ?>

  <p>Name: <?= $customer->forename . " " . $customer->surname ?></p>
  <p>Email: <?= $customer->email ?></p>
  <p>Balance: $<?= $account->balance ?></p>
  <p>Updated Balance: $<?= $account->deposit(50.00); ?></p>
  
<?php include 'includes/footer.php'; ?>
