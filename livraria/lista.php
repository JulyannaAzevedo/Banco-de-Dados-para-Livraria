<?php

    include_once('conexao.php'); //conexao

    if(isset($_POST['submit'])){
        echo "recebe nome: " . $_POST['nomeL'];
        echo "<br>recebe valor autor: " . $_POST[''];
        echo "<br>recebe valor editora: " . $_POST['editora_select'];

        $nomeL_bd = $_POST['nomeL'];
        $cod_autor_bd = $_POST['select_autor'];
        $cod_editora_bd = $_POST['editora_select'];



        $sql = "INSERT INTO Livro(cod_editora, cod_genero, cod_autor, nome_livro, qtd_exemplar, preco_livro)
                    VALUES($cod_editora_bd, 12, $cod_autor_bd, '$nomeL_bd', 12, 12.5)";

        $resultado=pg_query($conexao, $sql);

        if($resultado){
            echo "<br> cadastrado!!!!";
        }


    }

    //teste include
    // include("funcoes.php");
    // echo "<br> resultado = " . soma(5,3) . "<br>";

?>

<!DOCTYPE html>

<html>
    <form action="lista.php" method="POST">
        <div> <!-- NOME-ok --->
             <label for="nomeL">Nome:</label>
             <input type="text" name="nomeL" placeholder="insira o nome do livro">
        </div>

        <div> <!-- AUTOR-ok --->
            <br>
            <label>Autor:</label>
            <select name="select_autor">;
                <?php 
                    $consulta = "SELECT * FROM autor ORDER BY nome_autor";
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
                    <br>
                                
        </div>

        <div> <!-- EDITORA -->
               <br>
               <label>Editora:</label>
               <select name="select_editora">

                    <?php
                        $consulta = "SELECT * FROM editora ORDER BY nome_editora";
                        $result = pg_query($conexao, $consulta);
                        $linha_check=pg_num_rows($result);
                        
                        echo "<option value='0'>selecione</option>";

                        if($linha_check>0){
                            while($linhas=pg_fetch_assoc($result)){
                                echo "<option value='".$linhas['cod_editora']."'>". $linhas['nome_editora'] . "</option>";
                            }
                        }
                        
                    ?>
                
                </select>
        </div>


        <div> <!-- botao -->
                <input type="submit" name="submit" value="Cadastrar">
        </div>

    </form>
</html>