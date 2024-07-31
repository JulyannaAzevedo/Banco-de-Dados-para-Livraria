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

                <a href="../cadastro/genero.php">Cadastrar novo Gênero</a>

                <br><br>

                <table id="tabela"> <!-- GENERO -->

                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>OPERAÇÕES</th>
                        
                    </tr>
                    
                    <?php
                        include_once('../conexao.php'); //conexao

                        $consulta = "DELETE FROM Genero WHERE nome_genero='';  SELECT * FROM Genero ORDER BY nome_genero";
                        $result = pg_query($conexao,$consulta);
                        $linha_check = pg_num_rows($result);

                        if($linha_check > 0){

                            while($linhas = pg_fetch_assoc($result)){
                                echo "<tr><td>" . $linhas['cod_genero']  .
                                "</td><td>" . $linhas['nome_genero'] . "</td>";
                                echo '
                                <td>
                                <button> <a href="../modifica/mGenero.php?updateid='.$linhas['cod_genero'].'"> alterar </a></button>
                                <button> <a href="../deleta/dGenero.php?deleteid='.$linhas['cod_genero'].'"> deletar </a></button>
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