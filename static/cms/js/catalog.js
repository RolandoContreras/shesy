function new_catalog(){
	var url= 'dashboard/catalogo/load';
	location.href = site+url;
}
function edit_catalog(catalog_id){    
     var url = 'dashboard/catalogo/load/'+catalog_id;
     location.href = site+url;   
}
function cancel_catalog(){
	var url= 'dashboard/catalogo';
	location.href = site+url;
}
function upload_img(){
  var input = document.getElementById('image_file').value;
    if(input != null){
        $("#respose_img").html();
            var texto = "";
            texto = texto+'Seleccionado: ';
            texto = texto+ input;
            $("#respose_img").html(texto);
            $("#label_img").removeClass("invalid").addClass("valid");
    }else{
        $("#label_img").removeClass("valid").addClass("invalid");
    }
}
function upload_img2(){
  var input = document.getElementById('image_file2').value;
    if(input != null){
        $("#respose_img2").html();
            var texto = "";
            texto = texto+'Seleccionado: ';
            texto = texto+ input;
            $("#respose_img2").html(texto);
            $("#label_img2").removeClass("invalid").addClass("valid");
    }else{
        $("#label_img2").removeClass("valid").addClass("invalid");
    }
}
function upload_img3(){
  var input = document.getElementById('image_file3').value;
    if(input != null){
        $("#respose_img").html();
            var texto = "";
            texto = texto+'Seleccionado: ';
            texto = texto+ input;
            $("#respose_img3").html(texto);
            $("#label_img3").removeClass("invalid").addClass("valid");
    }else{
        $("#label_img3").removeClass("valid").addClass("invalid");
    }
}
function delete_catalog(catalog_id){
    bootbox.confirm({
    message: "¿Confirma que desea eliminar el producto?",
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
    callback: function () {
         $.ajax({
                   type: "post",
                   url: site+"dashboard/catalogo/delete",
                   dataType: "json",
                   data: {catalog_id : catalog_id},
                   success:function(data){                             
                       if(data.status == true){
                               Swal.fire({
                                  position: 'top-end',
                                  icon: 'success',
                                  title: 'Producto Eliminado.',
                                  showConfirmButton: false,
                                  timer: 1500
                                })
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
    });
}