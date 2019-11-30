<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/';
$destino = $path.'imagens_entrega/' . $_FILES['arquivo']['name'];
var_dump($path);
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
 
move_uploaded_file( $arquivo_tmp, $destino  );

?>