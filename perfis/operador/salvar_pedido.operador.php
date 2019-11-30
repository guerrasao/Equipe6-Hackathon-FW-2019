<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/';
    include_once $path."BD/conexao.php";
    include_once $path."BD/funcoes_iniciais.php";
    $con1 = AbrirConexao();
    session_start();
    $tipo_usuario = $_GET['tipo_usuario'];
    if($tipo_usuario == 1){
        $tipo_pedido = $_GET['tipo_pedido'];
        $valor = $_GET['valor'];
        $nota_fiscal = $_GET['nota_fiscal'];
        $data = $_GET['data'];
        $hora = $_GET['hora'];
        //$id_endereco_inicial = 
        //$id_endereco_final = 
        //$id_cliente = 
        $id_operador = $_SESSION['id_usuario'];  
        $query = mysqli_query($con1, "INSERT INTO pedido (id_pedido, id_endereco_inicial, id_endereco_final, id_cliente, id_operador, tipo_do_pedido, valor_total_pedido, numero_nf, data_pedido,hora_pedido) VALUES (null, 1, 1, '$nome', '$email', '$senha', '$cpf', null, '$placa', '$telefone')");
        if($query == true){
            header('location:cadastro_pedido.operador.php?mensagem=pedido_cadastrado');
        }else{
            header('location:cadastro_pedido.operador.php?mensagem=erro');
        }
    }
?>