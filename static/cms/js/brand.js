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
            url: site+"dashboard/marcas/add_brand",
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
     var url = 'dashboard/marcas';
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
 
 
function eliminar_brand(brand_id){  
	 $.ajax({
            type: "post",
            url: site+"dashboard/marcas/delete/",
            dataType: "json",
            data: {brand_id : brand_id},
            success:function(data){  
			alert("La Marca ha sido eliminada")          
          	location.reload();
            }         
     });  
}

function get_tags(){
    $.ajax({
            type: "post",
            url: site+"dashboard/marcas/getAllTags",
            dataType: "json",
            data:{valname:"hola"},
            success:function(data){            
                if (data.message=="true"){
                    $('#alltags').html(data.print);
                
                }
            }
        });
    
}

function edit_brand(brand_id){      
    
    var t_id =brand_id;   
    
    $.ajax({
            type: "post",
            url: site+"dashboard/marcas/load",
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
 }

function cancelar_tag(){
	var url= 'dashboard/marcas';
	location.href = site+url;
}
