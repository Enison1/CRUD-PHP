<?php
include_once "funcao.php";
// Conexão com o banco de dados
$conn = getConnection();

// Receber dados do formulário
$id = $_POST['id'];
$cNome = $_POST['cNome'];
$cData = $_POST['cData'];
$cEmail = $_POST['cEmail'];
$cFoto = $_FILES['cFoto']['tmp_name'];

// Verifica se a cFoto foi atualizada
if (!empty($cFoto)) {
    // Encriptar o nome da cFoto com md5
    $foto_enc = md5($_FILES['cFoto']['name']) . "." . pathinfo($_FILES['cFoto']['name'], PATHINFO_EXTENSION);
    //Mover arquivo para pasta de destino
    move_uploaded_file($cFoto, "images/" . $foto_enc);

    // Preparar a query SQL
    $stmt = $conn->prepare("UPDATE cliente SET cNome = :cNome, cData = :cData, cEmail = :cEmail, cFoto = :cFoto WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':cNome', $cNome);
    $stmt->bindParam(':cData', $cData);
    $stmt->bindParam(':cEmail', $cEmail);
    $stmt->bindParam(':cFoto', $foto_enc);

    // Executar a query
    if ($stmt->execute()) {
        header('location:lista.php');
    } else {
        echo "Erro ao atualizar a Foto.";
    }
} else {
    // Preparar a query SQL
    $stmt = $conn->prepare("UPDATE cliente SET cNome = :cNome, cData = :cData, cEmail = :cEmail WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':cNome', $cNome);
    $stmt->bindParam(':cData', $cData);
    $stmt->bindParam(':cEmail', $cEmail);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $foto_atual = $result['cFoto'];
    header('location:lista.php');
}
