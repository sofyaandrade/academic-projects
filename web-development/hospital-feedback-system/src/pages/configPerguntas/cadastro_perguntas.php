<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: ../login/admin.php");
    exit();
}

include '../../database/database.php';

// Buscar todas as perguntas da tabela "perguntas"
$stmt = $conn->query("SELECT * FROM perguntas");
$perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação Hospitalar</title>
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="stylesheet" href="cadastro_perguntas.css">
    <script src="../../../public/js/script.js"></script>
    <script src="../../../public//perguntas.js"></script>
</head>
<body>
    <div class="content-container">
       
        <div class="header">
            <div class="logo"><img src="../../assets/logo.png" alt=""></div>
            <div class="title">Hospital Regional do Alto Vale do Itajaí</div>
        </div>

        <div class="main">
            <div class="actions">
                <button class="add-button">+ Adicionar</button>
            </div>
            <table class="table-config">
                <thead>
                    <tr>
                        <th>Ordem</th>
                        <th>Pergunta</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($perguntas as $row) { ?>
                    <tr>
                        <td class="td-id"><?php echo $row['id']; ?></td>
                        <td>
                            <div class="cell-content">
                                <span class="text-content"><?php echo $row['pergunta']; ?></span>
                                <div class="buttons">
                                    <button class="button-cad" onclick="editar()">Editar</button>
                                    <button class="button-cad" onclick="excluir()">Excluir</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>

<!--<button class="square" ></button>-->