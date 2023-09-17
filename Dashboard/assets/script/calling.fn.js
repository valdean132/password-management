const callFunctions = (pages) => {
    if(pages == 'login-register'){
        loginRegister(); // Funcionalidades da página de login e registro
        typingAnimation();

        return false;
    }
    if(pages == 'main'){
        // Chamando funções dessa página
        loggout(); // Função para sair da página
        menuPage(); // Função para o menu do usuário e principal
        animaDropdown(); // Chamada de Função para mostrar ou ocultar Dropdown
        modalMove(); // Chamando Função para arrastar o modal e setar sua posição na tela.
        calculator(); // Chamamando função para fazer os devidos calculos;

        return false;
    }
    if(pages == 'home'){
        
        animaNumber(); // Chamada de Função para mascarar número e animar ele
        tagsInputs($('select'), false); // Chamando Função para as Tags de inputs options

        return false;
    }
    if(pages == 'settings'){
        
        menuPagesInside(); // Chamando Função para o menu dos containeres
        tagsInputs($('select')); // Chamando Função para as Tags de inputs options
        return false;
    }

    return false;
}