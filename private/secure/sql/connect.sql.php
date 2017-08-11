<?=

/* 
* name: PHP MySql Connect
* property: Concept FBO S.r.l.
*/

include($_SERVER['SERVER_NAME']."/private/secure/php/http-header.php");

$host = "localhost";
$username = "root";
$password = "_clxSQLm1_dcit1";
$db = "clx_db";

$connection = new mysqli($host, $username, $password, $db);

// Check connection
if ($connection->connect_errno > 0){
  echo "Failed to connect to MySQL: " . $connection->connect_error;
    die();
}