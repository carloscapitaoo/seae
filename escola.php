<?php
include 'Disciplina.php';
include 'Aluno.php';
include 'Pauta.php';
require_once 'Professor.php';


if ($_SESSION['logado'] != "SIM") {
    header("Location: index.php");
}
$p = new Pauta();
$a = new Aluno();
$disc = new Disciplina();
$pro = new Login();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>SEAE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="./css/main.css">
    </head>
    <body>
        <!-- SideBar -->
        <section class="full-box cover dashboard-sideBar">
            <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
            <div class="full-box dashboard-sideBar-ct">
                <!--SideBar Title -->
                <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
                    SEAE <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
                </div>
                <!-- SideBar User info -->
                <div class="full-box dashboard-sideBar-UserInfo">
                    <figure class="full-box">
                        <!--<img src="./assets/img/avatar.jpg" alt="UserIcon">-->
                        <figcaption class="text-center text-titles"> <?= @$_SESSION['nome'] ?></figcaption>
                    </figure>
                    <ul class="full-box list-unstyled text-center">
                        <li>
                            <a href="#!" class="btn-exit-system">
                                <i class="zmdi zmdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- SideBar Menu -->
                <ul class="list-unstyled full-box dashboard-sideBar-Menu">

                    <li>
                        <a href="#!" class="btn-sideBar-SubMenu">
                            <i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Usuarios<i class="zmdi zmdi-caret-down pull-right"></i>
                        </a>
                        <ul class="list-unstyled full-box">
                            <li>
                                <a href="#professor" data-toggle="tab"><i class="zmdi zmdi-account zmdi-hc-fw" ></i>Novo Professor</a>
                            </li>
                            <li>
                                <a href="#estudante" class="<?= (strcmp($_SESSION['nivel'],'professor') == 0)?'hidden':'' ?>" data-toggle="tab"><i class="zmdi zmdi-account zmdi-hc-fw" ></i>Novo Estudante</a>
                            </li>
                            <li>
                                <a href="#lista" data-toggle="tab"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>Lista de Estudante</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pauta" data-toggle="tab">
                            <i class="zmdi zmdi-card zmdi-hc-fw"></i> Pautas <i class="zmdi zmdi-caret-down pull-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Content page-->
        <section class="full-box dashboard-contentPage">



            <!-- NavBar -->
            <nav class="full-box dashboard-Navbar">
                <ul class="full-box list-unstyled text-right">
                    <li class="pull-left">
                        <a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
                    </li>
                    <li>
                        <a href="#!" class="btn-search">
                            <i class="zmdi zmdi-search"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Content page -->
            <div class="container-fluid">    
                
                <div class="page-header">
                    <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> SEAE<small>sapula</small></h1>
                </div>
                <p class="lead"></p>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="nav nav-tabs" style="margin-bottom: 15px; background-color: #ff8522">
                            <li class="<?= (strcmp($_SESSION['disciplina'], 'Admin')!=0)?'hidden':'' ?> <?= (strcmp($_SESSION['disciplina'], 'Admin')==0)?'active':'' ?>" ><a href="#estudante" data-toggle="tab"><i class="zmdi zmdi-face"></i> Estudantes</a></li>
                            <li><a href="#professor" data-toggle="tab"><i class="zmdi zmdi-male-alt"></i> Professores</a></li>
                            <li><a href="#lista" data-toggle="tab"><i class="zmdi zmdi-calendar-note"></i> Lista de estudantes</a></li>
                            <li><a href="#disciplina" data-toggle="tab"><i class="zmdi zmdi-timer"></i> Disciplinas</a></li>
                            <li><a href="#pauta" data-toggle="tab"><i class="zmdi zmdi-time-restore"></i> Pauta</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade  <?= (strcmp($_SESSION['disciplina'], 'Admin')==0)?'active in':'' ?> "  id="estudante">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-10 col-md-offset-1">

                                            <form action="controlador_aluno.php" method="post" >

                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nome do estudante</label>
                                                    <input class="form-control" type="text" name="nome">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Genero</label>
                                                    <select class="form-control" name="genero">
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Femenino</option>
                                                    </select>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nome do Pai</label>
                                                    <input class="form-control" name="pai" type="text">
                                                </div>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nome da mãe</label>
                                                    <input class="form-control" name="mae" type="text">
                                                </div>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nº BI</label>
                                                    <input class="form-control" type="text" name="bi">
                                                </div>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Residência</label>
                                                    <input class="form-control" type="text" name="residencia">
                                                </div>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Naturalidade</label>
                                                    <input class="form-control" type="text" name="naturalidade">
                                                </div>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Provincia</label>
                                                    <input class="form-control" type="text" name="provincia">
                                                </div>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Data de nascimento</label>
                                                    <input class="form-control" type="date" name="nascimento">
                                                </div>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Estado Civil</label>
                                                    <input class="form-control" type="text" name="estadosivil">
                                                </div>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Data emisão do BI</label>
                                                    <input class="form-control" type="date" name="emissao">
                                                </div>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Data de validade do BI</label>
                                                    <input class="form-control" type="date" name="validade">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Curso</label>
                                                    <select class="form-control" name="curso">
                                                        <option value="none" selected="" disabled="">Selecione o curso</option>
                                                        <option value="Informática">Informática</option>
                                                        <option value="Economicas e Júridicas">Economicas e Júridicas</option>
                                                        <option value="Fisícas e Biologicas">Fisícas e Biologicas</option>
                                                    </select>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Ano Lectivo</label>
                                                    <input class="form-control" type="date" name="anoletivo">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Turno</label>
                                                    <select class="form-control" name="turno">
                                                        <option value="Manhã">Manhã</option>
                                                        <option value="Tarde">Tarde</option>
                                                        <option value="Noite">Noite</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Classe</label>
                                                    <select class="form-control" name="classe">
                                                        <option value="11º">11º</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Turma</label>
                                                    <select class="form-control" name="turma">
                                                        <option value="I11AM">I11AM</option>
                                                        <option value="I11AT">I11AT</option>
                                                        <option value="11FBM">11FBM</option>
                                                        <option value="11FBT">11FBT</option>
                                                        <option value="11FBN">11FBN</option>
                                                        <option value="11EJM">11EJM</option>
                                                        <option value="11EJT">11EJT</option>
                                                        <option value="11EJN">11EJN</option>
                                                    </select>
                                                </div>
                                                <p class="text-center">
                                                    <button class="btn btn-info btn-raised btn-sm" name="salvarAluno" value="salvar" ><i class="zmdi zmdi-floppy"></i>Cadastrar</button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade active <?= (strcmp($_SESSION['disciplina'], 'Admin')!=0)?'in':'' ?>" id="professor">
                                <div class="container-fluid">
                                    <div class="row <?= (strcmp($_SESSION['disciplina'], 'Admin')!=0)?'hidden':'' ?>">
                                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                                            <form action="controlador_professor.php" method="post" > 
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nome</label>
                                                    <input class="form-control" type="text" name="nome_professor">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Genero</label>
                                                    <select class="form-control" name="genero">
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Femenino</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Nº Telefone</label>
                                                    <input class="form-control" type="number" name="telefone">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Curso</label>
                                                    <select class="form-control" name="cursoprofessor">
                                                        <option value="none" selected="" disabled="">Selecione o curso</option>
                                                        <option value="Informática">Informática</option>
                                                        <option value="Economicas e Júridicas">Economicas e Júridicas</option>
                                                        <option value="Fisícas e Biologicas">Fisícas e Biologicas</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Disciplina</label>
                                                    <input class="form-control" type="text" name="disciplinaprofessor">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="email">Email</label>
                                                    <input class="form-control" type="email" id="email" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="senha" >Senha</label>
                                                    <input class="form-control" type="password" id="senha" name="senha">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="confirma" >Confirme a senha</label>
                                                    <input class="form-control" type="password" id="confirma" name="confirma">
                                                </div>
                                                <input class="form-control" type="hidden" value="professor" name="acesso">
                                                <p class="text-center">
                                                    <button type="submit" name="salvarprofessor" value="salvarprofessor" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i>Cadastrar</button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nome</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Curso</th>
                                                <th class="text-center">Disciplina</th>
                                                <th class="text-center">Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pro->lista_de_professor() as $dado) : ?>
                                                <tr>
                                                    <td><?= $dado->nome ?></td>
                                                    <td><?= $dado->email ?></td>
                                                    <td><?= $dado->curso ?></td>
                                                    <td><?= $dado->disciplina ?></td>
                                                    <td><?= $dado->curso ?></td>
                                                    <td>
                                                        <a href="#atualizar" data-toggle="modal" data-target="#atualizar" rel="<?= $dado->id ?>" class="btn btn-success btn-raised btn-xs atualizar"><i class="zmdi zmdi-refresh"></i></a>
                                                        <a href="#" rel="<?= $dado->id ?>" class="btn btn-danger btn-raised btn-xs apagar_professor <?= (strcmp($_SESSION['disciplina'], 'Admin')!=0)?'hidden':'' ?>"><i class="zmdi zmdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="lista">
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Número</th>
                                                <th class="text-center">Nome</th>
                                                <th class="text-center">Turma</th>
                                                <th class="text-center">Periodo</th>
                                                <th class="text-center">Curso</th>
                                                <th class="text-center">Classe</th>
                                                <th class="text-center">Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($a->lista_de_alunos() as $dado) : ?>
                                                <tr>
                                                    <td><?= $dado->id ?></td>
                                                    <td><?= $dado->nome ?></td>
                                                    <td><?= $dado->turma ?></td>
                                                    <td><?= $dado->turno ?></td>
                                                    <td><?= $dado->curso ?></td>
                                                    <td><?= $dado->classe ?></td>
                                                    <td>
                                                        <a href="#" rel="<?= $dado->id ?>" class="btn btn-default btn-raised btn-xs apresentarAluno"><i class="zmdi zmdi-file-text"></i></a>
                                                        <a href="#atualizar" data-toggle="modal" data-target="#atualizar" rel="<?= $dado->id ?>" class="btn btn-success btn-raised btn-xs atualizar"><i class="zmdi zmdi-refresh"></i></a>
                                                        <a href="controlador_aluno.php?id=<?= $dado->id ?>" rel="<?= $dado->id ?>" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="disciplina">
                                <div class="container-fluid">
                                    <div class="row <?= (strcmp($_SESSION['disciplina'], 'Admin')!=0)?'hidden':'' ?>">
                                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                                            <form action="controlador_disciplina.php" method="post">
                                                <div class="form-group">
                                                    <label class="control-label">Curso</label>
                                                    <select class="form-control" name="cursodisciplina">
                                                        <option value="none" selected="" disabled="">Selecione o curso</option>
                                                        <option value="Informática">Informática</option>
                                                        <option value="Economicas e Júridicas">Economicas e Júridicas</option>
                                                        <option value="Fisícas e Biologicas">Fisícas e Biologicas</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Classe</label>
                                                    <select class="form-control" name="classedisciplina">
                                                        <option value="11º">11º</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Disciplina</label>
                                                    <input class="form-control" type="text" name="disciplina">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Nome do professor</label>
                                                    <input class="form-control" type="text" name="nome_professor">
                                                </div>
                                                <p class="text-center">
                                                    <button name="salvadisciplina" value="b" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i>Salvar</button>
                                                    <button class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i>Cancelar</button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Professor</th>
                                                    <th class="text-center">Disciplina</th>
                                                    <th class="text-center">Classe</th>
                                                    <th class="text-center">Curso</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($disc->lista_de_disciplina() as $dado) : ?>
                                                    <tr>
                                                        <td><?= $dado->professor ?></td>
                                                        <td><?= $dado->disciplina ?></td>
                                                        <td><?= $dado->classe ?></td>
                                                        <td><?= $dado->curso ?></td>
                                                        <td>
                                                            <a href="#" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></a>
                                                            <a href="controlador_aluno.php?id=<?= $dado->id ?>" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pauta">


                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                                            <form action="controlador_pauta.php" method="post">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xs-4 col-md-4">
                                                            <label class="control-label">Curso</label>
                                                            <select class="form-control" id="curso_" name="cursoPauta">
                                                                <option value="none" selected="" disabled="">Selecione o Curso</option>
                                                                <?php foreach ($disc->lista_de_curs() as $dado) : ?>
                                                                    <option value="<?= $dado->curso ?>"><?= $dado->curso ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-xs-4 col-md-4" id="disciplina_">

                                                        </div>

                                                        <div class="col-xs-4 col-md-4" id="alunoPauta">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row" >
                                                        <div class="col-xs-4 col-md-4" > 
                                                            <div class="row">
                                                                <div class="col-md-6 col-xs-6">
                                                                    <label class="control-label">MAC1</label>
                                                                    <input class="form-control" required pattern="[0-9]{1,4}" minlength="1" max="20" min="0" maxlength="4" type="number" name="MAC1">
                                                                </div>

                                                                <div class="col-md-6 col-xs-6">
                                                                    <label class="control-label">CPP1</label>
                                                                    <input class="form-control" required pattern="[0-9]{1,4}" minlength="1" max="20" min="0" maxlength="4" type="number" name="CPP1">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4 col-md-4" > 
                                                            <div class="row">
                                                                <div class="col-md-6 col-xs-6">

                                                                    <label class="control-label">MAC2</label>
                                                                    <input class="form-control" required pattern="[0-9]{1,4}" minlength="1" max="20" min="0" maxlength="4" type="number" name="MAC2">
                                                                </div>

                                                                <div class="col-md-6 col-xs-6">
                                                                    <label class="control-label">CPP2</label>
                                                                    <input class="form-control" required pattern="[0-9]{1,4}" minlength="1" max="20" min="0" maxlength="4" type="number" name="CPP2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4 col-md-4" > 
                                                            <div class="row">
                                                                <div class="col-md-6 col-xs-6">
                                                                    <label class="control-label">MAC3</label>
                                                                    <input class="form-control" required pattern="[0-9]{1,4}" minlength="1" max="20" min="0" maxlength="4" type="number" name="MAC3">
                                                                </div>

                                                                <div class="col-md-6 col-xs-6">
                                                                    <label class="control-label">CPP3</label>
                                                                    <input class="form-control" required pattern="[0-9]{1,4}" minlength="1" max="20" min="0" maxlength="4" type="number" name="CPP3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12 col-xs-6">
                                                        <label class="control-label">Avaliação do Professor (CE)</label>
                                                        <input class="form-control" required pattern="[0-9]{1,4}" minlength="1" max="20" min="0" maxlength="4" type="number" name="CE">
                                                    </div>
                                                </div>

                                                <p class="text-center">
                                                    <button type="submit" name="salvapauta" value="salvar" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i>Salvar</button>
                                                    <button class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i>Cancelar</button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover text-center" >
                                        <thead>
                                            <tr>
                                                <th class="text-center" rowspan="2" >Nº</th>
                                                <th class="text-center" rowspan="2">Nome do Estudante</th>
                                                <th class="text-center" colspan="3">Iº Trimestre</th>
                                                <th class="text-center" colspan="3">IIº Trimestre</th>
                                                <th class="text-center" colspan="3">IIIº Trimestre</th>
                                                <th class="text-center" rowspan="2" >CAP</th>
                                                <th class="text-center" rowspan="2" >CEP/CE</th>
                                                <th class="text-center" rowspan="2" >CF</th>
                                            </tr>

                                            <tr>                
                                                <th>MAC1</th>
                                                <th>CPP1</th>
                                                <th>CT1</th>

                                                <th>MAC2</th>
                                                <th>CPP2</th>
                                                <th>CT2</th>

                                                <th>MAC3</th>
                                                <th>CPP3</th>
                                                <th>CT3</th>

                                            </tr>
                                        </thead>
                                        <!-- inicio do corpo da tabela -->
                                        <tbody>
                                            <?php
                                            $maiorNota = [];
                                            $aprovados = 0;
                                            $reprovado = 0;

                                            if (count($p->pauta()) > 0) {

                                                foreach ($p->pauta() as $d) :
                                                    $cap = (($d->MAC1 + $d->CPP1) / 2 + ($d->MAC2 + $d->CPP2) / 2 + ($d->MAC3 + $d->CPP3) / 2) / 3;
                                                    $maiorNota[] = number_format(($cap + $d->CE) / 2, 1, ".", "");
                                                    if (number_format(($cap + $d->CE) / 2, 1, ".", "") >= 10) {
                                                        $aprovados++;
                                                    } else {
                                                        $reprovado++;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?= $d->id ?></td>
                                                        <td><?= $d->nome ?></td>

                                                        <td <?= (number_format($d->MAC1, 1, ",", "") < 10) ? "style='color: rgb(255,0,0);'" : "" ?> ><?= $d->MAC1 ?></td>
                                                        <td <?= (number_format($d->CPP1, 1, ",", "") < 10) ? "style='color: rgb(255,0,0);'" : "" ?> ><?= $d->CPP1 ?></td>
                                                        <td <?= (number_format(($d->MAC1 + $d->CPP1) / 2, 1, ",", "") < 10) ? "style='color: rgb(255,0,0);'" : "" ?> ><?= ($d->MAC1 + $d->CPP1) / 2 ?></td>

                                                        <td <?= (number_format($d->MAC2, 1, ",", "") < 10) ? "style='color: rgb(255,0,0);'" : "" ?> ><?= $d->MAC2 ?></td>
                                                        <td <?= (number_format($d->CPP2, 1, ",", "") < 10) ? "style='color: rgb(255,0,0);'" : "" ?> ><?= $d->CPP2 ?></td>
                                                        <td <?= (number_format(($d->MAC2 + $d->CPP2) / 2, 1, ",", "") < 10) ? "style='color: rgb(255,0,0);'" : "" ?> ><?= ($d->MAC2 + $d->CPP2) / 2 ?></td>

                                                        <td <?= (number_format($d->MAC3, 1, ",", "") < 10) ? "style='color: rgb(255,0,0);'" : "" ?> ><?= $d->MAC3 ?></td>
                                                        <td <?= (number_format($d->CPP3, 1, ",", "") < 10) ? "style='color: rgb(255,0,0);'" : "" ?> ><?= $d->CPP3 ?></td>
                                                        <td <?= (number_format(($d->MAC3 + $d->CPP3) / 2, 1, ",", "") < 10) ? "style='color: rgb(255,0,0);'" : "" ?> ><?= number_format(($d->MAC3 + $d->CPP3) / 2, 1, ",", "") ?></td>

                                                        <td <?= (number_format($cap, 1, ",", "") < 10) ? "style='color: rgb(255,0,0);'" : "" ?> ><?= number_format($cap, 1, ",", "") ?></td>
                                                        <td <?= (number_format($d->CE, 1, ",", "") < 10) ? "style='color: rgb(255,0,0);'" : "" ?> ><?= $d->CE ?></td>
                                                        <td <?= (number_format(($cap + $d->CE) / 2, 1, ",", "") < 10) ? "style='color: rgb(255,0,0);'" : "" ?> ><?= number_format(($cap + $d->CE) / 2, 1, ",", "") ?></td>
                                                    </tr>
                                                    <?php
                                                endforeach;
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                    <p><?= "Maior Nota: " . ((count($p->pauta()) > 0) ? number_format(max($maiorNota), 1, ",", "") : "") ?></p>
                                    <p><?= "Aprovado: " . $aprovados ?></p>
                                    <p><?= "Reprovado: " . $reprovado ?></p>
                                    <p><?= "Inscritos em informática: " . ($p->inscritosInfo()); ?></p>
                                    <p><?= "Inscritos em Fisícas e Biologica: " . $p->inscritosFisca() ?></p>
                                    <p><?= "Inscritos em Economia e Juridicas: " . ($p->inscritosEconomia()) ?></p>
                                    <!-- fim do corpo da tabela -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Boletim de notas -->
        <div class="modal fade" tabindex="-1" role="dialog" id="Dialog-Help">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Boletin</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-raised" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <!--====== Detalhe dos alunos -->
        <div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridModalLabel">Detalhes do Aluno</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>

        <!--====== atualizacao do aluno -->
        <!-- Modal -->
        <div class="modal fade" id="atualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Editar Aluno</h4>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--====== Scripts -->
        <script src="./js/jquery-3.1.1.min.js"></script>
        <script src="./js/sweetalert2.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/material.min.js"></script>
        <script src="./js/ripples.min.js"></script>
        <script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="./js/main.js"></script>
        <script src="./js/constumizacao.js"></script>
        <script>
            $.material.init();
        </script>
    </body>
</html>