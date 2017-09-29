</div>

<!-- backlink to repo on GitHub, and affiliate link to Rackspace if you want to support the project -->
<div class="footer">
    Desenvolvido com o framework <a href="https://github.com/panique/mini">MINI</a> -
    <a href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=K8584641Z1">Gianluca Bine</a>
    - Universidade Estadual do Centro-Oeste.
</div>

<!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
<script>
    var url = "<?php echo URL; ?>";
</script>

<!-- our JavaScript -->
<script src="<?php echo URL; ?>js/application.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
        
<!-- Data Tables -->
<!-- O comando 'table.display' inicializa múltiplas DataTables -->
<!-- As que conterem no class= "... display" e id="" -->
<script type="text/javascript">
    $(document).ready( function () {
        $('table.display').dataTable({
            "bJQueryUI": true,
            "oLanguage": {
                "sProcessing":   "Processando...",
                "sLengthMenu":   "Mostrar _MENU_ registros",
                "sZeroRecords":  "Não foram encontrados resultados",
                "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                "sInfoFiltered": "",
                "sInfoPostFix":  "",
                "sSearch":       "Buscar:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext":     "Seguinte",
                    "sLast":     "Último"
                }
            }
        });
    });
</script>

</body>

</html>
