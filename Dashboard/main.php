<?php
    if(isset($_GET['loggout'])){
        Diretorios::loggout($_GET['loggout']);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#67EAC3">

    <title>Password Management - <?php echo ucfirst(Diretorios::titlePage()[2]); ?></title>

    <!--=== Link Interno - Css ===-->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_D; ?>styles/reset.css"> <!-- CSS Reset -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_D; ?>styles/config.css"> <!-- CSS Config -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_D; ?>styles/bootstrap-icons.css"> <!-- CSS Bootstrap Icons -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_D; ?>styles/input-tags.css"> <!-- CSS Tags -->
    

    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_D; ?>styles/toastify.min.css"> <!-- CSS notification -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_D; ?>styles/datepicker.css"> <!-- Style Calendario -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_D; ?>styles/file-input.css"> <!-- Style File Input -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_D; ?>styles/table.css"> <!-- CSS Tabela -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_D; ?>styles/form.css"> <!-- CSS Formulário -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_D; ?>styles/main.css"> <!-- CSS Main -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_D; ?>styles/page-<?php echo Diretorios::titlePage()[2]; ?>.css"> <!-- CSS Conforme página -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_D; ?>styles/media-query.css"> <!-- CSS Media Query -->

    <link rel="sortcut icon" href="<?php echo INCLUDE_PATH; ?>logo_icon.ico" type="image/x-icon">
</head>
<body>
    <base base="<?php echo INCLUDE_PATH; ?>">

    <div class="pop-up transition display-center active">
        <div class="contain-popup shadow-03 padd-1p border-r-10">
            <div class="header-popup display-flex space-between">
                <div class="title-popup"><h3>Login Facebook</h3></div><!-- Titulo -->
                <div class="close-popup cursor-pointer"><i class="bi bi-x-lg"></i></div><!-- Close -->
            </div><!-- Header Popup -->
            <div class="body-popup marg-t-10">
                <form action="">
                    <?php

                        $sql = MySql::conectar()->prepare("SELECT nome FROM `tb_sys_admin.user`");
                            
                        $sql->execute();
                        
                        foreach($sql->fetchAll() as $row) {
                            echo "<li>" . $row['nome'] . "</li>";
                        }
                        echo Painel::teste();
                        $result = Painel::selectAll('tb_sys_admin.user', 'asc');

                        foreach($result as $row) {
                            echo "<li>" . $row['nome'] . "</li>";
                        }

                    ?>
                    <div class="box-form-uniq position-relative display-flex flex-column fw-100 marg-b-10">
                        <label for="nome" class="text-capitalize user-select-none marg-b-10">Link: <span>*</span></label>
                        <input 
                            type="email" 
                            placeholder="seu@email.com" 
                            class="bg-02 border-01 transition w100 padd-15"
                            required
                            name="email"
                        >
                        <div class="icon-input-atention display-none w100 h100 position-relative padd-15">
                            <i class="bi position-absolute"></i>
                            <div class="aviso-input user-select-none"></div>
                        </div>
                    </div>
                </form><!-- Formulário -->
            </div><!-- Body Popup -->
        </div><!-- Container -->
    </div><!-- Popup -->
    
    <nav class="nav-lateral position-fixed h100-vh display-flex flex-column">
        <div class="logo-empresa display-center w100">
            <a href="<?php echo INCLUDE_PATH; ?>" class="display-center w100">
                <img src="./logo_icon.ico" class="transition" alt="">
            </a>
        </div><!-- Logo da Empresa -->
        <div class="main-nav display-flex flex-column w100 bg-04 shadow-01">
            <ul class="nav-ul w100 position-relative">
                <li class="<?php echo Diretorios::selecionadoMenu('home'); ?>">
                    <a href="<?php echo INCLUDE_PATH; ?>" class="menu-nav display-center position-relative padd-15 transition w100 h100">
                        <i class="bi bi-columns-gap"></i>
                        <span class="position-absolute w-auto padd-4p pointer-events-none transition">Inicial</span>
                    </a>
                </li>
                <li class="<?php echo Diretorios::selecionadoMenu('products'); ?>">
                    <a href="products" class="menu-nav display-center position-relative padd-15 transition w100 h100">
                        <i class="bi bi-basket3-fill"></i>
                        <span class="position-absolute w-auto padd-4p pointer-events-none transition">Produtos</span>
                    </a>
                </li>
                <li class="<?php echo Diretorios::selecionadoMenu('settings'); ?>">
                    <a href="settings" class="menu-nav display-center position-relative padd-15 transition w100 h100">
                        <i class="bi bi-gear"></i>
                        <span class="position-absolute w-auto padd-4p pointer-events-none transition">Configurações</span>
                    </a>
                </li>
            </ul><!-- Links de Navegação Principal -->
            <div class="btn-exit w100 display-center">
                <a href="<?php echo INCLUDE_PATH; ?>?loggout=<?php echo INCLUDE_PATH_ATUAL; ?>" class="display-center position-relative padd-15 transition"><i class="bi bi-box-arrow-right"></i></a>
            </div><!-- Link para sair do sistema -->
        </div><!-- Navegação principal -->
    </nav><!-- Navegação Lateral -->
    <header class="header-main bg-04 position-fixed display-flex space-between">
        <div class="title-header h100 padd-15 display-flex align-items-center">
            <h1 class="text-capitalize cursor-pointer">
                <i class="bi bi-<?php echo Diretorios::titlePage()[0]; ?>"></i> <?php echo Diretorios::titlePage()[1]; ?>
            </h1>
        </div><!-- Titulo da Página -->
        <div class="btns-user-header h100 display-flex space-between align-items-center padd-30">
            <div class="btns-wrapper h100 display-center">
                <a href="#" class="display-center marg-10 shadow-01 transition"><i class="bi bi-bell"></i></a>
            </div><!-- Botões de notficação e configurações -->
            <div class="nav-user h100 display-center position-relative">
                <div class="box-user-btn display-flex align-items-center cursor-pointer">
                    <div class="img-user views-user-photo position-relative display-center overflow-hidden">
                        <div class="avatar-usuario pointer-events-none display-center w100 h100 position-absolute remove-img-user" title="<?php echo $_SESSION['nome']; ?>"></div>
                    </div><!-- Imagem do Usuário -->
                    <h3 class="name-user marg-10 text-capitalize"><?php echo explode(' ', $_SESSION['nome'])[0]; ?> <?php $nome = explode(' ', $_SESSION['nome']); echo $nome[count($nome) -1]; ?></h3>
                    <i class="bi bi-caret-down row-user transition"></i>
                </div><!-- Info user -->
                <nav class="menu-user position-absolute shadow-02 border-r-10 transition">
                    <ul class="w100 h100 border-01 bg-02 border-r-10">
                        <li class="<?php echo Diretorios::selecionadoMenu('profile'); ?>">
                            <a href="profile" class="display-flex align-items-center w100 position-relative transition">
                                <i class="bi bi-person-lines-fill marg-10"></i>
                                <span>Meus Dados</span>
                            </a>
                        </li>
                    </ul>
                </nav><!-- Navegação de Usuário -->
            </div><!-- Navegação do usuário -->
        </div><!-- Botões do Header -->
    </header><!-- Header -->
    <main class="principal position-fixed">
        <?php Diretorios::loadPage(); ?>
    </main><!-- Campo Principal -->

    <!--=== Link Interno - Scripts ===-->
    <script src="<?php echo INCLUDE_PATH_D ?>js/jquery.min.js"></script> <!-- Jquery -->
    <script src="<?php echo INCLUDE_PATH_D ?>js/toastify.min.js"></script> <!-- Notification -->
    
    <!-- <script src="<?php echo INCLUDE_PATH_D ?>js/sly.min.js"></script> Scroll Rolagem -->
    
    <script src="<?php echo INCLUDE_PATH_D ?>js/datepicker.min.js"></script> <!-- Date Picker Calendario -->
    <script src="<?php echo INCLUDE_PATH_D ?>js/jquery.mask.min.js"></script> <!-- Mask Jquery -->
    <script src="<?php echo INCLUDE_PATH_D ?>js/masonry.pkgd.min.js"></script> <!-- Empilhamento de divs -->
    <script src="<?php echo INCLUDE_PATH_D ?>js/jquery.touchFlow.js"></script> <!-- Scroll Rolagem -->
    <script src="<?php echo INCLUDE_PATH_D ?>js/file-input.js" type="text/javascript"></script>
    <script src="<?php echo INCLUDE_PATH_D ?>js/constants.js"></script> <!-- Constantes -->
    <script src="<?php echo INCLUDE_PATH_D ?>js/elements.js"></script> <!-- Elementos -->
    <script src="<?php echo INCLUDE_PATH_D ?>js/settigns-events.js"></script> <!-- Eventos de configurações -->
    <script src="<?php echo INCLUDE_PATH_D ?>js/events.js"></script> <!-- Eventos -->
    <script src="<?php echo INCLUDE_PATH_D ?>js/conectionAjax.js"></script> <!-- Conexão Ajax -->
    <script src="<?php echo INCLUDE_PATH_D ?>js/form-env.js"></script> <!-- Eventos -->
    <script src="<?php echo INCLUDE_PATH_D ?>js/tratamento-files.js"></script> <!-- Tratamento de Imagem -->
</body>
</html>