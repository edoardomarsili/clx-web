<?php

/* 
* name: PHP Language script
* property: Concept FBO S.r.l.
*
* variables:
*   table
*   fields
*   values
*   db
*
* url: https://$_SERVER['SERVER_NAME']/private/secure/sql/insert.sql.php?insert-db=$db&insert-table=$table&insert-fields=$fields&insert-values=$values
*/

if ($_SESSION[lang] == "") {
    $_SESSION[lang] = "en";
    $currLang = "en";
} else {
    $currLang = $_GET[lang];
    $_SESSION[lang] = $currLang;
}
switch($currLang) {
    case "en":
        define("CHARSET","UTF-8");
        define("LANGCODE", "en");
    break;
    case "it":
        define("CHARSET","UTF-8");
        define("LANGCODE", "it");
    break;
    default:
        define("CHARSET","UTF-8");
        define("LANGCODE", "en");
    break;
  }

header("Content-Type: text/html;charset=".CHARSET);
header("Content-Language: ".LANGCODE);

?>