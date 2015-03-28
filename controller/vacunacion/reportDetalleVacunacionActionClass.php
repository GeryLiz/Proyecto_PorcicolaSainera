<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class reportDetalleVacunacionActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
             
            $fields = array(
            detalleVacunacionTableClass::ID,
            detalleVacunacionTableClass::ID_DOC,
            detalleVacunacionTableClass::ID_INSUMO,
            detalleVacunacionTableClass::ID_PORCINO,
            detalleVacunacionTableClass::CANTIDAD
            );
            $this->mensajeDetalle = "Informe de Detalles del Control de Vacunacion";
            $this->objDetalleVacunacion = detalleVacunacionTableClass::getAll($fields, true);
        
                log::register(i18n::__('report'), detalleVacunacionTableClass::getNameTable());
            $this->defineView('reportDetalle', 'vacunacion', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
