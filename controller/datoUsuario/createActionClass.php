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
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

          $nombre = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true));
          $apellidos = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDOS, true));
          $telefono = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TELEFONO, true));
          $direccion = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::DIRECCION, true));
          $cedula = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CEDULA, true));
         
         

        $data = array(
            datoUsuarioTableClass::NOMBRE => $nombre,  
            datoUsuarioTableClass::APELLIDOS => $apellidos, 
            datoUsuarioTableClass::TELEFONO => $telefono, 
            datoUsuarioTableClass::DIRECCION => $direccion, 
            datoUsuarioTableClass::CEDULA => $cedula 
          
        );

        datoUsuarioTableClass::insert($data);
                routing::getInstance()->redirect('datoUsuario', 'index');
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



