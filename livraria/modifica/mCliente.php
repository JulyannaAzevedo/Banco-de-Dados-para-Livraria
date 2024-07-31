<?php

    include_once('../conexao.php');//conexao

    if(isset($_GET['updateid'])){
        $id=$_GET['updateid'];

        $result1 = pg_query($conexao, "SELECT * FROM Cliente WHERE cpf_cliente='$id'");
        $linhas = pg_fetch_assoc($result1);

            //mostra antes
            $nome_L=$linhas['nome_cliente'];
            $sobrenome_L=$linhas['sobrenome_cliente'];
            $cpf_L=$linhas['cpf_cliente'];
            $telefone_L=$linhas['telefone_cliente'];
            $endereco_L=$linhas['endereco_cliente'];

        if(isset($_POST['modifica'])){
            
            //atualizacao
            $cpf_bd = $_POST['CPF'];
            $nome_bd = $_POST['nome'];
            $sobrenome_bd = $_POST['sobrenome'];
            $telefone_bd = $_POST['telefone'];
            $endereco_bd = $_POST['endereco'];

            $sql = "UPDATE Cliente SET cpf_cliente='$cpf_bd', nome_cliente='$nome_bd', sobrenome_cliente='$sobrenome_bd', telefone_cliente='$telefone_bd', endereco_cliente='$endereco_bd' 
                    WHERE cpf_cliente='$id';";

            $result = pg_query($conexao, $sql);   
            if($result){
                header('location:../consulta/cCliente.php');
            }else{
                echo "cliente associado a uma compra, não pode ser atualizado!";
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
            Modifica - Cliente
        </title>
    </head>

    <body>

    

        <div id="area-principal">
            
            <form method="POST">
                <div id="container">
                <legend id="titulo">Cadastro de Cliente</legend>
                    <div>
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" value="<?= $nome_L ?>">
                    </div>

                    <div>
                        <label for="sobnome">Sobrenome:</label>
                        <input type="text" name="sobrenome"  value="<?= $sobrenome_L ?>">
                    </div>
                    <div>
                        <label for="CPF">CPF:</label>                                
                        <input type="text" name="CPF"  value="<?= $cpf_L ?>">

                    </div>
                    <div>
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" value="<?= $telefone_L ?>">
                    </div>
                    <div>
                        <label for="endereco">Endereço:</label>
                        <input type="text" name="endereco"  value="<?= $endereco_L ?>">
                    </div>
                    <br>
                    <div>
                        <input type="submit" name = "modifica" value="Modificar">
                    </div>                  
                            
                    </div>
            </form>

            
        </div>

    </body>


</html>
