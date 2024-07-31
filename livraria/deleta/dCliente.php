<?php 
    include_once('../conexao.php'); //conexao

    if(isset($_GET['deleteid'])){

        $id=$_GET['deleteid'];

        $consulta = "DELETE FROM Cliente 
                     WHERE cpf_cliente='$id'";
        $result = pg_query($conexao,$consulta);
        
        if($result){
            //echo "deletadoooooooooooooo";
            header('location:../consulta/cCliente.php');
        }

        

    }

?>