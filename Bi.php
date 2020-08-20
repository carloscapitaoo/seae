<?php

//include 'Crud.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bi
 *
 * @author lito
 */
class Bi {

    private $pai;
    private $mae;
    private $residencia;
    private $naturalidade;
    private $provincia;
    private $datanascimento;
    private $estadosivil;
    private $emissao;
    private $validade;
    private $banco;

    public function __construct($pai = NULL, $mae = NULL, $residencia = NULL, $naturalidade = NULL, $provincia = NULL, $datanascimento = NULL, $estadosivil = NULL, $emissao = NULL, $validade = NULL) {
        $this->banco = new Crud();
        $this->setPai($pai);
        $this->setMae($mae);
        $this->setResidencia($residencia);
        $this->setNaturalidade($naturalidade);
        $this->setProvincia($provincia);
        $this->setDatanascimento($datanascimento);
        $this->setEstadosivil($estadosivil);
        $this->setEmissao($emissao);
        $this->setValidade($validade);
    }

    public function toString($id) {
        return [$id, $this->getPai(), $this->getMae(), $this->getResidencia(), $this->getNaturalidade(), $this->getProvincia(), $this->getDatanascimento(), $this->getEstadosivil(), $this->getEmissao(), $this->getValidade()];
    }

    public function toStringU($id) {
        return [$this->getPai(), $this->getMae(), $this->getResidencia(), $this->getNaturalidade(), $this->getProvincia(), $this->getDatanascimento(), $this->getEstadosivil(), $this->getEmissao(), $this->getValidade(),$id];
    }

    public function salvar($id) {
        return $this->banco->adicionar("bi", "?,?,?,?,?,?,?,?,?,?", $this->toString($id));
    }

    public function atualizarBI($id) {
        return $this->banco->actualizar("bi", "pai=?,mae=?,residencia=?,naturalidade=?,provincia=?,datanascimento=?,estadocivil=?,emisao=?,validade=?", "id=?", $this->toStringU($id));
    }

    public function getPai() {
        return $this->pai;
    }

    public function getMae() {
        return $this->mae;
    }

    public function getResidencia() {
        return $this->residencia;
    }

    public function getNaturalidade() {
        return $this->naturalidade;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function getDatanascimento() {
        return $this->datanascimento;
    }

    public function getEstadosivil() {
        return $this->estadosivil;
    }

    public function getEmissao() {
        return $this->emissao;
    }

    public function getValidade() {
        return $this->validade;
    }

    public function setPai($pai) {
        $this->pai = $pai;
    }

    public function setMae($mae) {
        $this->mae = $mae;
    }

    public function setResidencia($residencia) {
        $this->residencia = $residencia;
    }

    public function setNaturalidade($naturalidade) {
        $this->naturalidade = $naturalidade;
    }

    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    public function setDatanascimento($datanascimento) {
        $this->datanascimento = $datanascimento;
    }

    public function setEstadosivil($estadosivil) {
        $this->estadosivil = $estadosivil;
    }

    public function setEmissao($emissao) {
        $this->emissao = $emissao;
    }

    public function setValidade($validade) {
        $this->validade = $validade;
    }

}
