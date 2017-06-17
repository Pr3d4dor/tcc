<h3 align="center">Página inicial</h3>
<hr>

    <div class="col-sm-6">
        <center>
            <h4>Top 10 Municípios ordenados pelo IDHM - Ano 2010</h4>
            <table>
                <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td>Município</td>
                    <td>UF</td>
                    <td>IDHM</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($municipiosIDHM as $municipio) { ?>
                    <tr>
                        <td><?php echo $municipio['municipio']; ?></td>
                        <td><?php echo $municipio['uf']; ?></td>
                        <td><?php echo $municipio['idhm']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <p style="padding-top: 10px">Fonte: <a href="http://www.atlasbrasil.org.br/2013/pt/consulta/">Atlas
                    Brasil</a></p>
        </center>
    </div>

    <div class="col-sm-6">
        <center>
            <h4>Top 10 Municípios ordenados pelo IFDM - Ano 2013</h4>
            <table>
                <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td>Município</td>
                    <td>UF</td>
                    <td>IFDM</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($municipiosIFDM as $municipio) { ?>
                    <tr>
                        <td><?php echo $municipio['municipio']; ?></td>
                        <td><?php echo $municipio['uf']; ?></td>
                        <td><?php echo $municipio['ifdm']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <p style="padding-top: 10px">Fonte: <a href="http://www.firjan.com.br/ifdm/downloads/">Sistema FIRJAN</a>
            </p>
        </center>
    </div>