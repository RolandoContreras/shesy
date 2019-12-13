function pago_binario(){
    bootbox.dialog("Confirma que desea procesar el binario?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/jobs/pago_binario",
               dataType: "json",
               data: {},
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}