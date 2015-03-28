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

                $fecha = request::getInstance()->getPost(facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::FECHA, true));
                $iva = request::getInstance()->getPost(facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::IVA, true));
                $subtotal = request::getInstance()->getPost(facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::SUBTOTAL, true));
                $total = request::getInstance()->getPost(facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::TOTAL, true));
                $usuario_id = request::getInstance()->getPost(facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::USUARIO_ID, true));
                
                $data = array(
                    facturaCompraInsumoTableClass::FECHA => $fecha,
                    facturaCompraInsumoTableClass::IVA => $iva,
                    facturaCompraInsumoTableClass::SUBTOTAL => $subtotal,
                    facturaCompraInsumoTableClass::TOTAL => $total,
                    facturaCompraInsumoTableClass::USUARIO_ID => $usuario_id
                );

                facturaCompraInsumoTableClass::insert($data);
                routing::getInstance()->redirect('facturaCompraInsumo', 'index');
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
