<?php

/*
2 - Criar um algoritmo que leia um vetor de números e reordene este vetor contendo no 
início os números pares de forma crescente e depois, os ímpares de forma decrescente.
*/

$lista = array(1, 5, 8, 3, 2, 4);
print_r($lista);

ordenarArray($lista);
print_r($lista);

// Utilizando & para passar por referencia
function ordenarArray(&$array){
  $arraypar = [];
  $arrayimpar = [];

  for ($i=0; $i < sizeof($array); $i++) { 
    if($array[$i] % 2 == 0):
      $arraypar[sizeof($arraypar)] = $array[$i];
    else:
      $arrayimpar[sizeof($arrayimpar)] = $array[$i];
    endif;
  }
  ordenarCrescente($arraypar);
  ordenarDecrescente($arrayimpar);

  juntarArrays($array, $arraypar, $arrayimpar);
}

// Função para ordenar o array crescente (Bubble sort)
function ordenarCrescente(&$array){
  for($i = 0; $i < sizeof($array); $i++){
    for ($j = 0; $j < sizeof($array) - 1; $j++) { 
      if($array[$j + 1] <= $array[$j]): 
        $aux = $array[$j];
        $array[$j] = $array[$j + 1];
        $array[$j + 1] = $aux;
      endif;
    }
  }
}

// Função para ordenar o array decrescente
function ordenarDecrescente(&$array){
  for($i = 1; $i < sizeof($array); $i++){
    for ($j = 0; $j < $i; $j++) { 
      if($array[$i] > $array[$j]): 
        $aux = $array[$i];
        $array[$i] = $array[$j];
        $array[$j] = $aux;
      endif;
    }
  }
}

// Função para juntar os dois arrays
function juntarArrays(&$array, &$arraypar, &$arrayimpar) {
  $tamanhopar = sizeof($arraypar);

  for($i = 0; $i < sizeof($arraypar); $i++) {
    $array[$i] = $arraypar[$i];
  }
  
  for($i = 0; $i < sizeof($arrayimpar); $i++) {
    $array[$tamanhopar] = $arrayimpar[$i];
    $tamanhopar++;
  }
}