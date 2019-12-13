$(document).ready(function() {
	$('.bottom_tooltip').tooltip({
		placement: 'bottom'
	});
	$('.left_tooltip').tooltip({
		placement: 'left'
	});
	$('.right_tooltip').tooltip({
		placement: 'right'
	});
	$('.top_tooltip').tooltip();
	$('.dropdown-menu.megamenu, .dropdown-menu.fb-one').click(function(event){
		event.stopPropagation();
	});
	$('#sidebar .accordion-group.fs .accordion-heading').addClass('active-head');
	$('#sidebar .accordion-group .accordion-heading').live('click', function(){
		$('#sidebar .accordion-group .accordion-heading').removeClass('active-head');
		$(this).addClass('active-head');
	});
	$('#sidebar .nav.nav-list li a').live('click', function(){
		$('#sidebar .nav.nav-list li').removeClass('active');
		$(this).parent('li').addClass('active');
	});
	
	$(".table tbody tr").hover(
		function() { $(this).children('td').children('.operation').children('.btn-group').fadeIn(); },
		function() { $(this).children('td').children('.operation').children('.btn-group').fadeOut(); }
	);
	
	$('#post_status_select li a').live('click', function(){
		$('#post_status span').html($(this).html());
	});
	
	$('#post_vis_select li a').live('click', function(){
		$('#post_vis span').html($(this).html());
		if($('#post_vis span').html() == "Password protected"){
			$('#post_password').show();
		}else{
			$('#post_password').hide();
		}
	});
});
