<?php
    session_start();
    $path = '/Equipe6-Hackathon-FW-2019';
    $nome = $_SESSION['nome'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Operador</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $path?>/node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $path?>/bibliotecas_manuais/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo $path?>/node_modules/admin-lte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="<?php echo $path?>/bibliotecas_manuais/fonte_google.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $path?>/inicio.php" class="brand-link">
      <img src="<?php echo $path?>/img/logopequena.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Box Logistic</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block"><?php echo $nome; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo $path;?>/inicio.php" class="nav-link">
            <i class="fas fa-home"></i>
              <p>
                Início
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $path;?>/perfis/operador/cadastro_cliente.operador.php" class="nav-link">
            <i class="fas fa-user-friends"></i>
              <p>
                Cadastro de Cliente
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $path;?>/perfis/operador/cadastro_motorista.operador.php" class="nav-link">
            <i class="fas fa-truck"></i>
              <p>
                Cadastro de Motorista
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $path;?>/perfis/operador/cadastro_entrega.operador.php" class="nav-link">
            <i class="fas fa-truck-loading"></i>
              <p>
                Cadastro de Entregas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $path;?>/perfis/operador/cadastro_pedido.operador.php" class="nav-link">
            <i class="fas fa-boxes"></i>
              <p>
                Cadastro de Pedidos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-flag-checkered"></i>
              <p>
                Relatório de Entregas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $path;?>/perfis/operador/cadastro_endereco_cliente.operador.php" class="nav-link">
            <i class="fas fa-map-marker-alt"></i>
              <p>
                Cadastro de Endereço
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $path;?>/sair.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Sair
              </p>
            </a>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
