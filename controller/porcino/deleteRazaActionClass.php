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
class deleteRazaActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST') and request::getInstance()->isAjaxRequest() ) {

                $id = request::getInstance()->getPost(razaTableClass::getNameField(razaTableClass::ID, true));

                $ids = array(
                    razaTableClass::ID => $id
                );

                $this->arrayAjax = array(
                    'code' => 11,
                    'msg' => 'La eliminacion ha sido exitosa'
                );
                 

                razaTableClass::delete($ids, true);
                session::getInstance()->setSuccess("Registro ELiminado");
                log::register(i18n::__('delete'), razaTableClass::getNameTable());
                $this->defineView('delete', 'raza', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('porcino', 'indexRaza');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
