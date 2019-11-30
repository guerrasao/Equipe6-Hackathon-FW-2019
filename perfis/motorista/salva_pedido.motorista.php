<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/';


if(count($_FILES['arquivo']['name'])) {
    foreach ($_FILES['arquivo']['name'] as $key => $file) {
        $destino = $path.'imagens_entrega/' . $file;
        $arquivo_tmp = $_FILES['arquivo']['tmp_name'][$key];
        move_uploaded_file( $arquivo_tmp, $destino);
    }
}
//header('location:pedido.motorista.php');
/*$destino = $path.'imagens_entrega/' . $_FILES['arquivo']['name'];
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
 
move_uploaded_file( $arquivo_tmp, $destino  );



    header('location:pedido.motorista.php');*/
?>