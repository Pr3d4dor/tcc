<h3>Resultado</h3>
<hr>
<h4 align="center">IDHM</h4>
<table class="table table-striped">
    <thead style="background-color: #ddd; font-weight: bold;">
    <tr>
        <td>Código IBGE</td>
        <td>Município</td>
        <td>UF</td>
        <td>Ano</td>
        <td>IDHM</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($resultadosIDHM as $resultado) { ?>
        <tr>
            <td><?php echo $resultado['codigo']; ?></td>
            <td><?php echo $resultado['municipio']; ?></td>
            <td><?php echo $resultado['uf']; ?></td>
            <td><?php echo $resultado['ano']; ?></td>
            <td><?php echo $resultado['idhm']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<p style="padding-top: 10px" align="center">Fonte: <a href="http://www.atlasbrasil.org.br/2013/pt/consulta/">Atlas
        Brasil</a></p>

<hr>

<h4 align="center">IFDM</h4>
<table class="table table-striped">
    <thead style="background-color: #ddd; font-weight: bold;">
    <tr>
        <td>Código IBGE</td>
        <td>Município</td>
        <td>UF</td>
        <td>Ano</td>
        <td>IFDM</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($resultadosIFDM as $resultado) { ?>
        <tr>
            <td><?php echo $resultado['codigo']; ?></td>
            <td><?php echo $resultado['municipio']; ?></td>
            <td><?php echo $resultado['uf']; ?></td>
            <td><?php echo $resultado['ano']; ?></td>
            <td><?php echo $resultado['ifdm']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<p style="padding-top: 10px" align="center">Fonte: <a href="http://www.firjan.com.br/ifdm/downloads/">Sistema FIRJAN</a>
</p>