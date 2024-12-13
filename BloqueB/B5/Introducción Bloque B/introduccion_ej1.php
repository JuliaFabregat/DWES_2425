<?php
// Variables
$username = 'Icy';
$user_array = [
    'name'=>'Icy',
    'age'=>24,
    'active'=>true,
];

class User{
    // Propiedades
    public $name;
    public $age;
    public $active;

    // Constructor
    public function __construct($name, $age, $active){
        $this->name = $name;
        $this->age = $age;
        $this->active = $active;
    }
}

// MAIN
$user_object = new User('Icy', 24, true);

?>

<!-- HTML -->
<?php include 'includes/header.php' ?>

<!-- Con PRE englobando todo el texto -->
<pre>Scalar: <?php var_dump($username); ?> </pre>
<!-- Con PRE solo englobando la salida de PHP -->
<p>Array: <pre> <?php var_dump($user_array); ?> </pre> </p>
<p>Object: <pre> <?php var_dump($user_object); ?> </pre> </p>

<?php include 'includes/footer.php' ?>