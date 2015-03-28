<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php $nombreInsumo = insumoTableClass::DESCRIPCION ?>
<?php $idInsumo = insumoTableClass::ID ?>
<?php $idFactura = facturaCompraInsumoTableClass::ID ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3">
<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('detalleFacturaCompraInsumo', ((isset($objCiudad)) ? 'update' : 'create')) ?>">
    <?php if (isset($objDetalle) == true): ?>
        <input name="<?php echo detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoTableClass::ID, true) ?>" value="<?php echo $objDetalle[0]->id ?>" type="hidden">
    <?php endif ?>
          <table class="table" > 
              <tr>
                  <th>
    <?php echo i18n::__('id_bill', null, 'detalleFacturaCompraInsumo') ?>: 
                 
    <select name="<?php echo detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoBaseTableClass::ID_FACT, true) ?>">
        <?php foreach ($objFactura as $key): ?>
            <option value="<?php echo $key->$idFactura ?>">
                <?php echo $key->$idFactura ?>
            </option>
        <?php endforeach; ?>
    </select>
                  </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('id', null, 'detalleFacturaCompraInsumo') ?>: 
                 
    <select name="<?php echo detalleFacturaCompraInsumoBaseTableClass::getNameField(detalleFacturaCompraInsumoBaseTableClass::ID_INSUMO, true) ?>">
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
    <?php echo i18n::__('quantity', null, 'detalleFacturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objDetalle) == true) ? $objDetalle[0]->cantidad : '') ?>" type="text" name="<?php echo detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoBaseTableClass::CANTIDAD, true) ?>">
                  </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('price', null, 'detalleFacturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objDetalle) == true) ? $objDetalle[0]->precio : '') ?>" type="text" name="<?php echo detalleFacturaCompraInsumoBaseTableClass::getNameField(detalleFacturaCompraInsumoBaseTableClass::PRECIO, true) ?>">
                  </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('subtotal', null, 'facturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objDetalle) == true) ? $objDetalle[0]->subtotal : '') ?>" type="text" name="<?php echo detalleFacturaCompraInsumoBaseTableClass::getNameField(detalleFacturaCompraInsumoBaseTableClass::SUBTOTAL, true) ?>">
                  </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('manufacturing', null, 'insumo') ?>: <input placeholder="<?php echo ((isset($objDetalle) == true) ? $objDetalle[0]->fecha_fabricacion : '') ?>" type="date" name="<?php echo detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoBaseTableClass::FABRICACION, true) ?>">
    </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('expiration', null, 'insumo') ?>: <input placeholder="<?php echo ((isset($objDetalle) == true) ? $objDetalle[0]->fecha_vencimiento : '') ?>" type="date" name="<?php echo detalleFacturaCompraInsumoBaseTableClass::getNameField(detalleFacturaCompraInsumoBaseTableClass::VENCIMIENTO, true) ?>">
                  </th>
              </tr>
              <tr>
                  <th colspan="2" class="text-center active">
              <input type="submit" value="<?php echo i18n::__(((isset($objDetalle)) ? 'update' : 'register')) ?>">
                  </th>
              </tr>
          </table>
    </form>
        </div>
    </div>
</div>
