function change_pass(){
    var pass = document.getElementById("pass").value;
    var new_pass = document.getElementById("new_pass").value;
    var new_pass_confirm = document.getElementById("new_pass_confirm").value;
    //VERIFY DATA RECAPTCHA
        
            if(pass == ""){
                document.getElementById("pass_error").style.display = "block";
                $("#pass").focus();
            }else if(new_pass == ""){
                document.getElementById("pass_error").style.display = "block";
                $("#new_pass").focus();
            }else if(new_pass_confirm == ""){
                document.getElementById("pass_error").style.display = "block";
                $("#new_pass_confirm").focus();
            }else{
                if(new_pass == new_pass_confirm){
                    $.ajax({
                       type: "post",
                       url: site+"backoffice/profile/update_password",
                       dataType: "json",
                       data: {pass : pass,
                              new_pass : new_pass,
                              new_pass_confirm : new_pass_confirm},
                       success:function(data){          
                           if(data.status == "true"){
                               document.getElementById("pass_error").style.display = "none";
                               document.getElementById("error_no_equal").style.display = "none";
                               document.getElementById("pas_success").style.display = "block";
                               location.reload();
                           }else{
                               document.getElementById("pass_error").style.display = "block";
                               $("#pass").focus();
                           }
                       }         
                     });
                }else {
                        document.getElementById("pass_error").style.display = "none";
                        document.getElementById("error_no_equal").style.display = "block";
                        $("#new_pass").focus();
                }
            } 
}   

function change_wallet(){
    var wallet = document.getElementById("wallet").value;
        if(wallet == ""){
            document.getElementById("wallet_error").style.display = "block";
            $("#wallet").focus();
        }else{
                $.ajax({
                   type: "post",
                   url: site+"backoffice/profile/update_wallet",
                   dataType: "json",
                   data: {wallet : wallet},
                   success:function(data){          
                       if(data.status == "true"){
                           document.getElementById("wallet_error").style.display = "none";
                           document.getElementById("wallet_success").style.display = "block";
                           location.reload();
                       }else{
                           document.getElementById("wallet_error").style.display = "none";
                       }
                   }         
                });
        }
} 
