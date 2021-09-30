<script>
    const base_url = "<?= base_url(); ?>";
    const smoney = "<?= SMONEY; ?>";

</script>

<!-- Essential javascripts for application to work-->
    <script src="<?= media(); ?>/js/jquery-3.4.1.min.js"></script>
    <script src="<?= media(); ?>/js/popper.min.js"></script>
    <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/main.js"></script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>
    <script src="<?= media(); ?>/js/tinymce/tinymce.min.js"></script>

    <script src="<?= media(); ?>/js/jquery.dataTables.min.js"></script>
    <script src="<?= media(); ?>/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/plugins/bootstrap-select.min.js"></script>    

    <!-- Estos 5 scripts son necesarios para los botones de exportar -->
    <script src="<?= media(); ?>/js/plugins/dataTables.buttons.min.js"></script>
    <script src="<?= media(); ?>/js/plugins/jszip.min.js"></script>
    <script src="<?= media(); ?>/js/plugins/pdfmake.min.js"></script>
    <script src="<?= media(); ?>/js/plugins/vfs_fonts.js"></script>
    <script src="<?= media(); ?>/js/plugins/buttons.html5.min.js"></script>

    <script src="<?= media(); ?>/js/graficos/highcharts.js"></script>
    <script src="<?= media(); ?>/js/graficos/exporting.js"></script>
    <script src="<?= media(); ?>/js/graficos/export-data.js"></script>
    <script src="<?= media(); ?>/js/datepicker/jquery-ui.min.js"></script>
    <script src="<?= media(); ?>/js/jquery.datetimepicker.full.min.js"></script>

    <script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>
    <script src="<?= media(); ?>/js/functions_admin.js"></script>

    <script language="javascript">
    
        $(document).ready(function(){
        $(".botonx").click(function(event){
        $("#test").val( $("<div>").append( $("#print").eq(0).clone()).html());
        $("#formulario_x").submit();
        });
    });
        
    </script>

  </body>
</html>