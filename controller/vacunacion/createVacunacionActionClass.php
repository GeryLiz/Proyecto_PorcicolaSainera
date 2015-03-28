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
class createVacunacionActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $fecha = request::getInstance()->getPost(vacunacionTableClass::getNameField(vacunacionTableClass::FECHA, true));
                $usuario_id = request::getInstance()->getPost(vacunacionTableClass::getNameField(vacunacionTableClass::USUARIO_ID, true));




                $data = array(
                    vacunacionTableClass::FECHA => $fecha,
                    vacunacionTableClass::USUARIO_ID => $usuario_id
                );

                vacunacionTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('registerInsert'));
                log::register(i18n::__('create'), vacunacionTableClass::getNameTable());
                routing::getInstance()->redirect('vacunacion', 'indexVacunacion');
            } else {
                routing::getInstance()->redirect('vacunacion', 'indexVacunacion');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
