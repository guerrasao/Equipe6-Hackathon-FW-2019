<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/';
    include_once $path."BD/conexao.php";
    include_once $path."BD/funcoes_iniciais.php";
    $con1 = AbrirConexao();
    session_start();
    $tipo_usuario = $_POST['tipo_usuario'];
    
    $tipo_pedido = $_POST['tipo_pedido'];
    $valor = $_POST['valor'];
    $nota_fiscal = $_POST['nota_fiscal'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $tipo_pedido = $_POST['tipo_pedido'];
    $endereco = $_POST['endereco'];
    $cliente = $_POST['cliente'];
    if($tipo_pedido == 'entrega'){
        $id_endereco_inicial = $endereco;
        $id_endereco_final = $cliente;
    }else{
        $id_endereco_inicial = $cliente;
        $id_endereco_final = $endereco;
    }
    //$id_cliente = 
    $id_operador = $_SESSION['id_usuario'];  
    $query = mysqli_query($con1, "INSERT INTO pedido (id_pedido, id_endereco_inicial, id_endereco_final, id_cliente, id_operador, tipo_do_pedido, valor_total_pedido, numero_nf, data_pedido,hora_pedido) VALUES (null, $id_endereco_inicial, $id_endereco_final, $cliente, $id_operador, '$tipo_pedido', $valor, '$nota_fiscal', '$data', '$hora')");
    if($query == true){
        header('location:cadastro_pedido.operador.php?mensagem=pedido_cadastrado');
    }else{
        header('location:cadastro_pedido.operador.php?mensagem=erro');
    }
    
?>