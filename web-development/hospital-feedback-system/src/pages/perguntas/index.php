<?php
include '../../database/database.php';

// Obtém a próxima pergunta a ser exibida
$perguntaAtual = isset($_GET['pergunta_id']) ? $_GET['pergunta_id'] : 1; // Default é a primeira pergunta

$stmt = $conn->prepare("SELECT id, pergunta FROM perguntas WHERE id = :pergunta_id");
$stmt->bindParam(':pergunta_id', $perguntaAtual, PDO::PARAM_INT);
$stmt->execute();
$pergunta = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se a pergunta existe
if (!$pergunta) {
    header('Location: ../opcional/opcional.php'); // Redireciona para a tela de comentários, caso todas as perguntas sejam respondidas
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação Hospitalar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link rel="stylesheet" href="../../../public/css/style.css">
    <link rel="stylesheet" href="avaliacao.css">
    <script src="../../../js/redirecionamentos.js"></script>
    <script src="../../../js/salvarDados.js"></script>
</head>
<body>
    <<div class="content-container">
        <div class="header">
            <div class="logo"><img src="../../assets/logo.png" alt=""></div>
            <div class="title">Hospital Regional do Alto Vale do Itajaí</div>
            <button class="gear-button" onclick="goToLogin()">
                <i class="fas fa-cog"></i>
            </button>
        </div>

        <div class="main">
            <div class="question" id="pergunta">
                <?php echo $pergunta['pergunta']; ?>
            </div>
            <div class="rating">
                <?php for ($i = 0; $i <= 10; $i++): ?>
                    <button class="square" style="background-color: <?= getColor($i) ?>" onclick="marcarResposta(<?= $i ?>)">
                        <?= $i ?>
                    </button>
                <?php endfor; ?>
            </div>

            <!-- Botão de 'Próximo' que estará oculto inicialmente -->
            <button class="next-button" id="btnProximo" style="display: none;" onclick="proximaPergunta()">Próxima</button>
            <div class="anonymous">
                Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.
            </div>
        </div>
    </div>

    <?php
    function getColor($value) {
        $colors = [
            'rgb(255, 77, 77)', 'rgb(255, 123, 77)', 'rgb(255, 168, 77)',
            'rgb(255, 189, 77)', 'rgb(255, 210, 77)', 'rgb(255, 235, 77)',
            'rgb(234, 255, 77)', 'rgb(189, 255, 77)', 'rgb(143, 255, 77)',
            'rgb(77, 255, 77)', 'rgb(77, 255, 123)'
        ];
        return $colors[$value];
    }
    ?>
</body>
</html>
