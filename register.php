<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styleCadastro.css">

    <title>Cadastro de usuário</title>

</head>
<body>
    <main class="container">  
        <h2>Cadastramento</h2>
        <form action="BACKEND/registerLogin" method="post">
            <div class="input-field">
                <input type="text" name="completName" placeholder="Nome completo">
                <div class="underline"></div>
             </div>
             <div class="input-field">
                <input type="text" name="city" placeholder="Sua cidade">
                <div class="underline"></div>
             </div>
             <div class="input-field">
                <input type="text" name="contact" placeholder="Contato">
                <div class="underline"></div>
             </div>
             <div class="input-field">
                <input type="text" name="email" placeholder="E-mail">
                <div class="underline"></div>
             </div>
             <div class="input-field">
                <input type="text" name="username" placeholder="Nome de usuário">
                <div class="underline"></div>
             </div>
             <div class="input-field">
                <input type="password" name="password" placeholder="Senha">
                <div class="underline"></div>
             </div>
             
             <input type="submit" value="Cadastrar">
        </form>
       
    </main>
    
</body>
</html>