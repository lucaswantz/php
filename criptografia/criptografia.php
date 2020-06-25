<?php
    // Criar a senha
    $senha = "123456";
    $options = ['cost' => 10,];

    $senhasegura = password_hash($senha, PASSWORD_DEFAULT, $options);

    $senhadb = '$2y$10$zDazmT1E0THJuXqhTiW31uGuCYw7IXF7p/31mBQK4gmpGQKzCYy.e';

    if (password_verify("123456", $senhasegura)):
        echo "Senha válida";
    else:
        echo "Senha inválida";
    endif;