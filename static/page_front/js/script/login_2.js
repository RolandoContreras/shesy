function login(){
    var code = document.getElementById("code").value;
    var pass = document.getElementById("pass").value;
    //GET DATA RECAPTCHA
    var response = grecaptcha.getResponse();
    //VERIFY DATA RECAPTCHA
    if(response.length == 0){
        document.getElementById("captcha_messages").style.display = "block";
    } else {
        if(code == ""){
            document.getElementById("no_messages").style.display = "block";
            document.getElementById("captcha_messages").style.display = "none";
            $("#code").focus();
        }else if(pass == ""){
            document.getElementById("no_messages").style.display = "block";
            document.getElementById("captcha_messages").style.display = "none";
            $("#pass").focus();
        }else{
            $.ajax({
               type: "post",
               url: site+"login/validate",
               dataType: "json",
               data: {code : code,
                      pass : pass},
               success:function(data){          
                   if(data.status == "true"){
                       document.getElementById("no_messages").style.display = "none";
                       document.getElementById("captcha_messages").style.display = "none";
                       document.getElementById("messages").style.display = "block";
                       location.href = site + "backoffice";
                   }else if(data.status == "true2"){
                       document.getElementById("no_messages").style.display = "none";
                       document.getElementById("captcha_messages").style.display = "none";
                       document.getElementById("messages").style.display = "block";
                       location.href = site + "mi_catalogo/pay_order";
                   }else{
                       document.getElementById("captcha_messages").style.display = "none";
                       document.getElementById("no_messages").style.display = "block";
                   }
               }         
             });
            }
    }
}

function validar_email( email ){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}
function fade_email(string){
    var string = document.getElementById("email").value;
    if(string != ""){ 
        document.getElementById("message_email").style.display = "none";
    }
}
function fade_password(string){
    var string = document.getElementById("password").value;
    if(string != ""){ 
        document.getElementById("message_password").style.display = "none";
    }
}