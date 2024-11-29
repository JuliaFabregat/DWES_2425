<?php
declare(strict_types = 1);

// NO INCLUIMOS LA CLASE EXTERNAMENTE YA QUE SIGUE PIDIENDO UN INT EN ACCOUNT EN VEZ DE UN ARRAY
class Account{
    // PROPIEDADES ----
    public int $number;
    public string $type;
    protected float $balance; // No se puede acceder a esta propiedad fuera de la clase
    protected string $owner;    // Nueva propiedad privada


    // CONSTRUCTOR ----
    public function __construct(int $number, string $type, float $balance = 0.00, string $owner = '')
    {
        $this->number  = $number;
        $this->type    = $type;
        $this->balance = $balance;
        $this->owner = $owner;  // Añadimos la nueva propiedad al constructor
        // Le ponemos valor por defecto vacío para que no salte error
    }



    // GETTERS Y SETTERS ----
    public function getBalance(): float{
        // Permite acceder al balance, ya que lo hemos protegido
        return $this->balance;
    }

    public function getOwner(): string{
        // Obtenemos el nombre
        return $this->owner;
    }

    public function setOwner($nameOwner){
        // Establecemos el nombre
        $this->owner = $nameOwner;
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

// Clase Account
//$checking = new Account(43161176, 'Checking', 32.00);
$account = new Account(20148896, 'Savings', 80.00);

$secondAccount = new Account(23232323, 'Savings', 200);
$secondAccount->setOwner('Marcus'); // Actualizamos el nombre del Owner

?>

<?php include 'includes/header.php'; ?>

<!-- Type -> 'Savings' Significa que es una cuenta de ahorros -->
  <h2><?= $account->type ?> Account</h2>
  <p>Previous balance: $<?= $account->getBalance() ?></p>
  <p>New Balance: $<?= $account->deposit(35.00) ?></p>

  <h2><?= $secondAccount->type ?> Account</h2>
  <p>Owner: <?= $secondAccount->getOwner() ?></p>
  <p>Previous balance: $<?= $secondAccount->getBalance() ?></p>
  <p>New Balance: $<?= $secondAccount->deposit(100.00) ?></p>

<?php include 'includes/footer.php'; ?>
