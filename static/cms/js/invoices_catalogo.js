function edit_invoices_catalogo(invoice_id){    
     var url = 'dashboard/facturas_catalogo/load/'+invoice_id;
     location.href = site+url;   
}
function cancelar_invoice_catalogo(){
	var url= 'dashboard/facturas_catalogo';
	location.href = site+url;
}
function ver_invoices_catalogo(invoice_id){    
     var url = 'dashboard/facturas/ver/'+invoice_id;
     location.href = site+url;   
}
function back_list(){    
     var url = 'dashboard/facturas_catalogo';
     location.href = site+url;   
}
function ver_entregado(invoice_id){    
     bootbox.confirm({
        message: "Confirma que desea marcarlo como entregado?",
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
        callback: function () {
             $.ajax({
                       type: "post",
                       url: site+"dashboard/facturas_catalogo/entregado",
                       dataType: "json",
                       data: {invoice_id : invoice_id},
                       success:function(data){                             
                       location.reload();
                       }         
               });
        }
    });
}



