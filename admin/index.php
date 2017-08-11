<?php

require_once("../private/secure/sql/connect.sql.php");
require_once("../private/secure/php/sessions.php");

session_start();

?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://static-css-cdn.cestlux.it/css/clx.css" rel="stylesheet">
        <link href="https://static-css-cdn.cestlux.it/admin/css/admin.clx.css" rel="stylesheet">
        <link rel="stylesheet" href="https://static-css-cdn.cestlux.it/bootstrap/css/bootstrap.min.css" />
        <script src="https://static-css-cdn.cestlux.it/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
        <script charset="utf-8" type="text/javascript">
            window.onload=function(){console.log(""+ +new Date+": Onload fired")},document.onreadystatechange=function(){console.log(""+ +new Date+": Ready state changed"),"loading"==document.readyState?$(".ppp").css({visibility:"visible"}):"complete"==document.readyState&&$(".ppp").fadeOut(3400)};
        </script>
    </head>
    <body id="clx-admin-login">
        <div class="container-fluid">
            <main>
                <div class="ppp"><div class="scroller"></div></div>
                <loading><?php echo LOADING; ?></loading>
                <div class="main-login-admin-form row">
                    <div class="inner-login clearfix">
                        <p class="inner-cpt">Entra in C'est Lux</p>
                        <form method="POST">
                            <p><input type="text" name="uname" placeholder="Nome utente" autofocus="true" autocomplete="off" spellcheck="off" /></p>
                            <p><input type="password" name="upassword" placeholder="Password" /></p>
                            <!-- <p><label for="initSession_clxAdmin-scrumb">Ricordami su questo computer</label>&nbsp;<input type="checkbox" name="initSession_clxAdmin-scrumb" value="Ricordami su questo computer" /></p> -->
                            <p><button rel="ajax-clx" data-ajax-type="form" data-ajax-type-extra="admin-dashboard-login" data-ajax-target="https://admin.cestlux.it/dashboard/">Login</button></p>
                        </form>
                    </div>
                    <span class="clx-copyright-idm">C'est Lux IDM Versione 1.0</span>
                </div>
            </main>
        </div>
        <script src="https://static-css-cdn.cestlux.it/js/clx/ajax/script.clx.js"></script>
    </body>
</html>