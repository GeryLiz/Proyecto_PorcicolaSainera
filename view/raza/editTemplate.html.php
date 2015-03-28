<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $nombre_raza = razaTableClass::DESCRIPCION ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3 text-center">
            <h2>
               
<?php echo i18n::__('editRaza', null, 'raza') ?> <?php echo $objRaza[0]->$nombre_raza ?>
            </h2>
        </div>
    </div>
</div>
<?php view::includePartial('raza/formRaza', array('objRaza' => $objRaza)) ?>

