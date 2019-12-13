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
function edit_users(user_id){    
     var url = 'dashboard/usuarios/load/'+user_id;
     location.href = site+url;   
}
function nuevo_users(){
	var url= 'dashboard/usuarios/load';
	location.href = site+url;
}
function cancelar_users(){
	var url= 'dashboard/usuarios';
	location.href = site+url;
}