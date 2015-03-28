<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php $idPorcino = hojaDeVidaTableClass::ID ?>
<?php $idUsuario = usuarioTableClass::ID ?>
<?php $nombreUsuario = usuarioTableClass::USER ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3">
<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('gestacion', ((isset($objGestacion)) ? 'update' : 'create')) ?>">
    <?php if (isset($objGestacion) == true): ?>
        <input name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::ID, true) ?>" value="<?php echo $objGestacion[0]->id ?>" type="hidden">
    <?php endif ?>
          <table class="table">  
              <tr>
                  <th>
    <?php echo i18n::__('date', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]->fecha : '') ?>" type="date" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::FECHA, true) ?>">
                  </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('fertilization', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]->fecha_fecundacion : '') ?>" type="date" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::FECUNDACION, true) ?>">
                  </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('porcine', null, 'montar') ?>: 
    <select name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::ID_PORCINO, true) ?>">
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
    <?php echo i18n::__('number_males', null, 'gestacion') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]->num_machos : '') ?>" type="text" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::NUM_MACHOS, true) ?>">
                  </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('number_females', null, 'gestacion') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]->num_hembras : '') ?>" type="text" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::NUM_HEMBRAS, true) ?>">
                  </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('number_living', null, 'gestacion') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]->num_vivos : '') ?>" type="text" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::NUM_VIVOS, true) ?>">
                  </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('number_dead', null, 'gestacion') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]->num_muertos : '') ?>" type="text" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::NUM_MUERTOS, true) ?>">
                  </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('responsible', null, 'gestacion') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]->desc_responsable : '') ?>" type="text" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::RESPONSABLE, true) ?>">
                  </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('date_delivery', null, 'gestacion') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]->fecha_parto : '') ?>" type="date" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::FECHA_PARTO, true) ?>">
                  </th>
              </tr>
              <tr>
                  <th>
    <?php echo i18n::__('user_id', null, 'hojaDeVida') ?>: 
    <select name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::USUARIO_ID, true) ?>">
        <?php foreach ($objUsuario as  $key): ?>
            <option value="<?php echo $key->$idUsuario ?>">
                <?php echo $key->$nombreUsuario ?>
            </option>
        <?php endforeach; ?>
    </select>
                  </th>
              </tr>
              <tr>
        <th colspan="2" class="text-center active">
    <input type="submit" value="<?php echo i18n::__(((isset($objGestacion)) ? 'update' : 'register')) ?>">
        </th>
    </tr>
</table>
</form>
</div>
</div>
</div>

