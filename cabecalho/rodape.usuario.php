<?php
    $path = '/Equipe6-Hackathon-FW-2019';
?>
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Versão</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="#">Equipe 6: Patrick, Leonardo, Adriano</a>.</strong> Todos os direitos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="<?php echo $path?>/node_modules/admin-lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $path?>/node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<script src="<?php echo $path?>/node_modules/admin-lte/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo $path?>/node_modules/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo $path?>/node_modules/admin-lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $path?>/node_modules/admin-lte/dist/js/demo.js"></script>
<script>
// $(function () {
//     // $("#example1").DataTable();
//     // $('#example2').DataTable({
//     //   "paging": true,
//     //   "lengthChange": false,
//     //   "searching": true,
//     //   "ordering": true,
//     //   "info": true,
//     //   "autoWidth": false,
//     // });
//   });
$('.dataTable').dataTable({     
        /*problemas no firefox de aparecer o "+" é por causa desse lengthMenu */
        //Por algum motivo ele requer que o número '10' esteja ai para não dar o problema no firefox.       
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': ['nosort']
        }],
        responsive: true,
        "dom": 'T<"clear">lfrtBip',
        buttons: [
            {
                extend: 'pdfHtml5',
                download: 'open',
                text: 'Gerar PDF', 
                pageSize: 'LEGAL',
                //orientation: 'landscape',
                exportOptions: {
                    columns: "thead th:not(.no-print)"
                }                                                                                               
            }           
        ],                
        "tableTools": {
            "sSwfPath": "../../bower_components/AdminLTE/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
            "aButtons": [
                {
                    "sExtends": "copy",
                    "sButtonText": "Copiar",
                },
                {
                    "sExtends": "csv",
                    "sButtonText": "CSV"
                },
                {
                    "sExtends": "pdf",
                    "sButtonText": "PDF",
                },
                {
                    "sExtends": "print",
                    "sButtonText": "Imprimir",
                    "sInfo" : "<h1>Imprimir</h1>Pressione Ctrl+P para imprimir a página e Esc para sair"
                },
            ]
        },      
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "search": "_INPUT_",
            "searchPlaceholder": "Buscar registros...",         
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
        'order': ( $('.dataTable').data('array') != 'undefined' ) ? $('.dataTable').data('array') : false,  
    });  
</script>
</body>
</html>