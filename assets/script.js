// Estado da cesta
let cesta = [];

// DOM Elements
const form = document.getElementById('produtoForm');
const descricaoInput = document.getElementById('descricao');
const estoqueInput = document.getElementById('estoque');
const precoInput = document.getElementById('preco');
const cestaContainer = document.getElementById('cestaContainer');
const totalItensEl = document.getElementById('totalItens');
const valorTotalEl = document.getElementById('valorTotal');
const dataHoraEl = document.getElementById('dataHora');
const btnLimpar = document.getElementById('btnLimpar');
const btnExportar = document.getElementById('btnExportar');
const btnFecharResultado = document.getElementById('btnFecharResultado');
const resultadoContainer = document.getElementById('resultadoContainer');
const resultadoBox = document.getElementById('resultado');

// Timestamp da cesta
let cestaTime = null;

// Inicializar
document.addEventListener('DOMContentLoaded', () => {
    cestaTime = new Date().toLocaleString('pt-BR');
    atualizarCesta();
});

// Adicionar produto ao formulário
form.addEventListener('submit', (e) => {
    e.preventDefault();

    const produto = {
        id: Date.now(),
        descricao: descricaoInput.value,
        estoque: parseInt(estoqueInput.value),
        preco: parseFloat(precoInput.value)
    };

    cesta.push(produto);
    form.reset();
    atualizarCesta();

    // Feedback visual
    mostrarNotificacao('Produto adicionado à cesta!');
});

// Atualizar visualização da cesta
function atualizarCesta() {
    // Limpar container
    cestaContainer.innerHTML = '';

    if (cesta.length === 0) {
        cestaContainer.innerHTML = '<p class="empty-message">Nenhum produto adicionado ainda.</p>';
    } else {
        cesta.forEach((produto) => {
            const card = document.createElement('div');
            card.className = 'produto-card';
            card.innerHTML = `
                <h3>${produto.descricao}</h3>
                <div class="produto-info">
                    <span>Estoque:</span>
                    <span>${produto.estoque} unidades</span>
                </div>
                <div class="produto-preco">R$ ${produto.preco.toFixed(2).replace('.', ',')}</div>
                <div class="produto-info">
                    <span>Total:</span>
                    <span>R$ ${(produto.estoque * produto.preco).toFixed(2).replace('.', ',')}</span>
                </div>
                <button class="btn btn-remove" onclick="removerProduto(${produto.id})">
                    ✕ Remover
                </button>
            `;
            cestaContainer.appendChild(card);
        });
    }

    // Atualizar informações
    atualizarInformacoes();
}

// Remover produto
function removerProduto(id) {
    cesta = cesta.filter(p => p.id !== id);
    atualizarCesta();
    mostrarNotificacao('Produto removido!');
}

// Atualizar informações da cesta
function atualizarInformacoes() {
    const totalItens = cesta.length;
    const valorTotal = cesta.reduce((sum, p) => sum + (p.estoque * p.preco), 0);

    totalItensEl.textContent = totalItens;
    valorTotalEl.textContent = `R$ ${valorTotal.toFixed(2).replace('.', ',')}`;
    dataHoraEl.textContent = cestaTime;
}

// Limpar cesta
btnLimpar.addEventListener('click', () => {
    if (cesta.length > 0 && confirm('Deseja limpar toda a cesta?')) {
        cesta = [];
        cestaTime = new Date().toLocaleString('pt-BR');
        atualizarCesta();
        mostrarNotificacao('Cesta limpa!');
    }
});

// Exportar para PHP
btnExportar.addEventListener('click', () => {
    if (cesta.length === 0) {
        alert('Adicione produtos à cesta antes de exportar!');
        return;
    }

    // Enviar dados para processamento
    const dados = {
        produtos: cesta,
        data_hora: cestaTime
    };

    fetch('processar_cesta.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dados)
    })
    .then(response => response.json())
    .then(data => {
        mostrarResultado(data);
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao processar a cesta!');
    });
});

// Mostrar resultado
function mostrarResultado(data) {
    if (data.sucesso) {
        let html = `<strong>✓ Processamento realizado com sucesso!</strong>\n\n`;
        html += `Resumo da Cesta:\n`;
        html += `─────────────────────────────────────────\n`;
        html += data.resultado;
        resultadoBox.textContent = html;
    } else {
        resultadoBox.textContent = `❌ Erro: ${data.erro}`;
    }
    resultadoContainer.classList.remove('hidden');
    resultadoContainer.scrollIntoView({ behavior: 'smooth' });
}

// Fechar resultado
btnFecharResultado.addEventListener('click', () => {
    resultadoContainer.classList.add('hidden');
});

// Notificação visual
function mostrarNotificacao(mensagem) {
    const notif = document.createElement('div');
    notif.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #51cf66;
        color: white;
        padding: 15px 20px;
        border-radius: 5px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        animation: slideIn 0.3s ease;
    `;
    notif.textContent = mensagem;
    document.body.appendChild(notif);

    setTimeout(() => {
        notif.style.animation = 'slideOut 0.3s ease forwards';
        setTimeout(() => notif.remove(), 300);
    }, 3000);
}
