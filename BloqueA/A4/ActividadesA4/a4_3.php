<?php
declare(strict_types = 1);


class Account{
  // Propiedades
  public int $number;
  public string $type;
  public float $balance;

  // CONSTRUCTOR
  public function __construct(int $number, string $type, float $balance = 0.00)
  {
      $this->number  = $number;
      $this->type    = $type;
      $this->balance = $balance;
  }

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

/// Clase Account
$checking = new Account(43161176, 'Checking', 32.00);
$savings = new Account(20148896, 'Savings', 756.00);



// Clase Product
// Incluimos el archivo de la clase Product
include 'classes/Product.php';

$pan = new Product(1, 'Pan', 3.50, 10);
$empanada = new Product(2, 'Empanada', 2.00);  
// No ponemos stock para comprobar que coja el valor por defecto
// Si lees esto sí, vivan las empanadas

// Actualizamos alguna propiedad para probar que se cambia
$pan->stock = 5;
$empanada->price = 1.50;

?>

<?php include 'includes/header.php'; ?>

  <h2>Account Balances</h2>
    <table>
    <tr>
        <th>Date</th>
        <th><?= $checking->type ?></th>
        <th><?= $savings->type  ?></th>
    </tr>
    <tr>
        <td>23 June</td>
        <td>$<?= $checking->balance ?></td>
        <td>$<?= $savings->balance  ?></td>
    </tr>
    <tr>
        <td>24 June</td>
        <td>$<?= $checking->deposit(12.00)  ?></td>
        <td>$<?= $savings->withdraw(100.00) ?></td>
    </tr>
    <tr>
        <td>25 June</td>
        <td>$<?= $checking->withdraw(5.00) ?></td>
        <td>$<?= $savings->deposit(300.00) ?></td>
    </tr>
    </table>

    <br><br>

    <h2>Product List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>

        <tr>
            <th><?= $pan->id ?></th>
            <th><?= $pan->name ?></th>
            <th><?= $pan->price ?></th>
            <th><?= $pan->stock ?></th>
        </tr>

        <tr>
            <th><?= $empanada->id ?></th>
            <th><?= $empanada->name ?></th>
            <th><?= $empanada->price ?></th>
            <th><?= $empanada->stock ?></th>
        </tr>
    </table>

<?php include 'includes/footer.php'; ?>
