function validateSize() {
    var file = document.getElementById("cFoto").files[0];
    var maxSize = 200 * 1024;
    if (file.size > maxSize) {
        alert("O tamanho da imagem é maior que 200KB");
        document.getElementById("cFoto").value = "";
    } else {
        fileType.fromBlob(file).then(function (result) {
            if (result.mime !== 'image/jpeg') {
                alert("Apenas arquivos JPG são permitidos.");
                document.getElementById("cFoto").value = "";
            }
        })
    }
}

function age() {
    var today = new Date();

    var cData = new Date(document.getElementById("cData").value);
    var diff = today - cData;
    var age = diff / (1000 * 60 * 60 * 24 * 365.25);

    if (age > 120) {
        document.getElementById("cData").value = "";
        alert("A data de nascimento informada é inválida, pois a pessoa tem mais de 120 anos.");
        document.getElementById('cData').focus();
        document.getElementById("cData").style.background = "#D4D4D4";

        return false;
    } else {
        return true;
    }
}

function validateEmail() {
    var inputValue = document.getElementById("cEmail").value;
    var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (!emailRegex.test(inputValue)) {
        alert("Email inválido");
        document.getElementById("cEmail").value = '';
    }
}

function validateName() {
    var inputValue = document.getElementById("cNome").value;

    if (!inputValue.match(/^[A-Za-z\s]+$/)) {
        alert("Nome inválido");
        document.getElementById("cNome").value = '';
    }
}

function pergunta() {
    var checkboxes = document.querySelectorAll('input[type=checkbox]');
    var isChecked = false;
    let cont = 0

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            isChecked = true;
            cont++
        }
    }

    if (isChecked) {
        if (cont > 1) {
            return confirm("Você tem certeza que deseja excluir os registros selecionados?")
        } else {
            return confirm("Você tem certeza que deseja excluir o registro selecionado?");
        }
    } else {
        alert("Nenhum registro selecionado!");
        return false;
    }
}