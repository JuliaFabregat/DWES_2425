<?php
// Incluimos las clases
include 'classes/Account_EjFinal.php';
include 'classes/Customer_EjFinal.php';

// Creamos una instancia de la clase Cuenta + sus propiedades
$accounts = [
    new Account(20489446, 'Checking', -20),
    new Account(20148896, 'Savings', 380),
];

// Creamos una instancia de la clase Customer + sus propiedades
$customer = new Customer('Ivy', 'Stone', 'ivy@eg.link', 'Jup!t3r2684', $accounts);
?>

<!-- Mostramos los datos -->
<?php include 'includes/header.php'; ?>

    <h2>Name: <b><?= $customer->getFullName() ?></b></h2>
    <table>
        <tr>
            <th>Account Number</th>
            <th>Account Type</th>
            <th>Balance</th>
        </tr>

        <?php foreach ($customer->accounts as $account) { ?>
            <tr>
                <td><?= $account->number ?></td>
                <td><?= $account->type ?></td>
                <?php if ($account->getBalance() >= 0) { ?>
                    <td class="credit">
                <?php } else { ?>
                    <td class="overdrawn">
                <?php } ?>
                $ <?= $account->getBalance() ?></td>
            </tr>
        <?php } ?>

    </table>

<?php include 'includes/footer.php'; ?>