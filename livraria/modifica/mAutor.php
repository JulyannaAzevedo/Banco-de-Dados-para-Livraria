<?php

    include_once('../conexao.php');//conexao

    if(isset($_GET['updateid'])){
        $id=$_GET['updateid'];

        $result1 = pg_query($conexao, "SELECT * FROM Autor WHERE cod_autor=$id");
        $linhas = pg_fetch_assoc($result1);

            $nome_L=$linhas['nome_autor'];
            $sobrenome_L=$linhas['sobrenome_autor'];

        if(isset($_POST['modifica'])){
            
            $nomeA_bd = $_POST['nomeA'];
            $SnomeA_bd = $_POST['SnomeA'];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){ }

            $sql = "UPDATE Autor SET nome_autor='$nomeA_bd', sobrenome_autor='$SnomeA_bd' WHERE cod_autor=$id;";

            $result = pg_query($conexao, $sql);   
            if($result){
                header('location:../consulta/cAutor.php');
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
            Modifica - Autor
        </title>
    </head>

    <body>

        <div id="area-principal">
            <form method="POST">
                <div id="container">
                    <legend id="titulo">Modificar Autor</legend>
                    <div>
                        <label for="nomeA">Nome:</label>
                        <input type="text" name="nomeA" id="nomeA" placeholder="insira o nome do autor"  value="<?= $nome_L ?>">
                    </div>
                    <div>
                        <label for="SnomeA">Sobrenome:</label>
                        <input type="text" name="SnomeA" id="SnomeA" placeholder="insira o sobrenome do autor" value="<?= $sobrenome_L ?>">
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