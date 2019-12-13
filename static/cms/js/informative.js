function new_informative(){
        var url= 'dashboard/informativos/load';
	location.href = site+url;
}
function edit_informative(otros_id){    
     var url = 'dashboard/informativos/load/'+otros_id;
     location.href = site+url;   
}
function delete_informative(otros_id){
     bootbox.dialog("¿Confirma que desea eliminar el registro?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-warning",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/informativos/delete_informative",
                   dataType: "json",
                   data: {otros_id : otros_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
            }
        }
    ]);
}
function cancel_informative(){
	var url= 'dashboard/informativos';
	location.href = site+url;
}
