<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3">
<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('departamento', ((isset($objDepartamento)) ? 'update' : 'create')) ?>">
    <?php if (isset($objDepartamento) == true): ?>
        <input name="<?php echo departamentoTableClass::getNameField(departamentoTableClass::ID, true) ?>" value="<?php echo $objDepartamento[0]->id ?>" type="hidden">
<?php endif ?>
<table class="table" > 
    <tr>
        <th colspan="2" class="text-center ">
<?php echo i18n::__('name', null, 'credencial') ?>: <input placeholder="<?php echo ((isset($objDepartamento) == true) ? $objDepartamento[0]->desc_departamento : '') ?>" type="text" name="<?php echo departamentoTableClass::getNameField(departamentoTableClass::DESCRIPCION, true) ?>">
        </th>
    </tr>
    <tr>
        <th colspan="2" class="text-center active">

    <input type="submit" value="<?php echo i18n::__(((isset($objDepartamento)) ? 'update' : 'register')) ?>">
        </th>
    </tr>
</table>
</form>
            </div>
    </div>
</div>


