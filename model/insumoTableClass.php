<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/**
 * Description of insumoTableClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class insumoTableClass extends insumoBaseTableClass {

    public static function getNameInsumo($id) {
        try {

            $sql = 'SELECT  ' . insumoTableClass::DESCRIPCION . ' AS descripcion '
                    . 'FROM ' . insumoTableClass::getNameTable() . ' '
                    . 'WHERE ' . insumoTableClass::DELETED_AT . ' IS NULL '
                    . 'AND ' . insumoTableClass::ID . ' = :id';

            $params = array(
                ':id' => $id
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return $answer[0]->descripcion;
        } catch (PDOException $exc) {
            throw $exc;
        }
    }

}
