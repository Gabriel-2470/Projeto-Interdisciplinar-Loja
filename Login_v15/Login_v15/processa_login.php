<?php
    session_start();
    include 'conecta.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $consulta = "SELECT * FROM usuarios where email = '$email' AND senha = '$senha'";
    $resultado = $conexao->query($consulta);
    
    $registros = $resultado->num_rows;
    $resultado_usuario = mysqli_fetch_assoc($resultado);
    
    if ($registros == 1) {

        $_SESSION['id'] = $resultado_usuario['id'];
        $_SESSION['nome'] = $resultado_usuario['nome'];
        $_SESSION['email'] = $resultado_usuario['email'];
        $_SESSION['nivel'] = $resultado_usuario['nivel'];    
                
        header('Location: ../../Nf/index.php');
    }
    else{
        header('Location: index.html');
    }
?>