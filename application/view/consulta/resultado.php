<h3 align="center">Resultado</h3>

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
        <td>Classificação</td>
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
            <td>
                <svg xmlns="http://www.w3.org/2000/svg" height="10" width="10">
                    <circle cx="5" cy="5" r="5" fill="<?php echo $resultado['cor'] ?>"></circle>
                </svg>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
    <div align="center" style="font-size: smaller">
        <b style="padding: 10px 0px 0px 0px">Legenda: </b>
        </br>
        </br>
        <p>
            <svg xmlns="http://www.w3.org/2000/svg" height="10" width="10">
                <circle cx="5" cy="5" r="5" fill="red"></circle>
            </svg>
            IDHM < 0.5 = Muito baixo.

            <svg xmlns="http://www.w3.org/2000/svg" height="10" width="10">
                <circle cx="5" cy="5" r="5" fill="orange"></circle>
            </svg>
            0.5 <= IDHM < 0.6 = Baixo.

            <svg xmlns="http://www.w3.org/2000/svg" height="10" width="10">
                <circle cx="5" cy="5" r="5" fill="yellow"></circle>
            </svg>
            0.6 <= IDHM < 0.7 = Médio.

            <svg xmlns="http://www.w3.org/2000/svg" height="10" width="10">
                <circle cx="5" cy="5" r="5" fill="green"></circle>
            </svg>
            0.7 <= IDHM < 0.8 = Alto.

            <svg xmlns="http://www.w3.org/2000/svg" height="10" width="10">
                <circle cx="5" cy="5" r="5" fill="blue"></circle>
            </svg>
            IDHM >= 0.8 = Muito alto.
        </p>
    </div>
    <?php if (isset($_POST['grafico'])) { ?>
        <center>
            <?php echo $graficoIDHM ?>
        </center>
    <?php } ?>
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
        <td>Classificação</td>
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
            <td>
                <svg xmlns="http://www.w3.org/2000/svg" height="10" width="10">
                    <circle cx="5" cy="5" r="5" fill="<?php echo $resultado['cor'] ?>"></circle>
                </svg>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
    <div align="center" style="font-size: smaller">
        <b style="padding: 10px 0px 0px 0px">Legenda: </b>
        </br>
        </br>
        <p>
            <svg xmlns="http://www.w3.org/2000/svg" height="10" width="10">
                <circle cx="5" cy="5" r="5" fill="red"></circle>
            </svg>
            IFDM < 0.4 = Baixo.

            <svg xmlns="http://www.w3.org/2000/svg" height="10" width="10">
                <circle cx="5" cy="5" r="5" fill="orange"></circle>
            </svg>
            0.4 <= IFDM < 0.6 = Regular.

            <svg xmlns="http://www.w3.org/2000/svg" height="10" width="10">
                <circle cx="5" cy="5" r="5" fill="yellow"></circle>
            </svg>
            0.6 <= IFDM < 0.8 = Moderado.

            <svg xmlns="http://www.w3.org/2000/svg" height="10" width="10">
                <circle cx="5" cy="5" r="5" fill="blue"></circle>
            </svg>
            IFDM >= 0.8 = Alto.
        </p>
    </div>
    <?php if (isset($_POST['grafico'])) { ?>
        <center>
            <?php echo $graficoIFDM ?>
        </center>
    <?php } ?>
    <p style="padding-top: 10px" align="center">Fonte: <a href="http://www.firjan.com.br/ifdm/downloads/">Sistema
            FIRJAN</a>
    </p>
<?php } ?>


