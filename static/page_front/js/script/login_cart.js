function validate_login(){
            $.ajax({
               type: "post",
               url: site+"login/validate_cart",
               dataType: "json",
               data: {},
               success:function(data){          
                   if(data.status == "true"){
                       location.href = site + "mi_catalogo/pay_order";
                   }else{
                       location.href = site + "login";
                   }
               }         
             });
}