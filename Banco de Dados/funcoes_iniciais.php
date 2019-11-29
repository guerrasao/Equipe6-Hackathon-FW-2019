<?php

include_once 'conexao.php';

function login($usuario, $senha)
{
    $con = abrirConexao();
    $result = mysqli_query($con, "SELECT * FROM usuario WHERE usuario='$usuario'");
    if (mysqli_num_rows($result) > 0) {
        $dados = mysqli_fetch_array($result);
        if ($dados["usuario"] === $usuario) {
            if ($dados["senha"] === $senha) {
                return 0; //deu certo;
            } else {
                return 2; //senha errada
            }
        } else {
            return 1; //usuario não existe
        }
    }
}


/**
 * function executaQuery recebe a conexão e o código sql, executa-o e retorna
 * a instância do resultado da query.
 * @param $con
 * @param $codigoSql
 * @return bool|mysqli_result
 */
function executaQuery($con, $codigoSql)
{
    return mysqli_query($con, $codigoSql);
}

/**
 * function listarColunasTabela tem como parametro o nome da tabela e
 * irá retornar uma string com os campos da tabela separados por vírgula
 * prontos para serem utilizados em comandos sql.
 * @param $tabela
 * @return mixed|string
 */
function listarColunasTabela($tabela)
{
    $con = abrirConexao();
    $sql = "SELECT * FROM " . $tabela . " LIMIT 1";
    $resp = executaQuery($con, $sql);
    $respArray = mysqli_fetch_fields($resp);
    $colunas = "";
    foreach ($respArray as $coluna) {
        $colunas = $colunas . $coluna->name . ",";
    }
    $colunas = substr_replace($colunas, "", -1);
    fecharConexao($con);
    return $colunas;
}

/**
 * function listarColunasTabelaSemId possui a mesma funcionalidade da
 * listarColunasTabela. Porém ignora o campo id.
 * @param $tabela
 * @return mixed|string
 */
function listarColunasTabelaSemId($tabela)
{
    $con = abrirConexao();
    $sql = "SELECT * FROM " . $tabela . " LIMIT 1";
    $resp = executaQuery($con, $sql);
    $respArray = mysqli_fetch_fields($resp);
    $colunas = "";
    $c = 0;
    foreach ($respArray as $coluna) {
        $colunas = $colunas . $coluna->name . ",";
        if ($c == 0) {
            $colunas = "";
        }
        $c++;
    }
    $colunas = substr_replace($colunas, "", -1);
    fecharConexao($con);
    return $colunas;
}

/**
 * function listarColunasTabelaView possui a mesma funcionalidade
 * da listarColunasTabela. Porém irá retornar String com o cabeçalho da tabela.
 * @param $tabela
 * @param $titulo
 * @return string
 */
function listarColunasTabelaView($tabela, $titulo)
{
    $con = abrirConexao();
    $sql = "SELECT * FROM " . $tabela . " LIMIT 1";
    $resp = executaQuery($con, $sql);
    $respArray = mysqli_fetch_fields($resp);
    $colunas = "<div class='container'>
                <h1>" . $titulo . "</h1>
                <table class='table table-bordered table-responsive-sm table-striped'>
                <thead class='text-uppercase thead-dark'><tr>";
    foreach ($respArray as $coluna) {
        $colunas = $colunas . "<th>" . $coluna->name . "</th>";
    }
    $colunas = $colunas . "</tr></thead><tbody>";
    fecharConexao($con);
    return $colunas;
}

/**
 * function listarColunasTabelaViewSQL possui a mesma funcionalidade da função
 * listarColunasTabelaView, porém recebe o sql ao invés do nome da tabela.
 * @param $sql
 * @param $titulo
 * @return string
 */
function listarColunasTabelaViewSQL($sql, $titulo)
{
    $con = abrirConexao();
    $resp = executaQuery($con, $sql);
    $respArray = mysqli_fetch_fields($resp);
    $colunas = "<div class='container'>
                <h1>" . $titulo . "</h1>
                <table class='table table-bordered table-responsive-sm table-striped'>
                <thead class='text-uppercase thead-dark'><tr>";
    foreach ($respArray as $coluna) {
        $colunas = $colunas . "<th>" . $coluna->name . "</th>";
    }
    $colunas = $colunas . "</tr></thead><tbody>";
    fecharConexao($con);
    return $colunas;
}

/**
 * function listarColunasTabelaView possui a mesma funcionalidade
 * da listarColunasTabela. Porém irá retornar o array que contem em seus objetos
 * a variavel name, que corresponde ao nome da coluna atual.
 * O acesso as informações requer o uso posterior de um foreach.
 * @param $tabela
 * @return array|bool
 */
function listarColunasTabelaArray($tabela)
{
    $con = abrirConexao();
    $sql = "SELECT * FROM " . $tabela . " LIMIT 1";
    $resp = executaQuery($con, $sql);
    return mysqli_fetch_fields($resp);
}

/**
 * function listarColunasTabelaArraySQL possui a mesma funcionalidade da função
 * listarColunasTabelaArray, porém recebe o código sql ao invés de apenas o
 * nome da tabela.
 * @param $sql
 * @return array|bool
 */
function listarColunasTabelaArraySQL($sql)
{
    $con = abrirConexao();
    $resp = executaQuery($con, $sql);
    return mysqli_fetch_fields($resp);
}
/**
 * function manipular irá retornar verdadeiro se a
 * manipulacao(inserir, alterar, remover)
 * ocorreu corretamente no banco ou false se houve algum erro.
 * @param $con
 * @param $codigoSql
 * @return bool
 */
function manipular($con, $codigoSql)
{
    executaQuery($con, $codigoSql);
    if (mysqli_affected_rows($con) >= 1) {
        fecharConexao($con);
        return true;
    }
    fecharConexao($con);
    return false;
}

/**
 * function vetorToString recebe um array e concatena em uma string com vírgula
 * entre valores e sem vírgula no final. Sendo que esta string é retornada
 * @param $vetor
 * @return mixed|string
 */
function vetorToString($vetor)
{
    $string = "";
    foreach ($vetor as $valor) {
        $string = $string . '\'' . $valor . '\'' . ',';
    }
    $string = substr_replace($string, "", -1);
    return $string;
}

/**
 * function inserir recebe o nome da tabela e uma string com os valores prontos
 * para concatenar na variavel $sql. Cria o sql da inserção.
 * Abre a conexão com o BD. Chama a função de manipulação.
 * E irá retornar true se houve sucesso senão false.
 * @param $tabela
 * @param $valores
 * @return bool
 */
function inserir($tabela, $valores)
{
    $sql = "INSERT INTO " . $tabela . " (" . listarColunasTabela($tabela) .
        ") VALUES (" . $valores . ")";
    $con = abrirConexao();
    return manipular($con, $sql);
}

/**
 * function inserirSemId, mesma funcionalidade da inserir. Porém esta deixa
 * sem valor o campo id para as tabelas que o campo id é auto-incremento.
 * @param $tabela
 * @param $valores
 * @return bool
 */
function inserirSemId($tabela, $valores)
{
    $sql = "INSERT INTO " . $tabela . " ("
        . listarColunasTabelaSemId($tabela) . ") VALUES (" . $valores . ")";
    $con = abrirConexao();
    return manipular($con, $sql);
}

/**
 * function consultarAll recebe o nome da tabela e realiza a consulta no BD.
 * Retorna null se não houver nenhum registro, senão o array mysqli_result
 * com os resultados.
 * @param $tabela
 * @return bool|mysqli_result|null |null
 */
function consultarAll($tabela)
{
    $sql = "SELECT * FROM " . $tabela;
    $con = abrirConexao();
    $resultado = executaQuery($con, $sql);
    fecharConexao($con);
    if (mysqli_num_rows($resultado) >= 1) {
        return $resultado;
    } else {
        return null;
    }
}

/**
 * function consultarAllWhere possui a mesma funcionalidade de consultarAll,
 * porém recebe o argumento where para adicionar a consulta.
 * @param $tabela
 * @param $where
 * @return bool|mysqli_result|null
 */
function consultarAllWhere($tabela, $where)
{
    $sql = "SELECT * FROM " . $tabela . " WHERE " . $where;
    $con = abrirConexao();
    $resultado = executaQuery($con, $sql);
    fecharConexao($con);
    if (mysqli_num_rows($resultado) >= 1) {
        return $resultado;
    } else {
        return null;
    }
}

/**
 * function consultarSQL recebe o código SQL para consulta como parâmetro e retorna
 * o objeto de retorno da execução, que posteriormente necessitara usar
 * mysqli_fetch... para utilização dos dados.
 * @param $sql
 * @return bool|mysqli_result|null
 */
function consultarSQL($sql)
{
    $con = abrirConexao();
    $resultado = executaQuery($con, $sql);
    fecharConexao($con);
    if (mysqli_num_rows($resultado) >= 1) {
        return $resultado;
    } else {
        return null;
    }
}

/**
 * function consultarUltimoCadastrado recebe a tabela e o campo por qual
 * deseja-se ordenar a consulta. Irá retornar no máximo 1 resultado.
 * @param $tabela
 * @param $campo
 * @return bool|mysqli_result|null
 */
function consultarUltimoCadastrado($tabela, $campo)
{
    $sql = "SELECT * FROM " . $tabela . " ORDER BY " . $campo . " DESC LIMIT 1";
    $con = abrirConexao();
    $resultado = executaQuery($con, $sql);
    fecharConexao($con);
    if (mysqli_num_rows($resultado) >= 1) {
        return $resultado;
    } else {
        return null;
    }
}

/**
 * function exibeTabela retorna uma String com o HTML com os dados da tabela.
 * @param $tabela
 * @param $titulo
 * @return string|null
 */
function exibeTabela($tabela, $titulo)
{
    $cabecalho = listarColunasTabelaView($tabela, $titulo);
    $colunas = listarColunasTabelaArray($tabela);
    $dadosTabela = consultarAll($tabela);
    $corpo = "";
    if ($dadosTabela != null) {
        while ($dadosTabelaAssoc = mysqli_fetch_assoc($dadosTabela)) {
            $corpo = $corpo . "<tr>";
            foreach ($colunas as $coluna) {
                $corpo = $corpo . "<td>" . $dadosTabelaAssoc[$coluna->name] . "</td>";
            }
            $corpo = $corpo . "</tr>";
        }
        $rodape = "</tbody></table></div>";
        return $cabecalho . $corpo . $rodape;
    } else {
        return null;
    }
}

/**
 * function exibeTabelaSQL possui a mesma funcionalidade de exibeTabela, porém
 * recebe o sql da consulta por parâmetro.
 * @param $sql
 * @param $titulo
 * @return null|string
 */
function exibeTabelaSQL($sql, $titulo)
{
    $cabecalho = listarColunasTabelaViewSQL($sql, $titulo);
    $colunas = listarColunasTabelaArraySQL($sql);
    $dadosTabela = consultarSQL($sql);
    $corpo = "";
    if ($dadosTabela != null) {
        while ($dadosTabelaAssoc = mysqli_fetch_assoc($dadosTabela)) {
            $corpo = $corpo . "<tr>";
            foreach ($colunas as $coluna) {
                $corpo = $corpo . "<td>" . $dadosTabelaAssoc[$coluna->name] . "</td>";
            }
            $corpo = $corpo . "</tr>";
        }
        $rodape = "</tbody></table></div>";
        return $cabecalho . $corpo . $rodape;
    } else {
        return null;
    }
}

/**
 * function exibeValorUnicoSQL recebe uma consulta sql que irá retornar um único
 * valor ou null se não retornar nenhum registro.
 * @param $sql
 * @return null
 */
function exibeValorUnicoSQL($sql)
{
    $dadosTabela = consultarSQL($sql);
    if ($dadosTabela != null) {
        $dadosTabelaArray = mysqli_fetch_array($dadosTabela);
        return $dadosTabelaArray[0];
    } else {
        return null;
    }
}
