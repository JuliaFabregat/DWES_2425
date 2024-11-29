<?php
declare(strict_types = 1);

// Incluimos el archivo de la clase Product
require_once 'classes/Product.php';

// Clase Product
$pan = new Product(1, 'Pan', 3.50, 10);
$empanada = new Product(2, 'Empanada', 2.00);  // No ponemos stock para comprobar que coja el valor por defecto
// Si lees esto sí, vivan las empanadas

// Actualizamos alguna propiedad para probar que se cambia
$pan->stock = 5;
$empanada->price = 1.50;

?>


<!-- HTML -->
<?php include 'includes/header.php'; ?>

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
