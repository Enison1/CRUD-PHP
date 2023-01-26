function pergunta() {
    // retorna true se confirmado, ou false se cancelado
    return confirm('Tem certeza que quer apagar este(s) registro(s)?');
}

function validateName() {
    var inputValue = document.getElementById("dNome").value;

    if (!inputValue.match(/^[A-Za-z\s]+$/)) {
        alert("Nome inválido");
        document.getElementById("dNome").value = '';
        document.getElementById("dNome").style.background = "#D4D4D4"
    }
}

function age() {
    var today = new Date();

    var cData = new Date(document.getElementById("dData").value);
    var diff = today - cData;
    var age = diff / (1000 * 60 * 60 * 24 * 365.25);

    if (age > 120) {
        document.getElementById("dData").value = "";
        alert("A data de nascimento informada é inválida, pois a pessoa tem mais de 120 anos.");
        document.getElementById('dData').focus();
        document.getElementById("dData").style.background = "#D4D4D4";

        return false;
    } else {
        return true;
    }
}