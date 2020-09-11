function active_enlace_compra(invoice_id, referencia_compra_id, customer_id) {
    bootbox.confirm({
        message: "Confirma que desea procesar el registro?",
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
                    url: site + "dashboard/enlace-compra/active",
                    dataType: "json",
                    data: {invoice_id: invoice_id,
                        customer_id: customer_id,
                        referencia_compra_id: referencia_compra_id
                    },
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                title: 'Procesado',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.setTimeout(function () {
                                window.location = site + "dashboard/enlace-compra";
                            }, 1500);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ups! Hubo un error',
                                footer: 'Comuniquese con soporte',
                            });
                        }
                    }
                });
            }
        }
    });
}
function view_order_enlace_compra(invoice_id) {
    var url = 'dashboard/enlace-compra/' + invoice_id;
    location.href = site + url;
}

function back_list_enlace_compra() {
    var url = 'dashboard/enlace-compra';
    location.href = site + url;
}
function delete_enlace_compra(invoice_id) {
    bootbox.confirm({
        message: "¿Confirma que desea eliminar el pedido?",
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
                $.ajax({
                    type: "post",
                    url: site + "dashboard/enlace-compra/delete",
                    dataType: "json",
                    data: {invoice_id: invoice_id},
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Pedido Eliminado',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.setTimeout(function () {
                                window.location = site + "dashboard/enlace-compra";
                            }, 1500);
                        } else {
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
        }
    });
}
function marcar_enviado(referencia_compra_id) {
    bootbox.confirm({
        message: "¿Confirma que desea marcarlo como enviado?",
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
                $.ajax({
                    type: "post",
                    url: site + "dashboard/enlace-compra/marcar_enviado",
                    dataType: "json",
                    data: {referencia_compra_id: referencia_compra_id},
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Cambiado con éxito',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.setTimeout(function () {
                                window.location = site + "dashboard/enlace-compra";
                            }, 1500);
                        } else {
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
        }
    });
}
