function procesar_contra_entrega() {
    document.getElementById("spinner_entrega").style.display = "block";
    document.getElementById("save_entrega").style.display = "none";
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
                    timer: 4000
                });
                document.getElementById("save_entrega").style.display = "block";
                document.getElementById("spinner_entrega").style.display = "none";
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Ups! Sucedio un error ',
                    footer: "Intentelo nuevamente o comunique a soporte"
                });
                document.getElementById("save_entrega").style.display = "block";
                document.getElementById("spinner_entrega").style.display = "none";
            }
        }
    });
}