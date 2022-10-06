<?php

session_start();

include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_users = "SELECT * FROM usuarios WHERE id = '$id'";
$result_usuarios = mysqli_query($conn, $result_users);
$row_usuario = mysqli_fetch_assoc($result_usuarios);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <?php

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    ?>

    <form method="POST" action="proc-edit-user.php">
        <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

        <input class="form-control" type="text" name="nome" placeholder="Nome" value=" <?php echo $row_usuario['nome']; ?> " required ><br><br>
        <input class="form-control" type="email" name="email" placeholder="E-mail" value=" <?php echo $row_usuario['email']; ?> " required >

        <input class="btn btn-primary botao" type="submit" value="Editar" name="editar">
    </form>

    <a href="index.php">Home</a>

</body>
</html>