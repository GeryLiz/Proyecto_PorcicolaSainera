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
      if (request::getInstance()->hasRequest(insumoTableClass::ID)) {
        $fields = array(
            insumoTableClass::ID,
            insumoTableClass::DESCRIPCION,
            insumoTableClass::VALOR,
       
            insumoTableClass::LINEA,
            insumoTableClass::PRESENTACION,
            insumoTableClass::DELETED_AT
        );
        $where = array(
            insumoTableClass::ID => request::getInstance()->getRequest(insumoTableClass::ID)
        );
         
        $fieldsLinea = array (
        lineaTableClass::ID,
        lineaTableClass::DESCRIPCION
      );
        $fieldsPresentacion = array(
        presentacionTableClass::ID,
        presentacionTableClass::DESCRIPCION
        );
        
        $this->objPresentacion = presentacionTableClass::getAll($fieldsPresentacion, true);
        $this->objLinea = lineaTableClass::getAll($fieldsLinea, true);
        $this->objInsumo = insumoTableClass::getAll($fields, true, null ,null, null, null, $where);
        $this->defineView('edit', 'insumo', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('insumo', 'index');
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



