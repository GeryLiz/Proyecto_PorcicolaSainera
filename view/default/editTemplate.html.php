<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $usuario = usuarioTableClass::USER ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3 text-center">
            <h2>
<h1>EDITAR USUARIO <?php echo $objUsuario[0]->$usuario ?></h1>
            </h2>
        </div>
    </div>
</div>
<?php view::includePartial('default/formUser', array('objUsuario' => $objUsuario, 'usuario' => $usuario)) ?>