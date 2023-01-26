<?php
function getConnection()
{
    try {
        return new PDO('mysql:host=localhost;dbname=exemplo', "root", "");
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

function getCount()
{
    return count(getConnection()->query("SELECT cNome FROM cliente")->fetchAll());
}

function lista($inicio, $limite)
{
    return getConnection()->query("SELECT * FROM cliente ORDER BY cNome LIMIT $inicio, $limite")->fetchAll();
}

function getCliente($id)
{
    return  getConnection()->query("SELECT * FROM cliente WHERE id = $id")->fetch();
}

function getDependenteL($id)
{
    return getConnection()->query("SELECT * FROM dependente WHERE cliente_id= $id")->fetchAll();
}

function getDependente($id)
{
    return  getConnection()->query("SELECT * FROM dependente WHERE id = $id")->fetch();
}
function excluirCliente($id)
{
    getConnection()->query("DELETE FROM cliente WHERE id=$id");
}

function excluirDependetes($id)
{
    getConnection()->query("DELETE FROM dependente WHERE cliente_id=$id");
}

