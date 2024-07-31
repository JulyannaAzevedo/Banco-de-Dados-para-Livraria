<?php

    include_once('../conexao.php');//conexao

    if(isset($_GET['updateid'])){
        $id=$_GET['updateid'];

        $result1 = pg_query($conexao, "SELECT * FROM Editora WHERE cod_editora=$id");
        $linhas = pg_fetch_assoc($result1);

            $nome_L=$linhas['nome_editora'];

        if(isset($_POST['modifica'])){
            
            $nomeE_bd = $_POST['nomeE'];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){ }

            $sql = "UPDATE Editora SET nome_editora='$nomeE_bd' WHERE cod_editora=$id;";

            $result = pg_query($conexao, $sql);   
            if($result){
                header('location:../consulta/cEditora.php');
            }
        }
    }
?>

<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="../estilo.css">
        <title>
            Modifica - Gênero
        </title>
    </head>

    <body>

    

        <div id="area-principal">
            
        <form method="POST">
            <div id="container">
                <legend id="titulo">Modificar Editora</legend>
                <div>
                    <label for="nomeE">Nome:</label>
                    <input type="text" name="nomeE" id="nomeE" value="<?= $nome_L ?>">
                </div>
                <br>
                <div>
                    <input type="submit" name = "modifica" value="Modificar">
                    <!-- botao -->
                </div>
            </div>
        </form>

            
        </div>

    </body>


</html>
