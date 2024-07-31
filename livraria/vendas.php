<?php include_once('conexao.php'); //conexao ?>

<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="estilo.css">
        <title>
            Vendas
        </title>
    </head>

    <body>

        <!-- MENU -->
        <div id="cabecalho">
            <div>
                <h1 class="nome">Svolir</h1>
            </div>
            <div id="area-menu">
                <a href="index.html">Principal</a>
                <a href="acervo.php">Acervo</a>
                <a href="cadastro.html">Cadastro</a>
                <a href="consulta.html">Consulta</a>
                <a href="vendas.php">Vendas</a>
            </div>
        </div>

        <div id="area-principal">
            <form action="vendas.php" method="POST">
                <div id="container">
                    <legend id="titulo">Vendas</legend>
                    <div> <!-- LIVRO -->
                        <label>Livro:</label>
                        <select name="select_livro">;
                        <?php 

                            $consulta = "DELETE FROM Livro WHERE nome_livro=''; SELECT * FROM Livro ORDER BY nome_livro";
                            $result = pg_query($conexao,$consulta);
                            $linha_check = pg_num_rows($result);

                            echo "<option value='0'>selecione</option>";

                            if($linha_check > 0){
                                while($linhas = pg_fetch_assoc($result)){
                                    echo "<option value='" . $linhas['cod_livro'] . "'>" . $linhas['nome_livro'] . "</option>";
                                }
                                    
                            }
                        ?>                          
                        </select>
                    </div>

                    <div> <!-- CLIENTE -->
                        <label>Cliente:</label>
                        <select name="select_cliente">;
                        <?php 

                            $consulta = "DELETE FROM Cliente WHERE nome_cliente=''; SELECT * FROM Cliente ORDER BY nome_cliente";
                            $result = pg_query($conexao,$consulta);
                            $linha_check = pg_num_rows($result);

                            echo "<option value='0'>selecione</option>";

                            if($linha_check > 0){
                                while($linhas = pg_fetch_assoc($result)){
                                    echo "<option value='" . $linhas['cpf_cliente'] . "'>" . $linhas['nome_cliente'] . " " . $linhas['sobrenome_cliente'] . "</option>";
                                }
                                    
                            }
                        ?>                          
                        </select>
                    </div>

                    <div> <!-- DATA -->
                        <label for="date">Data:</label>
                        <input type="date" name="date" >
                    </div>

                    <div>
                        <input type="submit" name="submit" value="Cadastrar">
                        <!-- botao -->
                    </div>
                </div>
            </form>
           
            <?php

                if(isset($_POST['submit'])){

                    $cod_livro_bd=$_POST['select_livro']; 
                    $cpf_cliente_bd = $_POST['select_cliente']; 
                    $data_bd = $_POST['date']; 

                    $sql = "INSERT INTO Compra( cpf_cliente, cod_livro, data_compra)
                    VALUES('$cpf_cliente_bd', $cod_livro_bd, '$data_bd')";
    
                    $resultado=pg_query($conexao, $sql);
            
                    if($resultado){
                        $consulta= "SELECT * FROM Livro WHERE cod_livro=$cod_livro_bd";
                        $row=pg_fetch_assoc(pg_query($conexao, $consulta));
                
                        $qtd=$row['qtd_exemplar'];
                        $decrementa=$qtd-1;
                        $update="UPDATE Livro SET qtd_exemplar=$decrementa WHERE cod_livro=$cod_livro_bd;";

                        if(pg_query($conexao, $update));

                        echo "<br> venda realizada com sucesso!";
                    }
                }

                // UPDATE Genero 
                //    SET nome_genero='$nome_bd' 
                //    WHERE cod_genero=$id";

            ?>


        </div>


    </body>


</html>