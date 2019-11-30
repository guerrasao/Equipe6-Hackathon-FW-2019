<?php
    //Cabecalho usuario não logado
    //Pegando o caminho absoluto à esse arquivo.
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/cabecalho/';
    $cabecalho = $path . 'cabecalho.php';
    include_once($cabecalho);

?>

<section class="container p-3 col-md-3 mt-5 mb-5 md-100">
    <div class="cabecalho-box">
        <h3 class="mb-0">Cadastrar Cliente</h3>
    </div>
    <form method="get" action="salvar_usuario.representante.php">
        <input type="hidden" name="tipo_usuario" value="2"/>
        Nome: <input name="nome" type="text" required/>
        E-Mail: <input name="email" type="text" required/>
        CNPJ: <input name="cnpj" type="text" required/>
        Telefone: <input name="telefone" type="text" required/>
        Senha: <input name="senha" type="text" required/>
        <br>
        <input type="submit" value="Cadastrar"/>
    </form>
</section>

<?php
    $rodape = $path . 'rodape.php';
    include_once ($rodape);
?>