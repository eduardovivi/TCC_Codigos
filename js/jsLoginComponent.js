$(document).ready(function(){
    $('#btn_login').click(function(){
     
        validaLogin($('#login'),$('#senha'));
    });
    
});


function validaLogin(login,senha){
   if(login.val() === ""){

   } else if(senha.val() === ""){

   }else{
      $("#resultado").html("");
      $("#resultado").append('<img src="imagens/loading.gif" height="60" width="60">');
      $.post("Components/Module_comum/LoginComponent.class.php?acaoAjax=autenticar",
             {login: login.val(), senha: senha.val()},
             function(retorno){
               $('#resultado').html(retorno);
     });     
   }
}