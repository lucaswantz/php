<?php
    // Não tem decodificação
    $senha = "123456";
    $senhabase64 = MD5($senha);

    echo "<br>";
    echo "Senha: ".$senha."<br>";

    echo "<br>";
    echo "Senha MD5: ".$senhabase64."<br>";
