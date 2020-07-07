<?php

/*
7 - Um algoritmo deve armazenar o mapa abaixo e listar os caminhos entre os pontos A e E.
*/

// Variaveis para corresponder a posição no array
$a = 0;
$b = 1;
$c = 2;
$d = 3;
$e = 4;
$f = 5;
$g = 6;

// Array das posicoes, apenas para descrição
$posicoes = ["a","b","c","d","e","f","g"];

// Grafo em forma de matriz
$grafo = [[0, 7, 0, 5, 0, 0, 0],
          [7, 0, 8, 9, 7, 0, 0],
          [0, 8, 0, 0, 5, 0, 0],
          [5, 9, 0, 0,15, 6, 0],
          [0, 7, 5,15, 0, 8, 9],
          [0, 0, 0, 6, 8, 0,11],
          [0, 0, 0, 0, 9,11, 0]];

$peso = mostrarCaminho($grafo, $posicoes, $g, $a);
echo " PESO FINAL: $peso";

/*
Parametros da função:
grafo - matriz do grafo
posicoes - array descritivo das posições
alvo - Onde gostariamos de ir
origem - Ponto que estamos
*/
function mostrarCaminho($grafo, $posicoes, $alvo, $origem){
  $peso = 0;

  // Encontramos o que queriamos
  if($grafo[$alvo][$origem] > 0):
    //echo " Tem ligacao ".$posicoes[$origem]." - ".$posicoes[$alvo]." peso ".$grafo[$alvo][$origem];
    $peso = $grafo[$alvo][$origem];
    return $peso;
  endif;

  // Continuamos buscando
  for ($i=0; $i < sizeof($grafo[$alvo]); $i++) { 
    if ($grafo[$alvo][$i] > 0):
      $peso = $grafo[$alvo][$i];
      $retorno = mostrarCaminho($grafo, $posicoes, $i, $origem);
      if ($retorno > 0):
        //echo " Tem ligacao ".$posicoes[$i]." - ".$posicoes[$alvo]." peso ".$grafo[$alvo][$i];
        $peso = $peso + $retorno;
        return $peso;
      endif;
    endif;
  }

  echo "Não tem ligacao";
  return 0;
}

?>