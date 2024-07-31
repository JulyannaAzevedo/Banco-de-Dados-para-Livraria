<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="estilo.css">
        <title>
            Página Principal
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

            <a href="cadastro/livro.php">Cadastrar novo Livro</a>

            <br><br>

            <table id="tabela"> <!-- LIVRO -->

            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>GÊNERO</th>
                <th>AUTOR</th>  
                <th>QUANTIDADE</th>
                <th>PREÇO</th>
                <th>OPERAÇÕES</th>                    
            </tr>

            <?php
                include_once('conexao.php'); //conexao

                $consulta = "DELETE FROM Livro WHERE nome_livro='';  SELECT * FROM Livro ORDER BY nome_livro";
                $result = pg_query($conexao,$consulta);
                $linha_check = pg_num_rows($result);

                if($linha_check > 0){

                    // Livro(cod_editora, cod_genero, cod_autor, nome_livro, qtd_exemplar, preco_livro)

                    while($linhas = pg_fetch_assoc($result)){
                        echo "<tr><td>" . $linhas['cod_livro'] .
                        "</td><td>" . $linhas['nome_livro'] . "</td>".
                        "</td><td>" . $linhas['cod_genero'] . "</td>".
                        "</td><td>" . $linhas['cod_autor'] . "</td>". 
                        "</td><td>" . $linhas['qtd_exemplar'] . "</td>". 
                        "</td><td> R$" . $linhas['preco_livro'] . "</td>";
                        echo '
                        <td>
                        <button> <a href="modifica/mLivro.php?updateid='.$linhas['cod_livro'].'"> alterar </a></button>
                        <button> <a href="deleta/dLivro.php?deleteid='.  $linhas['cod_livro'].'"> deletar </a></button>
                        </td>';
                    }
                        
                }else{
                    echo "sem resultados";
                }

            ?>
                    



        </div>


    </body>


</html>