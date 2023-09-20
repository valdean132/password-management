// functions consts
const logado = (data) => { // Verificando se existe uma Sessão já logada
    $.ajax({
        url: `${include_path_d}php/index.php`,
        type: 'POST',
        data: data,
        dataType:'json',
        async: true,
        error: function(xhr) {
            boxAvisos('error', 'Ocorreu um Erro inesperado!!! ', 'Clique e contate o suporte', true, suport);
            console.error(xhr.responseText);
        },
        success: function(data){        
            if(!data.login){
                $.ajax({
                    url: `${include_path_d}pages/login-register.html`,
                    type: 'GET',
                    dataType: 'text',
                    async: true,
                    success: function(response){
                        CONTAINER_NEXT.html(response);

                        titleMain('Faça Login');

                        $('[data-belongs]').each(function(){
                            if($(this).data('belongs') == 'login-register'){
                                $(this).attr('disabled', false);
                            }else{
                                $(this).attr('disabled', true);
                            }
                        });

                        // Chamando funções dessa página
                        callFunctions('login-register');

                        window.history.pushState('', '', include_path+data.url); // Atualizando URL

                        setTimeout(() => { // Escondendo container de load
                            $(document).ready(function(){
                                $('[data-load="load-main"]').addClass('active');
                            });
                        }, 500);

                        addIncludPath('src');
                        addIncludPath('href');
                    }
                });
            }else{
                if(data.msg != undefined)
                    boxAvisos(data.type, data.msg, data.span, true, data.suport ? suport : '');
                
                let urlAtual = pegaPagina($(location).attr('href'));
                currentPage('main', urlAtual);
            }
        }
    });
}
logado(
    {
        acao: 'verific-login',
        urlAtual: $(location).attr('href')
    }
);

const loggout = () => { // Função para deslogar do sistema ou da subconta
    // Evento de clique nos links de loggout
    $('[data-loggout]').click(function(){
        // Variaveis Locais
        let acao = {};

        acao = {
            loggout: 'loggout',
            urlAtual: $(location).attr('href')
        };

        logado(acao);
        
        $(this).unbind('popstate', popstateEvent);

        return false;
    });
}

const currentPage = (page, url = null) => {
    $.ajax({
        url: `${include_path_d}pages/${page}.html`,
        type: 'GET',
        dataType: 'text',
        async: true,
        success: function(response){
            if(page == 'main'){
                CONTAINER_NEXT.html(response);
                
                $('[data-belongs]').each(function(){
                    if($(this).data('belongs') == page){
                        $(this).attr('disabled', false);
                    }else{
                        $(this).attr('disabled', true);
                    }
                });

                if(url == '') // Chamando paginas conforme url
                    currentPage('app/home', 'home');
                else{
                    pageExists = $.inArray(url, TARGET_PAGES) == -1 ? '404' : url
                    currentPage('app/'+pageExists, pageExists);
                }
                
                // Chamando funções dessa página
                callFunctions(page);
                
                window.history.pushState('', '', include_path+url); // Atualizando URL

                /* //! Verificar esse trecho de código mais tarde e tentar fazer funcionar.  
                urlPopstate = popstateEvent(true);
                if(urlPopstate == 'main'){
                    logado(
                        {
                            acao: 'verific-login',
                            urlAtual: $(location).attr('href')
                        }
                    );
                    $(this).unbind('popstate', popstateEvent);
                }else{
                    currentPage('app/'+urlPopstate, urlPopstate);
                    $(this).unbind('popstate', popstateEvent);
                } 
                */
            }else{
                $("#__main_next").html(response);

                $('[data-href_internal="'+url+'"]').addClass('active');

                // Incluindo estilo conforme a página mostrada.
                let stylePages = $("#styles_pages");
                stylePages.attr('href', `${stylePages.attr('href').split('-')[0]}-${url}.css`);

                // Alterando Tituloda página
                titleMain('PWM', TITLE_PAGES[url]);
                // console.log()

                // Chamando funções dessa página
                callFunctions(url);

                setTimeout(() => { // Escondendo container de load
                    $(document).ready(function(){
                        $('[data-load="load-main"]').addClass('active');
        
                        setTimeout(() => {
                            $('[data-load="load-main"]').remove();
                            $('[data-load="load-pages"]').addClass('active');
                        }, 500);
                    });
                }, 500);
            }


            addIncludPath('src');
            addIncludPath('href');
        }
    });
}

// Funções de apoio
function addIncludPath(atributo){ // Função para atribuir caminho geral aos links
    $('['+atributo+']').each(function(){ // Verificando se caminho já não está atribuido.
        if($(this).attr(atributo).split(include_path).length == 1){
            $(this).attr(atributo, `${include_path}${$(this).attr(atributo)}`);
        }
    });
}