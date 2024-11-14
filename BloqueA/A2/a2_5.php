<!-- PHP -->
<?php
    // VARIABLES
    $day = 'Wednesday';

    // Switch
    switch($day){
        case 'Monday':
            $offer = '20% off chocolates';
            break;
        case 'Tuesday':
            $offer = '20% off mints';
            break;
        case 'Wednesday':
            $offer = '20% off enchiladas';
            break;
        default:
            $offer = 'Buy three packs, get one free';
            break;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A2_5. Switch</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Offers on <?= $day; ?></h2>
    <p> <?= $offer ?> </p>
</body>
</html>