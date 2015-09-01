$(document).ready(function(){

	$('.search').keyup(function(){
		var text = $(this).val();
		$.post("search", {search : text}, function(data)
		{
			var content = $('<div>'+data+'</div>').find('.container').html();
			$('.container').html(content);
		});
	});

});