function edit_binary(binaries_id){    
     var url = 'dashboard/puntos_binario/load/'+binaries_id;
     location.href = site+url;   
}
function cancel_binary(){
	var url= 'dashboard/puntos_binario';
	location.href = site+url;
}
function validate_customer(customer_id){
        $.ajax({
        type: "post",
        url: site + "dashboard/puntos_binario/validate_customer",
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
