
function goToLogin() {
    window.location.href = '../login/admin.php';  
}

function voltarInicio() {
    window.location.href = '../perguntas/index.php';  
}

function iniciarRedirecionamento(tempoInicial, destino) {
    let countdown = tempoInicial;
    const countdownElement = document.getElementById('countdown');

    const timer = setInterval(() => {
        countdown--;
        countdownElement.textContent = countdown; 

        if (countdown <= 0) {
            clearInterval(timer);
            window.location.href = destino; 
        }
    }, 1000); 
}