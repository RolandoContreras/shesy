function edit_course(id) {
    var url = 'publicidad/editar_curso/' + id;
    location.href = site + url;
}
function edit_catalog(id) {
    var url = 'publicidad/editar_catalogo/' + id;
    location.href = site + url;
}

function delete_course(id) {
    Swal.fire({
        title: '¿Desea eliminar la campaña?',
        text: "Esta se eliminará permanentemente!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, quiero eliminarla!',
        showLoaderOnConfirm: true,
        preConfirm: function() {
            return new Promise(function(resolve) {
                $.ajax({
                    type: "post",
                    url: site + "publicidad/delete_course",
                    dataType: "json",
                    data: {id: id},
                    success:function(data){     
                        if(data.status == true){  
                            Swal.fire('Eliminado', 'La campaña fue eliminada.', 'success');
                            window.setTimeout( function(){
                                window.location = site+"publicidad";
                            }, 1500 );    
                        }else{
                            Swal.fire('Oops...', 'Sucedio un problema !', 'error')
                        }
                    }            
                });
            });
        },
    });
}

function delete_catalog(id) {
    Swal.fire({
        title: '¿Desea eliminar la campaña?',
        text: "Esta se eliminará permanentemente!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, quiero eliminarla!',
        showLoaderOnConfirm: true,
        preConfirm: function() {
            return new Promise(function(resolve) {
                $.ajax({
                    type: "post",
                    url: site + "publicidad/delete_catalog",
                    dataType: "json",
                    data: {id: id},
                    success:function(data){     
                        if(data.status == true){  
                            Swal.fire('Eliminado', 'La campaña fue eliminada.', 'success');
                            window.setTimeout( function(){
                                window.location = site+"publicidad";
                            }, 1500 );    
                        }else{
                            Swal.fire('Oops...', 'Sucedio un problema !', 'error')
                        }
                    }            
                });
            });
        },
    });
}

function get_campana(type){
    $.ajax({
        type: "post",
        url: site + "publicidad/get_campana",
        dataType: "json",
        data: {type: type},
        success:function(data){            
            if(data.status == true){  
                var sub_campana = document.getElementByClass("dropdown-menu");
                var str = '';
                data.obj_data.forEach(function(value) {
                    str += "<option value="+value.id+"> "+value.name+"</option>";
                });
                sub_campana.innerHTML = str;
            }
        }            
    });
}

function get_campana_catalog(type){
    $.ajax({
        type: "post",
        url: site + "publicidad/get_campana_catalog",
        dataType: "json",
        data: {type: type},
        success:function(data){            
            if(data.status == true){  
                var sub_campana = document.getElementById("sub_campana");
                var str = '';
                data.obj_data.forEach(function(value) {
                    str += "<option value="+value.course_id+"> "+value.name+"</option>";
                });
                sub_campana.innerHTML = str;
            }
        }            
    });
}


function save_campana(){
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Creando ...";
    oData = new FormData(document.forms.namedItem("campana"));
    $.ajax({
        url: site + "publicidad/save_campana",
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
                    title: 'Campaña Creada',
                    showConfirmButton: false,
                    footer: 'Su campaña se encuentra activa',
                    timer: 1500
                  });
                  window.setTimeout( function(){
                    window.location = site+"publicidad";
                }, 1500 );  
            } else {
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").innerHTML = "Crear Campaña";
                Swal.fire({
                    icon: 'info',
                    title: 'Ups! Ocurrio un error',
                    footer: 'Inténtelo nuevamente'
                  });
            }
        }
    });        
}