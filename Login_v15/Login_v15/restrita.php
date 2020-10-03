<?php
    session_start();
    if(
        (!isset($_SESSION['id'])==true)&&
        (!isset($_SESSION['nome'])==true)&&
        (!isset($_SESSION['email'])==true)&&
        (!isset($_SESSION['nivel'])==true)){
        
        header('Location: index.html');
    }
    echo "Pagina que nem a Anonymous entra sem acesso";
?>

<a href="../../Nf/logout.php">SAIR</a>