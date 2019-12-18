function new_catalog(){
	var url= 'dashboard/catalogo/load';
	location.href = site+url;
}
function edit_catalog(catalog_id){    
     var url = 'dashboard/catalogo/load/'+catalog_id;
     location.href = site+url;   
}
function cancel_catalog(){
	var url= 'dashboard/catalogo';
	location.href = site+url;
}