<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $nombreInsumo = insumoTableClass::DESCRIPCION ?>
<?php $idInsumo = insumoTableClass::ID ?>
<?php $idPorcino = hojaDeVidaTableClass::ID ?>
<?php $idVacuna = vacunacionTableClass::ID ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3">
            <form method="post" action="<?php echo routing::getInstance()->getUrlWeb('vacunacion', ((isset($objDetalleVacunacion)) ? 'updateDetalleVacunacion' : 'createDetalleVacunacion')) ?>">
                <?php if (isset($objDetalleVacunacion) == true): ?>
                    <input name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID, true) ?>" value="<?php echo $objDetalleVacunacion[0]->id ?>" type="hidden">
                <?php endif ?>
                <table class="table"> 
                    <tr>
                        <th>
                            <?php echo i18n::__('id_document', null, 'detalleVacunacion') ?>: 
                            <select name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_DOC, true) ?>">
                                <?php foreach ($objVacuna as $key): ?>
                                    <option value="<?php echo $key->$idVacuna ?>">
                                        <?php echo $key->$idVacuna ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <?php echo i18n::__('porcine', null, 'montar') ?>: 

                            <select name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_PORCINO, true) ?>">
                                <?php foreach ($objPorcino as $key): ?>
                                    <option value="<?php echo $key->$idPorcino ?>">
                                        <?php echo $key->$idPorcino ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <?php echo i18n::__('insumo', null, 'detalleVacunacion') ?>:
                            <select name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_INSUMO, true) ?>">
                                <?php foreach ($objInsumo as $key): ?>
                                    <option value="<?php echo $key->$idInsumo ?>">
                                        <?php echo $key->$nombreInsumo ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <?php echo i18n::__('quantity', null, 'detalleFacturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objDetalleVacunacion) == true) ? $objDetalleVacunacion[0]->cantidad : '') ?>" type="text" name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::CANTIDAD, true) ?>">
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center active">
                            <input type="submit" value="<?php echo i18n::__(((isset($objDetalleVacunacion)) ? 'update' : 'register')) ?>">
                        </th>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>