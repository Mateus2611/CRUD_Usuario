<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Home</title>
</head>
<body>
    <main>
        <div class="home-page">
            <h1 class="titulo-principal">Listar Usuários</h1>
            
            <?php
            include_once("conexao.php");
            
            if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            }

            //RECEBER O NUMERO DA PAGINA
            $pag_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
            $pagina = (!empty($pag_atual)) ? $pag_atual : 1;

            // SETAR A QUANTIDADE DE ITENS POR PAGINA
            $qnt_result_pag = 3;

            // CALCULAR O INICIO DA VISUALIZAÇÃO
            $inicio = ($qnt_result_pag * $pagina) - $qnt_result_pag;

            $result_users = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pag";
            $result_usuarios = mysqli_query($conn, $result_users);
            while ($row_usuario = mysqli_fetch_assoc($result_usuarios)) {
                echo "<section class='forms'>";
                    echo "ID: " . $row_usuario['id'] . "<br>";
                    echo "Nome: " . $row_usuario['nome'] . "<br>";
                    echo "E-mail: " . $row_usuario['email'] . "<br>";
                echo "</section>";


                echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "' class='btn-editar'>Editar</a><br><br>";

                echo "<a href='proc-apagar-user.php?id=" . $row_usuario['id'] . "' class='btn-apagar'>Apagar</a><br><br>";
            }
        
            // PAGINAÇÃO - $Somar a quantidade de usuário
            $result_pag = "SELECT COUNT(id) as num_result FROM usuarios";
            $resultado_pag = mysqli_query($conn, $result_pag);
            $row_pag = mysqli_fetch_assoc($resultado_pag);

            //QUANTIDADE DE PAGINAS
            $quant_pg = ceil($row_pag['num_result'] / $qnt_result_pag);

            // LIMITAR OS LINKS ANTES E DEPOIS
            $max_links = 2;
            echo "<section class='btn-paginas'>";
                echo "<a href='index.php?pagina=1'>Primeira</a>";

                for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
                    if ($pag_ant >= 1) {
                        echo "<a href='index.php?pagina=$pag_ant'>$pag_ant</a>";
                    }
                }

                echo "$pagina";

                for ($pag_dep = $pagina - $max_links; $pag_dep <= $pagina - 1; $pag_dep++) {
                    if ($pag_dep >= 1) {
                        echo "<a href='index.php?pagina=$pag_dep'>$pag_dep</a>";
                    }
                }

                echo "<br><a href='index.php?pagina=$quant_pg'>Ultima</a><br>";
            echo "</section>";

            ?>
            <a class="link" href="login.php">Login</a><br>
            <a class="link" href="cadastro.php">Cadastrar</a><br>
        </div>

    </main>
</body>
</html>