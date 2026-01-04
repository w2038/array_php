<?php

$produto = new StdClass;
$produto->descricao = 'Chocolate Amargo';
$produto->estoque = 100;
$produto->preco = 7;

$vetor1 = (array) $produto;
print $vetor1['descricao'] . "\n";

$vetor2 = ['descricao'=> 'Chocolate branco', 'estoque'=> 50, 'preco'=> 5.5];
$produto2 = (object) $vetor2;

print $produto2->descricao;