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
      if (request::getInstance()->hasRequest(montarTableClass::ID)) {
        $fields = array(
            montarTableClass::ID,
            montarTableClass::FECHA,
            montarTableClass::ID_FECUNDADOR,
            montarTableClass::ESTADO,
            montarTableClass::FERTILIZACION,
            montarTableClass::PORCINO,
            montarTableClass::RAZA
        );
        $where = array(
            montarTableClass::ID => request::getInstance()->getRequest(montarTableClass::ID)
        );
        $fieldsPorcino = array(
        hojaDeVidaTableClass::ID
        );
        $fieldsRaza = array(
        razaTableClass::ID,
        razaTableClass::DESCRIPCION
        );
                
        
        $this->objRaza = razaTableClass::getAll($fieldsRaza, true);
        $this->objPorcino = hojaDeVidaTableClass::getAll($fieldsPorcino, true);
        $this->objMontar = montarTableClass::getAll($fields, true, null ,null, null, null, $where);
        $this->defineView('edit', 'montar', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('montar', 'index');
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




