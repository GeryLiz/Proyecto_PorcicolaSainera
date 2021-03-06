   <?php use mvc\routing\routingClass as routing ?>

<div class="container container-fluid">
  <form id="frmBitacora" action="<?php echo routing::getInstance()->getUrlWeb('bitacora', 'index') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
  
    </div>
      
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th><input type="checkbox" id="chkAll"></th>
        <th> <?php echo i18n::__('N°', null, 'vacunacion') ?></th>
          <th><?php echo i18n::__('user') ?></th>
           <th><?php echo i18n::__('N°', null, 'vacunacion') ?></th>
          <th><?php echo i18n::__('action') ?></th>
           <th><?php echo i18n::__('date', null, 'vacunacion') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objBitacora as $key): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
    
            <td><?php echo $key-> usuario_id ?></td>
          <td><?php echo $key-> accion ?></td>
          <td><?php echo $key-> tabla ?></td>
          <td><?php echo $key-> fecha ?></td>
          
          </tr>
<?php endforeach ?>
      </tbody>
    </table>
      
  </form>
</div>






<!--Paginador-->

<div class="text-right">
        <nav>
            <ul class="pagination" id="slqPaginador">
                <li class='<?php echo (($page == 1 or $page == 0) ? "disabled" : "active" ) ?>' id="anterior"><a href="#" aria-label="Previous"onclick="paginador(1, '<?php echo routing::getInstance()->getUrlWeb('bitacora', 'index') ?>')"><span aria-hidden="true">&Ll;</span></a></li>
                <?php for ($x = 1; $x <= $cntPages; $x++): ?>
                    <li class='<?php echo (($page == $x) ? "disabled" : "active" ) ?>' onclick="paginador(<?php echo $x ?>, '<?php echo routing::getInstance()->getUrlWeb('bitacora', 'index') ?>')"><a href="#"><?php echo $x ?> <span class="sr-only">(current)</span></a></li>
                    <?php $count ++ ?>        
                <?php endfor ?>
                <li class='<?php echo (($page == $count) ? "disabled" : "active" ) ?>' onclick="paginador(<?php echo $count ?>, '<?php echo routing::getInstance()->getUrlWeb('bitacora', 'index') ?>')" id="anterior"><a href="#" aria-label="Previous"><span aria-hidden="true">&Gg;</span></a></li>
            </ul>
        </nav>
    </div> 
