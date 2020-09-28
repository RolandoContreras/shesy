function add_cart_1(catalog_id, price, name) {
        $.ajax({
            type: "post",
            url: site + "catalogo/order/add_cart",
            dataType: "json",
            data: {
                quantity: 1,
                catalog_id: catalog_id,
                price: price,
                name: name
            },
            success: function (data) {
                if (data.status == true) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Producto Agregado',
                        showConfirmButton: false
                    })
                    var url = site + "mi_catalogo/pay_order";
                    setTimeout(function () {
                        location.href = url
                    }, 1500);
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
}

function add_cart(catalog_id, price, name) {
    var quantity = document.getElementById("quantity").value;
    var talla = document.getElementById("talla").value;
    var color = document.getElementById("color").value;
    if (quantity == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'info',
            title: 'Ingrese cantidad',
            showConfirmButton: true
        });
        document.getElementById("quantity").focus();
    } else {
        document.getElementById("buy").innerHTML = "Procesando";
        $.ajax({
            type: "post",
            url: site + "catalogo/order/add_cart",
            dataType: "json",
            data: {
                quantity: quantity,
                catalog_id: catalog_id,
                price: price,
                name: name,
                talla: talla,
                color: color
            },
            success: function (data) {
                if (data.status == true) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Producto Agregado',
                        showConfirmButton: false
                    })
                    var url = site + "mi_catalogo/pay_order";
                    setTimeout(function () {
                        location.href = url
                    }, 1500);
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
    }
}

function add_cart_refencia(catalog_id, price, name, img) {
    var quantity = document.getElementById("quantity").value;
    var talla = document.getElementById("talla").value;
    var color = document.getElementById("color").value;
    if (quantity == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'info',
            title: 'Ingrese cantidad',
            showConfirmButton: true
        });
        document.getElementById("quantity").focus();
    } else {
        document.getElementById("buy").innerHTML = "Procesando";
        $.ajax({
            type: "post",
            url: site + "catalogo/order/add_cart_referencia",
            dataType: "json",
            data: {
                quantity: quantity,
                catalog_id: catalog_id,
                price: price,
                name: name,
                img: img,
                talla: talla,
                color: color
            },
            success: function (data) {
                if (data.status == true) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Producto Agregado',
                        showConfirmButton: false
                    })
                    var url = site + "pagos_referencia";
                    setTimeout(function () {
                        location.href = url
                    }, 1500);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ups...',
                        text: 'Sucedió un error',
                        footer: '<a href>Vuelve a intentarlo!</a>'
                    });
                    document.getElementById("buy").innerHTML("AGREGAR AL CARRITO");
                }
            }
        });
    }
}

function add_cart_refencia_granel(catalog_id, price, name, img) {
    var quantity = document.getElementById("quantity").value;
    if (quantity == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'info',
            title: 'Ingrese cantidad',
            showConfirmButton: true
        });
        document.getElementById("quantity").focus();
    } else {
        $.ajax({
            type: "post",
            url: site + "catalogo/order/add_cart_referencia_granel",
            dataType: "json",
            data: {quantity: quantity,
                catalog_id: catalog_id,
                price: price,
                name: name,
                img: img},
            success: function (data) {
                if (data.status == true) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Producto Agregado',
                        showConfirmButton: false
                    })
                    var url = site + "pagos_referencia";
                    setTimeout(function () {
                        location.href = url
                    }, 1500);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ups...',
                        text: 'Sucedió un error',
                        footer: '<a href>Vuelve a intentarlo!</a>'
                    });
                    document.getElementById("buy").innerHTML("AGREGAR AL CARRITO");
                }
            }
        });
    }
}

function add_cart_number(catalog_id, price, name) {
    document.getElementById("buy").innerHTML = "Procesando";
    $.ajax({
        type: "post",
        url: site + "catalogo/order/add_cart",
        dataType: "json",
        data: {
            catalog_id: catalog_id,
            price: price,
            name: name
        },
        success: function (data) {
            if (data.status == true) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Producto Agregado',
                    showConfirmButton: false,
                })
                var url = site + "mi_catalogo/pay_order";
                setTimeout(function () {
                    location.href = url
                }, 1500);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    text: 'Sucedió un error',
                    footer: '<a href>Vuelve a intentarlo!</a>'
                });
                document.getElementById("buy").innerHTML("AGREGAR AL CARRITO");
            }
        }
    });
}

