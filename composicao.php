<?php

require_once 'classes/Fabricante.php';
require_once 'classes/Produto.php';


$p1 = new Produto('Chocolate', 100, 7);
$p1->addCaracteristica('chocolate', '100');