<?php 
//CUSTOM RH CONTACT FORM
//Jay Clark @ Pivvt Media

if($_POST){

//DEFINE SOME VARS
	$to = 'jaycameronclark@gmail.com';
  $subject = 'RH Contact Form Submission';

	$name = $_POST['name'];
	$email = $_POST['email'];
	$country = $_POST['country'];
	$message = $_POST['message'];
	$honey = $_POST['honey'];
	

		//CHECK FIELDS HAVE CONTENT
		if( empty($name) || empty($country) || empty($email) || empty($message) ) {
			die(msg(0,"All the fields are required."));
		}

		//VALIDATE EMAIL
		if(!(preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $email))){
			die(msg(0,"You haven't provided a valid email address."));
		}

		//CHECK THE HONEYPOT
		if($honey) {
			die(msg(0,"You are a gutless robot."));
		}

		// IF CHECKS OUT, SEND IT
		else {
			$header = "From: $name <$email>";
			$content = "Details: $country";
		  $sent = mail( $to, $subject, $message, $header, $content );
		}
		//SUCCESS CALLBACK
	  if($sent){
	  	die(msg(1,"Thanks for contacting us. We'll be in touch shortly!"));
	  }

}
//RETURN MSG STRING TO JSON
function msg($status,$text) {
	$response = array('status'=>$status,'message'=>$text);
	return json_encode($response);
} 

?>