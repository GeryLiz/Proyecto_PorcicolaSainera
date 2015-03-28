<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class insertActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            $fieldsFactura = array(
                facturaCompraInsumoTableClass::ID
            );
            $fieldsInsumo = array(
                insumoTableClass::ID,
                insumoTableClass::DESCRIPCION
            );

            $this->objFactura = facturaCompraInsumoTableClass::getAll($fieldsFactura,  true);
            $this->objInsumo = insumoTableClass::getAll($fieldsInsumo, true);
            $this->defineView('insert', 'detalleFacturaCompraInsumo', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo '<pre>';
            print_r($exc->getTrace());
            echo '</pre>';
        }
    }

}
