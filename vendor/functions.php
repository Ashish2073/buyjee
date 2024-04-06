<?php 

require_once("session.php");

include_once('../config_db/conn_connect.php');

$conn = conndata();

date_default_timezone_set('Asia/Kolkata');

$session_valuedata = $_SESSION['vendorsessionlogin'];
$get_data_val = "SELECT * FROM userpermission WHERE user_p_id='$session_valuedata'";
$query_daa = $conn->query($get_data_val);
while($rowvaldata = $query_daa->fetch_array()){
    $banner_hide = $rowvaldata['user_banner'];
    $profiel_hide = $rowvaldata['user_profilepic'];
    $about_hide = $rowvaldata['user_aboutval'];
    $shpping_hide = $rowvaldata['user_shhpinval'];
    $addressval = $rowvaldata['user_addresedt'];
}
/*=========================================*/

/*======== vendor File Upload =============*/

/*=========================================*/

 

function vendorFileInsert($vendorId, $final_image, $prodUrl, $uploadDate, $uploadTime){

 	global $conn;

	$sql = "INSERT INTO vendor_productFile(v_id,v_fileName,v_proudctUrl,v_fileUploadDate,v_fileUploadTime)VALUES('$vendorId','$final_image','$prodUrl','$uploadDate', '$uploadTime')";

	$qry = mysqli_query($conn, $sql);

	if($qry == true){

		return true;

	}else{

		return false;

	}	

}



function vendorFileView($vendorId){

 	global $conn;

 	$sql = "SELECT * FROM vendor_productFile WHERE v_id = '$vendorId' ORDER BY v_id DESC";

	$qry = mysqli_query($conn,$sql);

	$count = 1;

	$numRows = mysqli_num_rows($qry);

	if(mysqli_num_rows($qry) !=  0 ){

		while($row = mysqli_fetch_array($qry)){

			$fileName = $row['v_fileName'];

			$productUrl = $row['v_proudctUrl'];

			$uploadDate = date('d-M-Y', strtotime($row['v_fileUploadDate']));

			$uploadTime = date('h:i:s a', strtotime($row['v_fileUploadTime']));

			echo "<tr>

					<td>$count</td>

	                <td>$fileName</td>

	                <td>$productUrl</td>

	                <td>$uploadDate</td>

	                <td>$uploadTime</td>

	            </tr>";

	    $count++;

		}	

	}else{

		echo "<tr><td colspan='4'>No records Found</td></tr>";

	}	

}





/*=========================================*/

/*============ About Vendor ===============*/

/*=========================================*/



function aboutInsert($vendorId, $type, $aboutV, $submitDate, $submitTime){

	global $conn;

	$sql = "INSERT INTO about_me(uid,type,about_content,submitDate,submitTime)VALUES('$vendorId','$type','$aboutV','$submitDate', '$submitTime')";

	$qry = mysqli_query($conn, $sql);

	if($qry == true){

		return true;

	}

}



function viewAbout($vendorId){

	global $conn;

 	$sql = "SELECT * FROM about_me WHERE uid = '$vendorId'";

	$qry = mysqli_query($conn,$sql);

	$numRows = mysqli_num_rows($qry);

	if(mysqli_num_rows($qry) !=  0 ){

		while($row = mysqli_fetch_array($qry)){

			$aboutV = $row['about_content'];

		}	

	}

	return array($numRows, $aboutV);		

}



function updateabotu($vendor_data,$vendorId){

	global $conn;

	$sql = "UPDATE about_me SET about_content='$vendor_data' WHERE uid='$vendorId'";

	$quwery = mysqli_query($conn,$sql);

	if($quwery == true){

		return true;

	}else{

		return false;

	}

}



/*=========================================*/

/*========= Terms And Condition ===========*/

/*=========================================*/

function termsInsert($vendorId, $type, $termsV, $submitDate, $submitTime){

	global $conn;

	$sql = "INSERT INTO termsCondition(uid,type,terms,submitDate,submitTime)VALUES('$vendorId','$type','$termsV','$submitDate', '$submitTime')";

	$qry = mysqli_query($conn, $sql);

	if($qry == true){

		return true;

	}

}



function viewTerms($vendorId){

	global $conn;

 	$sql = "SELECT * FROM termsCondition WHERE uid = '$vendorId'";

	$qry = mysqli_query($conn,$sql);

	$numRows = mysqli_num_rows($qry);

	if(mysqli_num_rows($qry) !=  0 ){

		while($row = mysqli_fetch_array($qry)){

			$termsCond = $row['terms'];

		}	

	}

	return array($numRows, $termsCond);	

}



function updatetrarm($vendor_data,$vendorId){

	global $conn;

	$sql = "UPDATE termsCondition SET terms='$vendor_data' WHERE uid='$vendorId'";

	$quwery = mysqli_query($conn,$sql);

	if($quwery == true){

		return true;

	}else{

		return false;

	}

}

/*=========================================*/

/*============ Banner Images ==============*/

/*=========================================*/



function bannerFileInsert($vendorId, $type, $final_image, $uploadDate, $uploadTime){

 	global $conn;

	$sql = "INSERT INTO banners(uid,type,bannerName,submitDate,submitTime)VALUES('$vendorId', '$type','$final_image','$uploadDate', '$uploadTime')";

	$qry = mysqli_query($conn, $sql);

	if($qry == true){

		return true;

	}else{

		return false;

	}	

}



function bannerFileView($vendorId){

	global $conn;
	global $weburl;

    /*<td><a href="#removeBanner" class="remove-bannerModel" data-bnnerid="'.$bannerId.'">Remove</a></td>*/
 	$sql = "SELECT * FROM banners WHERE uid = '$vendorId' AND status = 'active' ORDER BY bno DESC";

	$qry = mysqli_query($conn,$sql);

	$numRows = mysqli_num_rows($qry);

	$count = 1;

	if(mysqli_num_rows($qry) !=  0 ){

		while($row = mysqli_fetch_array($qry)){

			$bannerName = $row['bannerName'];

			$bannerId = $row['bno'];

			$submitDay = date("m-d-Y", strtotime($row['submitDate'])).' '.$row['submitTime'];

			$viewData .= '<tr>

                               <td>'.$count.'</td>

                               <td><img src="'.$weburl.'/assets/images/store-slider/'.$bannerName.'" width="350" height="150"></td>

                               <td>'.$submitDay.'</td>

                               <td><a href="#editBanner" data-toggle="modal" class="open-bannerModel" data-bnnerid="'.$bannerId.'">Edit</a></td>

                            </tr>';

        $count++;

		}	

	}

	return array($numRows, $viewData);	

}



function bannerFileUpdate($bannerId, $final_image, $uploadDate, $uploadTime){

	global $conn;

	$sql = "UPDATE banners SET bannerName='$final_image',submitDate='$uploadDate',submitTime='$uploadTime' WHERE bno='$bannerId'";

	$qry = mysqli_query($conn, $sql);

	if($qry == true){

		return true;

	}else{

		return flase;

	}

}



function bannerRemove($bannerID){

	global $conn;

	$sql = "UPDATE banners SET status='inactive' WHERE bno='$bannerID'";

	$qry = mysqli_query($conn, $sql);

	if($qry == true){

		return true;

	}else{

		return flase;

	}

}



/*=========================================*/

/*============ Banner Images ==============*/

/*=========================================*/



function viewProduct($vendorId){

	global $conn;
	global $weburl;

	$limit = 10;  

	if(isset($_GET["page"])) {

		$page  = $_GET["page"];

	}else{

		$page=1;

	}

	$start_from = ($page-1) * $limit;



	$sql = "SELECT * FROM all_product WHERE product_vender_id = '$vendorId' ORDER BY id DESC LIMIT $start_from, $limit";

	$qry = mysqli_query($conn,$sql);

	$numRows = mysqli_num_rows($qry);

	$count = 1;

	while($row = mysqli_fetch_array($qry)){

		$prodviewimag = $row['product_image'];

		$prodviename = $row['product_name'];

		$prodviewsku = $row['product_sku'];

		$prodviewstock = $row['product_stock'];

		$prodviewregprice = $row['product_regular_price'];

		$prodviewsaleprice = $row['product_sale_price'];

		$prodviewcatger = $row['product_catger'];

		$prodviewtags = $row['product_tags'];

		$prodviewdate = $row['product_date'];

		$prodviewtime = $row['product_time'];

		$prodviewautoid = $row['product_auto_id'];

		$produtuiname = $row['product_page_name'];

		$prodviewid = $row['id'];

		$viewData .="<tr>

						<td>$count</td>

						<td><img src='$weburl/images/$prodviewimag' class='img-fluid'/></td>

						<td>$prodviename</td>

						<td>$prodviewsku</td>

						<td><span style='color:green;'><b>In stock</b></span>($prodviewstock)</td>

						<td>$prodviewregprice</td>

						<td>$prodviewcatger</td>

						<td>$prodviewtags</td>

						<td>$prodviewdate / $prodviewtime</td>

						<td><a target='_blank' href='$weburl$produtuiname'>Click</a></td>

					</tr>";

	$count++;

	}

	return array($numRows, $viewData);

	/*$result_db = mysqli_query($conn_db,"SELECT COUNT(id) FROM all_product "); 

	$row_db = mysqli_fetch_row($result_db);  

	$total_records = $row_db[0];  

	$total_pages = ceil($total_records / $limit); 

	//echo  $total_pages;

	$pagLink = "<nav aria-label='Page navigation example'>";  

	for ($i=1; $i<=$total_pages; $i++) {

	    $pagLink .= "<li class='page-item'><a class='page-link' href='add_product?page=".$i."'>".$i."</a></li>";	

	}

	echo $pagLink . "</nav>";*/

}

function chatvenodr($vendoridval){
    global $conn;
    global $weburl;

$get_cumteroval = "SELECT * FROM chat_request WHERE chat_req_vedorid='$vendoridval'";
$query = mysqli_query($conn,$get_cumteroval);
while($rowval = mysqli_fetch_array($query)){
	$get_cutomer_id = $rowval['chat_req_customer'];

$getuserid = "SELECT * FROM customer WHERE customer_ui_id='$get_cutomer_id'";
    $get_custome_data = mysqli_query($conn,$getuserid);
    while($rowdatacust = mysqli_fetch_array($get_custome_data)){
        $singl_id = $rowdatacust['customer_ui_id'];
        if(isset($_GET['id'])){
            $sesiondata = $_GET['id'];
        }else{
            $sesiondata = "0";
        }
        if($sesiondata == $singl_id){
            echo '<a href="?id='.$rowdatacust['customer_ui_id'].'"><li class="person active set_data" data-chat="" data-id="'.$rowdatacust['customer_ui_id'].'">';
        }else{
            echo '<a href="?id='.$rowdatacust['customer_ui_id'].'"><li class="person set_data" data-chat="'.$rowdatacust['customer_ui_id'].'" data-id="'.$rowdatacust['customer_ui_id'].'">';
        }
                if($rowdatacust['customer_img'] == "0"){
                    echo '<img src="$weburl/assets/images/vendor_images/logo.png" alt="" />';
                }elseif($rowdatacust['customer_img'] == ""){
                    echo '<img src="$weburl/assets/images/vendor_images/logo.png" alt="" />';
                }else{
                    echo '<img src="$weburl/assets/images/vendor_images/'.$rowdatacust['customer_img'].'" alt="" />';
                }
        echo '<span class="name">'.$rowdatacust['customer_fname'].' '.$rowdatacust['customer_lname'].'</span>';
                echo '<span class="preview offline">'.$rowdatacust['customer_date'].'&nbsp;'.$rowdatacust['customer_time'].'</span>';
        echo '</li></a>';
    }
}
}

function chatviewdata($sessionval,$customerid){
    global $conn;

    $query_val = "SELECT * FROM chat_request WHERE chat_req_vedorid='$customerid' AND chat_req_customer='$sessionval' AND chat_req_status='1'";
    $valuequery = mysqli_query($conn,$query_val);
    if(mysqli_num_rows($valuequery)){
        $get_anem_val = "SELECT * FROM customer WHERE customer_ui_id='$sessionval'";
        $queryvaldata = mysqli_query($conn,$get_anem_val);
        while($rowdatvcat = mysqli_fetch_array($queryvaldata)){
           echo '<div class="top"><span>To: <span class="name">'.$rowdatvcat['customer_fname'].' '.$rowdatvcat['customer_lname'].'</span></span></div>';
        }
        echo '<div class="chat active-chat" data-chat="'.$sessionval.'"><div id="updatecaht">';

        $getcaht_val = "SELECT * FROM chat_user WHERE chat_u_id='$customerid' AND chat_cust_id='$sessionval' ORDER BY id ASC";
        $single_val = mysqli_query($conn,$getcaht_val);
        while($rowchat = mysqli_fetch_array($single_val)){
            if($rowchat['chat_u_id'] == $sessionval){
                echo '<div class="bubble me" title="'.$rowchat['chat_date'].' '.$rowchat['chat_time'].'">'.$rowchat['chat_text'].'</div>';
            }elseif($rowchat['chat_cust_id'] == $sessionval){
                echo '<div class="bubble you title="'.$rowchat['chat_date'].' '.$rowchat['chat_time'].'">'.$rowchat['chat_text'].'</div>';
            }
        }

        echo '</div></div>
            <div class="write">
                <div id="repert">
                    <input type="text" id="textval"/>
                </div>';
            if(isset($_GET['id'])){
                $sesiondata = $_GET['id'];
                echo '<a href="javascript:;" class="write-link smiley"></a>
                    <a href="javascript:;" class="write-link send" data-id="'.$sesiondata.'"></a>';
            }
        echo '</div>';
    }else{
        echo '<div class="top"><span>To: <span class="name">Welcome</span></span></div>';
        echo '<div class="chat active-chat" data-chat="'.$customerid.'">
                <span id="clickadd" data-cust="'.$sessionval.'">Add Vendor to chat</span>
            </div>';
    }
}

if(isset($_POST['addvendor'])){
    $custmoerval = $_POST['custval'];
    $vendorval = $_POST['vaendval'];
    $date = date('m/d/Y');
    $time = date('h:i A');
    $check_val = "SELECT * FROM chat_request WHERE chat_req_vedorid='$vendorval' AND chat_req_customer='$custmoerval'";
    $query_val = mysqli_query($conn,$check_val);
    if(mysqli_fetch_array($query_val)){
        echo "1";
    }else{
        $insertdatarequest = "INSERT INTO chat_request(chat_req_vedorid,chat_req_customer,chat_req_date,chat_req_time,chat_req_block,chat_req_delete,chat_req_status)VALUES('$vendorval','$custmoerval','$date','$time','0','0','1')";
        $querydatarequest = mysqli_query($conn,$insertdatarequest);
        echo "1";
    }
}

if(isset($_POST['postdata'])){
    $id = $_POST['id'];
    $unquserval = $_POST['value'];
    $customerid = $_POST['cssvalid'];
    $date = date('m/d/Y');
    $time = date('h:i A');
    $insertdata = "INSERT INTO chat_user(chat_u_id,chat_cust_id,chat_date,chat_time,chat_status,chat_text,chat_delete)VALUES('$customerid','$id','$date','$time','1','$unquserval','0')";
    $querydata = mysqli_query($conn,$insertdata);
    echo $unquserval;
}

function vendorbankadd($bank_name,$bank_ac_name,$bank_ac_number,$bank_rotingnumb,$session_data){
	global $conn;
	$date = date('m/d/Y');
	$time = date('h:i A');
	$cehck_val_data = "SELECT * FROM vendorbank WHERE vbank_vid='$session_data'";
	$quwerycechekl = mysqli_query($conn,$cehck_val_data);
	if(mysqli_num_rows($quwerycechekl)){

		$update_val = "UPDATE vendorbank SET vbank_name='$bank_name',vbank_acname='$bank_ac_name',vbank_acnumber='$bank_ac_number',vbank_roting='$bank_rotingnumb' WHERE vbank_vid='$session_data'";
		$update_valtrye = mysqli_query($conn,$update_val);
		if($update_valtrye == true){
			return true;
		}else{
			return false;
		}

	}else{

		$insertbank = "INSERT INTO vendorbank(vbank_name,vbank_acname,vbank_acnumber,vbank_roting,vbank_vid,vbank_date,vbank_time)VALUES('$bank_name','$bank_ac_name','$bank_ac_number','$bank_rotingnumb','$session_data','$date','$time')";
		$quwerydata = mysqli_query($conn,$insertbank);
		if($quwerydata == true){
			return true;
		}else{
			return false;
		}
	}
}

function vendorprofile($f_name,$l_name,$p_phone,$e_email,$a_address,$session_data,$replace_vale,$a_city,$a_state,$a_coluntry,$a_zip){
	global $conn;
	$date = date('m/d/Y');
	$time = date('h:i A');

	$update_val_profl = "UPDATE vendor SET vendor_f_name='$f_name',vendor_l_name='$l_name',vendor_email='$e_email',vendor_phone='$p_phone',vendor_address='$a_address',vendor_uni_name='$replace_vale',vendor_city='$a_city',vendor_state='$a_state',vendor_country='$a_coluntry',vendor_zipcode='$a_zip' WHERE vendor_auto='$session_data'";
	$update_valtrye_profl = mysqli_query($conn,$update_val_profl);

	$update_val = "UPDATE userlogntable SET user_first_name='$f_name',user_email='$e_email',user_lastname='$l_name' WHERE user_auto='$session_data'";
	$loginupdate = mysqli_query($conn,$update_val);

	if($loginupdate == true){
		return true;
	}else{
		return false;
	}
}

function changepssval($oldpassword,$newpassword,$session_data){
	global $conn;

	$passworcehcl = MD5($oldpassword);
	$cehckpassword = "SELECT * FROM userlogntable WHERE user_password='$passworcehcl' AND user_auto='$session_data'";
	$quwerycehck = mysqli_query($conn,$cehckpassword);
	if(mysqli_num_rows($quwerycehck)){
		$makpassword = MD5($newpassword);
		$update_new_pass = "UPDATE userlogntable SET user_password='$makpassword' WHERE user_auto='$session_data'";
		$updatepass_val = mysqli_query($conn,$update_new_pass);
		if($updatepass_val == true){
			return true;
		}
	}else{
		return false;
	}
}

function getordersuccess($vendor_id){
	global $conn;
	global $weburl;

	$ordercusto = "SELECT * FROM customer_order WHERE payment_response='1' ORDER BY id DESC";
	$queryorder = mysqli_query($conn,$ordercusto);
	while($roworder = mysqli_fetch_array($queryorder)){

		$size_abbut = $roworder['p_filter_value'];
		$get_customerid = $roworder['customer_id'];
		$get_stryid = $roworder['p_serty_id'];

		$get_customer_name = "SELECT * FROM customer WHERE customer_ui_id='".$roworder['customer_id']."'";
		$query_customr = mysqli_query($conn,$get_customer_name);
		while($rowductomdata = mysqli_fetch_array($query_customr)){

			$get_product_name = "SELECT * FROM all_product WHERE product_auto_id='".$roworder['product_auto_id']."' AND product_vender_id='$vendor_id'";
			$querydata = mysqli_query($conn,$get_product_name);
			while($rowgetname = mysqli_fetch_array($querydata)){

				$get_shpinngdata = "SELECT * FROM shipping_table WHERE mul_shipp_setid='$get_stryid' AND mul_shipp_custid='$get_customerid'";
				$queryshpping = $conn->query($get_shpinngdata);
				while($rowvaledata = $queryshpping->fetch_array()){
					$get_labelname = $rowvaledata['mul_shipp_shipptrakinid'];
				}
				if($get_labelname == "0" || $get_labelname == ""){}else{
					echo "<tr>
						<td>".$rowductomdata['customer_fname']." ".$rowductomdata['customer_lname']."</td>
						<td><a href='".$weburl."vendor/view-order?page=pending-orders&pageid=".$roworder['id']."&pdtime=".$roworder['p_date']."&customeid=".$roworder['customer_id']."&stid=$get_stryid' target='_blank'>".$rowgetname['product_name']."</a></td>
						<td>".$roworder['p_qty']."</td>
						<td>$ ".$roworder['p_price']."</td><td>";
						if($size_abbut != ""){
							$explode_data = explode(',', $size_abbut);
							foreach($explode_data as $vertion_vale){
								$get_vertionvale = "SELECT * FROM product_variationsdata WHERE id='$vertion_vale'";
								$quyery_vertiondate = $conn->query($get_vertionvale);
								while($row_get_vertiondate = $quyery_vertiondate->fetch_array()){
									$ger_vertionvalid = $row_get_vertiondate['proval_trm_attid'];
									$ger_vertionval = $row_get_vertiondate['proval_trm_value'];

									$get_trem_vale = "SELECT * FROM product_attbut WHERE id='$ger_vertionvalid'";
									$query_tremvale = $conn->query($get_trem_vale);
									while($row_trem_name = $query_tremvale->fetch_array()){
										$get_tem_name = $row_trem_name['pd_attbut_name'];
									}
									echo "".$get_tem_name.": ".$ger_vertionval."<br/>";
								}
							}
						}
					echo "</td><td>".date("m-d-Y", strtotime($roworder['p_date']))."</td>
						<td><a href='".$weburl."vendor/view-order?page=pending-orders&pageid=".$roworder['id']."&pdtime=".$roworder['p_date']."&customeid=".$roworder['customer_id']."&stid=$get_stryid' target='_blank'>View</a></td>
					</tr>";
				}
			}
		}
	}
}

function getorderPendding($vendor_id){
	global $conn;
	global $weburl;

	$ordercusto = "SELECT * FROM customer_order WHERE payment_response='1' ORDER BY id DESC";
	$queryorder = mysqli_query($conn,$ordercusto);
	while($roworder = mysqli_fetch_array($queryorder)){

		$size_abbut = $roworder['p_filter_value'];
		$get_customerid = $roworder['customer_id'];
		$get_stryid = $roworder['p_serty_id'];

		$get_customer_name = "SELECT * FROM customer WHERE customer_ui_id='".$roworder['customer_id']."'";
		$query_customr = mysqli_query($conn,$get_customer_name);
		while($rowductomdata = mysqli_fetch_array($query_customr)){

			$get_product_name = "SELECT * FROM all_product WHERE product_auto_id='".$roworder['product_auto_id']."' AND product_vender_id='$vendor_id'";
			$querydata = mysqli_query($conn,$get_product_name);
			while($rowgetname = mysqli_fetch_array($querydata)){

				$get_shpinngdata = "SELECT * FROM shipping_table WHERE mul_shipp_setid='$get_stryid' AND mul_shipp_custid='$get_customerid'";
				$queryshpping = $conn->query($get_shpinngdata);
				while($rowvaledata = $queryshpping->fetch_array()){
					$get_labelname = $rowvaledata['mul_shipp_shipptrakinid'];
				}
				if($get_labelname == "0" || $get_labelname == ""){
					echo "<tr>
						<td>".$rowductomdata['customer_fname']." ".$rowductomdata['customer_lname']."</td>
						<td><a href='".$weburl."vendor/view-order?page=pending-orders&pageid=".$roworder['id']."&pdtime=".$roworder['p_date']."&customeid=".$roworder['customer_id']."&stid=$get_stryid' target='_blank'>".$rowgetname['product_name']."</a></td>
						<td>".$roworder['p_qty']."</td>
						<td>₹ ".$roworder['p_price']."</td><td>";
						if($size_abbut != ""){
							$explode_data = explode(',', $size_abbut);
							foreach($explode_data as $vertion_vale){
								$get_vertionvale = "SELECT * FROM product_variationsdata WHERE id='$vertion_vale'";
								$quyery_vertiondate = $conn->query($get_vertionvale);
								while($row_get_vertiondate = $quyery_vertiondate->fetch_array()){
									$ger_vertionvalid = $row_get_vertiondate['proval_trm_attid'];
									$ger_vertionval = $row_get_vertiondate['proval_trm_value'];

									$get_trem_vale = "SELECT * FROM product_attbut WHERE id='$ger_vertionvalid'";
									$query_tremvale = $conn->query($get_trem_vale);
									while($row_trem_name = $query_tremvale->fetch_array()){
										$get_tem_name = $row_trem_name['pd_attbut_name'];
									}
									echo "".$get_tem_name.": ".$ger_vertionval."<br/>";
								}
							}
						}
					echo "</td><td>".date("m-d-Y", strtotime($roworder['p_date']))."</td>
						<td><a href='".$weburl."vendor/view-order?page=pending-orders&pageid=".$roworder['id']."&pdtime=".$roworder['p_date']."&customeid=".$roworder['customer_id']."&stid=$get_stryid' target='_blank'>View</a></td>
					</tr>";
				}
			}
		}
	}
}

function complteorder($vendor_id){
	global $conn;
	global $weburl;

	$ordercusto = "SELECT * FROM customer_order WHERE payment_response='1' ORDER BY id DESC";
	$queryorder = mysqli_query($conn,$ordercusto);
	while($roworder = mysqli_fetch_array($queryorder)){

		$size_abbut = $roworder['p_filter_value'];
		$get_customerid = $roworder['customer_id'];
		$get_stryid = $roworder['p_serty_id'];

		$get_customer_name = "SELECT * FROM customer WHERE customer_ui_id='".$roworder['customer_id']."'";
		$query_customr = mysqli_query($conn,$get_customer_name);
		while($rowductomdata = mysqli_fetch_array($query_customr)){

			$get_product_name = "SELECT * FROM all_product WHERE product_auto_id='".$roworder['product_auto_id']."' AND product_vender_id='$vendor_id'";
			$querydata = mysqli_query($conn,$get_product_name);
			while($rowgetname = mysqli_fetch_array($querydata)){

				$get_shpinngdata = "SELECT * FROM shipping_table WHERE mul_shipp_setid='$get_stryid' AND mul_shipp_custid='$get_customerid'";
				$queryshpping = $conn->query($get_shpinngdata);
				while($rowvaledata = $queryshpping->fetch_array()){
					$get_trkingname = $rowvaledata['mul_shipp_trakingname'];
					$get_trkingid = $rowvaledata['mul_shipp_shipptrakinid'];

				$get_shppivale = "SELECT * FROM shipping_compy WHERE shipping_c_name='$get_trkingname'";
				$queryshppvale = $conn->query($get_shppivale);
				while($rowvalegetval = $queryshppvale->fetch_array()){
					$ups_linkata = $rowvalegetval['shipping_c_tracklink'];
				}

				if($get_trkingid == "0" || $get_trkingid == ""){
				}else{
					echo "<tr>
						<td>".$rowductomdata['customer_fname']." ".$rowductomdata['customer_lname']."</td>
						<td><a href='".$weburl."vendor/view-order?page=completed-orders&pageid=".$roworder['id']."&pdtime=".$roworder['p_date']."&customeid=".$roworder['customer_id']."&stid=$get_stryid' target='_blank'>".$rowgetname['product_name']."</a></td>
						<td>".$roworder['p_qty']."</td>
						<td>₹ ".$roworder['p_price']."</td>
						<td>";
						if($size_abbut != ""){
							$explode_data = explode(',', $size_abbut);
							foreach($explode_data as $vertion_vale){
								$get_vertionvale = "SELECT * FROM product_variationsdata WHERE id='$vertion_vale'";
								$quyery_vertiondate = $conn->query($get_vertionvale);
								while($row_get_vertiondate = $quyery_vertiondate->fetch_array()){
									$ger_vertionvalid = $row_get_vertiondate['proval_trm_attid'];
									$ger_vertionval = $row_get_vertiondate['proval_trm_value'];

									$get_trem_vale = "SELECT * FROM product_attbut WHERE id='$ger_vertionvalid'";
									$query_tremvale = $conn->query($get_trem_vale);
									while($row_trem_name = $query_tremvale->fetch_array()){
										$get_tem_name = $row_trem_name['pd_attbut_name'];
									}
									echo "".$get_tem_name.": ".$ger_vertionval."<br/>";
								}
							}
						}
						echo "</td>
						<td>$get_trkingid</td>
						<td><a href='$ups_linkata' target='_blank'>$ups_linkata</a></td>
						<td>".date("m-d-Y", strtotime($roworder['p_date']))."</td>
						<td><a href='".$weburl."vendor/view-order?page=completed-orders&pageid=".$roworder['id']."&pdtime=".$roworder['p_date']."&customeid=".$roworder['customer_id']."&stid=$get_stryid' target='_blank'>View</a></td>
					</tr>";
				}
				}
			}
		}
	}
}

function getlabaledatato($customerid,$prodt_id){
	global $conn;

	$lable_get = "SELECT * FROM customer WHERE customer_ui_id='$customerid'";
	$querydata = mysqli_query($conn,$lable_get);
	while($rowlabel = mysqli_fetch_array($querydata)){
		echo '<p style="color: #3e4b51; margin-bottom: 10px;">Name : '.$rowlabel['customer_fname'].' '.$rowlabel['customer_lname'].'</p>
			<p style="color: #3e4b51; margin-bottom: 10px;">Address : '.$rowlabel['customer_address'].'</p>
			<p style="color: #3e4b51; margin-bottom: 10px;">Country : '.$rowlabel['customer_country'].'</p>
			<p style="color: #3e4b51; margin-bottom: 10px;">State : '.$rowlabel['customer_state'].'</p>
			<p style="color: #3e4b51; margin-bottom: 10px;">City : '.$rowlabel['customer_city'].'</p>
			<p style="color: #3e4b51; margin-bottom: 10px;">Pin Code : '.$rowlabel['customer_pincode'].'</p>';
	}
}

function getlabaledatafrom($vendor_id){
	global $conn;

	$lable_getfrom = "SELECT * FROM vendor WHERE vendor_auto='$vendor_id'";
	$querydatafrom = mysqli_query($conn,$lable_getfrom);
	while($rowlabelfrom = mysqli_fetch_array($querydatafrom)){
		echo '<p style="color: #3e4b51; margin-bottom: 10px;">Name : '.$rowlabelfrom['vendor_f_name'].' '.$rowlabelfrom['vendor_l_name'].'</p>
			<p style="color: #3e4b51; margin-bottom: 10px;">Address : '.$rowlabelfrom['vendor_address'].'</p>';
	}
}

function salereport($vendor_id){
	global $conn;

	$ordercusto = "SELECT * FROM customer_order WHERE payment_response='1'";
	$queryorder = mysqli_query($conn,$ordercusto);
	while($roworder = mysqli_fetch_array($queryorder)){

		$get_product_name = "SELECT * FROM all_product WHERE product_auto_id='".$roworder['product_auto_id']."' AND product_vender_id='$vendor_id'";
		$querydata = mysqli_query($conn,$get_product_name);
		while($rowgetname = mysqli_fetch_array($querydata)){

			$vendername = "SELECT * FROM vendor WHERE vendor_auto='".$rowgetname['product_vender_id']."'";
			$queryval = mysqli_query($conn,$vendername);
			while($row_val = mysqli_fetch_array($queryval)){
				$ratename = $row_val['vendor_commi_type'];
				$ratevalue = $row_val['vendor_commi_val'];

			if($ratename == "percentage"){

				$valuerpert = $roworder['p_price']*$ratevalue/100;

			}elseif($ratename == "flat"){

				$valuerpert = $roworder['p_price']/$ratevalue;
			}
			echo "<tr>
					<td>$ ".$roworder['p_price']."</td>
					<td>$ $valuerpert</td>
				</tr>";
			}
		}
	}
}

function insertvendorprofilepick($session_data,$productimgnewfilename){
	global $conn;
	global $weburl;
	global $url;
	
	$insert_vale = "UPDATE vendor SET vendor_img='$productimgnewfilename' WHERE vendor_auto='$session_data'";
    $queryvaleupdate = $conn->query($insert_vale);
    if($queryvaleupdate == true){
        return true;
    }else{
        return false;
    }
}

function vendoruserimg($session_data){
	global $conn;
	global $weburl;

	$imgdatavale = "SELECT * FROM vendor WHERE vendor_auto='$session_data' LIMIT 1";
	$queryvurlds = mysqli_query($conn,$imgdatavale);
	while($rowvaledataimg = mysqli_fetch_array($queryvurlds)){
		$get_img_tagvale = $rowvaledataimg['vendor_img'];
		if($get_img_tagvale == ""){
			echo $weburl."assets/images/default-user-icon.jpg";
		}else{
			echo $weburl."images/vendor_images/".$get_img_tagvale;
		}
	}
}

function vieworders_all($get_pagename,$get_pageid,$get_prdtime,$get_cumorid,$vendor_id){
	global $conn;

	$query_get_order = "SELECT * FROM customer_order WHERE customer_id='$get_cumorid' AND id='$get_pageid' AND p_date='$get_prdtime'";
	$querygetorder = $conn->query($query_get_order);
	while($rowgetvalorder = $querygetorder->fetch_array()){
		$get_secortyid = $rowgetvalorder['p_serty_id'];
		$get_prodct_id = $rowgetvalorder['product_auto_id'];
		$get_addresval = $rowgetvalorder['p_shipping_address'];
		$get_quntety = $rowgetvalorder['p_qty'];
		$get_shppingfee = $rowgetvalorder['p_shpping_amount'];

		if($get_addresval == "1"){
			$getcustomer_vale = "SELECT * FROM customer WHERE customer_ui_id='$get_cumorid'";
			$customerval = $conn->query($getcustomer_vale);
			while($rowvalecutomer = $customerval->fetch_array()){
				$customername = $rowvalecutomer['customer_fname'].' '.$rowvalecutomer['customer_lname'];
				$get_address = $rowvalecutomer['customer_address'].', '.$rowvalecutomer['customer_city'].', '.$rowvalecutomer['customer_state'].', '.$rowvalecutomer['customer_pincode'].', '.$rowvalecutomer['customer_country'];
			}
		}elseif($get_addresval == "2"){
			$get_coustomeradd = "SELECT * FROM shpptoadds WHERE cust_to_id='$get_cumorid' AND cust_to_date='$get_prdtime'";
			$querygettoadd = $conn->query($get_coustomeradd);
			while($rowgetshppinto = $querygettoadd->fetch_array()){
				$customername = $rowgetshppinto['cust_to_fname'].' '.$rowgetshppinto['cust_to_lname'];
				$get_address = $rowgetshppinto['cust_to_address'].', '.$rowgetshppinto['cust_to_city'].', '.$rowgetshppinto['cust_to_state'].', '.$rowgetshppinto['cust_to_postalcode'].', '.$rowgetshppinto['cust_to_country'];
			}
		}

		$get_product = "SELECT * FROM all_product WHERE product_auto_id='$get_prodct_id'";
		$query_productval = $conn->query($get_product);
		while($row_prouctvale = $query_productval->fetch_array()){
			$get_vendor_id = $row_prouctvale['product_vender_id'];
			$get_productname = $row_prouctvale['product_name'];
			$get_productSKU = $row_prouctvale['product_sku'];
		}

		$get_shpingvale = "SELECT * FROM shipping_table WHERE mul_shipp_custid='$get_cumorid' AND mul_shipp_setid='$get_secortyid'";
		$query_shoipping = $conn->query($get_shpingvale);
		while($row_get_shpping = $query_shoipping->fetch_array()){
			$get_shpping_id = $row_get_shpping['mul_shipp_shipping_id'];
			$get_taxmount = $row_get_shpping['mul_shipp_taxamunt'];
		}
		$paidoumnt = $rowgetvalorder['p_price']+$get_shppingfee+$get_taxmount;

		echo "<div class='datarow'>
                <div class='col-md-4'>
                    <div class='v_name'>Customer Name:</div>
                </div>
                <div class='col-md-8'>
                    <div class='v_data'>
                        $customername
                    </div>
                </div>
            </div>";
        echo "<div class='datarow'>
                <div class='col-md-4'>
                    <div class='v_name'>Shipping Address:</div>
                </div>
                <div class='col-md-8'>
                    <div class='v_data'>
                        $get_address
                    </div>
                </div>
            </div>";
        echo "<div class='datarow'>
                <div class='col-md-4'>
                    <div class='v_name'>Product Name:</div>
                </div>
                <div class='col-md-8'>
                    <div class='v_data'>
                        $get_productname
                    </div>
                </div>
            </div>";
            echo "<div class='datarow'>
                <div class='col-md-4'>
                    <div class='v_name'>Product SKU:</div>
                </div>
                <div class='col-md-8'>
                    <div class='v_data'>
                        $get_productSKU
                    </div>
                </div>
            </div>";
        echo "<div class='datarow'>
                <div class='col-md-4'>
                    <div class='v_name'>Product Quantity:</div>
                </div>
                <div class='col-md-8'>
                    <div class='v_data'>
                        $get_quntety
                    </div>
                </div>
            </div>";
        echo "<div class='datarow'>
                <div class='col-md-4'>
                    <div class='v_name'>Product Price:</div>
                </div>
                <div class='col-md-8'>
                    <div class='v_data'>
                        ₹ ".$rowgetvalorder['p_price']."
                    </div>
                </div>
            </div>";
        echo "<div class='datarow'>
                <div class='col-md-4'>
                    <div class='v_name'>Shipping Fees:</div>
                </div>
                <div class='col-md-8'>
                    <div class='v_data'>
                        ₹ $get_shppingfee
                    </div>
                </div>
            </div>";
            if($rowgetvalorder['p_filter_value'] != ""){
				$explode_data = explode(',', $rowgetvalorder['p_filter_value']);
				foreach($explode_data as $vertion_vale){
					$get_vertionvale = "SELECT * FROM product_variationsdata WHERE id='$vertion_vale'";
					$quyery_vertiondate = $conn->query($get_vertionvale);
					while($row_get_vertiondate = $quyery_vertiondate->fetch_array()){
						$ger_vertionvalid = $row_get_vertiondate['proval_trm_attid'];
						$ger_vertionval = $row_get_vertiondate['proval_trm_value'];

						$get_trem_vale = "SELECT * FROM product_attbut WHERE id='$ger_vertionvalid'";
						$query_tremvale = $conn->query($get_trem_vale);
						while($row_trem_name = $query_tremvale->fetch_array()){
							$get_tem_name = $row_trem_name['pd_attbut_name'];
						}
						echo "<div class='datarow'>
				                <div class='col-md-4'>
				                    <div class='v_name'>$get_tem_name</div>
				                </div>
				                <div class='col-md-8'>
				                    <div class='v_data'>
				                        ".$ger_vertionval."
				                    </div>
				                </div>
				            </div>";
					}
				}
			}
        echo "<div class='datarow'>
                <div class='col-md-4'>
                    <div class='v_name'>Date / Time:</div>
                </div>
                <div class='col-md-8'>
                    <div class='v_data'>
                        ".$rowgetvalorder['p_date']." / 
                        ".$rowgetvalorder['p_time']."
                    </div>
                </div>
            </div>";
	}
}

function shippingnumupdat($get_companyanme="",$get_teaking_link="",$alreday_shpname,$get_traking_number,$get_stid,$get_cumorid,$get_pagename,$vendor_id){
	global $conn;
	global $weburl;

	$date = date('d/m/Y');
	$time = date('h:i A');

	if($get_pagename == "pending-orders"){
		if($alreday_shpname == "other"){
			$querygetval = "SELECT * FROM shipping_compy WHERE shipping_c_name='$get_companyanme'";
			$queryvqaleus = $conn->query($querygetval);
			if($queryvqaleus->num_rows > 0){
				return false;
			}else{
				$insertnew_ent = "INSERT INTO shipping_compy(shipping_c_name,shipping_c_tracklink,shipping_c_date,shipping_c_time,shipping_c_status)VALUES('$get_companyanme','$get_teaking_link','$date','$time','1')";
				$query_update = $conn->query($insertnew_ent);

				$update_shpiing = "UPDATE shipping_table SET mul_shipp_trakingname='$get_companyanme',mul_shipp_shipptrakinid='$get_traking_number' WHERE mul_shipp_custid='$get_cumorid' AND mul_shipp_setid='$get_stid'";
				$queryshppinva = $conn->query($update_shpiing);

			/// shipping code				

			$get_creaternam = "SELECT * FROM vendor WHERE vendor_auto='$vendor_id'";
			$queryvendorprod = $conn->query($get_creaternam);
			while($rowvendorproduct = $queryvendorprod->fetch_array()){
				$get_venodrname = $rowvendorproduct['vendor_f_name'].' '.$rowvendorproduct['vendor_l_name'];
			}

			$get_customer = "SELECT * FROM customer WHERE customer_ui_id='$get_cumorid'";
			$queryvalecutmer = $conn->query($get_customer);
			while($rowgetcustoemr = $queryvalecutmer->fetch_array()){
				$cumstomername = $rowgetcustoemr['customer_fname'].' '.$rowgetcustoemr['customer_lname'];
			}
			
			$querycustome = "SELECT * FROM customer_order WHERE customer_id='$get_cumorid' AND p_serty_id='$get_stid'";
			$querygteproid = $conn->query($querycustome);
			while($rowgetproid = $querygteproid->fetch_array()){
				$get_proid = $rowgetproid['product_auto_id'];
				$get_filtercolor = $rowgetproid['p_filter_color'];
				$get_filtersize = $rowgetproid['p_filter_value'];
				$get_quntenty = $rowgetproid['p_qty'];
				$get_customerid = $rowgetproid['customer_id'];
				$get_tandid = $rowgetproid['tnx_id'];
				$get_proprice = $rowgetproid['p_price'];

				$custmerid = "SELECT * FROM userlogntable WHERE user_auto='$get_customerid'";
				$custvaledate = $conn->query($custmerid);
				while($rowcustoemrval = $custvaledate->fetch_array()){
					$customer_email = $rowcustoemrval['user_email'];
				}
				$get_shppingtable = "SELECT * FROM shipping_table WHERE mul_shipp_custid='$get_customerid' AND mul_shipp_setid='$get_stid'";
				$queryshippval = $conn->query($get_shppingtable);
				while($row_valeshpping = $queryshippval->fetch_array()){
					$get_taxmount = $row_valeshpping['mul_shipp_taxamunt'];
				}
				$get_priceval = $rowgetproid['p_price'];
				$get_shppinval = $rowgetproid['p_shpping_amount'];
				$totalamount = $get_priceval+$get_shppinval+$get_taxmount;

				$get_productval = "SELECT * FROM all_product WHERE product_auto_id='$get_proid'";
				$query_productval = $conn->query($get_productval);
				while($rowvaleproduct = $query_productval->fetch_array()){
					$producytname = $rowvaleproduct['product_name'];
					$producytstdesit = $rowvaleproduct['product_destion'];
					$producytstrprice = $rowvaleproduct['product_regular_price'];
					$producytstspricet = $rowvaleproduct['product_sale_price'];
					$x_amount = $get_proprice;

			$to = $customer_email;
            $subject = "Your Gallery La La Order Shipment's Details";
            $from = "no-reply@jioitservices.com";
            $cc = "jioitservices@gmail.com";

            // To send HTML mail, the Content-type header must be set

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

             
            // Create email headers

            $headers .= 'From: '.$from."\r\n";
            $headers .= 'CC: '.$cc."\r\n";
            'X-Mailer: PHP/' . phpversion();

            $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

            <html xmlns='http://www.w3.org/1999/xhtml'>

            <head><meta http-equiv='Content-Type' content='text/html; charset=euc-jp'>

            

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

                                        <img src='".$weburl."assets/images/logo.png' alt='Creating Email Magic' width='300' height='230' style='display: block;' />

                                    </td>

                                </tr>

                                <tr>

                                    <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>

                                        <table border='0' cellpadding='0' cellspacing='0' width='100%'>

                                            <tr>

                                                <td style='color: #153643; font-family: Arial, sans-serif; font-size: 20px; padding-bottom: 15px;'>

                                                    Hello<b> ".$cumstomername.",</b>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 30px;'>

                                                    Thanks for your order. Please see your order shipment's details below.<br/><br/>

                                                    Product Name: <b>".$producytname."</b><br/>
                                                    Creator: <b>".$get_venodrname."</b><br/>";
                                                    
                                                    if($get_filtersize != ""){
														$explode_data = explode(',', $get_filtersize);
														foreach($explode_data as $vertion_vale){
															$get_vertionvale = "SELECT * FROM product_variationsdata WHERE id='$vertion_vale'";
															$quyery_vertiondate = $conn->query($get_vertionvale);
															while($row_get_vertiondate = $quyery_vertiondate->fetch_array()){
																$ger_vertionvalid = $row_get_vertiondate['proval_trm_attid'];
																$ger_vertionval = $row_get_vertiondate['proval_trm_value'];

																$get_trem_vale = "SELECT * FROM product_attbut WHERE id='$ger_vertionvalid'";
																$query_tremvale = $conn->query($get_trem_vale);
																while($row_trem_name = $query_tremvale->fetch_array()){
																	$get_tem_name = $row_trem_name['pd_attbut_name'];
																}
														$message .= "$get_tem_name: <b>".$ger_vertionval."</b><br/>";
															}
														}
													}
                        $message .= "            	Product Price: <b>$".$x_amount."</b><br/>
                                                    Quantity: <b>".$get_quntenty."</b><br/>
                                                    Transaction ID: <b>".$get_tandid."</b><br/>
                                                    Shipping Company: <a href='".$get_teaking_link."'>".$get_companyanme."</a><br/>
                                                    Tracking Number: <b>".$get_traking_number."</b><br/>

                                                    You may track your order by visiting the 'Shipping Company' live link and entering your tracking number.<br/><br/><br/>

                                                    Thank you<br/>

                                                    Gallery La La<br/>

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

                                                    &copy; 2020 Gallery La La LLC. All Rights Reserved.<br/><br/>

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
            	return true;
            }
        	} // product loop
			} // customer order loop
			} // else loop
		}else{
			$get_shppingvale = "SELECT * FROM shipping_compy WHERE shipping_c_name='$alreday_shpname'";
			$con_queryvale = $conn->query($get_shppingvale);
			while($rowvlaefetch = $con_queryvale->fetch_array()){
				$get_shppinglink = $rowvlaefetch['shipping_c_tracklink'];
			}

			$update_shpiing = "UPDATE shipping_table SET mul_shipp_trakingname='$alreday_shpname',mul_shipp_shipptrakinid='$get_traking_number' WHERE mul_shipp_custid='$get_cumorid' AND mul_shipp_setid='$get_stid'";
			$queryshppinva = $conn->query($update_shpiing);

			/// shipping code				

			$get_creaternam = "SELECT * FROM vendor WHERE vendor_auto='$vendor_id'";
			$queryvendorprod = $conn->query($get_creaternam);
			while($rowvendorproduct = $queryvendorprod->fetch_array()){
				$get_venodrname = $rowvendorproduct['vendor_f_name'].' '.$rowvendorproduct['vendor_l_name'];
			}

			$get_customer = "SELECT * FROM customer WHERE customer_ui_id='$get_cumorid'";
			$queryvalecutmer = $conn->query($get_customer);
			while($rowgetcustoemr = $queryvalecutmer->fetch_array()){
				$cumstomername = $rowgetcustoemr['customer_fname'].' '.$rowgetcustoemr['customer_lname'];
			}
			
			$querycustome = "SELECT * FROM customer_order WHERE customer_id='$get_cumorid' AND p_serty_id='$get_stid'";
			$querygteproid = $conn->query($querycustome);
			while($rowgetproid = $querygteproid->fetch_array()){
				$get_proid = $rowgetproid['product_auto_id'];
				$get_filtercolor = $rowgetproid['p_filter_color'];
				$get_filtersize = $rowgetproid['p_filter_value'];
				$get_quntenty = $rowgetproid['p_qty'];
				$get_tandid = $rowgetproid['tnx_id'];
				$get_customerid = $rowgetproid['customer_id'];
				$get_proprice = $rowgetproid['p_price'];
				$custmerid = "SELECT * FROM userlogntable WHERE user_auto='$get_customerid'";
				$custvaledate = $conn->query($custmerid);
				while($rowcustoemrval = $custvaledate->fetch_array()){
					$customer_email = $rowcustoemrval['user_email'];
				}

				$get_shppingtable = "SELECT * FROM shipping_table WHERE mul_shipp_custid='$get_customerid' AND mul_shipp_setid='$get_stid'";
				$queryshippval = $conn->query($get_shppingtable);
				while($row_valeshpping = $queryshippval->fetch_array()){
					$get_taxmount = $row_valeshpping['mul_shipp_taxamunt'];
				}
				$get_priceval = $rowgetproid['p_price'];
				$get_shppinval = $rowgetproid['p_shpping_amount'];
				$totalamount = $get_priceval+$get_shppinval+$get_taxmount;

				$get_productval = "SELECT * FROM all_product WHERE product_auto_id='$get_proid'";
				$query_productval = $conn->query($get_productval);
				while($rowvaleproduct = $query_productval->fetch_array()){
					$producytname = $rowvaleproduct['product_name'];
					$producytstdesit = $rowvaleproduct['product_short_des'];
					$producytstrprice = $rowvaleproduct['product_regular_price'];
					$producytstspricet = $rowvaleproduct['product_sale_price'];
					$x_amount = $get_proprice;

			$to = $customer_email;
            $subject = "Your Gallery La La Order Shipment's Details";
            $from = "no-reply@jioitservices.com";
            $cc = "jioitservices@gmail.com";

            // To send HTML mail, the Content-type header must be set

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

             
            // Create email headers

            $headers .= 'From: '.$from."\r\n";
            $headers .= 'CC: '.$cc."\r\n";
            'X-Mailer: PHP/' . phpversion();

            $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

            <html xmlns='http://www.w3.org/1999/xhtml'>

            <head><meta http-equiv='Content-Type' content='text/html; charset=euc-jp'>

            

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

                                        <img src='".$weburl."assets/images/logo.png' alt='Creating Email Magic' width='300' height='230' style='display: block;' />

                                    </td>

                                </tr>

                                <tr>

                                    <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>

                                        <table border='0' cellpadding='0' cellspacing='0' width='100%'>

                                            <tr>

                                                <td style='color: #153643; font-family: Arial, sans-serif; font-size: 20px; padding-bottom: 15px;'>

                                                    Hello<b> ".$cumstomername.",</b>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 30px;'>

                                                    Thanks for your order. Please see your order shipment's details below.<br/><br/>

                                                    Product Name: <b>".$producytname."</b><br/>
                                                    Creator: <b>".$get_venodrname."</b><br/>
                                                    Short Description: <b>".$producytstdesit."</b><br/>";
                                                    if($get_filtersize != ""){
														$explode_data = explode(',', $get_filtersize);
														foreach($explode_data as $vertion_vale){
															$get_vertionvale = "SELECT * FROM product_variationsdata WHERE id='$vertion_vale'";
															$quyery_vertiondate = $conn->query($get_vertionvale);
															while($row_get_vertiondate = $quyery_vertiondate->fetch_array()){
																$ger_vertionvalid = $row_get_vertiondate['proval_trm_attid'];
																$ger_vertionval = $row_get_vertiondate['proval_trm_value'];

																$get_trem_vale = "SELECT * FROM product_attbut WHERE id='$ger_vertionvalid'";
																$query_tremvale = $conn->query($get_trem_vale);
																while($row_trem_name = $query_tremvale->fetch_array()){
																	$get_tem_name = $row_trem_name['pd_attbut_name'];
																}
														$message .= "$get_tem_name: <b>".$ger_vertionval."</b><br/>";
															}
														}
													}
                                $message .= "         Product Price: <b>$".$x_amount."</b><br/>
                                                    Quantity: <b>".$get_quntenty."</b><br/>
                                                    Transaction ID: <b>".$get_tandid."</b><br/>
                                                    Shipping Company: <a href='".$get_shppinglink."'>".$alreday_shpname."</a><br/>
                                                    Tracking Number: <b>".$get_traking_number."</b><br/><br/>

                                                    You may track your order by visiting the 'Shipping Company' live link and entering your tracking number.<br/><br/>

                                                    Thank you<br/>

                                                    Gallery La La<br/>

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

                                                    &copy; 2020 Gallery La La LLC. All Rights Reserved.<br/><br/>

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
            	return true;
            }
        	} // product loop
			} // customer order loop
			
		}
	}elseif($get_pagename == "completed-orders"){
		if($alreday_shpname == "other"){
			$querygetval = "SELECT * FROM shipping_compy WHERE shipping_c_name='$get_companyanme'";
			$queryvqaleus = $conn->query($querygetval);
			if($queryvqaleus->num_rows > 0){
				return false;
			}else{
				$insertnew_ent = "INSERT INTO shipping_compy(shipping_c_name,shipping_c_tracklink,shipping_c_date,shipping_c_time,shipping_c_status)VALUES('$get_companyanme','$get_teaking_link','$date','$time','1')";
				$query_update = $conn->query($insertnew_ent);

				$update_shpiing = "UPDATE shipping_table SET mul_shipp_trakingname='$get_companyanme',mul_shipp_shipptrakinid='$get_traking_number' WHERE mul_shipp_custid='$get_cumorid' AND mul_shipp_setid='$get_stid'";
				$queryshppinva = $conn->query($update_shpiing);
				return true;
			}
		}else{
			$update_shpiing = "UPDATE shipping_table SET mul_shipp_trakingname='$alreday_shpname',mul_shipp_shipptrakinid='$get_traking_number' WHERE mul_shipp_custid='$get_cumorid' AND mul_shipp_setid='$get_stid'";
			$queryshppinva = $conn->query($update_shpiing);
			return true;
		}
	}
}

function downloadproduct($vendor_id){
	global $conn;
	global $weburl;

	$ordercusto = "SELECT * FROM customer_order WHERE payment_response='1' ORDER BY id DESC";
	$queryorder = mysqli_query($conn,$ordercusto);
	while($roworder = mysqli_fetch_array($queryorder)){
		$tragshanid = $roworder['tnx_id'];
		$size_abbut = $roworder['p_filter_value'];
		$color_abbut = $roworder['p_filter_color'];
		$get_customerid = $roworder['customer_id'];
		$get_stryid = $roworder['p_serty_id'];
		$get_shippingfee = $roworder['p_shpping_amount'];
		$get_cumoterid = $roworder['customer_id'];
		$get_date = $roworder['p_date'];
		$get_shippingadd = $roworder['p_shipping_address'];

		$get_customer_name = "SELECT * FROM customer WHERE customer_ui_id='".$roworder['customer_id']."'";
		$query_customr = mysqli_query($conn,$get_customer_name);
		while($rowductomdata = mysqli_fetch_array($query_customr)){

			$get_product_name = "SELECT * FROM all_product WHERE product_auto_id='".$roworder['product_auto_id']."' AND product_vender_id='$vendor_id'";
			$querydata = mysqli_query($conn,$get_product_name);
			while($rowgetname = mysqli_fetch_array($querydata)){
				$skuvale = $rowgetname['product_sku'];
				$proddesction = $rowgetname['product_short_des'];
				$proname = $rowgetname['product_name'];
				$vendorid = $rowgetname['product_vender_id'];

				$get_shpinngdata = "SELECT * FROM shipping_table WHERE mul_shipp_setid='$get_stryid' AND mul_shipp_custid='$get_customerid'";
				$queryshpping = $conn->query($get_shpinngdata);
				while($rowvaledata = $queryshpping->fetch_array()){
					$get_trkingname = $rowvaledata['mul_shipp_trakingname'];
					$get_trkingid = $rowvaledata['mul_shipp_shipptrakinid'];
					$get_taxmout = $rowvaledata['mul_shipp_taxamunt'];
			
					$get_shppivale = "SELECT * FROM shipping_compy WHERE shipping_c_name='$get_trkingname'";
					$queryshppvale = $conn->query($get_shppivale);
					while($rowvalegetval = $queryshppvale->fetch_array()){
						$ups_linkata = $rowvalegetval['shipping_c_tracklink'];
					}
					if($get_shippingadd == "1"){
						$get_customeraddress = "SELECT * FROM customer WHERE customer_ui_id='$get_cumoterid'";
						$cutomeraddres = $conn->query($get_customeraddress);
						while($querycoutmerval = $cutomeraddres->fetch_array()){
							$get_countryname = $querycoutmerval['customer_country'];
						}
						$get_vondorname = "SELECT * FROM vendor WHERE vendor_auto='$vendorid'";
						$queryvendorval = $conn->query($get_vondorname);
						while($rowvenodrdata = $queryvendorval->fetch_array()){
							$get_countynamevendor = $rowvenodrdata['vendor_country'];
						}
						if($get_countryname == $get_countynamevendor){
							$domsatikfee = $roworder['p_price']+$get_taxmout+$get_shippingfee;
							$formnal = $domsatikfee*2.5/100;
						}else{
							$domsatikfee = $roworder['p_price']+$get_taxmout+$get_shippingfee;
							$formnal = $domsatikfee*4.6/100;
						}
						$tragshanfee = $formnal;
					}elseif($get_shippingadd == "2"){
						$get_customeraddress = "SELECT * FROM shpptoadds WHERE cust_to_id='$get_cumoterid' AND cust_to_date='$get_date'";
						$cutomeraddres = $conn->query($get_customeraddress);
						while($querycoutmerval = $cutomeraddres->fetch_array()){
							$get_countryname = $querycoutmerval['cust_to_country'];
						}
						$get_vondorname = "SELECT * FROM vendor WHERE vendor_auto='$vendorid'";
						$queryvendorval = $conn->query($get_vondorname);
						while($rowvenodrdata = $queryvendorval->fetch_array()){
							$get_countynamevendor = $rowvenodrdata['vendor_country'];
						}
						if($get_countryname == $get_countynamevendor){
							$domsatikfee = $roworder['p_price']+$get_taxmout+$get_shippingfee;
							$formnal = $domsatikfee*2.5/100;
						}else{
							$domsatikfee = $roworder['p_price']+$get_taxmout+$get_shippingfee;
							$formnal = $domsatikfee*4.6/100;
						}
						$tragshanfee = $formnal;
					}
					$proutcgllpertag = $roworder['p_price']*12.5/100;
					$totalcretorval = $tragshanfee+$proutcgllpertag;
					$hollamount = $roworder['p_price'];
					$createrfee = $hollamount-$totalcretorval;
					if($get_trkingid == "0"){
					}else{
						echo "<tr>
							<td>".$roworder['p_date']."</td>
							<td>".$tragshanid."</td>
							<td>".$rowductomdata['customer_fname']." ".$rowductomdata['customer_lname']."</td>
							<td>".$skuvale."</td>
							<td>".$proname."</td>
							<td>".$proddesction."</td>
							<td>".$roworder['p_qty']."</td>
							<td>".$size_abbut."</td>
							<td>".$color_abbut."</td>
							<td>$".$roworder['p_price']."</td>
							<td>".$get_trkingname."</td>
							<td>".$get_trkingid."</td>
							<td>".$ups_linkata."</td>
							<td>$".$get_shippingfee."</td>
							<td>$".$tragshanfee."</td>
							<td>$".$createrfee."</td>
							<td>$".$proutcgllpertag."</td>
						</tr>";
					}
				}
			}
		}
	}
}

function GetProductDataValTab($productautoid="0",$vendorautoid="0",$product_slug="0",$prodout_id="0"){
    global $conn;

    if($productautoid == "0"){
        if($vendorautoid == "0"){
            if($product_slug == "0"){
                if($prodout_id == "0"){
                    $get_product = "SELECT * FROM all_product ORDER BY id DESC";
                }else{
                    $get_product = "SELECT * FROM all_product WHERE id='$prodout_id'";
                }
            }else{
                $get_product = "SELECT * FROM all_product WHERE product_page_name='$product_slug' LIMIT 1";
            }
        }else{
            $get_product = "SELECT * FROM all_product WHERE product_vender_id='$vendorautoid'";
        }
    }else{
        $get_product = "SELECT * FROM all_product WHERE product_auto_id='$productautoid'";
    }
    $query_getprodut = $conn->query($get_product);
    while($row_getprosuct = $query_getprodut->fetch_array()){
        $arraypodutval[] = $row_getprosuct;
    }
    return $arraypodutval;
}

function GetProductPriceVal($prouct_autoid){
    global $conn;

    $prodt_valueata = "SELECT * FROM all_product WHERE product_status='1' AND product_auto_id='$prouct_autoid'";
    $query_price = $conn->query($prodt_valueata);
    while($row_priceval = $query_price->fetch_array()){
        $price_value = $row_priceval['product_regular_price'];
        $attbutvalcolor = $row_priceval['product_color'];
        $value_theravl = $prouct_autoid;

        if($price_value == "0" || $price_value == ""){

          $get_vertionprice = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$value_theravl'";
          $queryvaledat = $conn->query($get_vertionprice);
          while($rowgetdatval = $queryvaledat->fetch_array()){
            $get_total_regulor = $rowgetdatval['prot_trm_regulprc'];
            $sale_price = $rowgetdatval['prot_trm_saleprc'];
          }
          if($sale_price == "0" || $sale_price == ""){
            $sale_min = "SELECT MIN(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$value_theravl'";
            $sale_resultmin = $conn->query($sale_min);
            $sale_rowmin = $sale_resultmin->fetch_array();
            $sale_minvalmin = $sale_rowmin[0];

            $sale_max = "SELECT MAX(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$value_theravl'";
            $sale_resultmax = $conn->query($sale_max);
            $sale_rowmax = $sale_resultmax->fetch_array();
            $sale_minvalmax = $sale_rowmax[0];
            if($sale_minvalmin == $sale_minvalmax){
              $price = "<ins id='p_price' data-id='$get_total_regulor'>$".number_format($get_total_regulor, 2)."</ins>";
            }else{
              $price = "<ins>$".number_format($sale_minvalmin, 2)."</ins> - <ins id='p_price' data-id='$sale_minvalmax'>$".number_format($sale_minvalmax, 2)."</ins>";
            }
          }else{
            $sale_min = "SELECT MIN(prot_trm_saleprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$value_theravl'";
            $sale_resultmin = $conn->query($sale_min);
            $sale_rowmin = $sale_resultmin->fetch_array();
            $sale_minvalmin = $sale_rowmin[0];

            $sale_max = "SELECT MAX(prot_trm_saleprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$value_theravl'";
            $sale_resultmax = $conn->query($sale_max);
            $sale_rowmax = $sale_resultmax->fetch_array();
            $sale_minvalmax = $sale_rowmax[0];
              if($sale_minvalmin == $sale_minvalmax){
                $price = "<del>₹".number_format($get_total_regulor, 2)."</del><ins id='p_price' data-id='$sale_minvalmin'>₹".number_format($sale_minvalmin, 2)."</ins>";
              }else{
                $price = "<ins id='p_price' data-id='$sale_minvalmin'>₹".number_format($sale_minvalmin, 2)."</ins> - <ins id='p_price' data-id='$sale_minvalmax'>₹".number_format($sale_minvalmax, 2)."</ins>";
              }
          }
        }else{
            if($row_priceval['product_sale_price'] == ""){
                 $price = "<ins id='p_price' data-id='".$row_priceval['product_regular_price']."'>₹".number_format($row_priceval['product_regular_price'], 2)."</ins>";
              }else{
                $price = "<del>₹".number_format($row_priceval['product_regular_price'], 2)."</del><ins id='p_price' data-id='".$row_priceval['product_sale_price']."'>₹".$row_priceval['product_sale_price']."</ins>";
            }
        }
    }
    return $price;
}

function USATimeZoneSettime($timeverble){

	$imevaleset = date("m-d-Y", strtotime($timeverble));

	return $imevaleset;
}

/*====================================
        Add New Products
=====================================*/
function AddNewPageOneTime(){
    global $conn, $date, $time, $url, $ip, $auto_id;

    $unqidva = $auto_id;
    $addpageval = "INSERT INTO all_product(product_auto_id,product_status,product_shppin_domst,product_shppin_inters)VALUES('$unqidva','0','12','20')";
    $query_paegeval = $conn->query($addpageval);
    $ge_valeurl = $conn->insert_id;
    $url_return = $url."/addnewproduct/?pageid=".$ge_valeurl."&autoid=".$unqidva;
    return $url_return;
}
function get_attbutval(){
    global $conn, $url;

    $get_attbut = "SELECT * FROM product_attbut";
    $queryvaldat = $conn->query($get_attbut);
    while($rowgetvaldata = $queryvaldat->fetch_array()){
        $get_id_name = $rowgetvaldata['id'];
        $get_nameval = $rowgetvaldata['pd_attbut_name'];

        echo "<option value='$get_id_name|$get_nameval'>$get_nameval</option>";
    }
}
function ge_show_attbutval($get_attseion,$get_idsale){
    global $conn, $url;
    $arrayvaledt = $get_attseion.','.$get_idsale;
    $array_vale = explode(',', $arrayvaledt);
    foreach($array_vale as $abutvalvalue) {
        $get_data_value = "SELECT * FROM product_active_attbut WHERE attbut_productid='$abutvalvalue'";
        $query_datavale = $conn->query($get_data_value);
        while($rowqueryval = $query_datavale->fetch_array()){
            $get_sessionval = $rowqueryval['attbut_id'];
            $get_idmain = $rowqueryval['id'];

            $selectget_valudata = "SELECT * FROM product_attbut WHERE id='$get_sessionval'";
            $queryfetnam = $conn->query($selectget_valudata);
            while($rowvaldatafet = $queryfetnam->fetch_array()){
                $get_name_valeatt = $rowvaldatafet['pd_attbut_name'];
            }
            echo '<div class="datarow">                                        
                  <div class="card-header" role="tab" id="'.$get_sessionval.'">
                    <h5 class="mb-0">
                      <a data-toggle="collapse" href="#'.$get_sessionval.'" data-parent="#content" aria-expanded="true" aria-controls="'.$get_sessionval.'">
                            '.$get_name_valeatt.'
                            <span></span>
                          </a>
                    </h5>
                  </div>
                  <div id="'.$get_sessionval.'" class="collapse show" role="tabpanel" aria-labelledby="'.$get_sessionval.'">
                    <div class="card-body">
                      <div class="data-container">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                <p>Value(s):</p>';
            echo "<div id='load-datasetion'>";
            echo '<select class="select2 mutliselctoption" multiple="multiple" data-placeholder="Select a '.$get_name_valeatt.'" style="width: 100%;" name="multidata[]">';
            $get_vetiondata = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='$abutvalvalue'";
            $queryvaleat = $conn->query($get_vetiondata);
            while($row_get_vale = $queryvaleat->fetch_array()){
                $get_values_data[] = $row_get_vale['proval_trm_value'];
            }
            //print_r($get_values_data);
            $selevaledat = "SELECT * FROM product_attbut_value WHERE prod_attname_id='$get_sessionval'";
            $cehckteramval = $conn->query($selevaledat);
            while($rowteramval = $cehckteramval->fetch_array()){
                if(in_array($rowteramval['prod_attname_name'], $get_values_data)){
                    echo $get_termvalue = "<option value='".htmlentities($rowteramval['prod_attname_name'], ENT_QUOTES)."|".$get_sessionval."|".$abutvalvalue."' selected>".$rowteramval['prod_attname_name']."</option>";
                }else{
                    echo $get_termvalue = "<option value='".htmlentities($rowteramval['prod_attname_name'], ENT_QUOTES)."|".$get_sessionval."|".$abutvalvalue."'>".$rowteramval['prod_attname_name']."</option>";
                }
            }
            echo '</select>';
            echo "</div>";
                            echo '</div>';
                            echo '</div>
                        </div>

                      </div>
                    </div>
                  </div>
              </div>';
            echo "<p class='btn btn-danger removeabbut' data-id='$abutvalvalue|$get_idmain|$get_sessionval'>Delete</p>";
        }
    }
}
function show_trem_val($get_attseion,$setidsvale){
    global $conn, $url;

    $explodevale = $get_attseion.','.$setidsvale;
    echo '<div class="datarow insert-val">';
    echo '<div class="card-header" role="tab" id="heading-A"><div class="row">';
    $xplode_dataval = explode(',', $explodevale);
    foreach($xplode_dataval as $termvalue){
        $get_main_attbut = "SELECT * FROM product_active_attbut WHERE attbut_productid='$termvalue'";
        $queryatbutmain = $conn->query($get_main_attbut);
        while($rowgetmainabtu = $queryatbutmain->fetch_array()){
            $get_sizevale = $rowgetmainabtu['attbut_id'];

            $get_nameabbut = "SELECT * FROM product_attbut WHERE id='$get_sizevale'";
            $queyvalabbut = $conn->query($get_nameabbut);
            while($rowgetabbutnae = $queyvalabbut->fetch_array()){
                $get_abbutname = $rowgetabbutnae['pd_attbut_name'];

                    echo '<div class="col-md-3 form-group"><select class="attbuteval form-control" name="getattbut[]">
                        <option value="0">Select '.$get_abbutname.'</option>';

                        $get_termvaleu = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='$termvalue' AND proval_trm_attid='$get_sizevale' ORDER BY proval_trm_value ASC";
                        $queryvaldatul = $conn->query($get_termvaleu);
                        while($rowvaltrmval = $queryvaldatul->fetch_array()){
                            echo '<option value="'.$rowvaltrmval['id'].'">'.$rowvaltrmval['proval_trm_value'].'</option>';
                        }

                echo '</select></div>';
            }
        }
    }
    echo '</div></div>';
    echo '<div class="card-body">
             <div class="data-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Regular Price (₹)</label>
                                    <input type="text" class="form-control regpricever" name="regpricever" value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Sale Price (₹)</label>
                                    <input type="text" class="form-control salepricever" name="salepricever" value="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" class="form-control quantyver" name="quantyver" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>Low stock threshold</label>
                                    <input type="number" class="form-control lowstockvale" name="lowstockvale">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>';
        echo '</div>';
    echo '</div>';
}
function vertionattbut($sesinovertion,$setvaletvl){
    global $conn, $url;

    $arrayexplovael = $sesinovertion.','.$setvaletvl;

    $explodearryval = explode(',', $arrayexplovael);
    echo '<tr>';
    foreach($explodearryval as $valtermedit){
        //$lastidval = "22";
        $get_main_attbut = "SELECT * FROM product_active_attbut WHERE attbut_productid='$valtermedit'";
        $queryatbutmain = $conn->query($get_main_attbut);
        while($rowgetmainabtu = $queryatbutmain->fetch_array()){
            $get_sizevale = $rowgetmainabtu['attbut_id'];

            $get_nameabbut = "SELECT * FROM product_attbut WHERE id='$get_sizevale'";
            $queyvalabbut = $conn->query($get_nameabbut);
            while($rowgetabbutnae = $queyvalabbut->fetch_array()){
                $get_abbutname = $rowgetabbutnae['pd_attbut_name'];

                    echo '<th>'.$get_abbutname.'</th>';
            }
        }
    }
    echo '<th>Regular Price</th>';
    echo '<th>Sale Price</th>';
    echo '<th>Quantity</th>';
    echo '<th>Low stock threshold</th>';
    echo '<th>Edit</th>';
    echo '<th>Delete</th>';
    echo '</tr>';
    //echo $implvale;
    //$itremtrimval = ltrim($implvale, ',');
    //print_r($get_vertionids);
    echo "<tbody class='set_tablevale'>";
    $blank = "";
    $verionvalset = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$sesinovertion' AND prot_trm_postion='$blank' OR prot_trm_prodtid='$setvaletvl' AND prot_trm_postion='$blank'";
    $vertsetser = $conn->query($verionvalset);
    if($vertsetser->num_rows > 0){
        $vertionvale = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$sesinovertion' OR prot_trm_prodtid='$setvaletvl' ORDER BY id ASC";
    }else{
        $vertionvale = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$sesinovertion' OR prot_trm_prodtid='$setvaletvl' ORDER BY CAST(prot_trm_postion AS UNSIGNED INTEGER)";
    }
    $vertionval = $conn->query($vertionvale);
    while($row_query_val = $vertionval->fetch_array()){
        $get_idval = $row_query_val['prot_trm_id'];
        $get_id = $row_query_val['id'];
        $get_regulprice = $row_query_val['prot_trm_regulprc'];
        $get_saleprice = $row_query_val['prot_trm_saleprc'];
        $get_quyval = $row_query_val['prot_trm_quantity'];
        $get_lowstock = $row_query_val['prot_trm_lowstck'];

        $get_idecplode = explode(',', $row_query_val['prot_trm_id']);

    echo '<tr id="'.$row_query_val['id'].'-'.$row_query_val['prot_trm_id'].'" data-id="'.$row_query_val['prot_trm_postion'].'">';

    foreach ($get_idecplode as $valuename) {
        //echo $valuename;
        $get_vertionname = "SELECT * FROM product_variationsdata WHERE id='$valuename' ORDER BY CAST(proval_trm_postion AS UNSIGNED INTEGER)";
        $query_queryvtrem = $conn->query($get_vertionname);
        while($rowget_fethvertion = $query_queryvtrem->fetch_array()){
            $get_name_vertion = $rowget_fethvertion['proval_trm_value'];
            echo '<td id="'.$rowget_fethvertion['proval_trm_postion'].'">'.$get_name_vertion.'</td>';
        }
    }
    echo '<td>'.$get_regulprice.'</td>';
    echo '<td>'.$get_saleprice.'</td>';
    echo '<td>'.$get_quyval.'</td>';
    echo '<td>'.$get_lowstock.'</td>';
    echo '<td onclick="dataedit('.$get_id.')" data-id="'.$get_id.'" class="editvertion" data-toggle="modal" data-target="#exampleModal">Edit</td>';
    echo '<td onclick="deletdataval('.$get_id.')" data-id="'.$get_id.'" class="delectvertion">Delete</td>';
    echo '</tr>';
    }
    echo "</tbody>";
}
function ProductInnercategoryTree($main_catfory="0",$parent_id = 0, $sub_mark = ''){
    global $conn, $date, $time, $url, $ip;

    echo '<div class="catgoyval">';
    if($parent_id == "0"){
        $query = $conn->query("SELECT * FROM product_categories WHERE prd_cat_prent_categ = $parent_id AND prd_cat_hidevale='1' ORDER BY CAST(prd_cat_postion AS UNSIGNED INTEGER)");
    }else{
        $query = $conn->query("SELECT * FROM product_categories WHERE prd_cat_prent_categ = $parent_id AND prd_cat_hidevale='1' ORDER BY prd_cat_name ASC");
    }
    if($query->num_rows > 0){
        while($row = $query->fetch_array()){
            echo '<div class="catgoyval"><input type="checkbox" value="'.$row['prd_cat_slug'].'|'.$row['id'].'" name="prodt_cat[]"';
            if(in_array($row['id'], explode(',', $main_catfory))){
                echo "checked";
            }
            echo '> '.$sub_mark.$row['prd_cat_name']."</div>";
                ProductInnercategoryTree($main_catfory,$row['id'], $sub_mark.'');
        }
    }
    echo '</div>';
}
function GetProductSmallImage($get_productautoid,$limit="0"){
    global $conn, $date, $time, $url, $ip;
    
    if($limit == "0"){
        $product_imgval = "SELECT * FROM product_mutli_image WHERE produt_id='$get_productautoid' ORDER BY img_postion ASC, id ASC";
    }else{
        $product_imgval = "SELECT * FROM product_mutli_image WHERE produt_id='$get_productautoid' ORDER BY img_postion ASC, id ASC LIMIT $limit";
    }
    $query_multiimag = $conn->query($product_imgval);
    while($row_imgvalary = $query_multiimag->fetch_array()){
        $array_multiimg[] = $row_imgvalary;
    }
    return $array_multiimg;
}
function DeleteALlDataVlae($deltetable,$deletid){
    global $conn, $date, $time, $url;

    $delete_datavale = "DELETE FROM $deltetable WHERE $deletid";
    $query_deltval = $conn->query($delete_datavale);
    return true;
}
function ChakingProductName($prodtaddname){
    global $conn, $url, $auto_id;

    $chekiname = "SELECT * FROM all_product WHERE product_name='$prodtaddname'";
    $queryvale = $conn->query($chekiname);
    if($queryvale->num_rows > 1){
        $namepagenae = $prodtaddname.'-'.$auto_id;
    }else{
        $namepagenae = $prodtaddname;
    }
    return $namepagenae;
}
function makeurl($str){
    if($str !== mb_convert_encoding( mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32') )
     $str = mb_convert_encoding($str, 'UTF-8', mb_detect_encoding($str));
     $str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');
     $str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '1', $str);
     $str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
     $str = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), '-', $str);
     $str = strtolower( trim($str, '-') );
     return $str;
}
function images_upload($image_name){
    global $file_path;
    $undate = rand();
    $floder_path_name = $file_path;
    $client_img_name = $_FILES[$image_name]['name'];
    $client_img_size = $_FILES[$image_name]['size'];
    $client_img_tmp = $_FILES[$image_name]['tmp_name'];
    $client_img_type = $_FILES[$image_name]['type'];
    if($client_img_name != ""){
        $fileData = pathinfo(basename($client_img_name));
        $single_imag_name = $undate;
        $clint_logo_val = $single_imag_name.'.'.$fileData['extension'];
    }else{
        $clint_logo_val = "0";
    }
    return $clint_logo_val;
}
function AddNewProudtcvaleimages($prodtaddallimag,$_get_pageautid){
    global $conn, $url, $file_path;

    $floder_path_name = trim($file_path);
    $myfile = $prodtaddallimag;
    $keepName = false; // change this for file name.
    $response = array();
    for ($i = 0; $i < count($myfile["name"]); $i++) {
        if ($myfile["name"][$i] <> "" && $myfile["error"][$i] == 0) {
            $randiddata = rand(88888,99999999);
                $file_extention = @strtolower(@end(@explode(".", $myfile["name"][$i])));
                $file_name = date("Ymd") . '_' . rand(10000, 990000) . '.' . $file_extention;
            if (move_uploaded_file($myfile["tmp_name"][$i], "$floder_path_name/$file_name") === FALSE) {
                //Set Original File Name if Upload Error
                $response[] = array ('error'=>true,'msg'=>"Error While Uploading the File",'fileName'=>$myfile["name"][$i]);
            } else {
                $insertmutliimgprod = "INSERT INTO product_mutli_image(produt_img,produt_auto_id,produt_id)VALUES('$file_name','$randiddata','$_get_pageautid')";
                $queryinsertmutl = $conn->query($insertmutliimgprod);
            }
        }
    }
}
function UpdateAllDataFileds($updatetablename,$update_datafiled,$_getupdateid){
    global $conn, $date, $time, $url;

    $update_datahol = "UPDATE $updatetablename SET $update_datafiled WHERE $_getupdateid";
    $query_valedat = $conn->query($update_datahol);
    return true;
}
?>