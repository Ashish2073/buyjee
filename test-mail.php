<?php
$to = "kirkkirkpatrick3@hotmail.com";
$subject = "Your Gallery La La Order Confirmation";

$message = '<table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="padding:10px 0 30px 0"><table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border:1px solid #cccccc; border-collapse:collapse"><tbody><tr><td align="center" bgcolor="#0fa8ae" style="padding: 40px 0px 30px; color: rgb(255, 255, 255) !important; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"><img data-imagetype="External" src="https://buyjee.com/assets/images/logo.png" alt="Creating Email Magic" width="300" height="230" style="display:block"> </td></tr><tr><td bgcolor="#ffffff" style="padding:40px 30px 40px 30px"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="color: rgb(21, 54, 67) !important; font-family: Arial, sans-serif; font-size: 20px; padding-bottom: 15px;">Hello<b> Harry Kirkpatrick,</b> </td></tr><tr><td style="padding: 20px 0px 30px; color: rgb(21, 54, 67) !important; font-family: Arial, sans-serif; font-size: 16px; line-height: 30px;">Thanks for your order. Please see details below.<br aria-hidden="true"><br aria-hidden="true">------------------------------------------------------------<br aria-hidden="true"><b>Product Sku: </b>OOA00017<br aria-hidden="true"><b>Product Name: </b>Kazukazu Necktie<br aria-hidden="true"><b>Creator: </b>Olaf Olsson<br aria-hidden="true"><b>Product Price: </b>$98<br aria-hidden="true"><b>Quantity: </b>1<br aria-hidden="true"><b>Shipping Fee: </b>$12<br aria-hidden="true"><b>Transaction ID: </b> 11627173<br aria-hidden="true"><b>Sales Tax: </b> $5.88<br aria-hidden="true"><b>Total: </b> $115.88<br aria-hidden="true"><br aria-hidden="true">Your order has been placed successfully. We will update you with your orders shipping information once your order is in transit.<br aria-hidden="true"><br aria-hidden="true">Regards<br aria-hidden="true">Gallery La La<br aria-hidden="true"></td></tr></tbody></table></td></tr><tr><td bgcolor="#0fa8ae" style="padding:30px 30px 30px 30px"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td width="100%" style="color: rgb(255, 255, 255) !important; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">© 2020 Gallery La La LLC. All Rights Reserved.<br aria-hidden="true"><br aria-hidden="true"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <orders@jioitservices.com>' . "\r\n";
/*$headers .= 'Cc: myboss@example.com' . "\r\n";*/

mail($to,$subject,$message,$headers);
?>