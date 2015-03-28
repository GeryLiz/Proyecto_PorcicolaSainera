<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $idUsuario = usuarioTableClass::ID ?>
<?php $password = usuarioTableClass::PASSWORD ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3">
<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('default', ((isset($objUsuario)) ? 'update' : 'create' )) ?>">
  <?php if(isset($objUsuario) == true): ?>
    <input name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID,true) ?>" value="<?php echo $objUsuario[0]->$idUsuario ?>" type="hidden">
  <?php endif ?>
       <table class="table" > 
    <tr>
        <th>
            
  <?php echo i18n::__('user') ?>: 
        </th>
        <th>
  <input value="<?php echo ((isset($objUsuario) == true) ? $objUsuario[0]->$usuario : '') ?>" type="text" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>">
        </th>
    </tr>
    <tr>
        <th>
  <?php echo i18n::__('pass') ?>:
        </th>
        <th>
  <input value="<?php echo ((isset($objUsuario) == true) ? $objUsuario[0]->$password : '') ?>" type="password" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>">
        </th>
    </tr>
    <tr>
      <th colspan="2" class="text-center active">
  <input type="submit" value="<?php echo i18n::__(((isset($objUsuario)) ? 'update' : 'register')) ?>">
      </th>
  </tr>
       </table>
</form>
        </div>
    </div>
</div>