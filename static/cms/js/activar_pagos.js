function pagado(pay_id,customer_id, total){

    Swal.fire({
        title: 'Confirma que desea marcar como pagado?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: site + "dashboard/pagos/pagado",
                dataType: "json",
                data: {pay_id : pay_id,
                        customer_id : customer_id,
                        total : total},
                success: function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Procesado',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout('document.location.reload()', 1500);
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

function devolver(pay_id){

    Swal.fire({
        title: 'Confirma que desea marcar como devuelto?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Confirmo'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: site + "dashboard/pagos/devolver",
                dataType: "json",
                data: {pay_id: pay_id},
                success: function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Procesado',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout('document.location.reload()', 1500);
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