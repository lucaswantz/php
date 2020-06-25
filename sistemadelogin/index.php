<?php
    // Conexão
    require_once 'db_connect.php';

    // Sessão
    session_start();

    // Botão enviar
    if(isset($_POST['btn-entrar'])):
        $erros = array();
        $login = mysqli_escape_string($connection, $_POST['login']);
        $senha = mysqli_escape_string($connection, $_POST['senha']);

        if(empty($login) || empty($senha)):
            $erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
        else:
            $sql = "SELECT login FROM usuarios WHERE login = '$login' ";
            $resultado = mysqli_query($connection, $sql);

            if(mysqli_num_rows($resultado) > 0):
                $senha = MD5($senha);
                $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha' ";
                $resultado = mysqli_query($connection, $sql);

                if(mysqli_num_rows($resultado) == 1):
                    $dados = mysqli_fetch_array($resultado);
                    mysqli_close($connection);
                    $_SESSION['logado'] = true;
                    $_SESSION['id_usuario'] = $dados['id'];

                    header('Location: home.php');
                else:
                    $erros[] = "<li> Senha inválida </li>";
                endif;
            else:
                $erros[] = "<li> Usuário inexistente </li>";
            endif;
        endif;
    endif;
?>

<html>
    <head>
        <title>Login</title>
        <neta charset="utf-8">
    </head>
    <body>
        <h1> Login </h1>
        <?php
            // Exibe os erros na tela
            if(!empty($erros)):
                foreach($erros as $erro):
                    echo $erro;
                endforeach;
            endif;
        ?>
        <hr>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            Login: <input type="text" name="login"><br>
            Senha: <input type="password" name="senha">
            <button type="submit" name="btn-entrar"> Entrar </button>
        </form>
    </body>
</html>