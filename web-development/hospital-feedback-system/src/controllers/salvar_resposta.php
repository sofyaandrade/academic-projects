<?php
include '../database/database.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['nota']) && isset($data['id_pergunta'])) {
    try {
        $nota = $data['nota'];
        $id_pergunta = $data['id_pergunta'];

        $stmt = $conn->prepare("INSERT INTO respostas (id_pergunta, valor) VALUES (:id_pergunta, :valor)");
        $stmt->bindParam(':id_pergunta', $id_pergunta, PDO::PARAM_INT);
        $stmt->bindParam(':valor', $nota, PDO::PARAM_INT);
        $stmt->execute();

        echo json_encode(["status" => "success", "message" => "Resposta salva com sucesso."]);
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Nota ou ID da pergunta não recebidos."]);
}
?>
