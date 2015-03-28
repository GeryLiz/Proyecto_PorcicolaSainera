<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<div class="container container-fluid">
    <div class="row">
        <div class="text-center col-lg-12">
           <?php echo i18n::__('module') ?>
        </div>
        
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-lg-2">
            <a class="btn btn-info btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('default', 'index') ?>"><?php echo i18n::__('user') ?></a>
        </div>
        <div class="col-lg-2">
            <a class="btn btn-info btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'indexVacunacion') ?>"><?php echo i18n::__('Vacunation') ?></a>
        </div>
    </div>
</div>