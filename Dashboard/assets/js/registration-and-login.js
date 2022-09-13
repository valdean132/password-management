$(function(){

    const iconLoad = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:transparent;display:block;" width="40px" height="40px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><path d="M14.1,7.5l8.1,0v14.7c0,0.6,0,1.2,0.1,1.7c-0.1-0.6-0.1-1.2-0.1-1.7V7.5c0,0,63.6,0,63.6,0h-8.1 c0,0,0,14.7,0,14.7c0,7-4.6,13.3-11.7,17.1c-4.2,2.3-6.8,5.9-6.8,9.8v1.9c0,3.9,2.5,7.6,6.8,9.8c7.1,3.8,11.7,10,11.7,17.1 c0,0,0,14.7,0,14.7h8.1h-8.1H50h18V82.3c0-3.8-2.6-7.4-7-9.8c-0.1,0-0.1-0.1-0.2-0.1c-6.6-3.6-14.9-3.6-21.5,0 c-0.1,0-0.1,0.1-0.2,0.1c-4.5,2.4-7,6-7,9.8l0,10.2h18c0,0-18,0-18,0H14.1l8.1,0V77.8c0-7,4.6-13.3,11.7-17.1 c4.2-2.3,6.8-5.9,6.8-9.8v-1.9c0-3.9-2.5-7.6-6.8-9.8c-6.5-3.5-10.9-9-11.6-15.3l9.9,0c0.7,3.1,3,5.9,6.8,8c5.7,3,9.5,7.7,10.9,12.9 c1.4-5.2,5.3-9.9,10.9-12.9c3.8-2,6.2-4.8,6.8-8H32.2" fill="none" stroke="#fff" stroke-width="3px" stroke-linecap="round" stroke-linejoin="round"><animate attributeName="stroke-dasharray" keyTimes="0;1" values="480 100;480 110" dur="3.2258064516129035s" repeatCount="indefinite" stroke="#fff" fill="none" stroke-width="3px"></animate><animate attributeName="stroke-dashoffset" keyTimes="0;1" values="0;-1180" dur="3.2258064516129035s" repeatCount="indefinite" stroke="#fff" fill="none" stroke-width="3px"></animate></path></svg>`;
    const verificInputNull = [];
    /* Conexão Ajax */
    let ajaxConection = (page, type, infoTag, msg, inputAcao = null) => {
        $.ajax({
            url: `${include_path}assets/ajax/${page}.php`,
            type: type,
            data: infoTag.inputs,
            dataType:'json',
            async: true,
            beforeSend: function(){
                boxAvisos('attention', msg, '', false);

                infoTag.inputs.each(function(){
                    $(this).attr('disabled', true);
                    $(this).parents('form .form-group').addClass('disabled');
                });

                inputAcao.attr('disabled', true);
                inputAcao.find('span').html(iconLoad);
            },
            error: function(data){
                boxAvisos('error', 'Ocorreu um Erro inesperado!!! ', 'Clique e contate o suporte', true, suport);
                console.error(data.responseText);
            },
            success: function(data){
                if(page == 'login-user'){
                    boxAvisos(data.type, data.msg, data.span, true, data.suport ? suport : '');

                    if(data.type == 'error'){ // Tratando mensagens de erros
                        if(data.inputError != undefined){ // Verificando se existe esse campo no retorno
                            let campoError = data.inputError;
    
                            infoTag.inputs.each(function(){
                                if($(this).attr('name') == campoError.name){
                                    avisoInputs(true, $(this).parents('form .form-group'), 'error', campoError.msgInput);
                                }

                                $(this).attr('disabled', false);
                                $(this).parents('form .form-group').removeClass('disabled');
                            });
                        }else{
                            infoTag.inputs.each(function(){
                                $(this).attr('disabled', false);
                                $(this).parents('form .form-group').removeClass('disabled');
                            });

                        }
                    }else if(data.type == 'success'){
                        location.reload();
                    }
                    infoTag.inputs.each(function(){
                        $(this).attr('disabled', false);
                        $(this).parents('form .form-group').removeClass('disabled');
                    });

                    inputAcao.attr('disabled', true);
                    inputAcao.find('span').html('Entrar');

                }
                if(page == 'create-user'){
                    boxAvisos(data.type, data.msg, data.span, true, data.suport ? suport : '');

                    if(data.type == 'error'){ // Tratando mensagens de erros
                        if(data.inputError != undefined){ // Verificando se existe esse campo no retorno
                            let campoError = data.inputError;
    
                            infoTag.inputs.each(function(){
                                if($(this).attr('name') == campoError.name){
                                    avisoInputs(true, $(this).parents('form .form-group'), 'error', campoError.msgInput);
                                }

                                $(this).attr('disabled', false);
                                $(this).parents('form .form-group').removeClass('disabled');
                            });
                        }
                    }else if(data.type == 'success'){
                        infoTag.inputs.each(function(index){
                            $(this).val('');
                            $(this).parents('form .form-group').removeClass('success');

                            $(this).attr('disabled', false);
                            $(this).parents('form .form-group').removeClass('disabled');
                            if($(this).attr('not-null') == '')
                                verificInputNull[index] = true;

                        });
                    }
                    inputAcao.attr('disabled', true);
                    inputAcao.find('span').html('Registrar');
                }
            }
        });
    }

    /* * ShowPassword * */
    showPasswordF();
    function showPasswordF(){
        // let showPassword = $('.icon-showPassword');
        let password = $('[type="password"]');
        
        password.each(function(){
            let boxInputThis = $(this).parents('form .form-group');
            showPassword($(this), boxInputThis);
        });
    }

    /* ** */

    /* RememberUser */
    rememberUserF();
    function rememberUserF(){
        // Consts
        let rememberUser = {};
        
        let boxLembrar = $('form[data-acao="login"] .wrapper-lembrar-label');
        let inputAcao = $('form[data-acao="login"] button[name="acao"]');
        let inputLembrarLogin = $('form[data-acao="login"] #lembrar-login');
        let inputName = $('form[data-acao="login"] input[name="email"]');
        let inputPassword = $('form[data-acao="login"] input[name="password"]');
        
    
        let rememberUserStorege = localStorage.getItem('PwMLogin');
        let rememberUserJson = JSON.parse(rememberUserStorege);
    
        // console.log(JSON.parse(rememberUserStorege))
    
        if(rememberUserJson !== null){
            if(rememberUserJson.checkedRemember === true){
                inputLembrarLogin.prop('checked', rememberUserJson.checkedRemember);
                inputName.val(rememberUserJson.email);
                inputPassword.val(Descripta(rememberUserJson.password));

                inputName.parents('form .form-group').addClass('success');
                inputPassword.parents('form .form-group').addClass('success');
            }
        }
    
        // Events
        boxLembrar.click(()=>{
            if(!inputLembrarLogin.prop('checked')){
                waitUser();
            }else{
                removeUser();
            }
        });
        inputAcao.click(()=>{
            if(!inputLembrarLogin.prop('checked')){
                removeUser();
            }else{
                waitUser();
            }
        });
    
    
        // Functions
        function waitUser(){
            if(inputName.val() !== '' || inputPassword.val() !== ''){
                rememberUser = {
                    email: inputName.val(),
                    password: Encripta(inputPassword.val()),
                    checkedRemember: true
                };
            }else{
                rememberUser = {
                    email: '',
                    password: '',
                    checkedRemember: false
                };
            }
    
            updateLocalStorage('PwMLogin', rememberUser);
                
        }
        function removeUser(){
            rememberUser = {
                email: '',
                password: '',
                checkedRemember: false
            };
    
            updateLocalStorage('PwMLogin', rememberUser);
        }
    
        /* ** */
    }

    /* Rotação de Telas */
    rotateRegisterLogin();
    function rotateRegisterLogin(){
        let checkedBtn = $("#reg-log");
        let checkedBtnLabel = $('[for="reg-log"]');
        let boxMain = $(".card-3d-wrap .card-3d-wrapper");
        let titleMain = $('#title-page');
        let active = 'active';

        checkedBtnLabel.click(()=>{
            if(!checkedBtn.prop('checked')){
                boxMain.addClass(active)
                titleMain.text('Cadastre-se Agora');
            }else{
                boxMain.removeClass(active);
                titleMain.text('Faça Login');
            }
        })
        
    }

    /* Mostrando e ocultando mensagens de erros */
    viewsMSGInput();
    function viewsMSGInput(){
        let boxMainInput = $('.form-group');

        boxMainInput.click(function(e){
            let campoAviso = $(this).find('.icon-input-atention .aviso-input');
            let iconAviso = $(this).find('.icon-input-atention .icones-aviso');
            if(e.target.className == 'icon-input-atention' || e.target.className == 'icones-aviso material-icons'){
                campoAviso.addClass('views');
                iconAviso.addClass('views');
            }else{
                campoAviso.removeClass('views');
                iconAviso.removeClass('views');
            }
        });
    }

    /* Login para entrar na rede */
    validLogin();
    function validLogin(){
        // Variaveis Locais
        let boxInputs = $('form[data-acao="login"] .form-group');
        let btnSubmitEnv = $('form[data-acao="login"] button[type="submit"]');
        let inputs = $('form[data-acao="login"] [permission_alter="1"]');

        let verificINull = [];

        for(var i = 0; i < $('form[data-acao="login"] [not-null]').length; i++){
            verificINull[i] = true;
        }

        let verificInputTrue = () => { // Função para abilitar ou desabilitar botão de envio
            if(verificINull.indexOf(true) == -1){  
                btnSubmitEnv.attr('disabled', false);
            }else{
                btnSubmitEnv.attr('disabled', true);
            }
        }


        $('form[data-acao="login"] [not-null]').each(function(index){
            let boxInputThis = $(this).parents('form .form-group');

            // Evento para adcionar ou tirar aviso aviso quando estiver vazio...
            if($(this).val() != ''){
                verificINull[index] = false;

                verificInputTrue();
            }

            $(this).on({
                blur: function(){
                    // Input dentro dessa função de evento
                    let valueInput = $(this).val();
    
                    verificINull[index] = validateInput($(this), boxInputThis, valueInput);

                    verificInputTrue();
                }
            });
    
            $(this).keyup(function(){
                // Input dentro dessa função de evento
                let valueInput = $(this).val();
    
                verificINull[index] = validateInput($(this), boxInputThis, valueInput);

                verificInputTrue();
            });
        });

        
        btnSubmitEnv.click(function(){ // botão para enviar o formulário

            inputs.each(function(){
                if($(this).attr('name') == 'lembrarConexao'){
                    let lembrarConexao = $('form[data-acao="login"] [name="lembrarConexaoCheckbox"]').prop('checked');
                    !lembrarConexao ? $(this).val(null) : $(this).val('on');
                }
            });

            let infoTag = {
                boxInputs: boxInputs,
                inputs: $('form[data-acao="login"] [permission_alter="1"]')
            }

            ajaxConection('login-user', 'POST', infoTag, 'Enviando Dados... Aguarde!!!', $(this));

            return false;
        });
    }

    /* Validação de Campos de registro e enviando fazendo cadastro */
    validFormRegister();
    function validFormRegister(){
        // Variaveis Locais
        let boxInputs = $('form[data-acao="register"] .form-group');
        let btnSubmitEnv = $('form[data-acao="register"] button[type="submit"]');
        let inputs = $('form[data-acao="register"] [permission_alter="1"]');

        for(var i = 0; i < $('form[data-acao="register"] [not-null]').length; i++){
            verificInputNull[i] = true;
        }

        let verificInputTrue = () => { // Função para abilitar ou desabilitar botão de envio
            if(verificInputNull.indexOf(true) == -1){  
                btnSubmitEnv.attr('disabled', false);
            }else{
                btnSubmitEnv.attr('disabled', true);
            }
        }

        $('form[data-acao="register"] [not-null]').each(function(index){
            let boxInputThis = $(this).parents('form .form-group');

            // Evento para adcionar ou tirar aviso aviso quando estiver vazio...
            $(this).on({
                blur: function(){
                    // Input dentro dessa função de evento
                    let valueInput = $(this).val();
    
                    verificInputNull[index] = validateInput($(this), boxInputThis, valueInput);

                    verificInputTrue();
                }
            });
    
            $(this).keyup(function(){
                // Input dentro dessa função de evento
                let valueInput = $(this).val();
    
                verificInputNull[index] = validateInput($(this), boxInputThis, valueInput);

                verificInputTrue();
            });
        });

        btnSubmitEnv.click(function(){ // botão para enviar o formulário

            let infoTag = {
                boxInputs: boxInputs,
                inputs: inputs
            }

            ajaxConection('create-user', 'POST', infoTag, 'Enviando Dados... Aguarde!!!', $(this));

            return false;
        });
    }
});