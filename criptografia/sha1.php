<?php
    // Não tem decodificação
    $senha = "123456";
    $senhabase64 = SHA1($senha);

    echo "<br>";
    echo "Senha: ".$senha."<br>";

    echo "<br>";
    echo "Senha SHA1: ".$senhabase64."<br>";
