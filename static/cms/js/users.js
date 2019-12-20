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