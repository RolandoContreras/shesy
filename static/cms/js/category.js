function new_category(){
	var url= 'dashboard/categorias/load';
	location.href = site+url;
}
function edit_category(category_id){    
     var url = 'dashboard/categorias/load/'+category_id;
     location.href = site+url;   
}
function cancel_category(){
	var url= 'dashboard/categorias';
	location.href = site+url;
}