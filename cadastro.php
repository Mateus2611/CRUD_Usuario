<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>

    <h1>Cadastrar Usuário</h1>


    <?php

    //Se existir a variável msg, será impresso na tela a mensagem
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        //unset: destruir a variável
        unset($_SESSION['msg']);
    }
    ?>

    <!--
        action=processa.php: arquivo para o qual será enviado os dados.
    -->
    <form method="POST" action="proc-cadastro.php">
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Digite seu nome completo"><br><br>

        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Informe seu e-mail"><br><br>

        <label>Senha: </label>
        <input type="password" name="senha" placeholder="informe sua senha" minlength="6" maxlength="300"><br><br>

        <input type="submit" value="Cadastrar">
    </form>
    <a href="login.php">Faça login</a>
    <a href="index.php">Home</a>
</body>
</html>