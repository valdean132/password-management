<section class="settings w100 h100">
    <div class="main-section display-flex overflow-hidden w100 h100 bg-02 shadow-02 border-01 border-r-20">
        <div class="menu-section w30 h100">
            <nav class="nav-sections overflow-y-auto w100 h100">
                <div class="title-menu-section padd-2p marg-30 display-center w100">
                    <h4>Navegue</h3>
                </div><!-- Titulo do menu -->
                <ul class="w100 position-relative">
                    <li class="active">
                        <a href="" realtime="conf-produtos" class="link-menu display-flex align-items-center position-relative padd-30 transition w100 h100">
                            <i class="bi bi-basket3-fill transition"></i>
                            <span class="padd-4p pointer-events-none text-capitalize">Conf. Produtos</span>
                        </a>
                    </li>
                </ul><!-- Links de Navegação Principal -->
            </nav><!-- Área de navegação -->
        </div><!-- Navegação da section -->
        <div class="container-main-section w70 h100 bg-03">
            <div id="conf-produtos" class="confi-progutos active show-containers w100 h100 display-block transition">
                <div class="section-main-wrapper overflow-y-auto w100 h100 padd-4p">
                    <div class="container-settings-wrapper w100" data-masonry='{ "itemSelector": ".settings-wrapper", "columnWidth": 120,"percentPosition": true,"gutter": 20,"horizontalOrder": false,"transitionDuration": "0.3s" }'>

                        <div class="settings-wrapper padd-1p bg-02 shadow-01 border-01 border-r-20">
                            <div class="title-box padd-10">
                                <h3>Marcas cadastradas</h3>
                            </div><!-- Titulo da box -->
                            <div settingsViews="tb_sys_settigns.produto_brand" class="container-settings-registered w100 position-relative">
                                <div class="box-loading position-absolute display-center w100 h100 transition">
                                    <div class="flippers position-relative">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="box-contain">                                  
                                </div><!-- Contendo Itens -->
                            </div><!-- Cadastrados -->
                            <div class="form-settings w100 marg-b-10 marg-t-10">
                                <form settings="brand-register" action="" class="w100 display-flex flex-column position-relative" method="post">
                                    <div class="form-box-single-inputs">
                                        <div fixed class="box-form-uniq position-relative display-flex flex-column fw-100 marg-b-30">
                                            <input 
                                                type="text" 
                                                id="brand-01" 
                                                placeholder="Cadastre nova Marca..." 
                                                class="bg-02 border-01 transition w100 padd-15"
                                                name="brand-01-no"
                                                not-null
                                                maxlength="30"
                                                autocomplete="off"
                                                required
                                                permission_alter="1"
                                            ><!-- Input -->
                                            <div class="icon-input-atention display-none w100 h100 position-absolute padd-15">
                                                <i class="bi position-absolute"></i>
                                                <div class="aviso-input user-select-none">Esse campo não pode está vazio</div>
                                            </div><!-- Div de aviso -->
                                        </div><!-- Campo de input -->
                                    </div><!-- Box de inputs -->

                                    <div title="Adicionar Campos" add-input="brand-register" class="add-input-settings display-center position-absolute cursor-pointer transition">
                                        <i class="bi bi-bookmark-plus"></i>
                                    </div><!-- Botão para adicionar mais inputs -->

                                    <div class="box-form-uniq display-none" >
                                        <input type="hidden" permission_alter="1" name="nome_tabela-not" value="tb_sys_settigns.produto_brand">
                                    </div><!-- Campo Dos Inputs -->

                                    <div class="btn-submit w100 display-flex justify-end">
                                        <button type="submit" permission_alter="1" class="btn-01 w100 cursor-pointer text-capitalize transition" name="acao-not">
                                            <i class="bi bi-send-fill"></i> <span>Cadastrar</span>
                                        </button>
                                    </div><!-- Botão de envio -->
                                </form><!-- Formulario -->
                            </div><!-- Formulário para mais cadastros -->
                        </div><!-- Box de configurações definidas -->
                        
                        <div class="settings-wrapper padd-1p bg-02 shadow-01 border-01 border-r-20">
                            <div class="title-box padd-10">
                                <h3>Categoria cadastradas</h3>
                            </div><!-- Titulo da box -->
                            <div settingsViews="tb_sys_settigns.produto_category" class="container-settings-registered w100 position-relative">
                                <div class="box-loading position-absolute display-center w100 h100 transition">
                                    <div class="flippers position-relative">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="box-contain">                                  
                                </div><!-- Contendo Itens -->
                            </div><!-- Cadastrados -->
                            <div class="form-settings w100 marg-b-10 marg-t-10">
                                <form settings="category-register" action="" class="w100 display-flex flex-column position-relative" method="post">
                                    <div class="form-box-single-inputs">
                                        <div fixed class="box-form-uniq position-relative display-flex flex-column fw-100 marg-b-30">
                                            <input 
                                                type="text" 
                                                id="category-01" 
                                                placeholder="Cadastre nova Categoria..." 
                                                class="bg-02 border-01 transition w100 padd-15"
                                                name="category-01-no"
                                                not-null
                                                maxlength="30"
                                                autocomplete="off"
                                                required
                                                permission_alter="1"
                                            ><!-- Input -->
                                            <div class="icon-input-atention display-none w100 h100 position-absolute padd-15">
                                                <i class="bi position-absolute"></i>
                                                <div class="aviso-input user-select-none">Esse campo não pode está vazio</div>
                                            </div><!-- Div de aviso -->
                                        </div><!-- Campo de input -->
                                    </div><!-- Box de inputs -->

                                    <div title="Adicionar Campos" add-input="category-register" class="add-input-settings display-center position-absolute cursor-pointer transition">
                                        <i class="bi bi-bookmark-plus"></i>
                                    </div><!-- Botão para adicionar mais inputs -->

                                    <div class="box-form-uniq display-none" >
                                        <input type="hidden" permission_alter="1" name="nome_tabela-not" value="tb_sys_settigns.produto_category">
                                    </div><!-- Campo Dos Inputs -->

                                    <div class="btn-submit w100 display-flex justify-end">
                                        <button type="submit" permission_alter="1" class="btn-01 w100 cursor-pointer text-capitalize transition" name="acao-not">
                                            <i class="bi bi-send-fill"></i> <span>Cadastrar</span>
                                        </button>
                                    </div><!-- Botão de envio -->
                                </form><!-- Formulario -->
                            </div><!-- Formulário para mais cadastros -->
                        </div><!-- Box de configurações definidas -->

                        <div class="settings-wrapper padd-1p bg-02 shadow-01 border-01 border-r-20">
                            <div class="title-box padd-10">
                                <h3>Cores cadastradas</h3>
                            </div><!-- Titulo da box -->
                            <div settingsViews="tb_sys_settigns.produto_color" class="container-settings-registered w100 position-relative">
                                <div class="box-loading position-absolute display-center w100 h100 transition">
                                    <div class="flippers position-relative">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="box-contain">                                  
                                </div><!-- Contendo Itens -->
                            </div><!-- Cadastrados -->
                            <div class="form-settings w100 marg-b-10 marg-t-10">
                                <form settings="color-register" action="" class="w100 display-flex flex-column position-relative" method="post">
                                    <div class="form-box-single-inputs">
                                        <div fixed class="box-form-uniq position-relative display-flex flex-column fw-100 marg-b-30">
                                            <input 
                                                type="text" 
                                                id="color-01" 
                                                placeholder="Cadastre nova Cor..." 
                                                class="bg-02 border-01 transition w100 padd-15"
                                                name="color-01-no"
                                                not-null
                                                maxlength="30"
                                                autocomplete="off"
                                                required
                                                permission_alter="1"
                                            ><!-- Input -->
                                            <div class="icon-input-atention display-none w100 h100 position-absolute padd-15">
                                                <i class="bi position-absolute"></i>
                                                <div class="aviso-input user-select-none">Esse campo não pode está vazio</div>
                                            </div><!-- Div de aviso -->
                                        </div><!-- Campo de input -->
                                    </div><!-- Box de inputs -->

                                    <div title="Adicionar Campos" add-input="color-register" class="add-input-settings display-center position-absolute cursor-pointer transition">
                                        <i class="bi bi-bookmark-plus"></i>
                                    </div><!-- Botão para adicionar mais inputs -->

                                    <div class="box-form-uniq display-none" >
                                        <input type="hidden" permission_alter="1" name="nome_tabela-not" value="tb_sys_settigns.produto_color">
                                    </div><!-- Campo Dos Inputs -->

                                    <div class="btn-submit w100 display-flex justify-end">
                                        <button type="submit" permission_alter="1" class="btn-01 w100 cursor-pointer text-capitalize transition" name="acao-not">
                                            <i class="bi bi-send-fill"></i> <span>Cadastrar</span>
                                        </button>
                                    </div><!-- Botão de envio -->
                                </form><!-- Formulario -->
                            </div><!-- Formulário para mais cadastros -->
                        </div><!-- Box de configurações definidas -->

                        <div class="settings-wrapper padd-1p bg-02 shadow-01 border-01 border-r-20">
                            <div class="title-box padd-10">
                                <h3>Ocasiões cadastradas</h3>
                            </div><!-- Titulo da box -->
                            <div settingsViews="tb_sys_settigns.produto_occasion" class="container-settings-registered w100 position-relative">
                                <div class="box-loading position-absolute display-center w100 h100 transition">
                                    <div class="flippers position-relative">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="box-contain">                                  
                                </div><!-- Contendo Itens -->
                            </div><!-- Cadastrados -->
                            <div class="form-settings w100 marg-b-10 marg-t-10">
                                <form settings="occasion-register" action="" class="w100 display-flex flex-column position-relative" method="post">
                                    <div class="form-box-single-inputs">
                                        <div fixed class="box-form-uniq position-relative display-flex flex-column fw-100 marg-b-30">
                                            <input 
                                                type="text" 
                                                id="occasion-01" 
                                                placeholder="Cadastre nova Ocasião..." 
                                                class="bg-02 border-01 transition w100 padd-15"
                                                name="occasion-01-no"
                                                not-null
                                                maxlength="30"
                                                autocomplete="off"
                                                required
                                                permission_alter="1"
                                            ><!-- Input -->
                                            <div class="icon-input-atention display-none w100 h100 position-absolute padd-15">
                                                <i class="bi position-absolute"></i>
                                                <div class="aviso-input user-select-none">Esse campo não pode está vazio</div>
                                            </div><!-- Div de aviso -->
                                        </div><!-- Campo de input -->
                                    </div><!-- Box de inputs -->

                                    <div title="Adicionar Campos" add-input="occasion-register" class="add-input-settings display-center position-absolute cursor-pointer transition">
                                        <i class="bi bi-bookmark-plus"></i>
                                    </div><!-- Botão para adicionar mais inputs -->

                                    <div class="box-form-uniq display-none" >
                                        <input type="hidden" permission_alter="1" name="nome_tabela-not" value="tb_sys_settigns.produto_occasion">
                                    </div><!-- Campo Dos Inputs -->

                                    <div class="btn-submit w100 display-flex justify-end">
                                        <button type="submit" permission_alter="1" class="btn-01 w100 cursor-pointer text-capitalize transition" name="acao-not">
                                            <i class="bi bi-send-fill"></i> <span>Cadastrar</span>
                                        </button>
                                    </div><!-- Botão de envio -->
                                </form><!-- Formulario -->
                            </div><!-- Formulário para mais cadastros -->
                        </div><!-- Box de configurações definidas -->

                        <div class="settings-wrapper padd-1p bg-02 shadow-01 border-01 border-r-20">
                            <div class="title-box padd-10">
                                <h3>Modelos cadastradas</h3>
                            </div><!-- Titulo da box -->
                            <div settingsViews="tb_sys_settigns.produto_model" class="container-settings-registered w100 position-relative">
                                <div class="box-loading position-absolute display-center w100 h100 transition">
                                    <div class="flippers position-relative">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="box-contain">                                  
                                </div><!-- Contendo Itens -->
                            </div><!-- Cadastrados -->
                            <div class="form-settings w100 marg-b-10 marg-t-10">
                                <form settings="model-register" action="" class="w100 display-flex flex-column position-relative" method="post">
                                    <div class="form-box-single-inputs">
                                        <div fixed class="box-form-uniq position-relative display-flex flex-column fw-100 marg-b-30">
                                            <input 
                                                type="text" 
                                                id="model-01" 
                                                placeholder="Cadastre novo Modelo..." 
                                                class="bg-02 border-01 transition w100 padd-15"
                                                name="model-01-no"
                                                not-null
                                                maxlength="30"
                                                autocomplete="off"
                                                required
                                                permission_alter="1"
                                            ><!-- Input -->
                                            <div class="icon-input-atention display-none w100 h100 position-absolute padd-15">
                                                <i class="bi position-absolute"></i>
                                                <div class="aviso-input user-select-none">Esse campo não pode está vazio</div>
                                            </div><!-- Div de aviso -->
                                        </div><!-- Campo de input -->
                                    </div><!-- Box de inputs -->

                                    <div title="Adicionar Campos" add-input="model-register" class="add-input-settings display-center position-absolute cursor-pointer transition">
                                        <i class="bi bi-bookmark-plus"></i>
                                    </div><!-- Botão para adicionar mais inputs -->

                                    <div class="box-form-uniq display-none" >
                                        <input type="hidden" permission_alter="1" name="nome_tabela-not" value="tb_sys_settigns.produto_model">
                                    </div><!-- Campo Dos Inputs -->

                                    <div class="btn-submit w100 display-flex justify-end">
                                        <button type="submit" permission_alter="1" class="btn-01 w100 cursor-pointer text-capitalize transition" name="acao-not">
                                            <i class="bi bi-send-fill"></i> <span>Cadastrar</span>
                                        </button>
                                    </div><!-- Botão de envio -->
                                </form><!-- Formulario -->
                            </div><!-- Formulário para mais cadastros -->
                        </div><!-- Box de configurações definidas -->

                        <div class="settings-wrapper padd-1p bg-02 shadow-01 border-01 border-r-20">
                            <div class="title-box padd-10">
                                <h3>Tamanhos cadastradas</h3>
                            </div><!-- Titulo da box -->
                            <div settingsViews="tb_sys_settigns.produto_size" class="container-settings-registered w100 position-relative">
                                <div class="box-loading position-absolute display-center w100 h100 transition">
                                    <div class="flippers position-relative">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="box-contain">                                  
                                </div><!-- Contendo Itens -->
                            </div><!-- Cadastrados -->
                            <div class="form-settings w100 marg-b-10 marg-t-10">
                                <form settings="size-register" action="" class="w100 display-flex flex-column position-relative" method="post">
                                    <div class="form-box-single-inputs">
                                        <div fixed class="box-form-uniq position-relative display-flex flex-column fw-100 marg-b-30">
                                            <input 
                                                type="text" 
                                                id="size-01" 
                                                placeholder="Cadastre novo Tamanho..." 
                                                class="bg-02 border-01 transition w100 padd-15"
                                                name="size-01-no"
                                                not-null
                                                maxlength="30"
                                                autocomplete="off"
                                                required
                                                permission_alter="1"
                                            ><!-- Input -->
                                            <div class="icon-input-atention display-none w100 h100 position-absolute padd-15">
                                                <i class="bi position-absolute"></i>
                                                <div class="aviso-input user-select-none">Esse campo não pode está vazio</div>
                                            </div><!-- Div de aviso -->
                                        </div><!-- Campo de input -->
                                    </div><!-- Box de inputs -->

                                    <div title="Adicionar Campos" add-input="model-register" class="add-input-settings display-center position-absolute cursor-pointer transition">
                                        <i class="bi bi-bookmark-plus"></i>
                                    </div><!-- Botão para adicionar mais inputs -->

                                    <div class="box-form-uniq display-none" >
                                        <input type="hidden" permission_alter="1" name="nome_tabela-not" value="tb_sys_settigns.produto_size">
                                    </div><!-- Campo Dos Inputs -->

                                    <div class="btn-submit w100 display-flex justify-end">
                                        <button type="submit" permission_alter="1" class="btn-01 w100 cursor-pointer text-capitalize transition" name="acao-not">
                                            <i class="bi bi-send-fill"></i> <span>Cadastrar</span>
                                        </button>
                                    </div><!-- Botão de envio -->
                                </form><!-- Formulario -->
                            </div><!-- Formulário para mais cadastros -->
                        </div><!-- Box de configurações definidas -->

                    </div><!-- Campo principal -->
                </div><!-- Sessão container -->
            </div><!-- Campo de configuração dos produtos -->
        </div><!-- Campo de formulários do usuário -->
    </div><!-- Campo Principal do Settings -->
</section><!-- Sessão página de configuração -->