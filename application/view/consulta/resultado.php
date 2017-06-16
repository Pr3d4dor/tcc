<h3>Resultado</h3>

<?php if (isset($_POST['idhm'])) { ?>
<hr>
<h4 align="center">IDHM</h4>
    <div align="left">
        <a href="<?php echo htmlentities($sparqlFormatos['jsonIDHM']) ?>">
            <img border="0" src="https://maxcdn.icons8.com/Share/icon/Files//json1600.png" width="24" height="24">
        </a>
        <a href="<?php echo htmlentities($sparqlFormatos['csvIDHM']) ?>">
            <img border="0" src="https://image.flaticon.com/icons/svg/28/28842.svg" width="24" height="24">
        </a>
        <a href="<?php echo htmlentities($sparqlFormatos['turtleIDHM']) ?>">
            <img border="0" src="https://d30y9cdsu7xlg0.cloudfront.net/png/70338-200.png" width="24" height="24">
        </a>
        <a href="<?php echo htmlentities($sparqlFormatos['xmlIDHM']) ?>">
            <img border="0" src="https://image.freepik.com/icones-gratis/xml-formato-de-arquivo-simbolo_318-45852.jpg"
                 width="24" height="24">
        </a>
    </div>
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
<?php } ?>

<?php if (isset($_POST['ifdm'])) { ?>
<hr>
<h4 align="center">IFDM</h4>
    <div align="left">
        <a href="<?php echo htmlentities($sparqlFormatos['jsonIFDM']) ?>">
            <img border="0" src="https://maxcdn.icons8.com/Share/icon/Files//json1600.png" width="24" height="24">
        </a>
        <a href="<?php echo htmlentities($sparqlFormatos['csvIFDM']) ?>">
            <img border="0" src="https://image.flaticon.com/icons/svg/28/28842.svg" width="24" height="24">
        </a>
        <a href="<?php echo htmlentities($sparqlFormatos['turtleIFDM']) ?>">
            <img border="0" src="https://d30y9cdsu7xlg0.cloudfront.net/png/70338-200.png" width="24" height="24">
        </a>
        <a href="<?php echo htmlentities($sparqlFormatos['xmlIFDM']) ?>">
            <img border="0" src="https://image.freepik.com/icones-gratis/xml-formato-de-arquivo-simbolo_318-45852.jpg"
                 width="24" height="24">
        </a>
    </div>
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
<?php } ?>