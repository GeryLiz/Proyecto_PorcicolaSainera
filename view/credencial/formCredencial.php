<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3">
            <form method="post" action="<?php echo routing::getInstance()->getUrlWeb('credencial', ((isset($objCredencial)) ? 'update' : 'create')) ?>">
                <?php if (isset($objCredencial) == true): ?>
                    <input name="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true) ?>" value="<?php echo $objCredencial[0]->id ?>" type="hidden">
                <?php endif ?>
                <table class="table">      
                    <tr>
                        <th colspan="2" class="text-center ">
                            <?php echo i18n::__('name', null, 'credencial') ?>: <input placeholder="<?php echo ((isset($objCredencial) == true) ? $objCredencial[0]->nombre : '') ?>" type="text" name="<?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true) ?>">
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center active">
                            <input type="submit" value="<?php echo i18n::__(((isset($objCredencial)) ? 'update' : 'register')) ?>">
                        </th>
                    </tr>
            </form>

        </div>
    </div>
</div>
