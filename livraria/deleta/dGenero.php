<?php 
    include_once('../conexao.php'); //conexao

    if(isset($_GET['deleteid'])){

        $id=$_GET['deleteid'];

        $consulta = "DELETE FROM Genero 
                     WHERE cod_genero=$id";
        $result = pg_query($conexao,$consulta);
        
        if($result){
            //echo "deletadoooooooooooooo";
            header('location:../consulta/cGenero.php');
        }

        

    }

?>