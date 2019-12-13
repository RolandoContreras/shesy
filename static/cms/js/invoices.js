function edit_invoices(invoice_id){    
     var url = 'dashboard/facturas/load/'+invoice_id;
     location.href = site+url;   
}
function cancelar_invoice(){
	var url= 'dashboard/facturas';
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