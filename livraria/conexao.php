<?php
    
    $endereço = 'localhost';
    $banco = 'livraria';
    $usuario = 'postgres';
    $senha = '030100';


        //procurar erro da função pg_connect...
    try{
        //$conexao = new PDO("pgsql:host=$endereço;port=5432;dbname=$banco",$usuario,$senha);
        $conexao = pg_connect("host=$endereço port=5432 dbname=$banco user=$usuario password=$senha");
        //echo "Conectado ao Banco de Dados Postgres SQL";
    }catch(PDOException $e){
        echo "Falha ao tentar conectar ao Banco de Dados...";
        die($e->getMessage());
    }

?>



