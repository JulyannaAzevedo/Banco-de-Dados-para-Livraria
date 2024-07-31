<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="../estilo.css">
        <title>
            Cadatro - Editora
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
            <form action="editora.php" method="POST">
                <div id="container">
                    <legend id="titulo">Cadastro Editora</legend>
                    <div>
                        <label for="nomeE">Nome:</label>
                        <input type="text" name="nomeE" id="nomeE" placeholder="insira o nome da editora" required>
                    </div>
                    <br>
                    <div>
                        <input type="submit" name = "submit" value="Cadastrar">
                        <!-- botao -->
                    </div>
                </div>
            </form>

            <?php

                include_once('../conexao.php');

                if(isset($_POST['submit'])){
                    $nomeE_bd = $_POST['nomeE'];

                    $result = pg_query($conexao, "INSERT INTO Editora(nome_editora)
                    VALUES('$nomeE_bd')");

                    if($result){
                        echo "cadastrado com sucesso!! <br>";
                    }
                }
            ?>

            <a href="../consulta/cEditora.php">consultar editoras</a>

             
        </div>

        


    </body>


</html>