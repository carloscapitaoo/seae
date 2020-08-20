<?php


/**
 *
 */
class Conexao {

    protected function conexaoDB() {
        try {
            $con = new \PDO("mysql:host=localhost;dbname=seae", "root", "");
            return $con;
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}

?>
