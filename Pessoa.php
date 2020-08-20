<?php

//include 'Crud.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pessoa
 *
 * @author lito
 */
abstract class Pessoa {

    private $nome;
    private $genero;
    private $banco;

    public function __construct($nome, $genero) {
        $this->banco = new Crud();
        $this->setNome($nome);
        $this->setGenero($genero);
    }

    public function toString() {
        return [$this->getNome(), $this->getGenero()];
    }

    public function salvar() {
        $reposta = $this->banco->adicionar("pessoa", "?, ?, ?", array(0, $this->toString()[0], $this->toString()[1]));
        return $reposta;
    }

    public function atualizarPessoa($id) {
        return $this->banco->actualizar("pessoa", "nome=?,genero=?", "id=?", array($this->toString()[0], $this->toString()[1],$id));
    }

    public function getNome() {
        return $this->nome;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

}
