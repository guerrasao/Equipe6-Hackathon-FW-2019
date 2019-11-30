<?php

include_once "validacao.php";
$tipoUsuario = $_SESSION['nome_tipo_usuario'];
var_dump($tipoUsuario);
switch ($tipoUsuario) {
    case "motorista":
        header("Location:perfis/motorista/index.motorista.php");
        break;
    case "cliente":
        header("Location:perfis/cliente/index.cliente.php");
        break;
    case "operador":
        header("Location:perfis/operador/index.operador.php");
        break;
    case "gestor":
        header("Location:perfis/gestor/index.gestor.php");
        break;
    case "representante":
        header("Location:perfis/representante/index.representante.php");
        break;
    default:
        header("Location:login.php");
        break;
}
