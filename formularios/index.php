<?php

?>

<?php
    if(isset($_POST['enviar-formulario'])):
        $erro = array();
        
        // Validações
        if(!$idade = filter_input(INPUT_POST, "idade", FILTER_VALIDATE_INT)):
            $erros[] = "Idade inválida";
        endif;

        if(!$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)):
            $erros[] = "Email inválido";
        endif;

        if(!$peso = filter_input(INPUT_POST, "peso", FILTER_VALIDATE_FLOAT)):
            $erros[] = "Peso inválido";
        endif;

        if(!$ip = filter_input(INPUT_POST, "ip", FILTER_VALIDATE_IP)):
            $erros[] = "IP inválido";
        endif;

        if(!$url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL)):
            $erros[] = "URL inválida";
        endif;

        // Mensagens de erro
        if(!empty($erros)):
            foreach($erros as $erro):
                echo "<li> $erro </li>";
            endforeach;
        else:
            echo "Tudo certo";
        endif;
    endif;
?>

<html>
   <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            Idade: <input type="text" name="idade"><br>
            Email: <input type="text" name="email"><br>
            Peso: <input type="text" name="email"><br>
            Ip: <input type="text" name="email"><br>
            URL: <input type="text" name="email"><br><br>
            <button type="submit" name="enviar-formulario">Enviar</button><br>
        </form>
    </body>
</html>