<h3>Consulta</h3>
<hr>
<center>
    <form class="form-inline" method="post" action="<?php echo URL; ?>consulta/resultado">

        <label class="mr-sm-2" for="municipio">Código IBGE: </label>
        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="codigo" name="codigo" placeholder="">

        <label class="mr-sm-2" for="municipio">Município: </label>
        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="municipio" name="municipio" placeholder="">

        <label class="mr-sm-2" for="uf">UF: </label>
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="uf" name="uf">
            <option selected="*">*</option>
            <?php foreach ($ufs as $uf) { ?>
                <option value="<?php echo $uf['uf'] ?>"><?php echo $uf['uf'] ?></option>
            <?php } ?>
        </select>

        <label class="mr-sm-2" for="ano">Ano: </label>
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="ano" name="ano">
            <option selected="*">*</option>
            <?php foreach ($anos as $ano) { ?>
                <option value="<?php echo $ano['ano'] ?>"><?php echo $ano['ano'] ?></option>
            <?php } ?>
        </select>

        <label class="form-check-label" for="idhm">
            <input class="form-check-input" type="checkbox" id="idhm" name="idhm" value="idhm"> IDHM
        </label>
        <label class="form-check-label" for="ifdm">
            <input class="form-check-input" type="checkbox" id="ifdm" name="ifdm" value="ifdm"> IFDM
        </label>

        <div style="padding-top: 10px">
            <button type="submit" class="btn btn-primary">Consultar</button>
        </div>
    </form>
</center>