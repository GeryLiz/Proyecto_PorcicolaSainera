<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $nombreRaza = razaTableClass::DESCRIPCION ?>
<?php $idRaza = razaTableClass::ID ?>
<?php $nombreModulo = moduloTableClass::DESCRIPCION ?>
<?php $idModulo = moduloTableClass::ID ?>
<?php $nombreUsuario = usuarioTableClass::USER ?>
<?php $idUsuario = usuarioTableClass::ID ?>

<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3">
            <form method="post" action="<?php echo routing::getInstance()->getUrlWeb('porcino', ((isset($objHojaDeVida)) ? 'updateHojaDeVida' : 'createHojaDeVida')) ?>">
    <?php if (isset($objHojaDeVida) == true): ?>
        <input name="<?php echo hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::ID, true) ?>" value="<?php echo $objHojaDeVida[0]->id ?>" type="hidden">
    <?php endif ?>
        <table class="table">
            <tr>
                <th>
                    <?php echo i18n::__('age', null, 'hojaDeVida') ?>:
                </th>
                <th>
                         <input placeholder="<?php echo ((isset($objHojaDeVida) == true) ? $objHojaDeVida[0]->edad_porcino : '') ?>" type="text" name="<?php echo hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::EDAD, true) ?>">
                </th>
            </tr>
            <tr>
                <th>
                    <?php echo i18n::__('weight', null, 'hojaDeVida') ?>:
                </th>
                <th>
                         <input placeholder="<?php echo ((isset($objHojaDeVida) == true) ? $objHojaDeVida[0]->peso_porcino : '') ?>" type="text" name="<?php echo hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::PESO, true) ?>">
                </th>
            </tr>
            <tr>
                <th>
                    <?php echo i18n::__('gender', null, 'hojaDeVida') ?>:
                </th>
                <th>
                    <select name="<?php echo hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::GENERO, true) ?>">
                        <option>Seleccione el genero</option>
                        <option value="M">Macho</option>
                        <option value="H">Hembra</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th>
                   <?php echo i18n::__('quantity_births', null, 'hojaDeVida') ?>: 
                </th>
                <th>
                    
                  <input placeholder="<?php echo ((isset($objHojaDeVida) == true) ? $objHojaDeVida[0]->cant_partos : '') ?>" type="text"      name="<?php echo hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::PARTOS, true) ?>">
                      
                        </th>
            </tr>
            <tr>
                <th>
                    <?php echo i18n::__('date_entry', null, 'hojaDeVida') ?>:
                </th>
                <th>
                         <input placeholder="<?php echo ((isset($objHojaDeVida) == true) ? $objHojaDeVida[0]->fecha_ingreso : '') ?>" type="date" name="<?php echo hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::INGRESO, true) ?>">
                </th>
            </tr>
            <tr>
                <th>
                   <?php echo i18n::__('state', null, 'montar') ?>: 
                </th>
                <th>
                 <select  name="<?php echo hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::ESTADO, true) ?>">
                            <option>...</option>
                            <option value="true">Activo</option>
                            <option value="false">Inactivo</option>
                        </select>
                </th>
            </tr>
            <tr>
                <th>
                     <?php echo i18n::__('race', null, 'montar') ?>: 
                </th>
                <th>
                    <select name="<?php echo hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::RAZA, true) ?>">
        <?php foreach ($objRaza as $key): ?>
            <option value="<?php echo $key->$idRaza ?>">
                <?php echo $key->$nombreRaza ?>
            </option>
        <?php endforeach; ?>
    </select>
                </th>
            </tr>
            <tr>
                <th>
                   <?php echo i18n::__('module', null, 'hojaDeVida') ?>: 
                </th>
                <th>
                     <select name="<?php echo hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::MODULO, true) ?>">
        <?php foreach ($objModulo as $key): ?>
            <option value="<?php echo $key->$idModulo ?>">
                <?php echo $key->$nombreModulo ?>
            </option>
        <?php endforeach; ?>
    </select>
                </th>
            </tr>
            <tr>
                <th>
                    <?php echo i18n::__('user_id', null, 'hojaDeVida') ?>:
                </th>
                <th>
                    <select name="<?php echo hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::USUARIO_ID, true) ?>">
        <?php foreach ($objUsuario as $key): ?>
            <option value="<?php echo $key->$idUsuario ?>">
                <?php echo $key->$nombreUsuario ?>
            </option>
        <?php endforeach; ?>
    </select>
                </th>
            </tr>
            <tr>
                <th class="active text-center" colspan="2">
                       <input type="submit" value="<?php echo i18n::__(((isset($objHojaDeVida)) ? 'update' : 'register')) ?>"> 
                </th>
            </tr>
        </table>
            </form>
        </div>
    </div>
</div>
