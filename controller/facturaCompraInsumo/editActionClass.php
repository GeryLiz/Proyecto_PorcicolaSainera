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
      if (request::getInstance()->hasRequest(facturaCompraInsumoTableClass::ID)) {
        $fields = array(
            facturaCompraInsumoTableClass::ID,
            facturaCompraInsumoTableClass::FECHA,
            facturaCompraInsumoTableClass::IVA,
            facturaCompraInsumoTableClass::SUBTOTAL,
            facturaCompraInsumoTableClass::TOTAL,
            facturaCompraInsumoTableClass::USUARIO_ID
        );
        $where = array(
            facturaCompraInsumoTableClass::ID => request::getInstance()->getRequest(facturaCompraInsumoTableClass::ID)
        );
        $fieldsUsuario = array (
        usuarioTableClass::ID,
        usuarioTableClass::USER
        );
        
         $this->objUsuario = usuarioTableClass::getAll($fieldsUsuario, true);
        $this->objFacturaCompraInsumo = facturaCompraInsumoTableClass::getAll($fields, true, null ,null, null, null, $where);
        $this->defineView('edit', 'facturaCompraInsumo', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('facturaCompraInsumo', 'index');
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

