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
class createRazaActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $desc_raza = request::getInstance()->getPost(razaTableClass::getNameField(razaTableClass::DESCRIPCION, true));

                if ($desc_raza == '' or ! isset($desc_raza) or $desc_raza == null) {
                    throw new PDOException(i18n::__(10004, null, 'errors'));
                }


                $data = array(
                    razaTableClass::DESCRIPCION => $desc_raza
                );

                razaTableClass::insert($data);
                session::getInstance()->setSuccess("Registro Insertado");
                log::register(i18n::__('create'), razaTableClass::getNameTable());
                routing::getInstance()->redirect('porcino', 'indexRaza');
            } else {
                routing::getInstance()->redirect('porcino', 'indexRaza');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
