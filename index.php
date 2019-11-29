<?php
    //Cabecalho usuario não logado
    //Pegando o caminho absoluto à esse arquivo.
    $path = $_SERVER['DOCUMENT_ROOT'] . '/modelo/cabecalho/';
    $cabecalho = $path . 'cabecalho.php';
    include_once($cabecalho);
?>

<section id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <!-- imagens -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/banner1.jpg" alt="Banner 1" class="d-block w-100">
        <div class="carousel-caption d-none d-md-block">

        </div>
      </div>
      <div class="carousel-item">
        <img src="img/banner2.jpg" alt="Banner 2" class="d-block w-100">
        <!-- exibe sempre, nos outros apenas quando md-->
        <div class="carousel-caption d-md-block">

        </div>
      </div>
      <div class="carousel-item">
        <img src="img/banner1.jpg" alt="Banner 3" class="d-block w-100">
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

<section>
    <div class="container">
    <div class="row jumbotron bg-white align-items-center">
        <div class="col-md-7 mr-5">
            <h1 class="text-center"> Item 1 <b>item 1</b>? </h1>
          <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos error doloremque at nihil dolor illo sint. Rerum consequatur, odit a dolore adipisci dignissimos eius voluptas sed illum eligendi perspiciatis quos.
          </p>
        </div>
        <div class="col-md-4">
            <img src="img/logotransparente.png" class="img-fluid rounded" >
        </div>
      </div>
    </div>
</section>

<section>
    <div class="container">
    <div class="row jumbotron bg-white align-items-center">
        <div class="col-md-7 mr-5">
            <h1 class="text-center"> item 2 </h1>
          <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum asperiores commodi repellendus perspiciatis. Animi consequuntur at labore voluptate possimus provident eaque, tempore odio sit accusantium, blanditiis rem tempora doloribus voluptas!
          </p>
        </div>
        <div class="col-md-4">
            <img src="img/desenvolvedores.jpg" class="img-fluid rounded" >
        </div>
      </div>
    </div>
</section>

<?php
    $rodape = $path . 'rodape.php';
    include_once ($rodape);
?>
