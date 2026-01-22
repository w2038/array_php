<?php

date_default_timezone_set('America/Sao_Paulo');

header('Content-Type: application/json');

require_once 'classes/Cesta.php';
require_once 'classes/Produto.php';

try {
    // Receber dados JSON do frontend
    $input = file_get_contents('php://input');
    $dados = json_decode($input, true);

    if (!$dados || !isset($dados['produtos'])) {
        throw new Exception('Dados inválidos recebidos');
    }

    // Criar cesta
    $cesta = new Cesta();

    // Adicionar produtos à cesta
    foreach ($dados['produtos'] as $item) {
        $produto = new Produto(
            $item['descricao'],
            $item['estoque'],
            $item['preco']
        );
        $cesta->addItem($produto);
    }

    // Gerar relatório
    $resultado = "📋 Itens da Cesta:\n";
    $resultado .= "─────────────────────────────────────────\n\n";

    $totalItens = 0;
    $valorTotal = 0;
    $contador = 1;

    foreach ($cesta->getItens() as $item) {
        $descricao = $item->getDescricao();
        $resultado .= $contador . ". {$descricao}\n";
        $contador++;
        $totalItens++;
    }

    $resultado .= "\n─────────────────────────────────────────\n";
    $resultado .= "Total de itens na cesta: {$totalItens}\n";
    $resultado .= "Data/Hora da cesta: " . $cesta->getTime() . "\n";

    // Responder com sucesso
    echo json_encode([
        'sucesso' => true,
        'resultado' => $resultado,
        'total_itens' => $totalItens,
        'data_criacao' => $cesta->getTime()
    ]);

} catch (Exception $e) {
    echo json_encode([
        'sucesso' => false,
        'erro' => $e->getMessage()
    ]);
}
?>
