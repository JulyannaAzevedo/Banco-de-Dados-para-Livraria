<?php

    include_once('../conexao.php');//conexao

    if(isset($_GET['updateid'])){
        $id=$_GET['updateid'];

        $result1 = pg_query($conexao, "SELECT * FROM Livro WHERE cod_livro=$id");
        $linhas = pg_fetch_assoc($result1);

            $nome_L=$linhas['nome_livro'];
            $preco_L=$linhas['preco_livro'];
            $qtd_L=$linhas['qtd_exemplar'];

        if(isset($_POST['modifica'])){
            
            $nome_bd = $_POST['nomeL'];
            $preco_bd = $_POST['preco'];
            $qtd_bd = $_POST['qtd'];
            $autor_bd = $_POST['select_autor'];
            $editora_bd = $_POST['select_editora'];
            $genero_bd = $_POST['select_genero'];


            $sql = "UPDATE Livro SET nome_livro='$nome_bd', cod_autor='$autor_bd', cod_editora='$editora_bd', cod_genero='$genero_bd', preco_livro='$preco_bd', qtd_exemplar='$qtd_bd' 
                    WHERE cod_livro=$id;";

            $result = pg_query($conexao, $sql);   
            if($result){
                header('location:../acervo.php');
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
            Modifica - Livro
        </title>
    </head>

    <body>

        <div id="area-principal">
        <form method="POST">
                <div id="container">
                    <legend id="titulo">Modifique o Livro</legend>

                    <div><!-- NOME -->
                        <label for="nomeL">Nome:</label>
                        <input type="text" name="nomeL" value="<?= $nome_L ?>">
                    </div>

                    <div> <!-- AUTOR -->
                        <label>Autor:</label>
                        <select name="select_autor">;
                        <?php 

                            $consulta = "DELETE FROM Autor WHERE nome_autor=''; SELECT * FROM autor ORDER BY nome_autor";
                            $result = pg_query($conexao,$consulta);
                            $linha_check = pg_num_rows($result);

                            echo "<option value='0'>selecione</option>";

                            if($linha_check > 0){
                                while($linhas = pg_fetch_assoc($result)){
                                    echo "<option value='" . $linhas['cod_autor'] . "'>" . $linhas['nome_autor'] ." ".$linhas['sobrenome_autor']. "</option>";
                                }
                                    
                            }
                        ?>                          
                        </select>

                    </div>

                    <div> <!-- EDITORA -->
                        <label>Editora:</label>
                        <select name="select_editora">
                        <?php 

                            $consulta = "DELETE FROM Editora WHERE nome_editora=''; SELECT * FROM Editora ORDER BY nome_editora";
                            $result = pg_query($conexao,$consulta);
                            $linha_check = pg_num_rows($result);

                            echo "<option value=''>selecione</option>";

                            if($linha_check > 0){
                                while($linhas = pg_fetch_assoc($result)){
                                    echo "<option value='" . $linhas['cod_editora']."'>" . $linhas['nome_editora'] ."</option>";   
                                }
                            }
                        ?>                            
                        </select>
                    </div>

                    <div> <!-- GENERO -->
                        <label>Genero:</label>
                        <select name="select_genero">
                        <?php 

                            $consulta = "DELETE FROM Genero WHERE nome_genero=''; SELECT * FROM Genero ORDER BY nome_genero";
                            $result = pg_query($conexao,$consulta);
                            $linha_check = pg_num_rows($result);

                            echo "<option value=''>selecione</option>";

                            if($linha_check > 0){
                                while($linhas = pg_fetch_assoc($result)){
                                    echo "<option value='" . $linhas['cod_genero'] . "'>"  . $linhas['nome_genero'] . "</option>";      
                                }
                            } 
                        ?>                            
                        </select>
                    </div>

                    <div> <!-- QUANTIDADE -->
                        <label for="qtd">Quantidade:</label>
                        <input type="text" name="qtd"  value="<?= $qtd_L ?>">
                    </div>

                    <div> <!-- PRECO -->
                        <label for="preco">Preço:</label>
                        <input type="text" name="preco"  value="<?= $preco_L ?>">
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