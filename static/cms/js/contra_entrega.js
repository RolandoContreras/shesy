function active(invoice_id, customer_id, total) {
    Swal.fire({
        title: 'Confirma que desea procesar el registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: site + "dashboard/contra-entrega/active",
                dataType: "json",
                data: {invoice_id: invoice_id,
                        customer_id: customer_id,
                        total: total,},
                success: function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Procesado',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        setTimeout(function () {
                            location.href = site + "dashboard/contra-entrega"
                        }, 1000);
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
      })
}

function view_order(invoice_id) {
    var url = 'dashboard/contra-entrega/' + invoice_id;
    location.href = site + url;
}

function back_list_contra_entrega() {
    var url = 'dashboard/contra-entrega';
    location.href = site + url;
}
function delete_contra_entrega(invoice_id) {
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
                    url: site + "dashboard/contra-entrega/delete",
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
                                window.location = site + "dashboard/contra-entrega";
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
function entregado(id) {
    bootbox.confirm({
        message: "¿Confirma que desea cambiar el estado a entregado?",
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
                    url: site + "dashboard/contra-entrega/entregado",
                    dataType: "json",
                    data: {id: id},
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Cambiado',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.setTimeout(function () {
                                location.reload()
                            }, 1000);
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