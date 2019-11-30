<?php

function iniciaSessao($consulta,  $con)
{
    if ($consulta != null) {
        $resultado = mysqli_fetch_assoc($consulta);
        $_SESSION['id_usuario'] = $resultado['id_usuario'];
        $_SESSION['nome'] = $resultado['nome'];
        $_SESSION['nome_tipo_usuario'] = $resultado['nome_tipo_usuario'];
        fecharConexao($con);
    }
}

function abreIndex()
{
    header("Location:inicio.php");
}

if (isset($_POST['enviar'])) {
    include_once "conexao.php";
    $con1 = AbrirConexao();
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $sql = "select u.id_usuario, u.nome, tu.nome_tipo_usuario from usuario as u, tipo_usuario as tu where u.id_tipo_usuario = tu.id_tipo_usuario and id_usuario='$usuario' AND senha='$senha'";
    $query = mysqli_query($con1, $sql1);
    if (mysqli_num_rows($query) == 1) {
        iniciaSessao($query, $con);
    }
}

?>