<?php
include '../database/database.php';

$ultimo_id = isset($_GET['ultimo_id']) ? (int)$_GET['ultimo_id'] : 0;

$stmt = $conn->prepare("SELECT id, pergunta FROM perguntas WHERE id > :ultimo_id ORDER BY id LIMIT 1");
$stmt->bindParam(':ultimo_id', $ultimo_id, PDO::PARAM_INT);
$stmt->execute();

$pergunta = $stmt->fetch(PDO::FETCH_ASSOC);

if ($pergunta) {
    echo json_encode($pergunta);
} else {
    echo json_encode(null);
}

$conn = null;
?>

