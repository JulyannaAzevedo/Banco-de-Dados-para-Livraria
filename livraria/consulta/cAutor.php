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

                <a href="../cadastro/autor.php">Cadastrar novo Autor</a>

                <br><br>

                <table id="tabela"> <!-- AUTOR -->

                    <tr>
                        <th>ID</th>
                        <th>SOBRENOME</th>
                        <th>NOME</th>
                        <th>OPERAÇÕES</th>
                        
                    </tr>
                    
                    <?php
                        include_once('../conexao.php'); //conexao

                        $consulta = "DELETE FROM Autor WHERE nome_autor='';  SELECT * FROM Autor ORDER BY sobrenome_autor";
                        $result = pg_query($conexao,$consulta);
                        $linha_check = pg_num_rows($result);

                        if($linha_check > 0){

                            while($linhas = pg_fetch_assoc($result)){
                                echo "<tr><td>" . $linhas['cod_autor']  .
                                "</td><td>" . $linhas['sobrenome_autor']  .
                                "</td><td>" . $linhas['nome_autor'] . "</td>";
                                echo '
                                <td>
                                <button> <a href="../modifica/mAutor.php?updateid='.$linhas['cod_autor'].'"> alterar </a></button>
                                <button> <a href="../deleta/dAutor.php?deleteid='.$linhas['cod_autor'].'"> deletar </a></button>
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
