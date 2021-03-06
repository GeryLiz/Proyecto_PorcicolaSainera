<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\session\sessionClass as session;
use mvc\routing\routingClass as routing;
use mvc\request\requestClass as request;
use mvc\config\configClass as config;
use mvc\i18n\i18nClass as i18n;


class deleteFiltersVacunacionActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (session::getInstance()->hasAttribute('vacunacionFiltersAnimal')) {
                session::getInstance()->deleteAttribute('vacunacionFiltersAnimal');
            }
            routing::getInstance()->redirect('vacunacion', 'indexVacunacion');
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
