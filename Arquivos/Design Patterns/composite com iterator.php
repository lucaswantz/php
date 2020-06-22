<?php

/*
Implementar um padrão iterator no modelo abaixo. Apresentar o dIagrama de classes e
pseudocódigo.

OBSERVAÇÃO: Não sei fazer diagramas de classes, na engenharia de software tem isso,
na engenharia da computação não.

Para implementar o modelo, busquei explicação na Wikipedia, a respeito de 
design patterns do tipo composite e do tipo iterator.
*/

// Component
interface Componente {
  public function imprimir();
}

// Composite
class Composite implements Componente, Countable, Iterator {

  // Array de componentes filhos
  private $componentes;
  private $posicaoatual = 0;

  public function imprimir(){
    echo " COMPOSITE: ";
    foreach($this->componentes as $componente){
      echo " ";
      echo $componente->imprimir();
    }
  }

  // Adiciona componentes na lista
  public function add($componente){
    $this->componentes[] = $componente;
  }

  // Retorna a quantidade de elementos na lista
  public function count(){
    return count($this->componentes);
  }

  // Retorna o elemento atual na lista
  public function current(){
    return $this->componentes[$this->posicaoatual];
  }

  // Retorna a posicao atual
  public function key(){
    return $this->posicaoatual;
  }

  // Vai pro próximo indice
  public function next(){
    $this->posicaoatual++;
  }

  // Reinicia o indice
  public function rewind(){
    $this->posicaoatual = 0;
  }

  // Verifica se tem componente na posicao atual
  public function valid(){
    return isset($this->componentes[$this->posicaoatual]);
  }
}

// Elemento
class NovoComponente implements Componente {
  private $nome;

  public function __construct($nome){
    $this->nome = $nome;
  }

  public function imprimir(){
    echo $this->nome;
  }
}

$composite1 = new Composite();
$teste1 = new NovoComponente("teste1");
$teste2 = new NovoComponente("teste2");

$composite1->add($teste1);
$composite1->add($teste2);

$composite2 = new Composite();
$teste3 = new NovoComponente("teste3");
$teste4 = new NovoComponente("teste4");

$composite2->add($teste3);
$composite2->add($teste4);

$composite1->add($composite2);

echo " COUNT ".$composite1->count()." ";
$composite1->imprimir();

?>
