/*? Funções constantes ?*/
const animaDropdown = () => { /** Quando o usuário clicar no botão, se o menu suspenso não estiver visível, torne-o visível, caso contrário, esconda isso. */

    // Variaveis locais
    let btnDropdown = $('[data-link]');
    let showDropdown = 'show-dropdown';

    /* Chamando ação após clicar. */
    btnDropdown.click(function(){
        let containerDropdown = $(`[data-dropdown="${$(this).data('link')}"]`);

        if(!containerDropdown.hasClass(showDropdown)){ // Caso classe não existe adicionar
            containerDropdown.addClass(showDropdown);

            $('a[data-link]').removeClass('active'); // Removendo Classe de todos os links que sejam de modal

            if($(this).data('link') == 'add-transaction' || $(this).data('link') == 'calculator'){ // Adicionando classe do link do modal
                $(this).addClass('active');
            }

        }else{ // Caso não exista, remover
            containerDropdown.removeClass(showDropdown);

            if($(this).data('link') == 'add-transaction' || $(this).data('link') == 'calculator'){ // Removendo Classe active do link do modal
                $('a[data-link="'+$(this).data('link')+'"]').removeClass('active');
            }
        }

        return false;
    });
}

/**
    É uma função que percorre todos os elementos com o atributo data-move e, em seguida,
    define a posição do pai do pai do elemento com o atributo data-move para o
    centro da tela e, em seguida, torna o pai do pai do elemento com o
    atributo data-move arrastável.
*/
const modalMove = () => {
    // Variaveis Locais
    let btnArrasta = $('[data-move]');
    
    btnArrasta.each(function(){ // Percorrento Array para pegar o modal certo
        // Variaveis Locais
        let sectionMove = $(this).parent().parent('section.popup-move');

        sectionMove.css({ // Setando posição inicial
            left: $("body").width() / 3,
            top: 0
        });

        // Chamando Evento para arrastar
        sectionMove.draggable({
            containment: 'html',
            cursor: 'grabbing',
            snap: 'html',
            handle: '[data-move]'
        });
        
    });

    $('body').click(function(e){ // Evento ao clicado para tirar ou colocar classe nos links que são de Popup Movel
        let elementPai = e.target.offsetParent; // Pegando elemento pai do item clicado

        if(elementPai != null){ // Verificando se o elemento é diferente de nulo...
            let linkPopup = $(`a[data-link="${elementPai.dataset.dropdown}"]`); // Pegando link do pai do item clicado

            if(elementPai.classList[1] == 'popup-move'){ // Verificando se é um modal movel
                $('a[data-link]').removeClass('active'); // Removento classes de todos os links de popup movel.

                if(!linkPopup.hasClass('active')){ // Verificando se a classe naõ existe para pode adicionar
                    linkPopup.addClass('active');
                }
            }else{ // Caso naõ seja um modal movel, remove todas as classes
                $('a[data-link]').removeClass('active');
            }
        }

    });
}

const animaNumber = () => { /** Ele anima os números no elemento com o atributo data-number e, em seguida, mascara o número com o plugin de Mask. */
    $('[data-number]').each(function () { // Rodando Loop para pegar os números um de cada vez.
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 2000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            },
            complete: function (now){
                $(this).mask("#.##0,00", {reverse: true});
            }
        });
    });
}

/**
 It's a function that loops through all elements with the class "typing" and adds each letter of
    the text one by one.
*/
const typingAnimation = () => { /** É uma função que percorre todos os elementos com a classe "typing" e adiciona cada letra de
o texto um a um. */
    $('.typing').each(function(){ // Percorrendo uma lista com essa mesma classe
        // Variaveis Locais
        let i = 0;
        let tag = $(this);
        let txt = tag.attr("data");
        let speed = 170;
    
        function typeWriter() { // Criando Função para adicionar as letras uma por uma
            if (i <= txt.length) {
                tag.text(txt.slice(0 , i + 1));
                i++;
                setTimeout(typeWriter, speed);
            }
            //console.log(document.getElementById("text").innerHTML);
        }
        
        typeWriter(); // Chamando a função
        
    });

}

// $(function(){
//     /*? Chamada de Funções ?*/
//     animaDropdown(); // Chamada de Função para mostrar ou ocultar Dropdown
//     //modalMove(); // Chamando Função para arrastar o modal e setar sua posição na tela.
//     //animaNumber(); // Chamada de Função para mascarar número e animar ele
//     typingAnimation(); // Chamando função de digiação animada
// });