function validate_modulos(course_id) {
    var module_id = document.getElementById("module_id").value;
    var name = document.getElementById("name").value;
    $.ajax({
        type: "post",
        url: site + "dashboard/modulos/" + course_id + "/validate",
        dataType: "json",
        data: {module_id: module_id,
            name: name,
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
                    window.location = site + "dashboard/modulos/" + course_id;
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




function back_cursos() {
    var url = 'dashboard/mis-cursos';
    location.href = site + url;
}
function new_modulo(course_id) {
    var url = 'dashboard/modulos/' + course_id + '/load';
    location.href = site + url;
}
function edit_modulo(course_id, module_id) {
    var url = 'dashboard/modulos/' + course_id + '/load/' + module_id;
    location.href = site + url;
}

function cancel_modulos(course_id) {
    var url = 'dashboard/modulos/' + course_id;
    location.href = site + url;
}
function delete_modulo(module_id) {
    bootbox.confirm({
        message: "¿Confirma que desea eliminar el módulo?",
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
                    url: site + "dashboard/modulos/delete",
                    dataType: "json",
                    data: {module_id: module_id},
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Módulo eliminado',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.setTimeout(function () {
                                location.reload();
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
        }
    });
}
function view_videos(course_id, module_id){    
    var url = 'dashboard/videos/'+course_id+"/modulo/"+module_id;
    location.href = site+url;   
}
