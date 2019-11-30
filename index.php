<?php
    //Cabecalho usuario não logado
    //Pegando o caminho absoluto à esse arquivo.
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/cabecalho/';
    $cabecalho = $path . 'cabecalho.php';
    include_once($cabecalho);
?>


<section class="container center">
    <div class=" jumbotron bg-white align-items-center fontes-padrao">
        <h1 class="text-center ">Box Logic Soluções em Logistica</h1>
         <h1 class="text-center "> <b>Bem Vindo!</b></h1>
         <h2 class="text-center ">Uma ferramenta para integrar fabrica, motoristas e clientes. </h2>
     </div>
</section>

<section id="carouselExampleFade" class="carousel slide carousel-fade container" data-ride="carousel">
    <!-- imagens -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/banner2.jpg" alt="Banner 1" class="d-block w-100">
        <div class="carousel-caption d-none d-md-block">

        </div>
      </div>
      <div class="carousel-item">
        <img src="img/banner1.jpg" alt="Banner 2" class="d-block w-100">
        <!-- exibe sempre, nos outros apenas quando md-->
        <div class="carousel-caption d-md-block">

        </div>
      </div>
      <div class="carousel-item">
        <img src="img/banner3.jpg" alt="Banner 3" class="d-block w-100">
        <div class="carousel-caption d-none d-md-block">

        </div>
      </div>
    </div>  
    <!-- setas de next e prev -->
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> 
</section>

<?php
    $rodape = $path . 'rodape.php';
    include_once ($rodape);
?>
