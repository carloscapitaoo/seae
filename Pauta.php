<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pauta
 *
 * @author lito
 */
class Pauta {

    //put your code here
    private $banco;
    private $MAC1, $CPP1, $MAC2, $CPP2, $MAC3, $CPP3, $CE;

    public function __construct($MAC1 = NULL, $CPP1 = NULL, $MAC2 = NULL, $CPP2 = NULL, $MAC3 = NULL, $CPP3 = NULL, $CE = NULL) {
        $this->banco = new Crud();
        $this->setMAC1($MAC1);
        $this->setMAC2($MAC2);
        $this->setMAC3($MAC3);

        $this->setCPP1($CPP1);
        $this->setCPP2($CPP2);
        $this->setCPP3($CPP3);

        $this->setCE($CE);
    }

    public function salvar($curso, $disciplina, $aluno) {
        $this->banco->adicionar("pauta", "?, ?, ?, ?, ?, ?, ?, ?, ?, ?", array($curso, $disciplina, $aluno, $this->getMAC1(), $this->getCPP1(), $this->getMAC2(), $this->getCPP2(), $this->getMAC3(), $this->getCPP3(), $this->getCE()));
    }

    public function pauta() {
        $disciplina = $_SESSION['disciplina'];
        $curso = $_SESSION['curso'];
        return $this->banco->listar("pessoa.id, nome, MAC1, CPP1, MAC2, CPP2, MAC3, CPP3, CE", "pauta, aluno, pessoa", "WHERE aluno.id IN (SELECT pauta.id_aluno FROM pauta)  "
                        . "AND pauta.curso = aluno.curso AND aluno.id=pauta.id_aluno "
                        . "AND pessoa.id=aluno.id "
                        . "AND pauta.disciplina LIKE ? AND pauta.curso LIKE ?", array($disciplina, $curso))->fetchAll(\PDO::FETCH_OBJ);
    }

    public function inscritosFisca() {
        $sql = "SELECT COUNT(*) FROM aluno WHERE aluno.curso LIKE '%Biologicas%'";
        $con = $this->banco->listarX($sql, array());
        return $con->fetchAll(\PDO::FETCH_ASSOC)[0]["COUNT(*)"];
    }

    public function inscritosInfo() {
        $sql = "SELECT COUNT(*) FROM aluno WHERE curso LIKE '%Info%'";
        $con = $this->banco->listarX($sql, array());
        return $con->fetchAll(\PDO::FETCH_ASSOC)[0]["COUNT(*)"];
    }

    public function inscritosEconomia() {
        $sql = "SELECT COUNT(*) FROM aluno WHERE aluno.curso LIKE '%Economicas%'";
        $con = $this->banco->listarX($sql, array());
        return $con->fetchAll(\PDO::FETCH_ASSOC)[0]["COUNT(*)"];
    }

    public function getBanco() {
        return $this->banco;
    }

    public function getMAC1() {
        return $this->MAC1;
    }

    public function getCPP1() {
        return $this->CPP1;
    }

    public function getMAC2() {
        return $this->MAC2;
    }

    public function getCPP2() {
        return $this->CPP2;
    }

    public function getMAC3() {
        return $this->MAC3;
    }

    public function getCPP3() {
        return $this->CPP3;
    }

    public function setBanco($banco) {
        $this->banco = $banco;
    }

    public function setMAC1($MAC1) {
        $this->MAC1 = $MAC1;
    }

    public function setCPP1($CPP1) {
        $this->CPP1 = $CPP1;
    }

    public function setMAC2($MAC2) {
        $this->MAC2 = $MAC2;
    }

    public function setCPP2($CPP2) {
        $this->CPP2 = $CPP2;
    }

    public function setMAC3($MAC3) {
        $this->MAC3 = $MAC3;
    }

    public function setCPP3($CPP3) {
        $this->CPP3 = $CPP3;
    }

    public function getCE() {
        return $this->CE;
    }

    public function setCE($CE) {
        $this->CE = $CE;
    }

}
