// functions consts
const menuPage = () => { // Função para o evendo de clik dos menus dá página
    $("[data-href_internal]").click(function(){
        // Variaveis Locais
        let thisLink = $(this);
        let active = 'active';
        let thisLinkName = thisLink.data('href_internal');

        // Removendo a classe de todos os links
        $("[data-href_internal]").removeClass(active);

        $('[data-load="load-pages"]').removeClass('active');
        
        currentPage('app/'+thisLinkName, thisLinkName);
    
        thisLink.addClass(active);

        window.history.pushState('', '', include_path+`${thisLinkName == 'home' ? '' : thisLinkName}`); // Atualizando URL

        return false;
    });
}

const menuPagesInside = () => {
    $('[data-href_inside]').click(function(){
        // Variaveis Locais
        let thisLink = $(this);
        let active = 'active';
        let thisLinkName = thisLink.data('href_inside');

        $('[data-href_inside]').removeClass(active);
        $('[data-inside]').removeClass(active);

        
        $(`[data-inside=${thisLinkName}]`).addClass(active);
        thisLink.addClass(active);


        return false;
    });
}