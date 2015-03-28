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

          $desc_linea = request::getInstance()->getPost(lineaTableClass::getNameField(lineaTableClass::DESCRIPCION, true));


        $data = array(
           lineaTableClass::DESCRIPCION => $desc_linea
            
        );

        lineaTableClass::insert($data);
                routing::getInstance()->redirect('linea', 'index');
      } else {
        routing::getInstance()->redirect('linea', 'index');
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





