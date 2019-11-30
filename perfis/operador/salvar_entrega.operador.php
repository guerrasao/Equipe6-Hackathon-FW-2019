<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/';
    include_once $path."BD/conexao.php";
    include_once $path."BD/funcoes_iniciais.php";
    $con1 = AbrirConexao();
    session_start();
    $motorista = $_GET['motorista'];
    $pedido = $_GET['pedido'];
    
    $query = mysqli_query($con1, "INSERT INTO entrega (id_pedido, id_motorista, data_entrega, hora_entrega, latitude, longitude, assinatura_cliente, assinatura_motorista, descricao_dano, data_saida, hora_saida) VALUES ($pedido, $motorista, null, null, null, null, null, null, null, null,null)");
    if($query == true){
        header('location:cadastro_entrega.operador.php?mensagem=pedido_cadastrado');
    }else{
        header('location:cadastro_entrega.operador.php?mensagem=erro');
    }
    
?>