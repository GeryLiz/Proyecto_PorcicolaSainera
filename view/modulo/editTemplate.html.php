<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $desc_modulo = moduloTableClass::DESCRIPCION ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3 text-center">
            <h2>
<?php echo i18n::__('edtiModulo', null, 'modulo') ?> <?php echo $objModulo[0]->$desc_modulo ?>
            </h2>
        </div>
    </div>
</div>
<?php view::includePartial('modulo/formModulo', array('objModulo' => $objModulo)) ?>


