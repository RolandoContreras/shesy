function send(){    
var url = 'dashboard/membresias/validate';
if($('#image_file').val() == ''){
            $("#uploaded_image").html('<div class="alert alert-danger" style="text-align: center">Debe seleccionar la imagen</div>  ');
        }else{
                $.ajax({
                url : site+url,
                method: "POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success:function(data){
                    $("#uploaded_image").html(data);
                }
            });
        }
}
function new_investment(){    
     var url= 'dashboard/inversiones/load';
     location.href = site+url;
}
function edit_investment(investment_id){    
     var url = 'dashboard/inversiones/load/'+investment_id;
     location.href = site+url;   
}
function cancel_investment(){
	var url= 'dashboard/inversiones';
	location.href = site+url;
}
function delete_investment(investment_id){
    bootbox.confirm({
    message: "¿Confirma que desea eliminar la imagen?",
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
    callback: function (e) {
        if(e == true){
            $.ajax({
                   type: "post",
                   url: site+"dashboard/inversiones/delete",
                   dataType: "json",
                   data: {investment_id : investment_id},
                   success:function(data){ 
                       if(data.status == true){
                           Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              title: 'Registro Eliminado.',
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