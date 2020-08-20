<?php
//include 'Crud.php';
require_once 'Disciplina.php';

$d = new Disciplina();

$l = $_GET['c'];

//echo var_dump($d->lista_de_curso($l));die;
echo json_encode(["dados"=>$d->lista_de_curso($l), "alunos"=>$d->alunosNoCurso($l)]);

