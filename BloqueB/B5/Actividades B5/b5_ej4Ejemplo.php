<!-- Ejemplo: Uso de funciones de cadenas multibyte (Pag 52)

Sobre el ejemplo anterior, realiza las siguientes modificaciones:
    - Modifica el texto en la variable $text del siguiente código para incluir caracteres de
    distintos idiomas (por ejemplo, chino, japonés) y explica cómo se comportan las
    funciones.

-->

<?php
// Variable con texto en varios idiomas
$text = 'Hello 你好 こんにちは 안녕';

?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

<h2>Ejemplo de funciones de cadenas multibyte</h2>

<p><b>Texto original:</b> <?= $text; ?></p>

<p><b>Character count using <code>strlen()</code>:</b> <?= strlen($text); ?></p>
<p><b>Character count using <code>mb_strlen()</code>:</b> <?= mb_strlen($text, 'UTF-8'); ?></p>

<p><b>Position of "你好" using <code>strpos()</code>:</b> <?= strpos($text, '你好'); ?></p>
<p><b>Position of "你好" using <code>mb_strpos()</code>:</b> <?= mb_strpos($text, '你好', 0, 'UTF-8'); ?></p>

<?php include './includes/footer.php'; ?>
