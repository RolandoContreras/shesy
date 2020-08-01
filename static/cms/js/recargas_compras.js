function new_recargas_compras(){    
     var url= 'dashboard/recargas_compras/load';
     location.href = site+url;
}
function edit_recargas_compras(comission_id){    
     var url = 'dashboard/recargas_compras/load/'+comission_id;
     location.href = site+url;   
}
function cancel_recargas_compras(){
	var url= 'dashboard/recargas_compras';
	location.href = site+url;
}
function delete_recargas_compras(comission_id){
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
                   url: site+"dashboard/recargas_compras/delete",
                   dataType: "json",
                   data: {comission_id : comission_id},
                   success:function(data){ 
                       if(data.status == true){
                           Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              title: 'Recarga Compra Eliminada.',
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
function recargar_compra(){
    var customer_id = document.getElementById("customer_id").value;
    var amount = document.getElementById("amount").value;
    var commissions_id = document.getElementById("commissions_id").value;
    var active = document.getElementById("active").value;
    bootbox.confirm({
    message: "¿Confirma que desea hacer la recarga de compra?",
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
                   url: site+"dashboard/recargas_compras/validate",
                   dataType: "json",
                   data: {customer_id : customer_id,
                          amount:amount,
                          commissions_id:commissions_id,
                          active:active},
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
      var url =  site+"dashboard/recargas_compras";
      $(location).attr('href',url);  
}
