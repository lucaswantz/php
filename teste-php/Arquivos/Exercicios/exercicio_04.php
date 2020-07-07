<?php

/*
4 - Receba 6 números representando medidas a,b,c,d,e e f e relacionar quantos e quais
triângulos é possível formar usando estas medidas. Exemplo [abc], [abd]...
*/

$a = 4;
$b = 3;
$c = 5;
$d = 7;
$e = 8;
$f = 6;

$tamanhos = array($a, $b, $c, $d, $e, $f);
$quantidade = 0;

## For para verificar as possibilidades
for ($i = 0; $i < sizeof($tamanhos); $i++) { 
  for ($j = $i + 1; $j < sizeof($tamanhos); $j++) { 
    for ($k = $j + 1; $k < sizeof($tamanhos) ; $k++) { 
      echo "<br>";
      if (ehTrianguloValido($tamanhos[$i], $tamanhos[$j], $tamanhos[$k])):
        echo " Triangulo válido [ $tamanhos[$i] - $tamanhos[$j] - $tamanhos[$k] ]";
        $quantidade++;
      else:
        echo " Triangulo inválido [ $tamanhos[$i] - $tamanhos[$j] - $tamanhos[$k] ]";
      endif;
    }
  }
}

echo "<br><br>";
echo " Total de $quantidade triangulos.";

// Função para validar se um triângulo é válido
function ehTrianguloValido($lado1, $lado2, $lado3) {
  $triangulo = false;
  if(($lado1 + $lado2 > $lado3) && ($lado1 + $lado3 > $lado2) && ($lado2 + $lado3 > $lado1)):
    $triangulo = true;
  else:
    $triangulo = false;
  endif;
  return $triangulo;
}



?>