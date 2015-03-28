<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3">
            <form method="post" action="<?php echo routing::getInstance()->getUrlWeb('porcino', ((isset($objRaza)) ? 'updateRaza' : 'createRaza')) ?>">
<?php if (isset($objRaza) == true): ?>
                    <input name="<?php echo razaTableClass::getNameField(razaTableClass::ID, true) ?>" value="<?php echo $objRaza[0]->id ?>" type="hidden">
                            <?php endif ?>
                <table class="table table-bordered">
                    <tr>
                        <th>
<?php echo i18n::__('name', null, 'credencial') ?>:
                        </th>
                        <th>
                            <input placeholder="<?php echo ((isset($objRaza) == true) ? $objRaza[0]->desc_raza : '') ?>" type="text" name="<?php echo razaTableClass::getNameField(razaTableClass::DESCRIPCION, true) ?>">
                        </th>
                    </tr>
                    <tr>
                        <th class="text-center active" colspan="2">
                            <input type="submit" value="<?php echo i18n::__(((isset($objRaza)) ? 'update' : 'register')) ?>">
                        </th>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

