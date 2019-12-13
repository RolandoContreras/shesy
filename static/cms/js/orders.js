function view_details(order_id){
     var url = 'dashboard/pedidos/ver_detalle/'+order_id;
     location.href = site+url;
}
function change_state(order_id){
     bootbox.dialog("Confirma que desea cambiar el estado a Enviado?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/pedidos/cambiar_status",
                   dataType: "json",
                   data: {order_id : order_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
            }
        }
    ]);
}
