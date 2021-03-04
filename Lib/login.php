<?php
    require("conexao_sqlServer.php");

    if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])){
        $login = $_POST['usuario'];
        $senha = $_POST['senha'];
        $sql = "SELECT * FROM cusuario WHERE logon='".$login."' and senha='".$senha."'";
        $sql = $conexao->query($sql);
        if($sql->rowCount()){
            $dado = $sql->fetch(PDO::FETCH_ASSOC)[0];
            session_start();
            $_SESSION["usuario"] = array($dado["nome"], $dado["logon"]);
            echo json_encode(array("erro" => 0, "mensagem" => "Usuário e Senha."));
        }else{
            echo json_encode(array("erro" => 1, "mensagem" => "Usuário e/ou senha incorretos."));
        } 
        
    }else{
        echo json_encode(array("erro" => 1, "mensagem" => "Ocorreu um erro interno no servidor."));
    }
