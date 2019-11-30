<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/Equipe6-Hackathon-FW-2019';
$cabecalho = $path . '/cabecalho/cabecalho.operador.php';
include_once($cabecalho);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content pt-3">
        <div class="container-fluid">
<?php        
    if(isset($_GET['mensagem'])){
        $mensagem = $_GET['mensagem'];
        if($mensagem == 'erro'){
            echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Erro!</h5>
            Ocorreu um erro no cadastro do usuário.
          </div>';
        }else{
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
            Usuário cadastrado com sucesso.</div>';
        }
    }
?>
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Cadastrar Cliente</h3>
                </div> <!-- /.card-body -->
                <form method="get" action="salvar_usuario.operador.php">
                    <div class="card-body">
                        <input type="hidden" name="tipo_usuario" value="2" />
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    Nome: <input name="nome" class="form-control" type="text" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    E-Mail: <input name="email" class="form-control" type="text" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    CNPJ: <input name="cnpj" class="form-control" type="text" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    Telefone: <input name="telefone" class="form-control" type="text" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    Senha: <input name="senha" class="form-control" type="password" required />
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