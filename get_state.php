<?php
//session_start();
include_once('dis-setting/connection.php');
date_default_timezone_set('Asia/Kolkata');

if(isset($_POST["country"])){
    // Capture selected country
    $country = $_POST["country"];
    
    $countrydata = "SELECT * FROM countries_db WHERE name='$country'";
    $query_countyvl = $contdb->query($countrydata);
    while($row_countval = $query_countyvl->fetch_array()){
    	$get_count_id = $row_countval['id'];
    }
    // Define country and city array
   $sql = "SELECT * FROM states WHERE country_id='$get_count_id' ORDER BY name ASC";
	$qry = mysqli_query($contdb,$sql);
	while($row = mysqli_fetch_assoc($qry)){
		echo $resultset = '<option value="'.$row['name'].'">'.$row['name'].'</option>';
	}
}

if(isset($_POST["countrychage"])){
    // Capture selected country
    $countryvale = $_POST["countrychage"];
    $customeid = $_POST["Custyomeval"];
    $countrydata = "SELECT * FROM countries_db WHERE name='$countryvale'";
    $query_countyvl = $contdb->query($countrydata);
    while($row_countval = $query_countyvl->fetch_array()){
    	$get_count_id = $row_countval['id'];
    }
    echo $get_count_id;
    // Define country and city array
   	$sqlcount = "SELECT * FROM states WHERE country_id='$get_count_id' ORDER BY name ASC";
	$qrycountyr = $contdb->query($sqlcount);
	while($rowcounty = $qrycountyr->fetch_array()){
		echo $resultsetval = '<option value="'.$rowcounty['name'].'">'.$rowcounty['name'].'</option>';
		//echo $rowcounty['name'];
	}
}

if(isset($_POST["namecountry"])){
    // Capture selected country
    $countryname = explode('|', $_POST["namecountry"]);
    $countvale = $countryname[0];
    // Define country and city array
    $countrydata = "SELECT * FROM countries_db WHERE name='$countvale'";
    $query_countyvl = $contdb->query($countrydata);
    while($row_countval = $query_countyvl->fetch_array()){
    	$get_count_id = $row_countval['id'];
    }
   $sqlcountu = "SELECT * FROM states WHERE country_id='$get_count_id' ORDER BY name ASC";
	$qryvale = mysqli_query($contdb,$sqlcountu);
	while($rowvlaue = mysqli_fetch_assoc($qryvale)){
		echo $resultsetvale = '<option value="'.$rowvlaue['name'].'">'.$rowvlaue['name'].'</option>';
	}
}

if(isset($_POST['statecode'])){
	$get_state_vale = $_POST['statecode'];

	$get_stateselect = "SELECT * FROM states WHERE name='$get_state_vale' ORDER BY name ASC";
	$query_sateval = $contdb->query($get_stateselect);
	if($query_sateval->num_row > 0){
		echo $rowvalegetcode = "";
	}else{
		while($rpwselectvale = $query_sateval->fetch_array()){
			echo $rowvalegetcode = $rpwselectvale['name'];
		}
	}
}
?>