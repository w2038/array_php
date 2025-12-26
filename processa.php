<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];


$contato = [
    "nome" => $nome,
    "email" => $email,
    "telefone" => $email
];

echo "<h2>Contato</h2>";


echo "Nome: " . $contato["nome"] . "<br>";