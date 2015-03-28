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
class editVacunacionActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->hasRequest(vacunacionTableClass::ID)) {
                $fields = array(
                    vacunacionTableClass::ID,
                    vacunacionTableClass::FECHA,
                    vacunacionTableClass::USUARIO_ID
                );
                $where = array(
                    vacunacionTableClass::ID => request::getInstance()->getRequest(vacunacionTableClass::ID)
                );

                $fieldsUsuario = array(
                empleadoTableClass::ID,
                empleadoTableClass::NOMBRE
                );

                $this->objUsuario = empleadoTableClass::getAll($fieldsUsuario, true);
                $this->objVacunacion = vacunacionTableClass::getAll($fields, true, null, null, null, null, $where);
                $this->defineView('edit', 'vacunacion', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('vacunacion', 'indexVacunacion');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
