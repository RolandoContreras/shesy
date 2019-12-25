function ver_order(invoice_id){    
     var url = 'catalogo/order/'+invoice_id;
     location.href = site+url;   
}
function back_list(){
	var url= 'catalogo/order';
	location.href = site+url;
}
function add_cart(catalog_id,price,name){
    var quantity = document.getElementById("quantity").value;
    
    if(quantity == ""){
        document.getElementById("quantity_error").style.display = "block";
        $("#quantity").focus();
    }else{
        $.ajax({
            type: "post",
            url: site + "catalogo/order/add_cart",
            dataType: "json",
            data: {quantity: quantity,
                   catalog_id: catalog_id,
                   price: price,
                   name: name},

            success:function(data){            
                if(data.status == "true"){
                    document.getElementById("quantity_error").style.display = "none";
                    document.getElementById("quantity_success").style.display = "block";
                    setTimeout('document.location.reload()',2000);
                }else{
                    document.getElementById("quantity_error").style.display = "none";
                }
            }            
        });
    }
}
