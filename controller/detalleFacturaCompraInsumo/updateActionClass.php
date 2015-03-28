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
class updateActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

//        $id = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::ID, true));
//        $usuario = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true));
//        $password = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true));
                $id_fact = request::getInstance()->getPost(detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoTableClass::ID_FACT, true));
                $id_insumo = request::getInstance()->getPost(detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoTableClass::ID_INSUMO, true));
                $cantidad = request::getInstance()->getPost(detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoTableClass::CANTIDAD, true));
                $precio = request::getInstance()->getPost(detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoTableClass::PRECIO, true));
                $subtotal = request::getInstance()->getPost(detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoTableClass::SUBTOTAL, true));
                $fecha_fabricacion = request::getInstance()->getPost(detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoTableClass::FABRICACION, true));
                $fecha_vencimiento = request::getInstance()->getPost(detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoTableClass::VENCIMIENTO, true));

                $ids = array(
                    detalleFacturaCompraInsumoTableClass::ID
                );
                $data = array(
                    detalleFacturaCompraInsumoTableClass::ID_FACT => $id_fact,
                    detalleFacturaCompraInsumoTableClass::ID_INSUMO => $id_insumo,
                    detalleFacturaCompraInsumoTableClass::CANTIDAD => $cantidad,
                    detalleFacturaCompraInsumoTableClass::PRECIO => $precio,
                    detalleFacturaCompraInsumoTableClass::ID => $subtotal,
                    detalleFacturaCompraInsumoTableClass::CANTIDAD => $fecha_fabricacion,
                    detalleFacturaCompraInsumoTableClass::PRECIO => $fecha_vencimiento
                );

                detalleFacturaCompraInsumoTableClass::update($ids, $data);
            }

            routing::getInstance()->redirect('detalleFacturaCompraInsumo', 'index');
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo '<pre>';
            print_r($exc->getTrace());
            echo '</pre>';
        }
    }

}
