<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "projeto";

    $conexao = new MYSQLI("$host","$usuario","$senha","$banco");

    if ($conexao -> connect_error) { 
        echo "Erro de Conexão!";
    }
    else{
        echo "Conexão bem sucedida <br>";
    }
?>