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
            if (request::getInstance()->hasRequest(gestacionTableClass::ID)) {
                $fields = array(
                    gestacionTableClass::ID,
                    gestacionTableClass::FECHA,
                    gestacionTableClass::FECUNDACION,
                    gestacionTableClass::ID_PORCINO,
                    gestacionTableClass::NUM_MACHOS,
                    gestacionTableClass::NUM_HEMBRAS,
                    gestacionTableClass::NUM_VIVOS,
                    gestacionTableClass::NUM_MUERTOS,
                    gestacionTableClass::RESPONSABLE,
                    gestacionTableClass::FECHA_PARTO,
                    gestacionTableClass::USUARIO_ID
                );
                $where = array(
                    gestacionTableClass::ID => request::getInstance()->getRequest(gestacionTableClass::ID)
                );

                $fieldsPorcino = array(
                hojaDeVidaTableClass::ID
                );
                $fieldsUsuario = array (
                usuarioTableClass::ID,
                usuarioTableClass::USER
                );
                
                $this->objPorcino = hojaDeVidaTableClass::getAll($fieldsPorcino, true);
                $this->objUsuario = usuarioTableClass::getAll($fieldsUsuario, true);
                $this->objGestacion = gestacionTableClass::getAll($fields, true, null, null, null, null, $where);
                $this->defineView('edit', 'gestacion', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('gestacion', 'index');
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
