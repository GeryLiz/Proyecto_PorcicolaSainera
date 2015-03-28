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
      if (request::getInstance()->hasRequest(credencialTableClass::ID)) {
        $fields = array(
            datoUsuarioTableClass::ID,
            datoUsuarioTableClass::NOMBRE,
            datoUsuarioTableClass::APELLIDOS,
            datoUsuarioTableClass::TELEFONO,
            datoUsuarioTableClass::DIRECCION, 
            datoUsuarioTableClass::CEDULA
        );
        $where = array(
            datoUsuarioTableClass::ID => request::getInstance()->getRequest(datoUsuarioTableClass::ID)
        );
        
        $this->objDatoUsuario = datoUsuarioTableClass::getAll($fields, true, null ,null, null, null, $where);
        $this->defineView('edit', 'datoUsuario', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('datoUsuario', 'index');
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

