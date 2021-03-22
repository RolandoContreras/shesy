function new_activate() {
    var url = 'dashboard/activaciones/load';
    location.href = site + url;
}
function cancel_activate_kit() {
    var url = 'dashboard/activaciones';
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