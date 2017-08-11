<?php

/* 
* name: CLX homepage
* property: Concept FBO S.r.l.
* url: https://$_SERVER['SERVER_NAME']/public
*/
?>
<!DOCTYPE html>
<!--[if IE 9]>
  <html lang="en-GB" xml:lang="en-GB" xmlns:fb="http://ogp.me/ns/fb#" class="ie ie9" draggable="false" dir="ltr" is-ie="true">
<![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-GB" xml:lang="en-GB" xmlns:fb="http://ogp.me/ns/fb#" dir="ltr" draggable="false" is-ie="false" id="clx">
<!--<![endif]-->
    <head>
        <title>C'est Lux</title>
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

        <meta property="og:site_name" content="C'est Lux"/>
        <meta property="og:url" content="https://www.cestlux.it"/>
        <meta property="og:image" content="http://www.scrapp.co.uk/images/fb_icon_325x325.png"/>
        <meta property="og:locale" content="en_GB"/>
        
        <meta name="twitter:card" content="true"/>
        <meta name="twitter:title" content="C'est Lux">
        <meta name="twitter:site" content="@cestlux"/>
        <meta name="twitter:description" content="Luxury Moods & Outlet Corner."/>
        <link href="../assets/css/clx.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
        <script src="../assets/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="//www.gstatic.com/external_hosted/modernizr/modernizr.js" type="text/javascript" charset="utf-8"></script>
        <script charset="utf-8" type="text/javascript">
            window.onload=function(){console.log(""+ +new Date+": Onload fired")},document.onreadystatechange=function(){console.log(""+ +new Date+": Ready state changed"),"loading"==document.readyState?$(".ppp").css({visibility:"visible"}):"complete"==document.readyState&&$(".ppp").fadeOut(3400)};
        </script>
    </head>
    <body class="home">
        <main class="container-fluid">
            <div class="ppp"><div class="scroller"></div></div>
            <loading><?php echo LOADING; ?></loading>
            <section class="hs clearfix" id="home">
                <svg viewBox="0 0 1280 70" preserveAspectRatio="none" class="l_tile" id="home_l" fill="#F7DB56">
                    <defs>
                        <linearGradient id="MyGradient">
                            <stop offset="20%"  stop-color="rgb(255, 83, 13)" />
                            <stop offset="80%" stop-color="#fafafa" />
                        </linearGradient>
                    </defs>
                    <polygon points="0 0 1280 70 0 70" fill="transparent"></polygon>
                    <rect fill="url(#MyGradient)" x="10" y="10" width="100" height="100" transform="translate(100, 100) rotate(45 60 60)" />
                </svg>
                <div class="button-ecommerce" id="init-ec">
                    <span><font style="font-family: 'Petit Formal Script', cursive;"><i>c'est lux</i></font> <br /><br /><a href="https://cestlux.localhost.local/private/eplatform/front-end/clx.shop.php">shop</a></span>
                    <!--
                    <svg viewBox="0 0 1280 70" preserveAspectRatio="none" class="l_tile" id="home_l" fill="white">
                        <polygon points="0 38 1100 70 0 70" fill="white"></polygon>
                        <text y="5" id="lang" class="lang" text-anchor="middle" alignment-base="central"><br ><u lsg>IT</u>&nbsp;&middot;&nbsp;<u lsg selected>EN</u>&nbsp;&middot;&nbsp;<u lsg>FR</u>&nbsp;&middot;&nbsp;<u lsg>ES</u></text>
                    </svg>
                    -->
                </div>
                <div class="clx-short-description">
                    <blockquote class="blockquote" style="font-size: 14.5pt;color: burlywood;font-weight:700">
                        Fashion is a language. Some know it, some learn it, some never will - like an instinct.
                        <footer style="color: #DAC3DE;"><cite title="Edith Head">Edith Head</cite></footer>
                    </blockquote>
                </div>
                <img class="logo" src="../assets/img/logocestlux-noclx.png" alt="Logo C'est Lux'">
                <span style="display: none !important" class="about-us-btn"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                <svg viewBox="0 0 1280 70" preserveAspectRatio="none" class="l_tile" id="home_r" fill="blue"><polygon points="1280 0 1280 70 0 70" fill="rgb(34,34,34)"></polygon></svg>
                <aside>
                    <div>
                       <span><font style="font-size:44pt">luxury moods<br /><small>&</small><br />outlet corner</font></span>
                       <div style="display: none">
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
                        <address>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Via dei Serragli 74R</p>
                            <p>50124 Firenze, ITALY</p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Tel +39 055280464</p>
                            <p><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;shop@celux.it&nbsp;&middot;&nbsp;<i class="fa fa-instagram" aria-hidden="true"></i>&nbsp;@cestlux&nbsp;&middot;&nbsp;<i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;/cest-lux</p>
                        </address>
                       </div> 
                    </div>
                </aside>
                <clx-eplatform style="transform:matrix(1, 0, 0, 1, 0, 0)"></clx-eplatform>
            </section>
            <section style="display: none !important" class="about-us hs" id="about-us">
                <div class="au-descr">
                    <p><?php echo HOME_ABOUT_US; ?></p>
                </div>
                <span class="cpt-brand-clx">c'est lux</span>
            </section>
        </main>
        <script src="../assets/js/clx.js"></script>
    </body>
</html>