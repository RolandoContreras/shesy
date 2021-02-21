function validate() {
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    description = CKEDITOR.instances.description.getData();
    oData = new FormData(document.forms.namedItem("cursos_form"));
    oData.append("description", description);
    $.ajax({
        url: site + "dashboard/mis-cursos/validate",
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
                    window.location = site + "dashboard/mis-cursos";
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


function new_curso() {
    var url = 'dashboard/mis-cursos/load';
    location.href = site + url;
}
function edit_curso(catalog_id) {
    var url = 'dashboard/mis-cursos/load/' + catalog_id;
    location.href = site + url;
}
function cancel_curso() {
    var url = 'dashboard/mis-cursos';
    location.href = site + url;
}
function upload_img() {
    var input = document.getElementById('image_file').value;
    if (input != null) {
        $("#respose_img").html();
        var texto = "";
        texto = texto + 'Seleccionado: ';
        texto = texto + input;
        $("#respose_img").html(texto);
        $("#label_img").removeClass("invalid").addClass("valid");
    } else {
        $("#label_img").removeClass("valid").addClass("invalid");
    }
}
function upload_img2() {
    var input = document.getElementById('image_file2').value;
    if (input != null) {
        $("#respose_img2").html();
        var texto = "";
        texto = texto + 'Seleccionado: ';
        texto = texto + input;
        $("#respose_img2").html(texto);
        $("#label_img2").removeClass("invalid").addClass("valid");
    } else {
        $("#label_img2").removeClass("valid").addClass("invalid");
    }
}

function upload_img3() {
    var input = document.getElementById('image_file3').value;
    if (input != null) {
        $("#respose_img3").html();
        var texto = "";
        texto = texto + 'Seleccionado: ';
        texto = texto + input;
        $("#respose_img3").html(texto);
        $("#label_img3").removeClass("invalid").addClass("valid");
    } else {
        $("#label_img3").removeClass("valid").addClass("invalid");
    }
}

function delete_curso(catalog_id) {
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
        callback: function (result) {
            if (result == true) {
                $.ajax({
                    type: "post",
                    url: site + "dashboard/mis-cursos/delete",
                    dataType: "json",
                    data: {catalog_id: catalog_id},
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Producto Eliminado.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout('document.location.reload()', 1500);
                        } else {
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
function show_sub_category(category_id) {
    $.ajax({
        type: "post",
        url: site + "dashboard/mis-cursos/show_sub_category",
        dataType: "json",
        data: {category_id: category_id},
        success: function (data) {
            if(data.status == true){         
                    obj_category = data.obj_category;
                    var texto = "";
                    texto = texto+'<option value="">Seleccionar Sub Categroría</option>';
                    var x = 0;               
                    $.each(obj_category, function(){
                        texto = texto+'<option value="'+obj_category[x]['sub_category_id']+'">'+obj_category[x]['name']+'</option>';
                        x++; 
                    });
                    $("#sub_category_id").html(texto);
            }else{
                    var texto = "";
                    texto = texto+'<option value="">Seleccionar País</option>';
                    $("#sub_category_id").html(texto);
            }
        }
    });
}
function view_modulos(course_id){    
    var url = 'dashboard/modulos/'+course_id;
    location.href = site+url;   
}


