function edit_points(binaries_id){    
     var url = 'dashboard/puntos/load/'+binaries_id;
     location.href = site+url;   
}
function cancel_points(){
	var url= 'dashboard/puntos';
	location.href = site+url;
}
function validate_customer(customer_id){
        $.ajax({
        type: "post",
        url: site + "dashboard/puntos/validate_customer",
        dataType: "json",
        data: {customer_id: customer_id},
        success:function(data){            
            if(data.message == "true"){
                document.getElementById("username").value=data.username;    
                document.getElementById("name").value=data.name;
                $("#alert_message").html(data.print);
            }else{
                $("#alert_message").html(data.print);
            }
        }            
    });
}
