function validate() {
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    description =  tinyMCE.activeEditor.getContent();
    oData = new FormData(document.forms.namedItem("form-validate"));
    oData.append("description", description);
    $.ajax({
        url: site + "dashboard/catalogo/validate",
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
                    window.location = site + "dashboard/catalogo";
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


function new_catalog() {
    var url = 'dashboard/catalogo/load';
    location.href = site + url;
}
function edit_catalog(catalog_id) {
    var url = 'dashboard/catalogo/load/' + catalog_id;
    location.href = site + url;
}
function cancel_catalog() {
    var url = 'dashboard/catalogo';
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
        $("#respose_img").html();
        var texto = "";
        texto = texto + 'Seleccionado: ';
        texto = texto + input;
        $("#respose_img3").html(texto);
        $("#label_img3").removeClass("invalid").addClass("valid");
    } else {
        $("#label_img3").removeClass("valid").addClass("invalid");
    }
}
function upload_img4() {
    var input = document.getElementById('image_file4').value;
    if (input != null) {
        $("#respose_img").html();
        var texto = "";
        texto = texto + 'Seleccionado: ';
        texto = texto + input;
        $("#respose_img4").html(texto);
        $("#label_img4").removeClass("invalid").addClass("valid");
    } else {
        $("#label_img4").removeClass("valid").addClass("invalid");
    }
}

function delete_catalog(catalog_id) {

    Swal.fire({
        title: 'Confirma que desea elimar el Producto?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: site + "dashboard/catalogo/delete",
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
                            icon: 'info',
                            title: 'Ups...',
                            text: 'Sucedió un error',
                            footer: '<a href>Vuelve a intentarlo!</a>'
                        });
                    }
                }
            });
        }else{
            document.getElementById("submit").disabled = false;
            document.getElementById("submit").innerHTML = "Guardar";
        }
      })
}

function delete_img(catalog_id, img) {

    Swal.fire({
        title: 'Confirma que desea eliminar la Imagen?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: site + "dashboard/catalogo/delete_img",
                dataType: "json",
                data: {catalog_id: catalog_id,
                      img:img},
                success: function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Imagen Eliminada.',
                            showConfirmButton: false,
                            timer: 1000
                        })
                        setTimeout('document.location.reload()', 1000);
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
        }else{
            document.getElementById("submit").disabled = false;
            document.getElementById("submit").innerHTML = "Guardar";
        }
      })
}

function show_sub_category(category_id) {
    $.ajax({
        type: "post",
        url: site + "dashboard/catalogo/show_sub_category",
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

function get_sub_industry(id) {
    $.ajax({
        type: "post",
        url: site + "dashboard/catalogo/get_sub_category",
        dataType: "json",
        data: {id: id},
        success: function (data) {
            if(data.status == true){         
                    var str = '';
                    str += "<option value=''>Seleccionar Sub Industria</option>";
                    data.obj_data.forEach(function(value) {
                        str += "<option value="+value.id+"> "+value.name+"</option>";
                    });
                    sub_industry_id.innerHTML = str;
            }else{
                    var texto = "";
                    texto = texto+'<option value="">Seleccionar País</option>';
                    $("#sub_category_id").html(texto);
            }
        }
    });
}