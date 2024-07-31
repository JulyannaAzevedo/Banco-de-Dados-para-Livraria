<?php include_once('../conexao.php'); //conexao ?>

<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="../estilo.css">
        <title>
            Cadastro - Livro
        </title>
    </head>

    <body>

        <!-- MENU -->
        <div id="cabecalho">
            <div>
                <h1 class="nome">Svolir</h1>
            </div>
            <div id="area-menu">
                <a href="../index.html">Principal</a>
                <a href="../acervo.php">Acervo</a>
                <a href="../cadastro.html">Cadastro</a>
                <a href="../consulta.html">Consulta</a>
                <a href="../vendas.php">Vendas</a>
            </div>
        </div>

        <div id="area-principal">
            <div> <!-- MENU CADASTRO-->
                <h1>Cadastros</h1>

                <div>
                <a href="cliente.php">CLIENTE</a>   |   <a href="livro.php">LIVROS</a>   |   <a href="autor.php">AUTOR</a>   |   <a href="editora.php">EDITORA</a>   |   <a href="genero.php">GÊNERO</a>
                </div>
            </div>

            <form action="livro.php" method="POST">
                <div id="container">
                    <legend id="titulo">Cadastre um Livro</legend>

                    <div><!-- NOME -->
                        <label for="nomeL">Nome:</label>
                        <input type="text" name="nomeL" placeholder="insira o nome do livro" required>
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
                        <input type="text" name="qtd"  placeholder="insira a quantidade de exemplares" required>
                    </div>

                    <div> <!-- PRECO -->
                        <label for="preco">Preço:</label>
                        <input type="text" name="preco"  placeholder="insira o preço" required>
                    </div>

                    <br>
                    <div>
                    <input type="submit" name="submit" value="Cadastrar">
                        <!-- botao -->
                    </div>
                </div>
            </form>

            <?php

                if(isset($_POST['submit'])){

                    $nome_bd=$_POST['nomeL']; 
                    $qtd_bd = $_POST['qtd']; 
                    $preco_bd = $_POST['preco']; 
                    $cod_autor_bd = $_POST['select_autor']; 
                    $cod_editora_bd = $_POST['select_editora']; 
                    $cod_genero_bd = $_POST['select_genero'];

                    $sql = "INSERT INTO Livro(cod_editora, cod_genero, cod_autor, nome_livro, qtd_exemplar, preco_livro)
                    VALUES($cod_editora_bd, $cod_genero_bd, $cod_autor_bd, '$nome_bd', $qtd_bd, $preco_bd)";
    
                    $resultado=pg_query($conexao, $sql);
            
                    if($resultado){
                        echo "<br> cadastrado!!!!";
                    }
                }

            ?>

            <br><br>

            <a href="../acervo.php">consultar acervo</a>
             
        </div>



    </body>


</html>