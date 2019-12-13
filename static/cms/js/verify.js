function verify_status_count(){
    
	 $.ajax({
            type: "post",
            url: site+"dashboard/verificaciones/verificacion/",
            dataType: "json",
            success:function(data){  
//			alert("El Tag ha sido eliminado")          
          	location.reload();
            }         
     });  
}
