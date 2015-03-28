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
                $id = request::getInstance()->getPost(gestacionTableClass::getNameField(gestacionTableClass::ID, true));
                $fecha = request::getInstance()->getPost(gestacionTableClass::getNameField(gestacionTableClass::FECHA, true));
                $fecha_fecundacion = request::getInstance()->getPost(gestacionTableClass::getNameField(gestacionTableClass::FECUNDACION, true));
                $id_porcino = request::getInstance()->getPost(gestacionTableClass::getNameField(gestacionTableClass::ID_PORCINO, true));
                $num_machos = request::getInstance()->getPost(gestacionTableClass::getNameField(gestacionTableClass::NUM_MACHOS, true));
                $num_hembras = request::getInstance()->getPost(gestacionTableClass::getNameField(gestacionTableClass::NUM_HEMBRAS, true));
                $num_vivos = request::getInstance()->getPost(gestacionTableClass::getNameField(gestacionTableClass::NUM_VIVOS, true));
                $num_muertos = request::getInstance()->getPost(gestacionTableClass::getNameField(gestacionTableClass::NUM_MUERTOS, true));
                $desc_responsable = request::getInstance()->getPost(gestacionTableClass::getNameField(gestacionTableClass::RESPONSABLE, true));
                $fecha_parto = request::getInstance()->getPost(gestacionTableClass::getNameField(gestacionTableClass::FECHA_PARTO, true));
                $usuario_id = request::getInstance()->getPost(gestacionTableClass::getNameField(gestacionTableClass::USUARIO_ID, true));



                $ids = array(
                    gestacionTableClass::ID => $id
                );
                $data = array(
                    gestacionTableClass::FECHA => $fecha,
                    gestacionTableClass::FECUNDACION => $fecha_fecundacion,
                    gestacionTableClass::ID_PORCINO => $id_porcino,
                    gestacionTableClass::NUM_MACHOS => $num_machos,
                    gestacionTableClass::NUM_HEMBRAS => $num_hembras,
                    gestacionTableClass::NUM_VIVOS => $num_vivos,
                    gestacionTableClass::NUM_MUERTOS => $num_muertos,
                    gestacionTableClass::RESPONSABLE => $desc_responsable,
                    gestacionTableClass::FECHA_PARTO => $fecha_parto,
                    gestacionTableClass::USUARIO_ID => $usuario_id
                );

                gestacionTableClass::update($ids, $data);
            }

            routing::getInstance()->redirect('gestacion', 'index');
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo '<pre>';
            print_r($exc->getTrace());
            echo '</pre>';
        }
    }

}
