function ver_order(invoice_id){    
     var url = 'catalogo/order/'+invoice_id;
     location.href = site+url;   
}
function back_list(){
	var url= 'catalogo/order';
	location.href = site+url;
}
function send_invoice(){
        $.ajax({
          url: site + "catalogo/order/send_invoice",
          type: "POST",
          data: form,
         success:function(data){            
                if(data.status == "true"){
                    document.getElementById("message_success").style.display = "block";
                    document.location.reload();
                }
            } 
        });
}