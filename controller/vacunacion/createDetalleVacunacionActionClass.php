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
class createDetalleVacunacionActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {


                $id_doc = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_DOC, true));
                $id_porcino = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_PORCINO, true));
                $id_insumo = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_INSUMO, true));
                $cantidad = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::CANTIDAD, true));


//                if (!is_numeric($id_porcino)) {
//                    throw new PDOException(i18n::__(10005, null, 'errors') . ' ' . 'en el campo Porcino');
//                }
//                if (!is_numeric($id_insumo)) {
//                    throw new PDOException(i18n::__(10005, null, 'errors') . ' ' . 'en el campo Insumo');
//                }
//                if ($cantidad == '' or !isset($cantidad) or $cantidad == null) {
//                    throw new PDOException(i18n::__(10004, null, 'errors'));
//                }
//                if (!is_numeric($cantidad)) {
//                    throw new PDOException(i18n::__(10005, null, 'errors') . ' ' . 'en el campo Cantidad');
//                }


                $data = array(
                    detalleVacunacionTableClass::ID_DOC => $id_doc,
                    detalleVacunacionTableClass::ID_PORCINO => $id_porcino,
                    detalleVacunacionTableClass::ID_INSUMO => $id_insumo,
                    detalleVacunacionTableClass::CANTIDAD => $cantidad
                );
//                print_r($data);
                detalleVacunacionTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('registerInsert'));
                log::register(i18n::__('create'), detalleVacunacionTableClass::getNameTable());
                routing::getInstance()->redirect('vacunacion', 'indexVacunacion');
            } else {
                session::getInstance()->setError('ola mundi');
                routing::getInstance()->redirect('vacunacion', 'indexVacunacion');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
