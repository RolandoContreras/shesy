function guardar_btc(comment_id){
    
    btc_price = $("#btc_price").val();
    
     bootbox.dialog("Confirma que desea guardar el precio del bitcoin?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/panel/guardar_btc",
                   dataType: "json",
                   data: {btc_price : btc_price},
                   success:function(data){                             
                   location.reload();
                   }         
           });
            }
        }
    ]);
}
function message_public(){
    
    var title = $("#title").val();
    var message_content = $("#message_content").val();
    
     bootbox.dialog("Confirma que desea enviar el mensaje?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/panel/masive_messages",
                   dataType: "json",
                   data: {title : title,
                          message_content : message_content},
                   success:function(data){                             
                        bootbox.dialog(data.message, [        
                            { "label" : "Cerrar"}
                        ]);
//                   location.reload();
                   }         
           });
            }
        }
    ]);
}
function change_state(comment_id){
     bootbox.dialog("Confirma que desea marcar como contestado?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/panel/cambiar_status",
                   dataType: "json",
                   data: {comment_id : comment_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
            }
        }
    ]);
}