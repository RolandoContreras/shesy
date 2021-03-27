function active_catalog(id, parent_id, qty) {
        bootbox.confirm({
            message: "Confirma que desea activar el Pedido?",
            buttons: {
                confirm: {
                    label: 'Confirmar',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Cerrar',
                    className: 'btn-danger'
                }
            },
            callback: function (e) {
                if (e === true) {
                    $.ajax({
                        type: "post",
                        url: site + "dashboard/hotmart_active",
                        dataType: "json",
                        data: {id: id,
                            parent_id: parent_id,
                            qty:qty},
                        success: function (data) {
                            if (data.status == true) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Activado Éxitosamente',
                                    showConfirmButton: false
                                  });
                                  var url = site + "dashboard/hotmart";
                                    setTimeout(function () {
                                        location.href = url
                                    }, 1500);
                            } else {
                                wal.fire({
                                    position: 'top-end',
                                    icon: 'info',
                                    title: 'Sucedio un Error',
                                    showConfirmButton: false
                                  });
                            }
                        }
                    });
                }
            }
        });
}
function active_curso(id, parent_id, course_id, customer_id) {
    bootbox.confirm({
        message: "Confirma que desea activar el Curso?",
        buttons: {
            confirm: {
                label: 'Confirmar',
                className: 'btn-success'
            },
            cancel: {
                label: 'Cerrar',
                className: 'btn-danger'
            }
        },
        callback: function (e) {
            if (e === true) {
                $.ajax({
                    type: "post",
                    url: site + "dashboard/hotmart_active_course",
                    dataType: "json",
                    data: {id: id,
                        parent_id: parent_id,
                        course_id:course_id,
                        customer_id:customer_id},
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Activado Éxitosamente',
                                showConfirmButton: false
                              });
                              var url = site + "dashboard/hotmart_cursos";
                                setTimeout(function () {
                                    location.href = url
                                }, 1500);
                        } else {
                            wal.fire({
                                position: 'top-end',
                                icon: 'info',
                                title: 'Sucedio un Error',
                                showConfirmButton: false
                              });
                        }
                    }
                });
            }
        }
    });
}

