function edit_bonus(bonus_id){    
     var url = 'dashboard/bonos/load/'+bonus_id;
     location.href = site+url;   
}
function cancel_bonus(){
	var url= 'dashboard/bonos';
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
