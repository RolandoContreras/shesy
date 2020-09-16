function procesar_contra_entrega() {
    document.getElementById("save_entrega").innerHTML = "Procesando...";
    oData = new FormData(document.forms.namedItem("entrega"));
    $.ajax({
        url: site + "mi_catalogo/procesar_contra_entrega",
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
                    title: 'Pedido Procesado',
                    footer: data.message,
                    showConfirmButton: false,
                    timer: 1500
                });
                document.getElementById("save_entrega").innerHTML = "Solicitar Pedido";
                setTimeout(function () {
                    location.href = site + "mi_catalogo";
                }, 1500);
            } else if (data.status == "false2") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'info',
                    title: 'Ups! Se acaba de terminar el stock del producto',
                    footer: "Seleccione otro producto"
                });
                document.getElementById("save_entrega").innerHTML = "Solicitar Pedido";
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Ups! Sucedio un error ',
                    footer: "Intentelo nuevamente o comunique a soporte"
                });
                document.getElementById("save_entrega").innerHTML = "Solicitar Pedido";
            }
        }
    });
}

function regresar() {
    var url = 'mi_catalogo/pay_order';
    location.href = site + url;
}