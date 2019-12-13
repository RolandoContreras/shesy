function pagado(pay_id){
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
                   data: {pay_id : pay_id},
                   success:function(data){                             
                   location.reload();
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
                   location.reload();
                   }         
           });
    }
});
}