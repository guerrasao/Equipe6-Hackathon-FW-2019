<?php
//Cabecalho usuario não logado
//Pegando o caminho absoluto à esse arquivo.
$path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019';
$cabecalho = $path . '/cabecalho/cabecalho.motorista.php';
include_once($cabecalho);

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content pt-3">
        <div class="container-fluid">
            <?php
            if (isset($_GET['mensagem'])) {
                $mensagem = $_GET['mensagem'];
                if ($mensagem == 'erro') {
                    echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Erro!</h5>
            Ocorreu um erro no cadastro do usuário.
          </div>';
                } else {
                    echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
            Usuário cadastrado com sucesso.</div>';
                }
            }
            ?>
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Pedido</h3>
                </div> <!-- /.card-body -->
                <form method="post" enctype="multipart/form-data" action="salva_pedido.motorista.php">
                    <div class="card-body">
                        <input type="hidden" name="tipo_usuario" value="2" />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputFile">Selecione uma imagem:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="arquivo[]" id="filesToUpload" multiple="" />
                                            <label class="custom-file-label" for="exampleInputFile">Escolher Arquivo</label>
                                        </div>
                                        <div class="input-group-append">
                                            <input type="submit" class="input-group-text" value="Salvar" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.card-body -->
                </form>
                <div class="card-footer">
                <form method="post" enctype="multipart/form-data" action="assina.motorista.php">
                    <input name="assinatura" type="hidden" value="1" />
                    <div class="form-group"><br>
                    Entrega Concluída? <input type="submit" class="btn btn-primary" value="Assinar" />
                    </div>
                </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019';
$rodape = $path . '/cabecalho/rodape.usuario.php';
include_once($rodape);
?>

<section class="container p-3 col-md-3 mt-5 mb-5 md-100">
    <div class="cabecalho-box">
        <h3 class="mb-0">Pedido</h3>
    </div>
    <form method="post" enctype="multipart/form-data" action="salva_pedido.motorista.php">
        Selecione uma imagem: <input name="arquivo[]" id="filesToUpload" type="file" multiple="" />
        <br />
        <input type="submit" value="Salvar" />
    </form>
    <form method="post" enctype="multipart/form-data" action="assina.motorista.php">
        <input name="assinatura" type="hidden" value="1" />
        <br>
        Entrega Concluída? <input type="submit" value="Assinar" />
    </form>
</section>

<?php
$rodape = $path . 'rodape.php';
include_once($rodape);
?>