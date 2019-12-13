function active_financiada(invoice_id,customer_id,kit_id){
    bootbox.confirm({
    message: "Confirma que desea activar como financiada?",
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
                   url: site+"dashboard/activaciones/active_financy",
                   dataType: "json",
                   data: {invoice_id : invoice_id,
                          customer_id : customer_id,
                          kit_id : kit_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
    }
});
}
function active(invoice_id,customer_id,kit_id,price){
    bootbox.confirm({
    message: "Confirma que desea activar la cuenta?",
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
                          price : price},
                   success:function(data){                             
                   location.reload();
                   }         
           });
    }
});
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