function new_activate() {
    var url = 'dashboard/activaciones/load';
    location.href = site + url;
}
function cancel_activate_kit() {
    var url = 'dashboard/activaciones';
    location.href = site + url;
}

function active() {

    var customer_id = document.getElementById("customer_id").value;
    var kit_id = document.getElementById("kit_id").value;
    var type = document.getElementById("type").value;

    if (customer_id == "") {
        var texto = "";
        texto = texto + '<div class="alert alert-danger">';
        texto = texto + '<p style="text-align: center;">Cliente no encontrado</p>';
        texto = texto + '</div>';
        $("#message").html(texto);
        $("#customer_id").focus();
    } else if (kit_id == "") {
        var texto = "";
        texto = texto + '<div class="alert alert-danger">';
        texto = texto + '<p style="text-align: center;">Seleccione un Kit</p>';
        texto = texto + '</div>';
        $("#message").html(texto);
        $("#kit_id").focus();
    } else {
        bootbox.confirm({
            message: "Confirma que desea activar al Cliente?",
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
            callback: function (e) {
                if (e === true) {
                    $.ajax({
                        type: "post",
                        url: site + "dashboard/activaciones/active",
                        dataType: "json",
                        data: {customer_id: customer_id,
                            kit_id: kit_id,
                            type: type},
                        success: function (data) {
                            if (data.status == "true") {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Activado Éxitosamente',
                                    showConfirmButton: false
                                  });
                                  var url = site + "dashboard/activaciones";
                                    setTimeout(function () {
                                        location.href = url
                                    }, 1500);
                            } else {
                                var texto = "";
                                texto = texto + '<div class="alert alert-danger">';
                                texto = texto + '<p style="text-align: center;">Hubo un error</p>';
                                texto = texto + '</div>';
                                $("#message").html(texto);
                            }
                        }
                    });
                }
            }
        });
    }


}
function modal_img(id) {
    // Get the modal
    var modal = document.getElementById('myModal');
    var captionText = "Imagen";
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById(id);
    var modalImg = document.getElementById("img01");
    img.onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }
}
function validate_user(username) {
    if (username == "") {
        $(".alert-0").removeClass('text-success').addClass('text-danger').html("Usuario Invalido <i class='fa fa-times-circle-o' aria-hidden='true'></i>");
    } else {
        $.ajax({
            type: "post",
            url: site + "dashboard/activaciones/validate_user",
            dataType: "json",
            data: {username: username},
            success: function (data) {
                if (data.message == "true") {
                    $(".alert-0").removeClass('text-danger').addClass('text-success').html(data.print);
                    var inputCustomer_id = document.getElementById("customer_id");
                    inputCustomer_id.value = data.customer_id;
                    var inputCustomer = document.getElementById("customer");
                    inputCustomer.value = data.name;
                    var inputDni = document.getElementById("dni");
                    inputDni.value = data.dni;
                } else {
                    $(".alert-0").removeClass('text-success').addClass('text-danger').html(data.print);
                }
            }
        });
    }
}
    