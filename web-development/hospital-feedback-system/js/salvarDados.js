function salvarNota(valor, idPergunta) {
    fetch('../../../src/controllers/salvar_resposta.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ nota: valor, id_pergunta: idPergunta })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Resposta salva:', data);
        
        fetch(`../../../src/controllers/getPerguntas.php?ultimo_id=${idPergunta}`)
            .then(response => response.json())
            .then(nextQuestion => {
                if (nextQuestion) {
                    window.location.href = `index.php?pergunta_id=${nextQuestion.id}`;
                } else {
                    window.location.href = 'opcional.php';  
                }
            })
            .catch(error => {
                console.error('Erro ao buscar próxima pergunta:', error);
            });
    })
    .catch(error => {
        console.error('Erro ao salvar a resposta:', error);
    });
}

let idPerguntaAtual = 1;  
let respostaSelecionada = null; 

function marcarResposta(valor) {
    if (respostaSelecionada !== null) {
        document.querySelectorAll('.square').forEach(button => {
            button.classList.remove('selected');
        });
    }

    const botaoSelecionado = document.querySelectorAll('.square')[valor];
    botaoSelecionado.classList.add('selected');

    respostaSelecionada = valor;

    document.getElementById('btnProximo').style.display = 'inline-block';
}

function proximaPergunta() {
    if (respostaSelecionada !== null) {
        fetch('../../../src/controllers/salvar_resposta.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ nota: respostaSelecionada, id_pergunta: idPerguntaAtual })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Resposta salva:', data);

            fetch(`../../../src/controllers/getPerguntas.php?ultimo_id=${idPerguntaAtual}`)
                .then(response => response.json())
                .then(nextQuestion => {
                    if (nextQuestion) {
                        document.querySelectorAll('.square').forEach(button => {
                            button.classList.remove('selected'); 
                        });

                        idPerguntaAtual = nextQuestion.id;  
   
                        document.querySelector('.question').textContent = nextQuestion.pergunta;

                        respostaSelecionada = null; 

                        document.getElementById('btnProximo').style.display = 'none';
                    } else {
                        window.location.href = 'opcional.php';
                    }
                })
                .catch(error => {
                    console.error('Erro ao buscar próxima pergunta:', error);
                });
        })
        .catch(error => {
            console.error('Erro ao salvar a resposta:', error);
        });
    } else {
        alert('Por favor, selecione uma resposta.');
    }
}

function salvarComentario() {
    const comentario = document.querySelector('.comment-box').value;

    fetch('../../../src/controllers/salvar_comentario.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ comentario: comentario })
    }).then(() => {
        window.location.href = '../agradecimento/agradecimento.php'; 
    }).catch(error => {
        console.error('Erro ao salvar o comentário:', error);
    });
}