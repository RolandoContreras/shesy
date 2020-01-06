function active(invoice_id,customer_id,kit_id,type){
    bootbox.confirm({
    message: "Confirma que desea procesar el registro?",
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
                   url: site+"dashboard/activaciones/active",
                   dataType: "json",
                   data: {invoice_id : invoice_id,
                          customer_id:customer_id,
                          kit_id : kit_id,
                          type : type},
                   success:function(data){                             
                   location.reload();
                   }         
           });
    }
    });
}
function view_order(invoice_id){
    var url = 'dashboard/activaciones_catalogo/'+invoice_id;
     location.href = site+url;   
}

function back_list_catalogo(){
    var url = 'dashboard/activaciones_catalogo/';
     location.href = site+url;   
}

function modal_img(id){
    // Get the modal
    var modal = document.getElementById('myModal');
    var captionText = "Imagen";
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById(id);
    var modalImg = document.getElementById("img01");
    img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
      modal.style.display = "none";
    }
}