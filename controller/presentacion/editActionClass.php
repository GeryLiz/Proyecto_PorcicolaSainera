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
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasRequest(presentacionTableClass::ID)) {
        $fields = array(
            presentacionTableClass::ID,
            presentacionTableClass::DESCRIPCION
            
        );
        $where = array(
            presentacionTableClass::ID => request::getInstance()->getRequest(presentacionTableClass::ID)
        );
        
        $this->objPresentacion = presentacionTableClass::getAll($fields, true, null ,null, null, null, $where);
        $this->defineView('edit', 'presentacion', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('presentacion', 'index');
      }
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}


