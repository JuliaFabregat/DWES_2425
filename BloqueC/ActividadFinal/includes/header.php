<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= html_escape($title) ?></title>
    <meta name="description" content="<?= html_escape($description) ?>">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    <link rel="shortcut icon" type="image/png" href="img/logoColor_blank.png">
  </head>
  <body>
    <header>
      <div class="container">
        <a class="skip-link" href="#content">Skip to content</a>
        <div class="logo">
          <a href="index.php"><img src="img/logoCompleto.png" alt="Camada - Refugio Animales"></a>
        </div>
        <nav>
          <ul id="menu">
            <li>
                <a href="lista-animales.php" 
                    <?= ($section == 'listaAnimales') ? 'class="on" aria-current="page"' : '' ?>>
                    Gestión de Animales
                </a>
            </li>
            <li>
              <a href="agregar-animales.php" 
                  <?= ($section == 'agregarAnimales') ? 'class="on" aria-current="page"' : '' ?>>
                  Agregar Animales
              </a>
          </li>
          </ul>
        </nav>
      </div><!-- /.container -->
    </header>