<?php
 
/*
3 - Escreva um algoritmo que calcule o tempo em dias a partir de uma data inicial 
e final recebidos no formato dd/mm/aaaa. Não deve usar funções de data e hora.
*/

$datainicial = "28/02/2020";
$datafinal = "01/03/2020";

$diferencadias = calcularDiferencaDatas($datainicial, $datafinal);
echo "Tota de dias entre $datainicial e $datafinal: ";
echo $diferencadias;

// Calcula a diferença entre duas datas
function calcularDiferencaDatas($datainicial, $datafinal){

  // Total de dias data inicial
  $array = explode("/", $datainicial);
  $totaldiasinicial = retornaDiasData($array[0], $array[1], $array[2]);

  // Total de dias data final 
  $array = explode("/", $datafinal);
  $totaldiasfinal = retornaDiasData($array[0], $array[1], $array[2]);

  // Calcula a diferença
  if ($totaldiasfinal >= $totaldiasinicial):
    return ($totaldiasfinal - $totaldiasinicial);
  else:
    return ($totaldiasinicial - $totaldiasfinal);
  endif;
}

// Retorna a quantidade de dias de uma data
function retornaDiasData($dia, $mes, $ano){
  $totaldias = 0;
  $bissexto = ehBissexto($ano);

  // Busca todos os dias dos anos
  for ($i=1; $i < $ano; $i++) { 
    if(ehBissexto($i)):
      $totaldias += 366;
    else:
      $totaldias += 365;
    endif;
  }

  // Total de dias do mes
  $diasmes = 0;
  for ($i=1; $i < $mes; $i++) { ;
    $diasmes += retornarDiasMes($bissexto, $i);
  }
  $totaldias += $diasmes;

  // Total de dias do dia
  $totaldias += $dia;

  return $totaldias;
}

// Retorna se o ano é bissexto
function ehBissexto($ano){
  /*
  Algoritmo de determinação - WIKIPEDIA
  Eis um pseudocódigo que determina quando um ano é bissexto ou não:

  Inicio
      Declare ano Inteiro;
      Declare bissexto Booleano;
      Leia(ano);
      Se ( ano módulo 400 é 0 ) então
          bissexto=Verdade;
      Senão
          Se (ano módulo 4 é 0 E ano módulo 100 é diferente de 0) então 
              bissexto=Verdade;
          Senão
              bissexto=Falso;
  Fim
  */

  $bissexto = false;

  if ($ano % 400 == 0):
    $bissexto = true;
  else:
    if ($ano % 4 == 0 && $ano % 100 != 0):
      $bissexto = true;
    else:
      $bissexto = false;
    endif;
  endif;

  return $bissexto;
}

// Retorna a quantidade de dias no mês
function retornarDiasMes($bissexto, $mes) {
  $dias = 0;

  switch($mes) {
    case 1:
      $dias = 31;
      break;
    
    case 2:
      if($bissexto):
        $dias = 29;
      else:
        $dias = 28;
      endif;
      break;

    case 3:
      $dias = 31;
      break;

    case 4:
      $dias = 30;
      break;

    case 5:
      $dias = 31;
      break;

    case 6:
      $dias = 30;
      break;
  
    case 7:
      $dias = 31;
      break;
  
    case 8:
      $dias = 31;
      break;

    case 9:
      $dias = 30;
      break;

    case 10:
      $dias = 31;
      break;
  
    case 11:
      $dias = 30;
      break;
  
    case 12:
      $dias = 31;
      break;
  }

  return $dias;
}

?>