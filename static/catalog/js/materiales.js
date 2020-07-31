function show_information() {
    catalog_id = document.getElementById("catalog_id").value;
    $.ajax({
        type: "post",
        url: site + "backoffice/files/show_information",
        dataType: "json",
        data: {catalog_id: catalog_id},
        success: function (data) {
            if (data.status == true) {
                document.getElementById("show_information").style.display = "block";
                $("#res").html();
                var texto = "";
                texto = texto+'<div class="form-group"> ';
                texto = texto+'<label class="control-label"> Código de Producto </label> ';
                texto = texto+'<input type="text" class="form-control" value="'+ data.obj_catalog.catalog_id +'" disabled="">';
                texto = texto+'</div>';                 
                
                texto = texto+'<div class="form-group"> ';
                texto = texto+'<label class="control-label"> Nombre  </label> ';
                texto = texto+'<input type="text" class="form-control" value="'+ data.obj_catalog.name +'" disabled="">';
                texto = texto+'</div>';     
                
                texto = texto+'<div class="form-group"> ';
                texto = texto+'<label class="control-label"> Precio  </label> ';
                texto = texto+'<input type="text" class="form-control" value="'+ data.obj_catalog.price +'" disabled="">';
                texto = texto+'</div>';     
                            
                texto = texto+'<div class="row">';
                texto = texto+'<div class="col-sm-6">';
                texto = texto+'<div class="form-group"> ';
                texto = texto+'<label class="control-label">Puntos 1°</label> ';
                texto = texto+'<input type="text" class="form-control" value="'+ data.obj_catalog.bono_n1 +'" disabled="">';
                texto = texto+'</div>';   
                texto = texto+'</div>';   
                texto = texto+'<div class="col-sm-6">';
                texto = texto+'<div class="form-group"> ';
                texto = texto+'<label class="control-label">Puntos 2°</label> ';
                texto = texto+'<input type="text" class="form-control" value="'+ data.obj_catalog.bono_n2 +'" disabled="">';
                texto = texto+'</div>';   
                texto = texto+'</div>';   
                texto = texto+'</div>'; 
                
                
                texto = texto+'<div class="row">';
                texto = texto+'<div class="col-sm-4">';
                texto = texto+'<div class="form-group"> ';
                texto = texto+'<label class="control-label">Puntos 1°</label> ';
                texto = texto+'<input type="text" class="form-control" value="'+ data.obj_catalog.bono_n3 +'" disabled="">';
                texto = texto+'</div>';   
                texto = texto+'</div>';   
                texto = texto+'<div class="col-sm-4">';
                texto = texto+'<div class="form-group"> ';
                texto = texto+'<label class="control-label">Puntos 2°</label> ';
                texto = texto+'<input type="text" class="form-control" value="'+ data.obj_catalog.bono_n4 +'" disabled="">';
                texto = texto+'</div>';   
                texto = texto+'</div>';  
                
                texto = texto+'<div class="col-sm-4">';
                texto = texto+'<div class="form-group"> ';
                texto = texto+'<label class="control-label">Puntos 2°</label> ';
                texto = texto+'<input type="text" class="form-control" value="'+ data.obj_catalog.bono_n5 +'" disabled="">';
                texto = texto+'</div>';   
                
                texto = texto+'</div>'; 
                $("#res").html(texto);
            }else{
                document.getElementById("show_information").style.display = "block";
                texto = texto+'<p>';
                texto = texto+'El código no es válido';
                texto = texto+'</p>';   
                $("#res").html(texto);
            }
        }
    });
}