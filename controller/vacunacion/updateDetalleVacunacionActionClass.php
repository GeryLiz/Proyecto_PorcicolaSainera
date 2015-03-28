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
class updateDetalleVacunacionActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

//        $id = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::ID, true));
//        $usuario = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true));
//        $password = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true));
                $id = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID, true));
                $id_doc = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_DOC, true));
                $id_porcino = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_PORCINO, true));
                $id_insumo = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_INSUMO, true));
                $cantidad = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::CANTIDAD, true));

                $ids = array(
                    detalleVacunacionTableClass::ID => $id
                );
                $data = array(
                    detalleVacunacionTableClass::ID_DOC => $id_doc,
                    ciudadTableClass::DEPARTAMENTO => $id_departamento
                );

                detalleVacunacionTableClass::update($ids, $data);
                session::getInstance()->setSuccess(i18n::__('registerUpdate'));
                log::register(i18n::__('update'), detalleVacunacionTableClass::getNameTable());
            }

            routing::getInstance()->redirect('vacunacion', 'indexDetalleVacunacion');
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
