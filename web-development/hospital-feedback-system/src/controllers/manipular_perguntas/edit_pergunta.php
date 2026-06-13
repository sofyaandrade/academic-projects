<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: admin.php");
    exit();
}

include '../database/database.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM perguntas WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$pergunta = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_pergunta = $_POST['pergunta'];
    $stmt = $conn->prepare("UPDATE perguntas SET pergunta = :pergunta WHERE id = :id");
    $stmt->bindParam(':pergunta', $nova_pergunta);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: ../src/pages/configPerguntas/perguntas.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pergunta</title>
</head>
<body>
    <h1>Editar Pergunta</h1>
    <form action="edit_pergunta.php?id=<?php echo $id; ?>" method="POST">
        <label for="pergunta">Pergunta:</label>
        <input type="text" id="pergunta" name="pergunta" value="<?php echo $pergunta['pergunta']; ?>" required>
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>

