$(document).ready(function(){

	$('.modify').click(function(){
		//Le contenu du message est remplacé par un formulaire avec textarea
		var text = $(this).parents('.messages-content').find('.wrapper-message').text();
		console.log(text);
		var url = $(this).parents('.messages-modif').find('form').attr('action');
		var form = '<form method="post" action="'+url+'"><div class="form-group"><textarea name="contenu" class="form-control" rows="3">'+text+'</textarea></div><button name="update" type="submit" class="btn btn-primary update">Valider</button></form>';
		$(this).parents('.messages-content').find('.wrapper-message').html(form);
		
		$('.update').click(function(info)
		{
			info.preventDefault();
			var contenu = $(this).parents('.messages-content').find('textarea').val();
			$(this).parents('.messages-content').find('.wrapper-message').html('<p>'+contenu.replace(/\n/g, "<br/>")+'</p>');
			$.post(url, {contenu : contenu, update : ''}, function(data){

			});
			return false;
		});
	});

});