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

          $desc_departamento = request::getInstance()->getPost(departamentoTableClass::getNameField(departamentoTableClass::DESCRIPCION, true));

        $data = array(
            departamentoTableClass::DESCRIPCION => $desc_departamento 
        );
        print_r($data);

       departamentoTableClass::insert($data);
                routing::getInstance()->redirect('departamento', 'index');
      } else {
        routing::getInstance()->redirect('departamento', 'index');
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

