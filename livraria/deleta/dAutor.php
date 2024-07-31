<?php 
    include_once('../conexao.php'); //conexao

    if(isset($_GET['deleteid'])){

        $id=$_GET['deleteid'];

        $consulta = "DELETE FROM Autor WHERE cod_autor=$id";
        $result = pg_query($conexao,$consulta);
        
        if($result){
            header('location:../consulta/cAutor.php');
        }
    }
?>


