<?php use mvc\routing\routingClass as routing ?>

<div class="container container-fluid">
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('detalleFacturaCompraInsumo', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('detalleFacturaCompraInsumo', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
    </div>
      
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th><input type="checkbox" id="chkAll"></th>
          
          <th>Id Factura</th>
           <th>Id Insumo</th>
          <th>Cantidad</th>
          <th>Precio</th>
           <th>Subtotal</th>
          <th>Fecha Fabricación</th>
          <th>Fecha Vencimiento</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objDetalle as $key): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $key->id?>"></td>
            
              <td><?php echo $key->id_fact ?></td>
            <td><?php echo $key->id_insumo ?></td>
            <td><?php echo $key-> cantidad ?></td>
            <td><?php echo $key->precio?></td>
              <td><?php echo $key->subtotal ?></td>
            <td><?php echo $key->fecha_fabricacion ?></td>
            <td><?php echo $key-> fecha_vencimiento ?></td>
            <td>
                <a href="<?php echo routing::getInstance()->getUrlWeb('detalleFacturaCompraInsumo', 'edit', array(detalleFacturaCompraInsumoTableClass::ID => $key->id)) ?>" class="btn btn-primary btn-xs">Editar</a>
               <a href="#" class="btn btn-sm btn-danger fa fa-trash-o" data-toggle="modal" data-target="#myModalDelete<?php echo $key->id ?>">eliminar</a>
            </td>
          </tr>
           <!-- WINDOWS MODAL DELETE -->
                        <div class="modal fade" id="myModalDelete<?php echo $key->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Confirmar Eliminar</h4>
                                    </div>
                                    <div class="modal-body">
                                        ¿Desea eliminar el registro?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-danger fa fa-eraser" onclick="eliminar(<?php echo $key->id ?>, '<?php echo detalleFacturaCompraInsumoBaseTableClass::getNameField(detalleFacturaCompraInsumoTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('detalleFacturaCompraInsumo', 'delete') ?>')">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
        <?php endforeach ?>
      </tbody>
    </table>
      
  </form>
    
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('detalleFacturaCompraInsumo', 'delete') ?>" method="POST">
      <input type="hidden" id="idDelete" name="<?php echo detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoTableClass::ID, true) ?>">
  </form>
</div>

