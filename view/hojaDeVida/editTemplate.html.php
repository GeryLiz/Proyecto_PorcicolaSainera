<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $hojaDeVida = hojaDeVidaTableClass::ID ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3 text-center">
            <h2>
<?php echo i18n::__('editHoja', null, 'hojaDeVida') ?> <?php echo $objHojaDeVida[0]->$hojaDeVida ?>
            </h2>
        </div>
    </div>
</div>
<?php view::includePartial('hojaDeVida/formHojaDeVida', array('objHojaDeVida' => $objHojaDeVida, 'objRaza' => $objRaza, 'objModulo' => $objModulo, 'objUsuario' => $objUsuario)) ?>


