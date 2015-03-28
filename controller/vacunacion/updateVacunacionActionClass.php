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
class updateVacunacionActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $id = request::getInstance()->getPost(vacunacionTableClass::getNameField(vacunacionTableClass::ID, true));
                $fecha = request::getInstance()->getPost(vacunacionTableClass::getNameField(vacunacionTableClass::FECHA, true));
                $usuario_id = request::getInstance()->getPost(vacunacionTableClass::getNameField(vacunacionTableClass::USUARIO_ID, true));




                $ids = array(
                    vacunacionTableClass::ID => $id
                );
                $data = array(
                    vacunacionTableClass::FECHA => $fecha,
                    vacunacionTableClass::USUARIO_ID => $usuario_id
                );
                vacunacionTableClass::update($ids, $data);

                session::getInstance()->setSuccess(i18n::__('registerUpdate'));
                log::register(i18n::__('update'), vacunacionTableClass::getNameTable());
                routing::getInstance()->redirect('vacunacion', 'indexVacunacion');
            }

            routing::getInstance()->redirect('vacunacion', 'index');
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
