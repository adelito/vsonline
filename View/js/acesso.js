$(function(){
    $("button#btnEntrar").on("click", function(e){
        e.preventDefault();
        
        var campoUsuario = $("form#formularioLogin #usuario").val();
        var campoSenha = $("form#formularioLogin #senha").val();

        if(campoUsuario.trim()=="" || campoSenha.trim()==""){
            $("div#mensagem").html("Preencha todos os campos");
        }else{
            $.ajax({
                url:"login.php",
                type: "POST",
                data:{
                    usuario: campoUsuario,
                    senha: campoSenha
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);
                    if(retorno["erro"]){
                        $("div#mensagem").html(retorno["mensagem"]);
                    }else{
                        window.location = "View/dashboard/dashboard.php";
                    }
                },

                error: function(){
                    $("div#mensagem").html("Ocorreu um erro durante a solicitação");
                }
            })
        }
    })
});