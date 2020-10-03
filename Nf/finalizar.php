<?php
    include 'conecta.php';
    echo "<br><hr>";
    session_start();
    $nf = $_SESSION['nf'];
    $total = $_GET['total'];

    echo "Nota Fiscal: ".$nf."<br>";
    echo "Total: ".$total."<br>";
    
    $consulta = $conexao -> prepare (
        "UPDATE nota_fiscal SET valor_total ='$total' WHERE nf = '$nf'");
    
    $consulta -> execute();

    header("Location: logout.php");  
?>