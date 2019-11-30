<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019';
$cabecalho = $path . '/cabecalho/cabecalho.operador.php';
include_once($cabecalho);
include_once $_SERVER['DOCUMENT_ROOT'] . "/Equipe6-Hackathon-FW-2019/BD/funcoes_iniciais.php";
?>

<!-- Content Wrapper. Contains page content -->
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
            Ocorreu um erro no cadastro do pedido.
          </div>';
                } else {
                    echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
            Entrega Vinculada com Sucesso.</div>';
                }
            }
            ?>
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Cadastro de Entrega</h3>
                </div> <!-- /.card-body -->
                <form method="get" action="salvar_entrega.operador.php">
                    <div class="card-body">
                        <input type="hidden" name="tipo_usuario" value="1" />
                            
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    Vincular Entrega a um Motorista: <select name="motorista" class="form-control">
                                        <?php
                                        $sql = "SELECT * from usuario WHERE id_tipo_usuario = 1";
                                        $resultado = consultarSQL($sql);
                                        while ($motorista = mysqli_fetch_assoc($resultado)) {
                                            echo '<option value="' . $motorista['id_usuario'] . '">' . $motorista['nome'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.card-body -->
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value="Cadastrar" />
                    </div>
                </form>
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