<?php

    require_once('db.class.php');

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $objDb = new db();
    $link = $objDb->conecta_mysql();
    
    $sql = " SELECT * FROM usuarios WHERE usuario = '$usuario' ";

    $usuario_existe = false;
    $email_existe = false;

    if($resultado_id = mysqli_query($link, $sql)){
        $dados_usuario = mysqli_fetch_array($resultado_id);

        if(isset($dados_usuario['usuario'])){
            $usuario_existe = true;
        } else {
            echo "Usuário disponível";
        }

    } else {
        echo "Erro ao tentar localizar registro de usuários";
    };

    if($resultado_id = mysqli_query($link, $sql)){
        $dados_usuario = mysqli_fetch_array($resultado_id);

        if(isset($dados_usuario['email'])){
            $email_existe = true;
        } else {
            echo "Email Aceito";
        }

    } else {
        echo "Erro ao tentar localizar registro de email";
    };
    
    if($usuario_existe || $email_existe){

        $retorno_get = "";

        if($usuario_existe){
            $retorno_get.= "erro_usuario=1&";
        }

        if($email_existe){
            $retorno_get.= "erro_email=1&";
        }

        header('Location: inscrevase.php?'.$retorno_get);
        die();
    }
    
    $sql = " insert into usuarios(usuario, email, senha) values ('$usuario', '$email', '$senha') ";

    if(mysqli_query($link, $sql)){
        echo 'Usuário registrado com sucesso!';
    } else {
        echo 'Erro ao registrar o usuário!';
    };
?>