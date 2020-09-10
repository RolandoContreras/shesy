function send_embassy() {
    var name = document.getElementById("name").value;
    var last_name = document.getElementById("last_name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    $.ajax({
        type: "post",
        url: site + "home/embassy",
        dataType: "json",
        data: {
            name: name,
            last_name: last_name,
            email: email,
            phone: phone
        },
        success: function (data) {
            if (data.message == true) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Postulación enviada',
                    showConfirmButton: false,
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
function send_voucher() {
    oData = new FormData(document.forms.namedItem("form-voucher"));
                $.ajax({
                    url: site + "send_voucher",
                    method: "POST",
                    data: oData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        var res = JSON.parse(data);
                        if (res.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Pedido Enviado',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }else if (res.status == "false2"){
                            Swal.fire({
                                position: 'top-end',
                                icon: 'info',
                                title: 'Ups! Se acaba de terminar el stock del producto ',
                                footer: "Seleccione otro producto"
                            });
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Ups! Sucedio un error ',
                                footer: "Comunicar a soporte"
                            });
                        }
                    }
                });

}