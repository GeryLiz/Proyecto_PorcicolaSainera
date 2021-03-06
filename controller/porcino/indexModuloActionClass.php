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
class indexModuloActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            $where=null;
            
              if(request::getInstance()->hasPost('filter')){
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['name']) and $filter['name'] !== null and $filter['name'] !== ''){
                    $where[moduloTableClass::DESCRIPCION] = $filter['name'];
                }
            }
            
               if(request::getInstance()->hasPost('filter')){
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['location']) and $filter['location'] !== null and $filter['location'] !== ''){
                    $where[moduloTableClass::UBICACION] = $filter['location'];
                }
            }
            
               if(request::getInstance()->hasPost('filter')){
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['size']) and $filter['size'] !== null and $filter['size'] !== ''){
                    $where[moduloTableClass::TAMAÑO] = $filter['size'];
                }
            }
            
            $fields = array(
                moduloTableClass::ID,
                moduloTableClass::DESCRIPCION,
                moduloTableClass::UBICACION,
                moduloTableClass::TAMAÑO
            );

                  $orderBy = array(
                  moduloTableClass::DESCRIPCION
      );
            
            
            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }

            $f = array(
                moduloTableClass::ID
            );
            $lines = config::getRowGrid();

            $this->cntPages = usuarioTableClass::getAllCount($f, true, $lines);
            $this->page = request::getInstance()->getGet('page');
             
            $this->objModulo = moduloTableClass::getAll($fields, true, $orderBy, 'ASC', config::getRowGrid()  , $page, $where);
             session::getInstance()->setSuccess("Registro Visualizado");
            log::register(i18n::__('view'), moduloTableClass::getNameTable());
            $this->defineView('index', 'modulo', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
