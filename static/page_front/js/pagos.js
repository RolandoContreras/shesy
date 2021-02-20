function validate_hotmark() {
    document.getElementById("submit_hot").disabled = true;
    document.getElementById("submit_hot").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    hot_link = document.getElementById("hot_link").value;
    oData = new FormData(document.forms.namedItem("form_pay"));
    $.ajax({
        url: site + "pago/hotmark",
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
                    title: 'Bienvenido',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.setTimeout(function () {
                    window.location = hot_link;
                }, 1500);
            } else {
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").innerHTML = "Metodos de Pagos - Hotmart";
                Swal.fire({
                    position: 'top-end',
                    icon: 'info',
                    title: 'Sucedio un error',
                    footer: 'Comunique a soporte'
                });
            }
        }
    });
}

function validate_hotmark_cursos() {
    document.getElementById("submit_hot").disabled = true;
    document.getElementById("submit_hot").innerHTML = "<span class='spinner-border spinner-border-sm' role='status'></span> Procesando...";
    hot_link = document.getElementById("hot_link").value;
    oData = new FormData(document.forms.namedItem("form_pay"));
    $.ajax({
        url: site + "cursosporhoy/hotmark",
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
                    title: 'Bienvenido',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.setTimeout(function () {
                    window.location = hot_link;
                }, 1500);
            } else {
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").innerHTML = "Metodos de Pagos";
                Swal.fire({
                    position: 'top-end',
                    icon: 'info',
                    title: 'Sucedio un error',
                    footer: 'Comunique a soporte'
                });
            }
        }
    });
}
