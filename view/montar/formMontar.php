<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $nombreRaza = razaTableClass::DESCRIPCION ?>
<?php $idRaza = razaTableClass::ID?>
<?php $idPorcino = hojaDeVidaTableClass::ID ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3">
<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('montar', ((isset($objMontar)) ? 'update' : 'create' )) ?>">
  <?php if(isset($objMontar) == true): ?>
    <input name="<?php echo montarTableClass::getNameField(montarTableClass::ID, true) ?>" value="<?php echo $objMontar[0]->id ?>" type="hidden">
  <?php endif ?>
     <table class="table"> 
         <tr>
             <th>
  <?php echo i18n::__('date', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objMontar) == true) ? $objMontar[0]-> fecha : '') ?>" type="date" name="<?php echo montarTableClass::getNameField(montarTableClass::FECHA, true) ?>">
             </th>
         </tr>
         <tr>
             <th>
      <?php echo i18n::__('fecundador', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objMontar) == true) ? $objMontar[0]->id_fecundador : '') ?>" type="text" name="<?php echo montarTableClass::getNameField(montarTableClass::ID_FECUNDADOR, true) ?>">
             </th>
         </tr>
         <tr>
             <th>
  <?php echo i18n::__('state', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objMontar) == true) ? $objMontar[0]-> estado : '') ?>" type="text" name="<?php echo montarTableClass::getNameField(montarTableClass::ESTADO, true) ?>">
             </th>
         </tr>
         <tr>
             <th>
      <?php echo i18n::__('fertilization', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objMontar) == true) ? $objMontar[0]->fecha_fertilizacion : '') ?>" type="date" name="<?php echo montarTableClass::getNameField(montarTableClass::FERTILIZACION, true) ?>">
             </th>
         </tr>
         <tr>
             <th>
  <?php echo i18n::__('porcine', null, 'montar') ?>: 


                
 <select name="  <?php echo montarTableClass::getNameField(montarTableClass::PORCINO, true) ?>">
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
      <?php echo i18n::__('race', null, 'montar') ?>: 
      
      <select name="<?php echo montarTableClass::getNameField(montarTableClass::RAZA, true) ?>">
        <?php foreach ($objRaza as $key): ?>
            <option value="<?php echo $key->$idRaza ?>">
                <?php echo $key->$nombreRaza ?>
            </option>
        <?php endforeach; ?>
    </select> 
             </th>
         </tr>
      <tr>
          <th  colspan="2" class="text-center active">
  <input type="submit" value="<?php echo i18n::__(((isset($objMontar)) ? 'update' : 'register')) ?>">
          </th>
      </tr>
     </table>
  </form>
        </div>
    </div>
</div>
