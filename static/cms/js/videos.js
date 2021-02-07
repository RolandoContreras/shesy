function validate_videos(course_id, module_id) {
    document.getElementById("send").disabled = true;
    document.getElementById("send").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    oData = new FormData(document.forms.namedItem("form"));
    description = CKEDITOR.instances.description.getData();
    oData.append("description", description);
    oData.append("course_id", course_id);
    oData.append("module_id", module_id);
    $.ajax({
        url: site + "dashboard/videos/validate",
        method: "POST",
        data: oData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            var data = JSON.parse(data);
            if (data.status == true) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Cambios Guardado',
                    showConfirmButton: false,
                    timer: 1000
                });
                window.setTimeout(function () {
                    window.location = site + "dashboard/videos/" + course_id+'/modulo/'+module_id;
                }, 1000);
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Sucedio un error',
                    footer: 'Comunique a soporte'
                });
            }
        }
    });
}


function back_module(course_id){
	var url= 'dashboard/modulos/'+course_id;
	location.href = site+url;
}
function new_video(course_id,module_id){
	var url= 'dashboard/videos/'+course_id+'/modulo/'+module_id+'/load';
	location.href = site+url;
}
function edit_video(course_id,module_id, video_id){    
     var url = 'dashboard/videos/'+course_id+'/modulo/'+module_id+'/load/'+video_id;
     location.href = site+url;   
}
function cancel_video(course_id){
	var url= 'dashboard/modulos/'+course_id;
	location.href = site+url;
}
function create_module(){
    var course_id = document.getElementById("course_id").value;
      if(course_id > 0){
            $.ajax({
                   type: "post",
                   url: site+"dashboard/videos/verificar_curso",
                   dataType: "json",
                   data: {course_id : course_id},
                   success:function(data){                             
                   obj_modules = data.obj_modules;
                            var texto = "";
                            texto = texto+'<option value="">Seleccionar Módulo</option>';
                            var x = 0;               
                            $.each(obj_modules, function(){
                                texto = texto+'<option value="'+obj_modules[x]['module_id']+'">'+obj_modules[x]['name']+'</option>';
                                x++; 
                            });
                    $("#module_id").html(texto);
                   }         
           });
        }
}
function delete_video(video_id) {
    bootbox.confirm({
        message: "¿Confirma que desea eliminar el Vídeo?",
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
            if (result == true) {
                $.ajax({
                    type: "post",
                    url: site + "dashboard/videos/delete",
                    dataType: "json",
                    data: {video_id: video_id},
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Vídeo eliminado',
                                showConfirmButton: false,
                                timer: 1000
                            });
                            window.setTimeout(function () {
                                location.reload();
                            }, 1000);
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Sucedio un error',
                                footer: 'Comunique a soporte'
                            });
                        }
                    }
                });
            }
        }
    });
}