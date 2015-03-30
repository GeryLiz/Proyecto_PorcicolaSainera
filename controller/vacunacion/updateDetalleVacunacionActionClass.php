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

                $id = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID, true));
                $id_doc = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_DOC, true));
                $id_porcino = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_PORCINO, true));
                $id_insumo = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_INSUMO, true));
                $cantidad = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::CANTIDAD, true));
                $PATH_INFO = request::getInstance()->getPost('PATH_INFO');

                $ids = array(
                    detalleVacunacionTableClass::ID => $id
                );
//                 if (!is_numeric($id_porcino)) {
//                    throw new PDOException(i18n::__(10005, null, 'errors') . ' ' . 'en el campo Porcino');
//                }
//                 if (!is_numeric($id_insumo)) {
//                    throw new PDOException(i18n::__(10005, null, 'errors') . ' ' . 'en el campo Insumo');
//                }
//                 if($cantidad == '' or !isset($cantidad) or $cantidad == null){
//                    throw new PDOException(i18n::__(10004, null, 'errors')); 
//                }
//                 if (!is_numeric($cantidad)) {
//                    throw new PDOException(i18n::__(10005, null, 'errors') . ' ' . 'en el campo Cantidad');
//                }
                $data = array(
                    detalleVacunacionTableClass::ID_PORCINO => $id_porcino,
                    detalleVacunacionTableClass::CANTIDAD => $cantidad,
                    detalleVacunacionTableClass::ID_INSUMO => $id_insumo
                );

                detalleVacunacionTableClass::update($ids, $data);
                session::getInstance()->setSuccess(i18n::__('registerUpdate'));
                log::register(i18n::__('update'), detalleVacunacionTableClass::getNameTable());
                routing::getInstance()->getUrlWeb('vacunacion', 'indexVacunacion', array('id' => $id_doc));
            }

            $dir = config::getUrlBase() . config::getIndexFile() . $PATH_INFO . '?' . 'id' . '=' . $id_doc;
            header('location: ' . $dir);
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
