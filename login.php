<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
    <?php

    //Se existir a variável msg, será impresso na tela a mensagem
    if (isset($_SESSION['mensagem'])) {
        echo $_SESSION['mensagem'];
        //unset: destruir a variável
        unset($_SESSION['mensagem']);
    }
    ?>


    <div>
        <form method="POST" action="proc-login.php">
            <label>Login</label>
            <input type="text" name="login" id="login"><br>
            <label>Email</label>
            <input type="email" name="email" id="email"><br>
            <label>Senha</label>
            <input type="password" name="senha" id="senha"><br>

            <input type="submit" value="entrar" id="entrar"><br>
            <a href="cadastro.php">Cadastre-se</a>
            <a href="index.php">Home</a>
        </form>
    </div>
</body>
</html>