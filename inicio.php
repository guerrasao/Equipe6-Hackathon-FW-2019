<?php
    //Cabecalho usuario logado
    //Pegando o caminho absoluto à esse arquivo.
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/cabecalho/';
    $cabecalho_logado = $path . 'cabecalho_usuario_logado.php';
    include_once($cabecalho_logado);
?>



<?php
    $rodape = $path . 'rodape.php';
    include_once ($rodape);
?>

