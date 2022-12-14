<?php
    class BaseHtml {
        public static function editeEmail($values){
            return '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>Meu e-mail marketing!</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
                </head>
                <body style="margin:0;padding:0;">
                    <table width="750px" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="padding: 20px 0 20px 0;" bgcolor="#183a4f" align="center">
                                <img style="display:block;" alt="logo_solalux" width="200" src="https://solalux.com.br/orcamento/assets/image/MARCA_branco-x300.png"/>
                            </td>
                        </tr> 
                        <tr>
                            <td style="padding: 0 20px 0 20px;">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="border-bottom: 2px solid #ccc; padding: 20px 0 20px 0;">
                                            <span style="color: #888; font-size: 22px;">Nova Solicitação de <strong>ORÇAMENTO</strong>...</span>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 20px 20px 20px 20px;">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td valign="top" width="250px">
                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                <tr style="width: 35%; display: inline-block; color: #666; font-weight: bold; border: 1px solid #ccc;">
                                                    <td style="
                                                        display: block;
                                                        border-bottom: 1px solid #ccc; 
                                                        padding: 5px 5px 5px 5px;
                                                    ">Nome: </td>
                                                    <td style="
                                                        display: block;
                                                        border-bottom: 1px solid #ccc; 
                                                        padding: 5px 5px 5px 5px;
                                                    ">E-mail: </td>
                                                    <td style="
                                                        display: block;
                                                        border-bottom: 1px solid #ccc; 
                                                        padding: 5px 5px 5px 5px;
                                                    ">Telefone: </td>
                                                    <td style="
                                                        display: block;
                                                        border-bottom: 1px solid #ccc; 
                                                        padding: 5px 5px 5px 5px;
                                                    ">Valor médio de Consumo: </td>
                                                    <td style="
                                                        display: block;
                                                        border-bottom: 1px solid #ccc; 
                                                        padding: 5px 5px 5px 5px;
                                                    ">Cidade/Estado: </td>
                                                    <td style="
                                                        display: block; 
                                                        padding: 5px 5px 5px 5px;
                                                    ">Data e Hora da solicitação: </td>
                                                </tr>
                                                <tr style="width: 64%; display: inline-block; color: #666;  border: 1px solid #ccc; border-left: 0;">
                                                    <td style="
                                                        display: block;
                                                        border-bottom: 1px solid #ccc; 
                                                        padding: 5px 5px 5px 5px;
                                                    ">'.$values['nome'].'</td>
                                                    <td style="
                                                        display: block;
                                                        border-bottom: 1px solid #ccc; 
                                                        padding: 5px 5px 5px 5px;
                                                    "><a href="mailto:'.$values['email'].'" style="text-decoration: none; color: #0ebded;">'.$values['email'].'</a></td>
                                                    <td style="
                                                        display: block;
                                                        border-bottom: 1px solid #ccc; 
                                                        padding: 5px 5px 5px 5px;
                                                    "><a target="_blanck href="https://web.whatsapp.com/send?phone=55'.$values['telefone-limpo'].'" style="text-decoration: none; color: #0ebded;">'.$values['telefone'].'</a></td>
                                                    <td style="
                                                        display: block;
                                                        border-bottom: 1px solid #ccc; 
                                                        padding: 5px 5px 5px 5px;
                                                    ">'.$values['valor-conta'].'</td>
                                                    <td style="
                                                        display: block;
                                                        border-bottom: 1px solid #ccc; 
                                                        padding: 5px 5px 5px 5px;
                                                    ">'.$values['cidade'].'/'.$values['estado'].'</td>
                                                    <td style="
                                                        display: block; 
                                                        padding: 5px 5px 5px 5px;
                                                    ">'.$values['horario'].'</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#dfdefd" style="padding: 15px 10px 15px 10px;">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td width="100%" style="color: #666; text-align: center;">Aproveite para fechar mais essa solicitação.</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </body>
                </html>
            ';
        }

        public static function emailConfiRegister($values){
            return '
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <title>Confirmação de Cadastro</title>
                <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                <meta content="width=device-width, initial-scale=1.0" maximum-scale=1.0 name="viewport" />
                <style>
                    * {
                        box-sizing: border-box;
                    }
            
                    body {
                        margin: 0;
                        padding: 0;
                    }
            
                    a[x-apple-data-detectors] {
                        color: inherit !important;
                        text-decoration: inherit !important;
                    }
            
                    #MessageViewBody a {
                        color: inherit;
                        text-decoration: none;
                    }
            
                    p {
                        line-height: inherit
                    }
            
                    .desktop_hide,
                    .desktop_hide table {
                        display: none;
                        max-height: 0px;
                        overflow: hidden;
                    }
            
                    @media (max-width:525px) {
                        .social_block.desktop_hide .social-table {
                            display: inline-block !important;
                        }
            
                        .row-content {
                            width: 100% !important;
                        }
            
                        .mobile_hide {
                            display: none;
                        }
            
                        .stack .column {
                            width: 100%;
                            display: block;
                        }
            
                        .mobile_hide {
                            min-height: 0;
                            max-height: 0;
                            max-width: 0;
                            overflow: hidden;
                            font-size: 0px;
                        }
            
                        .desktop_hide,
                        .desktop_hide table {
                            display: table !important;
                            max-height: none !important;
                        }
            
                        .row-5 .column-1 .block-1.list_block td.pad,
                        .row-5 .column-1 .block-3.list_block td.pad,
                        .row-5 .column-1 .block-5.list_block td.pad {
                            padding: 0 0 0 5px;
                        }
            
                        .row-5 .column-1 .block-1.list_block ul,
                        .row-5 .column-1 .block-3.list_block ul,
                        .row-5 .column-1 .block-5.list_block ul {
                            line-height: auto !important;
                        }
            
                        .row-1 .column-2 .block-2.social_block td.pad {
                            padding-bottom: 5px;
                        }
            
                        .row-1 .column-2 .block-2.social_block .alignment {
                            text-align: center !important;
                        }
            
                        .row-6 .column-1 .block-1.paragraph_block td.pad>div {
                            text-align: center !important;
                            font-size: 10px !important;
                        }
            
                        .row-6 .column-1 .block-1.paragraph_block td.pad {
                            padding: 0 0 5px 5px !important;
                        }
            
                        .row-7 .column-2 .block-2.paragraph_block td.pad {
                            padding: 0 5px !important;
                        }
                    }
                    @media (max-width: 430px) {
                        .td_height{
                            height: 106px;
                        }
                    }
                </style>
            </head>
            <body style="background-color: transparent; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
                <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
                    style="background-color: transparent;" width="100%">
                    <tbody>
                        <tr>
                            <td>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1"
                                    role="presentation"
                                    style="background-color: #345351;" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="color: #000000; border-radius: 0; width: 505px;"
                                                    width="505">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1"
                                                                style="font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                                width="25%">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                    class="image_block block-2" role="presentation"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad"
                                                                            style="width:100%;padding-right:0px;padding-left:0px;padding-top:5px;padding-bottom:5px;">
                                                                            <div align="center" class="alignment"
                                                                                style="line-height:10px"><img
                                                                                    src="images/logo_name_1.png"
                                                                                    style="display: block; height: auto; border: 0; width: 126px; max-width: 100%;"
                                                                                    width="126" /></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td class="column column-2"
                                                                style="font-weight: 400; text-align: left; vertical-align: middle; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                                width="75%">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                    class="social_block block-2" role="presentation"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad"
                                                                            style="text-align:right;padding-top:0;padding-right:0px;padding-left:0px;">
                                                                            <div class="alignment" style="text-align:right;">
                                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                                    class="social-table" role="presentation"
                                                                                    style="display: inline-block;"
                                                                                    width="168px">
                                                                                    <tr>
                                                                                        <td style="padding:0 0 0 10px;"><a
                                                                                                href="https://www.instagram.com/vsouzacoder/"
                                                                                                target="_blank"><img
                                                                                                    alt="@vsouzacoder" height="32"
                                                                                                    src="images/instagram2x.png"
                                                                                                    style="display: block; height: auto; border: 0;"
                                                                                                    title="@vsouzacoder"
                                                                                                    width="32" /></a></td>
                                                                                        <td style="padding:0 0 0 10px;"><a
                                                                                                href="https://www.youtube.com/channel/UC0Zi5lZ3ceRagkp4e0Eoswg"
                                                                                                target="_blank"><img alt="VSCoder"
                                                                                                    height="32"
                                                                                                    src="images/youtube2x.png"
                                                                                                    style="display: block; height: auto; border: 0;"
                                                                                                    title="VSCoder"
                                                                                                    width="32" /></a></td>
                                                                                        <td style="padding:0 0 0 10px;"><a
                                                                                                href="https://wa.me/5592986203822"
                                                                                                target="_blank"><img alt="WhatsApp"
                                                                                                    height="32"
                                                                                                    src="images/whatsapp2x.png"
                                                                                                    style="display: block; height: auto; border: 0;"
                                                                                                    title="Valdean Souza"
                                                                                                    width="32" /></a></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3"
                                    role="presentation"
                                    style="background-color: transparent;" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="color: #000000; border-radius: 0; width: 505px;"
                                                    width="505">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1"
                                                                style="font-weight: 400; text-align: left; vertical-align: top; padding-top: 20px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                                width="100%">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                    class="heading_block block-1" role="presentation"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad" style="width:100%;text-align:center;">
                                                                            <h2
                                                                                style="margin: 0; color: #3f4c42; font-size: 34px; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; line-height: 120%; text-align: center; direction: ltr; font-weight: 700; letter-spacing: normal; margin-top: 0; margin-bottom: 0;">
                                                                                <span class="tinyMce-placeholder">E-mail de
                                                                                    Confirmação</span></h2>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2"
                                    role="presentation"
                                    style="background-color: transparent;" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="color: #000000; border-radius: 0; width: 505px;"
                                                    width="505">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1"
                                                                style="font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                                width="100%">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                    class="icons_block block-1" role="presentation"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad"
                                                                            style="vertical-align: middle; color: #000000; text-align: center; font-family: inherit; font-size: 14px;">
                                                                            <table align="center" cellpadding="0" cellspacing="0"
                                                                                class="alignment" role="presentation">
                                                                                <tr>
                                                                                    <td
                                                                                        style="vertical-align: middle; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; padding-right: 5px;">
                                                                                        <img align="center" alt="" class="icon"
                                                                                            height="64"
                                                                                            src="images/business-desktop-tie-employee-2742307.jpg"
                                                                                            style="display: block; height: auto; margin: 0 auto; border: 0;"
                                                                                            width="100" /></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4"
                                    role="presentation"
                                    style="background-color: transparent;" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="color: #000000; border-radius: 0; width: 505px;"
                                                    width="505">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1"
                                                                style="font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                                width="100%">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                    class="paragraph_block block-1" role="presentation"
                                                                    style="word-break: break-word;"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:20px;">
                                                                            <div
                                                                                style="color:#3f4c42;font-size:16px;font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;font-weight:400;line-height:120%;text-align:center;direction:ltr;letter-spacing:0px;">
                                                                                <h2 style="margin: 0; margin-bottom: 16px;">Olá '.$values['nome'].'!!!</h2>
                                                                                <p style="margin: 0; margin-bottom: 16px;">Parabéns,
                                                                                    seu registro foi criado com sucesso e já está
                                                                                    liberado para uso.</p>
                                                                                <h2 style="margin: 0; margin-bottom: 16px;">BEM-VINDO
                                                                                    A PWM...</h2>
                                                                                <p style="margin: 0;">Segue a baixo os dados para
                                                                                    login...</p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5"
                                    role="presentation"
                                    style="background-color: transparent;" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="color: #000000; border-radius: 0; width: 505px;"
                                                    width="505">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1"
                                                                style="font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                                width="100%">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                    class="list_block block-1" role="presentation"
                                                                    style="word-break: break-word; padding-bottom: 20px; color:#3f4c42; padding-left: 5px;"
                                                                    width="100%">
                                                                    
                                                                    <body>
                                                                        <tr style="width: 35%;display: inline-block; font-weight: bold;border: 1px solid #67eac3; --darkreader-inline-color:#67eac3; --darkreader-inline-border-top:#67eac3; --darkreader-inline-border-right:#67eac3; --darkreader-inline-border-bottom:#67eac3; --darkreader-inline-border-left:#67eac3;">
                                                                            <td style="display: block; border-bottom: 1px solid #67eac3; padding: 5px; --darkreader-inline-border-bottom:#67eac3;" >Seu Login:</td>
                                                                            <td style="display: block; border-bottom: 1px solid #67eac3; padding: 5px; --darkreader-inline-border-bottom:#67eac3;" >Sua Senha:</td>
                                                                            <td style="display: block; padding: 5px; --darkreader-inline-border-bottom:#67eac3;" >Link para o Painel:</td>
                                                                        </tr>
                                                                        <tr class="td_height" style="width: 64%; display: inline-block; border-width: 1px 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-color: #67eac3; border-right-color: #67eac3; border-bottom-color: #67eac3; border-image: initial; border-left-style: initial; border-left-color: initial; --darkreader-inline-color:#67eac3; --darkreader-inline-border-top:#67eac3; --darkreader-inline-border-right:#67eac3; --darkreader-inline-border-bottom:#67eac3; --darkreader-inline-border-left: initial;">
                                                                            <td style="display: block; border-bottom: 1px solid #67eac3; padding: 5px; --darkreader-inline-border-bottom:#67eac3;">'.$values['email'].'</td>
                                                                            <td style="display: block; border-bottom: 1px solid #67eac3; padding: 5px; --darkreader-inline-border-bottom:#67eac3;">'.$values['password'].'</td>
                                                                            <td style="display: block; padding: 5px; --darkreader-inline-border-bottom:#67eac3;">
                                                                                <a style="text-decoration: none; color: rgb(14, 189, 237); --darkreader-inline-color:#29c7f2;" href="http://pwm.localhost" target="_blank" data-darkreader-inline-color="">pwm.localhost</a>
                                                                            </td>
                                                                        </tr>
                                                                    </body>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6"
                                    role="presentation" style="background-color: #345351;" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="color: #000000; border-radius: 0; width: 505px;"
                                                    width="505">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1"
                                                                style="font-weight: 100; font-style: italic; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                                width="100%">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                    class="paragraph_block block-1" role="presentation"
                                                                    style="word-break: break-word;"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad" style="padding-bottom:20px;">
                                                                            <div
                                                                                style="color:#67eac3;font-size:11px;font-family:Arial,"Helvetica Neue" Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;letter-spacing:0px;">
                                                                                <p style="margin: 0; margin-bottom: 5px; padding-top: 20px;">Obs.:
                                                                                    Esse sistema está em período de teste, portanto,
                                                                                    pode ser vulnerável e está suscetível a erros.
                                                                                </p>
                                                                                <p style="margin: 0;">Antes de começar a usar-ló,
                                                                                    senha ciência dos riscos que você pode correr,
                                                                                    pois não nos responsabilizamos ainda por
                                                                                    vazamentos futuros.</p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-7"
                                    role="presentation" style="background-color: #345351;" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="color: #000000; border-radius: 0; width: 505px;"
                                                    width="505">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1"
                                                                style="font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                                width="25%">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                    class="image_block block-2" role="presentation"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad"
                                                                            style="width:100%;padding-right:0px;padding-left:0px;padding-top:5px;padding-bottom:5px;">
                                                                            <div align="center" class="alignment"
                                                                                style="line-height:10px"><img
                                                                                    src="images/logo_name_2.png"
                                                                                    style="display: block; height: auto; border: 0; width: 126px; max-width: 100%;"
                                                                                    width="126" /></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td class="column column-2"
                                                                style="font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                                width="50%">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                    class="paragraph_block block-2" role="presentation"
                                                                    style="word-break: break-word;"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad"
                                                                            style="padding-top:25px;padding-right:5px;padding-left:5px;padding-bottom:5px;">
                                                                            <div
                                                                                style="color:#67eac3;font-size:16px;font-family:Arial,"Helvetica Neue" Helvetica, sans-serif;font-weight:400;line-height:120%;text-align:center;direction:ltr;letter-spacing:0px;">
                                                                                <p style="margin: 0;">Esse pequeno projeto foi
                                                                                    pensado e desenvolvido por um simples
                                                                                    programador chamado Valdean Souza.</p>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td class="column column-3"
                                                                style="font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                                width="25%">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                    class="icons_block block-2" role="presentation"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad"
                                                                            style="vertical-align: middle; color: #000000; text-align: center; font-family: inherit; font-size: 14px; padding-top: 5px; padding-bottom: 5px;">
                                                                            <table align="center" cellpadding="0" cellspacing="0"
                                                                                class="alignment" role="presentation">
                                                                                <tr>
                                                                                    <td
                                                                                        style="vertical-align: middle; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; padding-right: 5px;">
                                                                                        <img align="center" alt="" class="icon"
                                                                                            height="128"
                                                                                            src="images/business-desktop-tie-employee-2742307.jpg"
                                                                                            style="display: block; height: auto; margin: 0 auto; border: 0;"
                                                                                            width="128" /></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
            </html>
            ';
        }
    }
?>