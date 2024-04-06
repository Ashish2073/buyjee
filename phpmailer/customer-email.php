<?php
	$to = $email;

	//$subject = $fname.'-'.$lname." You are now an official Gallery La La customer.";
	$subject = "Gallery La La Signup";

	$from = "no-reply@jioitservices.com";

	// To send HTML mail, the Content-type header must be set

	$headers  = 'MIME-Version: 1.0' . "\r\n";

	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	 

	// Create email headers

	$headers .= 'From: no-reply@jioitservices.com'."\r\n".

	$headers .= 'CC: no-reply@jioitservices.com'."\r\n".



	'X-Mailer: PHP/' . phpversion();



	$message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

	<html xmlns='http://www.w3.org/1999/xhtml'>

	<head>

	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

	<title>Gallery La La</title>

	<meta name='viewport' content='width=device-width, initial-scale=1.0'/>

	</head>

	<body style='margin: 0; padding: 0;'>

	    <table border='0' cellpadding='0' cellspacing='0' width='100%'> 

	        <tr>

	            <td style='padding: 10px 0 30px 0;'>

	                <table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border: 1px solid #cccccc; border-collapse: collapse;'>

	                    <tr>

	                        <td align='center' bgcolor='#0fa8ae' style='padding: 40px 0 30px 0; color: #FFF; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;'>

	                            <img src='https://jioitservices.com/multi_vendor/images/2042928033.png' alt='Gallery La La Logo' width='300' height='230' style='display: block;' />

	                        </td>

	                    </tr>

	                    <tr>

	                        <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>

	                            <table border='0' cellpadding='0' cellspacing='0' width='100%'>

	                                <tr>

	                                    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 20px; padding-bottom: 5px;'>

	                                        Dear<b> ".$fname." ".$lname.",</b><br/><br/>

	                                    </td>

	                                </tr>

	                                <tr>

	                                    <td style='padding: 0px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 30px;'>

	                                        Thank you for signing up. Your Gallery La La account is now registered. <br/><br/>

	                                        See wonderful products created by a select group of independent brands - <a href='https://jioitservices.com/multi_vendor/'>SHOP NOW.</a><br/>

	                                        We look forward to sending you news and specials offers in the near future.<br/><br/>

	                                        Regards,<br/>
	                                        Gallery La La.
	                                    </td>

	                                </tr>

	                            </table>

	                        </td>

	                    </tr>

	                    <tr>

	                        <td bgcolor='#0fa8ae' style='padding: 30px 30px 30px 30px;'>

	                            <table border='0' cellpadding='0' cellspacing='0' width='100%'>

	                                <tr>

	                                    <td style='color: #ffffff; font-family: Arial, sans-serif; font-size: 14px; text-align:center;' width='100%'>

	                                        &copy;2021 Gallery La La LLC. All Rights Reserved.

	                                    </td>

	                                </tr>

	                            </table>

	                        </td>

	                    </tr>

	                </table>

	            </td>

	        </tr>

	    </table>

	</body>

	</html>";

	// Sending email

	mail($to, $subject, $message, $headers);
?>