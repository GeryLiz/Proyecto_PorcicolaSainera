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
class reportVacunacionActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
      
            $fields = array(
                vacunacionTableClass::ID,
                vacunacionTableClass::FECHA,
                vacunacionTableClass::USUARIO_ID
            );
            $this->mensaje = "Informe del Control de Vacunacion";
            $this->objVacunacion = vacunacionTableClass::getAll($fields, true, null, null, null, null);

            log::register(i18n::__('report'), vacunacionTableClass::getNameTable());
            $this->defineView('report', 'vacunacion', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
