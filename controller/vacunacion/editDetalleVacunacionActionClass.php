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
class editDetalleVacunacionActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->hasRequest(detalleVacunacionTableClass::ID)) {
                $fields = array(
                    detalleVacunacionTableClass::ID,
                    detalleVacunacionTableClass::ID_DOC,
                    detalleVacunacionTableClass::ID_PORCINO,
                    detalleVacunacionTableClass::ID_INSUMO,
                    detalleVacunacionTableClass::CANTIDAD
                );
                $where = array(
                    detalleVacunacionTableClass::ID => request::getInstance()->getRequest(detalleVacunacionTableClass::ID)
                );

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
                $this->objDetalleVacunacion = detalleVacunacionTableClass::getAll($fields, true, null, null, null, null, $where);
                $this->defineView('edit', 'detalleVacunacion', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('vacunacion', 'indexDetalleVacunacion');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
