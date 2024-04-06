<?php

include('../dis-setting/config-settings/config.php');

include('../dis-setting/config-settings/functions-board.php');



date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

$date = date('Y-m-d');

$time = date('H:i:s');

$full_path = realpath(dirname(__FILE__));

$explode_file_path = explode('/admin-manager', $full_path);

$file_path = $explode_file_path[0];
$floder_path_name = $file_path."/images";
$url = "https://www.gallerylala.com";
?>

<?php

if(isset($_POST['postchkingname'])){

	$_page_namedat = $_POST['postpahename'];

	echo "ok";

}



if(isset($_POST['page_name'])){

	$_checking_page_name = addslashes(trim($_POST['page_vale']));



	$chking_pahe_name = ChakingBlogPageTitle($_checking_page_name);

	if($chking_pahe_name == true){

		echo 1;

	}else{

		echo 2;

	}

}

if(isset($_POST['menueremove'])){
	$_remove_meuedata = $_POST['menuremveid'];

	$deletdaamenu = "DELETE FROM menudatatable WHERE id='$_remove_meuedata'";
	$qqueryelete = $contdb->query($deletdaamenu);
	echo 1;
}

if(isset($_POST['menueupdate'])){
	$get_menu_id = $_POST['menuupdveid'];
	$get_menu_valu = $_POST['menuvalue'];

	$Updatemenudata = "UPDATE menudatatable SET menu_name='$get_menu_valu' WHERE on_id='$get_menu_id'";
	$qqueryupdate = $contdb->query($Updatemenudata);
	echo 1;
}

if(isset($_POST['updatesingstatus'])){
	$sing_upstauts = explode('|', $_POST['singupdatevale']);
	$getvale = $sing_upstauts[0];
	$getmainid = $sing_upstauts[1];
	$getautoid = $sing_upstauts[2];

	$_Update_statusval = "UPDATE userpofiledatatablecont SET helar_status='$getvale' WHERE on_id='$getmainid' AND helar_auot_id='$getautoid'";
	$qury_udpatestus = $contdb->query($_Update_statusval);
	echo "1";
}

if(isset($_FILES['file']['name'])){
	$upload_image = images_upload('file');
	$insert_img = GLLImageInsertDataDl($upload_image,$_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'], "$floder_path_name/$upload_image");
	echo "0";
}

if(isset($_POST['imgdatset'])){
	$get_idimageval = $_POST['imgvaledat'];
	foreach(GLlImagesDataVale($get_idimageval) as $valeimgval){
		$imag_name = $valeimgval['image_name'];
		$imag_oldname = $valeimgval['image_old'];
		$imag_title = $valeimgval['image_title'];
		$imag_alt = $valeimgval['image_alt'];
		$imag_caption = $valeimgval['image_caption'];
		$imag_date = $valeimgval['image_date'];
		$imag_time = $valeimgval['image_time'];

		$return_arr[] = array('imgname'=>$imag_name,'imgoldnam'=>$imag_oldname,'imgtitle'=>$imag_title,'imgalt'=>$imag_alt,'imgcapt'=>$imag_caption,'imgdate'=>$imag_date,'imgtime'=>$imag_time);
	}
	echo json_encode($return_arr);
}

if(isset($_POST['deletimgset'])){
	$_delete_imgid = $_POST['imgvaledelt'];
	$deletype = "delete";
	$delet_imgname = $_POST['imgnamevale'];
	$delet_valeset = DeleteImageVale($_delete_imgid,$deletype);
	if($delet_valeset == true){
		$delete_img = $floder_path_name.'/'.$delet_imgname;
		unlink($delete_img);
	}
}

if(isset($_POST['attbutval'])){
	$_geet_value = explode('|', $_POST['attbutdata']);
	$attbut_id = $_geet_value[0];
	$attbut_name = $_geet_value[1];
	$page_id = $_POST['prod_pagid'];
	$page_autoid = $_POST['prod_pageautid'];
	$setprodet_vale = "INSERT INTO product_active_attbut(attbut_id,attbut_productid)VALUES('$attbut_id','$page_autoid')";
	$queryvalud = $contdb->query($setprodet_vale);
}

if(isset($_POST['save_attbut'])){
	$_Get_attbutname = $_POST['attbutvalue'];
	/*$get_singlval = implode(',', $_Get_attbutname);
	$explodvalvaldat = explode(',', $get_singlval);*/
	//print_r($_Get_attbutname);
	//$singlevale = $explodval[0];
	foreach($_Get_attbutname as $attbutsaveval){
		
		foreach($attbutsaveval as $vertiondataval){

			$set_explodeval = explode('|', $vertiondataval);
			$get_firstval = addslashes($set_explodeval[0]);
			$get_secondtval = $set_explodeval[1];
			$get_threeval = $set_explodeval[2];

			$checkvaledat = "SELECT * FROM product_variationsdata WHERE proval_trm_value='$get_firstval' AND proval_trm_attid='$get_secondtval' AND proval_trm_seeionid='$get_threeval'";
			$queryexloval = $contdb->query($checkvaledat);
			if($queryexloval->num_rows > 0){
			}else{
				$insert_valedata = "INSERT INTO product_variationsdata(proval_trm_value,proval_trm_attid,proval_trm_seeionid)VALUES('$get_firstval','$get_secondtval','$get_threeval')";
				$insetquery = $contdb->query($insert_valedata);
			}
		}
		//echo $get_firstval;
	}
}

if(isset($_POST['versave'])){
	$selection = $_POST['selection'];
	$implovertisave = implode(',', $selection);
	$rgprice = $_POST['reglarprice'];
	$slprice = $_POST['saleprice'];
	$quntyprc = $_POST['quntyval'];
	$lowstock = $_POST['lowstockvale'];
	if($_POST['productchk'] == "new"){
		$sessionidvale = $_POST['sessionautis'];
	}else{
		$sessionidvale = $_POST['sessionautis'];
	}
	if(count($selection) == "1"){
		$implovertisavetrem = implode(',', $selection);
	}else{
		$implovertisavetrem = implode(',', $selection);
	}
	//echo $implovertisavetrem = implode(',', $selection);
	$cehck_valt = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_id='$implovertisavetrem' AND prot_trm_prodtid='$sessionidvale'";
	$query_vale = $contdb->query($cehck_valt);
	if($query_vale->num_rows > 0){
		echo "<span class='danger'>Already Add this Variations.</span>";
	}else{
		if(in_array('0', $selection)){
			echo "<span class='danger'>Select Attributes First.</span>";
		}else{
			$update_quntyval = "INSERT INTO product_attbut_vartarry(prot_trm_id,prot_trm_regulprc,prot_trm_saleprc,prot_trm_quantity,prot_trm_prodtid,prot_trm_lowstck)VALUES('$implovertisavetrem','$rgprice','$slprice','$quntyprc','$sessionidvale','$lowstock')";
			$query_insertvale = $contdb->query($update_quntyval);
			echo "<span class='success'>Successfully Added.</span>";
		}
	}
}

if(isset($_POST['addnewvert'])){
	$vertionid = $_POST['verindid'];
	$seeionvaldid = $_POST['sessionvale'];
	$get_vertionvale = "SELECT * FROM all_product WHERE id='$seeionvaldid'";
	$queryvaleset = $contdb->query($get_vertionvale);
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
		$chkingqeuy = $contdb->query($chkingselectvale);
		if($chkingqeuy->num_rows > 0){
			$get_main_attbut = "SELECT * FROM product_active_attbut WHERE attbut_productid='$sessinpld' OR attbut_productid='$catroyautoid' OR attbut_productid='$commaromve'";
			$queryatbutmain = $contdb->query($get_main_attbut);
			while($rowgetmainabtu = $queryatbutmain->fetch_array()){
				$get_sizevale = $rowgetmainabtu['attbut_id'];

				$get_nameabbut = "SELECT * FROM product_attbut WHERE id='$get_sizevale'";
				$queyvalabbut = $contdb->query($get_nameabbut);
				while($rowgetabbutnae = $queyvalabbut->fetch_array()){
					$get_abbutname = $rowgetabbutnae['pd_attbut_name'];

	                  	echo '<div class="col-md-3 form-group"><select class="attbuteval form-control" name="getattbutedit[]" data-id="'.$vertionid.'" required>
	                  		<option value="">Select '.$get_abbutname.'</option>';

	                  	$vertionvalue = "SELECT * FROM product_attbut_vartarry WHERE id='$vertionid'";
	                  	$get_queryverval = $contdb->query($vertionvalue);
	                  	while($rowverdata = $get_queryverval->fetch_array()){
	                  		$get_vertionterid = explode(',', $rowverdata['prot_trm_id']);
	                  	}
	                  	foreach ($get_vertionterid as $termavertinovalue) {
	                  		$get_vertionvaledata = "SELECT * FROM product_variationsdata WHERE id='$termavertinovalue'";
	                  		$querytreamval = $contdb->query($get_vertionvaledata);
	                  		while ($rowget_showvale = $querytreamval->fetch_array()) {
	                  			$get_tramvalename[] = $rowget_showvale['proval_trm_value'];
	                  		}
	                  	}
	                  	//print_r($get_tramvalename);
	                  	//echo $sessinpld;
	                  	//echo $get_sizevale;
	              		$get_termvaleu = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='$sessinpld' AND proval_trm_attid='$get_sizevale' OR proval_trm_seeionid='$catroyautoid' AND proval_trm_attid='$get_sizevale' OR proval_trm_seeionid='$commaromve' AND proval_trm_attid='$get_sizevale'";
						$queryvaldatul = $contdb->query($get_termvaleu);
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
				$queryatbutmain = $contdb->query($get_main_attbut);
				while($rowgetmainabtu = $queryatbutmain->fetch_array()){
					$get_sizevale = $rowgetmainabtu['attbut_id'];

					$get_nameabbut = "SELECT * FROM product_attbut WHERE id='$get_sizevale'";
					$queyvalabbut = $contdb->query($get_nameabbut);
					while($rowgetabbutnae = $queyvalabbut->fetch_array()){
						$get_abbutname = $rowgetabbutnae['pd_attbut_name'];

		                  	echo '<div class="col-md-3 form-group"><select class="attbuteval form-control" name="getattbutedit[]" data-id="'.$vertionid.'" required>
		                  		<option value="">Select '.$get_abbutname.'</option>';

		                  	$vertionvalue = "SELECT * FROM product_attbut_vartarry WHERE id='$vertionid'";
		                  	$get_queryverval = $contdb->query($vertionvalue);
		                  	while($rowverdata = $get_queryverval->fetch_array()){
		                  		$get_vertionterid = explode(',', $rowverdata['prot_trm_id']);
		                  	}
		                  	foreach ($get_vertionterid as $termavertinovalue) {
		                  		$get_vertionvaledata = "SELECT * FROM product_variationsdata WHERE id='$termavertinovalue'";
		                  		$querytreamval = $contdb->query($get_vertionvaledata);
		                  		while ($rowget_showvale = $querytreamval->fetch_array()) {
		                  			$get_tramvalename[] = $rowget_showvale['proval_trm_value'];
		                  		}
		                  	}
		                  	//print_r($get_tramvalename);
		                  	//echo $sessinpld;
		                  	//echo $get_sizevale;
		              		$get_termvaleu = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='$sessinpld' AND proval_trm_attid='$get_sizevale' OR proval_trm_seeionid='$catroyautoid' AND proval_trm_attid='$get_sizevale' OR proval_trm_seeionid='$commaromve' AND proval_trm_attid='$get_sizevale' OR  proval_trm_seeionid='$valueset' AND proval_trm_attid='$get_sizevale'";
							$queryvaldatul = $contdb->query($get_termvaleu);
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
	$query_vertdata = $contdb->query($get_vertiondata);
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

if(isset($_POST['updatevertion'])){
	$selection_udate = $_POST['selection'];
	$blank_removecal = array_filter($selection_udate);
	$implodarray_udate = implode(',', $blank_removecal);
	$rgprice_udate = $_POST['reglarprice'];
	$slprice_udate = $_POST['saleprice'];
	$quntyprc_udate = $_POST['quntyval'];
	$lowstockvale_udate = $_POST['lowstockupdate'];
	if($_POST['editvale'] == "new"){
		$sessionidvale_udate = $_POST['sessiongetid'];
	}else{
		$sessionidvale_udate = $_POST['sessiongetid'];
	}
	$vertremid_udate = $_POST['verttrenid'];
	
	$update_chking_vrt = "SELECT * FROM product_attbut_vartarry WHERE id='$vertremid_udate'";
	$query_vertionchk = $contdb->query($update_chking_vrt);
	if($query_vertionchk->num_rows > 0){

		$chking_data_vertion = "SELECT * FROM product_attbut_vartarry WHERE id='$vertremid_udate' AND prot_trm_regulprc='$rgprice_udate' AND prot_trm_saleprc='$slprice_udate' AND prot_trm_quantity='$quntyprc_udate' AND prot_trm_lowstck='$lowstockvale_udate'";
		$query_chkingvaldat = $contdb->query($chking_data_vertion);
		if($query_chkingvaldat->num_rows > 0){
			echo "Already Updated";
		}else{
			$update_quntyval_udate = "UPDATE product_attbut_vartarry SET prot_trm_id='$implodarray_udate',prot_trm_regulprc='$rgprice_udate',prot_trm_saleprc='$slprice_udate',prot_trm_quantity='$quntyprc_udate',prot_trm_lowstck='$lowstockvale_udate' WHERE id='$vertremid_udate'";
			$query_insertvale_udate = $contdb->query($update_quntyval_udate);
			echo "Successfully Updated";
		}
	}else{
		$update_quntyval_udate = "UPDATE product_attbut_vartarry SET prot_trm_id='$implodarray_udate',prot_trm_regulprc='$rgprice_udate',prot_trm_saleprc='$slprice_udate',prot_trm_quantity='$quntyprc_udate',prot_trm_lowstck='$lowstockvale_udate' WHERE id='$vertremid_udate'";
		$query_insertvale_udate = $contdb->query($update_quntyval_udate);
		echo "Successfully Updated";
	}
	//echo "Successfully Update.";
}

if(isset($_POST['delettrem'])){
	$get_vertremid = $_POST['verindiddelt'];
	if($_POST['chkvaldelt'] == "new"){
		$seeionval_delt = $_POST['getautoidval'];
		$sessinpld_delt = $seeionval_delt;
	}else{
		$sessinpld_delt = $seeionval_delt;
	}

	$get_deletevale = "SELECT * FROM product_attbut_vartarry WHERE id='$get_vertremid'";
	$query_get_valedata = $contdb->query($get_deletevale);
	while($rowget_arrayval = $query_get_valedata->fetch_array()){
		$get_idesname[] = $rowget_arrayval['prot_trm_id'];
	}
	$delectvertm = "DELETE FROM product_attbut_vartarry WHERE id='$get_vertremid'";
	$querydelect = $contdb->query($delectvertm);
	echo "Successfully Deleted.";
}

if(isset($_POST['position'])){
	$post_getdataval = $_POST['position'];
	$i=1;
	foreach($post_getdataval as $keyvalpost => $set_postion){
		//$set_postion;
		$set_postiondata = "UPDATE product_attbut_vartarry SET prot_trm_postion='$i' WHERE prot_trm_id='$set_postion'";
		$query_set_vtionval = $contdb->query($set_postiondata);
		
		$explodetdatval = explode(',', $set_postion);
		foreach($explodetdatval as $data_valeid){
			$update_postdataval = "UPDATE product_variationsdata SET proval_trm_postion='$i' WHERE id='$data_valeid'";
			$query_set_postion = $contdb->query($update_postdataval);
		}
		$i++;
	}
}

if(isset($_POST['positionmenu'])){
	$positionmenu = $_POST['positionmenu'];
	$i=1;  
	foreach($positionmenu as $k=>$v){  
	    $sql = "UPDATE menudatatable SET menu_postion='$i' WHERE id='$v'";  
	    $contdb->query($sql);
	    $i++;  
	}
}

if(isset($_POST['postinmutipd'])){
	$positionpd = $_POST['postinmutipd'];
	$ipd=1;  
	foreach($positionpd as $kpd=>$vpd){
	    $sql = "UPDATE product_mutli_image SET img_postion='$ipd' WHERE id='$vpd'";  
	    $contdb->query($sql);
	    $ipd++;  
	}
}

if(isset($_POST['imageremovmulti'])){
	$get_exodeal = explode('|', $_POST['imageremovmulti']);
	$image_id = $get_exodeal[0];
	$image_name = $floder_path_name.'/'.$get_exodeal[1];

	$deletvale = DeleteALlDataVlae("product_mutli_image","id='$image_id'");
	unlink($image_name);
}

if(isset($_POST['tvsetval'])){
	$valueset = $_POST['tvsetval'];
	$ipddt=1;  
	foreach($valueset as $kpdvalu=>$vpdsrt){
	    $sql = "UPDATE gllnewstv_section SET tvnews_poestion='$ipddt' WHERE id='$vpdsrt'";  
	    $contdb->query($sql);
	    $ipddt++;
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
		    $contdb->query($sql);
		}

		$ipddttwo=1;
		foreach($explodetwoval as $newval=>$vpdsrtteo){
			$sql = "UPDATE product_variationsdata SET proval_trm_postion='$ipddt' WHERE id='$vpdsrtteo'";
		    $contdb->query($sql);
		}
		$ipddt++;
	}
}

if(isset($_POST['sliderpostion'])){
	$slid_valueset = $_POST['sliderpostion'];
	$slide_ipddt=1;
	foreach($slid_valueset as $slid_kpdvalu=>$slide_vpdsrt){
	    $slid_sql = "UPDATE slideres_table_content SET slid_postion='$slide_ipddt' WHERE id='$slide_vpdsrt'";  
	    $contdb->query($slid_sql);
	    $slide_ipddt++;
	}
}

if(isset($_POST['promoads'])){
	$ads_valueset = $_POST['promoads'];
	$ads_ipddt=1;
	foreach($ads_valueset as $ads_kpdvalu=>$ads_vpdsrt){
	    $ads_sql = "UPDATE ads_imagesection SET adsimg_postion='$ads_ipddt' WHERE id='$ads_vpdsrt'";  
	    $contdb->query($ads_sql);
	    $ads_ipddt++;
	}
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

if(isset($_POST['quickedivl'])){
	$get_seravl = explode('/', $_POST['quickid']);
	$get_autoid = $get_seravl[0];
	$get_mainid = $get_seravl[1];
	foreach (GetProductDataValTab($get_autoid) as $valueproduct) {
		echo '<div class="col-md-8">
				<input type="hidden" name="pageid" value="'.$get_mainid.'">
				<input type="hidden" name="autoid" value="'.$get_autoid.'">
	          	<div class="edit-product">
	            	<div class="row">
	            		<div class="col-sm-2">
	              			Vendor
	            		</div>
	            		<div class="col-sm-10">
	              			<select class="form-control" name="setvendordat" id="setvendordat" required>';
	              			foreach(GetVenderDatavale() as $vendername){
					          	foreach(GetPermissionvalData($vendername['vendor_auto']) as $vendorpermision){
					            	if($vendorpermision['user_p_block'] == "0"){
					              		if($valueproduct['product_vender_id'] == $vendername['vendor_auto']){
					              			echo '<option value="'.$vendername['vendor_auto'].'" selected>'.$vendername['vendor_f_name'].' '.$vendername['vendor_l_name'].'</option>';
					              		}else{
					              			echo '<option value="'.$vendername['vendor_auto'].'">'.$vendername['vendor_f_name'].' '.$vendername['vendor_l_name'].'</option>';
					              		}
					        		}
					    		}
					    	}
	    echo	 			'</select>
	            		</div>
	          		</div>
	          		<div class="row">
	            		<div class="col-sm-2">
	              			Title
	            		</div>
			            <div class="col-sm-10">
			              <input type="text" name="tilepded" id="tilepded" value="'.$valueproduct['product_name'].'" class="form-control" required>
			            </div>
	          		</div>
		          	<div class="row">
		            	<div class="col-sm-2">
		              		Slug
		            	</div>
		            	<div class="col-sm-10">
		              		<input type="text" name="slugprd" id="slugprd" value="'.$valueproduct['product_page_name'].'" class="form-control" required>
		            	</div>
		          	</div>
	          		<div class="row">
	            		<div class="col-sm-2">
	              			SKU
	            		</div>
	            		<div class="col-sm-10">
	              			<input type="tex" name="skupdtvl" id="skupdtvl" value="'.$valueproduct['product_sku'].'" class="form-control">
	            	</div>
	          	</div>
	        </div>
	    </div>
	    <div class="col-md-4">
           <div class="product-category">
            <h5>Product categories</h5>
            <div class="category-list">
              <div class="cat-row">';
                ProductInnercategoryTree($valueproduct['product_catger_ids'],$parent_id = 0, $sub_mark = '');
            echo '</div>
            </div>
           </div>
         </div>';
	}
}
?>