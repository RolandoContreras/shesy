function export_comission(){
      var date_ini = $("#date_ini").val();
      var date_end = $("#date_end").val();  
      
       $.ajax({
                   type: "post",
                   url: site+"dashboard/reportes_comision/comission_excel",
                   dataType: "json",
                   data: {date_ini: date_ini,
                          date_end: date_end},
                   success:function(data){                             
//                   location.reload();
                   }         
           });
  }
  
function cancelar_comission(){
	var url= 'dashboard/reportes_comision';
	location.href = site+url;
}
