<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/';
include_once $path."BD/conexao.php";
include_once $path."BD/funcoes_iniciais.php";
$con1 = AbrirConexao();
$pedido = $_POST['id_pedido'];
if($_FILES[ 'arquivo' ][ 'name' ][0] != '') {
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

            
            $query = mysqli_query($con1, "INSERT INTO imagens (id_imagem, nome_arquivo, id_pedido, tipo_imagem) VALUES (null, '$novoNome', $pedido, null)");
            move_uploaded_file( $arquivo_tmp, $destino);
            //}
            
        }
        
    }
    header('location:pedido.motorista.php?mensagem=imagens_salvas&id_pedido='.$pedido);
}else{
    header('location:pedido.motorista.php?erro=n_selecionou_arquivos&id_pedido='.$pedido);
}
//header('location:pedido.motorista.php');
/*$destino = $path.'imagens_entrega/' . $_FILES['arquivo']['name'];
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
 
move_uploaded_file( $arquivo_tmp, $destino  );



    */
?>