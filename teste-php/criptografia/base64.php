<?php
    // Tem decodificação
    $senha = "123456";
    $senhabase64 = base64_encode($senha);

    echo "<br>";
    echo "Senha base64: ".$senhabase64."<br>";
    
    echo "<br>";
    echo "Senha: ".base64_decode($senhabase64)."<br>";
