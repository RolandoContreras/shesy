function new_recargas(){    
     var url= 'dashboard/recargas/load';
     location.href = site+url;
}
function edit_recargas(point_id){    
     var url = 'dashboard/recargas/load/'+point_id;
     location.href = site+url;   
}
function cancel_recargas(){
	var url= 'dashboard/recargas';
	location.href = site+url;
}
function delete_recargas(point_id){
    bootbox.confirm({
    message: "¿Confirma que desea eliminar la recarga?",
    buttons: {
        confirm: {
            label: 'Confirmar',
            className: 'btn-success'
        },
        cancel: {
            label: 'Cerrar',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        if(result == true){
            $.ajax({
                   type: "post",
                   url: site+"dashboard/recargas/delete",
                   dataType: "json",
                   data: {point_id : point_id},
                   success:function(data){ 
                       if(data.status == true){
                           Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              title: 'Recarga Eliminada.',
                              showConfirmButton: false,
                              timer: 1500
                            });
                            setTimeout('document.location.reload()',1500);
                       }else{
                           Swal.fire({
                              icon: 'error',
                              title: 'Ups...',
                              text: 'Sucedió un error',
                              footer: '<a href>Vuelve a intentarlo!</a>'
                            });
                       }
                   }         
           });
        }
      }
    });
}
function validate_user(username){
    if(username == ""){
        $(".alert-0").removeClass('text-success').addClass('text-danger').html("Usuario Invalido <i class='fa fa-times-circle-o' aria-hidden='true'></i>");
    }else{
        $.ajax({
        type: "post",
        url: site + "dashboard/activaciones/validate_user",
        dataType: "json",
        data: {username: username},
        success:function(data){            
            if(data.message == "true"){         
                $(".alert-0").removeClass('text-danger').addClass('text-success').html(data.print);
                var inputCustomer_id = document.getElementById("customer_id");
                inputCustomer_id.value = data.customer_id;
                var inputCustomer = document.getElementById("customer");
                inputCustomer.value = data.name;
                var inputDni = document.getElementById("dni");
                inputDni.value = data.dni;
            }else{
                $(".alert-0").removeClass('text-success').addClass('text-danger').html(data.print);
            }
        }            
        });
    }
}
function recargar(){
    var customer_id = document.getElementById("customer_id").value;
    var points = document.getElementById("points").value;
    bootbox.confirm({
    message: "¿Confirma que desea hacer la recarga?",
    buttons: {
        confirm: {
            label: 'Confirmar',
            className: 'btn-success'
        },
        cancel: {
            label: 'Cerrar',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        if(result == true){
            $.ajax({
                   type: "post",
                   url: site+"dashboard/recargas/validate",
                   dataType: "json",
                   data: {customer_id : customer_id,
                          points:points},
                   success:function(data){ 
                       if(data.status == true){
                           Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              title: 'Recarga Exitosa',
                              showConfirmButton: false,
                              timer: 1500
                            });
                            window.setInterval(href_recargas, 1500);
                       }else{
                           Swal.fire({
                              icon: 'error',
                              title: 'Ups...',
                              text: 'Sucedió un error',
                              footer: '<a href>Vuelve a intentarlo!</a>'
                            });
                       }
                   }         
           });
        }
      }
    });
}
function href_recargas() {
      var url =  site+"dashboard/recargas";
      $(location).attr('href',url);  
}
