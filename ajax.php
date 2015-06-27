<?php
if(isset($_POST)){
	include "config.php";
	if($_POST['email']){
		/*email to subscribers*/
		$toEmail=$_POST['email'];
		$html="
			$_emailSalutation,<br>
			$_emailMessage<br><br>
			$_emailFooter,<br>
			$_fromName<br><br>
			$footerMessage
		";
		
		$headers = "Content-type: text/html" . "\r\n";
		$headers .= "From: ".$_fromName." <".$_fromEmail.">". "\r\n";
		echo mail($toEmail, $_emailSubject, $html, $headers);

		/*email to admin*/
		$subject="You got a new subscriber, $toEmail";
		$html="
			Dear Admin,<br>
			You got a new subscriber. Subscriber's email id is $toEmail<br><br>
			$footerMessage
		";
		
		$headers = "Content-type: text/html" . "\r\n";
		$headers .= "From: $_fromName <$_fromEmail>". "\r\n";
		echo mail($_toEmail, $subject, $html, $headers);

	}
}