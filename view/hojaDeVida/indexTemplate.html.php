<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\view\viewClass as view ?>
<?php use mvc\i18n\i18nClass as i18n ?>

<?php $nombreRaza = razaTableClass::DESCRIPCION ?>
<?php $idRaza = razaTableClass::ID ?>
<?php $nombreModulo = moduloTableClass::DESCRIPCION ?>
<?php $idModulo = moduloTableClass::ID ?>
<?php $nombreUsuario = usuarioTableClass::USER ?>
<?php $idUsuario = usuarioTableClass::ID ?>

<div class="container container-fluid">
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('porcino', 'deleteSelectHojaDeVida') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
        
        <a href="#" data-target="#myModalFilter" data-toggle="modal" class="btn btn-xs btn-default active">Filtro</a>
        <a href="<?php echo routing::getInstance()->getUrlWeb('porcino', 'insertHojaDeVida') ?>" class="btn btn-success btn-xs">Nuevo</a>
        <a href="#" data-target="#myModalEliminarMasivo" data-toggle="modal" class="btn btn-xs btn-default active">eliminar</a>
         <a href="<?php echo routing::getInstance()->getUrlWeb('porcino', 'deleteFilters') ?>" class="btn btn-default btn-xs">Eliminar Filtros</a>
         <a href="<?php echo routing::getInstance()->getUrlWeb('porcino', 'report')?>" class="btn btn-info btn-xs" >Reporte</a>
    </div>
      <?php echo view:: includeHandlerMessage() ?>
    <table class="table table-bordered table-responsive">
      <thead>
          <tr class="active">
          <th><input type="checkbox" id="chkAll"></th>
          <th>Id</th>
          <th>Edad</th>
          <th>Peso</th>
          <th>Genero</th>
          <th>Cantidad de Partos</th>
          <th>Fecha Ingreso</th>
          <th>Estado</th>
          <th>Raza</th>
          <th>Modulo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objHojaDeVida as $key): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
            <td><?php echo $key->id ?></td>
            <td><?php echo $key-> edad_porcino ?></td>
          <td><?php echo $key->peso_porcino ?></td>
            <td><?php echo $key-> genero_porcino ?></td>
            <td><?php echo $key->cant_partos ?></td>
            <td><?php echo $key-> fecha_ingreso ?></td>
               <td><?php echo $key-> id_estado ?></td>
             <td><?php echo $key->id_raza ?></td>
            <td><?php echo $key-> id_modulo ?></td>
            <td>
                <a href="<?php echo routing::getInstance()->getUrlWeb('porcino', 'editHojaDeVida', array(hojaDeVidaTableClass::ID => $key->id)) ?>" class="btn btn-primary btn-xs">Editar</a>
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
                                        <button type="button" class="btn btn-danger fa fa-eraser" onclick="eliminar(<?php echo $key->id ?>, '<?php echo hojaDeVidaBaseTableClass::getNameField(hojaDeVidaTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('porcino', 'deleteHojaDeVida') ?>')">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
        <?php endforeach ?>
      </tbody>
    </table>
      
  </form>
    <div class="text-right">
        <nav>
            <ul class="pagination" id="slqPaginador">
                <li class='<?php echo (($page == 1 or $page == 0) ? "disabled" : "active" ) ?>' id="anterior"><a href="#" aria-label="Previous"onclick="paginador(1, '<?php echo routing::getInstance()->getUrlWeb('porcino', 'indexHojaDeVida') ?>')"><span aria-hidden="true">&Ll;</span></a></li>
                <?php for ($x = 1; $x <= $cntPages; $x++): ?>
                    <li class='<?php echo (($page == $x) ? "disabled" : "active" ) ?>' onclick="paginador(<?php echo $x ?>, '<?php echo routing::getInstance()->getUrlWeb('porcino', 'indexHojaDeVida') ?>')"><a href="#"><?php echo $x ?> <span class="sr-only">(current)</span></a></li>
                    <?php $count ++ ?>        
                <?php endfor ?>
                <li class='<?php echo (($page == $count) ? "disabled" : "active" ) ?>' onclick="paginador(<?php echo $count ?>, '<?php echo routing::getInstance()->getUrlWeb('porcino', 'indexHojaDeVida') ?>')" id="anterior"><a href="#" aria-label="Previous"><span aria-hidden="true">&Gg;</span></a></li>
            </ul>
        </nav>
    </div> 
</div>

          <!-- WINDOWS MODAL FILTER -->
<div class="modal fade" id="myModalFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Filtrar Por:</h4>
      </div>
      <div class="modal-body">
          <form id="filterForm" class="form-horizontal" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('porcino' , 'indexHojaDeVida') ?>">
              <table class="table">
            <tr>
                <th>
                    <?php echo i18n::__('age', null, 'hojaDeVida') ?>:
                </th>
                <th>
                         <input  type="number" name="filter[edad]">
                </th>
            </tr>
            <tr>
                <th>
                    <?php echo i18n::__('weight', null, 'hojaDeVida') ?>:
                </th>
                <th>
                         <input  type="number" name="filter[peso]">
                </th>
            </tr>
            <tr>
                <th>
                    <?php echo i18n::__('gender', null, 'hojaDeVida') ?>:
                </th>
                <th>
                    <select name="filter[genero]">
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
                    
                    <input type="number" name="filter[cant_partos]">
                        
                        </th>
            </tr>
            <tr>
                <th>
                    <?php echo i18n::__('date_entry', null, 'hojaDeVida') ?>:
                </th>
                <th>
                    <input type="date" name="filter[fecha_ingreso]">
                </th>
            </tr>
            <tr>
                <th>
                   <?php echo i18n::__('state', null, 'montar') ?>: 
                </th>
                <th>
                 <select  name="filter[id_estado]">
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
                    <select name="filter[id_raza]">
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
                     <select name="filter[id_modulo]">
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
                    <select name="filter[usuario_id]">
        <?php foreach ($objUsuario as $key): ?>
            <option value="<?php echo $key->$idUsuario ?>">
                <?php echo $key->$nombreUsuario ?>
            </option>
        <?php endforeach; ?>
    </select>
                </th>
            </tr>
        </table>
        
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="$('#filterForm').submit()">Buscar</button>
      </div>
    </div>
  </div>
</div>


<!-- WINDOWS MODAL DELETE MASIVE -->
<div class="modal fade" id="myModalEliminarMasivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('deleteMasive') ?></h4>
            </div>
            <div class="modal-body">
                <?php echo i18n::__('confirmDeleteMasive') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" onclick="$('#frmDeleteAll').submit()">Confirmar</button>
            </div>
        </div>
    </div>
</div>