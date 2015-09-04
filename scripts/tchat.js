$('#tchatForm').submit(function(e){
    e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
    var url = $(this).parents(".full-tchat").find("form").attr("action");
    var message = $(this).parents(".full-tchat").find("#message").val();

    if(message != ""){
        $(this).parents(".full-tchat").find(".tchat").prepend("<p>" + message + "</p>");
        $.post(url, {message:message, submit:true}, function(data){
        });
    }
});

// function refresh(){

// }
