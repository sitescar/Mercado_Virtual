<?php
error_reporting(0);
session_start();
if($_SESSION["user"]){
    //header("location: main");
    exit();
}
include_once("BACKEND/connection.php");
?>
<!DOCTYPE html>
    <html lang="PT-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
        <script src="JAVASCRIPT/interation.js"></script>
        <title>PotiCars - Um mercado virtual Potiguar de vendas automotivas </title>
        <link rel="stylesheet" href="CSS/styleLogin.css">
    </head>
    <body>        
        <main class="container">  
            <h2>Login PotiCars</h2>
            <form action="BACKEND/verifyLogin" method="post"> <!--post não mostra, o get mostra  -->
                <div class="input-field">
                    <input type="text" name="username" id="username" placeholder="Usuário">
                    <div class="underline"></div>
                </div>
                <div class="input-field">
                    <input type="password" name="password" id="password" placeholder="Senha">
                    <div class="underline"></div>
                </div>
                <input type="submit" value="Entrar">
            </form>

            <div class="footer">
                <span>Você é cadastrado no PotiCars?</span>
                <div class="social-fields">
                    <div class="social-field.google">
                        <a href="register" >
                            <i class="fab fa-google-plus-g"></i> 
                            Cadastre-se
                        </a>
                    </div>
                </div>
            </div>
        </main>
        <?php
            //$_SESSION['vaziu']=true;
            //$_SESSION['não_autenticado']=true;
            if (isset($_SESSION["vaziu"])) {
                echo " <div class='erro' id='erro'>
                        <p><strong>Campus vaziu!</strong><br> por favor preencha todos os campus.</p>
                    </div>";
                unset($_SESSION["vaziu"]);
            }elseif(isset($_SESSION['não_autenticado'])){
                echo" <div class='erro' id='erro'>
                        <p><strong>Login Invalido</strong></p>
                    </div>";
                unset($_SESSION['não_autenticado']);
            }
        ?>
    </body>
</html>