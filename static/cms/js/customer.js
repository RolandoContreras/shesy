function active(customer_id){
    bootbox.dialog("Confirma que desea marcar al cliente como calificado para el binario?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/clientes/active_customer",
               dataType: "json",
               data: {customer_id : customer_id},
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}

function no_active(customer_id){
    bootbox.dialog("Confirma que desea marcar al cliente como no calificado para el binario?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/clientes/no_active_customer",
               dataType: "json",
               data: {customer_id : customer_id},
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}
function edit_customer(customer_id){    
     var url = 'dashboard/clientes/load/'+customer_id;
     location.href = site+url;   
}
function cancelar_customer(){
	var url= 'dashboard/clientes';
	location.href = site+url;
}
