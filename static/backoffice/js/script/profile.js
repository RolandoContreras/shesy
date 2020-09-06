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

function change_bank(){
    var bank_id = document.getElementById("bank_id").value;
    var bank_account = document.getElementById("bank_account").value;
    var bank_number = document.getElementById("bank_number").value;
    var back_number_cci = document.getElementById("back_number_cci").value;
        if(bank_id == ""){
            document.getElementById("wallet_error").style.display = "block";
            $("#bank_id").focus();
        }else if(bank_account == ""){
            document.getElementById("wallet_error").style.display = "block";
            $("#bank_account").focus();
        }else if(bank_number == ""){
            document.getElementById("wallet_error").style.display = "block";
            $("#bank_number").focus();
        }else if(back_number_cci == ""){
            document.getElementById("wallet_error").style.display = "block";
            $("#back_number_cci").focus();
        }else{
                $.ajax({
                   type: "post",
                   url: site+"backoffice/profile/update_bank",
                   dataType: "json",
                   data: {bank_id : bank_id,
                          bank_account : bank_account,
                          bank_number : bank_number,
                          back_number_cci : back_number_cci},
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
