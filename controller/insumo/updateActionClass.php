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
                $id = request::getInstance()->getPost(insumoTableClass::getNameField(insumoTableClass::ID, true));
                $desc_insumo  = request::getInstance()->getPost(insumoTableClass::getNameField(insumoTableClass::DESCRIPCION, true));
                $valor_insumo = request::getInstance()->getPost(insumoTableClass::getNameField(insumoTableClass::VALOR, true));
               
                $id_linea  = request::getInstance()->getPost(insumoTableClass::getNameField(insumoTableClass::LINEA, true));
                $id_presentacion = request::getInstance()->getPost(insumoTableClass::getNameField(insumoTableClass::PRESENTACION, true));
               


                $ids = array(
                    insumoTableClass::ID => $id
                );
                $data = array(
                    insumoTableClass::DESCRIPCION => $desc_insumo,
                     insumoTableClass::VALOR => $valor_insumo,
                     
                     insumoTableClass::LINEA => $id_linea,
                     insumoTableClass::PRESENTACION => $id_presentacion
                );
                insumoTableClass::update($ids, $data);
            }

            routing::getInstance()->redirect('insumo', 'index');
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo '<pre>';
            print_r($exc->getTrace());
            echo '</pre>';
        }
    }

}



