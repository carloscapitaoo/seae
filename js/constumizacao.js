$(document).ready(function () {

    $("#logando").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: $("#logando").attr("action"),
            type: 'post',
            data: $(this).serialize(),
            success: function (data) {
                if (data === "\"sucesso\"") {
                    window.location.href = "escola.php";
                }
                if (data === "\"erro\"") {
                    $("#infoLogin").html("<div class='alert alert-danger'>" +
                            "<strong>Erro!</strong> Email ou senha errado." +
                            "</div>");
                } else {
                    $("#infoLogin").html("<div class='alert alert-danger'>" +
                            "<strong>Erro!</strong>" + data +
                            "</div>");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("erro");
                $("#informacao").append("<div class='alert alert-danger' > <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>" + 'esso ao salvar os dados' + '</div></br>').hide(3000);
            }
        });
    });

    $(".apagar_professor").on("click", function () {
        swal({
            title: 'Tens Certeza?',
            text: "Queres mesmo apagar?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#03A9F4',
            cancelButtonColor: '#F44336',
            confirmButtonText: '<i class="zmdi zmdi-run"></i> Sim, Apague!',
            cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> Não, Cancele!'
        }).then(function () {
            $.ajax({
                url: "controlador_professor.php?apagar="+$(this).attr("rel"),
                type: 'get',
                success: function (data) {
                    window.location.href = "index.php";
                },
                error: function (jqXHR) {
                    window.location.href = "escola.php";
                }
            });
        });
    });

    $("#up").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: $("#up").attr("action"),
            type: "post",
            data: $("#up").serialize(),
            success: function (data) {
                console.log(data);
                alert(data);
            },
            error: function (data) {
                console.log(data);
                alert(data);
            }
        });
    });

    $(".apresentarAluno").on("click", function () {
        $(this).attr("rel");
        $.ajax({
            url: "busca_aluno.php?c=" + $(this).attr("rel"),
            dataType: 'json',
            cache: false,
            error: function (e) {
                console.log(e);
            },
            success: function (data) {
                corpo = "<div class='container-fluid bd-example-row'>" +
                        "<div class='row'>" +
                        "<div class='col-md-6'> <strong>Nome: </strong> " + data.dados[0].nome + "</div>" +
                        "<div class='col-md-6'><strong>Genero: </strong>" + data.dados[0].genero + " </div>" +
                        "</div>" +
                        "<div class='row'>" +
                        "<div class='col-md-6'><strong>Pai: </strong>" + data.dados[0].pai + "</div>" +
                        "<div class='col-md-6'><strong>Mãe: </strong>" + data.dados[0].mae + "</div>" +
                        "</div>" +
                        "<div class='row'>" +
                        "<div class='col-md-6'><strong>Residência: </strong>" + data.dados[0].residencia + "</div>" +
                        "<div class='col-md-6'><strong>Naturalidade: </strong>" + data.dados[0].naturalidade + "</div>" +
                        "</div>" +
                        "<div class='row'>" +
                        "<div class='col-md-6'><strong>Provincia: </strong>" + data.dados[0].provincia + "</div>" +
                        "<div class='col-md-6'><strong>Data de Nascimento: </strong>" + data.dados[0].datanascimento + "</div>" +
                        "</div>" +
                        "<div class='row'>" +
                        "<div class='col-md-6'><strong>Curso: </strong>" + data.dados[0].curso + "</div>" +
                        "<div class='col-md-6'><strong>Turma: </strong>" + data.dados[0].turma + "</div>" +
                        "</div>" +
                        "<div class='row'>" +
                        "<div class='col-md-6'><strong>Turno: </strong>" + data.dados[0].turno + "</div>" +
                        "<div class='col-md-6'><strong>Classe: </strong>" + data.dados[0].classe + "</div>" +
                        "</div>" +
                        "</div>";
                $(".modal-body").html(corpo);
                $("#gridSystemModal").modal('show');
                console.log(data);
            }
        });
    });

    $(".atualizar").on("click", function () {
        $(this).attr("rel");
        $.ajax({
            url: "busca_aluno.php?c=" + $(this).attr("rel"),
            dataType: 'json',
            cache: false,
            error: function (e) {
                console.log(e);
            },
            success: function (data) {
                corpo = "<form id='up' action='controlador_aluno.php' method='post'>" +
                        "<div class='form-group label-floating'>" +
                        "<label class='control-label'>Nome do estudante</label>" +
                        "<input class='form-control' type='text' value='" + data.dados[0].nome + "' name='nome'>" +
                        "<input class='form-control' type='hidden' value='" + data.dados[0].id + "' name='id'>" +
                        "</div>" +
                        "<div class='form-group'>" +
                        "<label class='control-label'>Genero</label>" +
                        "<select class='form-control' name='genero'>";
                if (data.dados[0].genero === 'M') {
                    corpo += "<option selected value='M'>Masculino</option>";
                } else {
                    corpo += "<option value='M'>Masculino</option>";
                }
                if (data.dados[0].genero === 'F') {
                    corpo += "<option selected  value='F'>Femenino</option>";
                } else {
                    corpo += "<option value='F'>Femenino</option>";
                }
                corpo += "</select>" +
                        "</div>" +
                        "<div class='form-group label-floating'>" +
                        "<label class='control-label'>Nome do Pai</label>" +
                        "<input class='form-control' value='" + data.dados[0].pai + "' name='pai' type='text'>" +
                        "</div>" +
                        "<div class='form-group label-floating'>" +
                        "<label class='control-label'>Nome da mãe</label>" +
                        "<input class='form-control' value='" + data.dados[0].mae + "' name='mae' type='text'>" +
                        "</div>" +
                        "<div class='form-group label-floating'>" +
                        "<label class='control-label'>Residência</label>" +
                        "<input class='form-control' value='" + data.dados[0].residencia + "' type='text' name='residencia'>" +
                        "</div>" +
                        "<div class='form-group label-floating'>" +
                        "<label class='control-label'>Naturalidade</label>" +
                        "<input class='form-control' value='" + data.dados[0].naturalidade + "' type='text' name='naturalidade'>" +
                        "</div>" +
                        "<div class='form-group label-floating'>" +
                        "<label class='control-label'>Provincia</label>" +
                        "<input class='form-control' type='text' value='" + data.dados[0].provincia + "' name='provincia'>" +
                        "</div>" +
                        "<div class='form-group label-floating'>" +
                        "<label class='control-label'>Data de nascimento</label>" +
                        "<input class='form-control' value='" + data.dados[0].datanascimento + "' type='date' name='nascimento'>" +
                        "</div>" +
                        "<div class='form-group label-floating'>" +
                        "<label class='control-label'>Estado Civil</label>" +
                        "<input class='form-control' value='" + data.dados[0].estadocivil + "' type='text'  name='estadosivil'>" +
                        "</div>" +
                        "<div class='form-group label-floating'>" +
                        "<label class='control-label'>Data emisão do BI</label>" +
                        "<input class='form-control' value='" + data.dados[0].emisao + "' type='date' name='emissao'>" +
                        "</div>" +
                        "<div class='form-group label-floating'>" +
                        "<label class='control-label'>Data de validade do BI</label>" +
                        "<input class='form-control' value='" + data.dados[0].validade + "' type='date' name='validade'>" +
                        "</div>" +
                        "<div class='form-group'>" +
                        "<label class='control-label'>Curso</label>" +
                        "<select class='form-control' name='curso'>" +
                        "<option value='none' selected='' disabled=''>Selecione o curso</option>";
                if (data.dados[0].curso === 'Informática') {
                    corpo += "<option selected value='Informática'>Informática</option>";
                } else {
                    corpo += "<option value='Informática'>Informática</option>";
                }
                if (data.dados[0].curso === 'Economicas e Júridicas') {
                    corpo += "<option selected value='Economicas e Júridicas'>Economicas e Júridicas</option>";
                } else {
                    corpo += "<option value='Economicas e Júridicas'>Economicas e Júridicas</option>";
                }
                if (data.dados[0].curso === 'Fisícas e Biologicas') {
                    corpo += "<option selected value='Fisícas e Biologicas'>Fisícas e Biologicas</option>";
                } else {
                    corpo += "<option value='Fisícas e Biologicas'>Fisícas e Biologicas</option>";
                }
                corpo += "</select>" +
                        "</div>" +
                        "<div class='form-group'>" +
                        "<label class='control-label'>Turno</label>" +
                        "<select class='form-control' name='turno'>";
                if (data.dados[0].curso === 'Manhã') {
                    corpo += "<option selected value='Manhã'>Manhã</option>";
                } else {
                    corpo += "<option value='Manhã'>Manhã</option>";
                }
                if (data.dados[0].curso === 'Tarde') {
                    corpo += "<option selected value='Tarde'>Tarde</option>";
                } else {
                    corpo += "<option value='Tarde'>Tarde</option>";
                }
                if (data.dados[0].curso === 'Noite') {
                    corpo += "<option selected value='Noite'>Noite</option>";
                } else {
                    corpo += "<option value='Noite'>Noite</option>";
                }
                corpo += "</select>" +
                        "</div>" +
                        "<div class='form-group'>" +
                        "<label class='control-label'>Classe</label>" +
                        "<select class='form-control' name='classe'>" +
                        "<option value='11º'>11º</option>" +
                        "</select>" +
                        "</div>" +
                        "<div class='form-group'>" +
                        "<label class='control-label'>Turma</label>" +
                        "<select class='form-control' name='turma'>" +
                        "<option value='I11AM'>I11AM</option>" +
                        "<option value='I11AT'>I11AT</option>" +
                        "<option value='11FBM'>11FBM</option>" +
                        "<option value='11FBT'>11FBT</option>" +
                        "<option value='11FBN'>11FBN</option>" +
                        "<option value='11EJM'>11EJM</option>" +
                        "<option value='11EJT'>11EJT</option>" +
                        "<option value='11EJN'>11EJN</option>" +
                        "</select>" +
                        "</div>" +
                        "<button type='submit' id='update' name='atualizarU' value='atualizar' class='btn btn-success'>Actualizar</button>" +
                        "</form>";
                $(".modal-body").html(corpo);
                $("#atualizar").modal('show');
                //console.log(data);
            }
        });
    });

    $("#curso_").on("change", function () {
        //alert($("#curso_").val());
        var linhasAluno = "<label class='control-label'>Aluno</label>";
        linhasAluno += "<select class='form-control' name='alunoPauta'>";
        linhasAluno += "<option value='none' selected='' disabled=''>Selecione o Aluno</option>";

        var linhas = "<label class='control-label'>Disciplina</label>";
        linhas += "<select class='form-control' name='disciplinaCurso'>";
        linhas += "<option value='none' selected='' disabled=''>Selecione a Disciplina</option>";
        $.ajax({
            url: "lista_disciplina.php?c=" + $("#curso_").val(),
            dataType: 'json',
            cache: false,
            beforeSend: function (xhr) {
            },
            error: function (e) {
                console.log("erro: " + e);
            },
            success: function (data) {
                // console.log((data));
                //console.log(JSON.parse(data));
                for (var i = 0; i < data.dados.length; i++) {
                    linhas += "<option value='" + data.dados[i].disciplina + "'>" + data.dados[i].disciplina + "</option>";
                }
                linhas += "</select>";
                $("#disciplina_").html(linhas);


                for (var i = 0; i < data.alunos.length; i++) {
                    linhasAluno += "<option value='" + data.alunos[i].id + "'>" + data.alunos[i].nome + "</option>";
                }
                linhasAluno += "</select>";
                $("#alunoPauta").html(linhasAluno);


            }
        });
    });

});
(function ($) {
    $(window).on("load", function () {
        $(".dashboard-sideBar-ct").mCustomScrollbar({
            theme: "light-thin",
            scrollbarPosition: "inside",
            autoHideScrollbar: true,
            scrollButtons: {enable: true}
        });
        $(".dashboard-contentPage, .Notifications-body").mCustomScrollbar({
            theme: "dark-thin",
            scrollbarPosition: "inside",
            autoHideScrollbar: true,
            scrollButtons: {enable: true}
        });
    });
})(jQuery);

(function ($) {

})(jQuery);