<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: admin.php");
    exit();
}

include '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pergunta = $_POST['pergunta'];
    $stmt = $conn->prepare("INSERT INTO perguntas (pergunta) VALUES (:pergunta)");
    $stmt->bindParam(':pergunta', $pergunta);
    $stmt->execute();
    header("Location: ../src/pages/configPerguntas/perguntas.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pergunta</title>
</head>
<body>
    <h1>Adicionar Pergunta</h1>
    <form action="add_pergunta.php" method="POST">
        <label for="pergunta">Pergunta:</label>
        <input type="text" id="pergunta" name="pergunta" required>
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
