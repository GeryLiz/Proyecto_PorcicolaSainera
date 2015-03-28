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
class insertVacunacionActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            $fieldsUsuario = array(
            empleadoTableClass::ID,
            empleadoTableClass::NOMBRE
            );
            
            $this->objUsuario = empleadoTableClass::getAll($fieldsUsuario, true);
            $this->defineView('insert', 'vacunacion', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
