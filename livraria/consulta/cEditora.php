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

                <a href="../cadastro/editora.php">Cadastrar nova Editora</a>

                <br><br>

                <table id="tabela"> <!-- EDITORA -->

                <tr>
                    <th>ID</th>
                    <th>NOME FANTASIA</th>
                    <th>OPERAÇÕES</th>                    
                </tr>

                <?php
                    include_once('../conexao.php'); //conexao

                    $consulta = "DELETE FROM Editora WHERE nome_editora='';  SELECT * FROM Editora ORDER BY nome_editora";
                    $result = pg_query($conexao,$consulta);
                    $linha_check = pg_num_rows($result);

                    if($linha_check > 0){

                        while($linhas = pg_fetch_assoc($result)){
                            echo "<tr><td>" . $linhas['cod_editora'] .
                            "</td><td>" . $linhas['nome_editora'] . "</td>";
                            echo '
                            <td>
                            <button> <a href="../modifica/mEditora.php?updateid='.$linhas['cod_editora'].'"> alterar </a></button>
                            <button> <a href="../deleta/dEditora.php?deleteid='.$linhas['cod_editora'].'"> deletar </a></button>
                            </td>';
                        }
                            
                    }else{
                        echo "sem resultados";
                    }

                ?>
            </div>
             
        </div>

        
    </body>


</html>