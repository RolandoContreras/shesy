function update_order(id) {
    var qty = document.getElementById("qty").value;
    if (qty > 0) {
        $.ajax({
            type: "post",
            url: site + "backoffice/cursos/pay_order/update_cart",
            dataType: "json",
            data: {id: id,
                qty: qty},
            success: function (data) {
                if (data.status == "true") {
                    document.getElementById("quantity_error").style.display = "none";
                    document.getElementById("quantity_success").style.display = "block";
                    location.reload();
                }
            }
        });
    } else {
        document.getElementById("quantity_error").style.display = "block";
    }
}
function delete_order(id) {
    $.ajax({
        type: "post",
        url: site + "backoffice/cursos/pay_order/delete_cart",
        dataType: "json",
        data: {id: id},
        success: function (data) {
            if (data.status == "true") {
                location.reload();
            }
        }
    });
}
function process_pay_invoice() {
    $.ajax({
        type: "post",
        url: site + "backoffice/cursos/pay_order/process_pay_invoice",
        dataType: "json",
        data: {},
        success: function (data) {
            if (data.status == "true") {
                document.getElementById("pay_success_2").style.display = "block";
                document.getElementById("exampleModal").showModal();
            }
        }
    });
}
function add_cart(course_id, price, name) {
        $.ajax({
            type: "post",
            url: site + "backoffice/cursos/pay_order/add_cart",
            dataType: "json",
            data: {quantity: 1,
                course_id: course_id,
                price: price,
                name: name},
            success: function (data) {
                if (data.status == "true") {
                    Swal.fire({
                        position: 'top-end',
                        title: 'Producto Agregado al Carrito',
                        icon: 'success',
                        timer: 1000,
                        showConfirmButton: false
                });
                setTimeout(function () {
                    location.href = site + "backoffice/cursos/pay_order";
                }, 1000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ups! Hubo un error',
                        footer: 'Comuniquese con soporte',
                    });
                }
            }
        });
}

function contra_entrega() {
    var url = 'mi_catalogo/contra_entrega';
    location.href = site + url;
}

function ganancia_disponible_view() {
    var url = 'mi_catalogo/ganancia_disponible';
    location.href = site + url;
}

function regresar() {
    var url = 'mi_catalogo/pay_order';
    location.href = site + url;
}

function ganancia_disponible_2() {
    document.getElementById("puntos_button").innerHTML = "Procesando";
    var ganancia_disponible = document.getElementById("ganancia_disponible").value;
    var total_disponible = document.getElementById("total_disponible").value;
    var total_compra = document.getElementById("total_compra").value;
    var total = document.getElementById("total").value;
    var active_month = document.getElementById("active_month").value;
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var address = document.getElementById("address").value;
    var reference = document.getElementById("reference").value;

    $.ajax({
        type: "post",
        url: site + "mi_catalogo/puntos_compra",
        dataType: "json",
        data: {ganancia_disponible: ganancia_disponible,
            total_compra: total_compra,
            total_disponible: total_disponible,
            total: total,
            active_month: active_month,
            name: name,
            phone: phone,
            address: address,
            reference: reference},
        success: function (data) {
            if (data.status == true) {
                Swal.fire({
                    position: 'top-end',
                    title: 'Pago con éxito',
                    icon: 'success',
                    focusConfirm: false
                });
                var url = site + "mi_catalogo";
                setTimeout(function () {
                    location.href = url
                }, 1500);
            } else if (data.status == "no_money") {
                Swal.fire({
                    icon: 'info',
                    title: 'Fondos insuficientes'
                });
                document.getElementById("puntos_button").innerHTML = "Ganancia Disponible";
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups! Hubo un error',
                    footer: 'Comuniquese con soporte',
                });
                document.getElementById("puntos_button").innerHTML = "Ganancia Disponible";
            }
        }
    });
}


