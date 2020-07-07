<?php

/*
5 - Um algoritmo deve buscar um sub-texto dentro de um texto fornecido. 
(Não usar funções de busca em string). 
*/

$palavra = "Teste";
$busca = "est";

if(contemSubTexto($palavra, $busca)):
  echo "Encontrou o texto";
else:
  echo "Não encontrou o texto";
endif;

// Verifica se a Palavra contem a busca desejada
function contemSubTexto($palavra, $busca){
  // Quebrei as duas strings em um array de char
  $arraypalavra = str_split($palavra, 1);
  $arraybusca = str_split($busca, 1);

  // Busquei o tamanho das duas strings
  $tamanhopalavra = sizeof($arraypalavra);
  $tamanhobusca = sizeof($arraybusca);

  $contem = false;
  
  // Se for maior, retorna que não contem
  if($tamanhobusca > $tamanhopalavra):
    return $contem;
  endif;

  // For para encontrar a palavra, mas só até não ultrapassar o 
  // tamanho da palavra buscada
  for ($i=0; $i <= ($tamanhopalavra - $tamanhobusca); $i++) { 
    // Guardo a posição do for, para poder incrementar
    $k = $i;

    $contem = true;
    // Testo posicao por posição, para verificar se existe a palavra completa
    for ($j=0; $j < $tamanhobusca; $j++) { 
      if ($arraypalavra[$k] != $arraybusca[$j]):
        $contem = false;
      endif;
      $k++;
    }

    // Se encontrou toda a palavra, cai fora do for
    if ($contem):
      break;
    endif;
  }

  return $contem;
}

?>