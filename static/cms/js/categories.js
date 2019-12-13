$(document).ready(function(){	
        $('#product-form').validate({
	    rules: {
              name: {
	      minlength: 2,
	      required: true
	      },	
            status_value:{
            required: true,
            rangelength: [1,2]
            }
	    },
	    highlight: function(label) {
	    	$(label).closest('.control-group').addClass('error');
	    },
	    success: function(label) {
	    	label
	    		.text('OK!').addClass('valid')
	    		.closest('.control-group').addClass('success');
	    }
	  });     
	  
}); // end document.ready
function cancelar_categories(){
	var url= 'dashboard/categorias';
	location.href = site+url;
}
