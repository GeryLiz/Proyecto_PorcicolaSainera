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
class editRazaActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try { 
      if (request::getInstance()->hasRequest(razaTableClass::ID)) {
        $fields = array(
            razaTableClass::ID,
            razaTableClass::DESCRIPCION
        );
        $where = array(
            razaTableClass::ID => request::getInstance()->getRequest(razaTableClass::ID)
        );
        
        $this->objRaza = razaTableClass::getAll($fields, true, null ,null, null, null, $where);
        $this->defineView('edit', 'raza', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('porcino', 'indexRaza');
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



