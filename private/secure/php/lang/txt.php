<?php

function defineStrings() {
    switch($_SESSION[lang]) {
        case "it":
            include("https://cestlux.localhost.local/lang/clx.it.php");
        break;
        case "en":
            include("https://cestlux.localhost.local/lang/clx.en.php");
        break;
        case "fr":
            include("https://cestlux.localhost.local/lang/clx.fr.php");
        break;
        default:
            include("https://cestlux.localhost.local/lang/clx.en.php");
        break;
    }
}

?>