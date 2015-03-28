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
class updateRazaActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $id = request::getInstance()->getPost(razaTableClass::getNameField(razaTableClass::ID, true));
                $desc_raza = request::getInstance()->getPost(razaTableClass::getNameField(razaTableClass::DESCRIPCION, true));

                $ids = array(
                    razaTableClass::ID => $id
                );
                
                 if($desc_raza == '' or !isset($desc_raza) or $desc_raza == null){
                    throw new PDOException(i18n::__(10004, null, 'errors'));
                }
              
                
                $data = array(
                    razaTableClass::DESCRIPCION => $desc_raza
                );


                razaTableClass::update($ids, $data);
                   session::getInstance()->setSuccess("Registro Actualizado");
                log::register(i18n::__('update'), razaTableClass::getNameTable());
                routing::getInstance()->redirect('porcino', 'indexRaza');

            }

            routing::getInstance()->redirect('porcino', 'indexRaza');
        } catch (PDOException $exc) {
           session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}

