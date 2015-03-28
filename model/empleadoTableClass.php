<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of datoUsuarioTableClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class empleadoTableClass extends empleadoBaseTableClass {

    public static function getNameEmpleado($id) {
        try {

            $sql = 'SELECT  ' . empleadoTableClass::NOMBRE . ' AS nombre '
                    . 'FROM ' . empleadoTableClass::getNameTable() . ' '
                    . 'WHERE ' . empleadoTableClass::DELETED_AT . ' IS NULL '
                    . 'AND ' . empleadoTableClass::ID . ' = :id';

            $params = array(
                ':id' => $id
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return $answer[0]->nombre;
        } catch (PDOException $exc) {
            throw $exc;
        }
    }

}
