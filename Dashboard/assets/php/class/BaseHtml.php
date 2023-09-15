<?php
    class BaseHtml {
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
                                        style="background-color: #151b28;" width="100%">
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
                                                                                style="width:100%;padding-right:0px;padding-left:0px;padding-top:10px;padding-bottom:10px;">
                                                                                <div align="center" class="alignment"
                                                                                    style="line-height:10px"><img
                                                                                        src="http://mfc.localhost/assets/images/logo/logo-MFC.png"
                                                                                        style="display: block; height: 70px; border: 0; width: 50px; max-width: 100%;"
                                                                                        width="70" height="70"/></div>
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
                                                                                                style="font-size: 50px; text-decoration: none; color: #1976f7; --darkreader-inline-color:#1976f7;"
                                                                                                href="http://mfc.localhost"
                                                                                                target="_blank">MFC</a>
                                                                                            </td>
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
                                                                                                src="http://mfc.localhost/assets/images/business-desktop-tie-employee-2742307.jpg"
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
                                                                                    <h2 style="margin: 0; margin-bottom: 16px;">BEM-VINDO A MY FINANCE CONTROLS...</h2>
                                                                                    <p style="margin: 0;">Segue abaixo os dados para
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
                                                                            <tr style="width: 35%;display: inline-block; font-weight: bold;border: 1px solid #138c40; --darkreader-inline-color:#138c40; --darkreader-inline-border-top:#138c40; --darkreader-inline-border-right:#138c40; --darkreader-inline-border-bottom:#138c40; --darkreader-inline-border-left:#138c40;">
                                                                                <td style="display: block; border-bottom: 1px solid #138c40; padding: 5px; --darkreader-inline-border-bottom:#138c40;" >Seu Login:</td>
                                                                                <td style="display: block; border-bottom: 1px solid #138c40; padding: 5px; --darkreader-inline-border-bottom:#138c40;" >Sua Senha:</td>
                                                                                <td style="display: block; padding: 5px; --darkreader-inline-border-bottom:#138c40;" >Link para o Painel:</td>
                                                                            </tr>
                                                                            <tr class="td_height" style="width: 64%; display: inline-block; border-width: 1px 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-color: #138c40; border-right-color: #138c40; border-bottom-color: #138c40; border-image: initial; border-left-style: initial; border-left-color: initial; --darkreader-inline-color:#138c40; --darkreader-inline-border-top:#138c40; --darkreader-inline-border-right:#138c40; --darkreader-inline-border-bottom:#138c40; --darkreader-inline-border-left: initial;">
                                                                                <td style="display: block; border-bottom: 1px solid #138c40; padding: 5px; --darkreader-inline-border-bottom:#138c40;">'.$values['email'].'</td>
                                                                                <td style="display: block; border-bottom: 1px solid #138c40; padding: 5px; --darkreader-inline-border-bottom:#138c40;">'.$values['password'].'</td>
                                                                                <td style="display: block; padding: 5px; --darkreader-inline-border-bottom:#138c40;">
                                                                                    <a style="text-decoration: none; color: #1976f7; --darkreader-inline-color:#1976f7;" href="http://mfc.localhost" target="_blank" data-darkreader-inline-color="">mfc.localhost</a>
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
                                        role="presentation" style="background-color: #151b28;" width="100%">
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
                                                                                    style="color:#4a5269;font-size:11px;font-family:Arial,"Helvetica Neue" Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;letter-spacing:0px;">
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
                                        role="presentation" style="background-color: #151b28;" width="100%">
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
                                                                                        src="http://mfc.localhost/assets/images/logo/logo-MFC.png"
                                                                                        style="display: block; height: 100px; border: 0; width: 80px; max-width: 100%;"
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
                                                                                    style="color:#138c40;font-size:16px;font-family:Arial,"Helvetica Neue" Helvetica, sans-serif;font-weight:400;line-height:120%;text-align:center;direction:ltr;letter-spacing:0px;">
                                                                                    <p style="margin: 0;"></p>
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
                                                                                                src="http://mfc.localhost/assets/images/business-desktop-tie-employee-2742307.jpg"
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