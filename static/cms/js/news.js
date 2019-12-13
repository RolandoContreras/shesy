function edit_news(news_id){    
     var url = 'dashboard/noticias/load/'+news_id;
     location.href = site+url;   
}
function cancel_news(){
	var url= 'dashboard/noticias';
	location.href = site+url;
}
function add_news(){
	var url= 'dashboard/noticias/load';
	location.href = site+url;
}
