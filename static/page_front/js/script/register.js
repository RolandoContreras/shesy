function register(){
    var parent_id = document.getElementById("parent_id").value;
    var parent_id_2 = document.getElementById("parent_id_2").value;
    var username = document.getElementById("username").value;
    var pass = document.getElementById("pass").value;
    var name = document.getElementById("name").value;
    var last_name = document.getElementById("last_name").value;
    var email = document.getElementById("email").value;
    var dni = document.getElementById("dni").value;
    var phone = document.getElementById("phone").value;
    var address = document.getElementById("address").value;
    var country = document.getElementById("country").value;
    //GET DATA RECAPTCHA
    var response = grecaptcha.getResponse();
        if(response.length == 0){
        document.getElementById("captcha_messages").style.display = "block";
    }else{
        //validate
        if(name == ""){
            document.getElementById("message_name").style.display = "block";
            $("#name").focus();
        }else if(username == ""){
            document.getElementById("message_username").style.display = "block";
            $("#username").focus();
        }else if(pass == ""){
            document.getElementById("message_pass").style.display = "block";
            $("#pass").focus();
        }else if(last_name == ""){
            document.getElementById("message_last_name").style.display = "block";
            $("#last_name").focus();
        }else if(email == ""){
            document.getElementById("message_email").style.display = "block";
            $("#email").focus();
        }else if(dni == ""){
            document.getElementById("message_dni").style.display = "block";
            $("#dni").focus();
        }else if(phone == ""){
            document.getElementById("message_phone").style.display = "block";
            $("#phone").focus();
        }else if(address == ""){
            document.getElementById("message_address").style.display = "block";
            $("#address").focus();
        }else if(address == ""){
            document.getElementById("message_address").style.display = "block";
            $("#address").focus();
        }else if(country == ""){
            document.getElementById("message_pais").style.display = "block";
            $("#message_pais").focus();
        }else{
            
            var email_2 = validar_email(email);
            if(email_2 == true){
                   $.ajax({
                        type: "post",
                        url: site+"register/validate",
                        dataType: "json",
                        data: {name : name,
                                parent_id : parent_id,
                                parent_id_2 : parent_id_2,
                                username : username,
                                last_name : last_name,
                                email : email,
                                dni : dni,
                                phone : phone,
                                pass : pass,
                                address : address,
                                country : country},
                        success:function(data){
                            if(data.status == "username"){
                                document.getElementById("message_username").style.display = "block";
                                $("#username").focus();
                            }else{
                                document.getElementById("messages").style.display = "block";
                                location.href = site + "backoffice";
                            }
                        }         
                      }); 
                   
            }else{
                document.getElementById("message_email").style.display = "block";
                $("#email").focus();
            }
        }
    }
}

function validar_email( email ){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}

function validate_username(username){
    if(username == ""){
        $(".alert-0").removeClass('text-success').addClass('text-danger').html("Usuario Invalido <i class='fa fa-times-circle-o' aria-hidden='true'></i>");
    }else{
        $.ajax({
        type: "post",
        url: site + "register/validate_username",
        dataType: "json",
        data: {username: username},
        success:function(data){            
            if(data.message == "true"){         
                $(".alert-0").removeClass('text-success').addClass('text-danger').html(data.print);
            }else{
                $(".alert-0").removeClass('text-danger').addClass('text-success').html(data.print);
            }
        }            
        });
    }
}

function validate_username_2(username){
    if(username == ""){
        $(".alert-1").removeClass('text-success').addClass('text-danger').html("Usuario Invalido <i class='fa fa-times-circle-o' aria-hidden='true'></i>");
    }else{
        $.ajax({
        type: "post",
        url: site + "register/validate_username_2",
        dataType: "json",
        data: {username: username},
        success:function(data){            
            if(data.message == "true"){
                document.getElementById("parent_id_2").value=data.value;
                $(".alert-1").removeClass('text-danger').addClass('text-success').html(data.print);
            }else{
                $(".alert-1").removeClass('text-success').addClass('text-danger').html(data.print);
            }
        }            
        });
    }
}

function Numtext(string){//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890';//Caracteres validos
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}