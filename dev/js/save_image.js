jQuery(document).ready(function(){

	jQuery('.save_btn').click(function(){
		jQuery(".res").html('لطفا کمی منتظر بمانید....');
		var name1=jQuery('.name1').val(),
			name2=jQuery('.name2').val(),
			postid=jQuery(this).data('id');
		jQuery.post(the_ajax_script.ajaxurl,{action:"save_image_function",name1:name1,name2:name2,postid:postid},function(response){
			jQuery(".res").html(response);
		});
	});
    //----------------------------------------------
});