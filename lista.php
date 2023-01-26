<?php
include "funcao.php";
$pagina = 1;

if (isset($_GET['pagina'])) {
    $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);
}
if (!$pagina) {
    $pagina = 1;
}

$limite = 3;
$inicio = ($pagina * $limite) - $limite;
$con = getConnection();
$registros = getCount();
$paginas = ceil($registros / $limite);
$clientes = lista($inicio, $limite);
?>

<!DOCTYPE html>
<html>

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
                    <h1>Cadastros</h1>

                    <table id="tLista" cellpadding="0" cellspacing="0" border="0">
                        <form action="excluirClientes.php" name="Del-cli" method="post">
                            <input class="btPadraoExcluir" type="submit" value="Excluir" name="DelCli" onclick='return pergunta();'>
                            <thead>
                                <tr>
                                    <th width="5%"><input type="checkbox" id="select_all" /></th>
                                    <th width="5%">ID</th>
                                    <th width="5%">Foto</th>
                                    <th class="tL">Nome</th>
                                    <th width="15%">Dt Nasc</th>
                                    <th width="25%">Email</th>
                                    <th width="7%">Dep</th>
                                    <th width="7%">St</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($clientes as $cliente) {
                                    $data = date("d/m/Y", strtotime($cliente['cData']));
                                    $foto = $cliente['cFoto'] != "" ? $cliente['cFoto'] : 'anonimo.jpg';

                                    echo "<tr>";
                                    echo "<td align='center'' style='border-left:0;'><input name='id[{$cliente['id']}]' type='checkbox' class='checkbox'/></td>";
                                    echo "<td align='center'>" . $cliente["id"] . "</td>";
                                    echo "<td align='center'><img src='images/$foto' width='20' height='20' /></td>";
                                    echo "<td><a class='linkUser' href='editar.php?id=" . $cliente['id'] . "'>" . $cliente["cNome"] . "</a></td>";
                                    echo "<td align='center'>" . $data . "</td>";
                                    echo "<td align='center'>" . $cliente["cEmail"] . "</td>";
                                    echo "<td align='center'><a href='dependentes.php?id=" . $cliente['id'] . "' class='btAdicionar'></a></td>";
                                    echo "<td align='center'><base  class='btVerde'></td>";
                                    echo "</tr>";
                                } ?>

                            </tbody>
                    </table>

                </div>

                <div id="paginacao">
                    <?php if ($pagina > 1) : ?>
                        <a href="?pagina=1">Primeira </a>
                        <a href="?pagina=<?= $pagina - 1 ?>" class="btSeta1"> </a>
                    <?php endif; ?>

                    <?php if ($paginas > 0) : ?>
                        <div id="pags"><?= $pagina ?> - <?= $paginas ?></div>
                    <?php endif; ?>

                    <?php if ($pagina < $paginas) : ?>
                        <a href="?pagina=<?= $pagina + 1 ?>" class="btSeta2"> </a>
                        <a href="?pagina=<?= $paginas ?>"> Ùltima</a>
                    <?php endif; ?>


                    <select id="pagination-select">
                        <option style="background-color: gray;"><?= $pagina ?></option>
                        <option>...</option>
                        <?php for ($i = 1; $i <= $paginas; $i++) : ?>
                            <option><?= $i ?></option>
                        <?php endfor; ?>
                    </select>


                </div>



            </div> <!-- FIM CONTEUDO DIR -->

        </div>

    </div>
    <script>
        document.getElementById("pagination-select").onchange = function() {
            var selectedPage = this.value;
            window.location.href = "?pagina=" + selectedPage; // redireciona para a página escolhida
        };
        var buttons = document.getElementsByTagName("base");

        for (var i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener("click", function() {
                if (this.classList.contains("btVerde")) {
                    this.classList.remove("btVerde");
                    this.classList.add("btCinza");
                } else {
                    this.classList.remove("btCinza");
                    this.classList.add("btVerde");
                }
            });
        }

        var selectAllCheckbox = document.getElementById("select_all");
        var checkboxCheckboxes = document.querySelectorAll(".checkbox");

        selectAllCheckbox.addEventListener("click", function() {
            for (var i = 0; i < checkboxCheckboxes.length; i++) {
                checkboxCheckboxes[i].checked = this.checked;
            }
        });

        for (var i = 0; i < checkboxCheckboxes.length; i++) {
            checkboxCheckboxes[i].addEventListener("click", function() {
                var allChecked = true;
                for (var j = 0; j < checkboxCheckboxes.length; j++) {
                    if (!checkboxCheckboxes[j].checked) {
                        allChecked = false;
                        break;
                    }
                }
                selectAllCheckbox.checked = allChecked;
            });
        }
    </script>

</body>

</html>