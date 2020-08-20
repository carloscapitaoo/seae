<?php

include './Crud.php';

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
class Login {

    private $email, $senha, $banco, $id;

    public function __construct($email, $senha) {
        $this->banco = new Crud();
        $this->setEmail($email);
        $this->setSenha($senha);
    }
    
    public function encontrarProfessor() {
        return $this->banco->listar("utilizador.id, nome, genero, telefone, curso, disciplina, email, utilizador.nivel",
                "pessoa, professor, utilizador",
                "WHERE pessoa.id = professor.id AND professor.id_utilizador = ?", array($this->id))->fetchAll(\PDO::FETCH_OBJ);
    }

    public function verificarLogin() {
        $d = $this->banco->listar("*", "utilizador", "WHERE email=?", array($this->getEmail()));
        if ($d->rowCount() > 0) {
            $v = ($d->fetchAll(\PDO::FETCH_OBJ)[0]);
            $this->id = $v->id;
            return password_verify($this->getSenha(), $v->senha);
        } else {
            return 0;    
        }
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

}
