function validate_videos(course_id) {
    var video_id = document.getElementById("video_id").value;
    var name = document.getElementById("name").value;
    var video = document.getElementById("video").value;
    var type = document.getElementById("type").value;
    var module_id = document.getElementById("module_id").value;
    var time = document.getElementById("time").value;
    var active = document.getElementById("active").value;
    $.ajax({
        type: "post",
        url: site + "dashboard/videos/" + course_id + "/validate",
        dataType: "json",
        data: {video_id: video_id,
            name: name,
            video: video,
            type: type,
            module_id: module_id,
            course_id: course_id,
            time: time,
            active: active
        },
        success: function (data) {
            if (data.status == true) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Cambios Guardado',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.setTimeout(function () {
                    window.location = site + "dashboard/videos/" + course_id;
                }, 1500);
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


function back_cursos(){
	var url= 'dashboard/cursos';
	location.href = site+url;
}
function new_video(course_id){
	var url= 'dashboard/videos/'+course_id+'/load';
	location.href = site+url;
}
function edit_video(course_id, video_id){    
     var url = 'dashboard/videos/'+course_id+'/load/'+video_id;
     location.href = site+url;   
}
function cancel_video(course_id){
	var url= 'dashboard/videos/'+course_id;
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