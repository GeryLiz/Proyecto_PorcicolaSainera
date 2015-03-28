<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>

<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3">
            <form method="post" action="<?php echo routing::getInstance()->getUrlWeb('porcino', ((isset($objModulo)) ? 'updateModulo' : 'createModulo')) ?>">
<?php if (isset($objModulo) == true): ?>
                    <input name="<?php echo moduloTableClass::getNameField(moduloTableClass::ID, true) ?>" value="<?php echo $objModulo[0]->id ?>" type="hidden">
                            <?php endif ?>
                    <table class="table">
                    <tr>
                        <th>
<?php echo i18n::__('name', null, 'credencial') ?>:
                        </th>
                        <th>
                            <input placeholder="<?php echo ((isset($objModulo) == true) ? $objModulo[0]->desc_modulo : '') ?>" type="text" name="<?php echo moduloTableClass::getNameField(moduloTableClass::DESCRIPCION, true) ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
<?php echo i18n::__('location', null, 'modulo') ?>: 
                        </th>
                        <th>
                            <input placeholder="<?php echo ((isset($objModulo) == true) ? $objModulo[0]->ubic_modulo : '') ?>" type="text" name="<?php echo moduloTableClass::getNameField(moduloTableClass::UBICACION, true) ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
<?php echo i18n::__('size', null, 'modulo') ?>:  
                        </th>
                        <th>
                            <input placeholder="<?php echo ((isset($objModulo) == true) ? $objModulo[0]->tamaño_modulo : '') ?>" type="text" name="<?php echo moduloTableClass::getNameField(moduloTableClass::TAMAÑO, true) ?>">
                        </th>
                    </tr>
                    <tr>
                        <th class="text-center active" colspan="2">
                            <input type="submit" value="<?php echo i18n::__(((isset($objModulo)) ? 'update' : 'register')) ?>">
                        </th>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>


