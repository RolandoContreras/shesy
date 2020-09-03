function send(){    
var url = 'dashboard/membresias/validate';
if($('#image_file').val() == ''){
            $("#uploaded_image").html('<div class="alert alert-danger" style="text-align: center">Debe seleccionar la imagen</div>  ');
        }else{
                $.ajax({
                url : site+url,
                method: "POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success:function(data){
                    $("#uploaded_image").html(data);
                }
            });
        }
}
function new_investment(){    
     var url= 'dashboard/inversiones/load';
     location.href = site+url;
}
function edit_investment(investment_id){    
     var url = 'dashboard/inversiones/load/'+investment_id;
     location.href = site+url;   
}
function cancel_investment(){
	var url= 'dashboard/inversiones';
	location.href = site+url;
}