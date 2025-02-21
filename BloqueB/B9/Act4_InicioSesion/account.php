<?php 
include '../includes/sessions.php';

require_login($logged_in);

?>

<!-- HTML -->
<?php include '../includes/header-member.php'; ?>

<h1>Account</h1>

<p><b>Bienvenida</b> <?= $validEmail ?></p>

<?php include '../includes/footer.php'; ?>