<?php

require_once 'classes/Fabricante.php';
require_once 'classes/Produto.php';

$p1 = new Produto('Chocolate', 10, 7);
$f1 = new Fabricante('Chocolate1', 'willy', '122545');
$p1->setFabricante($f1);

print $p1->getDescricao() . "\n";
print $p1->getFabricante()->getNome();