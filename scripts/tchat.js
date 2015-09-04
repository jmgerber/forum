// $(document).ready(function(){

// 	$('.search').keyup(function(){
// 		var text = $(this).val();
// 		$.post("search", {search : text}, function(data)
// 		{
// 			var content = $('<div>'+data+'</div>').find('.container').html();
// 			$('.container').html(content);
// 		});
// 	});

// });

// function refresh()
// {
// 	var used = [];
// 	setInterval(function()
// 	{
// 		$.getJSON('messages', function(liste)
// 		{
// 			var i = 0;
// 			while (i < liste.length)
// 			{
// 				if (used.indexOf(liste[i].id) == -1)
// 				{
// 					var message = $('<div class="message"><span class="date">'+liste[i].date+'</span> <span class="author"></span> > <span class="content"></span></div>');
// 					$('.author', message).text(liste[i].author);
// 					$('.content', message).text(liste[i].content);
// 					$('#content').prepend(message);
// 					used.push(liste[i].id);
// 				}
// 				i++;
// 			}
// 		});
// 	}, 500);
// }

// console.log(sessionId);
// function sendMessage(info)
// {
// 	if (info.keyCode == 13)
// 	{
// 		var message = $(this).val();
// 		if (message != '')
// 		{
// 			$(this).val('');
// 			$.post('home', {"auteur": sessionId, "message": message});
// 		}
// 	}
// }
// $('input').keyup(sendMessage);


// $('#tchatForm').submit(function(e){
//     e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
// 	// on sécurise les données
//     var message = $('#message').val();
//     if(message != ""){ // on vérifie que les variables ne sont pas vides
//         $.post("home",{message : message}, function(data)
//         {
//             var content = $('<div>'+data+'</div>').find('.tchat').html();
//             $('.tchat').html(content);
//         });
//     }
// });

$('#tchatForm').submit(function(e){
    e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
    var url = $(this).parents(".full-tchat").find("form").attr("action");
    var message = $(this).parents(".full-tchat").find("#message").val();

    if(message != ""){
        $(this).parents(".full-tchat").find(".tchat").prepend("<p>" + message + "</p>");
        $.post(url, {message:message,submit:true}, function(data){
        });
    }
});

// function refresh(){
//     $.ajax({
//         url: "",
//         success:
//             function(retour){
//             $('.tchat').html(retour);
//         }
//     });
// }

// setInterval(refresh(), 500);

