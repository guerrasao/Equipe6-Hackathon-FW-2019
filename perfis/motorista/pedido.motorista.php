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
    <form method="post" enctype="multipart/form-data">
        Selecione uma imagem: <input name="arquivo" type="file" />
        <br/>
        <input type="submit" value="Salvar" />
    </form>
</section>

<?php
    $rodape = $path . 'rodape.php';
    include_once ($rodape);
?>
