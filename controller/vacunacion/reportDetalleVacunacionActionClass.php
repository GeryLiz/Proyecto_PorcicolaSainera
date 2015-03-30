<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class reportDetalleVacunacionActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
//            $where = null;
////            $idVacunacion = request::getInstance()->getRequest(vacunacionTableClass::ID);
            $idVacunacion = 2;
            if (request::getInstance()->hasRequest('report')) {
                $report = request::getInstance()->getPost('report');

                if (isset($report['porcino']) and $report['porcino'] !== null and $report['porcino'] !== '') {
                    $where[detalleVacunacionTableClass::ID_PORCINO] = $report['porcino'];
                }

                if (isset($report['insumo']) and $report['insumo'] !== null and $report['insumo'] !== '') {
                    $where[detalleVacunacionTableClass::ID_INSUMO] = $report['insumo'];
                }
            }

        

            $fields = array(
                detalleVacunacionTableClass::ID,
                detalleVacunacionTableClass::ID_DOC,
                detalleVacunacionTableClass::ID_INSUMO,
                detalleVacunacionTableClass::ID_PORCINO,
                detalleVacunacionTableClass::CANTIDAD
            );


            $fieldsVacunacion= array(
            vacunacionTableClass::ID,
            vacunacionTableClass::FECHA,
            vacunacionTableClass::USUARIO_ID
            );

            $whereVacunacion = array(
            vacunacionTableClass::ID => $idVacunacion
            );
           
            $this->objVacunacion = vacunacionTableClass::getAll($fieldsVacunacion, true, null, null, null, null, $whereVacunacion);
            $this->mensajeDetalle = "Informe de Detalles del Control de Vacunacion";
            $this->objDetalleVacunacion = detalleVacunacionTableClass::getAll($fields, true, null, null, null, null, $where);
            request::getInstance()->getRequest('id');
            log::register(i18n::__('report'), detalleVacunacionTableClass::getNameTable());
//            $this->defineView('reportDetalle', 'vacunacion', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
