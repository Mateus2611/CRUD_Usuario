<?php
//deve ser o primeiro elemento na página para iniciar a sessão
session_start();

// INCLUDE para incluir a conexão e ONCE para ser somente uma vez
include_once("conexao.php");

//Para receber dados do formulario usar: filter
//filter_sanitize_string: para limpar os dados da variável que vem do formulário

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$result_usuario = "INSERT INTO usuarios (nome, email, senha, criado) VALUES ('$nome', '$email', '$senha', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

//Verificar se foi inserido com sucesso no banco de dados
// quando for cadastrado com sucesso, queremos que seja redirecionado
// para o arquivo: index.php

if (mysqli_insert_id($conn)) {
    $_SESSION['msg']="<p>Usuário cadastrado com sucesso</p>";
    header("Location: cadastro.php");
}else {
    $_SESSION['msg'] = "<p>Usuário não foi possível realizar o cadastro. Tente mais tarde.</p>";
    header("Location: cadastro.php");
}

?>