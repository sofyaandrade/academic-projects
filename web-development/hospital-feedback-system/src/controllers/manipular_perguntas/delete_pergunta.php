<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: admin.php");
    exit();
}

include '../database/database.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM perguntas WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
header("Location: ../src/pages/configPerguntas/perguntas.php");
?>