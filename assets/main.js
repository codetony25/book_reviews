$(function(){

	$('#author_name_select').change(function(){
		$('#author_name').attr('disabled', true);
	});

	$('#author_name').keydown(function() {
		$('#author_name_select').attr('disabled', true);
	});
	
});