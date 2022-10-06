<?php

//deve ser o primeiro elemento na página para iniciar a sessão
session_start();

// INCLUDE para incluir a conexão e ONCE para ser somente uma vez
include_once("conexao.php");

//Para receber dados do formulario usar: filter
//filter_sanitize_string: para limpar os dados da variável que vem do formulário

$login = $_POST['login'];
$senha = $_POST['senha'];
$email = $_POST['email'];

if (isset($login)) {
    
    $verifica = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");
    if (mysqli_num_rows($verifica) <= 0) {
        $_SESSION['mensagem'] = '<p>Login ou senha incorretos!</p>';
        header('Location: login.php');
    die();
    }
    else {
        $_SESSION['mensagem'] = '<p>Login feito com sucesso!</p>';
        header('Location: login.php');
    }
}

?>