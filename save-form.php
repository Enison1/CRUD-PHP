<?php
// Conexão com o banco de dados
include_once "funcao.php";
$conn = getConnection();

// Receber dados do formulário
$cNome = $_POST['cNome'];
$cData = $_POST['cData'];
$cEmail = $_POST['cEmail'];
$cFoto = $_FILES['cFoto']['tmp_name'];

if (!empty($cFoto)) {
    // Encriptar o nome da foto com md5
    $foto_enc = md5($_FILES['cFoto']['name']) . "." . pathinfo($_FILES['cFoto']['name'], PATHINFO_EXTENSION);
    //Mover arquivo para pasta de destino
    move_uploaded_file($cFoto, "images/" . $foto_enc);

    // Preparar a query SQL
    $stmt = $conn->prepare("INSERT INTO cliente (cNome, cData, cEmail, cFoto) VALUES (:cNome, :cData, :cEmail, :cFoto)");
    $stmt->bindParam(':cNome', $cNome);
    $stmt->bindParam(':cData', $cData);
    $stmt->bindParam(':cEmail', $cEmail);
    $stmt->bindParam(':cFoto', $foto_enc);

    // Executar a query
    if ($stmt->execute()) {
        header('location: lista.php');
    } else {
        echo "Erro ao salvar os dados.";
    }
} else {
    $stmt = $conn->prepare("INSERT INTO cliente (cNome, cData, cEmail) VALUES (:cNome, :cData, :cEmail)");
    $stmt->bindParam(':cNome', $cNome);
    $stmt->bindParam(':cData', $cData);
    $stmt->bindParam(':cEmail', $cEmail);

    // Executar a query
    if ($stmt->execute()) {
        header('location: lista.php');
    } else {
        echo "Erro ao salvar os dados.";
    }
}
