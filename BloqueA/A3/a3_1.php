<!-- PHP -->
<?php
    // FUNCIONES
    function write_logo(){
        echo '<img src="./../A1/RecursosA1/img/logo.png" alt="logo" width="50" height="auto"/>';
    }

    function write_copyright_notice(){
        $year = date('Y');
        echo '&copy; ' . $year . '<i>The Candy Store</i>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A3_1. Funciones Básicas</title>
    <link rel="stylesheet" href="../A1/RecursosA1/css/styles.css">
</head>

<body>
    <header>
        <h1><?php write_logo()?> The Candy Store</h1>
    </header>

    <article>
        <h2>Welcome to the Candy Store</h2>
    </article>

    <footer>
        <?php write_logo() ?>
        <?php write_copyright_notice() ?>
    </footer>
</body>

</html>
