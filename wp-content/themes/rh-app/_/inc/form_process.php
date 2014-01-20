<?php 
//CUSTOM RH CONTACT FORM
//Jay Clark @ Pivvt Media

if(isset($_POST['email'])) {

//DEFINE SOME VARS
	$to = 'jaycameronclark@gmail.com';
  $subject = 'RH Contact Form Submission';

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$country = $_POST['country'];
	$comments = $_POST['comments'];
	

		//CHECK FIELDS HAVE CONTENT
		if( empty($name) || empty($phone) || empty($country) || empty($email) || empty($comments) ) {
			die(msg(0,"All the fields are required."));
		}

		//VALIDATE EMAIL
		if(!(preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $email))){
			die(msg(0,"You haven't provided a valid email address."));
		}

		// IF CHECKS OUT, SEND IT
		else {
			$headers = "From:" . $_POST['name'] . "(" . $_POST['email'] . ")";
			$content = "Details: $country";
		  mail( $to, $subject, $comments, $headers, $content );
		  $result = array();
			$result['status'] = 'success';
			$result['message'] = 'Thanks for contacting us. We will be in touch shortly';
			header("Content-Type: application/json; charset=utf-8", true);
			echo json_encode($result);
		}

}
//RETURN MSG STRING TO JSON
function msg($status,$text) {
	$response = array('status'=>$status,'message'=>$text);
	return json_encode($response);
} 

?>