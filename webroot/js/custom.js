$(function () {
    tinymce.init({
        selector: 'textarea.tiny',
        plugins: 'lists, code',
        toolbar: 'bold | italic | underline | alignleft | aligncenter | alignright | alignjustify | cut | copy | paste | bullist | numlist | code',
        menubar: false
    });

    /* ===========ACTIVE MENU ===========*/
    var url = window.location.toString();
    if (url.indexOf('#') > 0) {
        url = url.substr(0, url.indexOf('#'));
    }
    if (url.indexOf('?') > 0) {
        url = url.substr(0, url.indexOf('?'));
    }
    var element = $('.nav-item a').filter(function () {
        return this.href == url;
    }).addClass('active').parent();


    while (true) {
        if (element.is('li')) {
            element = element.parent()
                .addClass('menu-open')
                .parent()
                .addClass('menu-open')
                .children('a')
                .addClass('active')
                .parent();
        } else {
            break;
        }
    }
    /* =========== FIM ACTIVE MENU ===========*/


    /* =========== TOOLTIP ===========*/
    $('[data-tooltip="tooltip"]').tooltip();


    /* =========== MAKS ===========*/
    /* MASK DATA
    $('body').on('focus', '.data', function () {
        $(this).mask('00/00/0000');
    });
    */
    $('body').on('blur', '.data', function () {
        let div = $(this).parent('div');
        if (!ValidaData($(this).val())) {
            $(this).val('');
            if ($(div).hasClass('input-group')) {
                $(div).parent('div').find('i').remove();
                $(div).parent('div').append('<i class="text-danger">Digite uma data válida</i>');
            } else {
                $(div).find('i').remove();
                $(div).append('<i class="text-danger">Digite uma data válida</i>');
            }
        } else {
            if ($(div).hasClass('input-group')) {
                $(div).parent('div').find('i').remove();
            } else {
                $(div).find('i').remove();
            }
        }
    });
    /* VALIDA O CPF */
    $('body').on('blur', '.cpf', function () {
        if (!TestaCPF($(this).val())) {
            $(this).val('');
            $(this).parent().find('i').remove();
            $(this).parent().append('<i style="color:red">Digite um CPF válido</i>');
        } else {
            $(this).parent().find('i').remove();
        }
    });

    /* MASK CPNJ
    $('body').on('focus', '.cnpj', function () {
        $(this).mask("99.999.999/9999-99");
    });
*/
    /* MASK CEP
    $('body').on('focus', '.cep', function () {
        $(this).mask("00000-000");
    });
    */
    /* MASK TELEFONE */
    // $('body').on('focus', '.telefone', function () {
    //     $(this).mask('(00) 0000-00009');
    // });

    /*=========== JQUERY VALIDATE ===========*/
    $("form").validate();


    /*=========== SCROLL OVERLAY ===========*/
    $('[data-scroll="scroll"]').overlayScrollbars({});


    /*=========== BOOTSTRAP SWITCH ===========*/
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    /* =========== Select 2 ===========*/
    $('select').select2({
        language: {
            noResults: function () {
                return "Nenhum resultado encontrado";
            }
        }
    });

    /* =========== AO ABRIR A JANELA MODAL ===========*/
    $('.view').on('show.bs.modal', function (e) {
        $(this).find('.modal-content').html(carregando());
        if (e.relatedTarget !== undefined) {
            var link = $(e.relatedTarget);
            link = $(link).attr('href');
            if (link.charAt(0) !== '#') {
                $(this).find('.modal-content').load(link, function (response, status, xhr) {
                    if (status === "error") {
                        $('.view').find('.modal-content').html(errorCarregar(xhr.status, xhr.statusText));
                    }
                    recarregarPlugins();
                });
            }
        }
    });

    /* =========== AO FECHAR A JANELA MODAL ===========*/
    $('.view').on('hidden.bs.modal', function (e) {
        $(this).find('.modal-content').html('');
    });


});

function carregando() {
    var div = '<div class="modal-body">';
    div += '    <h3 style="text-align: center">';
    div += '        <i class="fas fa-2x fa-sync-alt fa-spin"></i><br/> Carregando...';
    div += '    </h3';
    div += '</div>';
    return div;
}


function errorCarregar(status, statusText) {
    var div = '<div class="modal-body">';
    div += '    <div style="text-align: center">';
    div += '        <h4>';
    div += '            Erro ao carregar janela. Por favor, tente novamente.';
    div += '        </h4>';
    div += '        <a href="#" onclick="window.location.reload(true); return false;" class="btn btn-primary"><i class="fa fa-refresh"></i> Recarregar página</a>';
    div += '    </div';
    div += '</div>';
    return div;
}


/* Função para validar CPF */
function TestaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
    strCPF = RetiraCaracteresInvalidos(strCPF);
    if (strCPF == "00000000000")
        return false;
    for (i = 1; i <= 9; i++)
        Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;
    if ((Resto == 10) || (Resto == 11))
        Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)))
        return false;
    Soma = 0;
    for (i = 1; i <= 10; i++)
        Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
    if ((Resto == 10) || (Resto == 11))
        Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11)))
        return false;
    return true;
}


function ValidaData(data) {
    var reg = /[^\d\/\.]/gi;                  // Mascara = dd/mm/aaaa | dd.mm.aaaa
    var valida = data.replace(reg, '');    // aplica mascara e valida só numeros
    if (valida && valida.length == 10) {  // é válida, então ;)
        var ano = data.substr(6),
            mes = data.substr(3, 2),
            dia = data.substr(0, 2),
            M30 = ['04', '06', '09', '11'],
            v_mes = /(0[1-9])|(1[0-2])/.test(mes),
            v_ano = /(19[1-9]\d)|(20\d\d)|2100/.test(ano),
            rexpr = new RegExp(mes),
            fev29 = ano % 4 ? 28 : 29;
        if (v_mes && v_ano) {
            if (mes == '02') return (dia >= 1 && dia <= fev29);
            else if (rexpr.test(M30)) return /((0[1-9])|([1-2]\d)|30)/.test(dia);
            else return /((0[1-9])|([1-2]\d)|3[0-1])/.test(dia);
        }
    }
    return false;
}


function RetiraCaracteresInvalidos(str) {
    while (str.indexOf('.') != '-1' || str.indexOf('-') != '-1') {
        str = str.replace('.', '');
        str = str.replace('-', '');
    }
    return str;
}

function recarregarPlugins() {
    $('.toolTipOpen').tooltip();

    /* Select 2 */
    $('select').select2();

    $('[data-scroll="scroll"]').overlayScrollbars({});
}
