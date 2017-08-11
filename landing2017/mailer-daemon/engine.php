<?php

if($_GET)

{

	$to_email = "edoardomarsili@outlook.com"; //Recipient email, Replace with own email here

	

	//check if its an ajax request, exit if not

	/*

    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {

		

		$output = json_encode(array( //create JSON data

			'type'=>'error', 

			'text' => 'Sorry Request must be Ajax POST'

		));

		die($output); //exit script outputting json data

    } 

	*/

	// Get user data and sanitize
	$user_name = filter_var($_POST["clx-lName"], FILTER_SANITIZE_STRING);
    $user_surname = filter_var($_POST["clx-lSurName"], FILTER_SANITIZE_STRING);
	$user_gender = filter_var($_POST["clx-l_gender"], FILTER_SANITIZE_STRING);
	$user_email = filter_var($_POST["clx-lMail"], FILTER_SANITIZE_EMAIL);

	//proceed with PHP email.
	$headers = 'MIME-Version: 1.0' . "\r\n" .
	'Content-type:text/html;charset=UTF-8' . "\r\n" .
    'From: '.$user_name.'' . "\r\n" .
	'Reply-To: '.$user_email.'' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

    //email subject
    $subject = "You have recieved an enquiry from ".$user_name." <".$user_email.">";

	//email body
	$message_body = include_once("http://212.237.16.27/landing2017/email-template.html");

	$send_mail = mail($to_email, $subject, $message_body, $headers);

/*
    if(!$send_mail){
		//If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
		$output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
		die($output);
	} else {
        //proceed with PHP email.
        $info_ictx = "info@intercomtexuk.com";
        $response_headers = 'MIME-Version: 1.0' . "\r\n" .
        'Content-type:text/html;charset=UTF-8' . "\r\n" .
        'From: '.$info_ictx.'' . "\r\n" .
        'Reply-To: '.$info_ictx.'' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        //email subject
        $response_subject = "Hi ".$user_name.", we have received your enquiry";

        //email body
        $response_message_body = "Hi <b>".$user_name."</b>,<br /><br />The ".date("d-m-Y")." we have received your enquiry.<br /><br />Body of the message:<p><i>".$message."</i></p><p>Number left: ".$customer_left_number."</p><p>Thankyou for your enquiry, we will get back to you A.S.A.P.</p>Yours sincerely,<br />-Intercomtexuk<br />Email: info@intercomtexuk.com<br />Phone: +44 (0) 1753 754884";

        $send_response_mail = mail($user_email, $response_subject, $response_message_body, $response_headers);

        if(!$send_response_mail) {
            //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
            $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
            die($output);
        } else {

            $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_name .' Thank you for your email'));

		    die($output);

        }
	}
	*/

	if(!$send_mail){
		//If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
		$output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
		die($output);
	} else {
		echo "yay";
	}
}

?>