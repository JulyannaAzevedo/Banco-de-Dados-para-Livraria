<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="../estilo.css">
        <title>
            Cadrastro - Cliente
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

                <form action="cliente.php" method="POST">
                    <div id="container">
                        <legend id="titulo">Cadastro de Cliente</legend>
                            <div>
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" id="nome" placeholder="nome" required>
                            </div>

                            <div>
                                <label for="sobnome">Sobrenome:</label>
                                <input type="text" name="sobrenome" id="sobnome" placeholder="sobrenomenome" required>
                            </div>
                            <div>
                                <label for="CPF">CPF:</label>                                
                                <input type="text" name="CPF" id="CPF" placeholder="CPF" required>

                            </div>
                            <div>
                                <label for="telefone">Telefone:</label>
                                <input type="text" name="telefone" id="telefone" placeholder="telefone" required>
                            </div>
                            <div>
                                <label for="endereco">Endereço:</label>
                                <input type="text" name="endereco" id="endereco" placeholder="endereço" required>
                            </div>
                            <br>
                            <div>
                                <input type="submit" name = "submit" value="Cadastrar">
                            </div>                  
                        
                    </div>
                        
                </form>

                <?php

                    include_once('../conexao.php');

                    if(isset($_POST['submit'])){
                        $cpf_bd = $_POST['CPF'];
                        $nome_bd = $_POST['nome'];
                        $sobrenome_bd = $_POST['sobrenome'];
                        $telefone_bd = $_POST['telefone'];
                        $endereco_bd = $_POST['endereco'];
                    
                    
                        $result = pg_query($conexao, "INSERT INTO Cliente(cpf_cliente, nome_cliente, sobrenome_cliente, telefone_cliente, endereco_cliente)
                        VALUES('$cpf_bd','$nome_bd','$sobrenome_bd','$telefone_bd','$endereco_bd')");
                    
                        if($result){
                            echo "cadastrado com sucesso!! <br>";
                        }
                    }

                ?>

                <a href="../consulta/cCliente.php">consultar clientes</a>

        </div>


    </body>


</html>