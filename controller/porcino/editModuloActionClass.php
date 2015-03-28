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
class editModuloActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasRequest(moduloTableClass::ID)) {
        $fields = array(
            moduloTableClass::ID,
            moduloTableClass::DESCRIPCION,
            moduloTableClass::UBICACION,
            moduloTableClass::TAMAÑO
        );
        $where = array(
            moduloTableClass::ID => request::getInstance()->getRequest(moduloTableClass::ID)
        );
        
        $this->objModulo = moduloTableClass::getAll($fields, true, null ,null, null, null, $where);
        $this->defineView('edit', 'modulo', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('modulo', 'index');
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


