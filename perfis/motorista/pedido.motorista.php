<?php
    //Cabecalho usuario não logado
    //Pegando o caminho absoluto à esse arquivo.
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/cabecalho/';
    $cabecalho = $path . 'cabecalho.php';
    include_once($cabecalho);

?>

<section class="container p-3 col-md-3 mt-5 mb-5 md-100">
    <div class="cabecalho-box">
        <h3 class="mb-0">Pedido</h3>
    </div>
    <form method="post" enctype="multipart/form-data" action="salva_pedido.motorista.php">
        Selecione uma imagem: <input name="arquivo[]" id="filesToUpload" type="file" multiple=""/>
        <br/>
        <input type="submit" value="Salvar" />
    </form>
    <form method="post" enctype="multipart/form-data" action="salva_pedido.motorista.php">
        <input name="assinatura" type="hidden" value="1"/>
        <br>
        Entrega Concluída? <input type="submit" value="Assinar"/>
    </form>
</section>

<?php
    $rodape = $path . 'rodape.php';
    include_once ($rodape);
?>
