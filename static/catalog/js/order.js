function ver_order(invoice_id){    
     var url = 'mi_catalogo/order/'+invoice_id;
     location.href = site+url;   
}
function complete_data(invoice_id){    
    var url = 'mi_catalogo/complete_order/'+invoice_id;
    location.href = site+url;   
}
function back_list(){
	var url= 'mi_catalogo/order';
	location.href = site+url;
}
function send_invoice(){
        $.ajax({
          url: site + "mi_catalogo/order/send_invoice",
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
function procesar_data_landing(){
    document.getElementById("save_entrega").disabled = true;
    document.getElementById("save_entrega").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    oData = new FormData(document.forms.namedItem("data_adicional"));
    $.ajax({
        url: site + "mi_catalogo/order/validate_data_landing",
        method: "POST",
        data: oData,
        contentType: false,
        cache: false,
        processData: false,
     success:function(data){          
            var data = JSON.parse(data);  
            if(data.status == true){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Datos Guardados',
                    showConfirmButton: false,
                    timer: 1500
                })
                window.setTimeout(function () {
                    window.location = site + "mi_catalogo/order";
                }, 1500);
            }else{
                document.getElementById("save_entrega").disabled = true;
                document.getElementById("save_entrega").innerHTML = "Solicitar Pedido";
            }
        } 
    });
}
