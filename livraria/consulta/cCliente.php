<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="../estilo.css">
        <title>
            Consulta - Autor
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

                <a href="../cadastro/cliente.php">Cadastrar novo Cliente</a>


                <br><br>

                <table id="tabela"> <!-- CLIENTES -->

                    <tr>
                        <th>CPF</th>
                        <th>NOME COMPLETO</th>
                        <th>TELEFONE</th>
                        <th>ENDEREÇO</th>
                        <th>OPERAÇÕES</th>
                    </tr>
                    
                    <?php
                        include_once('../conexao.php'); //conexao

                        
                        $consulta = "DELETE FROM Cliente WHERE nome_cliente=''; SELECT * FROM cliente ORDER BY nome_cliente";
                        $result = pg_query($conexao,$consulta);
                        $linha_check = pg_num_rows($result);

                        if($linha_check > 0){

                            while($linhas = pg_fetch_assoc($result)){
                                echo "<tr><td>" . $linhas['cpf_cliente'] . 
                                "</td><td>" .  $linhas['nome_cliente'] .' ' . $linhas['sobrenome_cliente'] .
                                "</td><td>" . $linhas['telefone_cliente'] . 
                                "</td><td>" . $linhas['endereco_cliente'] . "</td>";
                                echo '
                                <td>
                                <button> <a href="../modifica/mCliente.php?updateid='.$linhas['cpf_cliente'].'"> alterar </a></button>
                                <button> <a href="../deleta/dCliente.php?deleteid='.$linhas['cpf_cliente'].'"> deletar </a></button>
                                </td>';
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