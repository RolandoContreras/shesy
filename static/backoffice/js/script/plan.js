function create_invoice(kit_id){
    $.ajax({
       type: "post",
       url: site+"backoffice/plan/create_invoice",
       dataType: "json",
       data: {kit_id : kit_id},
       success:function(data){          
           if(data.status == "true"){
               location.href = site + "backoffice/invoice";
           }
       }         
     });
}
