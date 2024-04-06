<?php

include_once('dis-setting/connection.php');

$getmailjt = "SELECT * FROM emailsendata WHERE emailsd_type='$get_val_form'";

$query_dataval = mysqli_query($contdb,$getmailjt);

while($rowdataval = mysqli_fetch_array($query_dataval)){

	$show_type_data = $rowdataval['emailsd_type'];

	$show_data_title = $rowdataval['emailsd_title'];

	$show_data_text = $rowdataval['emailsd_destext'];

	$show_data_ft_one = $rowdataval['emailsd_footer_one'];

	$show_data_ft_two = $rowdataval['emailsd_footer_two'];

	$show_data_ft_three = $rowdataval['emailsd_footer_three'];

	$show_data_copyright = $rowdataval['emailsd_compyright'];

	$show_data_ccval = $rowdataval['emailsd_cc'];

	$show_data_from = $rowdataval['emailsd_from'];

	$show_data_subjt = $rowdataval['emailsd_subjt'];



	if($show_type_data == "vendor"){



		$to = $get_name_form;

		$subject = $show_data_subjt;

		$from = $show_data_from;

		 

		// To send HTML mail, the Content-type header must be set

		$headers  = 'MIME-Version: 1.0' . "\r\n";

		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		 

		// Create email headers

		$headers .= 'From: '.$from."\r\n".

		$headers .= 'CC: '.$show_data_ccval."\r\n".



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

		                            <img src='".$url."/assets/images/logo.png' alt='Gallery La La Logo' width='300' height='230' style='display: block;' />

		                        </td>

		                    </tr>

		                    <tr>

		                        <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>

		                            <table border='0' cellpadding='0' cellspacing='0' width='100%'>

		                                <tr>

		                                    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px; padding-bottom: 30px; text-align: center;'>

		                                        <b>".$show_data_subjt."</b>

		                                    </td>

		                                </tr>

		                                <tr>

		                                    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 20px; padding-bottom: 5px;'>

		                                        Hello<b> ".$get_name.",</b>

		                                    </td>

		                                </tr>

		                                <tr>

		                                    <td style='padding: 0px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 30px;'>

		                                        ".$show_data_title."<br/>

		                                        ".$show_data_text."<br/>

		                                        ".$show_data_ft_one."<br/>

		                                        ".$show_data_ft_two."<br/>

		                                        ".$show_data_ft_three."<br/>

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

		                                        &copy;2022 Gallery La La LLC. All Rights Reserved.<br/>

		                                        <a href='".$url."/' style='color: #ffffff; margin-right: 15px;'><font color='#ffffff'>Home</font></a>

		                                        <a href='".$url."/aboutus' style='color: #ffffff; margin-right: 15px;'><font color='#ffffff'>About Us</font></a>

		                                        <a href='".$url."/contact-us' style='color: #ffffff;'><font color='#ffffff'>Contact Us</font></a>

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



		if(mail($to, $subject, $message, $headers)){



		   	$getmailjt_admin = "SELECT * FROM emailsendata WHERE emailsd_type='admin_vendor'";

			$query_dataval = mysqli_query($contdb,$getmailjt);

			while($rowdataval_admin = mysqli_fetch_array($query_dataval)){

				$show_type_data_admin = $rowdataval_admin['emailsd_type'];

				$show_data_title_admin = $rowdataval_admin['emailsd_title'];

				$show_data_text_admin = $rowdataval_admin['emailsd_destext'];

				$show_data_ft_one_admin = $rowdataval_admin['emailsd_footer_one'];

				$show_data_ft_two_admin = $rowdataval_admin['emailsd_footer_two'];

				$show_data_ft_three_admin = $rowdataval_admin['emailsd_footer_three'];

				$show_data_copyright_admin = $rowdataval_admin['emailsd_compyright'];

				$show_data_ccval_admin = $rowdataval_admin['emailsd_cc'];

				$show_data_from_admin = $rowdataval_admin['emailsd_from'];

				$show_data_subjt_admin = $rowdataval_admin['emailsd_subjt'];



		    	$to = "admin@jioitservices.com";

				$subject = $show_data_subjt_admin;

				$from = "no-reply@jioitservices.com";

				 

				// To send HTML mail, the Content-type header must be set

				$headers  = 'MIME-Version: 1.0' . "\r\n";

				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				 

				// Create email headers

				$headers .= 'From: '.$from."\r\n".

				$headers .= 'CC: '.$show_data_ccval_admin."\r\n".



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

				                            <img src='".$url."/assets/images/logo.png' alt='Gallery LaLa Logo' width='300' height='230' style='display: block;' />

				                        </td>

				                    </tr>

				                    <tr>

				                        <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>

				                            <table border='0' cellpadding='0' cellspacing='0' width='100%'>

				                                <tr>

				                                    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px; padding-bottom: 30px; text-align: center;'>

				                                        <b>".$show_data_subjt_admin."</b>

				                                    </td>

				                                </tr>

				                                <tr>

				                                    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 20px; padding-bottom: 5px;'>

				                                        Hello<b> ".$get_name.",</b>

				                                    </td>

				                                </tr>

				                                <tr>

				                                    <td style='padding: 0px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 30px;'>

				                                        ".$show_data_title_admin."<br/>
				                                        ".$show_data_text_admin."<br/>

				                                        ".$show_data_ft_one_admin."<br/>

				                                        ".$show_data_ft_two_admin."<br/>

				                                        ".$show_data_ft_three_admin."<br/>

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
														&copy;2022 Gallery La La LLC. All Rights Reserved.<br/>

				                                        <a href='".$url."/' style='color: #ffffff; margin-right: 15px;'><font color='#ffffff'>Home</font></a>

				                                        <a href='".$url."/aboutus' style='color: #ffffff; margin-right: 15px;'><font color='#ffffff'>About Us</font></a>

				                                        <a href='".$url."/contact-us' style='color: #ffffff;'><font color='#ffffff'>Contact Us</font></a>

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

				if(mail($to, $subject, $message, $headers)){

					/*echo "<script>window.close();</script>";*/

				}

			}

		}



	}elseif($show_type_data == "user"){



		$to = $get_name_form;

		$subject = $show_data_subjt;

		$from = $show_data_from;

		 

		// To send HTML mail, the Content-type header must be set

		$headers  = 'MIME-Version: 1.0' . "\r\n";

		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		 

		// Create email headers

		$headers .= 'From: '.$from."\r\n".

		$headers .= 'CC: '.$show_data_ccval."\r\n".

	

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

		                            <img src='".$url."/assets/images/logo.png' alt='Gallery LaLa Logo' width='300' height='230' style='display: block;' />

		                        </td>

		                    </tr>

		                    <tr>

		                        <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>

		                            <table border='0' cellpadding='0' cellspacing='0' width='100%'>

		                                <tr>

		                                    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px; padding-bottom: 30px; text-align: center;'>

		                                        <b>".$show_data_subjt."</b>

		                                    </td>

		                                </tr>

		                                <tr>

		                                    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 20px; padding-bottom: 15px;'>

		                                        Hello<b> ".$get_name.",</b>

		                                    </td>

		                                </tr>

		                                <tr>

		                                    <td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 30px;'>

		                                        ".$show_data_title."<br/><br/>



		                                        ".$show_data_text."<br/><br/><br/><br/>

		                                        ".$show_data_ft_one."<br/>

		                                        ".$show_data_ft_two."<br/>

		                                        ".$show_data_ft_three."<br/>

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

		                                        ".$show_data_copyright."<br/><br/>

		                                        <a href='".$url."/' style='color: #ffffff; margin-right: 15px;'><font color='#ffffff'>Home</font></a>

		                                        <a href='".$url."/aboutus' style='color: #ffffff; margin-right: 15px;'><font color='#ffffff'>About Us</font></a>

		                                        <a href='".$url."/contact-us' style='color: #ffffff;'><font color='#ffffff'>Contact Us</font></a>

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

		if(mail($to, $subject, $message, $headers)){



		    $getmailjt_admin = "SELECT * FROM emailsendata WHERE emailsd_type='admin_user'";

			$query_dataval = mysqli_query($contdb,$getmailjt);

			while($rowdataval_admin = mysqli_fetch_array($query_dataval)){

				$show_type_data_admin = $rowdataval_admin['emailsd_type'];

				$show_data_title_admin = $rowdataval_admin['emailsd_title'];

				$show_data_text_admin = $rowdataval_admin['emailsd_destext'];

				$show_data_ft_one_admin = $rowdataval_admin['emailsd_footer_one'];

				$show_data_ft_two_admin = $rowdataval_admin['emailsd_footer_two'];

				$show_data_ft_three_admin = $rowdataval_admin['emailsd_footer_three'];

				$show_data_copyright_admin = $rowdataval_admin['emailsd_compyright'];

				$show_data_ccval_admin = $rowdataval_admin['emailsd_cc'];

				$show_data_from_admin = $rowdataval_admin['emailsd_from'];

				$show_data_subjt_admin = $rowdataval_admin['emailsd_subjt'];



		    	$to = "admin@jioitservices.com";

				$subject = $show_data_subjt_admin;

				$from = "no-reply@jioitservices.com";

				 

				// To send HTML mail, the Content-type header must be set

				$headers  = 'MIME-Version: 1.0' . "\r\n";

				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				 

				// Create email headers

				$headers .= 'From: '.$from."\r\n".

				$headers .= 'CC: '.$show_data_ccval_admin."\r\n".



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

				                            <img src='".$url."/assets/images/logo.png' alt='Gallery LaLa Logo' width='300' height='230' style='display: block;' />

				                        </td>

				                    </tr>

				                    <tr>

				                        <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>

				                            <table border='0' cellpadding='0' cellspacing='0' width='100%'>

				                                <tr>

				                                    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px; padding-bottom: 30px; text-align: center;'>

				                                        <b>".$show_data_subjt_admin."</b>

				                                    </td>

				                                </tr>

				                                <tr>

				                                    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 20px; padding-bottom: 15px;'>

				                                        Hello<b> ".$get_name.",</b>

				                                    </td>

				                                </tr>

				                                <tr>

				                                    <td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 30px;'>

				                                        ".$show_data_title_admin."<br/><br/>



				                                        ".$show_data_text_admin."<br/>

				                                        ".$show_data_ft_one_admin."<br/>

				                                        ".$show_data_ft_two_admin."<br/>

				                                        ".$show_data_ft_three_admin."<br/>

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

				                                        @".$show_data_copyright_admin."<br/><br/>

				                                        <a href='".$url."/' style='color: #ffffff; margin-right: 15px;'><font color='#ffffff'>Home</font></a>

				                                        <a href='".$url."/aboutus' style='color: #ffffff; margin-right: 15px;'><font color='#ffffff'>About Us</font></a>

				                                        <a href='".$url."/contact-us' style='color: #ffffff;'><font color='#ffffff'>Contact Us</font></a>

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

				if(mail($to, $subject, $message, $headers)){

					/*echo "<script>window.close();</script>";*/

				}

			}

		}

	}

}

?>