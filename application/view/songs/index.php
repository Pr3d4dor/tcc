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
                        <td><?php echo htmlspecialchars(utf8_decode($municipio['municipio']), ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars(utf8_decode($municipio['uf']), ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars(utf8_decode($municipio['ifdm']), ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </center>
    </div>
</div>
