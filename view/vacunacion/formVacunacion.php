<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $nombreUsuario = empleadoTableClass::NOMBRE?>
<?php $idUsuario = empleadoTableClass::ID ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3">
<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('vacunacion', ((isset($objVacunacion)) ? 'updateVacunacion' : 'createVacunacion' )) ?>">
  <?php if(isset($objVacunacion) == true): ?>
    <input name="<?php echo vacunacionTableClass::getNameField(vacunacionTableClass::ID, true) ?>" value="<?php echo $objVacunacion[0]->id?>" type="hidden">
  <?php endif ?>
     <table class="table"> 
         <tr>
             <th>
  <?php echo i18n::__('date', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objVacunacion) == true) ? $objVacunacion[0]-> fecha : '') ?>" type="date" name="<?php echo vacunacionTableClass::getNameField(vacunacionTableClass::FECHA, true) ?>">
             </th>
         </tr>
         <tr>
      <th>
      <?php echo i18n::__('user_id', null, 'hojaDeVida') ?>: 

       <select name=" <?php echo vacunacionTableClass::getNameField(vacunacionTableClass::USUARIO_ID, true) ?>">
        <?php foreach ($objUsuario as $key): ?>
            <option value="<?php echo $key->$idUsuario ?>">
                <?php echo $key->$nombreUsuario ?>
            </option>
        <?php endforeach; ?>
    </select>
     </th>
     </tr>
      <tr>
      <th colspan="2" class="text-center active">
  <input type="submit" value="<?php echo i18n::__(((isset($objVacunacion)) ? 'update' : 'register')) ?>">
  </th>
  </tr>
  </table>
</form>
    </div>
  </div>
</div>



