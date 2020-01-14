function change_state(embassy_id){
  bootbox.confirm({
    message: "Confirma que desea marcarlo como contestado?",
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
                   url: site+"dashboard/embassy/cambiar_status",
                   dataType: "json",
                   data: {embassy_id : embassy_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
    }
});
}
function change_state_no(embassy_id){
    bootbox.confirm({
    message: "Confirma que desea marcarlo como no contestado?",
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
                   url: site+"dashboard/embassy/cambiar_status_no",
                   dataType: "json",
                   data: {embassy_id : embassy_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
    }
});
}
