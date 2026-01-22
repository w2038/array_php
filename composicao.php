<?php

require_once 'classes/Produto.php';
require_once 'classes/Caracteristica.php';

$p1 = new Produto('Chocolate', 100, 70);

$p1->addCaracteristica('sabor', 'amargo');
$p1->addCaracteristica('peso', '200g');
$p1->addCaracteristica('marca', 'Nestlé');
$p1->addCaracteristica('validade', '01/2025');

echo $p1->getDescricao() . "\n";
foreach ( $p1->getCaracteristicas() as $c){
    echo "  " . $c->getNome() . ": " . $c->getValor() . "\n";
}