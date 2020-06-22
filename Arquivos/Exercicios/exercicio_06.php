<?php

/*
6 - Criar um algoritmo que teste se dois retângulos se sobrepõem em um plano
cartesiano e calcule a área do retângulo criado pela sobreposição. Deve receber 
como entrada dois retângulos formados por pontos, 
ex: (0,0),(2,2),(2,0),(0,2),(1,0),(1,2),(6,0),(6,2) e gerar uma saída informando 
a área calculada ou zero se não ocorrer sobreposição.
*/

// Retangulo 01
$inf_esq_1 = [0,0];
$sup_dir_1 = [2,2];
$inf_dir_1 = [2,0];
$sup_esq_1 = [0,2];

// Retangulo 02
$inf_esq_2 = [1,0];
$sup_esq_2 = [1,2];
$inf_dir_2 = [6,0];
$sup_dir_2 = [6,2];

retangulosSobrepostos($inf_esq_1, $sup_dir_1, $inf_dir_1, $sup_esq_1, 
                           $inf_esq_2, $sup_dir_2, $inf_dir_2, $sup_esq_2);


function retangulosSobrepostos($inf_esq_1, $sup_dir_1, $inf_dir_1, $sup_esq_1, 
                                    $inf_esq_2, $sup_dir_2, $inf_dir_2, $sup_esq_2){
  $diferencaXponto1 = 0;
  $diferencaYponto1 = 0;
  $diferencaXponto2 = 0;
  $diferencaYponto2 = 0;

  // Canto superior direito
  if($sup_esq_2[0] < $inf_dir_1[0] && $sup_esq_2[0] > $sup_esq_1[0]):
    $diferencaXponto1 = $inf_dir_1[0] - $sup_esq_2[0];
  endif;

  if($sup_esq_2[1] > $inf_dir_1[1] && $sup_esq_2[1] < $sup_esq_2[1]):
    $diferencaYponto1 = $inf_dir_1[0] - $sup_esq_2[0];
  endif;

  // Canto inferior esquerdo
  if($inf_dir_2[0] < $inf_dir_1[0] && $inf_dir_2[0] > $sup_esq_1[0]):
    $diferencaXponto2 = $inf_dir_1[0] - $inf_dir_2[0];
  endif;

  if($inf_dir_2[1] > $inf_dir_1[1] && $inf_dir_2[1] < $sup_esq_2[1]):
    $diferencaYponto2 = $inf_dir_1[0] - $inf_dir_2[0];
  endif;

  if ($diferencaXponto1 > 0||$diferencaYponto1 > 0||$diferencaXponto2 > 0||$diferencaYponto2 > 0):
    $x = 0;
    $y = 0;

    if ($diferencaXponto1 == 0 && $diferencaXponto2 == 0):
      $x = $sup_dir_1[0] - $inf_dir_1[0];
    endif;

    if ($diferencaYponto1 == 0 && $diferencaYponto2 == 0):
      $y = $sup_dir_1[1] - $inf_dir_1[1];
    endif;

    $x = ($diferencaXponto1 > 0? $diferencaXponto1 : $x);
    $x = ($diferencaXponto2 > 0? $diferencaXponto2 : $x);
    $y = ($diferencaYponto1 > 0? $diferencaYponto1 : $y);
    $y = ($diferencaYponto2 > 0? $diferencaYponto2 : $y);
    
    $area = $x * $y;
    echo "Estão sobrepostos. Area da sobreposição : $area";
  else:
    echo "Não estão sobrepostos";
  endif;
}

?>