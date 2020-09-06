function make_pay(){
      var amount = document.getElementById("amount").value;
      var tax =  document.getElementById("tax").value;
      var result = document.getElementById("result").value;
      var total_disponible = document.getElementById("total_disponible").value;
      if(amount == ""){
          document.getElementById("pay_alert").style.display = "block";
          $("#amount").focus();
      }else if(tax == ""){
          document.getElementById("pay_alert").style.display = "block";
      }else if(result == ""){
          document.getElementById("pay_alert").style.display = "block";
      }else{
          if(result > total_disponible){
              document.getElementById("pay_alert").style.display = "block";
          }else{
              $.ajax({
                type: "post",
                url: site + "backoffice/pay/make_pay",
                dataType: "json",
                data: {amount: amount,
                       tax:tax,
                       result:result,
                       total_disponible:total_disponible},
                success:function(data){
                    if(data.status == '1'){
                        document.getElementById("pay_alert").style.display = "block";
                    }else{
                        document.getElementById("pay_alert").style.display = "none";
                        document.getElementById("pay_success").style.display = "block";
                        location.reload();
                    }
                }            
        });
          }
          
      }
        
        
}

function validate_amount(amount){
        $.ajax({
        type: "post",
        url: site + "backoffice/pay/validate_amount",
        dataType: "json",
        data: {amount: amount},
        success:function(data){
            document.getElementById("tax").value = data.tax;
            document.getElementById("result").value = data.result;
        }            
        });
}

function Numtext(string){//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = '.1234567890';//Caracteres validos
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}