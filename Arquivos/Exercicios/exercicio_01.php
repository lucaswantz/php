<?php

/*
1 - Escrever um algoritmo que rotacione um array em k posições. Exemplo: o array
[1,2,3,4,5,6] se for girado duas posições para a esquerda se torna [3,4,5,6,1,2]. 
Tente resolver sem usar uma cópia da array.
*/

$lista = array(1, 2, 3, 4, 5, 6);
print_r($lista);

rotacionarArray($lista, 3);
print_r($lista);

// Utilizando & para passar por referencia
function rotacionarArray(&$array, $k){
  // Quantidade de vezes a rotacionar
  while($k > 0):
    // Rotacionar uma posição por vez
    rotacionar($array);
    $k--;
  endwhile;
}

// Utilizando & para passar por referencia
function rotacionar(&$array){
  $registros = sizeof($array);
  $ultimaposicao = $registros - 1;
  $primeiroregistro = $array[0];
  
  for ($i = 0; $i < $ultimaposicao; $i++) {
    $array[$i] = $array[$i + 1];
  }

  $array[$ultimaposicao] = $primeiroregistro;
}

?>