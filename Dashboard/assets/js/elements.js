/* Funções constantes */
const addElement = info => {
    let copyElement = '';

    if(info.type == 'addInput'){
        copyElement += `
            <div remove class="box-form-uniq position-relative display-flex flex-column fw-100 marg-b-30">
                <input 
                    type="text" 
                    id="${info.nameInput}-${info.numberInput < 10 ? '0'+info.numberInput : info.numberInput}" 
                    placeholder="Cadastre nova Marca..." 
                    class="bg-02 border-01 transition w100 padd-15"
                    name="${info.nameInput}-${info.numberInput < 10 ? '0'+info.numberInput : info.numberInput}-no"
                    not-null
                    autocomplete="off"
                    required
                    permission_alter="1"
                >
                <div delete-input title="Deletar Campo" class="delete-input cursor-pointer position-absolute transition">
                    <i class="bi bi-bookmark-x"></i>
                </div>
                <div class="icon-input-atention display-none w100 h100 position-absolute padd-15">
                    <i class="bi position-absolute"></i>
                    <div class="aviso-input user-select-none"></div>
                </div>
            </div>
        `;
    }

    return copyElement;
}

const viewsElementsSettings = info => {
    let copyElement = '';
    
    if(!info){
        copyElement = `
            <div class="no-item-wrapper-settings padd-2p border-01 w100 cursor-pointer border-r-10 transition">
                <div class="nome-item display-flex align-items-center padd-2p">
                    <i class="bi bi-exclamation-triangle"></i>
                    <span>Nenhum item encontrado</span>
                </div>
            </div>
        `;
    }else{
        copyElement = `
            <div class="item-wrapper-settings border-01 padd-2p display-flex align-items-center space-between w100 cursor-pointer border-r-10 transition">
                <div class="nome-item display-flex padd-2p">
                    <i class="bi bi-arrow-return-right"></i>
                    <span>${info.nome}</span>
                </div>
                <a href="table=${info.table}&column=id&value=${info.id}" delete-item="${info.id}" class="btn-delete display-center transition" title="Remover">
                    <i class="bi bi-bookmark-x"></i>
                </a>
            </div>
        `;
    }
    
    return copyElement;
}