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
      if (request::getInstance()->hasRequest(bodegaTableClass::ID)) {
        $fields = array(
            bodegaTableClass::ID,
            bodegaTableClass::DESCRIPCION
            
        );
        $where = array(
            bodegaTableClass::ID => request::getInstance()->getRequest(bodegaTableClass::ID)
        );
        
        $this->objBodega = bodegaTableClass::getAll($fields, false, null ,null, null, null, $where);
        $this->defineView('edit', 'bodega', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('bodega', 'index');
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


