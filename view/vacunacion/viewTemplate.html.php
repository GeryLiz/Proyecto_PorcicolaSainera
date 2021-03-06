
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\request\requestClass as request ?>

<div class="container container-fluid">

    <br/> <br/>
    <?php echo i18n::__('vaccination', null, 'vacunacion') ?>
    <br /> <br/>

    <table class="table table-bordered table-responsive ">
        <thead>
            <tr class="active">
                <th><?php echo i18n::__('id_doc', null, 'vacunacion') ?></th>
                <th><?php echo i18n::__('date', null, 'vacunacion') ?></th>
                <th><?php echo i18n::__('employee') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($objVacunacion as $key): ?>
                <tr>
                    <td><?php echo $key->id ?></td>
                    <td><?php echo $key->fecha ?></td>
                    <td><?php echo empleadoTableClass::getNameEmpleado($key->usuario_id) ?></td>

                </tr>
                                                
            <?php endforeach ?>
        </tbody>
    </table>
    <br/> 
    <?php echo i18n::__('detailVaccination', null, 'detalleVacunacion') ?>

    <div class="container container-fluid" style="margin-bottom: 10px">
        <!--<form id="frmDelebottom: 10px; margin-top: 30px">-->
        <br />        
        <a href="#" data-target="#myModalEliminarMasivo" data-toggle="modal" class="btn btn-xs btn-default active"><?php echo i18n::__('deleteMass') ?></a>
        <!--<a href="<?php // echo routing::getInstance()->getUrlWeb('vacunacion', 'reportDetalleVacunacion') ?>" class="btn btn-info btn-xs" ><?php echo i18n::__('report') ?></a>-->       
        <a href="#" data-target="#myModalReport" data-toggle="modal" class="btn btn-xs btn-default active"><?php echo i18n::__('filterReport') ?></a>
        <a href="#" data-target="#myModalFilter" data-toggle="modal" class="btn btn-xs btn-default active"><?php echo i18n::__('filters') ?></a>
        <a class="btn btn-xs btn-default active" href="<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'deleteFilterDetalle') ?>"><?php echo i18n::__('removeFilters') ?></a>
    </div>

    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'deleteSelectDetalleVacunacion') ?>" method="POST">

        <table class="table table-bordered table-responsive ">
            <thead>
                <tr class="active">
                    <th><input type="checkbox" id="chkAll"></th>
                    <th><?php echo i18n::__('N°', null, 'vacunacion') ?></th>
                    <th><?php echo i18n::__('N° Document of Vaccination', null, 'vacunacion') ?></th>
                    <th><?php echo i18n::__('porcine', null, 'montar') ?></th>
                    <th><?php echo i18n::__('input', null, 'insumo') ?></th>
                    <th><?php echo i18n::__('quantity', null, 'detalleFacturaCompraInsumo') ?></th>
                    <th><?php echo i18n::__('action') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($objDetalleVacunacion as $key): ?>
                    <tr>
                        <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
                        <td><?php echo $key->id ?></td>
                        <td><?php echo $key->id_doc ?></td>
                        <td><?php echo $key->id_porcino ?></td>
                        <td><?php echo insumoTableClass::getNameInsumo($key->id_insumo) ?></td>
                        <td><?php echo $key->cantidad ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info fa " data-toggle="modal" data-target="#myModalUpdate<?php echo $key->id ?>"><?php echo i18n::__('edit') ?></a>
                            <a href="#" class="btn btn-sm btn-danger fa fa-trash-o" data-toggle="modal" data-target="#myModalDelete<?php echo $key->id ?>"><?php echo i18n::__('delete') ?></a>
                        </td>
                    </tr>
                    <!-- WINDOWS MODAL DELETE -->
                <div class="modal fade" id="myModalDelete<?php echo $key->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
                            </div>
                            <div class="modal-body">
                                <?php echo i18n::__('want to delete the record?') ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                                <button type="button" class="btn btn-danger fa fa-eraser" onclick="eliminar(<?php echo $key->id ?>, '<?php echo detalleVacunacionBaseTableClass::getNameField(detalleVacunacionTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'deleteDetalleVacunacion') ?>')"><?php echo i18n::__('remove') ?></button>
                            </div>
                        </div>
                    </div>
                </div>      
        </form>
        <!-- WINDOWS MODAL UPDATE DETAIL VACCINATION -->
        <div class="modal fade" id="myModalUpdate<?php echo $key->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('editDetailVaccination', null, 'detalleVacunacion') ?>:</h4>
                    </div>
                    <div class="modal-body">

                        <form id="detailForm" class="form-horizontal" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'updateDetalleVacunacion') ?>">
                            <input type="hidden" value="<?php echo request::getInstance()->getServer('PATH_INFO') ?>" name="PATH_INFO">

                            <input type="hidden" value="<?php echo $key->id_doc ?>" name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_DOC, true) ?>">
                            <input type="hidden" value="<?php echo $key->id ?>" name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID, true) ?>">
                            <h3><?php echo i18n::__('porcine', null, 'montar') ?></h3>
                            <select name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_PORCINO, true) ?>">
                                <?php foreach ($objPorcino as $key): ?>
                                    <option value="<?php echo $key->id ?>"><?php echo $key->id ?></option>
                                <?php endforeach; ?>
                            </select>
                            <h3><?php echo i18n::__('input', null, 'insumo') ?></h3>
                            <select name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_INSUMO, true) ?>">
                                <?php foreach ($objInsumo as $key): ?>
                                    <option value="<?php echo $key->id ?>"><?php echo $key->desc_insumo ?></option>
                                <?php endforeach; ?>
                            </select>
                            <h3><?php echo i18n::__('quantity', null, 'detalleFacturaCompraInsumo') ?></h3>
                            <input type="number" name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::CANTIDAD, true) ?>">


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">   <?php echo i18n::__('cancel') ?></button>
                                <!--<button type="button"  onclick="$('#detailForm').submit()">Insertar</button>-->
                                <input type="submit" class="btn btn-primary" value="Modificar">
                                </form>
                            </div>
                    </div>
                </div>
            </div>     
        <?php endforeach ?>
        </tbody>
        </table>

    </div>
    <!-- WINDOWS MODAL DELETE MASIVE -->
    <div class="modal fade" id="myModalEliminarMasivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('deleteMass') ?></h4>
                </div>
                <div class="modal-body">

                    <?php echo i18n::__('confirmDeleteMasive') ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <?php echo i18n::__('close') ?></button>
                    <button type="button" class="btn btn-danger" onclick="$('#frmDeleteAll').submit()"> <?php echo i18n::__('confirm') ?></button>
                </div>
            </div>
        </div>
    </div>

    <!-- WINDOWS MODAL FILTER -->
    <div class="modal fade" id="myModalFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('filterBy') ?>:</h4>
                </div>
                <div class="modal-body">
                    <form id="filterForm" class="form-horizontal" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'viewVacunacion') ?>">
                        <input type="hidden" name="<?php echo vacunacionTableClass::ID ?>" value="<?php echo request::getInstance()->getRequest(vacunacionTableClass::ID) ?>">
                        <table class="table table-bordered">
                            <tr>
                                <th><?php echo i18n::__('porcine', null, 'montar') ?></th>
                                <th>
                                    <input name="filter[porcino]" type="number">
                                </th>
                            </tr>
                            <tr>

                                <th><?php echo i18n::__('input', null, 'insumo') ?></th>
                                <th>
                                    <select name="filter[insumo]">
                                        <option value="">
                                            ...
                                        </option>
                                        <?php foreach ($objInsumo as $key): ?>
                                            <option value="<?php echo $key->id ?>">
                                                <?php echo $key->desc_insumo ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </th>
                            </tr>
                        </table>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" ><?php echo i18n::__('close') ?></button>
                    <button type="button" class="btn btn-primary" onclick="$('#filterForm').submit()"><?php echo i18n::__('search') ?></button>
                </div>
            </div>
        </div>
    </div>


    <!-- WINDOWS MODAL REPORT -->
    <div class="modal fade" id="myModalReport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('filterBy') ?>:</h4>
                </div>
                <div class="modal-body">
                    <form id="reportForm" class="form-horizontal" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'reportDetalleVacunacion') ?>">
                        <input type="hidden" name="<?php echo vacunacionTableClass::ID ?>" value="<?php echo request::getInstance()->getRequest(vacunacionTableClass::ID) ?>">
                        <table class="table table-bordered">
                            <tr>
                                <th><?php echo i18n::__('porcine', null, 'montar') ?></th>
                                <th>
                                    <select name="report[porcino]">
                                        <option value="">
                                            ...
                                        </option>
                                        <?php foreach ($objPorcino as $key): ?>
                                            <option value="<?php echo $key->id ?>">
                                                <?php echo $key->id ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </th>
                            </tr>
                            <tr>

                                <th><?php echo i18n::__('input', null, 'insumo') ?></th>
                                <th>
                                    <select name="report[insumo]">
                                        <option value="">
                                            ...
                                        </option>
                                        <?php foreach ($objInsumo as $key): ?>
                                            <option value="<?php echo $key->id ?>">
                                                <?php echo $key->desc_insumo ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </th>
                            </tr>
                        </table>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" ><?php echo i18n::__('close') ?></button>
                    <button type="button" class="btn btn-primary" onclick="$('#reportForm').submit()"><?php echo i18n::__('search') ?></button>
                </div>
            </div>
        </div>
    </div>
