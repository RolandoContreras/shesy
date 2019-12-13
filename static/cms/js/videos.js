function new_video(){
	var url= 'dashboard/videos/load';
	location.href = site+url;
}
function edit_videos(video_id){    
     var url = 'dashboard/videos/load/'+video_id;
     location.href = site+url;   
}
function cancel_video(){
	var url= 'dashboard/videos';
	location.href = site+url;
}