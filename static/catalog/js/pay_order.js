function update_order(id){
    var qty = document.getElementById("qty").value;
    if(qty > 0){
        $.ajax({
            type: "post",
            url: site + "catalogo/pay_order/update_cart",
            dataType: "json",
            data: {id: id,
                   qty: qty},

            success:function(data){            
                if(data.status == "true"){
                    document.getElementById("quantity_error").style.display = "none";
                    document.getElementById("quantity_success").style.display = "block";
                    location.reload();
                }
            }            
        });
    }else{
        document.getElementById("quantity_error").style.display = "block";
    }
}
function delete_order(id){
        $.ajax({
            type: "post",
            url: site + "catalogo/pay_order/delete_cart",
            dataType: "json",
            data: {id: id},
            success:function(data){            
                if(data.status == "true"){
                    location.reload();
                }
            }            
        });
}
function process_pay_invoice(){
        var new_site = site + "catalogo";
        $.ajax({
            type: "post",
            url: site + "catalogo/pay_order/process_pay_invoice",
            dataType: "json",
            data: {},
            success:function(data){            
                if(data.status == "true"){
                    document.getElementById("pay_success_2").style.display = "block";
                    setTimeout(location.href = new_site,2000);
                }
            }            
        });
}
function add_cart(catalog_id,price,name){
    var quantity = document.getElementById("quantity").value;
    var talla = document.getElementById("talla").value;
    var color = document.getElementById("color").value;
    
    if(quantity == ""){
        document.getElementById("quantity_error").style.display = "block";
        $("#quantity").focus();
    }else{
        $.ajax({
            type: "post",
            url: site + "catalogo/order/add_cart",
            dataType: "json",
            data: {quantity: quantity,
                   talla: talla,
                   color: color,
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

