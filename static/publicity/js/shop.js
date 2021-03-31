function regresar() {
    var url = 'tienda';
    location.href = site + url;
}
function edit_catalog(id) {
    var url = 'tienda/editar_catalogo/' + id;
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

function save_catalog() {
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    description =  tinyMCE.activeEditor.getContent();
    oData = new FormData(document.forms.namedItem("form_catalog"));
    oData.append("description", description);
    $.ajax({
        url: site + "tienda/validar_catalogo",
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
                    timer: 1500
                });
                window.setTimeout(function () {
                    window.location = site + "tienda";
                }, 1500);
            } else {
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").innerHTML = "Guardar";
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