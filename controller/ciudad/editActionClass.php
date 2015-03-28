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
      if (request::getInstance()->hasRequest(ciudadTableClass::ID)) {
        $fields = array(
            ciudadTableClass::ID,
            ciudadTableClass::DESCRIPCION,
            ciudadTableClass::DEPARTAMENTO
        );
        $where = array(
            ciudadTableClass::ID => request::getInstance()->getRequest(ciudadTableClass::ID)
        );
        
        $fieldsDepto = array(
        departamentoTableClass::ID,
        departamentoTableClass::DESCRIPCION
        );
        
        $this->objDepto = departamentoTableClass::getAll($fieldsDepto, true);
        $this->objCiudad = ciudadTableClass::getAll($fields, true, null ,null, null, null, $where);
        $this->defineView('edit', 'ciudad', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('ciudad', 'index');
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

