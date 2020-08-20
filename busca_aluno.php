<?php
include 'Crud.php';
require_once './Aluno.php';

$d = new Aluno();

$l = $_GET['c'];

//echo var_dump($d->lista_de_curso($l));die;
echo json_encode(["dados"=>$d->puxa_alunos($l)]);

