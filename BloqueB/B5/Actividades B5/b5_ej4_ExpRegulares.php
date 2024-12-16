<!-- Ejemplo: usando expresiones regulares (Pag 70)

Desarrollar un script en PHP que realice diversas operaciones de validación y
manipulación de texto usando funciones de expresiones regulares. El script procesará un
array de cadenas que contiene varias líneas de datos, como direcciones de correo
electrónico, números de teléfono y URLs.

1. Crear un archivo PHP (regex_practice.php ) y definir el array $data con el
contenido proporcionado.

2. Utilizar preg_match para validar correos electrónicos: 
    - Crear una expresión regular que valide las direcciones de correo electrónico y comprobar 
    cada elemento del array.

3. Utilizar preg_match_all para extraer números de teléfono: 
    - Crear una expresión regular que coincida con los números de teléfono y extraer todos los números válidos.

4. Utilizar preg_split para dividir una URL en sus componentes: 
    - Crear una expresión regular que divida una URL en protocolo, dominio y ruta.

5. Utilizar preg_replace  para limpiar las direcciones de correo inválidas: 
    - Crear una expresión regular que reemplace las direcciones de correo electrónico inválidas con
    una cadena vacía.
-->

<?php
// Datos de entrada
$data = [
    "john.doe@example.com",
    "jane-doe@website.org",
    "invalid-email@com",
    "123-456-7890",
    "987.654.3210",
    "http://www.example.com",
    "https://site.org/path?query=string",
    "not-a-url"
];


// PREG_MATCH -> Validación de correos electrónicos
$emailRegex = '/^[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,6}$/i';
$validEmails = [];

foreach ($data as $item) {
    if (preg_match($emailRegex, $item)) {
        $validEmails[] = $item;
    }
}


// PREG_MATCH_ALL -> Extracción de números de teléfono
$phoneRegex = '/\b\d{3}[-.]\d{3}[-.]\d{4}\b/';
$validPhones = [];

foreach ($data as $item) {
    if (preg_match_all($phoneRegex, $item, $matches)) {
        foreach ($matches[0] as $phone) {
            $validPhones[] = $phone;
        }
    }
}


// PREG_SPLIT -> División de URLs
$urlRegex = '/[/:?]/';
$validUrls = [];

foreach ($data as $item) {
    $components = preg_split($urlRegex, $item, -1, PREG_SPLIT_NO_EMPTY);
    if (count($components) >= 3 && ($components[0] === 'http' || $components[0] === 'https')) {
        $path = '';
        if (count($components) > 2) {
            for ($i = 2; $i < count($components); $i++) {
                $path .= ($i > 2 ? '/' : '') . $components[$i];
            }
        }
        $validUrls[] = [
            'protocol' => $components[0],
            'domain' => $components[1],
            'path' => $path
        ];
    }
}

// PREG_REPLACE -> Limpieza de correos inválidos
$cleanedData = [];

foreach ($data as $item) {
    $cleanedData[] = preg_replace($emailRegex, '', $item);
}

?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

<h2>Correos Electrónicos Válidos</h2>
<ul>
    <?php foreach ($validEmails as $email) : ?>
        <li><?= $email ?></li>
    <?php endforeach; ?>
</ul>

<h2>Números de Teléfono Válidos</h2>
<ul>
    <?php foreach ($validPhones as $phone) : ?>
        <li><?= $phone ?></li>
    <?php endforeach; ?>
</ul>

<h2>URLs Válidas</h2>
<ul>
    <?php foreach ($validUrls as $url) : ?>
        <li>
            <ul>
                <li>Protocolo: <?= $url['protocol'] ?></li>
                <li>Dominio: <?= $url['domain'] ?></li>
                <li>Ruta: <?= $url['path'] ?></li>
            </ul>
        </li>
    <?php endforeach; ?>
</ul>

<h2>Datos Limpiados</h2>
<ul>
    <?php foreach ($cleanedData as $item) : ?>
        <?php if ($item) : ?>
            <li><?= $item ?></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<?php include './includes/footer.php'; ?>
