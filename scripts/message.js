$(document).ready(function(){

	$('.update').click(function(){
		$(this).text('Valider');
		$(this).parents('.messages-content').find('.wrapper-message').find('p').html();
		$(this).parents('.messages-content').find('.wrapper-message').html('<textarea></textarea>');
	});

});