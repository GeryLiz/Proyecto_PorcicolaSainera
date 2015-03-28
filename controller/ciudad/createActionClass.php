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
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {
                
                $desc_ciudad = request::getInstance()->getPost(ciudadTableClass::getNameField(ciudadTableClass::DESCRIPCION, true));
                $id_departamento = request::getInstance()->getPost(ciudadTableClass::getNameField(ciudadTableClass::DEPARTAMENTO, true));
                
                
                $data = array(
                    ciudadTableClass::DESCRIPCION => $desc_ciudad,
                    ciudadTableClass::DEPARTAMENTO => $id_departamento
                );

                ciudadTableClass::insert($data);
                session::getInstance()->setSuccess("La ciudad fue insertada exitosamente");
                routing::getInstance()->redirect('ciudad', 'index');
            } else {
                session::getInstance()->setError("Se ha producido un error");
                routing::getInstance()->redirect('ciudad', 'index');
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo '<pre>';
            print_r($exc->getTrace());
            echo '</pre>';
        }
    }

}
