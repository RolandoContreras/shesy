/* VALIDACIONES Y FUNCIONABILIDAD DEL MODULO LOGIN
     * ======================================================= */
$(".btn-primary").on("click",function(){
     username = $("#username").val();
     password = $("#password").val();     
     
    $.ajax({
        type: "Post",
        url: "dashboard/validate",
        dataType: "json",
        data: {email : username, password:password},
        success:function(data){            
            if (data.message == "false"){                         
                $("#mensaje").html();
                 var texto = "";
                 texto = texto+'<div class="alert alert-danger">';
                 texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                 texto = texto+'<p>'+data.print+'</p>';
                 texto = texto+'</div>';                 
                 $("#mensaje").html(texto);
            }else{
                $("#mensaje").html();
                 var texto = "";
                 texto = texto+'<div class="alert alert-success">';
                 texto = texto+'<button class="close" data-dismiss="alert" type="button">×</button>';
                 texto = texto+'<p>'+data.print+'</p>';
                 texto = texto+'</div>';                 
                 $("#mensaje").html(texto);                     
                 $(location).attr('href',data.url);  
            }
        }            
    });
});