<!doctype html>
<html lang="pt-br">
  <head>
    <title>Exemplo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- CSS próprio -->
    <link rel="stylesheet" type="text/css" href="./css/estilo.css">
    <!-- Bibliotecas JavaScript -->
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <!--<script src="../js/popper.js"></script>-->
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Bibliotecas lou multi select -->
    <script src="./node_modules/multiselect/js/jquery.multi-select.js"></script>
    <link rel="stylesheet" href="./node_modules/multiselect/css/multi-select.css">
</head>
<body>
    <header>
        <nav id="menu" class="navbar navbar-expand-md cabecalho-box">
          <div class="container">
            <!--Logo -->
            <a href="#" class="navbar-brand logo-menu">
                <img src="img/logobakof.png" width="150px" height="auto">
            </a>
            <!-- Botão mostrar menu -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#links">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Itens do menu -->
            <div id="links" class="collapse navbar-collapse justify-content-end">
              <ul class="navbar-nav color-white">
                <li class="nav-item">
                  <a href="index.php" class="nav-link" data-scroll> Início </a>
                </li>
                
                <li class="nav-item">
                  <a href="login.php" class="nav-link"  data-scroll> Login </a>
                </li>
              </ul>
            </div>      
          </div>
        </nav>
    </header>