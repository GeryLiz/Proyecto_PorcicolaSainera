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
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            $fields = array(
                insumoTableClass::ID,
                insumoTableClass::DESCRIPCION,
                insumoTableClass::VALOR,
                insumoTableClass::LINEA,
                insumoTableClass::PRESENTACION
            );
            $orderBy = array(
                insumoTableClass::DESCRIPCION
            );
            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }

            $f = array(
                insumoTableClass::ID
            );
            $lines = config::getRowGrid();

            $this->cntPages = insumoTableClass::getAllCount($f, true, $lines);
            $this->page = request::getInstance()->getGet('page');
             
            $this->objInsumo = insumoTableClass::getAll($fields, true, $orderBy, 'ASC', config::getRowGrid()  , $page);

        
            $this->defineView('index', 'insumo', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo '<pre>';
            print_r($exc->getTrace());
            echo '</pre>';
        }
    }

}
