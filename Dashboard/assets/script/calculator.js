const calculator = () => {
    // Variaveis Locais
    let outputScreen = $('#outputscreen'); // Campo Input
    let ultCalc = true; // Verificando se não ouve um calculo
    let btnDisplay = $('[data-calc_display]'); // Botões de display par adicionar ao input
    let btnAction = $('[data-calc_action]'); // Botões de de ação da calculadora


    // Eventos...
    outputScreen.on("keyup", function (event) { // Usando teclado no input - Uma função que está ouvindo o teclado
        if(event.keyCode == 13 || event.key == '='){
            if(event.key == '=')
                outputScreen.val(outputScreen.val().slice(0, -1));

            if(outputScreen.val() !== ''){
                Calculate(true); // Chamando função para fazer os calculos
            }
        }
        if(event.keyCode == 27) // Limpando o campo
            Clear(); // Chamando função para limpar o campo

        if(event.key == ','){ 
            // outputScreen.val(outputScreen.val().slice(0, -1));
            display('.'); // Chamando função para trocar o ',' por '.'
        }
        if(
            event.key == '%' ||
            event.key == '/' ||
            event.key == '*' ||
            event.key == '-' ||
            event.key == '+' ||
            event.key == '.'
        
        ) // Verificando simbolos clicados para adicionar no input
            display(event.key);

        let prassKey = event.key == ',' ? '.' : event.key;
        let keyAction = event.key == '=' ? 'Enter' : event.key;

        $('[data-calc_display="'+prassKey+'"]').css('transform', 'scale(.8)'); // Adicionando efeito de clique
        $('[data-keyprass="'+keyAction+'"]').css('transform', 'scale(.8)'); // Adicionando efeito de clique

        setTimeout(()=>{ // Removendo efeito de clique
            $('[data-calc_display="'+prassKey+'"]').css('transform', '');
            $('[data-keyprass="'+keyAction+'"]').css('transform', '');
        }, 100);
    });

    btnDisplay.each(function(){ // Uma função que está ouvindo os botões e quando você clicar neles, exibirá o valor do botão na tela.
        $(this).click(function(){
            // Variavel Local
            let valueBtn = $(this).data('calc_display');

            $(this).css('transform', 'scale(.8)'); // Adicionando efeito de clique

            display(valueBtn); // Chamando funçãpo para exibir os valores

            setTimeout(()=>{ // Removendo efeito de clique
                $(this).css('transform', '');
            }, 100);
        });
    });

    btnAction.each(function(){ // Verifica qual botão foi clicado apara execultar uma ação
        $(this).click(function(){
            // Variavel Local
            let valueBtn = $(this).data('calc_action');

            $(this).css('transform', 'scale(.8)'); // Adicionando efeito de clique

            if(valueBtn === 'Clear') // Caso seja para limpar a tela
                Clear();
            
            if(valueBtn === 'del') // Caso seja para limpar o último elemento adicionado
                del();
            
            if(valueBtn === 'Calculate'){ // Caso seja para fazer o calculo
                if(outputScreen.val() !== ''){
                    Calculate();
                }
            }

            setTimeout(()=>{ // Removendo efeito de clique
                $(this).css('transform', '');
            }, 100);
        });
    });



    // Funções de chamada e auxilio
    function display(num){ // Mostrando o que está sendo digitado na tela
        if(ultCalc){ // Caso não haja um calculo anterior
            
            if(num == "%"){
                if(outputScreen.val() !== ''){
                    outputScreen.val(verificPorcent(num));
                }
            }else{
                outputScreen.val(outputScreen.val() + num);
            }

            ultCalc = outputScreen.val() === '0' || outputScreen.val() === 0 ? false : true; // Verificando se o primeiro número não é um zero
        }else{ // Caso haja
            outputScreen.val(num);
            
            ultCalc = outputScreen.val() === '0' || outputScreen.val() === 0 ? false : true; // Verificando se o primeiro número não é um zero
        }
    }

    function Calculate(rerifiq = false){ // Fazendo os Calculos
        try{ // Caso esteza tudo okay para calcular
            let result = `${eval(outputScreen.val())}`;
            outputScreen.val(result.split(".").length > 1 ? parseFloat(result).toFixed(2) : result);
            ultCalc = !rerifiq ? false : true;
        }catch(err){ // Caso valores sejam invalidos
            alert("Invalido");
        }
    }

    function Clear(){ // Limpando o campo input
        outputScreen.val('');
    }

    function del(){ // Deletando último elemento que aparece
        outputScreen.val(outputScreen.val().slice(0, -1));
    }

    /**
        Ele pega um número, divide-o em uma matriz e, em seguida, divide o penúltimo número no
     matriz por 100.
     @param num - o número que está sendo clicado
     @returns O resultado da operação
    */
    function verificPorcent(num) { // Função para fazer calculo de porcentagem.

        outputScreen.val(outputScreen.val() + num); // Acrescentando número

        let re = /[/*-+%]/

        let separa = outputScreen.val().split(re);

        let result = parseFloat(separa[separa.length - 2])/100;

        if(separa.length > 1){ // Verificando se há mais de um array para juntar tudo
            return outputScreen.val()
                                .replace(separa[separa.length - 2] + num, result.toFixed(2));
        }else{ // Enviando apenas o resultado final
            return result.toFixed(2);
        }
    }
    
}