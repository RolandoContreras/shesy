function new_range(){    
     var url = 'dashboard/rangos/load';
     location.href = site+url;   
}
function edit_ranges(range_id){    
     var url = 'dashboard/rangos/load/'+range_id;
     location.href = site+url;   
}
function cancel_ranges(){
	var url= 'dashboard/rangos';
	location.href = site+url;
}