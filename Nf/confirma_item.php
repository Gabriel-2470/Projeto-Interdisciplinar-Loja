<?php
    session_start();
    if(
        (!isset($_SESSION['id'])==true)&&
        (!isset($_SESSION['nome'])==true)&&
        (!isset($_SESSION['email'])==true)&&
        (!isset($_SESSION['nivel'])==true)){
        
        header('Location: ../Login_v15/Login_v15/index.html');
    }

    include 'conecta.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FINALIZAÇÃO</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars - v2.2.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <!--===============================================================================================-->    
    <link rel="icon" type="image/png" href="../Login_v15/Login_v15/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Login_v15/Login_v15/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Login_v15/Login_v15/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Login_v15/Login_v15/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Login_v15/Login_v15/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../Login_v15/Login_v15/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Login_v15/Login_v15/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Login_v15/Login_v15/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../Login_v15/Login_v15/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Login_v15/Login_v15/css/util.css">
    <link rel="stylesheet" type="text/css" href="../Login_v15/Login_v15/css/main.css">

    <style>
        body {
            position: relative !important;
            height: 100vh !important;
            margin-top: 0vh;
            display: flex;
            /*justify-content: center;*/
            align-items: center;
            flex-direction: column;
        }

        #hero {
            height: 100vh !important;
            margin-top: 0vh !important;
        }

        .row {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .table{
          width: 100%;
        }

        .tabela{
          margin-bottom: 20px;
          margin-top: 100px;
        }

        .login100-form-btn{
          margin-top: 25px;
        }


    </style>

<body>

      

    <header id="header" class="fixed-top">
    <div class="container-fluid d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><span>LOJA</span></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Voltar</a></li>
          <li class="drop-down"><a href="">Gerenciar</a>
            <ul>
              <li><a href="data_nf.php">Adicionar Nota Fiscal</a></li>
              <li><a href="ver_nf.php">Ver notas emitidas</a></li>
              <li><a href="ver_produtos.php">Ver Produtos</a></li>
              <li><a href="cadastra_produtoform.php">Cadastrar Produtos</a></li>
            </ul>
          </li>

          <li class="get-started"><a href="../Login_v15/Login_v15/logout.php">Sair</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header>

<h1 class="tabela">N° NF: <?php echo  $_SESSION['nf'];  ?></h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Produto</th>
      <th scope="col">Preço</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Subtotal</th>
    </tr>
  </thead>
  <tbody>

    <?php
      include 'conecta.php';
      $nf = $_SESSION['nf'];
      $consulta = "SELECT * FROM itens_nf WHERE num_nf = '$nf'";

      $total = 0;
        foreach ($conexao -> query($consulta) as $linha) {
          $total = $total + $linha['subtotal'];
          $cod_produto = $linha['cod_produto']; 
          $consulta2 = "SELECT * FROM produtos WHERE id = '$cod_produto'";
          $consulta2 = $conexao -> query($consulta2);
          $linha2 = $consulta2 -> fetch_assoc();
          $nome = $linha2['nome'];
          $preco = $linha2['preco'];
    ?>

          <tr>
            <th scope="row"><?php echo $linha['cod_produto']; ?></th>
            <td><?php echo $nome; ?></td>
            <td><?php echo $preco; ?></td>
            <td><?php echo $linha['qtde']; ?></td>
            <td><?php echo $linha['subtotal'];?></td>
          </tr>
    <?php } ?>
    <tr>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <th scope="row">TOTAL: R$  <?php echo $total; ?></th>

    </tr>
  </tbody>
</table>

 

    <h4>O QUE DESEJA FAZER?</h4>
    <a href="seleciona_ultima_nf.php"><button class="login100-form-btn">
      INSERIR OUTRO PRODUTO
    </button></a>
    <a href="finalizar.php?total=<?php echo $total; ?>"><button class="login100-form-btn">
      FINALIZAR NOTA FISCAL
    </button></a>
<!--===============================================================================================-->
    <script src="../Login_v15/Login_v15/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="../Login_v15/Login_v15/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="../Login_v15/Login_v15/vendor/bootstrap/js/popper.js"></script>
    <script src="../Login_v15/Login_v15/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="../Login_v15/Login_v15/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="../Login_v15/Login_v15/vendor/daterangepicker/moment.min.js"></script>
    <script src="../Login_v15/Login_v15/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="../Login_v15/Login_v15/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="../Login_v15/Login_v15/js/main.js"></script>



  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>
</html>