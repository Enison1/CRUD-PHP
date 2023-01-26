<?php
// Conexão com o banco de dados
include_once "funcao.php";
$conn = getConnection();

// Obter o ID do cliente a ser editado
$id = $_GET['id'];

// Consultar as informações do cliente no banco de dados
$cliente = getCliente($id);
$foto = $cliente['cFoto'] != "" ? $cliente['cFoto'] : 'anonimo.jpg';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset="UTF-8" />

    <link type="text/css" rel="stylesheet" href="css/principal.css" />
    <script src="/js/js.js"></script>

    <title>Cadastro de Pessoas</title>
</head>

<body>

    <div id="conteudoGeral">

        <div id="topoGeral">
            <div id="logoTopo" onclick="location.href='index.php'" style="cursor:pointer;"></div>
            <div id="dirTopo"></div>
        </div>

        <div id="baixoGeral">

            <div id="menuEsq">
                <div id="titMenu">Menu de Opções</div>
                <a href="index.php">Início</a>
                <a href="lista.php">Listar Cadastros</a>
                <a href="form.php">Incluir Novo</a>
            </div>

            <div id="conteudoDir">

                <div id="listaPessoas">

                    <h1>Editando um Cadastro</h1>

                    <form id="formCadastrar" method="post" enctype="multipart/form-data" action="save-edit.php">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <label for="cNome">Nome</label><br />
                        <input type="text" id="cNome" name="cNome" onchange="validateName();" value="<?php echo $cliente['cNome']; ?>" /><br />


                        <label for="cData">Data de Nascimento</label><br />
                        <input type="date" id="cData" name="cData" onblur="age();" value="<?php echo $cliente['cData']; ?>" /><br />

                        <label for="cEmail">E-Mail</label><br />
                        <input type="email" id="cEmail" name="cEmail" onchange="validateEmail();" value="<?php echo $cliente['cEmail']; ?>" /><br />

                        <label for="cFoto">Foto (somente .jpg - máximo de 100Kb)</label><br />
                        <input id="cFoto" name="cFoto" onchange="validateSize()" type="file" value="<?php echo $cliente['cFoto']; ?>" accept="image/jpeg" /><br />
                        
                        <button type="submit" class="btPadrao" value="Salvar">Salvar</button>
                    </form>


                </div>

            </div> <!-- FIM CONTEUDO DIR -->

        </div>

    </div>

</body>

</html>