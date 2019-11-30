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
            Pedido cadastrado com sucesso.</div>';
                }
            }
            ?>
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Cadastrar Pedido</h3>
                </div> <!-- /.card-body -->
                <form method="POST" action="salvar_pedido.operador.php">
                    <div class="card-body">
                        <input type="hidden" name="tipo_usuario" value="2" />
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                Valor Total do Pedido: <input name="valor" class="form-control" type="number" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                Nota Fiscal: <input name="nota_fiscal" class="form-control" type="text" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    Data do Pedido: <input name="data" class="form-control" type="date" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                Hora do Pedido: <input name="hora" class="form-control" type="time" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6">
                                <div class="form-group">
                                    Endereço de Origem: <select name="endereco" class="form-control">
                                        <?php
                                        $sql1 = "SELECT * from endereco WHERE descricao_endereco is not null";
                                        $resultado1 = consultarSQL($sql1);
                                        while ($end = mysqli_fetch_assoc($resultado1)) {
                                            echo '<option value="' . $end['id_endereco'] . '">' . $end['descricao_endereco'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    Cliente: <select name="cliente" class="form-control">
                                        <?php
                                        $sql = "SELECT * from usuario WHERE id_tipo_usuario = 2";
                                        $resultado = consultarSQL($sql);
                                        while ($cliente = mysqli_fetch_assoc($resultado)) {
                                            echo '<option value="' . $cliente['id_usuario'] . '">' . $cliente['nome'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    Tipo do pedido:
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="tipo_pedido" value="entrega">
                                                <div class="form-check-label">Entrega</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="tipo_pedido" value="devolucao">
                                                <div class="form-check-label">Devolução</div>
                                            </div>
                                        </div>
                                    </div>
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