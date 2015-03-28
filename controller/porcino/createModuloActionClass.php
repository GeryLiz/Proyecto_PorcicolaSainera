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
class createModuloActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $desc_modulo = request::getInstance()->getPost(moduloTableClass::getNameField(moduloTableClass::DESCRIPCION, true));
                $ubic_modulo = request::getInstance()->getPost(moduloTableClass::getNameField(moduloTableClass::UBICACION, true));
                $tamaño_modulo = request::getInstance()->getPost(moduloTableClass::getNameField(moduloTableClass::TAMAÑO, true));

                  if($desc_modulo == '' or !isset($desc_modulo) or $desc_modulo == null){
                    throw new PDOException(i18n::__(10004, null, 'errors'));
                }
              
                if($ubic_modulo == '' or !isset($ubic_modulo) or $ubic_modulo == null){
                    throw new PDOException(i18n::__(10004, null, 'errors')); 
                }
              
                if($tamaño_modulo == '' or !isset($tamaño_modulo) or $tamaño_modulo == null){
                    throw new PDOException(i18n::__(10004, null, 'errors')); 
                }
                 
                
                $data = array(
                    moduloTableClass::DESCRIPCION => $desc_modulo,
                    moduloTableClass::UBICACION => $ubic_modulo,
                    moduloTableClass::TAMAÑO => $tamaño_modulo
                );

                moduloTableClass::insert($data);
                session::getInstance()->setSuccess("Registro Insertado");
                log::register(i18n::__('create'), moduloTableClass::getNameTable());
                routing::getInstance()->redirect('porcino', 'indexModulo');
            } else {
                routing::getInstance()->redirect('porcino', 'indexModulo');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
