<?php
    session_start();
    //Cabecalho usuario não logado
    //Pegando o caminho absoluto à esse arquivo.
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/cabecalho/';
    $cabecalho = $path . 'cabecalho.php';
    include_once($cabecalho);

?>
<section class="container p-3 col-md-3 mt-5 mb-5 md-100">
    <div class="cabecalho-box">
        <h3 class="mb-0">Acesso Restrito</h3>
    </div>
    <form class="border p-4" action="realiza_login.php" method="post">
        <div class="form-group">
        <label for="usuario">Login</label>
        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Digite o usuário">
        </div>
        <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha">
        </div>
        <button type="submit" name="enviar" class="btn btn-primary">Entrar</button>
    </form>
</section>
<?php
    $rodape = $path . 'rodape.php';
    include_once ($rodape);
?>
