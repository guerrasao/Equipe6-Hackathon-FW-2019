<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019';
$cabecalho = $path . '/cabecalho/cabecalho.operador.php';
include_once($cabecalho);
include_once $_SERVER['DOCUMENT_ROOT'] . "/Equipe6-Hackathon-FW-2019/BD/funcoes_iniciais.php";
?>
<link rel="stylesheet" href="<?php echo $path ?>/node_modules/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">


<div class="content-wrapper" style="min-height: 1203.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vincular Endereço ao CLiente</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    







    <div class="col-md-3">
            <div class="form-group">
                CEP: <input type="text" name="cep" id="cep"/> 
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
                Cidade: <input type="text" name="cidade" id="municipio" /> 
            </div>                        
          </div> 

          <div class="col-md-3">
            <div class="form-group">
                Estado: <input type="text" name="estado" id="estado" /> 
            </div>
          </div>  
          <div class="col-md-4">
            Logradouro: <input type="text" name="logradouro" id="logradouro" />                        
          </div> 
         
            
            

        


            
            <div class="col-md-12">
                <div class="form-group">
                    <label for="mapa">Clique com o Botão direito para adicinar um marcador no Mapa. Em seguida, utilizando o botão esquerdo do mouse, localize o endereço exato da Apreensão dos Objetos. </label>
                  <div id="mapa" style="width:100%; height:500px;"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" name="latitude" id="latitude">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" name="longitude"  id="longitude">
                </div>
            </div>

          <div class="box-footer">
            <button type="submit" data-toggle="tooltip" title="Salvar" class="btn btn-flat btn-sm btn-success pull-right">
              <i class="fa fa-save"></i> Avançar
            </button>
          </div>            
        
      












    
</div>

<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019';
$rodape = $path . '/cabecalho/rodape.usuario.php';
include_once($rodape);
?>


<script type="text/javascript" >
    
    $( document ).ready(function(){
        $('#cep').on('blur', function(){
            pesquisacep(this.value);
        });        
    });

    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('logradouro').value=("");
            //document.getElementById('bairro').value=("");
            document.getElementById('municipio').value=("");
            document.getElementById('estado').value=("");
            //document.getElementById('id_municpio').value=("");
            //document.getElementById('numero').value=("");
            //document.getElementById('complemento').value=("");


    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('logradouro').value=(conteudo.logradouro);
            //document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('municipio').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);
            //document.getElementById('id_municipio').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('logradouro').value="...";
                //document.getElementById('bairro').value="...";
                document.getElementById('municipio').value="...";
                document.getElementById('estado').value="...";
                //document.getElementById('id_municipio').value="...";


                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

                // Chama funcao JS altera centralização do mapa
                centralizaMapaPeloCep();
            } //end if.
            else {
                //cep é inválido.
                alert("Formato de CEP inválido.");
                
                limpa_formulário_cep();
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

<!--Mapa -->
<script src="https://maps.googleapis.com/maps/api/js" async defer></script>

<script type="text/javascript">
    var latInicial = -27.358580237063798;
    var lngInicial = -53.396408557891846;
    if(document.getElementById('cep').value !== ""){
        latInicial = document.getElementById('latitude').value;
        lngInicial = document.getElementById('longitude').value;
    }
    // obter latitude e longitude atraves do cep JS
    // função chamada em outra função JS = que executada quando onblur no campo cep
    function centralizaMapaPeloCep(){
        // usando xml request json
        var xmlhttp = new XMLHttpRequest();
        // obtem o cep do formulario
        var cepTemp = document.getElementById('cep').value;
        // monta a url da request
        var url = "https://maps.googleapis.com/maps/api/geocode/json?address="+cepTemp;

        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                var respArrayJson = JSON.parse(this.responseText);
                percorreArrayRespJson(respArrayJson);
            }
        };
        xmlhttp.open("GET", url, true);
        xmlhttp.send();

        function percorreArrayRespJson(arr) {
            if(arr["status"] === "OK"){
                // encontrou um resultado ou mais para o cep, usando o primeiro resultado
                var latitudeTempPesuisa = arr["results"][0]["geometry"]["location"]["lat"];
                var longitudeTempPesuisa = arr["results"][0]["geometry"]["location"]["lng"];
                document.getElementById('latitude').value = latitudeTempPesuisa;
                document.getElementById('longitude').value = longitudeTempPesuisa;
                latInicial = latitudeTempPesuisa;
                lngInicial = longitudeTempPesuisa;
                initialize();
            }else{
                if(arr["status"] === "ZERO_RESULTS"){
                    console.log("Erro, nenhum resultado retornado para o cep");
                }else{
                    // possiveis respostas de erros
                    // https://developers.google.com/maps/documentation/geocoding/intro#StatusCodes
                    console.log("Erro, Resposta do MAPs API: "+arr["status"]);
                }
            }
        }
    }

    // inicio da funcoes que incializam o mapa
    function initialize() {
      //  var latlng = new google.maps.LatLng(document.getElementById('longitude').value,document.getElementById('latitude').value);
      // pegar lat long do municipio  ou do cep
        var latlng = new google.maps.LatLng(latInicial, lngInicial);

        var myOptions = {
          zoom: 14,
          scrollwheel: false,
          center: latlng,
          mapTypeControl: true,
          mapTypeId: google.maps.MapTypeId.SATELLITE
        };
        var map = new google.maps.Map(document.getElementById("mapa"), myOptions);
        var marker;
        
        google.maps.event.addListener(map, 'rightclick', function(event) {
            var latLng = event.latLng;
            if(marker){
                marker.setPosition(latLng);
            }else{
                marker = new google.maps.Marker({
                position: latLng,
                map: map,
                draggable: true
                });
            }
            update_position(latLng);
            google.maps.event.addListener(marker, 'drag', function(event) {
            update_position(marker.getPosition());
            });
        });
    }

    function update_position(latLng){
        document.getElementById('longitude').value = latLng.lng();
        document.getElementById('latitude').value = latLng.lat();
    }     
    window.onload = function(){
        centralizaMapaPeloCep();
        initialize();
    }
</script>