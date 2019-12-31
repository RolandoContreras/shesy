function add_cart(catalog_id,price,name){
        $.ajax({
            type: "post",
            url: site + "catalog/order/add_cart",
            dataType: "json",
            data: {quantity: 1,
                   catalog_id: catalog_id,
                   price: price,
                   name: name},

            success:function(data){            
                if(data.status == "true"){
                    document.getElementById("message_success").style.display = "block";
                    document.location.reload();
                }
            }            
        });
    }
function add_cart_number(catalog_id,price,name){
    var quantity = document.getElementById("quantity").value;
    if(quantity == ""){
        document.getElementById("quantity_error").style.display = "block";
        $("#quantity").focus();
    }else{
        $.ajax({
            type: "post",
            url: site + "catalog/order/add_cart",
            dataType: "json",
            data: {quantity: quantity,
                   catalog_id: catalog_id,
                   price: price,
                   name: name},

            success:function(data){            
                if(data.status == "true"){
                    document.getElementById("quantity_error").style.display = "none";
                    document.getElementById("message_success").style.display = "block";
                    document.location.reload();
                }else{
                    document.getElementById("quantity_error").style.display = "block";
                }
            }            
        });
    }
}

