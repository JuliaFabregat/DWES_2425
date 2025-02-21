<!DOCTYPE html>
<html>
  <head>
    <title>Mountain Art Supplies</title>
    <link href="../css/styles.css" rel="stylesheet">
  </head>
  <body>
    <div class="page">
      <header>
        <a href="index.php"><img src="../img/logo.png" alt="Mountain Art Supplies" height="90"></a>
      </header>
      <nav>
        <a href="index.php">Home</a>
        <a href="products.php">Products</a>
        <a href="account.php">My Account</a>
        <?= $logged_in ? '<a href="logout.php">Log Out</a>' : '<a href="login.php">Log In</a>'; ?>
      </nav>
      <section>