<?php
if (session_id() == '') {
    ini_set("session.save_handler", "files");
    ini_set("session.use_cookies", 1);
    ini_set("session.cookies_domain", $_SERVER["HTTP_HOST"]);
    ini_set("session.cookies_httponly", 1);
    if ($_SERVER["HTTP_HOST"] != "localhost") {
        ini_set("session.cookies_secure", 1);
    }
    ini_set("session.entropy_length", 512);
    ini_set("session.entropy_file", "/dev/urandom");
    ini_set("session.hash_function", "sha256");
    ini_set("session.hash_bits_per_character", 5);
    session_start();
}
include 'Crud.php';
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
class Disciplina {

    private $disciplina;
    private $classe;
    private $curso;
    private $professor;
    private $banco;

    public function __construct($disciplina = NULL, $classe = NULL, $curso = NULL, $professor = NULL) {
        $this->banco = new Crud();
        $this->setDisciplina($disciplina);
        $this->setClasse($classe);
        $this->setCurso($curso);
        $this->setProfessor($professor);
    }

    public function salvar() {
        $this->banco->adicionar("disciplina", "?, ?, ?, ?, ?", array(0, $this->getCurso(), $this->getClasse(), $this->getDisciplina(), $this->getProfessor()));
    }

    public function apagar($id) {
        $this->banco->apagar("disciplina", "id=?", array($id));
    }

    public function lista_de_disciplina() {
        return $this->banco->listar("*", "disciplina", "WHERE 1", array())->fetchAll(\PDO::FETCH_OBJ);
    }

    public function lista_de_curs() {
        return $this->banco->listar("DISTINCT disciplina.curso", "disciplina", "WHERE disciplina.disciplina IN (SELECT professor.disciplina FROM professor WHERE professor.disciplina LIKE ?)", array($_SESSION['disciplina']))->fetchAll(\PDO::FETCH_OBJ);
    }

    public function lista_de_curso($curso) {
        //return $curso;
        $a = ($this->banco->listar("*", "disciplina", "WHERE curso=? AND disciplina=?", array($curso, $_SESSION['disciplina']))->fetchAll(\PDO::FETCH_OBJ));
//        var_dump($a);
        return $a;
    }

    public function alunosNoCurso($curso) {
        return ($this->banco->listar("DISTINCT pessoa.id, pessoa.nome ", "aluno, disciplina, pessoa ", "WHERE disciplina.curso LIKE ? AND aluno.curso=disciplina.curso AND pessoa.id=aluno.id", array($curso))->fetchAll(\PDO::FETCH_OBJ));
    }

    public function getDisciplina() {
        return $this->disciplina;
    }

    public function getClasse() {
        return $this->classe;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function getProfessor() {
        return $this->professor;
    }

    public function setDisciplina($disciplina) {
        $this->disciplina = $disciplina;
    }

    public function setClasse($classe) {
        $this->classe = $classe;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
    }

    public function setProfessor($professor) {
        $this->professor = $professor;
    }

}
