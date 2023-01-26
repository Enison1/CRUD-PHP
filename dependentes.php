<?php
// Conexão com o banco de dados
include_once "funcao.php";
$conn = getConnection();

// Obter o ID do cliente a ser editado
$id = $_GET['id'];

// Consultar as informações do banco de dados
$cliente = getCliente($id);
$dependentes = getDependenteL($id);

$foto = $cliente['cFoto'] != "" ? $cliente['cFoto'] : 'anonimo.jpg';
$data = date("d/m/Y", strtotime($cliente['cData']));


?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset="UTF-8" />

    <link type="text/css" rel="stylesheet" href="css/principal.css" />
    <script src="/js/dep.js"></script>

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
                    <h1>Dependentes</h1>

                    <div id="infoDep">

                        <div id="fotoCadastro">
                            <?php echo "<img src='images/$foto' width='77' height='77'/>"; ?>
                        </div>

                        <table id="tListaCad" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td class="tituloTab">Nome</td>
                                <td><?php echo $cliente['cNome']; ?></td>
                            </tr>
                            <tr bgcolor="#cddeeb">
                                <td class="tituloTab">Data de Nascimento</td>
                                <td><?php echo $data; ?></td>
                            </tr>
                            <tr>
                                <td class="tituloTab">Email</td>
                                <td><?php echo $cliente['cEmail']; ?></td>
                            </tr>
                        </table>

                        <form id="frmAdicionaDep" method="post" action="save-dep.php">
                            <input type="hidden" name="cliente_id" value="<?php echo $id; ?>">

                            <div class="agrupa mB mR">
                                <label for="dNome">Nome</label><br />
                                <input type="text" name="dNome" id="dNome" onchange="validateName();" required />
                            </div>
                            <div class="agrupa">
                                <label for="dData">Data de Nascimento</label><br />
                                <input type="date" name="dData" id="dData" onblur="age();" required />
                            </div>

                            <button type="submit" class="btPadrao" value="Salvar">Salvar</button>

                        </form>

                        <table id="tLista" cellpadding="0" cellspacing="0" border="0">
                            <thead>
                                <tr>
                                    <th width="60%" class="tL">Nome do Dependente</th>
                                    <th width="33%">Data de Nascimento</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($dependentes as $dependente) {
                                    $data = date("d/m/Y", strtotime($dependente['dData']));
                                    echo "<tr>";
                                    echo "<td>" . $dependente["dNome"] . "</td>";
                                    echo "<td align='center'>" . $data . "</td>";
                                    echo "<td align='center'> <a href='excluirDependente.php?id={$dependente['id']}' onclick='return pergunta();' class='btRemover'></a></td>";
                                    echo "</tr>";
                                } ?>


                            <tbody>
                        </table>

                    </div>

                </div>

            </div> <!-- FIM CONTEUDO DIR -->

        </div>

    </div>

</body>

</html>