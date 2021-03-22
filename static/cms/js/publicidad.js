function validate_courses() {
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    oData = new FormData(document.forms.namedItem("courses-form"));
    $.ajax({
        url: site + "dashboard/publicidad/validate",
        method: "POST",
        data: oData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            var data = JSON.parse(data);
            if (data.status == true) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Cambios Guardado',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.setTimeout(function () {
                    window.location = site + "dashboard/publicidad";
                }, 1500);
            } else {
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").innerHTML = "Guardar";
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Sucedio un error',
                    footer: 'Comunique a soporte'
                });
            }
        }
    });
}

function validate_catalog() {
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    oData = new FormData(document.forms.namedItem("catalog-form"));
    $.ajax({
        url: site + "dashboard/publicidad/validate_catalogo",
        method: "POST",
        data: oData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            var data = JSON.parse(data);
            if (data.status == true) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Cambios Guardado',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.setTimeout(function () {
                    window.location = site + "dashboard/publicidad_catalogo";
                }, 1500);
            } else {
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").innerHTML = "Guardar";
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Sucedio un error',
                    footer: 'Comunique a soporte'
                });
            }
        }
    });
}








function cancel_courses() {
    var url = 'dashboard/publicidad';
    location.href = site + url;
}

function cancel_catalog() {
    var url = 'dashboard/publicidad_catalogo';
    location.href = site + url;
}


function edit_course(id) {
    var url = 'dashboard/publicidad/editar_curso/'+ id;
    location.href = site + url;
}

function edit_catalog(id) {
    var url = 'dashboard/publicidad/editar_catalogo/'+ id;
    location.href = site + url;
}

function active(id) {
        bootbox.confirm({
            message: "Confirma que desea activar la campaña?",
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
            callback: function (e) {
                if (e === true) {
                    $.ajax({
                        type: "post",
                        url: site + "dashboard/publicidad/activar_curso",
                        dataType: "json",
                        data: {id: id},
                        success: function (data) {
                            if (data.status == true) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Activado',
                                    showConfirmButton: false
                                  });
                                    setTimeout(function () {
                                        location.href = site + "dashboard/publicidad";
                                    }, 1500);
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'info',
                                    title: 'Ups, sucedio un problema',
                                    footer: 'Intentelo nuevamente',
                                    showConfirmButton: true
                                  });
                            }
                        }
                    });
                }
            }
        });
}

function active_catalog(id) {
    bootbox.confirm({
        message: "Confirma que desea activar la campaña?",
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
        callback: function (e) {
            if (e === true) {
                $.ajax({
                    type: "post",
                    url: site + "dashboard/publicidad/activar_catalogo",
                    dataType: "json",
                    data: {id: id},
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Activado',
                                showConfirmButton: false
                              });
                                setTimeout(function () {
                                    location.href = site + "dashboard/publicidad_catalogo";
                                }, 1500);
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'info',
                                title: 'Ups, sucedio un problema',
                                footer: 'Intentelo nuevamente',
                                showConfirmButton: true
                              });
                        }
                    }
                });
            }
        }
    });
}
  
function delete_course(id) {
    bootbox.confirm({
        message: "Confirma que desea elimiar la campaña?",
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
        callback: function (e) {
            if (e === true) {
                $.ajax({
                    type: "post",
                    url: site + "dashboard/publicidad/delete_curso",
                    dataType: "json",
                    data: {id: id},
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Campaña Eliminada',
                                showConfirmButton: false
                              });
                                setTimeout(function () {
                                    location.href = site + "dashboard/publicidad";
                                }, 1500);
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'info',
                                title: 'Ups, sucedio un problema',
                                footer: 'Intentelo nuevamente',
                                showConfirmButton: true
                              });
                        }
                    }
                });
            }
        }
    });
}

function delete_catalog(id) {
    bootbox.confirm({
        message: "Confirma que desea elimiar la campaña?",
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
        callback: function (e) {
            if (e === true) {
                $.ajax({
                    type: "post",
                    url: site + "dashboard/publicidad/delete_catalogo",
                    dataType: "json",
                    data: {id: id},
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Campaña Eliminada',
                                showConfirmButton: false
                              });
                                setTimeout(function () {
                                    location.href = site + "dashboard/publicidad_catalogo";
                                }, 1500);
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'info',
                                title: 'Ups, sucedio un problema',
                                footer: 'Intentelo nuevamente',
                                showConfirmButton: true
                              });
                        }
                    }
                });
            }
        }
    });
}