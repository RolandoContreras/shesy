function new_video(){
	var url= 'dashboard/videos/load';
	location.href = site+url;
}
function edit_videos(video_id){    
     var url = 'dashboard/videos/load/'+video_id;
     location.href = site+url;   
}
function cancel_video(){
	var url= 'dashboard/videos';
	location.href = site+url;
}
function upload_img(){
  var input = document.getElementById('image_file_2').value;
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
function delete_video(video_id){
    bootbox.confirm({
    message: "¿Confirma que desea eliminar el vídeo?",
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
                       url: site+"dashboard/videos/delete",
                       dataType: "json",
                       data: {video_id : video_id},
                       success:function(data){                             
                               if(data.status == true){
                                   Swal.fire({
                                      position: 'top-end',
                                      icon: 'success',
                                      title: 'Vídeo Eliminado.',
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
    }
    });
}