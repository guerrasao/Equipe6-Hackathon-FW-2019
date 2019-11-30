<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019';
$cabecalho = $path . '/cabecalho/cabecalho.motorista.php';
include_once($cabecalho);
include_once($_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/perfis/motorista/envia_localizacao.motorista.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Seja Bem Vindo</h1>
        </div>
        <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div> -->
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Sobre suas permissões</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button> -->
        </div>
      </div>
      <div class="card-body">
        <p>Tem acesso às rotas, descrição da carga, interface de recebimento com foto do produto, rápido contato com o operador, Principal: Relatório da viagem digitalizado.(rever essa descrição)</p>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <p>Dúvidas entrar em contato com o Operador</p>
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<p id="demo">Clique no botão para receber sua localização em Latitude e Longitude:</p>
<button onclick="getLocation()">Clique Aqui</button>

<script>
  var x=document.getElementById("demo");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{x.innerHTML="O seu navegador não suporta Geolocalização.";}
  }
function showPosition(position)
  {
  x.innerHTML="Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;  
  }

  var sucesso = false;
  var latitude = null;
  var longitude = null;
  var id_motorista = <?php echo $_SESSION['id_usuario']; ?>;

  function verifica_se_cadastrado() {
    if (sucesso == true) {
      clearInterval(intervalo);
    }
  }

  var intervalo = window.setInterval(envia_localizacao, 1000);

  function envia_localizacao() {
    if (sucesso == false) {
      if (navigator.geolocation) {
        var positions;
        navigator.geolocation.getCurrentPosition(positions);
        alert(positions.coords);
        var latitude = positions.coords.latitude;
        var longitude = positions.coords.longitude;
        alert(latitude);
        alert(longitude);
        var resposta = false;
        resposta = false;
        if(resposta == true){
          sucesso = true;
          clearInterval(intervalo);
        }
      }
    }else{
      clearInterval(intervalo);
    }
  }
</script>

<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019';
$rodape = $path . '/cabecalho/rodape.usuario.php';
include_once($rodape);
?>