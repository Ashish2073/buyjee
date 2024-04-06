<?php
$shrevarmail = "http://magicbyteprojects.com/wp_php/gallerylala/phpmailer/mail?type=vendor&emailid=rahul@magicbytesolutions.com&nameget=Rahul";
// Initialize a CURL session. 
$ch = curl_init();  
  
// Return Page contents. 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  
//grab URL and pass it to the variable. 
curl_setopt($ch, CURLOPT_URL, $shrevarmail); 
  
$result = curl_exec($ch);

?>