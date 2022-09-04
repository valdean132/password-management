/* Chamada de funções */

$(function(){ // Depois de carregamento de página
    toggleMenuUser(); // Chamada de função para mostrar menu de usuário
    menuSectionsShow(); // Chamada de função para mostrar containers conforme navegação de sessão
});


/* Funções */

function toggleMenuUser(){ // Função para mostrar menu de usuário
    // variaveis locais
    let btnUser = $('.box-user-btn');
    let menuUser = $('.menu-user');
    let active = 'active';

    // Click and Hover Event
    btnUser.click(conditionEventMenu);

    // funcção de apoio local
    function conditionEventMenu(){
        if(!menuUser.hasClass(active)){
            menuUser.addClass(active);
            btnUser.addClass(active);
        }else{
            menuUser.removeClass(active);
            btnUser.removeClass(active);
        }
    }
}

function menuSectionsShow(){ // Função para navegação das sessões
    // Variaveis Locais
    let btnLink = $('.nav-sections [realtime]');
    let containersShow = $('.show-containers');
    let active = 'active';

    // Função de Click
    btnLink.click(function(){
        // Mais Variaveis
        let thisContainer = $(`#${$(this).attr('realtime')}`);

        if(!$(this).parent().hasClass(active)){
            btnLink.parent().removeClass(active);
            containersShow.removeClass(active);
            
            $(this).parent().addClass(active)
    
            setTimeout(()=>{
                containersShow.css('display', 'none');
    
                thisContainer.css('display', 'block')
    
                setTimeout(()=>{
                    thisContainer.addClass(active);
                }, 100);
    
            }, 50);
        }

        return false;
    });
}   