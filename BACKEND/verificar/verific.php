<?php
try{
    $query=$pdo->prepare("SELECT * FROM usuarios WHERE 
    apelido_usuario='{$_COOKIE['login']}' or email='{$_COOKIE['login']}' and senha='{$_COOKIE['senha']}'");//stamente do pdo
    $query->execute();
    if($query->rowCount()==1){
        setcookie("user",$_COOKIE['user'],time()+(60*60*24),"/");//adicionar valor ao cookie
        setcookie("login",$_COOKIE['login'],time()+(86400*3),"/");
        setcookie("senha",$_COOKIE['senha'],time()+(86400*3),"/");
        
        header("location: index");
        exit();
    }
}catch(Exception $e){
    exit();
}

?>