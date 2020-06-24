<?php

?>

<?php
    if(isset($_POST['enviar-formulario'])):
        $erro = array();
        
        // Sanitize
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        echo $nome."<br>";

        $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
        if(!filter_var("idade", FILTER_VALIDATE_INT)):
            $erros[] = "Idade precisa ser um inteiro";
        endif;


        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if(!filter_var("email", FILTER_VALIDATE_EMAIL)):
            $erros[] = "Email inválido";
        endif;

        $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
        if(!filter_var("url", FILTER_VALIDATE_URL)):
            $erros[] = "URL inválida";
        endif;

        // Mensagens de erro
        if(!empty($erros)):
            foreach($erros as $erro):
                echo "<li> $erro </li>";
            endforeach;
        endif;
    endif;
?>

<html>
   <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            Idade: <input type="text" name="idade"><br>
            Nome: <input type="text" name="nome"><br>
            Email: <input type="text" name="email"><br>
            URL: <input type="text" name="email"><br><br>
            <button type="submit" name="enviar-formulario">Enviar</button><br>
        </form>
    </body>
</html>