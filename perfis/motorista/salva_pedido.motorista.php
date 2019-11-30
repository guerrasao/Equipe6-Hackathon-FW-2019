<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/';

if(isset( $_FILES[ 'arquivo' ][ 'name' ])) {
    foreach ($_FILES['arquivo']['name'] as $key => $file) {
        if($_FILES[ 'arquivo' ][ 'error' ][$key] == 0){
            //$destino = $path.'imagens_entrega/' . $file;
            $arquivo_tmp = $_FILES['arquivo']['tmp_name'][$key];

            $nome = $_FILES[ 'arquivo' ][ 'name' ][$key];
            $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
            $extensao = strtolower ( $extensao );
            //if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            $novoNome = uniqid ( time () ) . '.' . $extensao;
            $destino = $path.'imagens_entrega/' . $novoNome;
            move_uploaded_file( $arquivo_tmp, $destino);
            //}
            
        }
        
    }
    header('location:pedido.motorista.php');
}
//header('location:pedido.motorista.php');
/*$destino = $path.'imagens_entrega/' . $_FILES['arquivo']['name'];
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
 
move_uploaded_file( $arquivo_tmp, $destino  );



    */
?>