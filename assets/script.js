// Validação de formulário em tempo real
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    if (form) {
        const inputs = form.querySelectorAll('input');
        
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validarCampo(this);
            });
        });
    }
});

function validarCampo(campo) {
    const valor = campo.value.trim();
    const tipo = campo.type;
    const nome = campo.name;

    if (tipo === 'text' && nome === 'usuario') {
        if (valor.length < 3) {
            campo.style.borderColor = '#e74c3c';
        } else {
            campo.style.borderColor = '#27ae60';
        }
    }

    if (tipo === 'password') {
        if (valor.length < 6) {
            campo.style.borderColor = '#e74c3c';
        } else {
            campo.style.borderColor = '#27ae60';
        }
    }
}

// Função para limpar estilos ao focar no campo
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.borderColor = '#ddd';
        });
    });
});
