<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3">
<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('facturaCompraInsumo', ((isset($objFacturaCompraInsumo)) ? 'update' : 'create' )) ?>">
  <?php if(isset($objFacturaCompraInsumo) == true): ?>
    <input name="<?php echo facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::ID, true) ?>" value="<?php echo $objFacturaCompraInsumo[0]->id ?>" type="hidden">
  <?php endif ?>
      <table class="table">   
          <tr>
              <th>
  <?php echo i18n::__('date', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objFacturaCompraInsumo) == true) ? $objFacturaCompraInsumo[0]-> fecha : '') ?>" type="date" name="<?php echo facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::FECHA, true) ?>">
  </th>
          </tr>
          <tr>
              <th>
      <?php echo i18n::__('iva', null, 'facturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objFacturaCompraInsumo) == true) ? $objFacturaCompraInsumo[0]->iva : '') ?>" type="text" name="<?php echo facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::IVA, true) ?>">
              </th>
          </tr>
          <tr>
              <th>
  <?php echo i18n::__('subtotal', null, 'facturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objFacturaCompraInsumo) == true) ? $objFacturaCompraInsumo[0]-> subtotal : '') ?>" type="text" name="<?php echo facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::SUBTOTAL, true) ?>">
              </th>
          </tr>
          <tr>
              <th>
      <?php echo i18n::__('total', null, 'facturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objFacturaCompraInsumo) == true) ? $objFacturaCompraInsumo[0]->total : '') ?>" type="text" name="<?php echo facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::TOTAL, true) ?>">
              </th>
          </tr>
          <tr>
              <th>
      <?php echo i18n::__('user_id', null, 'hojaDeVida') ?>:
      
      <select name="<?php echo facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::USUARIO_ID, true) ?>">
         <?php foreach ($objUsuario as $key):?>
          <option value="<?php echo $key->id ?>"><?php echo $key->user_name ?></option>
          <?php endforeach; ?>
      </select>
      
              </th>
          </tr>
          <tr>
              <th colspan="2" class="text-center active">
          <input type="submit" value="<?php echo i18n::__(((isset($objFacturaCompraInsumo)) ? 'update' : 'register')) ?>">
              </th>
          </tr>
      </table>
  </form>
        </div>
    </div>
</div>

