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

                $id = request::getInstance()->getPost(montarTableClass::getNameField(montarTableClass::ID, true));
                $fecha = request::getInstance()->getPost(montarTableClass::getNameField(montarTableClass::FECHA, true));
                $id_fecundador = request::getInstance()->getPost(montarTableClass::getNameField(montarTableClass::ID_FECUNDADOR, true));
                $estado = request::getInstance()->getPost(montarTableClass::getNameField(montarTableClass::ESTADO, true));
                $fecha_fertilizacion = request::getInstance()->getPost(montarTableClass::getNameField(montarTableClass::FERTILIZACION, true));
                $id_porcino = request::getInstance()->getPost(montarTableClass::getNameField(montarTableClass::PORCINO, true));
                $id_raza = request::getInstance()->getPost(montarTableClass::getNameField(montarTableClass::RAZA, true));



                $ids = array(
                    montarTableClass::ID => $id
                );
                $data = array(
                    montarTableClass::FECHA => $fecha,
                     montarTableClass::ID_FECUNDADOR => $id_fecundador,
                     montarTableClass::ESTADO => $estado,
                     montarTableClass::FERTILIZACION => $fecha_fertilizacion,
                     montarTableClass::PORCINO => $id_porcino,
                     montarTableClass::RAZA => $id_raza
                );


                montarTableClass::update($ids, $data);

//                departamentoTableClass::update($ids, $data);
            }

            routing::getInstance()->redirect('montar', 'index');
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo '<pre>';
            print_r($exc->getTrace());
            echo '</pre>';
        }
    }

}
