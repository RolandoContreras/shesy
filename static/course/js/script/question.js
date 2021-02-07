function send_question() {
    bootbox.confirm({
        message: "¿Confirma que desea enviar la pregunta",
        buttons: {
            confirm: {
                label: 'Confirmar',
                className: 'btn-success'
            },
            cancel: {
                label: 'Cerrar',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result == true) {
                oData = new FormData(document.forms.namedItem("question-form"));
                $.ajax({
                    url: site + "virtual/send_message",
                    method: "POST",
                    data: oData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        var res = JSON.parse(data);
                        if (res.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Pregunta Enviada',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.setTimeout(function () {
                                location.reload()
                            }, 2500);
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Ups! Sucedio un error ',
                                footer: "Comunicar a soporte"
                            });
                        }
                    }
                });
            }
        }
    });
}
function show_question() {
    document.getElementById("question").style.display = "none";
    document.getElementById("button_back").style.display = "block";
    document.getElementById("comment").style.display = "block";
}
function show_list() {
    document.getElementById("button_back").style.display = "none";
    document.getElementById("comment").style.display = "none";
    document.getElementById("question").style.display = "block";
}
function show_respose(id) {
    var doom = "respose_"+id;
    document.getElementById(doom).style.display = "block";
}
function close_respose(id) {
    var doom = "respose_"+id;
    document.getElementById(doom).style.display = "none";
}



