<?php

//include './Crud.php';
include './Pessoa.php';
include './Bi.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aluno
 *
 * @author lito
 */
class Aluno extends Pessoa {

    private $turma;
    private $turno;
    private $classe;
    private $bi;
    private $banco;
    private $curso;

    public function __construct($nome = NULL, $genero = NULL, $classe = NULL, $turno = NULL, $turma = NULL, $pai = NULL, $mae = NULL, $residencia = NULL, $naturalidade = NULL, $provincia = NULL, $datanascimento = NULL, $estadosivil = NULL, $emissao = NULL, $validade = NULL, $curso = " ") {
        $this->banco = new Crud();
        $this->bi = new Bi($pai, $mae, $residencia, $naturalidade, $provincia, $datanascimento, $estadosivil, $emissao, $validade);
        parent::__construct($nome, $genero);
        $this->setClasse($classe);
        $this->setTurno($turno);
        $this->setTurma($turma);
        $this->setCurso($curso);
    }

    public function salvar() {
        parent::salvar();
        $a = $this->banco->adicionar("aluno", "?, ?, ?, ?, ?", 
                array(
            $this->banco->listar("*", "pessoa", "WHERE 1 ORDER BY id DESC LIMIT 1", array())->fetch(\PDO::FETCH_ASSOC)["id"],
            $this->getTurma(),
            $this->getTurno(),
            $this->getClasse(),
            $this->getCurso()));
        $b = $this->bi->salvar($this->banco->listar("*", "aluno", "WHERE 1 ORDER BY id DESC LIMIT 1", array())->fetch(\PDO::FETCH_ASSOC)["id"]);
    }
    public function atualizar($id) {
        $resultado = "";
        $pessoa = parent::atualizarPessoa($id);
        $aluno = $this->banco->actualizar("aluno", "turma=?, turno=?, classe=?, curso=?", "id=?", array(
            $this->getTurma(),
            $this->getTurno(),
            $this->getClasse(),
            $this->getCurso(),
            $id
        ));
        $b = $this->bi->atualizarBI($id);
        
    }

    public function apagar($id) {
        $this->banco->apagar("bi", "id=?", array($id));
        $this->banco->apagar("aluno", "id=?", array($id));
        $this->banco->apagar("pessoa", "id=?", array($id));
    }

    public function lista_de_alunos() {
        return $this->banco->listar("*", "pessoa, aluno, bi", 
                "WHERE pessoa.id = aluno.id AND aluno.id = bi.id ORDER BY pessoa.nome",
                array())->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public function puxa_alunos($id) {
        
        return $this->banco->listar("pessoa.nome,"
                . " pessoa.genero,"
                . " bi.pai,"
                . " bi.id,"
                . " bi.mae,"
                . " bi.residencia,"
                . " bi.naturalidade,"
                . " bi.provincia,"
                . " bi.estadocivil,"
                . " bi.emisao,"
                . " bi.validade,"
                . " bi.datanascimento,"
                . " aluno.turma,"
                . " aluno.turno,"
                . " aluno.classe,"
                . " aluno.curso ", 
                " pessoa, aluno, bi", 
                "WHERE  pessoa.id=aluno.id AND aluno.id=bi.id AND pessoa.id = ?",
                array($id))->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public function busca_de_alunos($aluno) {
        return $this->banco->listar("nome, pauta.disciplina, MAC1, CPP1, MAC2, CPP2, MAC3, CPP3, CE", "aluno, pessoa, pauta", 
                "WHERE pauta.id_aluno = aluno.id AND aluno.id=pessoa.id "
                . "AND aluno.id IN (SELECT pauta.id_aluno FROM pauta) "
                . "AND pessoa.nome = ?",
                array($aluno))->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public function actualiza($id, $tabela, array $dados) {
        
    }

    public function getTurma() {
        return $this->turma;
    }

    public function getTurno() {
        return $this->turno;
    }

    public function getClasse() {
        return $this->classe;
    }

    public function setTurma($turma) {
        $this->turma = $turma;
    }

    public function setTurno($turno) {
        $this->turno = $turno;
    }

    public function setClasse($classe) {
        $this->classe = $classe;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
    }

}
