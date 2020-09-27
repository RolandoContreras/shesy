function pagado(pay_id,customer_id, total){
    bootbox.confirm({
    message: "Confirma que desea marcar como pagado?",
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
                   url: site+"dashboard/pagos/pagado",
                   dataType: "json",
                   data: {pay_id : pay_id,
                          customer_id : customer_id,
                          total : total},
                   success:function(data){                             
                       if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Procesado',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout('document.location.reload()', 1500);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ups...',
                                text: 'Sucedió un error',
                                footer: '<a href>Vuelve a intentarlo!</a>'
                            });
                        }
                   }         
           });
    }
});
}

function devolver(pay_id){
     bootbox.confirm({
    message: "Confirma que desea marcar como devuelto?",
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
                   url: site+"dashboard/pagos/devolver",
                   dataType: "json",
                   data: {pay_id : pay_id},
                   success:function(data){                             
                   if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Procesado',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout('document.location.reload()', 1500);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ups...',
                                text: 'Sucedió un error',
                                footer: '<a href>Vuelve a intentarlo!</a>'
                            });
                        }
                   }         
           });
    }
});
}