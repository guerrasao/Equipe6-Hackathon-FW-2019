<?php
    //Cabecalho usuario não logado
    //Pegando o caminho absoluto à esse arquivo.
    $path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019/cabecalho/';
    $cabecalho = $path . 'cabecalho.php';
    include_once($cabecalho);
?>

<section class="container p-3 col-md-3 mt-5 mb-5 md-100">
    <div class="cabecalho-box">
        <h3 class="mb-0">Cadastrar do Pedido</h3>
    </div>
    <form method="get" action="salvar_pedido.operador.php">
        <?php
            $sql = "SELECT * from usuario WHERE id_tipo_usuario = 2";
        ?>
        

        <select name="cliente">
        <select>
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
        </select>
        Tipo do Pedido:
        <input type="radio" name="tipo_pedido" value="entrega"> Entrega
        <input type="radio" name="tipo_pedido" value="devolucao"> Devolução
        Valor Total do Pedido: <input name="valor" type="number" required/>
        Nota Fiscal: <input name="nota_fiscal" type="text" required/>
        Data do Pedido: <input name="data" type="date" required/>
        Hora do Pedido: <input name="hora" type="time" required/>
        <br>
        <input type="submit" value="Cadastrar"/>
    </form>
</section>

<?php
    $rodape = $path . 'rodape.php';
    include_once ($rodape);
?>