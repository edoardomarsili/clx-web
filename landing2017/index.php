<?php

/* 
* name: CLX homepage
* property: Concept FBO S.r.l.
* url: https://$_SERVER['SERVER_NAME']/public
*/

/*

include("https://cestlux.localhost.local/private/secure/php/lang/clx.lang.php");
	include("../private/secure/php/lang/txt.php");
defineStrings();
*/

header("Access-Control-Allow-Origin: *");
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
?>
<!DOCTYPE html>
<!--[if IE 9]>
  <html lang="en-GB" xml:lang="en-GB" xmlns:fb="http://ogp.me/ns/fb#" class="ie ie9" draggable="false" dir="ltr" is-ie="true">
<![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-GB" xml:lang="en-GB" xmlns:fb="http://ogp.me/ns/fb#" dir="ltr" draggable="false" is-ie="false" id="clx">
<!--<![endif]-->
    <head>
        <title>On the way &middot; C'est Lux</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
        <meta name="keywords" content="">
        <meta name="description" content="Luxury Moods & Outlet Corner" />
        
        <meta name="theme-color" content="#ffffff"/>
        <meta name="mobile-web-app-capable" content="yes"/>
        <meta name="application-name" content="C'est Lux"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-title" content="C'est Lux"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
        <meta name="msapplication-starturl" content="./"/>
        <meta name="msapplication-navbutton-color" content="#ffffff"/>
        <meta name="HandheldFriendly" content="true"/>
        <meta name="MobileOptimized" content="240"/>
        
<!-- test -->

        <meta property="og:title" content="C'est Lux"/>
        <meta property="og:description" content="Luxury Moods & Outlet Corner"/>
        <meta property="og:url" content="https://www.cestlux.it"/>
        <meta property="og:image" content="https://static-css-cdn.cestlux.it/img/social/18194898_845296325627241_6653665840984869294_n.jpg"/>
        <meta property="og:locale" content="en_GB"/>
        
        <meta name="twitter:card" content="true"/>
        <meta name="twitter:title" content="C'est Lux">
        <meta name="twitter:site" content="@cestlux"/>
        <meta name="twitter:description" content="Luxury Moods & Outlet Corner."/>
        <link href="https://static-css-cdn.cestlux.it/css/clx.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://static-css-cdn.cestlux.it/bootstrap/css/bootstrap.min.css" />
        <script src="https://static-css-cdn.cestlux.it/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="//www.gstatic.com/external_hosted/modernizr/modernizr.js" type="text/javascript" charset="utf-8"></script>
        <script charset="utf-8" type="text/javascript">
            window.onload=function(){console.log(""+ +new Date+": Onload fired")},document.onreadystatechange=function(){console.log(""+ +new Date+": Ready state changed"),"loading"==document.readyState?$(".ppp").css({visibility:"visible"}):"complete"==document.readyState&&$(".ppp").fadeOut(3400)};
        </script>
        <script>
            $(function(){
                $('#clx_lForm').submit(function(e){
                    e.preventDefault()

                    var uname = $('#clx-lName').val(),
                        usurname = $('#clx-lSurName').val(),
                        uemail = $('#clx-lMail').val(),
                        ugender = $('#clx-l_gender').val();

                    $.ajax({
                        url: "https://launch.cestlux.it/mailer-daemon/test.php",
                        method: "POST",
                        data: { name: uname, surname: usurname, email: uemail, gender: ugender }
                    }).done(function(response){
                        alert("You will shortly receive an email in your mailbox. Double check in spam/junk folder.")
                    })
                })
            })
        </script>
    </head>
    <body>
        <main class="container-fluid">
            <div class="ppp"><div class="scroller"></div></div>
            <loading><?php echo LOADING; ?></loading>
            <section class="hs clearfix clx-landing2017">
                <div class="above-title">clx<span style="font-size: 14pt">c'est lux</span></div>
                <div class="top-centered clearfix">
                    <div class="bottom-strip"></div>
                    <div class="clx-lc row">
                        <div class="pull-left clx-lc-inner col-xs-12 col-sm-6 col-md-6">
                            <p>We are on the way, don't miss your chance to receive a 20% discount at launch.</p>
                            <p><u>Our brands:</u></p>
                            <ul>
                                <li>versace</li>
                                <li>moschino</li>
                                <li>blugirl</li>
                                <li>philosophy</li>
                                <li>michael kors</li>
                                <li>hugo boss</li>
                                <li>armani</li>
                                <li>guess</li>
                                <li>patrizia pepe</li>
                                <li>roberto cavalli</li>
                                <li>pollini</li>
                            </ul>
                        </div>
                        <div class="pull-right clx-lc-inner col-xs-12 col-sm-6 col-md-6">
                            <span class="cpt-right">get notified. 20% off</span><hr />
                            <form id="clx_lForm" action="">
                                <p><label for="clx-lName">name</label>&nbsp;<input type="text" name="clx-lName" id="clx-lName" autocomplete="false" spellcheck="false" /></p>
                                <p><label for="clx-lSurName">surname</label>&nbsp;<input type="text" name="clx-lSurName" id="clx-lSurName" autocomplete="false" spellcheck="false" /></p>
                                <p><label for="clx-lMail">email</label>&nbsp;<input type="email" name="clx-lMail" id="clx-lMail" autocomplete="false" spellcheck="false" /></p>
                                <p><label for="clx-l_gender">woman</label>&nbsp;<input type="radio" name="clx-l_gender" id="clx-l_gender" value="woman" />&nbsp;&nbsp;<label for="clx-l_gender">man</label>&nbsp;<input type="radio" name="clx-l_gender" id="clx-l_gender" value="man" /></p>
                                <p style="font-size:8.5pt"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;your email address will be safe with us</p>
                                <p><input type="submit" value="submit"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <footer>
                <address><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Via dei Serragli 74R 50124 Firenze, ITALY <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Tel +39 055280464 <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;shop@celux.it&nbsp;&middot;&nbsp;<i class="fa fa-instagram" aria-hidden="true"></i>&nbsp;@cestlux&nbsp;&middot;&nbsp;<i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;/cest-lux</address>
            </footer>
        </main>
    </body>
</html>