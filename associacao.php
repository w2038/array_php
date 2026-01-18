<?php

require_once 'classes/Fabricante.php';
require_once 'classes/Produto.php';

$p1 =  new Produto('Chocolate', 100, 70);
$f1 = new Fabricante('Wagner', 'rua x', '124587555');

$p1->setFabricante($f1);

var_dump($p1->getFabricante()->getNome() . "\n") ;
print $p1->getDescricao() . "\n";
print $f1->getNome();
