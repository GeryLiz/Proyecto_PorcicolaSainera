<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php $nombreDepto = departamentoTableClass::DESCRIPCION ?>
<?php $idDepto = departamentoTableClass::ID ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3">
            <form method="post" action="<?php echo routing::getInstance()->getUrlWeb('ciudad', ((isset($objCiudad)) ? 'update' : 'create')) ?>">
                <?php if (isset($objCiudad) == true): ?>
                    <input name="<?php echo ciudadTableClass::getNameField(ciudadTableClass::ID, true) ?>" value="<?php echo $objCiudad[0]->id ?>" type="hidden">
                <?php endif ?>
                <table class="table">      
                    <tr>
                        <th>
                            <?php echo i18n::__('name', null, 'credencial') ?>:
                        </th>
                        <th>
                            <input placeholder="<?php echo ((isset($objCiudad) == true) ? $objCiudad[0]->desc_ciudad : '') ?>" type="text" name="<?php echo ciudadTableClass::getNameField(ciudadTableClass::DESCRIPCION, true) ?>">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <?php echo i18n::__('department', null, 'ciudad') ?>:    
                        </th>
                        <th>
                            <select name="<?php echo ciudadTableClass::getNameField(ciudadTableClass::DEPARTAMENTO, true) ?>">
                                <?php foreach ($objDepto as $key): ?>
                                    <option value="<?php echo $key->$idDepto ?>">
                                        <?php echo $key->$nombreDepto ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </th>
                    <tr>
                        <th colspan="2" class="text-center active">
                            <input type="submit" value="<?php echo i18n::__(((isset($objCiudad)) ? 'update' : 'register')) ?>">
                        </th>
                    </tr>

                </table>
            </form>


        </div>
    </div>
</div>

