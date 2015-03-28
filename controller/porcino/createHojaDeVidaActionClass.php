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
class createHojaDeVidaActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {
                
                
                $edad_porcino = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::EDAD, true));
                $peso_porcino = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::PESO, true));
                $genero_porcino = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::GENERO, true));
                $cant_partos = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::PARTOS, true));
                $fecha_ingreso = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::INGRESO, true));
                $id_estado = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::ESTADO, true));
                $id_raza = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::RAZA, true));
                $id_modulo = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::MODULO, true));
                $usuario_id = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::USUARIO_ID, true));

                if(!isset($cant_partos) or $cant_partos == null or $cant_partos == '' ){
                 $cant_partos = 0;   
                }
                
                if($edad_porcino == '' or !isset($edad_porcino) or $edad_porcino == null){
                    throw new PDOException(i18n::__(10004, null, 'errors'));
                }
                if(!is_numeric($edad_porcino)){
                    throw new PDOException(i18n::__(10005, null, 'errors') . ' '. 'en el campo edad');
                }
                if($peso_porcino == '' or !isset($peso_porcino) or $peso_porcino == null){
                    throw new PDOException(i18n::__(10004, null, 'errors')); 
                }
                if(!is_numeric($peso_porcino)){
                    throw new PDOException(i18n::__(10005, null, 'errors') . ' '. 'en el campo peso');
                }
                if($genero_porcino == '' or !isset($genero_porcino) or $genero_porcino == null){
                    throw new PDOException(i18n::__(10004, null, 'errors')); 
                }
//                if($genero_porcino !== 'M' or $genero_porcino !== 'H'){
//                                        throw new PDOException(i18n::__(10003, null, 'errors')); 
//                }
                 if(!is_numeric($cant_partos)){
                    throw new PDOException(i18n::__(10005, null, 'errors') . ' '. 'en el campo cantidad de partos');
                }
                
                if($fecha_ingreso == '' or !isset($fecha_ingreso) or $fecha_ingreso == null){
                    throw new PDOException(i18n::__(10004, null, 'errors')); 
                }
                 if($id_estado== '' or !isset($id_estado) or $id_estado == null){
                    throw new PDOException(i18n::__(10004, null, 'errors')); 
                }
                
//                if($id_estado !== 'true' or $id_estado !== 'false'){
//                                        throw new PDOException(i18n::__(10003, null, 'errors')); 
//                }
                  if($id_raza== '' or !isset($id_raza) or $id_raza == null){
                    throw new PDOException(i18n::__(10004, null, 'errors')); 
                }
                  if(!is_numeric($id_raza)){
                    throw new PDOException(i18n::__(10005, null, 'errors') . ' '. 'en el campo id  raza');
                }
                   if($id_modulo== '' or !isset($id_modulo) or $id_modulo == null){
                    throw new PDOException(i18n::__(10004, null, 'errors')); 
                }
                  if(!is_numeric($id_modulo)){
                    throw new PDOException(i18n::__(10005, null, 'errors') . ' '. 'en el campo id  modulo');
                }
                      if($usuario_id== '' or !isset($usuario_id) or $usuario_id == null){
                    throw new PDOException(i18n::__(10004, null, 'errors')); 
                }
                  if(!is_numeric($usuario_id)){
                    throw new PDOException(i18n::__(10005, null, 'errors') . ' '. 'en el campo usuario');
                }
                
                $data = array(
                    hojaDeVidaTableClass::EDAD => $edad_porcino,
                    hojaDeVidaTableClass::PESO => $peso_porcino,
                    hojaDeVidaTableClass::GENERO => $genero_porcino,
                    hojaDeVidaTableClass::PARTOS => $cant_partos,
                    hojaDeVidaTableClass::INGRESO => $fecha_ingreso,
                    hojaDeVidaTableClass::ESTADO => $id_estado,
                    hojaDeVidaTableClass::RAZA => $id_raza,
                    hojaDeVidaTableClass::MODULO => $id_modulo,
                    hojaDeVidaTableClass::USUARIO_ID => $usuario_id
                );

                hojaDeVidaBaseTableClass::insert($data);
                session::getInstance()->setSuccess(i18n::__('registerInsert'));
                log::register(i18n::__('create'), hojaDeVidaTableClass::getNameTable());
                routing::getInstance()->redirect('porcino', 'indexHojaDeVida');
            } else {
                routing::getInstance()->redirect('porcino', 'indexHojaDeVida');
            }
        } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    
        }
    }

}
