<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="../estilo.css">
        <title>
            Cadastro - Gênero
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
            <form action="genero.php" method="POST">
                <div id="container">
                    <legend id="titulo">Cadastro Genero</legend>
                    
                    <div>
                        <label for="nomeG">Nome:</label>
                        <input type="text" name="nomeG" id="nomeG" placeholder="insira o nome do genero" required>
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
                    $nome_genero = $_POST['nomeG'];

                    $result = pg_query($conexao, "INSERT INTO Genero(nome_genero)
                    VALUES ('$nome_genero')");

                    if($result){
                        echo "cadastrado com sucesso!! <br>";
                    }
                }
            ?>

            <a href="../consulta/cGenero.php">consultar generos</a>

            
        </div>

        

    </body>


</html>