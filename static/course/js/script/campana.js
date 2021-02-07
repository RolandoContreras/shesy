function pay_program() {
    document.getElementById("pay_program").innerHTML = "PROCESANDO..."
    $.ajax({
        type: "post",
        url: site + "transformacion/add_cart_campana1",
        dataType: "json",
        data: {},
        success: function (data) {
            if (data.status == true) {
                    window.location = site + "backoffice/pay_order";
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups! Hubo un error',
                    footer: 'Comuniquese con soporte',
                });
                document.getElementById("pay_program").innerHTML = "<i class='fa fa-check'></i> ADQUIRIR PROGRAMA COMPLETO";
            }
        }
    });
}