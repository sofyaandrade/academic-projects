<?php
session_start();
include '../database/database.php';

$login = $_POST['login'];
$senha = $_POST['senha'];

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE login = :login AND senha = :senha");
$stmt->bindParam(':login', $login);
$stmt->bindParam(':senha', $senha);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $_SESSION['loggedin'] = true; 
    header("Location: ../pages/configPerguntas/cadastro_perguntas.php"); 
} else {
    echo "Login ou senha inválidos!";
}
?>
