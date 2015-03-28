<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3 text-center">
            <h2>
<?php echo i18n::__('editDetailBillPurchaseInput', null, 'detalleFacturaCompraInsumo') ?> <?php echo $objDetalle[0]->id_fact ?>
            </h2>
        </div>
    </div>
</div>
<?php view::includePartial('detalleFacturaCompraInsumo/formDetalleFacturaCompraInsumo', array('objDetalle' => $objDetalle, 'objFactura' => $objFactura , 'objInsumo' => $objInsumo)) ?>

