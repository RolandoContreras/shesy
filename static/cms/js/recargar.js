function cancelar_recarga(){
	var url= 'dashboard/recargas';
	location.href = site+url;
}
function nueva_recargar(){
	var url= 'dashboard/recargas/load';
	location.href = site+url;
}
function details_customer(customer_id){
        var url= 'dashboard/recargas/load/'+customer_id;
	location.href = site+url;
}