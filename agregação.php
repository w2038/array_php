<?php

date_default_timezone_set('America/Sao_Paulo');

require_once 'classes/Cesta.php';
require_once 'classes/Produto.php';

$c1 = new Cesta;

$c1->addItem( $p1 = new Produto('Chocolate', 70, 100));
$c1->addItem( $p1 = new Produto( 'Café', 50, 38));
$c1->addItem( $p1 = new Produto( 'Mostarda', 30, 2));

foreach ( $c1->getItens() as $item){
    echo "Item: " . $item->getDescricao() . "\n";
}

echo "Cesta criada  em: " . $c1->getTime();

