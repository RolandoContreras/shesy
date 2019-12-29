function ver_order(invoice_id){    
     var url = 'catalogo/order/'+invoice_id;
     location.href = site+url;   
}
function back_list(){
	var url= 'catalogo/order';
	location.href = site+url;
}
