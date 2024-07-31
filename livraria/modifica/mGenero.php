<?php

    include_once('../conexao.php');//conexao

    if(isset($_GET['updateid'])){
        $id=$_GET['updateid'];

        $result1 = pg_query($conexao, "SELECT * FROM Genero WHERE cod_genero=$id");
        $linhas = pg_fetch_assoc($result1);

            $nome_L=$linhas['nome_genero'];

        if(isset($_POST['modifica'])){
            
            $nomeG_bd = $_POST['nomeG'];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){ }

            $sql = "UPDATE Genero SET nome_genero='$nomeG_bd' WHERE cod_genero=$id;";

            $result = pg_query($conexao, $sql);   
            if($result){
                header('location:../consulta/cGenero.php');
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
                    <legend id="titulo">Modificar Genero</legend>
                    
                    <div>
                        <label for="nomeG">Nome:</label>
                        <input type="text" name="nomeG" id="nomeG" value="<?= $nome_L ?>">
                    </div>
                    <br>
                    <div>
                        <input type="submit" name="modifica" value="Modificar">
                        <!-- botao -->
                    </div>
                </div>
            </form>

            
        </div>

    </body>


</html>
