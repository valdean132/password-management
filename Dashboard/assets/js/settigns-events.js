/* Funções constantes */
let contSettings = 1 // Evitando chamada de função para mias de uma vêz
// Função Ajax para enviar os dados do formulároformulário
const settingsAjax = (page, type, typeEnv, infoTag, adicional01, adicional02 = null) => {
    if(typeEnv == 'submit'){
        $.ajax({
            url: `${include_path}assets/ajax/${page}.php`,
            type: type,
            data: infoTag,
            dataType:'json',
            async: true,
            beforeSend: function(){
                boxAvisos('attention', adicional01, '', false);
    
                if(page == 'register-settings'){
                    adicional02.attr('disabled', true);
                    adicional02.find('span').text("Enviando dados...");
                }
            },
            error: function(data){
                boxAvisos('error', 'Ocorreu um Erro inesperado!!! ', 'Clique e contate o suporte', true, suport);

                if(page == 'register-settings'){
                    adicional02.attr('disabled', false);
                    adicional02.find('span').text("Cadastrar");
                }

                console.error(data.responseText);
            },
            success: function(data){
                let result = data;
    
                // Mostrando mensagem de sucesso e voltando ao nomral
                boxAvisos(result.type, result.msg, result.span, true);

                if(page == 'register-settings'){
                    adicional02.attr('disabled', false);
                    adicional02.find('span').text("Cadastrar");
    
                    if(result.type != 'error'){ // limpando inputs e atualizando itens na tela.
                        inputsRemove = adicional02.parents('form').find('.box-form-uniq[remove]');
                        inputClear = adicional02.parents('form').find('.box-form-uniq[fixed]');
        
                        inputsRemove.remove();
                        inputClear.removeClass('success');
                        inputClear.find('input').val('');
    
                        viewsSettings(); // Mostrando Itens
                    }
                }else if(page == 'delete-settings'){
                    if(result.type != 'error'){    
                        viewsSettings(); // Mostrando Itens
                    }
                }

            }
        });
    }else if(typeEnv == 'receive'){
        $.ajax({
            url: `${include_path}assets/ajax/${page}.php`,
            type: type,
            data: infoTag,
            dataType:'json',
            async: true,
            beforeSend: function(){
                // Mostrando Box de Loading
                loadingBox(adicional01.boxLoading, '1', 'block');
            },
            error: function(xhr) {
                boxAvisos('error', 'Ocorreu um Erro inesperado!!! ', 'Clique e contate o suporte', true, suport);
                console.log(xhr.responseText);
            },
            success: function(data){            
                let result = data.result;
                let table = data.table;
                let columns = data.column;
                let boxContain = adicional01.boxViews;

                boxContain.empty();
                
                if(result.length > 0){
                    for(let i = 0; i < result.length; i++){
                        let info = {
                            id: result[i].id,
                            nome: result[i][columns],
                            table: table
                            
                        };

                        settings[columns][i] = info.nome; // Atualizando variavel global constante
                        
                        boxContain.append(viewsElementsSettings(info)); // Jogando Informação na tela
                    }
                }else{
                    settings[columns] = []; // Atualizando variavel global constante

                    boxContain.append(viewsElementsSettings(false)); // Jogando Informação na tela

                }
                
                // Ocultando Box de Loading
                loadingBox(adicional01.boxLoading, 'none');

                if(contSettings == $('[settingsViews]').length){
                    deleteItem(); // Função para deletar item existente
                    $('.container-settings-wrapper').masonry('layout'); // Atualizando Container para ajustar na página
                    contSettings = 1; // Voltando Variavel a valor inicial
                }else{
                    contSettings++;
                }
                
            }
        });
    }
}

/* Executando funções */
$(function(){
    let urlAtual = pegaPagina($(location).attr('href'));

    if(urlAtual == 'settings'){
        addInputSettings(); // Chamando função para adicionar inputs
        tratamentoForm(); // Chamando Função para Tratamento de input
    }

    viewsSettings(); // Mostrando Itens
});

/* Eventos da página */
function addInputSettings(){ // Adicionando mais inputs 
    // Variaveis locais
    let btnAdd = $('[add-input]'); // botão para adcionar input

    // Evento aplicado
    btnAdd.click(function(){
        // Variaveis locais
        let attrBtn = $(this).attr('add-input'); // Pegando container certo
        let inputContainer = $(`form[settings="${attrBtn}"] .form-box-single-inputs`);
        let attrNameInput = inputContainer.find('.box-form-uniq input').attr('name');

        let infoForElement = { // Criando Arrey para criar elementos
            type: 'addInput',
            numberInput: parseInt(attrNameInput.split('-')[1])+1,
            nameInput: attrBtn.split('-')[0]
        };

        
        inputContainer.prepend(addElement(infoForElement)); // adicionando função na página

        $('.container-settings-wrapper').masonry('layout'); // Atualizando Container para ajustar na página
        
        // Chamanado funções pós eventos
        deleteInputSettings(); // Deletando inputs adcionados
    });
}

function deleteInputSettings(){ // Deletando inputs
    // Variaveis locais
    let btnDelete = $('[delete-input]'); // botão para deletar input

    btnDelete.click(function(){
        // Variaveis locais
        boxForDelete = $(this).parent('.box-form-uniq');

        boxForDelete.remove(); // deletando inputs

        $('.container-settings-wrapper').masonry('layout'); // Atualizando Container para ajustar na página
    });
}

function tratamentoForm(){ // Tratando formulário e enviando eles para o banco de dados
    // Variaveis Locais
    let forms = $('form[settings]');

    forms.each(function(){ // Função para pegar diferentes formularios
        // Variaveis Locais
        let inputUpdateBtn = $(this).find('button[type="submit"]');
        
        setInterval(() => { // Verificando inputs a cada 1 segundo ou 1000 milisegundos
            $(this).find('[not-null]').each(function(){
                let boxInputThis = $(this).parents('form .box-form-uniq');
    
                // Verificação de fortaleza de senha e ativando botão para envio a cada saida do input
                $(this).on({
                    blur: function(){
                        // Input dentro dessa função de evento
                        let valueInput = $(this).val();
                        validateInput($(this), boxInputThis, valueInput);
                    }
                });
                // Verificação de fortaleza de senha e ativando botão para envio a cada clique
                $(this).keyup(function(){
                    // Input dentro dessa função de evento
                    let valueInput = $(this).val();
                    validateInput($(this), boxInputThis, valueInput);
                });

            });
        }, 1000);

        inputUpdateBtn.click(function(){
            // Variavel Local
            let formThisSubmit = $(this).parents('form');
            let thisInputs = formThisSubmit.find('[permission_alter="1"]');
            let verificInputNull = [];
            
            for(var i = 0; i < formThisSubmit.find('[not-null]').length; i++){
                verificInputNull[i] = true;
            }

            formThisSubmit.find('[not-null]').each(function(index){ // Verificando se ha inputs vazios
                let boxInputThis = $(this).parents('form .box-form-uniq');

                if($(this).val() == '' || $(this).val() == ' '){
                    avisoInputs(true, boxInputThis, 'error', 'Preencha este campo.');
                    verificInputNull[index] = true;
                }else
                    verificInputNull[index] = false;
            });

            if(verificInputNull.indexOf(true) == -1){ // Verificando se está tudo okay com os inputs para poder enviar.
                settingsAjax('register-settings', 'POST', 'submit', thisInputs, 'Enviando Dados...', $(this));
            }

            return false;
        });
    });
}

function viewsSettings(){ // Mostrando itens cadastrados na tela
    boxViews = $('[settingsViews]');

    boxViews.each(function(index){
        let boxS = {
            boxViews: $(this).find('.box-contain'),
            boxLoading: $(this).find('.box-loading')
        };
        let contidionBox = {
            settings: $(this).attr('settingsViews')
        }

        settingsAjax('views-settings', 'POST', 'receive', contidionBox, boxS);
    });
}

function deleteItem(){ // Deletando item conforme click
    // Variavel Local
    let itemDelete = $('[delete-item]');

    // Evento de click para deletar item especifico.
    itemDelete.click(function(){

        settingsAjax('delete-settings', 'POST', 'submit', $(this).attr('href'), 'Deletando Item...'); // Enviando dados...

        return false;
    });
}