function make_pay() {
    var amount = document.getElementById("amount").value;
    var total_disponible = document.getElementById("total_disponible").value;
    if (amount < 3) {
        Swal.fire({
            icon: 'info',
            title: 'Ingrese una cantidad valida',
            footer: 'La cantidad mínima de cobro es $3'
        });

    } else {
        document.getElementById("pay").innerHTML = "Procesando...";
        $.ajax({
            type: "post",
            url: site + "backoffice/pay/make_pay",
            dataType: "json",
            data: {amount: amount,
                total_disponible: total_disponible},
            success: function (data) {
                if (data.status == true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Solicitud con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout('document.location.reload()',1500);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Verifique el importe ingresado'
                    });
                    document.getElementById("pay").innerHTML = "<i class='fa fa-dollar'></i> Solicitar Retiro";
                }
            }
        });
    }

}

function Numtext(string) {//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = '.1234567890';//Caracteres validos
    for (var i = 0; i < string.length; i++)
        if (filtro.indexOf(string.charAt(i)) != -1)
            out += string.charAt(i);
    return out;
}