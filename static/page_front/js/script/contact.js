function send_message() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;

    var email_2 = validar_email(email);
    if (email_2 == true) {
        $.ajax({
            type: "post",
            url: site + "contact/send_messages",
            dataType: "json",
            data: {
                name: name,
                email: email,
                subject: subject,
                message: message
            },
            success: function (data) {
                if (data.message == true) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Mensaje Enviado.',
                        showConfirmButton: false,
                      })
                      setTimeout('document.location.reload()',1500);
                 }else{
                     Swal.fire({
                        icon: 'error',
                        title: 'Ups...',
                        text: 'Sucedió un error',
                        footer: '<a href>Vuelve a intentarlo!</a>'
                      });
                 }
            }
        });
    } else {
        document.getElementById("message_email").style.display = "block";
        $("#email").focus();
    }

}
function validar_email(email) {
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}