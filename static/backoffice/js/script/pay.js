function make_pay() {
    var amount = document.getElementById("amount").value;
    var total_disponible = document.getElementById("total_disponible").value;
    if (amount == "") {
        $("#amount").addClass("is-invalid");
        $("#amount").focus();
    } else {
        if (total_disponible < 3) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'El importe mínimo de cobro es $3',
                footer: 'No cuenta con el importe mínimo para solicitar el cobro'
            });
            $("#amount").focus();
        } else if (amount < 3) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'El importe mínimo de cobro es $3',
                footer: 'Ingrese nuevamente el importe de cobro'
            });
            $("#amount").focus();
        } else {
            document.getElementById("pay").style.display = "none";
            document.getElementById("spinner_pay").style.display = "block";
            $.ajax({
                type: "post",
                url: site + "backoffice/pay/make_pay",
                dataType: "json",
                data: {amount: amount,
                    total_disponible: total_disponible},
                success: function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Solicitud de cobro exitosa',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location = site + "backoffice/pay";
                        }, 1500);
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Sucedio un error',
                            footer: 'Intente Nuevamente'
                        });
                    }
                }
            });
        }

    }


}


function validate_amount(amount){
        $.ajax({
        type: "post",
        url: site + "backoffice/pay/validate_amount",
        dataType: "json",
        data: {amount: amount},
        success:function(data){
            document.getElementById("tax").value = data.tax;
            document.getElementById("result").value = data.result;
        }            
        });
}

function Numtext(string){//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = '.1234567890';//Caracteres validos
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}