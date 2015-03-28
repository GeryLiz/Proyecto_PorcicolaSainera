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
class insertDetalleVacunacionActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            $fieldsPorcino = array(
                hojaDeVidaTableClass::ID
            );
            $fieldsInsumo = array(
                insumoTableClass::ID,
                insumoTableClass::DESCRIPCION
            );
            $fieldsVacuna = array(
                vacunacionTableClass::ID
            );

            $this->objPorcino = hojaDeVIdaTableClass::getAll($fieldsPorcino, true);
            $this->objInsumo = insumoTableClass::getAll($fieldsInsumo, true);
            $this->objVacuna = vacunacionTableClass::getAll($fieldsVacuna, true);
            $this->defineView('insert', 'detalleVacunacion', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
