<?php
require_once 'classes/Produto.php';
require_once 'classes/Caracteristica.php';

$p1 = new Produto('Chocolate', 10, 7);

$p1->addCaracteristica('cor', 'Branco');
$p1->addCaracteristica('peso', '2.5 kg');
$p1->addCaracteristica('potencia', '20 watts');

print 'Produto ' . $p1->getDescricao() . "\n";

foreach($p1->getCaracteristica() as $c){
    print 'Caracteristica - ' . $c->getNome() . ': ' . $c->getValor() . "\n";
}