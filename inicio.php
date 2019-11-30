<?php

include_once "validacao.php";
$tipoUsuario = $_SESSION['nome_tipo_usuario'];
switch ($tipoUsuario) {
    case "motorista":
        header("Location:motorista/index.motorista.php");
        break;
    case "cliente":
        header("Location:aluno/index.cliente.php");
        break;
    case "operador":
        header("Location:operador/index.operador.php");
        break;
    case "gestor":
        header("Location:gestor/index.gestor.php");
        break;
    case "representante":
        header("Location:representante/index.representante.php");
        break;
    default:
        header("Location:login.php");
        break;
}
