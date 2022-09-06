$(function(){

    /* * ShowPassword * */
    showPasswordF();
    function showPasswordF(){
        let showPassword = $('.icon-showPassword');
        let password = $('#password');
    
        setInterval(()=>{
            if(password.val() !== ''){
                showPassword.css('display', 'flex');
            }else{
                showPassword.css('display', 'none');
            }
        });
    
        showPassword.click(()=>{
            let passwordType = password.attr('type');
    
            if(passwordType === 'password'){
                password.attr('type', 'text');
                
                showPassword.addClass('activePassword');
            }else{
                password.attr('type', 'password');
                showPassword.removeClass('activePassword');
    
            }
        });
    }

    /* ** */

    /* RememberUser */
    rememberUserF();
    function rememberUserF(){
        // Consts
        let rememberUser = {};
        
        let boxLembrar = $('.wrapper-lembrar-label');
        let inputAcao = $('input[name="acao"]');
        let inputLembrarLogin = $('#lembrar-login');
        let inputName = $('input[name="user"]');
        let inputPassword = $('input[name="password"]');
        
    
        let rememberUserStorege = localStorage.getItem('dashboardSystemStoreLogin');
        let rememberUserJson = JSON.parse(rememberUserStorege);
    
        // console.log(JSON.parse(rememberUserStorege))
    
        if(rememberUserJson !== null){
            if(rememberUserJson.checkedRemember === true){
                inputLembrarLogin.prop('checked', rememberUserJson.checkedRemember);
                inputName.val(rememberUserJson.user);
                inputPassword.val(Descripta(rememberUserJson.password));
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
                    user: inputName.val(),
                    password: Encripta(inputPassword.val()),
                    checkedRemember: true
                };
            }else{
                rememberUser = {
                    user: '',
                    password: '',
                    checkedRemember: false
                };
            }
    
            updateLocalStorage('dashboardSystemStoreLogin', rememberUser);
                
        }
        function removeUser(){
            rememberUser = {
                user: '',
                password: '',
                checkedRemember: false
            };
    
            updateLocalStorage('dashboardSystemStoreLogin', rememberUser);
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
                titleMain.text('Fazer Registro');
            }else{
                boxMain.removeClass(active);
                titleMain.text('Acessar Painel');
            }
        })
        
    }
});