<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="../estilo.css">
        <title>
            Cadastro - Autor
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
            <div>
                <h1>Cadastros</h1>

                <div>
                <a href="cliente.php">CLIENTE</a>   |   <a href="livro.php">LIVROS</a>   |   <a href="autor.php">AUTOR</a>   |   <a href="editora.php">EDITORA</a>   |   <a href="genero.php">GÊNERO</a>
                </div>  

            </div>
            <form action="autor.php" method="POST">
                <div id="container">
                    <legend id="titulo">Cadastro Autor</legend>
                    <div>
                        <label for="nomeA">Nome:</label>
                        <input type="text" name="nomeA" id="nomeA" placeholder="insira o nome do autor" required>
                    </div>
                    <div>
                        <label for="SnomeA">Sobrenome:</label>
                    <input type="text" name="SnomeA" id="SnomeA" placeholder="insira o sobrenome do autor" required>
                    </div>
                    <br>
                    <div>
                        <input type="submit" name="submit" value="Cadastrar">
                        <!-- botao -->
                    </div>
                </div>
            </form>

            <?php

                include_once('../conexao.php');

                if(isset($_POST['submit'])){
                    $nomeA_bd = $_POST['nomeA'];
                    $SnomeA_bd = $_POST['SnomeA'];


                    $result = pg_query($conexao, "INSERT INTO Autor(nome_autor, sobrenome_autor)
                    VALUES('$nomeA_bd','$SnomeA_bd')");

                    if($result){
                        echo "cadastrado com sucesso!! <br>";
                    }
                }

            ?>

            <a href="../consulta/cAutor.php">consultar autores</a>

             
        </div>

        
    </body>


</html>