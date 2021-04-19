function new_sub_industry() {
    var url = 'dashboard/sub-industrias/load';
    location.href = site + url;
}

function edit(id){    
     var url = 'dashboard/sub-industrias/load/'+id;
     location.href = site+url;   
}
function cancel_sub_industry(){
	var url= 'dashboard/sub-industrias';
	location.href = site+url;
}
function validate(){
    document.getElementById("submit").disabled = true;
    document.getElementById("submit").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    oData = new FormData(document.forms.namedItem("form"));
    $.ajax({
        url: site + "dashboard/sub-industrias/validate",
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
                    title: 'Cambios Guardados',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.setTimeout(function () {
                    window.location = site + "dashboard/sub-industrias";
                }, 1500);
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Sucedio un error',
                    footer: 'Comunique a soporte'
                });
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").innerHTML = "Guardar";
            }
        }
    });
}
function delete_sub_industry(id) {
    bootbox.confirm({
        message: "¿Confirma que desea eliminar la sub industria?",
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
                    url: site + "dashboard/sub-industrias/delete",
                    dataType: "json",
                    data: {id: id},
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Sub industria eliminada',
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

function get_industry(type) {
    $.ajax({
        type: "post",
        url: site + "dashboard/sub-industrias/get_industry",
        dataType: "json",
        data: {type: type},
        success: function (data) {
            if (data.status == true) {
                var str = '';
                str += "<option value=''>Seleccionar Industria</option>";
                data.obj_data.forEach(function(value) {
                    str += "<option value="+value.id+"> "+value.name+"</option>";
                });
                industry_id.innerHTML = str;
            }
        }
    });
}
