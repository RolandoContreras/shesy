function forget(){
    var username = document.getElementById("username").value;
    //GET DATA RECAPTCHA
    var response = grecaptcha.getResponse();
    //VERIFY DATA RECAPTCHA
    if(response.length == 0){
        document.getElementById("captcha_messages").style.display = "block";
    } else {
        if(username == ""){
            document.getElementById("no_messages").style.display = "block";
            document.getElementById("captcha_messages").style.display = "none";
            $("#username").focus();
        }else{
            $.ajax({
               type: "post",
               url: site+"login/forget",
               dataType: "json",
               data: {username : username},
               success:function(data){          
                   if(data.status == "true"){
                       document.getElementById("no_messages").style.display = "none";
                       document.getElementById("captcha_messages").style.display = "none";
                       document.getElementById("messages").style.display = "block";
                   }else{
                       document.getElementById("captcha_messages").style.display = "none";
                       document.getElementById("no_messages").style.display = "block";
                   }
               }         
             });
            }
    }
}