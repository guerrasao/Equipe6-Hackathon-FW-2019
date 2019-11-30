<?php

$path_root = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019';

session_start();
if (isset($_SESSION['nome_tipo_usuario'])) {
    $tipoUsuario = $_SESSION['nome_tipo_usuario'];
} else {
    header("Location:".$path_root."/login.php");
}

function valida($tipoValidacao)
{
    if (!($_SESSION['nome_tipo_usuario'] == $tipoValidacao)) {
        header("Location:".$_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019'."/inicio.php");
    }
}

?>