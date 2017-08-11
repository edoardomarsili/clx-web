<?=

/* 
* name: PHP MySql INSERT
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

require_once("connect.sql.php");

$table = $_GET['insert-table'];
$fields = $_GET['insert-fields'];
$values = $_GET['insert-values'];
$db = $_GET['insert-db'];

if(isset($table) && isset($db) && !empty($table) && !empty($db)){
$sql = <<<SQL
    SELECT *
    FROM clx_users ($fields)
    VALUES ($values) 
SQL;

    if(!$result = $connection->query($sql)){
        die('There was an error running the query [' . $connection->error . ']');
    } else {
        echo "Added 1 record.";
    }
} elseif(isset($table) && isset($db) || empty($table) || empty($db)) {
    echo "Canno't keep table and db variables empty.";
        die();
} elseif(!isset($table) && !isset($db)){
    echo "Please specify table and db variables.";
        die();
}