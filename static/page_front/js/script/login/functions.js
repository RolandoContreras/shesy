function isArray(o) {
    return Array.isArray(o);
}

function fBlockUi() {
    $.blockUI({
        baseZ: 200000,
        message: "<h4><img width='50' src='" + URL + '/shared/img/Loading_apple.gif' + "'></h4>",
        css: {
            border: 'none',
            padding: '5px',
            backgroundColor: '#000',
            '-webkit-border-radius': '5px',
            '-moz-border-radius': '5px',
            opacity: 0.5,
            color: '#fff',
        }
    });
}

function fBlockUiLoading() {
    $.blockUI({
        baseZ: 200000,
        message: '<div class="psoload">\n' +
            '  <div class="straight"></div>\n' +
            '  <div class="curve"></div>\n' +
            '  <div class="center"><img style="width: 70px;" src="/shared/img/logo.png"></div>\n' +
            '  <div class="inner"></div>\n' +
            '</div>',
        css: {
            border: 'none',
            padding: '5px',
            backgroundColor: 'transparent',
            '-webkit-border-radius': '5px',
            '-moz-border-radius': '5px',
            opacity: 1,
            color: '#fff',
        },
        overlayCSS: {
            backgroundColor: '#323c58',
            opacity: 1,
            cursor: 'wait'
        },
    });
}

function startLoading() {
    fBlockUi();
}

function endLoading() {
    $.unblockUI();
}

function selecionarFoto() {

    $("#photo").trigger('click');
    $("#salvarFoto").show();
    grecaptcha.reset();
}

function readUrl(url) {
    startLoading();
    $.ajax({
        url: url,
        dataType: "json",
        cache: false,
        success: function (response) {
            console.log(response);
            if (response.error) {
                if (typeof response.error_message != "undefined") {
                    for (var i in response.error_message) {
                        focusRed("#" + i);
                        if (isArray(response.error_message[i])) {
                            alrtError(share_trans.ocorreu_erro, response.error_message[i][0]);
                        } else {
                            alrtError(share_trans.ocorreu_erro, response.error_message[i]);
                        }

                        break;
                    }

                }

            }
            if (response.success) {
                if (typeof response.sucess_message != "undefined") {
                    alrtSucess(share_trans.operacao_sucesso, response.sucess_message);
                }

            }
            if (response.redirect) {
                if (typeof response.redirect_url != "undefined") {
                    setTimeout(function () {
                        location.href = response.redirect_url;
                    }, 1000);
                }

            }

            endLoading();
        },
        error: function (response) {
            alrtError(share_trans.ocorreu_erro, share_trans.erro_desconhecido);
            endLoading();
        }
    });
    return false;
}

function sendForm(form) {

    console.log("send");
    startLoading();
    $.ajax({
        url: form.attr('action'),
        method: form.attr('method'),
        data: form.serialize(),
        dataType: "json",
        cache: false,
        success: function (response) {
            console.log(response);
            if (response.callback) {
                if (typeof response.callback != "undefined") {
                    console.log(response.callback);
                    eval(response.callback_function);
                }

            }
            if (response.error) {
                if (typeof response.error_message != "undefined") {
                    for (var i in response.error_message) {
                        focusRed("#" + i);
                        if (typeof response.confirm_redirect != 'undefined') {
                            alrtConfirm(share_trans.ocorreu_erro, response.error_message[i], response.confirm_redirect);
                        } else {
                            if (isArray(response.error_message[i])) {
                                alrtError(share_trans.ocorreu_erro, response.error_message[i][0]);
                            } else {
                                alrtError(share_trans.ocorreu_erro, response.error_message[i]);
                            }
                        }


                        break;
                    }

                }

            }
            if (response.success) {
                if (typeof response.sucess_message != "undefined") {
                    alrtSucess(share_trans.operacao_sucesso, response.sucess_message);
                }

            }
            if (response.redirect) {
                if (typeof response.redirect_url != "undefined") {
                    setTimeout(function () {
                        location.href = response.redirect_url;
                    }, 1000);
                }

            }

            endLoading();
        },
        error: function (response) {
            alrtError(share_trans.ocorreu_erro, share_trans.erro_desconhecido);
            endLoading();
        }
    });
    return false;
}

function readUrlWithPin(form, onModal) {

    $.confirm({
        title: share_trans.insira_seu_pin,
        content: '<div class="clearfix"></div>' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>' + share_trans.pin + '</label>' +
                '<input type="password" class="pin form-control" required />' +
                '</div>' +
                '</form>',
        buttons: {
            formSubmit: {
                text: share_trans.confirmar,
                btnClass: 'btn-blue',
                action: function () {

                    var pin = this.$content.find('.pin').val();
                    if (pin == '') {
                        $.alert(share_trans.por_favor_pin);
                        return false;
                    } else {
                        urlPin = URL + '/' + URL_2 + '/user/validate_pin?pin=' + pin;
                        $.getJSON(urlPin, function (response) {
                            if (response.error) {
                                if (typeof response.error_message != "undefined") {
                                    alrtError(share_trans.ocorreu_erro, response.error_message);
                                }

                            } else {
                                readUrl(form);
                            }
                            if (onModal) {
                                $('#modal_url').modal('show');
                            }

                        });
                    }
                }
            },
            cancel: function () {
                if (onModal) {
                    $('#modal_url').modal('show');
                }

            },
        },
        onContentReady: function () {
            // bind to events
            var jc = this;
            if (onModal) {
                $('#modal_url').modal('hide');
            }

            this.$content.find('.pin').focus();
            this.$content.find('form').on('submit', function (e) {
                // if the user submits the form by pressing enter in the field.
                e.preventDefault();
                jc.$$formSubmit.trigger('click'); // reference the button and click it

            });
        }
    });
    return false;
}

function sendWithValidation(form, onModal) {

    $.confirm({
        title: share_trans.insira_seu_pin,
        content: '<div class="clearfix"></div>' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>' + share_trans.pin + '</label>' +
                '<input type="password" class="pin form-control" required />' +
                '</div>' +
                '</form>',
        buttons: {
            formSubmit: {
                text: share_trans.confirmar,
                btnClass: 'btn-blue',
                action: function () {

                    var pin = this.$content.find('.pin').val();
                    if (pin == '') {
                        $.alert(share_trans.por_favor_pin);
                        return false;
                    } else {
                        urlPin = URL + '/' + URL_2 + '/user/validate_pin?pin=' + pin;
                        $.getJSON(urlPin, function (response) {
                            if (response.error) {
                                if (typeof response.error_message != "undefined") {
                                    alrtError(share_trans.ocorreu_erro, response.error_message);
                                }

                            } else {
                                sendForm(form);
                            }
                            if (onModal) {
                                $('#modal_url').modal('show');
                            }

                        });
                    }
                }
            },
            cancel: function () {
                if (typeof onModal != "undefined" && onModal) {
                    $('#modal_url').modal('show');
                }

            },
        },
        onContentReady: function () {
            // bind to events
            var jc = this;
            if (onModal) {
                $('#modal_url').modal('hide');
            }

            this.$content.find('.pin').focus();
            this.$content.find('form').on('submit', function (e) {
                // if the user submits the form by pressing enter in the field.
                e.preventDefault();
                jc.$$formSubmit.trigger('click'); // reference the button and click it

            });
        }
    });
    return false;
}

function alrt(title, content) {

    swal(title, content);
}

function alrtError(title, content) {
    swal({
        title: title,
        text: content,
        html: true, // add this if you want to show HTML
        type: "error" // type can be error/warning/success
    });
}

function alrtSucess(title, content) {
    swal({
        title: title,
        text: content,
        html: true, // add this if you want to show HTML
        type: "success" // type can be error/warning/success
    });
}

function alrtConfirm(title, content, confirmRedirect) {
    swal({
        title: title,
        text: content,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: share_trans.YesIamsure,
        cancelButtonText: share_trans.Nocancelit,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
    }, function (isConfirm) {
        if (isConfirm) {
            location.href = confirmRedirect;
        }
    })
}

function focusRed(input) {
    $("input").focusout();
    $("select").focusout();
    $("input").attr("style", "border-color:none;");
    $("select").attr("style", "border-color:none;");
    $(input).focus();
    element = $(input).attr("style", "border-color:red;");
}

function removeFocusRed(input) {
    element = $(input).removeAttr("style")
}

function modal(title, content) {
    $("#modal_url").attr("data-title", title);
    alert(content);
    $("#modalMsgTitle").html(title);
    $('#modal_url').removeData('.bs.modal');
    $("#modalMsgBody").html(content);
    $('#modal_url').modal('show');
    $('[data-toggle="tooltip"]').tooltip();
}
function loadUrlBigModal(title, url) {
    $("#big_modal_url").attr("data-title", title);
    $("#big_modal_url").attr("data-url", url);
    $("#bigmodalMsgTitle").html(title);
    $('#big_modal_url').removeData('.bs.modal');
    $("#BigmodalMsgBody").load(url);
    $('#big_modal_url').modal('show');
    $('[data-toggle="tooltip"]').tooltip();
}

function loadUrlModal(title, url, size) {
    if (size) {
        $("#modal_url").find('.modal-dialog').addClass(size);
    }
    $("#modal_url").attr("data-title", title);
    $("#modal_url").attr("data-url", url);
    $("#modalMsgTitle").html(title);
    $('#modal_url').removeData('.bs.modal');
    $("#modalMsgBody").html('').load(url);
    $('#modal_url').modal('show');
    $('[data-toggle="tooltip"]').tooltip();
}

function updateModalUrl() {

    url = $("#modal_url").attr("data-url");
    title = $("#modal_url").attr("data-title");
    loadUrlModal(title, url);
}

function loadIframe(title, url) {
    $("#modal_url").attr("data-title", title);
    $("#modalMsgTitle").html(title);
    $('#modal_url').removeData('.bs.modal');
    $('#modal_url .modal-dialog').addClass('modal-lg');
    $("#modalMsgBody").load(url);
    $('#modal_url').modal('show');
    $('[data-toggle="tooltip"]').tooltip();
}

function loadUrlInDiv(url, element) {
    fBlockUiLoading();
    $(element).load(url, function () {
        endLoading();
        $('[data-toggle="tooltip"]').tooltip();
    });
}

function maskFields(field, mask) {
    $(field).mask(mask);
}

function loadUserResume(id) {
    console.log(URL + '/bo/user/resume/' + id);
    loadUrlModal('', URL + '/bo/user/resume/' + id);
}

function maskMoney(element) {
    $(element).maskMoney({thousands: '', decimal: '.', allowZero: true, affixesStay: false, prefix: SUFIX_MONEY + ' '});
}

function maskPercentage(element) {
    $(element).maskMoney({thousands: '', decimal: '.', allowZero: true, affixesStay: false, prefix: '% '});
}

function selectAct(element) {
    action = $(element).val();
    base_url = $(element).attr('data-url');
    id = $(element).attr('data-id');
    if (action == 'delete') {
        if (confirm(share_trans.confirmacao_delete)) {
            readUrl(base_url + "/" + id + "/delete");
        }
    } else if (action == 'edit') {
        loadUrlModal(share_trans.edit, base_url + "/" + id + "/edit");
    } else if (action == 'view') {
        loadUrlModal(share_trans.visualizar, base_url + "/" + id + "/show");
    } else if (action == 'pay_invoice') {
        loadUrlModal(share_trans.pagar_fatura, URL + "/bo/invoice/" + $(element).attr('reference-invoice'));
    } else if (action == 'confirm_payment') {
        $("#cofirm_invoice_id_2").val(id);
        $("#formConf").submit();
    } else if (action == 'cancell_invoice') {
        $("#cofirm_invoice_id").val(id);
        $("#formConfirmInvoice").attr('action', base_url + "/cancell/?cancell_invoice_id=" + id);
        $("#formConfirmInvoice").submit();
    } else if (action == 'cancell_invoice_user') {
        url = base_url + "/" + id + "/cancell";
        if (confirm(share_trans.ctz_cancel_invc)) {
            readUrlWithPin(url, false);
        }


    } else if (action == 'trackin_code') {
        loadUrlModal(share_trans.visualizar, base_url + "/" + id + "/tracking_code");
    } else if (action == 'trackin_code_dist') {
        loadUrlModal(share_trans.visualizar, URL + "/bo/order_dist/" + id + "/tracking_code");
    } else if (action == 'confirm_delivery') {
        if (confirm(share_trans.confirmacao_entrega)) {
            readUrl(base_url + "/" + id + "/confirm_delivery");
        }


    } else if (action == 'pay_with_amount') {
        location.href = URL + "/bo/financial/pay_invoice/" + id;
    } else if (action == 'contacts') {
        loadUrlModal("", URL + "/bo/order/" + id + "/contacts");
    } else if (action == 'authorize_board') {
        if (confirm("VocÃª tem certeza?")) {
            url = base_url + "/" + id + "/authorize_board";
            readUrl(url);
            console.log(url);
        }

    } else if (action == 'notification_board') {
        if (confirm("VocÃª tem certeza?")) {
            url = base_url + "/" + id + "/notification_board";
            readUrl(url);
            console.log(url);
        }

    } else if (action == 'resend_link_sms') {
        url = base_url + "/" + id + "/sms/resend";
        readUrl(url);
        console.log(url);
    } else if (action == 'resend_link_email') {
        url = base_url + "/" + id + "/email/resend";
        readUrl(url);
        console.log(url);
    } else if (action == 'order_confirm_ship') {
        url = URL + "/" + URL_2 + "/store_order/" + id + "/confirm_payment";
        readUrlWithPin(url);
    } else if (action == 'confirm_wizard') {
        url = URL + "/" + URL_2 + "/store_order/" + id + "/confirm_wizard";
        loadUrlModal(share_trans.visualizar, url);
    } else if (action == 'view_product') {
        location.href = URL + "/" + URL_2 + "/store_order_product/" + id;
    } else if (action == 'order_confirm') {
        url = URL + "/" + URL_2 + "/store_order/" + id + "/confirm_payment";
        readUrlWithPin(url);
    } else if (action == 'change_status') {
        url = URL + "/" + URL_2 + "/store_order/" + id + "/change_status";
        loadUrlModal(share_trans.visualizar, url);
    } else if (action == 'profit_schedule_execute') {
// alert("k")
        if (confirm("VocÃƒÂª tem certeza?")) {
            url = base_url + "/" + id + "/confirm";
            readUrlWithPin(url);
            //console.log(url);
            //alert(url);

        }

    } else if (action == 'check_transaction') {

        loadUrlModal(share_trans.ativar_com_hash, URL + "/bo/invoice/" + $(element).attr('reference-invoice') + "/check_transaction");
    } else if (action == 'update_status') {

        loadUrlModal(share_trans.atualizar_status, URL + "/bo/invoice/" + $(element).attr('reference-invoice') + "/update_status");
    } else if (action == 'confirm_wtd_confirm') {
        url = URL + "/" + URL_2 + "/withdrawal_confirmation/" + id + "/confirm";
        readUrlWithPin(url);
        //loadUrlModal(share_trans.atualizar_status, URL + "/bo/invoice/" + $(element).attr('reference-invoice') + "/update_status");

    } else if (action == 'confirm_wtd_cancell') {
        url = URL + "/" + URL_2 + "/withdrawal_confirmation/" + id + "/cancell";
        readUrlWithPin(url);
        //loadUrlModal(share_trans.atualizar_status, URL + "/bo/invoice/" + $(element).attr('reference-invoice') + "/update_status");

    }
}

function editTicket(id) {
    url = URL + "/" + URL2 + "/ticket/" + id + "/messages";
    loadUrlModal(share_trans.editar, url);
}

function updateNotifications() {
    $.getJSON(URL + "/" + URL_2 + "/notification/last", function (data) {
        $("#last_notifications").html(data.html_notifications);
        if (data.total > 0) {
            $("#alertNotification").show();
        } else {
            $("#alertNotification").hide();
        }

    });
}

function searchCep() {
    startLoading();
    cep = $("#zipcode").val();
    cep.replace("-", "");
    url = 'https://api.postmon.com.br/v1/cep/' + cep;
    $.getJSON(url, function (data) {
        if (typeof data.logradouro === 'undefined' || typeof data.bairro === 'undefined' || typeof data.estado === 'undefined' || typeof data.cidade === 'undefined') {
            endLoading();
            alrtError(share_trans.ocorreu_erro, share_trans.cep_nao_encontrado);
        } else {
            cidade = data.cidade;
            uf = data.estado

            bairro = data.bairro;
            endereco = data.logradouro;
            cidadeSemAcento = cidade;
            if (uf == 'AC') {
                uf = 'Acre';
            } else if (uf == 'AL') {
                uf = 'Alagoas';
            } else if (uf == 'AP') {
                uf = 'AmapÃ¡';
            } else if (uf == 'AM') {
                uf = 'Amazonas';
            } else if (uf == 'BA') {
                uf = 'Bahia';
            } else if (uf == 'CE') {
                uf = 'CearÃ¡';
            } else if (uf == 'DF') {
                uf = 'Distrito Federal';
            } else if (uf == 'ES') {
                uf = 'EspÃ­rito Santo';
            } else if (uf == 'GO') {
                uf = 'GoiÃ¡s';
            } else if (uf == 'MA') {
                uf = 'MaranhÃ£o';
            } else if (uf == 'MT') {
                uf = 'Mato Grosso';
            } else if (uf == 'MS') {
                uf = 'Mato Grosso do Sul';
            } else if (uf == 'MG') {
                uf = 'Minas Gerais';
            } else if (uf == 'PA') {
                uf = 'ParÃ¡';
            } else if (uf == 'PB') {
                uf = 'ParaÃ­ba';
            } else if (uf == 'PR') {
                uf = 'ParanÃ¡';
            } else if (uf == 'PE') {
                uf = 'Pernambuco';
            } else if (uf == 'PI') {
                uf = 'PiauÃ­';
            } else if (uf == 'RJ') {
                uf = 'Rio de Janeiro';
            } else if (uf == 'RN') {
                uf = 'Rio Grande do Norte';
            } else if (uf == 'RS') {
                uf = 'Rio Grande do Sul';
            } else if (uf == 'RO') {
                uf = 'RondÃ´nia';
            } else if (uf == 'RR') {
                uf = 'Roraima';
            } else if (uf == 'SC') {
                uf = 'Santa Catarina';
            } else if (uf == 'SP') {
                uf = 'SÃ£o Paulo';
            } else if (uf == 'SE') {
                uf = 'Sergipe';
            } else if (uf == 'TO') {
                uf = 'Tocantins';
            }

            /*$estadosBrasileiros = array(
             
             
             'RJ'=>'Rio de Janeiro',
             'RN'=>'Rio Grande do Norte',
             'RS'=>'Rio Grande do Sul',
             'RO'=>'RondÃ´nia',
             'RR'=>'Roraima',
             'SC'=>'Santa Catarina',
             'SP'=>'SÃ£o Paulo',
             'SE'=>'Sergipe',
             'TO'=>'Tocantins'
             );*/
            console.log(data);
            $("#state option").each(function (i) {
                if ($(this).text() == uf) {
                    $("#state").val($(this).val())
                    urlCOmbo = URL + '/jcombo?action=get_cities&isHtml=true&id=' + $(this).val() + "&selected_name=" + cidadeSemAcento;
                    console
                    console.log(urlCOmbo);
                    $.get(urlCOmbo, function (data) {
                        $("#cityDiv").html(data);
                        console.log(data);
                        $("#address").val(endereco);
                        $("#neighborhood").val(bairro);
                    });
                }


            });
        }


        endLoading();
    }).fail(function () {
        endLoading();
        alrtError(share_trans.ocorreu_erro, share_trans.cep_nao_encontrado);
    });
}

function showNotification(id) {
    loadUrlModal(share_trans.visualizar, URL + "/" + URL_2 + "/notification/" + id + "/show");
}

function retira_acentos(str) {

    com_acento = "Ã€ÃÃ‚ÃƒÃ„Ã…Ã†Ã‡ÃˆÃ‰ÃŠÃ‹ÃŒÃÃŽÃÃÃ‘Ã’Ã“Ã”Ã•Ã–Ã˜Ã™ÃšÃ›ÃœÃÅ”ÃžÃŸÃ Ã¡Ã¢Ã£Ã¤Ã¥Ã¦Ã§Ã¨Ã©ÃªÃ«Ã¬Ã­Ã®Ã¯Ã°Ã±Ã²Ã³Ã´ÃµÃ¶Ã¸Ã¹ÃºÃ»Ã¼Ã½Ã¾Ã¿Å•";
    sem_acento = "AAAAAAACEEEEIIIIDNOOOOOOUUUUYRsBaaaaaaaceeeeiiiionoooooouuuuybyr";
    novastr = "";
    for (i = 0; i < str.length; i++) {
        troca = false;
        for (a = 0; a < com_acento.length; a++) {
            if (str.substr(i, 1) == com_acento.substr(a, 1)) {
                novastr += sem_acento.substr(a, 1);
                troca = true;
                break;
            }
        }
        if (troca == false) {
            novastr += str.substr(i, 1);
        }
    }
    return novastr;
}

function copyToClipBoard(element_id) {
    var copyText = document.getElementById(element_id);
    copyText.select();
    document.execCommand("Copy");
    alert("Copied the text: " + copyText.value);
}

function goBack() {
    window.history.back();
}

function updateMaskCellphone() {
    val = $("#ddi_cellphone").val();
    if (val == 55) {
        $("#cell_phone").mask("(99) 99999-9999");
    } else {
        $("#cell_phone").unmask();
    }

}

function updateMaskLandline() {
    val = $("#ddi_landline").val();
    if (val == 55) {
        $("#landline").mask("(99) 9999-9999");
    } else {
        $("#landline").unmask();
    }

}

function modalUrl2(ele) {
    title = $(ele).attr("data-modal-title");
    url = $(ele).attr("data-modal-url");
    loadUrlModal(title, url);
}

function randomiza(n) {
    var ranNum = Math.round(Math.random() * n);
    return ranNum;
}

function mod(dividendo, divisor) {
    return Math.round(dividendo - (Math.floor(dividendo / divisor) * divisor));
}

function gerarCPF() {
    comPontos = true; // TRUE para ativar e FALSE para desativar a pontuaÃ§Ã£o.

    var n = 9;
    var n1 = randomiza(n);
    var n2 = randomiza(n);
    var n3 = randomiza(n);
    var n4 = randomiza(n);
    var n5 = randomiza(n);
    var n6 = randomiza(n);
    var n7 = randomiza(n);
    var n8 = randomiza(n);
    var n9 = randomiza(n);
    var d1 = n9 * 2 + n8 * 3 + n7 * 4 + n6 * 5 + n5 * 6 + n4 * 7 + n3 * 8 + n2 * 9 + n1 * 10;
    d1 = 11 - (mod(d1, 11));
    if (d1 >= 10)
        d1 = 0;
    var d2 = d1 * 2 + n9 * 3 + n8 * 4 + n7 * 5 + n6 * 6 + n5 * 7 + n4 * 8 + n3 * 9 + n2 * 10 + n1 * 11;
    d2 = 11 - (mod(d2, 11));
    if (d2 >= 10)
        d2 = 0;
    retorno = '';
    if (comPontos)
        cpf = '' + n1 + n2 + n3 + '.' + n4 + n5 + n6 + '.' + n7 + n8 + n9 + '-' + d1 + d2;
    else
        cpf = '' + n1 + n2 + n3 + n4 + n5 + n6 + n7 + n8 + n9 + d1 + d2;
    return cpf;
}

function confirmSendBalance() {
    form = $("#formTransBalance");
    rece = $("#recipient_trans").val();
    val = $("#value_trans").val();
    if (rece != '') {

        urlAjax = URL + "/user/basic_info?login=" + rece;
        console.log(urlAjax);
        $.getJSON(urlAjax, function (data) {
            if (data.status) {
                if (data.plan_id == 4) {
                    if (parseInt(val) >= 150 && parseFloat(val) <= 299.99) {
                        textAlert = 'Ao realizar uma transferÃªncia para uma conta Elite Exchange o saldo serÃ¡ disponibilizado na carteira B do associado, sendo que, a partir deste momento, sÃ³ servirÃ¡ para pagamento de faturas com saldo, e nÃ£o poderÃ¡ ser transferido nem retirado. Tem certeza que deseja continuar essa transaÃ§Ã£o?';
                    } else {
                        textAlert = share_trans.Vocetemcertezaquedesejaenviar + " " + SUFIX_MONEY + val + " " + share_trans.para + " @" + rece + "-" + data.name + "?";
                    }
                } else {
                    textAlert = share_trans.Vocetemcertezaquedesejaenviar + " " + SUFIX_MONEY + val + " " + share_trans.para + " @" + rece + "-" + data.name + "?";
                }
                swal({
                    title: share_trans.transferir_saldo,
                    text: textAlert,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: share_trans.YesIamsure,
                    cancelButtonText: share_trans.Nocancelit,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }, function (isConfirm) {
                    if (isConfirm) {
                        return sendWithValidation(form, true);
                    }
                })


            } else {
                alrtError(share_trans.ocorreu_erro, share_trans.user_not_found);
            }

        });
        return false;
    }
}

function modalValidate(id) {
    url = URL + "/bo/daily_activity/validate/" + id;
    loadUrlModal("Validate", url);
}

function validateActivity(activityId) {
    modalValidate(activityId)
}

function shareActivity(activityId, link) {

    link2 = atob(link);
    id = activityId;
    //  alert(link2)
    FB.ui({
        method: 'share',
        href: link2,
    }, function (response) {
        if (response && !response.error_code) {
            modalValidate(activityId);
        } else {
            //alert('Post was not published.');
        }


    });
}
function refreshCart() {
    url = URL + "/" + URL_2 + "/store/cart";
    console.log(url)

    loadUrlModal("Carrinho de compras", url);
}
function updateCart(product_id, qntd) {
    url = URL + "/" + URL_2 + "/store/cart/add/" + product_id + "/" + qntd;
    readUrl(url);
    refreshCart();
    refreshCart();
}
function addToCart(product_id, qntd) {
    url = URL + "/" + URL_2 + "/store/cart/add/" + product_id + "/" + qntd;
    readUrl(url);
    refreshCart();
    refreshCart();
}
function removeProductCart(product_id) {
    url = URL + "/" + URL_2 + "/store/cart/rm/" + product_id;
    console.log(url)
    if (confirm("Tem certeza que quer remover este produto do carrinho?")) {
        $.getJSON(url, function (data) {
            if (data.result) {
                refreshCart();
            } else {
                alrtError(share_trans.ocorreu_erro, "Ocorreu um erro ao remover o produto.");
            }

        });
    } else {
        return false;
    }


}
function closeModal(id) {

    $(id).modal('toggle');
}
function updatePriceDeliveryCd(cdId) {

    type = $("#shipping_type").val();
    address_id = $("#address_select").val();
    if (address_id != "none" && type != "none") {
        url = URL + "/bo/product/delivery_calc/" + address_id + "/" + type + "?distributor_id=" + cdId;
        console.log(url)

        loadUrlInDiv(url, '#dataDelivery')
    }
}
function updatePriceDelivery() {

    type = $("#shipping_type").val();
    address_id = $("#address_select").val();
    if (address_id != "none" && type != "none") {
        url = URL + "/bo/product/delivery_calc/" + address_id + "/" + type + "?distributor_id=" + cdAddressId;
        console.log(url)

        loadUrlInDiv(url, '#dataDelivery')
    }
}
function updateAllProductPriceDelivery() {
    typeShp = $(".shipping_type:first").val();
    addr = $(".address_select:first").val();
    if (typeShp != "none" && addr != "none") {
        console.log(products_ids)
        $.each(products_ids, function (index, value) {
            $("#shipping_type_" + value + " .shipping_type").val(typeShp);
            $("#address_" + value + " .address_select").val(addr)
            updatePriceDelivery(value);
        });
    }
}
function generateCode(div) {
    var length = 8,
            charset = "0123456789",
            retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
    $(div).val(retVal);
    return retVal;
}
function removeSufixMoney(str) {
    return str.replace(SUFIX_MONEY + ' ', "");
}
function changePeriod(element, currentDate) {
    url = document.URL;
    //alert(url)
    if (url.includes('SelectedPeriod')) {
        url = url.replace(currentDate, $(element).val());
        location.href = url;
    } else {
        if (url.includes('?')) {
            location.href = url + "&SelectedPeriod=" + $(element).val();
        } else {
            location.href = url + "?SelectedPeriod=" + $(element).val();
        }

    }

}
function maskDate(field) {
    maskFields(field, MASk_DATE);
}
function addCustomCity(id) {
    current = $(id + " option[value='51408']").text();
    $.confirm({
        title: share_trans.Insiranomedasuacidade,
        content: '<div class="clearfix"></div>' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>' + share_trans.register_cidade + '</label>' +
                '<input type="text" class="custom_city form-control" placeholder="Ex: Rio de janeiro" value="' + current + '"/>' +
                '</div>' +
                '</form>',
        buttons: {
            formSubmit: {
                text: share_trans.Inserir,
                btnClass: 'btn-blue',
                action: function () {

                    var custom_city = this.$content.find('.custom_city').val();
                    if (custom_city == '') {
                        $.alert(share_trans.Insiranomedasuacidade);
                        return false;
                    } else {
                        $(id + " option[value='51408']").each(function () {
                            $(this).remove();
                        });
                        $(id).append('<option value="51408" selected="selected">' + custom_city + '</option>');
                        $("#custom_city_name").val(custom_city)

                    }
                }
            },
            cancel: function () {
                // alert("kkk")
            }
        }
    });
    return false;
}
function checkCityChange(element) {
}
function closeModelRegisterType() {
    selectedType = $('input[name=registerType]:checked').val();
    planId = $("#plan_id").val();
    url = URL + '/bo/plan/select/' + planId + "?standard=1";
    if (selectedType == 0) {
        url = URL + '/bo/user/update_info2?pland_id=' + planId;
        location.href = url;
    } else if (selectedType == 1) {
        readUrl(url);
    }

}
function chanceOrderStatus(id) {
    url = URL + "/" + URL_2 + "/store_order/" + id + "/change_status";
    //alert(url);
    loadUrlModal(share_trans.visualizar, url);
}
function selectPlan(planId) {
    $("#modalRegisterType").modal();
    $("#plan_id").val(planId);
}

function countDown(timeLeft, divId) {
    /*var count = timeLeft;
    var counter = setInterval(timer, 1000);
    function timer() {
        count = count - 1;
        if (count == -1) {
            clearInterval(counter);
            return;
        }

        var seconds = count % 60;
        var minutes = Math.floor(count / 60);
        var hours = Math.floor(minutes / 60);
        minutes %= 60;
        hours %= 60;
        if (seconds >= 0 && 10 > seconds) {
            seconds = 0 + "" + seconds;
        }
        if (minutes >= 0 && 10 > minutes) {
            minutes = 0 + "" + minutes;
        }
        if (hours >= 0 && 10 > hours) {
            hours = 0 + "" + hours;
        }

        document.getElementById(divId).innerHTML = hours + ":" + minutes + ":" + seconds;
    }*/


}
function requestWtd() {

    loadUrlModal(share_trans.solicitar_saque, URL + "/bo/withdrawal/request");
}
function dlChartHome(labelsProfit, dataProfit, daysDl) {
    if ($("#dlChart").length) {
        var lineChart = $("#dlChart");

        var lineData = {
            labels: labelsProfit,
            datasets: [{
                    label: "",
                    fill: false,
                    lineTension: 0.3,
                    backgroundColor: "#fff",
                    borderColor: "#047bf8",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "#141E41",
                    pointBorderWidth: 3,
                    pointHoverRadius: 10,
                    pointHoverBackgroundColor: "green",
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 3,
                    pointRadius: 5,
                    pointHitRadius: 10,
                    data: dataProfit,
                    spanGaps: false
                }]
        };

        var myLineChart = new Chart(lineChart, {

            type: 'line',
            data: lineData,
            options: {
                tooltips: {
                    enabled: true,
                    mode: 'single',
                    callbacks: {
                        title: function (tooltipItems, data) {
                            // return "A";
                            index = tooltipItems[0].index;

                            return daysDl[index];
                        },
                        label: function (tooltipItems, data) {
                            valor = labelsProfit[tooltipItems.index];
                            val = parseFloat(tooltipItems.yLabel);
                            if (val == 0) {
                                return valor + ' (%' + val + ")";

                            } else {
                                p = (val / 100);

                                return valor + ' (%' + p + ")";


                            }

                        }
                    }
                },
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                            ticks: {
                                fontSize: '11',
                                fontColor: '#969da5',

                            },
                            gridLines: {
                                color: 'rgba(0,0,0,0.05)',
                                zeroLineColor: 'rgba(0,0,0,0.05)'
                            }
                        }],
                    yAxes: [{
                            display: false,
                            ticks: {
                                beginAtZero: true,
                                max: 200
                            }
                        }]
                }
            }
        });
    }
}

function addToClipBoard(txt) {
    $("#inputContecntCopy").val(txt);
    /* Get the text field */
    var copyText = document.getElementById("inputContecntCopy");

    /* Select the text field */
    copyText.select();

    /* Copy the text inside the text field */
    document.execCommand("copy");

    $('#btnLinkRegister').popover('show');

    setTimeout(function () {
        $('#btnLinkRegister').popover('hide');
    }, 5000)

}
function chartHomeBar(monts, values) {
    var colors = ["#5797FC", "#629FFF", "#6BA4FE", "#74AAFF", "#7AAEFF", '#85B4FF', "#5797FC", "#629FFF", "#6BA4FE", "#74AAFF", "#7AAEFF", ];

    // init donut chart if element exists
    if ($("#chartResumeBonus").length) {
        var barChart1 = $("#chartResumeBonus");
        var barData1 = {
            labels: monts,
            datasets: [{
                    label: "Rendimento total",
                    backgroundColor: colors,
                    borderColor: ['rgba(255,99,132,0)', 'rgba(54, 162, 235, 0)', 'rgba(255, 206, 86, 0)', 'rgba(75, 192, 192, 0)', 'rgba(153, 102, 255, 0)', 'rgba(255, 159, 64, 0)'],
                    borderWidth: 1,
                    data: values
                }]
        };
        // -----------------
        // init bar chart
        // -----------------
        new Chart(barChart1, {
            type: 'bar',
            data: barData1,
            options: {
                tooltips: {
                    enabled: true,
                    mode: 'single',
                    callbacks: {

                        label: function (tooltipItems, data) {

                            val = parseFloat(tooltipItems.yLabel);
                            return "Rendimento mensal: U$" + val;

                        }
                    }
                },
                scales: {
                    xAxes: [{
                            display: false,
                            legend: false,
                            ticks: {
                                fontSize: '11',
                                fontColor: '#969da5'
                            },
                            gridLines: {
                                color: 'rgba(0,0,0,0.05)',
                                zeroLineColor: 'rgba(0,0,0,0.05)'
                            }
                        }],
                    yAxes: [{
                            legend: false,

                            ticks: {
                                beginAtZero: true
                            },
                            gridLines: {
                                color: 'rgba(0,0,0,0.05)',
                                zeroLineColor: '#6896f9'
                            }
                        }]
                },
                legend: {
                    display: false
                },
                animation: {
                    animateScale: true
                }
            }
        });
    }
}
function createTableHistoryPoint() {

// Setup - add a text input to each footer cell
    $('#financial_history tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<div class="form-group"><input type="text" class="form-control" placeholder="' + share_trans.busca_coluna + '" ' + title + '" />');
    });

    columns = [
        {data: 'id', name: 'id'},
        {data: "sender_name", name: "sender_name"},
     

        {
            data: "created_at", name: "created_at"
        }, {
            data: "direction", name: "direction"
        }, {data: "amount", name: "amount"}

    ];

    table = $('#financial_history').DataTable({
        processing: true,
        serverSide: true,
        "searching": true,
        "order": [[0, "desc"]],
        ajax: urlAjax,
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ atÃ© _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 atÃ© 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por pÃ¡gina",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "PrÃ³ximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Ãšltimo"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
        columns: columns
    });
    $.fn.dataTable.ext.classes.sPageButton = 'button primary_button';
// Apply the search
    table.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that
                        .search(this.value)
                        .draw();
            }
        });
    });
    $("#financial_history_length").html("");
}
function createTableHistory(from, to) {

// Setup - add a text input to each footer cell
    $('#financial_history tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<div class="form-group"><input type="text" class="form-control" placeholder="' + share_trans.busca_coluna + '" ' + title + '" />');
    });

    columns = [
        {data: 'id', name: 'id'},
        {data: "sender_name", name: "sender_name"},
        {
            data: "type_name", name: "type_name"
        },

        {
            data: "created_at", name: "created_at"
        }, {data: "amount", name: "amount"},
    ];

    table = $('#financial_history').DataTable({
        processing: true,
        serverSide: true,
        "searching": true,
        "order": [[0, "desc"]],
        ajax: urlAjax,
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ atÃ© _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 atÃ© 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por pÃ¡gina",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "PrÃ³ximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Ãšltimo"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
        columns: columns
    });
    $.fn.dataTable.ext.classes.sPageButton = 'button primary_button';
// Apply the search
    table.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that
                        .search(this.value)
                        .draw();
            }
        });
    });
    $("#financial_history_length").attr("style", "width:70%");
    $("#financial_history_length").html("<div class='col-md-11'><form class='form-inline'><div class='col-md-4'><div class='form-group'><label>De:</label><input type='date' id='date_min' class='form-control' value='" + from + "'></div></div><div class='col-md-4'><div class='form-group'><label>AtÃ©:</label><input type='date' id='date_max' value='" + to + "' class='form-control'></div></div><div class='col-md-4'><button type='submit' class='btn btn-primary' onclick='reloadTable()'>Pesquisar</button></div></div></form></div>");
}