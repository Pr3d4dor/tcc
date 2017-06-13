<div class="container">
    <h2>You are in the View: application/view/song/index.php (everything in this box comes from that file)</h2>
    <!-- main content output -->
    <div class="box">
        <center>
            <h3>Municipios</h3>
            <table>
                <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td>Municipio</td>
                    <td>UF</td>
                    <td>IFDM</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($municipios as $municipio) { ?>
                    <tr>
                        <td><?php echo $municipio['municipio']; ?></td>
                        <td><?php echo $municipio['uf']; ?></td>
                        <td><?php echo $municipio['ifdm']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </center>
    </div>
</div>
