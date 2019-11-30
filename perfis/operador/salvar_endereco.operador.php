<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/';
    include_once $path."BD/conexao.php";
    include_once $path."BD/funcoes_iniciais.php";
    $con1 = AbrirConexao();

    $id_usuario = $_GET['id_usuario'];
    
    $cep = $_GET['cep'];
    $cidade = $_GET['cidade'];
    $estado = $_GET['estado'];
    $logradouro = $_GET['logradouro'];
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];

    $query = mysqli_query($con1, "INSERT INTO endereco (id_endereco, descricao_endereco, logradouro, latitude, longitude, cep, cidade, estado) VALUES (null, 1, 1, '$nome', '$email', '$senha', '$cpf', null, '$placa', '$telefone')");
    if($query == true){
        header('location:cadastro_endereco_cliente.operador.php?mensagem=usuario_cadastrado');
    }else{
        header('location:cadastro_endereco_cliente.operador.php?mensagem=erro');
    }

?>