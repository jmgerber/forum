$(document).ready(function(){
	$('.string').keyup(function(){
		var text = $(this).val();
		$.post("search", {string : text}, function(data)
		{
			var content = $('<div>'+data+'</div>').find('.main-content').html();
			$('.main-content').html(content);
		});
	});
});