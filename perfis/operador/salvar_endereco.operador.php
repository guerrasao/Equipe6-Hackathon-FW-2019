<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/';
    include_once $path."BD/conexao.php";
    include_once $path."BD/funcoes_iniciais.php";
    $con1 = AbrirConexao();

    $id_usuario = $_GET['id_usuario'];
    
    //$descricao_endereco = $_GET['descricao_endereco'];
    $cep = $_GET['cep'];
    $cidade = $_GET['cidade'];
    $estado = $_GET['estado'];
    $logradouro = $_GET['logradouro'];
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];

    $query = mysqli_query($con1, "INSERT INTO endereco (id_endereco, descricao_endereco, logradouro, latitude, longitude, cep, cidade, estado) VALUES (null, null, '$logradouro', '$latitude', '$longitude', '$cep', '$cidade', '$estado')");
    $ultimo_endereco = consultarUltimoCadastrado('endereco','id_endereco');
    if($ultimo_endereco != null){
        $id_endereco = mysqli_fetch_assoc($ultimo_endereco)['id_endereco'];
        $query1 = mysqli_query($con1, "UPDATE usuario SET id_endereco = '$id_endereco' WHERE id_usuario = '$id_usuario'");
    }
    if($query == true && $query1 == true){
        header('location:cadastro_endereco_cliente.operador.php?mensagem=usuario_cadastrado');
    }else{
        header('location:cadastro_endereco_cliente.operador.php?mensagem=erro');
    }

?>