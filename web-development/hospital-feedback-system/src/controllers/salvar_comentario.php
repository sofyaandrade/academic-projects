<?php
include '../database/database.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['comentario'])) {
    $comentario = $data['comentario'];

    $stmt = $conn->prepare("INSERT INTO comentarios (comentario) VALUES (:comentario)");
    $stmt->bindParam(':comentario', $comentario, PDO::PARAM_STR);
    $stmt->execute();
}
?>