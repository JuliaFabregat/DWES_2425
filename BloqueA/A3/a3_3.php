<!-- PHP -->
<?php
    // FUNCIONES
    function create_logo(){
        return '<img src="./../A1/RecursosA1/img/logo.png" alt="logo" width="50" height="auto"/>';
    }

    function create_copyright_notice(){
        $year = date('Y');
        $message = '&copy; ' . $year . '<i>The Candy Store</i>';
        return $message;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A3_3. Definir funciones que necesitan información</title>
    <link rel="stylesheet" href="../A1/RecursosA1/css/styles.css">
</head>

<body>
    <header>
        <h1><?= create_logo()?> The Candy Store</h1>
    </header>

    <article>
        <h2>Welcome to the Candy Store</h2>
    </article>

    <footer>
        <?= create_logo() ?>
        <?= create_copyright_notice() ?>
    </footer>
</body>

</html>