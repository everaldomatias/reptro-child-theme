document.addEventListener('DOMContentLoaded', () => {
    var checkTerm = document.getElementById('acceptance-of-terms') // checkbox de aceite dos temos e condições
    var buttonCheckTerm = document.getElementById('button-acceptance-of-terms') // botão "Matricule-se" para abertura do restante do formulário
    var formCheckout = document.getElementById('form-checkout') // campos inicialmente ocultos do form
    var cf7Form = document.querySelector('.wpcf7') // formulário do CF7 para adição do evento que abrirá o PagSeguro
    var submitPagSeguro = document.getElementById('pagseguro-link') // botão para abertura do PagSeguro

    // no carregamento, oculta os campos do formulártio @todo refatorar para isso ficar no CSS
    if (formCheckout) {
        formCheckout.classList.add('d-none')
    }

    // verifica se o checkbox e botão do aceite de termos e condições existem
    if (checkTerm && buttonCheckTerm) {

        // no carregamento, desabilita o botão de abertura dos campos ocultos do form @todo refatorar para isso ficar no CSS
        buttonCheckTerm.classList.add('disabled')

        // observa mudanças no checkbox de aceite de termos e condições para habilitar ou não o botão "Matricule-se"
        checkTerm.addEventListener('change', (el) => {
            buttonCheckTerm.classList.toggle('disabled')
        })

        buttonCheckTerm.addEventListener('click', (el) => {
            el.preventDefault
            formCheckout.classList.toggle('d-none')
        })
    }

    if (cf7Form) {
        cf7Form.addEventListener('wpcf7mailsent', (event) => {
            submitPagSeguro.click()
        })
    }
});