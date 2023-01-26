<?php
// Conexão com o banco de dados
include_once "funcao.php";
$conn = getConnection();

// Receber dados do formulário
$dNome = $_POST['dNome'];
$dData = $_POST['dData'];
$cliente_id = $_POST['cliente_id'];


$stmt = $conn->prepare("INSERT INTO dependente (dNome, dData, cliente_id) VALUES (:dNome, :dData, :cliente_id)");
$stmt->bindParam(':dNome', $dNome);
$stmt->bindParam(':dData', $dData);
$stmt->bindParam(':cliente_id', $cliente_id);

// Executar a query
if ($stmt->execute()) {
    header("location: dependentes.php?id=$cliente_id");
} else {
    echo "Erro ao salvar os dados.";
}
