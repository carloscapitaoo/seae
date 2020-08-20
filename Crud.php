<?php
include 'Conexao.php';
/**
 *
 */
class Crud extends Conexao {

    private $DB;
    
    private function preparaExecut($prep, $exec) {
//         var_dump($exec);die;
        $this->DB = $this->conexaoDB()->prepare($prep);
        $this->DB->execute($exec);
    }

    /**
     * @example $n = new Crud();
     * $n->adicionar("utilizador", "?,?,?,?", array(0, "Carlos", "carlos18mauro@gmail.com", "1234")) 
     * 
     * @param String $tabela
     * @param String $valores
     * @param array $exec
     * @return pdo
     */
    public function adicionar($tabela, $valores, $exec) {
//         var_dump($exec);die;
        $this->preparaExecut("insert into {$tabela} values ({$valores})", $exec);
        return $this->DB;
    }

    /**
     * 
     * @param type $campos
     * @param type $tabela
     * @param type $where
     * @param type $exec
     * @return type
     */
    public function listar($campos, $tabela, $where, $exec) {
        $this->preparaExecut("select {$campos} from {$tabela} {$where}", $exec);
        return $this->DB;
    }
    
    public function listarX($sql, $exec) {
        $this->preparaExecut($sql, $exec);
        return $this->DB;
    }

    public function actualizar($tabela, $dados, $condicao, $exec) {
        $this->preparaExecut("update {$tabela} set {$dados} where {$condicao}", $exec);
        return $this->DB;
    }

    public function apagar($tabela, $condicao, $exec) {
        $this->preparaExecut("delete from {$tabela} where {$condicao}", $exec);
        return $this->DB;        
    }

    public function __destruct() {
        
    }

}

