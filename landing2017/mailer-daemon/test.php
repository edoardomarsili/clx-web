<?php  

$host = "31.14.134.183";
$username = "root";
$password = "_clxSQLm1_dcit1";
$db = "clx_db";

$connection = new mysqli($host, $username, $password, $db);

// Check connection
if ($connection->connect_errno > 0){
  echo "Failed to connect to MySQL: " . $connection->connect_error;
    die();
} else {
    echo("connected");
}

// First check and insert in DB (clx_launch)
// then send mail

$clx_launch_customerExists = <<<SQL
SELECT *
FROM clx_launch
WHERE uemail = '$_POST[email]'
SQL;

/* insert into db */

if(!$result = $connection->query($clx_launch_customerExists)){
    die("aww snap");
} else {
    $rowcount = mysqli_num_rows($result);
    if($rowcount == 1){
        echo "user exists";
    } else {
        // Get clients' IP
        // Function to get the client IP address
        function get_client_ip() {
            $ipaddress = '';
            if (isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $ipaddress = 'UNKNOWN';
            return $ipaddress;
        }

        $clientip = get_client_ip();

        // insert into db and send mail
        $clx_launch_customerInsert = "INSERT INTO clx_launch (uname, usurname, uemail, ugender, ureferred_who, uip) VALUES ('$_POST[name]', '$_POST[surname]', '$_POST[email]', '$_POST[gender]', 0, '$clientip')";

        if ($connection->query($clx_launch_customerInsert) === TRUE) {
            $to = $_POST['email'];
            $subject = "We are on the way. This is your 20% off to start with.";
            $body = "This is a funny test.";

            $headers = 'MIME-Version: 1.0' . "\r\n" .
                'Content-type:text/html;charset=UTF-8' . "\r\n" .
                'From: cestlux <shop@cestlux.it>' . "\r\n" .
                'Reply-To: shop@cestlux.it';


            /* testing purposes */
            $data = array('name' => $_POST['name'], 'surname' => $_POST['surname'], 'email' => $_POST['email'], 'gender' => $_POST['gender']);

            $ch = curl_init("http://212.237.16.27/landing2017/email-template.php");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $content = curl_exec($ch);
            curl_close($ch);

            /*
            $content = file_POST_contents("http://212.237.16.27/landing2017/email-template.html", true);
            */

            $sendmail = mail($to, $subject, $content, $headers);

            if(!$sendmail){
                $output = json_encode(array('type'=>'error', 'text' => 'Had an issue'));
                return $output;
            } else {
                $output = json_encode(array('type'=>'message', 'text' => 'Thank you for your email'));
                return $output;
            }
        } else {
            echo "Error: " . $clx_launch_customerInsert . "<br>" . $connection->error;
        }
    }
}

?>
