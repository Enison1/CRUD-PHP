<?php
// Conexão com o banco de dados
include_once "funcao.php";

$id = $_GET['id'];

try {
    $connection = getConnection();

    $dep = getDependente($id);
    $cliente_id = $dep['cliente_id'];

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT cliente_id FROM dependente WHERE id = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $dep = getDependente($id);
    $cliente_id = $dep['cliente_id'];
    excluirDependetes($id);

    $query = "DELETE FROM dependente WHERE id = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$connection = null;

header("location: dependentes.php?id=$cliente_id");
