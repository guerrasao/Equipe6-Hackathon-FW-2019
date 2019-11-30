<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019';
    $funcoes_iniciais = $path . '/BD/funcoes_iniciais.php';
    $funcoes_bd = $path . '/BD/conexao.php';
    include_once($funcoes_bd);
    include_once($funcoes_iniciais);

    function envia_localizacao($latitude, $longitude){
        $id_motorista = $_SESSION['id_usuario'];
        $retorno = false;
        if($id_motorista != null && $latitude != null && $longitude != null){
            $sql = 'select * from ultima_localizacao where id_motorista = '.$id_motorista;
            $localizacoes_motorista = consultarSQL($sql);
            $c_localizacoes = 0;
            if($localizacoes_motorista != null){
                $c_localizacoes = mysqli_num_rows($localizacoes_motorista);
            }
            if($c_localizacoes != 0){
                $con = abrirConexao();
                $sql_remove = 'delete from ultima_localizacao where id_motorista = '.$id_motorista;
                $resultado_remocao = manipular($con,$sql_remove);
            }
            // inserir ultima latitude e longitude capturada
            $resulta_insercao = inserir($id_motorista, $latitude, $longitude);
            if($resulta_insercao == true){
                $retorno = true;
            }
        }
        return $retorno;
    }
?>