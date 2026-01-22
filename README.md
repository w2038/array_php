# 🛒 Gerenciador de Cesta de Compras - Frontend para agregação.php

Um projeto completo de frontend interativo que demonstra o uso de **agregação de objetos** em PHP, integrando HTML, CSS e JavaScript com o backend PHP.

## 📁 Estrutura do Projeto

```
array_php/
├── index.html                 # Página principal do frontend
├── processar_cesta.php        # API PHP para processar dados
├── agregação.php              # Arquivo original com exemplo de agregação
├── classes/
│   ├── Cesta.php              # Classe que agrega Produtos
│   ├── Produto.php            # Classe de Produto
│   ├── Fabricante.php
│   └── Caracteristica.php
└── assets/
    ├── style.css              # Estilos CSS
    └── script.js              # Lógica JavaScript
```

## 🎯 Conceito de Agregação Implementado

O projeto demonstra **agregação de objetos**, onde:
- A classe `Cesta` **agrega** múltiplos objetos `Produto`
- Um objeto `Cesta` contém uma coleção de `Produto`
- Relacionamento: **Cesta TEM Produtos** (composição)

```php
// Exemplo de agregação
$cesta = new Cesta();           // Cesta criada
$produto = new Produto(...);    // Produto criado
$cesta->addItem($produto);      // Produto adicionado à Cesta
```

## 🚀 Como Usar

### 1. **Instalação**
- Certifique-se que o XAMPP está rodando
- Coloque os arquivos em `c:\xampp\htdocs\projeto\array_php\`

### 2. **Acessar a Aplicação**
- Abra no navegador: `http://localhost/projeto/array_php/`

### 3. **Funcionalidades**

#### ✅ Adicionar Produtos
1. Preencha o formulário com:
   - **Descrição**: Nome do produto (ex: Chocolate)
   - **Estoque**: Quantidade disponível
   - **Preço**: Valor unitário

2. Clique em "Adicionar à Cesta"

#### 📊 Visualizar Itens
- Veja todos os produtos em cards interativos
- Informações de estoque e preço individual
- Cálculo automático de totais

#### 🗑️ Gerenciar Cesta
- **Remover**: Clique no botão "✕ Remover" de cada produto
- **Limpar**: Remove todos os produtos de uma vez

#### 📤 Exportar para PHP
1. Clique em "Exportar para PHP"
2. O frontend envia os dados para `processar_cesta.php`
3. O PHP processa usando as classes de agregação
4. Resultado é exibido com relatório completo

## 💡 Exemplos de Uso

### Exemplo 1: Cesta de Supermercado
```
Produto: Chocolate
Estoque: 100
Preço: R$ 5,70

Produto: Café
Estoque: 38
Preço: R$ 12,50

Produto: Mostarda
Estoque: 2
Preço: R$ 6,30
```

### Resultado PHP
```
📋 Itens da Cesta:
─────────────────────────────────────────

1. Chocolate
2. Café
3. Mostarda

─────────────────────────────────────────
Total de itens na cesta: 3
Data/Hora da cesta: 21/01/2026 14:35:20
```

## 🛠️ Tecnologias Utilizadas

- **Frontend**:
  - HTML5 (estrutura semântica)
  - CSS3 (grid, flexbox, gradientes)
  - JavaScript ES6 (fetch API, manipulação DOM)

- **Backend**:
  - PHP 7+ (POO)
  - Classes com agregação
  - JSON para comunicação

## 🎨 Recursos Visuais

- ✨ Design moderno com gradientes
- 📱 Responsivo (funciona em mobile)
- 🔄 Atualizações em tempo real
- 📊 Cards informativos
- 🎯 Notificações visuais

## 🔄 Fluxo da Aplicação

```
Frontend (JavaScript)
    ↓
Usuário preenche formulário
    ↓
Dados armazenados em array JavaScript
    ↓
Visualização em tempo real
    ↓
Clique em "Exportar para PHP"
    ↓
Envio JSON para processar_cesta.php (POST)
    ↓
Backend PHP
    ↓
Cria objetos Cesta e Produto
    ↓
Agrupa Produtos na Cesta
    ↓
Gera relatório
    ↓
Retorna JSON com resultado
    ↓
JavaScript recebe resposta
    ↓
Exibe resultado formatado
```

## 📚 Conceitos de OOP Demonstrados

### Agregação
```php
class Cesta {
    private $itens;  // Agrega Produtos
    
    public function addItem(Produto $p) {
        $this->itens[] = $p;  // Produto adicionado à coleção
    }
}
```

### Encapsulamento
- Propriedades privadas
- Métodos getters/setters

### Polimorfismo
- Múltiplos objetos `Produto` em uma `Cesta`

## 🐛 Troubleshooting

### Problema: "Erro ao processar a cesta"
**Solução**: Verifique se:
- XAMPP está rodando
- Os arquivos PHP estão no diretório correto
- O `processar_cesta.php` está acessível

### Problema: Estilos não carregam
**Solução**: Limpe o cache do navegador (Ctrl+Shift+Del)

### Problema: Produtos não aparecem
**Solução**: Abra o console do navegador (F12) e verifique se há erros JavaScript

## 📝 Melhorias Futuras

- [ ] Persistência em banco de dados
- [ ] Autenticação de usuário
- [ ] Carrinho de compras completo
- [ ] Integração de pagamento
- [ ] Histórico de cestas
- [ ] Exportar para CSV/PDF

## 👨‍💻 Autoria

Projeto desenvolvido como exemplo educacional de **Agregação em PHP com Frontend**.

---

**Data**: 21 de janeiro de 2026  
**Versão**: 1.0  
**Status**: ✅ Funcional
