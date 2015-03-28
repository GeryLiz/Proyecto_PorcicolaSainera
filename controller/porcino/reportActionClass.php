<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

class reportActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            
            $this->objHojaDeVida = hojaDeVidaTableClass::getAll($fields);
                    
            $this->defineView('index', 'hojaDeVida', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
           echo $exc->getMessage();
           echo '<br>';
           echo '<pre>';
           print_r($exc->getTrace());
           echo '</pre>';
        }
    }

}
