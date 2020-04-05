<?php

/*
Implementar um padrão iterator no modelo abaixo. Apresentar o dIagrama de classes e
pseudocódigo.
*/

// Component
interface Componente {
  public function imprimir();
}

// Composite
class Composite implements Componente {

  // Array de componentes filhos
  private $componentes;

  public function imprimir(){
    echo " COMPOSITE: ";
    foreach($this->componentes as $componente){
      echo " ";
      echo $componente->imprimir();
    }
  }

  public function add($componente){
    $this->componentes[] = $componente;
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

$composite1->imprimir();

?>
