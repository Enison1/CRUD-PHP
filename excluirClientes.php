<?php
  include_once "funcao.php";

  $clientes_id = filter_input_array(INPUT_POST, FILTER_DEFAULT);


  if (!empty($clientes_id['DelCli'])) {
    if (isset($clientes_id['id'])) {
        foreach($clientes_id['id'] as $id => $cli){
            excluirCliente($id);
            excluirDependetes($id);
        }
        header("Location: lista.php");
    }
    else {
        echo "errou 1";
    }
  }else{
    echo "errou 2";
  }
 ?>