<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019';
$cabecalho = $path . '/cabecalho/cabecalho.operador.php';
include_once($cabecalho);
include_once $_SERVER['DOCUMENT_ROOT'] . "/Equipe6-Hackathon-FW-2019/BD/funcoes_iniciais.php";
?>
<link rel="stylesheet" href="<?php echo $path ?>/node_modules/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">


<div class="content-wrapper" style="min-height: 1203.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Pedidos</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="col-md-10 offset-1">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover dataTable dt-responsive nowrap bg-white">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Fiscal</th>
                                    <th>Tipo do Pedido</th>
                                    <th class="text-right no-print">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $motorista = $_SESSION['id_usuario'];

                                $sql = "select * from pedido where id_pedido in (select id_pedido from entrega where id_motorista = $motorista);";
                                $con = abrirConexao();
                                $resultado = mysqli_query($con,$sql);
                                if ($resultado != null) {
                                    while ($pedidos = mysqli_fetch_assoc($resultado)) {
                                        echo '<tr><td>' . $pedidos['id_pedido'] . '</td><td>' . $pedidos['numero_nf'] . '</td><td>' . $pedidos['tipo_do_pedido'] .
                                         '</td><td>'.'<a href="'.$path.'/perfis/motorista/pedido.motorista.php?id_motorista='.$pedidos['id_pedido'].'" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar">
                                         <i class="fas fa-edit"></i>
                                     </a>'.'</td></tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019';
$rodape = $path . '/cabecalho/rodape.usuario.php';
include_once($rodape);
?>