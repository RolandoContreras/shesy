function change_profile() {
    var address = document.getElementById("address").value;
    var phone = document.getElementById("phone").value;
    if (address == "") {
        $("#address").addClass("is-invalid");
        $("#address").focus();
    } else if (phone == "") {
        $("#phone").addClass("is-invalid");
        $("#phone").focus();
    } else {
        document.getElementById("save_profile").style.display = "none";
        document.getElementById("spinner_profile").style.display = "block";
        $("#address").removeClass("is-invalid");
        $("#phone").removeClass("is-invalid");
        $.ajax({
            type: "post",
            url: site + "backoffice/profile/update_data",
            dataType: "json",
            data: {address: address,
                phone: phone},
            success: function (data) {
                if (data.status == true) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Información Personal Guardada',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    window.setTimeout(function () {
                        window.location = site + "backoffice/profile";
                    }, 1500);

                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Hubo un error',
                        footer: 'Consulte al administrador',
                    });
                    document.getElementById("save_profile").style.display = "block";
                    document.getElementById("spinner_profile").style.display = "none";
                }
            }
        });
    }
}
function change_pass() {
    var pass = document.getElementById("pass").value;
    var new_pass = document.getElementById("new_pass").value;
    var new_pass_confirm = document.getElementById("new_pass_confirm").value;
    //VERIFY DATA RECAPTCHA

    if (pass == "") {
        $("#pass").addClass("is-invalid");
        $("#pass").focus();
    } else if (new_pass == "") {
        $("#new_pass").addClass("is-invalid");
        $("#new_pass").focus();
    } else if (new_pass_confirm == "") {
        $("#new_pass_confirm").addClass("is-invalid");
        $("#new_pass_confirm").focus();
    } else {
        if (new_pass == new_pass_confirm) {
            document.getElementById("save_pass").style.display = "none";
            document.getElementById("spinner_pass").style.display = "block";
            $.ajax({
                type: "post",
                url: site + "backoffice/profile/update_password",
                dataType: "json",
                data: {pass: pass,
                    new_pass: new_pass,
                    new_pass_confirm: new_pass_confirm},
                success: function (data) {
                    if (data.status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Datos Guardados',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            location.reload();
                        }, 1500);

                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'La contraseña no es valida'
                        });
                        document.getElementById("save_pass").style.display = "block";
                        document.getElementById("spinner_pass").style.display = "none";
                    }
                }
            });
        } else {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Las contraseñas no son iguales',
            });
            document.getElementById("save_pass").style.display = "block";
            document.getElementById("spinner_pass").style.display = "none";
        }
    }
}

function change_bank() {
    var bank_id = document.getElementById("bank_id").value;
    var bank_account = document.getElementById("bank_account").value;
    var bank_number = document.getElementById("bank_number").value;
    var back_number_cci = document.getElementById("back_number_cci").value;
    if (bank_id == "") {
        document.getElementById("wallet_error").style.display = "block";
        $("#bank_id").focus();
    } else if (bank_account == "") {
        document.getElementById("wallet_error").style.display = "block";
        $("#bank_account").focus();
    } else if (bank_number == "") {
        document.getElementById("wallet_error").style.display = "block";
        $("#bank_number").focus();
    } else {
        document.getElementById("save_bank").style.display = "none";
        document.getElementById("spinner_bank").style.display = "block";
        $.ajax({
            type: "post",
            url: site + "backoffice/profile/update_bank",
            dataType: "json",
            data: {bank_id: bank_id,
                bank_account: bank_account,
                bank_number: bank_number,
                back_number_cci: back_number_cci},
            success: function (data) {
                if (data.status == true) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos Guardados',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    window.setTimeout(function () {
                        location.reload();
                    }, 1500);

                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Hubo un error',
                        footer: 'Consulte al administrador',
                    });
                    document.getElementById("save_bank").style.display = "block";
                    document.getElementById("spinner_bank").style.display = "none";
                }
            }
        });
    }
}
