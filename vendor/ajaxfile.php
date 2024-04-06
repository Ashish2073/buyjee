<?php

include_once __DIR__."/directory/url.php";

include_once __DIR__."/functions.php";



$url = get_template_directory();

$homeUrl = get_template_directory_main();





/*print_r($_FILES);

print_r($_POST);*/


$folder_path = realpath(dirname(__FILE__));
$explode_path = explode('/vendor', $folder_path);
$echozeo = $explode_path[0];
// Product File Upload

if(isset($_POST['pf_upload'])){

	$valid_extensions = array( 'pdf' , 'docx' , 'xlsx', 'csv');

	$path = '$echozeo/assets/images/vendorProductFiles/';



	$filename = $_FILES['productFileName']['name'];

	$tmp = $_FILES['productFileName']['tmp_name'];



	$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));



	$vendorId = $_POST['vendorId'];

	

	$prodUrl = $_POST['productUrl'];

	$uploadDate = date('Y-m-d');

	$uploadTime = date('H:i A');

	if(!empty($filename)){

		$final_image = rand(1000,1000000).$filename;

		if(in_array($ext, $valid_extensions)){

			$path = $path.strtolower($final_image);

			if(move_uploaded_file($tmp, $path)){

				$insert = vendorFileInsert($vendorId, $final_image, $prodUrl, $uploadDate, $uploadTime);

				if($insert == true){

					echo 0;

				}

			}else{

				echo 1; //file not moved

			}

		}else{

			echo 2; //file extension wrong

		}

	}else{

		$final_image = '';

		$insert = vendorFileInsert($vendorId, $final_image, $prodUrl, $uploadDate, $uploadTime);

		if($insert == true){

			echo 3; //if only url inserting

		}

	}



}



// ============================================================== //

// ============== Vendor Media Section ========================== //

// ============================================================== //



// Banner File Upload

if(isset($_POST['bnr_upload']) && $_POST['bnr_upload'] == 'banner_upload'){

	$valid_extensions = array( 'jpg', 'jpeg', 'gif', 'png');

	$path = "$echozeo/assets/images/store-slider/";

	$filename = $_FILES['bannerFileName']['name'];

	$tmp = $_FILES['bannerFileName']['tmp_name'];

	$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

	$vendorId = $_POST['vendorId'];

	$type = 'vendor';

	$uploadDate = date('Y-m-d');

	$uploadTime = date('H:i A');

	if(!empty($filename)){

		$final_image = rand(1000,1000000).str_replace(" ","_", $filename);

		if(in_array($ext, $valid_extensions)){

			$path = $path.strtolower($final_image);

			if(move_uploaded_file($tmp, $path)){

				$insert = bannerFileInsert($vendorId, $type, $final_image, $uploadDate, $uploadTime);

				if($insert == true){

					echo 0;

				}

			}else{

				echo 1; //file not moved

			}

		}else{

			echo 2; //file extension wrong

		}

	}else{

			echo 3; //choose File

		}

}

// banner Edit

if(isset($_POST['bnr_edit']) && $_POST['bnr_edit'] == 'banner_edit'){

	$valid_extensions = array( 'jpg', 'jpeg', 'gif', 'png');

	$path = "$echozeo/assets/images/store-slider/";

	$filename = $_FILES['bannerFileName']['name'];

	$tmp = $_FILES['bannerFileName']['tmp_name'];

	$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

	

	$bannerId = $_POST['bannerId'];

	$uploadDate = date('Y-m-d');

	$uploadTime = date('H:i A');

	if(!empty($filename)){

		$final_image = rand(1000,1000000).str_replace(" ","_", $filename);

		if(in_array($ext, $valid_extensions)){

			$path = $path.strtolower($final_image);

			if(move_uploaded_file($tmp, $path)){

				$update = bannerFileUpdate($bannerId, $final_image, $uploadDate, $uploadTime);

				if($update == true){

					echo 0;

				}

			}else{

				echo 1; //file not moved

			}

		}else{

			echo 2; //file extension wrong

		}

	}else{

			echo 3; //choose File

	}

}

//banner Remove

if(isset($_POST['action']) && $_POST['action'] == 'remove'){

	$bannerID = $_POST['bnnerId'];

	$remove = bannerRemove($bannerID);

	if($remove == true){

		echo 0;

	}else{

		echo 1;

	}

}

/*===============================
        Add New Products
===============================*/
if(isset($_POST['postinmutipd'])){
	$positionpd = $_POST['postinmutipd'];
	$ipd=1;  
	foreach($positionpd as $kpd=>$vpd){
	    $sql = "UPDATE product_mutli_image SET img_postion='$ipd' WHERE id='$vpd'";  
	    $conn->query($sql);
	    $ipd++;  
	}
}
if(isset($_POST['tablevale'])){
	$valueset = $_POST['tablevale'];
	/*$explodedata = explode(',', $valueset);
	$firstvale = explode(',', $explodedata[0]);*/
	$ipddt=1;
	foreach($valueset as $mutlivalset){
		$explodesata = explode('-', $mutlivalset);
		$explodeoneval = explode(',', $explodesata[0]);
		$explodetwoval = explode(',', $explodesata[1]);
		foreach($explodeoneval as $kpdvalu=>$vpdsrt){
		    $sql = "UPDATE product_attbut_vartarry SET prot_trm_postion='$ipddt' WHERE id='$vpdsrt'";  
		    $conn->query($sql);
		}

		$ipddttwo=1;
		foreach($explodetwoval as $newval=>$vpdsrtteo){
			$sql = "UPDATE product_variationsdata SET proval_trm_postion='$ipddt' WHERE id='$vpdsrtteo'";
		    $conn->query($sql);
		}
		$ipddt++;
	}
}
if(isset($_POST['addnewvert'])){
	$vertionid = $_POST['verindid'];
	$seeionvaldid = $_POST['sessionvale'];
	$get_vertionvale = "SELECT * FROM all_product WHERE id='$seeionvaldid'";
	$queryvaleset = $conn->query($get_vertionvale);
	while($rowvalest = $queryvaleset->fetch_array()){
		$catroyvetid = $rowvalest['product_color'];
		$catroyautoid = $rowvalest['product_auto_id'];
	}
	if($_POST['vertioncehck'] == "new"){
		$seeionval = $catroyvetid;
		$sessinpld = $catroyvetid;
		$commaromve = substr($catroyvetid, 1);
	}else{
		$seeionval = $catroyvetid;
	}
	$catroyvetidarray = explode(',', $catroyvetid);
	echo '<div class="datarow insert-val">';
	echo '<div class="card-header" role="tab" id="heading-A"><div class="row">';
		$chkingselectvale = "SELECT * FROM product_active_attbut WHERE attbut_productid='$sessinpld' OR attbut_productid='$catroyautoid' OR attbut_productid='$commaromve'";
		$chkingqeuy = $conn->query($chkingselectvale);
		if($chkingqeuy->num_rows > 0){
			$get_main_attbut = "SELECT * FROM product_active_attbut WHERE attbut_productid='$sessinpld' OR attbut_productid='$catroyautoid' OR attbut_productid='$commaromve'";
			$queryatbutmain = $conn->query($get_main_attbut);
			while($rowgetmainabtu = $queryatbutmain->fetch_array()){
				$get_sizevale = $rowgetmainabtu['attbut_id'];

				$get_nameabbut = "SELECT * FROM product_attbut WHERE id='$get_sizevale'";
				$queyvalabbut = $conn->query($get_nameabbut);
				while($rowgetabbutnae = $queyvalabbut->fetch_array()){
					$get_abbutname = $rowgetabbutnae['pd_attbut_name'];

	                  	echo '<div class="col-md-3 form-group"><select class="attbuteval form-control" name="getattbutedit[]" data-id="'.$vertionid.'" required>
	                  		<option value="">Select '.$get_abbutname.'</option>';

	                  	$vertionvalue = "SELECT * FROM product_attbut_vartarry WHERE id='$vertionid'";
	                  	$get_queryverval = $conn->query($vertionvalue);
	                  	while($rowverdata = $get_queryverval->fetch_array()){
	                  		$get_vertionterid = explode(',', $rowverdata['prot_trm_id']);
	                  	}
	                  	foreach ($get_vertionterid as $termavertinovalue) {
	                  		$get_vertionvaledata = "SELECT * FROM product_variationsdata WHERE id='$termavertinovalue'";
	                  		$querytreamval = $conn->query($get_vertionvaledata);
	                  		while ($rowget_showvale = $querytreamval->fetch_array()) {
	                  			$get_tramvalename[] = $rowget_showvale['proval_trm_value'];
	                  		}
	                  	}
	                  	//print_r($get_tramvalename);
	                  	//echo $sessinpld;
	                  	//echo $get_sizevale;
	              		$get_termvaleu = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='$sessinpld' AND proval_trm_attid='$get_sizevale' OR proval_trm_seeionid='$catroyautoid' AND proval_trm_attid='$get_sizevale' OR proval_trm_seeionid='$commaromve' AND proval_trm_attid='$get_sizevale'";
						$queryvaldatul = $conn->query($get_termvaleu);
						while($rowvaltrmval = $queryvaldatul->fetch_array()){
							if(in_array($rowvaltrmval['proval_trm_value'],$get_tramvalename)){
								echo '<option value="'.$rowvaltrmval['id'].'" selected>'.$rowvaltrmval['proval_trm_value'].'</option>';
							}else{
								echo '<option value="'.$rowvaltrmval['id'].'">'.$rowvaltrmval['proval_trm_value'].'</option>';
							}
						}

	                echo '</select></div>';
				}
			}
		}else{
			foreach($catroyvetidarray as $valueset){
			$get_main_attbut = "SELECT * FROM product_active_attbut WHERE attbut_productid='$sessinpld' OR attbut_productid='$catroyautoid' OR attbut_productid='$commaromve' OR attbut_productid='$valueset'";
				$queryatbutmain = $conn->query($get_main_attbut);
				while($rowgetmainabtu = $queryatbutmain->fetch_array()){
					$get_sizevale = $rowgetmainabtu['attbut_id'];

					$get_nameabbut = "SELECT * FROM product_attbut WHERE id='$get_sizevale'";
					$queyvalabbut = $conn->query($get_nameabbut);
					while($rowgetabbutnae = $queyvalabbut->fetch_array()){
						$get_abbutname = $rowgetabbutnae['pd_attbut_name'];

		                  	echo '<div class="col-md-3 form-group"><select class="attbuteval form-control" name="getattbutedit[]" data-id="'.$vertionid.'" required>
		                  		<option value="">Select '.$get_abbutname.'</option>';

		                  	$vertionvalue = "SELECT * FROM product_attbut_vartarry WHERE id='$vertionid'";
		                  	$get_queryverval = $conn->query($vertionvalue);
		                  	while($rowverdata = $get_queryverval->fetch_array()){
		                  		$get_vertionterid = explode(',', $rowverdata['prot_trm_id']);
		                  	}
		                  	foreach ($get_vertionterid as $termavertinovalue) {
		                  		$get_vertionvaledata = "SELECT * FROM product_variationsdata WHERE id='$termavertinovalue'";
		                  		$querytreamval = $conn->query($get_vertionvaledata);
		                  		while ($rowget_showvale = $querytreamval->fetch_array()) {
		                  			$get_tramvalename[] = $rowget_showvale['proval_trm_value'];
		                  		}
		                  	}
		                  	//print_r($get_tramvalename);
		                  	//echo $sessinpld;
		                  	//echo $get_sizevale;
		              		$get_termvaleu = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='$sessinpld' AND proval_trm_attid='$get_sizevale' OR proval_trm_seeionid='$catroyautoid' AND proval_trm_attid='$get_sizevale' OR proval_trm_seeionid='$commaromve' AND proval_trm_attid='$get_sizevale' OR  proval_trm_seeionid='$valueset' AND proval_trm_attid='$get_sizevale'";
							$queryvaldatul = $conn->query($get_termvaleu);
							while($rowvaltrmval = $queryvaldatul->fetch_array()){
								if(in_array($rowvaltrmval['proval_trm_value'],$get_tramvalename)){
									echo '<option value="'.$rowvaltrmval['id'].'" selected>'.$rowvaltrmval['proval_trm_value'].'</option>';
								}else{
									echo '<option value="'.$rowvaltrmval['id'].'">'.$rowvaltrmval['proval_trm_value'].'</option>';
								}
							}

		                echo '</select></div>';
					}
				}
			}
		}
	echo '</div></div>';
	$get_vertiondata = "SELECT * FROM product_attbut_vartarry WHERE id='$vertionid'";
	$query_vertdata = $conn->query($get_vertiondata);
	while ($row_get_vertion = $query_vertdata->fetch_array()) {
		$get_trem_regulpric = $row_get_vertion['prot_trm_regulprc'];
		$get_trem_saleprc = $row_get_vertion['prot_trm_saleprc'];
		$get_trem_quntityval = $row_get_vertion['prot_trm_quantity'];
		$get_trem_lowstock = $row_get_vertion['prot_trm_lowstck'];
	echo '<div class="card-body">
             <div class="data-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Regular Price ($)</label>
                                    <input type="hidden" id="vertinid" value="'.$vertionid.'">
                                    <input type="text" class="form-control updateregul" name="regpricever" data-id="'.$vertionid.'" value="'.$get_trem_regulpric.'">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Sale Price ($)</label>
                                    <input type="text" class="form-control upatesale" name="salepricever" data-id="'.$vertionid.'" value="'.$get_trem_saleprc.'">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" class="form-control updatequant" name="quantyver" data-id="'.$vertionid.'" value="'.$get_trem_quntityval.'">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>Low stock threshold</label>
                                    <input type="number" class="form-control updatelowstok" name="updatelowstok" data-id="'.$vertionid.'" value="'.$get_trem_lowstock.'">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>';
    }
    echo '</div>';
}
if(isset($_POST['removeabut'])){
	$get_vartionvae = explode('|', $_POST['abutid']);
	$get_autid = $get_vartionvae[0];
	$get_mainid = $get_vartionvae[1];
	$get_mainidsize = $get_vartionvae[2];

	$deletevale = DeleteALlDataVlae("product_active_attbut","id='$get_mainid' AND attbut_productid='$get_autid'");
	$deletevalesecond = DeleteALlDataVlae("product_variationsdata","proval_trm_attid='$get_mainidsize' AND proval_trm_seeionid='$get_autid'");
	echo 0;
}

?>