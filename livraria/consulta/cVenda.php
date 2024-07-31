<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="../estilo.css">
        <title>
            Consulta - Vendas
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
                <h1>Consulta</h1>

                <div>
                    <a href="cVenda.php">VENDAS</a>   |   <a href="cAutor.php">AUTORES</a>   |   <a href="cEditora.php">EDITORAS</a>   |   <a href="cCliente.php">CLIENTES</a>   |   <a href="cGenero.php">GÊNEROS</a>
                </div>

                <br><br>

                <table id="tabela"> <!-- GENERO -->

                    <tr>
                        <th>COD</th>
                        <th>CLIENTE</th>
                        <th>LIVRO</th>
                        <th>DATA</th>
                        <th>VALOR</th>
                        
                    </tr>

                    <?php
                        include_once('../conexao.php'); //conexao

                        $consulta = "SELECT cod_compra,nome_cliente,sobrenome_cliente,nome_livro,data_compra,preco_livro
                                     FROM compra
                                     INNER JOIN cliente
                                     ON compra.cpf_cliente = cliente.cpf_cliente
                                     INNER JOIN livro
                                     ON compra.cod_livro = livro.cod_livro";
                        $result = pg_query($conexao,$consulta);
                        $linha_check = pg_num_rows($result);

                        if($linha_check > 0){

                            while($linhas = pg_fetch_assoc($result)){
                                echo "<tr><td>" . $linhas['cod_compra']  .
                                "</td><td>" . $linhas['nome_cliente']  . " " . $linhas['sobrenome_cliente'] .
                                "</td><td>" . $linhas['nome_livro']  .
                                "</td><td>" . $linhas['data_compra']  .
                                "</td><td> R$" . $linhas['preco_livro'] . "</td></tr>";
                            }
                                
                        }else{
                            echo "sem resultados";
                        }

                    ?>
                </table>
                

                
            </div>
             
        </div>

        
    </body>


</html>