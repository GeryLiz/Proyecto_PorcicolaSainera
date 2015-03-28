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
class indexHojaDeVidaActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $where = null;

            if (request::getInstance()->hasPost('filter')) {
                $filter = request::getInstance()->getPost('filter');
                
                if (isset($filter['edad']) and $filter['edad'] !== null and $filter['edad'] !== '') {
                    $where[hojaDeVidaTableClass::EDAD] = $filter['edad'];
                }
            }

            if (request::getInstance()->hasPost('filter')) {
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['peso']) and $filter['peso'] !== null and $filter['peso'] !== '') {
                    $where[hojaDeVidaTableClass::PESO] = $filter['peso'];
                }
            }

            if (request::getInstance()->hasPost('filter')) {
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['genero']) and $filter['genero'] !== null and $filter['genero'] !== '') {
                    $where[hojaDeVidaTableClass::GENERO] = $filter['genero'];
                }
            }

            if (request::getInstance()->hasPost('filter')) {
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['cant_partos']) and $filter['cant_partos'] !== null and $filter['cant_partos'] !== '') {
                    $where[hojaDeVidaTableClass::PARTOS] = $filter['cant_partos'];
                }
            }

            if (request::getInstance()->hasPost('filter')) {
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['fecha_ingreso']) and $filter['fecha_ingreso'] !== null and $filter['fecha_ingreso'] !== '') {
                    $where[hojaDeVidaTableClass::INGRESO] = $filter['fecha_ingreso'];
                }
            }

            if (request::getInstance()->hasPost('filter')) {
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['id_estado']) and $filter['id_estado'] !== null and $filter['id_estado'] !== '') {
                    $where[hojaDeVidaTableClass::ESTADO] = $filter['id_estado'];
                }
            }

            if (request::getInstance()->hasPost('filter')) {
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['id_raza']) and $filter['id_raza'] !== null and $filter['id_raza'] !== '') {
                    $where[hojaDeVidaTableClass::RAZA] = $filter['id_raza'];
                }
            }

            if (request::getInstance()->hasPost('filter')) {
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['id_modulo']) and $filter['id_modulo'] !== null and $filter['id_modulo'] !== '') {
                    $where[hojaDeVidaTableClass::MODULO] = $filter['id_modulo'];
                }
            }

            if (request::getInstance()->hasPost('filter')) {
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['usuario_id']) and $filter['usuario_id'] !== null and $filter['usuario_id'] !== '') {
                    $where[hojaDeVidaTableClass::USUARIO_ID] = $filter['usuario_id'];
                }
            session::getInstance()->setAttribute('defaultIndexFilters', $where);
            }else if (session::getInstance()->hasAttribute('defaultIndexFilters')) {
               $where = session::getInstance()->hasAttribute('defaultIndexFilters'); 
            }

           

            $fields = array(
                hojaDeVidaTableClass::ID,
                hojaDeVidaTableClass::EDAD,
                hojaDeVidaTableClass::PESO,
                hojaDeVidaTableClass::GENERO,
                hojaDeVidaTableClass::PARTOS,
                hojaDeVidaTableClass::INGRESO,
                hojaDeVidaTableClass::ESTADO,
                hojaDeVidaTableClass::RAZA,
                hojaDeVidaTableClass::MODULO,
                hojaDeVidaTableClass::USUARIO_ID
            );

            $orderBy = array(
                hojaDeVidaTableClass::ID
            );

            $fieldsRaza = array(
                razaTableClass::ID,
                razaTableClass::DESCRIPCION
            );
            $fieldsUsuario = array(
                usuarioTableClass::ID,
                usuarioTableClass::USER
            );
            $fieldsModulo = array(
                moduloTableClass::ID,
                moduloTableClass::DESCRIPCION
            );




            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }

            $f = array(
                hojaDeVidaTableClass::ID
            );
            $lines = config::getRowGrid();

            $this->cntPages = hojaDeVidaTableClass::getAllCount($f, true, $lines, $where);
            $this->page = request::getInstance()->getGet('page');
            $this->objModulo = moduloTableClass::getAll($fieldsModulo, true);
            $this->objUsuario = usuarioTableClass::getAll($fieldsUsuario, true);
            $this->objRaza = razaTableClass::getAll($fieldsRaza, true);
            $this->objHojaDeVida = hojaDeVidaTableClass::getAll($fields, true, $orderBy, 'ASC', config::getRowGrid(), $page, $where);

            $this->defineView('index', 'hojaDeVida', session::getInstance()->getFormatOutput());
       
            log::register(i18n::__('view'), hojaDeVidaTableClass::getNameTable());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
