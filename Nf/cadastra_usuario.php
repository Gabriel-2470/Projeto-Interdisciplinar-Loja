<?php

    include 'conecta.php';
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];


    $consulta = $conexao -> prepare("INSERT INTO usuarios (nome,email,senha) VALUES ('$nome','$email','$senha')");

    $consulta -> execute();

    header('Location: ../Login_v15/Login_v15/index.html');

?>