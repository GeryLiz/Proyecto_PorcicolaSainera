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
class viewVacunacionActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->hasRequest(vacunacionTableClass::ID)) {
                $idVacunacion = request::getInstance()->getRequest(vacunacionTableClass::ID);

                $fieldsInsumo = array(
                    insumoTableClass::ID,
                    insumoTableClass::DESCRIPCION
                );

                $fields = array(
                    detalleVacunacionTableClass::ID,
                    detalleVacunacionTableClass::ID_DOC,
                    detalleVacunacionTableClass::CANTIDAD,
                    detalleVacunacionTableClass::ID_INSUMO,
                    detalleVacunacionTableClass::ID_PORCINO
                );
                $orderBy = array(
                    detalleVacunacionTableClass::ID
                );


                $where = array(
                    detalleVacunacionTableClass::ID_DOC => $idVacunacion
                );

                if (request::getInstance()->hasPost('filter')) {
                    $where = null;
                    $filter = request::getInstance()->getPost('filter');
                    
                    if (isset($filter['porcino']) and $filter['porcino'] !== null and $filter['porcino'] !== '') {
                        $where[detalleVacunacionTableClass::ID_PORCINO] = $filter['porcino'];
                    }
                    if (isset($filter['insumo']) and $filter['insumo'] !== null and $filter['insumo'] !== '') {
                        $where[detalleVacunacionTableClass::ID_INSUMO] = $filter['insumo'];
                    }

                    $where[detalleVacunacionTableClass::ID_DOC] = $idVacunacion;
                    
                    session::getInstance()->setAttribute('detalleVacunacionFiltersAnimal', $where);
                }elseif (session::getInstance()->hasAttribute('detalleVacunacionFiltersAnimal')) {
                $where = session::getInstance()->getAttribute('detalleVacunacionFiltersAnimal');
            }

                $fieldsVacunacion = array(
                    vacunacionTableClass::ID,
                    vacunacionTableClass::FECHA,
                    vacunacionTableClass::USUARIO_ID
                );
                $whereVacunacion = array(
                    vacunacionTableClass::ID => $idVacunacion
                );
                
                $fieldsPorcino = array(
                hojaDeVidaTableClass::ID 
                );

                $page = 0;
                if (request::getInstance()->hasGet('page')) {
                    $page = request::getInstance()->getGet('page') - 1;
                    $page = $page * config::getRowGrid();
                }

                $f = array(
                    detalleVacunacionTableClass::ID
                );

                $whereCnt = array(
                    detalleVacunacionTableClass::ID_DOC => $idVacunacion
                );
                $lines = config::getRowGrid();

                $this->objPorcino = hojaDeVidaTableClass::getAll($fieldsPorcino, true);
                $this->objInsumo = insumoTableClass::getAll($fieldsInsumo, true);
                $this->cntPages = detalleVacunacionTableClass::getAllCount($f, true, $lines, $whereCnt);
                $this->objVacunacion = vacunacionTableClass::getAll($fieldsVacunacion, true, null, null, null, null, $whereVacunacion);
                $this->objDetalleVacunacion = detalleVacunacionTableClass::getAll($fields, true, $orderBy, 'ASC', 10, $page, $where);
                $this->defineView('view', 'vacunacion', session::getInstance()->getFormatOutput());
            } else {
                session::getInstance()->setError('pailas');
                routing::getInstance()->redirect('vacunacion', 'indexVacunacion');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
