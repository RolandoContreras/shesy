function bak_category(){
	var url= 'dashboard/categorias';
	location.href = site+url;
}
function new_sub_category(category_id){
	var url= 'dashboard/categorias/'+category_id+'/make_sub_category';
	location.href = site+url;
}
function edit_sub_category(category_id,sub_category_id){    
     var url = 'dashboard/categorias/'+category_id+'/make_sub_category/'+sub_category_id;
     location.href = site+url;   
}
function cancel_sub_category(category_id){
	var url= 'dashboard/categorias/'+category_id;
	location.href = site+url;
}

function delete_sub_category(sub_category_id) {
    bootbox.confirm({
        message: "¿Confirma que desea la sub categiría?",
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
        callback: function (result) {
            if (result == true) {
                $.ajax({
                    type: "post",
                    url: site + "dashboard/categorias/delete_sub_category",
                    dataType: "json",
                    data: {sub_category_id: sub_category_id},
                    success: function (data) {
                        if (data.status == true) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'La sub categoría fue eliminada',
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
                                title: 'Sucedio un error',
                                footer: 'Comunique a soporte'
                            });
                        }
                    }
                });
            }
        }
    });
}
