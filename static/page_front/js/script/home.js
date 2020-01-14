function send_embassy(){
    var name = document.getElementById("name").value;
    var last_name = document.getElementById("last_name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    //GET DATA RECAPTCHA
    var response = grecaptcha.getResponse();
    //VERIFY DATA RECAPTCHA
    if(response.length == 0){
        $("#res").html();
        var texto = "";
        texto = texto+'<div class="alert alert-danger">';
        texto = texto+'<p style="text-align: center;">Captcha no verificado</p>';
        texto = texto+'</div>';                 
        $("#res").html(texto);
    } else {
        if(name == ""){
            $("#res").html();
            var texto = "";
            texto = texto+'<div class="alert alert-danger">';
            texto = texto+'<p style="text-align: center;">Ingrese su nombre</p>';
            texto = texto+'</div>';                 
            $("#res").html(texto);
            $("#name").focus();
        }else if(last_name == ""){
            $("#res").html();
            var texto = "";
            texto = texto+'<div class="alert alert-danger">';
            texto = texto+'<p style="text-align: center;">Ingrese su apellido</p>';
            texto = texto+'</div>';                 
            $("#res").html(texto);
            $("#last_name").focus();
        }else if(email == ""){
            $("#res").html();
            var texto = "";
            texto = texto+'<div class="alert alert-danger">';
            texto = texto+'<p style="text-align: center;">Ingrese su correo</p>';
            texto = texto+'</div>';                 
            $("#res").html(texto);
            $("#email").focus();
        }else if(phone == ""){
            $("#res").html();
            var texto = "";
            texto = texto+'<div class="alert alert-danger">';
            texto = texto+'<p style="text-align: center;">Ingrese su teléfono</p>';
            texto = texto+'</div>';                 
            $("#res").html(texto);
            $("#phone").focus();
        }else{
            $.ajax({
               type: "post",
               url: site+"home/embassy",
               dataType: "json",
               data: {name : name,
                      last_name : last_name,
                      email : email,
                      phone : phone},
               success:function(data){          
                   if(data.result == "true"){
                        $("#res").html();
                        var texto = "";
                        texto = texto+'<div class="alert alert-success">';
                        texto = texto+'<p style="text-align: center;">Mensaje enviado. Nos comunicaremos contigo</p>';
                        texto = texto+'</div>';                 
                        $("#res").html(texto);
                       location.href = site + "embassy";
                   }else{
                       $("#res").html();
                        var texto = "";
                        texto = texto+'<div class="alert alert-danger">';
                        texto = texto+'<p style="text-align: center;">Sucedió un error, vuelva a intentarlo</p>';
                        texto = texto+'</div>';                 
                        $("#res").html(texto);
                   }
               }         
             });
            }
    }
}