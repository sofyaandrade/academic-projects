<?php
// Inclui a conexão ao banco de dados
include '../database/database.php';

// Função para listar perguntas
function listarPerguntas($conn) {
    $stmt = $conn->prepare("SELECT id, pergunta FROM perguntas ORDER BY id ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para inserir ou editar pergunta
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto = $_POST['pergunta'];
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

    if ($id > 0) {
        // Atualizar pergunta existente
        $stmt = $conn->prepare("UPDATE perguntas SET pergunta = :pergunta WHERE id = :id");
        $stmt->bindParam(':pergunta', $pergunta, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } else {
        // Inserir nova pergunta
        $stmt = $conn->prepare("INSERT INTO perguntas (pergunta) VALUES (:pergunta)");
        $stmt->bindParam(':pergunta', $pergunta, PDO::PARAM_STR);
        $stmt->execute();
    }
}

// Fechar a conexão com o banco
$conn = null;
?>
