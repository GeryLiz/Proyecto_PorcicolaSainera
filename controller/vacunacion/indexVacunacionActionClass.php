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
class indexVacunacionActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            
            $where = null;

            if (request::getInstance()->hasPost('filter')) {

                $filter = request::getInstance()->getPost('filter');



                if (isset($filter['id']) and $filter['id'] !== null and $filter['id'] !== '') {
                    $where[vacunacionTableClass::ID] = $filter['id'];
                }

                if (isset($filter['fecha']) and $filter['fecha'] !== null and $filter['fecha'] !== '') {
                    $where[vacunacionTableClass::FECHA] = $filter['fecha'];
                }

                if (isset($filter['empleado']) and $filter['empleado'] !== null and $filter['empleado'] !== '') {
                    $where[vacunacionTableClass::USUARIO_ID] = $filter['empleado'];
                }
                session::getInstance()->setAttribute('vacunacionFiltersAnimal', $where);
            } elseif (session::getInstance()->hasAttribute('vacunacionFiltersAnimal')) {
                $where = session::getInstance()->getAttribute('vacunacionFiltersAnimal');
            }

            $fieldsEmpleado = array(
                empleadoTableClass::ID,
                empleadoTableClass::NOMBRE
            );

            $fieldsPorcino = array(
                hojaDeVidaTableClass::ID
            );
            $fieldsInsumo = array(
                insumoTableClass::ID,
                insumoTableClass::DESCRIPCION
            );

            $fields = array(
                vacunacionTableClass::ID,
                vacunacionTableClass::FECHA,
                vacunacionTableClass::USUARIO_ID
            );

            $orderBy = array(
                vacunacionTableClass::ID
            );

            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }

            $f = array(
                vacunacionTableClass::ID
            );
            $lines = config::getRowGrid();


            $this->objEmpleado = empleadoTableClass::getAll($fieldsEmpleado, true);
            $this->cntPages = vacunacionTableClass::getAllCount($f, true, $lines, $where);
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
            }else{
                $this->page = $page;
            } 
            $this->objPorcino = hojaDeVIdaTableClass::getAll($fieldsPorcino, true);
            $this->objInsumo = insumoTableClass::getAll($fieldsInsumo, true);
            $this->objVacunacion = vacunacionTableClass::getAll($fields, true, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
            log::register(i18n::__('view'), vacunacionTableClass::getNameTable());
            $this->defineView('index', 'vacunacion', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
