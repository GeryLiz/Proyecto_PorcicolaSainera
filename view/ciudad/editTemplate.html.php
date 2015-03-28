<?php

use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $nombre_ciudad = ciudadTableClass::DESCRIPCION ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3 text-center">
            <h2>
<?php echo i18n::__('editCity', null, 'ciudad') ?> <?php echo $objCiudad[0]->$nombre_ciudad ?>
            </h2>
        </div>
    </div>
</div>
<?php view::includePartial('ciudad/formCiudad', array('objCiudad' => $objCiudad, 'objDepto' => $objDepto)) ?>
