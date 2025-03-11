<?php
declare(strict_types = 1);
require 'includes/database-connection.php';
require 'includes/functions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    redirect('lista-animales.php');
}

try {
    // 1. Obtener información de la imagen asociada
    $sql = "SELECT imagen_id FROM animales WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $imagen_id = $stmt->fetchColumn();

    // 2. Eliminar el animal
    $sql = "DELETE FROM animales WHERE id = :id";
    pdo($pdo, $sql, ['id' => $id]);

    // 3. Si existe imagen asociada, eliminarla también
    if ($imagen_id) {
        // Obtener nombre del archivo
        $sql_imagen = "SELECT imagen FROM imagenes WHERE id = :imagen_id";
        $stmt_imagen = $pdo->prepare($sql_imagen);
        $stmt_imagen->execute(['imagen_id' => $imagen_id]);
        $nombre_imagen = $stmt_imagen->fetchColumn();

        // Eliminar registro de la tabla imagenes
        $sql_delete = "DELETE FROM imagenes WHERE id = :imagen_id";
        pdo($pdo, $sql_delete, ['imagen_id' => $imagen_id]);

        // Eliminar archivo físico (si existe)
        $ruta_archivo = "uploads/" . $nombre_imagen;
        if (file_exists($ruta_archivo)) {
            unlink($ruta_archivo);
        }
    }

    redirect('lista-animales.php', ['success' => 'Animal eliminado']);
} catch (PDOException $e) {
    redirect('lista-animales.php', ['error' => 'Error al eliminar: ' . $e->getMessage()]);
}