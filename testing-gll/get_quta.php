<?php
include_once("url.php");
include_once("dang_db.php");
if(isset($_POST["pidvale"])){
    // Capture selected country
    $country = $_POST["pidvale"];
    $explodqua = explode('|', $country);
    $explodvaluquta = $explodqua[2];
     
    // Define country and city array
   $sql = "SELECT * FROM client_proj_detail WHERE client_p_d_id='$explodvaluquta'";
	$qry = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($qry)){
		$resultset = $row['client_p_d_cpi'];
	}
	for($xquta = 1; $xquta <= $resultset; $xquta++) {
        echo $qutavale = "<option value='$xquta'>$xquta</option>";
    }
}
?>