<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/';
    include_once $path."BD/conexao.php";
    include_once $path."BD/funcoes_iniciais.php";
    $con1 = AbrirConexao();

    $tipo_usuario = $_GET['tipo_usuario'];
    
    if($tipo_usuario == 2){
        $nome = $_GET['nome'];
        $email = $_GET['email'];
        $cnpj = $_GET['cnpj'];
        $telefone = $_GET['telefone'];
        $senha = $_GET['senha'];

        $query = mysqli_query($con1, "INSERT INTO usuario (id_usuario, id_tipo_usuario, id_endereco, nome, email, senha, cpf, cnpj, placa_do_veiculo,
        telefone) VALUES (null, 2, 1, '$nome', '$email', '$senha', null, '$cnpj', null, '$telefone')");
        if($query == true){
            header('location:cadastro_cliente.representante.php?mensagem=usuario_cadastrado');
        }else{
            header('location:cadastro_cliente.representante.php?mensagem=erro');
        }
    }

?>