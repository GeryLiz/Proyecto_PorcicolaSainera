<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php $nombreLinea = lineaTableClass::DESCRIPCION ?>
<?php $nombrePresentacion = presentacionTableClass::DESCRIPCION ?>
<?php $idLinea = lineaTableClass::ID ?>
<?php $idPresentacion = presentacionTableClass::ID ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3">
<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('insumo', ((isset($objInsumo)) ? 'update' : 'create')) ?>">
    <?php if (isset($objInsumo) == true): ?>
        <input name="<?php echo insumoTableClass::getNameField(insumoTableClass::ID, true) ?>" value="<?php echo $objInsumo[0]->id ?>" type="hidden">
    <?php endif ?>
          <table class="table"> 
              <tr>
                  <th>
    <?php echo i18n::__('name', null, 'credencial') ?>: <input placeholder="<?php echo ((isset($objInsumo) == true) ? $objInsumo[0]->desc_insumo : '') ?>" type="text" name="<?php echo insumoTableClass::getNameField(insumoTableClass::DESCRIPCION, true) ?>">
                  </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('value', null, 'insumo') ?>: <input placeholder="<?php echo ((isset($objInsumo) == true) ? $objInsumo[0]->valor_insumo : '') ?>" type="text" name="<?php echo insumoTableClass::getNameField(insumoTableClass::VALOR, true) ?>">
                  </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('line', null, 'insumo') ?>: 
    <select name="<?php echo insumoTableClass::getNameField(insumoTableClass::LINEA, true) ?>">
        <?php foreach ($objLinea as $key): ?>
            <option value="<?php echo $key->$idLinea ?>">
                <?php echo $key->$nombreLinea ?>
            </option>
        <?php endforeach; ?>
    </select>
                  </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('presentation', null, 'insumo') ?>: 
    <select name="<?php echo insumoTableClass::getNameField(insumoTableClass::PRESENTACION, true) ?>">
        <?php foreach ($objPresentacion as $key): ?>
            <option value="<?php echo $key->$idPresentacion ?>">
                <?php echo $key->$nombrePresentacion ?>
            </option>
        <?php endforeach; ?>
    </select>
                  </th>
              </tr>
              <tr>
                  <th colspan="2" class="text-center active">
              <input type="submit" value="<?php echo i18n::__(((isset($objInsumo)) ? 'update' : 'register')) ?>">
                  </th>
              </tr>
          </table>
    </form>
        </div>
    </div>
</div>