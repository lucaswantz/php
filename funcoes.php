<?php
// Criando funções
echo "<hr>";

function exibirNome($nome) {
    echo "Meu nome é $nome";
}

exibirNome("Lucas Motta");

echo "<hr>";

function calcularMedia($nome, $n1, $n2, $n3, $n4) {
    $media = ($n1 + $n2 + $n3 + $n4) / 4;

    if($media >= 7):
        echo "$nome foi aprovado com a média $media. <br>";
    else:
        echo "$nome foi reprovado com a média $media. <br>";
    endif;
}

calcularMedia("Bob", 5, 7, 9, 10);
calcularMedia("João", 5, 2, 6, 3);