<section class="settings w100 h100">
    <div class="main-section display-flex overflow-hidden w100 h100 bg-02 shadow-02 border-01 border-r-20">
        <div class="menu-section w30 h100">
            <nav class="nav-sections overflow-y-auto w100 h100">
                <div class="title-menu-section padd-2p marg-30 display-center w100">
                    <h4>Navegue</h3>
                </div><!-- Titulo do menu -->
                <ul class="w100 position-relative">
                    <li class="">
                        <a href="" realtime="registered-products" class="link-menu display-flex align-items-center position-relative padd-30 transition w100 h100">
                        <i class="bi bi-inboxes-fill"></i>
                            <span class="padd-4p pointer-events-none text-capitalize">Produtos Cadastrados</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="" realtime="register-products" class="link-menu display-flex align-items-center position-relative padd-30 transition w100 h100">
                            <i class="bi bi-bag-plus-fill"></i>
                            <span class="padd-4p pointer-events-none text-capitalize">Cadastrar Produtos</span>
                        </a>
                    </li>
                </ul><!-- Links de Navegação Principal -->
            </nav><!-- Área de navegação -->
        </div><!-- Navegação da section -->
        <div class="container-main-section w70 h100 bg-03">
            <div id="registered-products" class="registered-progutos show-containers w100 h100 display-none transition">
                <div class="section-main-wrapper overflow-y-auto w100 h100 padd-4p">
                    <?php

                        for($i = 50; $i >= 1; $i--){
                            for($j = 1; $j <= $i; $j++){
                                echo '*';
                            }
                            echo '</br>';
                        }

                    ?>
                </div><!-- Sessão container -->
            </div><!-- Campo de produtos cadastrados -->
            <div id="register-products" class="register-progutos show-containers w100 h100 display-block transition active">
                <div class="section-main-wrapper overflow-y-auto w100 h100 padd-4p">
                    <div class="title-form text-capitalize w-auto marg-b-30">
                        <h3 class="">Cadastre novo Produto</h3>
                    </div><!-- Titulo -->
                    <form action="" form="register-products" method="post" class="w100 display-center flex-column">
                        <?php

                            $brand = Painel::selectAllSettings('`brand`', 'tb_sys_settigns.produto_brand', 'brand');
                            $model = Painel::selectAllSettings('`model`', 'tb_sys_settigns.produto_model', 'model');
                            $category = Painel::selectAllSettings('`category`', 'tb_sys_settigns.produto_category', 'category');
                            $occasion = Painel::selectAllSettings('`occasion`', 'tb_sys_settigns.produto_occasion', 'occasion');
                            $size = Painel::selectAllSettings('`size`', 'tb_sys_settigns.produto_size', 'size');
                            $color = Painel::selectAllSettings('`color`', 'tb_sys_settigns.produto_color', 'color');

                        ?>
                        <div class="form-box-single-inputs w100 marg-t-10 display-flex space-between align-items-center flex-wrap">

                            <div class="box-form-uniq position-relative display-flex flex-column fw-100 marg-b-10">
                                <label for="title" class="text-capitalize user-select-none marg-b-10">Título do produto: <span>*</span></label>
                                <input 
                                    type="text" 
                                    id="title" 
                                    placeholder="Escreva o Título" 
                                    class="bg-02 border-01 transition w100 padd-15"
                                    name="title"
                                    not-null
                                    autocomplete="off"
                                    required
                                    permission_alter="1"
                                >
                                <div class="icon-input-atention display-none w100 h100 position-absolute padd-15">
                                    <i class="bi position-absolute"></i>
                                    <div class="aviso-input user-select-none"></div>
                                </div>
                            </div><!-- Campo de input -->

                            <div class="box-form-uniq position-relative display-flex flex-column fw-100 marg-b-10">
                                <label for="nome" class="text-capitalize user-select-none marg-b-10">Nome do produto: <span>*</span></label>
                                <input 
                                    type="text" 
                                    id="nome" 
                                    placeholder="Escreva o Nome" 
                                    class="bg-02 border-01 transition w100 padd-15"
                                    name="nome"
                                    not-null
                                    autocomplete="off"
                                    required
                                    permission_alter="1"
                                >
                                <div class="icon-input-atention display-none w100 h100 position-absolute padd-15">
                                    <i class="bi position-absolute"></i>
                                    <div class="aviso-input user-select-none"></div>
                                </div>
                            </div><!-- Campo de input -->

                            <div class="box-form-uniq position-relative display-flex flex-column fw-33 marg-b-10">
                                <label for="brand" class="text-capitalize user-select-none marg-b-10">Marca do produto: <span>*</span></label>
                                <div class="input-select w100 display-flex space-between">
                                    <select 
                                        name="brand" 
                                        id="brand" 
                                        not-null
                                        data-placeholder="Selecione a Marca"
                                        autocomplete="off"
                                        required
                                        permission_alter="1"
                                    >
                                        <?php
                                            foreach($brand as $key => $values){
                                        ?>
                                                <option class='cursor-pointer' value='<?php echo $values[0] ?>'><?php echo $values[0] ?></option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="icon-input-atention display-none w100 h100 position-relative padd-15">
                                    <i class="bi position-absolute"></i>
                                    <div class="aviso-input user-select-none"></div>
                                </div>
                            </div><!-- Campo de input -->

                            <div class="box-form-uniq position-relative display-flex flex-column fw-33 marg-b-10">
                                <label for="model" class="text-capitalize user-select-none marg-b-10">Modelo do produto: <span>*</span></label>
                                <div class="input-select w100 display-flex space-between">
                                    <select 
                                        name="model" 
                                        id="model" 
                                        not-null
                                        data-placeholder="Selecione o Modelo"
                                        autocomplete="off"
                                        required
                                        permission_alter="1"
                                    >
                                        <?php
                                            foreach($model as $key => $values){
                                        ?>
                                                <option class='cursor-pointer' value='<?php echo $values[0] ?>'><?php echo $values[0] ?></option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="icon-input-atention display-none w100 h100 position-relative padd-15">
                                    <i class="bi position-absolute"></i>
                                    <div class="aviso-input user-select-none"></div>
                                </div>
                            </div><!-- Campo de input -->

                            <div class="box-form-uniq position-relative display-flex flex-column fw-33 marg-b-10">
                                <label for="category" class="text-capitalize user-select-none marg-b-10">Categoria do produto: <span>*</span></label>
                                <div class="input-select w100 display-flex space-between">
                                    <select 
                                        name="category" 
                                        id="category" 
                                        not-null
                                        data-placeholder="Selecione a Categoria"
                                        autocomplete="off"
                                        required
                                        permission_alter="1"
                                    >
                                        <?php
                                            foreach($category as $key => $values){
                                        ?>
                                                <option class='cursor-pointer' value='<?php echo $values[0] ?>'><?php echo $values[0] ?></option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="icon-input-atention display-none w100 h100 position-relative padd-15">
                                    <i class="bi position-absolute"></i>
                                    <div class="aviso-input user-select-none"></div>
                                </div>
                            </div><!-- Campo de input -->

                            <div class="box-form-uniq position-relative display-flex flex-column fw-33 marg-b-10">
                                <label for="occasion" class="text-capitalize user-select-none marg-b-10">Ocasião do produto: <span>*</span></label>
                                <div class="input-select w100 display-flex space-between">
                                    <select 
                                        name="occasion" 
                                        id="occasion" 
                                        not-null
                                        data-placeholder="Selecione a Ocasião"
                                        autocomplete="off"
                                        required
                                        permission_alter="1"
                                    >
                                        <?php
                                            foreach($occasion as $key => $values){
                                        ?>
                                                <option class='cursor-pointer' value='<?php echo $values[0] ?>'><?php echo $values[0] ?></option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="icon-input-atention display-none w100 h100 position-relative padd-15">
                                    <i class="bi position-absolute"></i>
                                    <div class="aviso-input user-select-none"></div>
                                </div>
                            </div><!-- Campo de input -->

                            <div class="box-form-uniq position-relative display-flex flex-column fw-33 marg-b-10">
                                <label for="title" class="text-capitalize user-select-none marg-b-10">Valor do Produto: <span>*</span></label>
                                <input 
                                    type="text" 
                                    id="title" 
                                    placeholder="Informe Valor" 
                                    class="bg-02 border-01 transition w100 padd-15"
                                    name="title"
                                    not-null
                                    autocomplete="off"
                                    required
                                    permission_alter="1"
                                >
                                <div class="icon-input-atention display-none w100 h100 position-absolute padd-15">
                                    <i class="bi position-absolute"></i>
                                    <div class="aviso-input user-select-none"></div>
                                </div>
                            </div><!-- Campo de input -->

                            <div class="box-form-uniq position-relative display-flex flex-column fw-33 marg-b-10">
                                <label for="title" class="text-capitalize user-select-none marg-b-10">Valor do Desconto:</label>
                                <input 
                                    type="text" 
                                    id="title" 
                                    placeholder="Informe Valor" 
                                    class="bg-02 border-01 transition w100 padd-15"
                                    name="title"
                                    autocomplete="off"
                                    required
                                    permission_alter="1"
                                >
                                <div class="icon-input-atention display-none w100 h100 position-absolute padd-15">
                                    <i class="bi position-absolute"></i>
                                    <div class="aviso-input user-select-none"></div>
                                </div>
                            </div><!-- Campo de input -->

                            <div class="box-form-uniq position-relative display-flex flex-column fw-50 marg-b-10">
                                <label for="size" class="text-capitalize user-select-none marg-b-10">Tamanhos do produto: <span>*</span></label>
                                <div class="input-select w100 display-flex space-between">
                                    <select 
                                        name="size" 
                                        id="size"
                                        not-null
                                        multiple
                                        data-placeholder="Selecione os Tamanhos"
                                        autocomplete="off"
                                        required
                                        permission_alter="1"
                                    >
                                        <?php
                                            foreach($size as $key => $values){
                                        ?>
                                                <option class='cursor-pointer' value='<?php echo $values[0] ?>'><?php echo $values[0] ?></option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="icon-input-atention display-none w100 h100 position-relative padd-15">
                                    <i class="bi position-absolute"></i>
                                    <div class="aviso-input user-select-none"></div>
                                </div>
                            </div><!-- Campo de input -->

                            <div class="box-form-uniq position-relative display-flex flex-column fw-50 marg-b-10">
                                <label for="color" class="text-capitalize user-select-none marg-b-10">Cores do produto: <span>*</span></label>
                                <div class="input-select w100 display-flex space-between">
                                    <select 
                                        name="color" 
                                        id="color" 
                                        not-null
                                        multiple
                                        data-placeholder="Selecione as Cores" 
                                        autocomplete="off"
                                        required
                                        permission_alter="1"
                                    >
                                        <?php
                                            foreach($color as $key => $values){
                                        ?>
                                                <option class='cursor-pointer' value='<?php echo $values[0] ?>'><?php echo $values[0] ?></option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="icon-input-atention display-none w100 h100 position-relative padd-15">
                                    <i class="bi position-absolute"></i>
                                    <div class="aviso-input user-select-none"></div>
                                </div>
                            </div><!-- Campo de input -->

                            <div class="box-form-uniq position-relative display-flex flex-column fw-100 marg-b-10">
                                <label for="nome" class="text-capitalize user-select-none marg-b-10">Descrição: <span>*</span></label>
                                <textarea 
                                    name="descricao" 
                                    id="descricao" 
                                    placeholder="Digite uma Observação..." 
                                    class="bg-02 border-01 transition padd-15"
                                    required
                                    not-null
                                    autocomplete="off"
                                    permission_alter="1"
                                ></textarea>
                                <div class="icon-input-atention display-none w100 h100 position-relative padd-15">
                                    <i class="bi position-absolute"></i>
                                    <div class="aviso-input user-select-none"></div>
                                </div>
                            </div><!-- Campo de input -->
                            
                        </div><!-- Campo de inputs -->

                        <div class="box-form-uniq display-none" >
                            <input type="hidden" permission_alter="1" name="nome_tabela-not">
                            <input type="hidden" permission_alter="1" name="id_product">
                        </div><!-- Campo Dos Inputs -->

                        <div class="btn-submit w100 display-flex justify-end marg-t-10">
                            <button type="submit" permission_alter="1" class="btn-01 cursor-pointer text-capitalize transition" name="alterar">
                                <i class="bi bi-arrow-repeat"></i> <span>Cadastrar</span>
                            </button>
                        </div>
                    </form><!-- Formulário -->
                </div><!-- Campo do formulário -->
            </div><!-- Campo de produtos cadastrados -->
        </div><!-- Campo de formulários -->
    </div><!-- Campo Principal do Produtos -->
</section><!-- Sessão página de Produtos -->