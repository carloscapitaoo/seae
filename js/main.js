$(document).ready(function () {
        
    $('.btn-sideBar-SubMenu').on('click', function () {
        var SubMenu = $(this).next('ul');
        var iconBtn = $(this).children('.zmdi-caret-down');
        if (SubMenu.hasClass('show-sideBar-SubMenu')) {
            iconBtn.removeClass('zmdi-hc-rotate-180');
            SubMenu.removeClass('show-sideBar-SubMenu');
        } else {
            iconBtn.addClass('zmdi-hc-rotate-180');
            SubMenu.addClass('show-sideBar-SubMenu');
        }
    });
    $('.btn-exit-system').on('click', function () {
        swal({
            title: 'Tens Certeza?',
            text: "A sua sessão será terminada.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#03A9F4',
            cancelButtonColor: '#F44336',
            confirmButtonText: '<i class="zmdi zmdi-run"></i> Sim, Sair!',
            cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> Não, Cancele!'
        }).then(function () {
            $.ajax({
                url: "controlador_login.php?sair=sair",
                type: 'get',
                success: function (data, textStatus, jqXHR) {
                    window.location.href = "index.php";
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    window.location.href = "localhost/seae/escola.php";
                }
            });
        });
    });
    $('.btn-menu-dashboard').on('click', function () {
        var body = $('.dashboard-contentPage');
        var sidebar = $('.dashboard-sideBar');
        if (sidebar.css('pointer-events') == 'none') {
            body.removeClass('no-paddin-left');
            sidebar.removeClass('hide-sidebar').addClass('show-sidebar');
        } else {
            body.addClass('no-paddin-left');
            sidebar.addClass('hide-sidebar').removeClass('show-sidebar');
        }
    });
    $('.btn-Notifications-area').on('click', function () {
        var NotificationsArea = $('.Notifications-area');
        if (NotificationsArea.css('opacity') == "0") {
            NotificationsArea.addClass('show-Notification-area');
        } else {
            NotificationsArea.removeClass('show-Notification-area');
        }
    });
    $('.btn-search').on('click', function () {
        swal({
            title: 'Nome do Aluno',
            confirmButtonText: '<i class="zmdi zmdi-search"></i>  Buscar...',
            confirmButtonColor: '#03A9F4',
            showCancelButton: true,
            cancelButtonColor: '#F44336',
            cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> Cancelar',
            html: '<div class="form-group label-floating">' +
                    '<label class="control-label" for="InputSearch">Busque...</label>' +
                    '<input class="form-control" id="InputSearch" type="text">' +
                    '</div>'
        }).then(function () {
            //scrit ajax para busca de dados.
            $.ajax({
                url: "procura_aluno.php?c=" + $('#InputSearch').val(),
                method: "post",
                dataType: 'json',
                cache: false,
                error: function (e) {
                    console.log("erro: " + e);
                },
                success: function (data) {
                    if (data) {
                        console.log(data);
                        cap = 0;
                        var tamanovetor = data.dados.length;
                        var corpomodal = "<div class='table-responsive'>" +
                                "<table class='table table-hover text-left' >" +
                                "<thead>" +
                                "<tr>" +
                                "<th>Nome</th>";
                        for (var i = 0; i < tamanovetor; i++) {
                            corpomodal += "<th>" + data.dados[i].disciplina + "</th>";
                        }
                        corpomodal += "</tr>";
                        corpomodal += "</thead>";
                        corpomodal += "</tbody>";
                        corpomodal += "<tr>";
                        corpomodal += "<td>" + data.dados[0].nome + "</td>";
                        //ciclo para o corpo
                        for (var i = 0; i < tamanovetor; i++) {
                            cap = (((parseFloat(data.dados[i].MAC1) + parseFloat(data.dados[i].CPP1)) / 2) + ((parseFloat(data.dados[i].MAC2) + parseFloat(data.dados[i].CPP2)) / 2) + ((parseFloat(data.dados[i].MAC3) + parseFloat(data.dados[i].CPP3)) / 2)) / 3;
                            
                            corpomodal += "<td>" + (cap.toPrecision(2)) + "</td>";
                        }
                        corpomodal += "</tr>";
                        corpomodal += "</tbody>";
                        corpomodal += "</table>";
                        corpomodal += "</div>";

                        $(".modal-body").html(corpomodal);
                        $("#Dialog-Help").modal('show');
//                        swal(
//                                'You wrote',
//                                ' SIM: ' + data.dados[0].nome + '',
//                                'success'
//                                )
                    } else {
                        swal(
                                'You wrote',
                                'Nao: ' + $('#InputSearch').val() + '',
                                'success'
                                )
                    }
                }
            });
        });
    });
    $('.btn-modal-help').on('click', function () {
        $('#Dialog-Help').modal('show');
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