function active(invoice_id,customer_id){
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
    callback: function () {
         $.ajax({
                   type: "post",
                   url: site+"dashboard/contra-entrega/active",
                   dataType: "json",
                   data: {invoice_id : invoice_id,
                          customer_id:customer_id
                          },
                   success:function(data){ 
                       if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            title: 'Procesado',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location = site + "dashboard/contra-entrega";
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
    });
}
function view_order(invoice_id){
    var url = 'dashboard/contra-entrega/'+invoice_id;
     location.href = site+url;   
}

function back_list_contra_entrega(){
    var url = 'dashboard/contra-entrega';
     location.href = site+url;   
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