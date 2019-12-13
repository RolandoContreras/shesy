$(function() { 
    $('#add_tag').on('click', function(){  
	t_id = $("#tag_id").val();   
	  
    t_name = $("#tag_name").val();        
    t_status= $("#tag_status").val();
    
    if (t_name == "" ){ 
        alert("Ingrese un nombre para el tag.");
    }else {
        if($('#add_tag').html!="Guardar"){
        
        $.ajax({
            type: "post",
            url: site+"dashboard/tags/add_tag",
            dataType: "json",
            data: {
                name : t_name, 
                status : t_status,
				tag_id : t_id
            },
            success:function(data){            
                if (data.message=="true"){
                    get_tags();
                    $("#tag_name").val("");
     var url = 'dashboard/tags';
     location.href = site+url;

                }else{
                    alert(data.print);                    
                }
            }
        }); 
        }else{
            alert("yoho");
        }
     }
    });
 });
 
 
function eliminar_tag(tag_id){  
	 $.ajax({
            type: "post",
            url: site+"dashboard/tags/delete/",
            dataType: "json",
            data: {tag_id : tag_id},
            success:function(data){  
			alert("El Tag ha sido eliminado")          
          	location.reload();
            }         
     });  
}

function get_tags(){
    $.ajax({
            type: "post",
            url: site+"dashboard/tags/getAllTags",
            dataType: "json",
            data:{valname:"hola"},
            success:function(data){            
                if (data.message=="true"){
                    $('#alltags').html(data.print);
                
                }
            }
        });
    
}

function edit_tag(tag_id){      
    
    var t_id =tag_id;   
    
    $.ajax({
            type: "post",
            url: site+"dashboard/tags/load",
            dataType: "json",
            data:{tag_id:t_id},
            success:function(data){            
                if (data.message=="true"){
                    $('#tag_id').val(data.print3); 					
                    $('#tag_name').val(data.print); 
                    $('#add_tag').html("Guardar");
                    if(data.print2==1){
                    $('#tag_status').val('Activo');
                    }else{
                      $('#tag_status').val('Inactivo');  
                    }
                }
            }
        });
    
     //location.href = site+'dashboard/tags'; 
}

function cancelar_tag(){
	var url= 'dashboard/tags';
	location.href = site+url;
}
