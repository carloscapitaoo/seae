<?php
include 'Crud.php';
require_once 'Aluno.php';

$d = new Aluno();

$l = $_GET['c'];


echo json_encode(["dados"=>$d->busca_de_alunos($l)]);

