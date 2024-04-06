<?php
error_reporting(0);
include_once('config_db/conn_connect.php');
/*include_once('directory/url.php');
echo $url = get_template_directory();*/
$conn = conndata();
date_default_timezone_set('Asia/Kolkata');
/*=========================================*/
/*============ vendor Section =============*/
/*=========================================*/
function allvendorstep(){
    global $conn;
	global $url;
 	$sql = "SELECT vendor.vendor_f_name, vendor.vendor_l_name, vendor.vendor_auto, vendor.vendor_img, vendor.vendor_uni_name, vendor.vendor_company, vendor.vendor_date, vendor.vendor_time, userpermission.user_p_id, banners.bannerName FROM vendor INNER JOIN banners ON banners.uid = vendor.vendor_auto AND banners.status = 'active' INNER JOIN userpermission ON userpermission.user_p_id = vendor.vendor_auto AND userpermission.user_p_block = '0'  GROUP BY vendor.vendor_f_name";
	$qry = mysqli_query($conn,$sql);
	if(mysqli_num_rows($qry)){
    	while($row = mysqli_fetch_array($qry)){
    	    $get_vendor_id = $row['vendor_auto'];
    	    
    	    $bannervale = "SELECT * FROM banners WHERE status='active' AND uid='$get_vendor_id' AND type='vendor'";
    	    $queryvlabann = mysqli_query($conn,$bannervale);
    	    if(mysqli_num_rows($queryvlabann)){
    	        
    	        $firstName = $row['vendor_f_name'];
    			$lastName = $row['vendor_l_name'];
    			$iconImg = $row['vendor_img'];
    			$bannerImg = $row['bannerName'];
    			$vendorId = $row['vendor_auto'];
    			$vendoruiname = $row['vendor_uni_name'];
    			if(empty($bannerImg)){
    				$bannerImg = 'slide2.jpg';
    			}else{
    				$bannerImg = $row['bannerName'];
    			}
    			if(empty($iconImg)){
    				$iconImg = 'logo.png';
    			}else{
    				$iconImg = $row['vendor_img'];
    			}
    			$dateval = $row['vendor_date'];
    			$timeval = $row['vendor_time'];
    			$uploadDate = date('d-M-Y', strtotime($dateval));
    			$uploadTime = date('h:i:s a', strtotime($timeval));
    			echo '<li>
                    <div class="video-item-wrap">
                      <div class="item-creator-img">
                        <img src="'.$url.'/assets/images/store-slider/'.$bannerImg.'" height="150">';
                        if($row['vendor_company'] == ""){
                        	echo '<h3><a href="'.$url.'/'.$vendoruiname.'">'.$firstName.' '.$lastName.'</a></h3>';
                        }else{
                        	echo '<h3><a href="'.$url.'/'.$vendoruiname.'">'.$row['vendor_company'].'</a></h3>';
                        }
                echo '</div>
                      <div class="creator-img">
                        <img src="'.$url.'/assets/images/vendor_images/'.$iconImg.'">
                      </div>
                      <div class="creator-store">
                        <a href="'.$url.'/'.$vendoruiname.'">Visit Store</a>
                      </div>                  
                    </div>
                  </li>';
    	    }else{
    	        $firstName = $row['vendor_f_name'];
    			$lastName = $row['vendor_l_name'];
    			$iconImg = $row['vendor_img'];
    			$vendorId = $row['vendor_auto'];
    			$vendoruiname = $row['vendor_uni_name'];
    			if(empty($iconImg)){
    				$iconImg = 'logo.png';
    			}else{
    				$iconImg = $row['vendor_img'];
    			}
    			$dateval = $row['vendor_date'];
    			$timeval = $row['vendor_time'];
    			$uploadDate = date('d-M-Y', strtotime($dateval));
    			$uploadTime = date('h:i:s a', strtotime($timeval));
    			echo '<li>
                    <div class="video-item-wrap">
                      <div class="item-creator-img">
                        <img src="'.$url.'/assets/images/store-slider/" height="150">';
                        if($row['vendor_company'] == ""){
                        	echo '<h3><a href="'.$url.'/'.$vendoruiname.'">'.$firstName.' '.$lastName.'</a></h3>';
                        }else{
                        	echo '<h3><a href="'.$url.'/'.$vendoruiname.'">'.$row['vendor_company'].'</a></h3>';
                        }
                echo '</div>
                      <div class="creator-img">
                        <img src="'.$url.'/assets/images/vendor_images/'.$iconImg.'">
                      </div>
                      <div class="creator-store">
                        <a href="'.$url.'/'.$vendoruiname.'">Visit Store</a>
                      </div>                  
                    </div>
                  </li>';
    	    }
    	}
	}else{
	    echo "<li>No Vendors Found</li>";
	}
}

function allvendors(){
	global $conn;
	global $url;
 	$sql = "SELECT vendor.vendor_f_name, vendor.vendor_l_name, vendor.vendor_auto, vendor.vendor_img, vendor.vendor_uni_name, vendor.vendor_company, vendor.vendor_date, vendor.vendor_time, banners.bannerName, userpermission.user_p_id FROM vendor INNER JOIN banners ON banners.uid = vendor.vendor_auto AND banners.status = 'active' INNER JOIN userpermission ON userpermission.user_p_id = vendor.vendor_auto AND userpermission.user_p_block = '0'  GROUP BY vendor.vendor_f_name";
	$qry = mysqli_query($conn,$sql);
	$count = 1;
	$numRows = mysqli_num_rows($qry);
	if(mysqli_num_rows($qry) !=  0 ){
		while($row = mysqli_fetch_array($qry)){
			$firstName = $row['vendor_f_name'];
			$lastName = $row['vendor_l_name'];
			$iconImg = $row['vendor_img'];
			$bannerImg = $row['bannerName'];
			$vendorId = $row['vendor_auto'];
			$vendoruiname = $row['vendor_uni_name'];
			if(empty($bannerImg)){
				$bannerImg = 'slide2.jpg';
			}else{
				$bannerImg = $row['bannerName'];
			}
			if(empty($iconImg)){
				$iconImg = 'logo.png';
			}else{
				$iconImg = $row['vendor_img'];
			}
			$dateval = $row['vendor_date'];
			$timeval = $row['vendor_time'];
			$uploadDate = date('d-M-Y', strtotime($dateval));
			$uploadTime = date('h:i:s a', strtotime($timeval));
			echo '<li>
                <div class="video-item-wrap">
                  <div class="item-creator-img">
                    <img src="'.$url.'/assets/images/store-slider/'.$bannerImg.'" height="150">';
                    if($row['vendor_company'] == ""){
                    	echo '<h3><a href="'.$url.'/'.$vendoruiname.'">'.$firstName.' '.$lastName.'</a></h3>';
                    }else{
                    	echo '<h3><a href="'.$url.'/'.$vendoruiname.'">'.$row['vendor_company'].'</a></h3>';
                    }
            echo '</div>
                  <div class="creator-img">
                    <img src="'.$url.'/assets/images/vendor_images/'.$iconImg.'">
                  </div>
                  <div class="creator-store">
                    <a href="'.$url.'/'.$vendoruiname.'">Visit Store</a>
                  </div>                  
                </div>
              </li>';
              //echo $rowupid = "0";
	    $count++;
		}	
	}else{
		echo "<li>No Vendors Found</li>";
	}
}


/*=========================================*/
/*============ Shop Section =============*/
/*=========================================*/

function allProduct($get_query){
	global $conn;
	global $url;
$url = "https://www.gallerylala.com";
echo "<ul class='producfilter-item'>";

	$limit = 12;  
	if(isset($_GET["page"])) {
		$page  = $_GET["page"];
	}else{
		$page=1;
	}
	$start_from = ($page-1) * $limit;

	$showRecordPerPage = 12;
	if(isset($_GET['page']) && !empty($_GET['page'])){
	$currentPage = $_GET['page'];
	}else{
	$currentPage = 1;
	}
	$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
	$totalEmpSQL = "SELECT * FROM all_product";
	$allEmpResult = mysqli_query($conn, $totalEmpSQL);
	$totalEmployee = mysqli_num_rows($allEmpResult);
	$lastPage = ceil($totalEmployee/$showRecordPerPage);
	$firstPage = 1;
	$nextPage = $currentPage + 1;
	$previousPage = $currentPage - 1;

	if(isset($_GET['type'])){

		$get_price_vale = explode('-', $get_query);
		$lowprice_val = $get_price_vale[0];
		$higprice = $get_price_vale[1];

		$sql = "SELECT * FROM all_product WHERE product_status='1' AND product_regular_price BETWEEN '$lowprice_val' AND '$higprice'";
	}elseif($get_query == "0"){
		$sql = "SELECT * FROM all_product WHERE product_status='1' ORDER BY RAND() DESC LIMIT $startFrom, $showRecordPerPage";
	}elseif($get_query == "latest"){
		$sql = "SELECT * FROM all_product WHERE product_status='1' ORDER BY id DESC LIMIT 6";
	}elseif($get_query == "low_price"){

		$get_lowprice = "SELECT MIN(product_regular_price) FROM all_product";
		$queryval = mysqli_query($conn,$get_lowprice);
		$vallowqyeru = mysqli_fetch_array($queryval);
		$show_val = $vallowqyeru[0];

		$sql = "SELECT * FROM all_product WHERE product_regular_price>='$show_val' AND product_status='1'  ORDER BY `product_regular_price` ASC LIMIT 12";
	}elseif($get_query == "high_price"){

		$get_higprice = "SELECT MAX(product_regular_price) FROM all_product WHERE product_status='1'";
		$queryvalhig = mysqli_query($conn,$get_higprice);
		$vallowqyeruhig = mysqli_fetch_array($queryvalhig);
		$show_valhigh = $vallowqyeruhig[0];

		$sql = "SELECT * FROM all_product WHERE product_regular_price<='$show_valhigh' AND product_status='1' ORDER BY `product_regular_price` DESC LIMIT 10";
	}else{

	$cehck_productname = "SELECT * FROM all_product WHERE product_name LIKE '%$get_query%' AND product_status='1'";
	$query_cehck = mysqli_query($conn,$cehck_productname);
	if(mysqli_num_rows($query_cehck)){
		$singlqprod = $get_query;

		$sql = "SELECT * FROM all_product WHERE product_name LIKE '%$get_query%' AND product_status='1'";
	}else{
		$chksku = "SELECT * FROM all_product WHERE product_sku LIKE '%$get_query%' AND product_status='1'";
		$skuquery = mysqli_query($conn,$chksku);
		if(mysqli_num_rows($skuquery)){
			$sql = "SELECT * FROM all_product WHERE product_sku LIKE '%$get_query%' AND product_status='1'";
		}else{
			$sql = "SELECT * FROM all_product WHERE product_status='1' ORDER BY id DESC LIMIT $start_from, $limit";
		}
	}
	}
	//$sql = "SELECT * FROM all_product WHERE product_name LIKE '%$get_query%' AND product_status='1'";
	$qry = mysqli_query($conn,$sql);
	$count = 1;
	$numRows = mysqli_num_rows($qry);
	if(mysqli_num_rows($qry) !=  0 ){
		while($row = mysqli_fetch_array($qry)){
			$pId = $row['id'];
			$pName = $row['product_name'];
			$product_fash_pageurl = $row['product_page_name'];
			$regPrice = $row['product_regular_price'];
			$salePrice = $row['product_sale_price'];
			$produtautoid = $row['product_auto_id'];
			$vendorid = $row['product_vender_id'];
			$stock = $row['product_stock'];
			$attbutval = $row['product_size'];
			$attbutvalcolor = $row['product_color'];

			if(!empty($salePrice)){
				$finalPrice = $salePrice;
			}else{
				$finalPrice = $regPrice;
			}
			$productImg = $row['product_image'];
			//$productDes = substr($row['product_destion'], 0, 50);

			$singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";
			$queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);
			while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){
				$singl_image_val = $rowallimges_one['produt_img'];
			}

			$pieces = explode(" ", $pName);
			$first_part = implode(" ", array_splice($pieces, 0, 4));
			
			$get_vendro_naem = "SELECT * FROM vendor WHERE vendor_auto='$vendorid'";
			$querydata = mysqli_query($conn,$get_vendro_naem);
			while($rowsinglval = mysqli_fetch_array($querydata)){
				$firstnam = $rowsinglval['vendor_f_name'];
				$lasttnam = $rowsinglval['vendor_l_name'];
			}
			echo '<li>
                <div class="fas-item-wrap">';
                if($row['product_approve_stmp'] == "1"){
                  	echo "<div class='approve-stemp'>
                  			<img src='$url/assets/images/stamp-of-approval-new.png' title='Approved by Gallery LaLa'>
                  		</div>";
                }
                echo '<a href="'.$url.'/'.$row['product_page_name'].'">
                  <div class="item-img">
                    <img src="'.$url.'/assets/images/product-img/'.$productImg.'">
                    <img src="'.$url.'/assets/images/product-img/'.$singl_image_val.'">
                  </div>
                  </a>
                  <div class="item-txt">
                    <div class="item-title">'.$firstnam.' '.$lasttnam.'</div>
                    <div class="item-dis">'.$first_part.'</div>';
                    if($row['product_sale_price'] == ""){
                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($row['product_regular_price'], 2)."</div></div>";
                      }else{
                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($row['product_sale_price'], 2)."</div>";
                        echo "<div class='pric_dis'><span>$</span>".number_format($row['product_regular_price'], 2)."</div></div>";
                      }
                    if($stock == "0"){
                    echo '<div class="item-cart"><button class="alert alert-danger unavailable">Out of Stock</button></div>';
                    }else{
                    	if($attbutval != ''){
	               			echo "<div class='item-cart'><button class='selectopt'><a href='$url/$product_fash_pageurl'>Select Option</a></button></div>";
	               		}elseif($attbutvalcolor != ''){
	               			echo "<div class='item-cart'><button class='selectopt'><a href='$url/$product_fash_pageurl'>Select Option</a></button></div>";
	               		}else{
	               			echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
	               		}
                    }
            echo'</div>
                
                </div>
              </li>';
		}

	}else{
		echo "<li>No Vendors Found</li>";
	}
	echo "</ul>";

	echo "<div class='product-pager'>
	<ul class='pagination'>";
	echo "<li class='page-item total-page no-of-page'><p aria-hidden='true'>Page: $currentPage of $lastPage</p></li>";
	if($currentPage != $firstPage) {
	$privepage = $currentPage-1;
	echo "<li class='page-item'>
	<a class='page-link' href='?page=$privepage' tabindex='-1' aria-label='Previous'>
	<span aria-hidden='true'><</span>
	</a>
	</li>";
	}
	if($currentPage >= 2) {
	echo "<li class='page-item'><a class='page-link' href='?page=$previousPage'>$previousPage</a></li>";
	}
	echo "<li class='page-item active'><a class='page-link' href='?page=$currentPage'>$currentPage</a></li>";
	if($currentPage != $lastPage) {
	echo "<li class='page-item'><a class='page-link' href='?page=$nextPage'>$nextPage</a></li>
	<li class='page-item'><a class='page-link' href='?page=$nextPage'>></a></li>";
	}
	echo "</ul>
	</div>";
}

// show customer information
function customerData($custid){
	global $conn;
	$sql = "SELECT * FROM customer INNER JOIN userlogntable ON userlogntable.user_auto = customer.customer_ui_id WHERE customer_ui_id='$custid'";
	$qry = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($qry)){
		$resultset = $row;
	}
	return $resultset;
}

// show state
function states(){
	global $conn;
	$sql = "SELECT * FROM shiptaxval WHERE shiptx_type = 'Tax' ORDER BY shiptx_value";
	$qry = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($qry)){
		$resultset .= '<option value="'.$row['shiptx_value'].'">'.$row['shiptx_value'].'</option>';
	}
	return $resultset;
}

function urlmakeid($get_val){
	global $conn;
	global $vid_auto_id;
	$getvendorid = "SELECT * FROM vendor WHERE vendor_uni_name='$get_val'";
	$queryvalid = mysqli_query($conn,$getvendorid);
	while($rowdataid = mysqli_fetch_array($queryvalid)){
		$vid_auto_id = $rowdataid['vendor_auto'];
	}
	return $vid_auto_id;
}

function vendorProfile($singvenderid){
	global $conn;
	global $url;
	$venderprofile_img = "SELECT * FROM vendor WHERE vendor_auto='$singvenderid'";
	$queryprofiimg = mysqli_query($conn,$venderprofile_img);
	while($rowvenderleftdata = mysqli_fetch_array($queryprofiimg)){
		echo "<div class='store-image'>
				<span>";
				if($rowvenderleftdata['vendor_img'] == ""){
					echo "<img src='$url/assets/images/vendor_images/logo.png'>";
				}else{
					echo "<img src='$url/assets/images/vendor_images/".$rowvenderleftdata['vendor_img']."'>";
				}
				echo"</span>
			</div>
			<div class='store-name'>".$rowvenderleftdata['vendor_f_name']." ".$rowvenderleftdata['vendor_l_name']."</div>";
	}
}

function showmakname($singvenderid){
	global $conn;

	$showname = "SELECT * FROM vendor WHERE vendor_auto='$singvenderid'";
	$queryname = mysqli_query($conn,$showname);
	while($rowval = mysqli_fetch_array($queryname)){
		$compnayname = $rowval['vendor_company'];
		$vendorfname = $rowval['vendor_f_name'];
		$vendorlname = $rowval['vendor_l_name'];
		if($compnayname == ""){
			echo "$vendorfname $vendorlname";
		}else{
			echo $compnayname;
		}
	}
}

function vendorSlider($singvenderid){
	global $conn;
	global $url;
	$venderprofile_banner = "SELECT * FROM banners WHERE uid='$singvenderid' AND type='vendor' AND status='active' LIMIT 1";
	$queryproilebaner = mysqli_query($conn,$venderprofile_banner);
	while($rowvenderrightdata = mysqli_fetch_array($queryproilebaner)){
		echo "<div class='vendor-banner'>
                <img src='$url/assets/images/store-slider/".$rowvenderrightdata['bannerName']."'>                 
              </div>";
	}
}

function vendorProduct($singvenderid){
	global $conn;
	global $url;
	$venderprofile_product = "SELECT * FROM all_product WHERE product_vender_id='$singvenderid' AND product_status='1'";
	$quweryprofpros = mysqli_query($conn,$venderprofile_product);
	while($rowvenderrightprodt = mysqli_fetch_array($quweryprofpros)){

		$pId = $rowvenderrightprodt['id'];
		$name_val = $rowvenderrightprodt['product_name'];
		$product_fash_pageurl = $rowvenderrightprodt['product_page_name'];
		$produtautoid = $rowvenderrightprodt['product_auto_id'];
		$productshot = $rowvenderrightprodt['product_short_des'];
		$stock = $rowvenderrightprodt['product_stock'];
		$attbutval = $rowvenderrightprodt['product_size'];
		$attbutvalcolor = $rowvenderrightprodt['product_color'];


		$getvenorname = "SELECT * FROM vendor WHERE vendor_auto='$singvenderid'";
		$quwerydataval = mysqli_query($conn,$getvenorname);
		while($rowprodtvenor = mysqli_fetch_array($quwerydataval)){
			$firstnamevenorprodt = $rowprodtvenor['vendor_f_name'];
			$lastnamevenorprodt = $rowprodtvenor['vendor_l_name'];
		}

		$singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";
			$queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);
			while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){
				$singl_image_val = $rowallimges_one['produt_img'];
		}

		echo "<li>
		            <div class='fas-item-wrap vend-singl-prod'>";
		            if($rowvenderrightprodt['product_approve_stmp'] == "1"){
                      	echo "<div class='approve-stemp'>
                      			<img src='$url/assets/images/stamp-of-approval-new.png' title='Approved by Gallery LaLa'>
                      		</div>";
                    }
		            echo "<a href='$url/".$rowvenderrightprodt['product_page_name']."'>
		              <div class='item-img'>
		                <img src='$url/assets/images/product-img/".$rowvenderrightprodt['product_image']."'>
		                <img src='$url/assets/images/product-img/$singl_image_val'>
		              </div>
		              </a>
		              <div class='item-txt'>
		                <div class='item-title'>$firstnamevenorprodt $lastnamevenorprodt</div>
		                <div class='item-dis'>$name_val</div>";

		                if($rowvenderrightprodt['product_sale_price'] == ""){
	                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($rowvenderrightprodt['product_regular_price'], 2)."</div></div>";
	                      }else{
	                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($rowvenderrightprodt['product_sale_price'], 2)."</div>";
	                        echo "<div class='pric_dis'><span>$</span>".number_format($rowvenderrightprodt['product_regular_price'], 2)."</div></div>";
	                      }
	                      
		                if($stock == "0"){
		                	echo "<div class='item-cart'><button class='alert alert-danger unavailable'>Out of Stock</button></div>";
		                }else{
		                	if($attbutval != ''){
		               			echo "<div class='item-cart'><button class='selectopt'><a href='$url/$product_fash_pageurl'>Select Option</a></button></div>";
		               		}elseif($attbutvalcolor != ''){
		               			echo "<div class='item-cart'><button class='selectopt'><a href='$url/$product_fash_pageurl'>Select Option</a></button></div>";
		               		}else{
		               			echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
		               		}
		                }
		    echo "</div>
		            </div>
		          </li>";
	}
}

function aboutVendor($singvenderid){
	global $conn;
	$venderprofile_about = "SELECT * FROM about_me WHERE uid='$singvenderid' AND type='vendor'";
	$aboutweyvend = mysqli_query($conn,$venderprofile_about);
	while($rowvenderrightabout = mysqli_fetch_array($aboutweyvend)){
		echo "".$rowvenderrightabout['about_content']."";
	}
}

function termsCondition($singvenderid){
	global $conn;
	$venderprofile_teams = "SELECT * FROM termsCondition WHERE uid='$singvenderid' AND type='vendor'";
	$qweuyternmvn = mysqli_query($conn,$venderprofile_teams);
	while($rowvenderrightteam = mysqli_fetch_array($qweuyternmvn)){
		echo "".$rowvenderrightteam['terms']."";
	}
}

function venderaddress($singvenderid){
	global $conn;
	$venderadd = "SELECT * FROM vendor WHERE vendor_auto='$singvenderid'";
	$qweuyaddresvedn = mysqli_query($conn,$venderadd);
	while($rowvenderaddres = mysqli_fetch_array($qweuyaddresvedn)){
		echo "<li>".$rowvenderaddres['vendor_st_address']."</li>";
	}
}

function venderrating($singvenderid){
	global $conn;
	$venderadd = "SELECT * FROM vendor WHERE vendor_auto='$singvenderid'";
	$qweuyaddresvedn = mysqli_query($conn,$venderadd);
	while($rowvenderaddres = mysqli_fetch_array($qweuyaddresvedn)){
		echo "<li>".$rowvenderaddres['vendor_address']."</li>";
	}
}

//////////////////////////////////////////////////////////////////
//////////////// home slider images /////////////////////////////
////////////////////////////////////////////////////////////////
function homeslider(){
	global $conn;
	global $url;
	$homeslidername = "SELECT * FROM banners WHERE type='homeslider' AND status='1' ORDER BY position ASC LIMIT 14";
	$homesliderquery = mysqli_query($conn,$homeslidername);
	while($rowhomeslider = mysqli_fetch_array($homesliderquery)){
		$homeslidergetuserid = $rowhomeslider['uid'];
		$homesliderbannername = $rowhomeslider['bannerName'];
		$sliderexplod_data = explode('//', $homesliderbannername);
		$desktop_slider = $sliderexplod_data[0];
		$mobile_slider = $sliderexplod_data[1];

		if($homeslidergetuserid == "00"){
			echo "<div class='item'>";
			$banner_id = $rowhomeslider['bno'];
			$getimgaltdata = "SELECT * FROM images_table WHERE img_id='$banner_id' AND img_catagroy='homeslider'";
			$query_banenr_query = $conn->query($getimgaltdata);
			while($rowvalebanner = $query_banenr_query->fetch_array()){
				$get_alt_tag = $rowvalebanner['img_alt'];
				$get_title_tage = $rowvalebanner['img_title'];
			}
			echo "<a>
					<img class='desktop-images' src='$url/assets/images/slider/$desktop_slider' alt='$get_alt_tag' title='$get_title_tage'>
              		<img class='mobile-images' src='$url/assets/images/slider/$mobile_slider' alt='$get_alt_tag' title='$get_title_tage'>
        		</a>";
			echo "</div>";
		}else{
			echo "<div class='item'>";
			$banner_id = $rowhomeslider['bno'];
			$getimgaltdata = "SELECT * FROM images_table WHERE img_id='$banner_id' AND img_catagroy='homeslider'";
			$query_banenr_query = $conn->query($getimgaltdata);
			while($rowvalebanner = $query_banenr_query->fetch_array()){
				$get_alt_tag = $rowvalebanner['img_alt'];
				$get_title_tage = $rowvalebanner['img_title'];
			}

			$checkvendro = "SELECT * FROM vendor WHERE vendor_auto='$homeslidergetuserid'";
			$quwerycechl = mysqli_query($conn,$checkvendro);
			if(mysqli_num_rows($quwerycechl)){
				$vendor_data = "SELECT * FROM vendor WHERE vendor_auto='$homeslidergetuserid'";
				$querydatevid = mysqli_query($conn,$vendor_data);
				while($rowvendis = mysqli_fetch_array($querydatevid)){
					
					echo "<a href='$url/".$rowvendis['vendor_uni_name']."' title='".$rowvendis['vendor_f_name']." ".$rowvendis['vendor_l_name']."'>
							<img class='desktop-images' src='$url/assets/images/slider/$desktop_slider' alt='$get_alt_tag' title='$get_title_tage'>
		              		<img class='mobile-images' src='$url/assets/images/slider/$mobile_slider' alt='$get_alt_tag' title='$get_title_tage'>
	            		</a>";

		        }
			}else{
				$get_rpduct_data = "SELECT * FROM all_product WHERE product_auto_id='$homeslidergetuserid'";
				$querydataval = mysqli_query($conn,$get_rpduct_data);
				while($rowquweyprod = mysqli_fetch_array($querydataval)){
					echo "<a href='$url/".$rowquweyprod['product_page_name']."' title='".$rowquweyprod['product_name']."'>
							<img class='desktop-images' src='$url/assets/images/slider/$desktop_slider' alt='$get_alt_tag' title='$get_title_tage'>
		              		<img class='mobile-images' src='$url/assets/images/slider/$mobile_slider' alt='$get_alt_tag' title='$get_title_tage'>
	            		</a>";
				}
			}
			echo "</div>";
		}// if condisahn
	}
}

function fashionhomepage(){
	global $conn;
	global $url;
	$showproductfash = "SELECT * FROM homeproductshow WHERE home_type='fashion' AND home_status='1' ORDER BY id DESC LIMIT 15";
	$queryprodtdata = mysqli_query($conn,$showproductfash);
	while($rowpreoftfesh = mysqli_fetch_array($queryprodtdata)){
		$produtidfesh = $rowpreoftfesh['home_prod_id'];
		$explod_data_prodt = explode('//', $produtidfesh);
		$getautop_idprodt = $explod_data_prodt[1];
		$getvendor_idprodt = $explod_data_prodt[2];

		$singlprodt_data = "SELECT * FROM all_product WHERE product_auto_id='$getautop_idprodt' AND product_vender_id='$getvendor_idprodt' AND product_status='1'";
		$queryprodtvender = mysqli_query($conn,$singlprodt_data);
		while($rowprodtfechdata = mysqli_fetch_array($queryprodtvender)){
			$pId = $rowprodtfechdata['id'];
			$product_fist_img = $rowprodtfechdata['product_image'];
			$product_fash_naem = $rowprodtfechdata['product_name'];
			$product_fash_pageurl = $rowprodtfechdata['product_page_name'];
			$product_fash_price = $rowprodtfechdata['product_regular_price'];
			$produtautoid = $rowprodtfechdata['product_auto_id'];
			$stock = $rowprodtfechdata['product_stock'];
			$attbutval = $rowprodtfechdata['product_size'];
			$attbutvalcolor = $rowprodtfechdata['product_color'];

			$banner_id = $rowprodtfechdata['id'];
			$getimgaltdata = "SELECT * FROM images_table WHERE img_id='$banner_id' AND img_catagroy='product'";
			$query_banenr_query = $conn->query($getimgaltdata);
			while($rowvalebanner = $query_banenr_query->fetch_array()){
				$get_alt_tag = $rowvalebanner['img_alt'];
				$get_title_tage = $rowvalebanner['img_title'];
			}

			$getvendfesh = "SELECT * FROM vendor WHERE vendor_auto='$getvendor_idprodt'";
			$vendorname_singl = mysqli_query($conn,$getvendfesh);
			while($rowprodt_data = mysqli_fetch_array($vendorname_singl)){
				$get_fist_name_vend = $rowprodt_data['vendor_f_name'];
				$get_last_name_vend = $rowprodt_data['vendor_l_name'];

			$singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";
			$queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);
			while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){
				$singl_image_val = $rowallimges_one['produt_img'];
			}

			echo "<div class='item'>
		            <div class='fas-item-wrap'>";
		            if($rowprodtfechdata['product_approve_stmp'] == "1"){
                      	echo "<div class='approve-stemp'>
                      			<img src='$url/assets/images/stamp-of-approval-new.png' title='Approved by Gallery LaLa'>
                      		</div>";
                    }
		            echo "<a href='$url/$product_fash_pageurl'>
		              <div class='item-img'>
		                <img src='$url/assets/images/product-img/$product_fist_img' alt='$get_alt_tag' title='$get_title_tage'>
		                <img src='$url/assets/images/product-img/$singl_image_val' alt='$get_alt_tag' title='$get_title_tage'>
		              </div>
		              </a>
		              <div class='item-txt'>
		                <div class='item-title'>$get_fist_name_vend $get_last_name_vend</div>
		                <div class='item-dis'>$product_fash_naem</div>";
		                if($rowprodtfechdata['product_sale_price'] == ""){
	                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($rowprodtfechdata['product_regular_price'], 2)."</div></div>";
	                      }else{
	                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".$rowprodtfechdata['product_sale_price']."</div>";
	                        echo "<div class='pric_dis'><span>$</span>".number_format($rowprodtfechdata['product_regular_price'], 2)."</div></div>";
	                      }
		               	if($stock == "0"){
		               	echo "<div class='item-cart'><button class='alert alert-danger unavailable'>Out of Stock</button></div>";
		               	}else{
		               		if($attbutval != ''){
		               			echo "<div class='item-cart'><button class='selectopt'><a href='$url/$product_fash_pageurl'>Select Option</a></button></div>";
		               		}elseif($attbutvalcolor != ''){
		               			echo "<div class='item-cart'><button class='selectopt'><a href='$url/$product_fash_pageurl'>Select Option</a></button></div>";
		               		}else{
		               			echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
		               		}
		               	}
		    echo "</div>
		            
		            </div>
		          </div>";

			}
		}
	}
}

function arthomepage(){
	global $conn;
	global $url;
	$showproductart = "SELECT * FROM homeproductshow WHERE home_type='art' AND home_status='1' ORDER BY id DESC LIMIT 15";
	$queryprodtdataart = mysqli_query($conn,$showproductart);
	while($rowpreoftarth = mysqli_fetch_array($queryprodtdataart)){
		$produtidart = $rowpreoftarth['home_prod_id'];
		$explod_data_prodtart = explode('//', $produtidart);
		$getautop_idprodtart = $explod_data_prodtart[1];
		$getvendor_idprodtart = $explod_data_prodtart[2];

		$singlprodt_dataart = "SELECT * FROM all_product WHERE product_auto_id='$getautop_idprodtart' AND product_vender_id='$getvendor_idprodtart' AND product_status='1'";
		$queryprodtvenderart = mysqli_query($conn,$singlprodt_dataart);
		while($rowprodtfechdataart = mysqli_fetch_array($queryprodtvenderart)){
			$pId = $rowprodtfechdataart['id'];
			$product_art_img = $rowprodtfechdataart['product_image'];
			$product_art_naem = $rowprodtfechdataart['product_name'];
			$product_art_pageurl = $rowprodtfechdataart['product_page_name'];
			$product_art_price = $rowprodtfechdataart['product_regular_price'];
			$produtautoid = $rowprodtfechdataart['product_auto_id'];
			$stock = $rowprodtfechdataart['product_stock'];
			$attbutval = $rowprodtfechdataart['product_size'];
			$attbutvalcolor = $rowprodtfechdataart['product_color'];

			$getvendart = "SELECT * FROM vendor WHERE vendor_auto='$getvendor_idprodtart'";
			$vendorname_singlart = mysqli_query($conn,$getvendart);
			while($rowprodt_dataart = mysqli_fetch_array($vendorname_singlart)){
				$get_fist_name_vendart = $rowprodt_dataart['vendor_f_name'];
				$get_last_name_vendart = $rowprodt_dataart['vendor_l_name'];

			$singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";
			$queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);
			while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){
				$singl_image_val = $rowallimges_one['produt_img'];
			}

			echo "<div class='item'>
		            <div class='fas-item-wrap'>";
		            if($rowprodtfechdataart['product_approve_stmp'] == "1"){
                      	echo "<div class='approve-stemp'>
                      			<img src='$url/assets/images/stamp-of-approval-new.png' title='Approved by Gallery LaLa'>
                      		</div>";
                    }
		            echo "<a href='$url/$product_art_pageurl'>
		              <div class='item-img'>
		                <img src='$url/assets/images/product-img/$product_art_img'>
		                <img src='$url/assets/images/product-img/$singl_image_val'>
		              </div>
		              </a>
		              <div class='item-txt'>
		                <div class='item-title'>$get_fist_name_vendart $get_last_name_vendart</div>
		                <div class='item-dis'>$product_art_naem</div>";
		                if($rowprodtfechdataart['product_sale_price'] == ""){
	                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($rowprodtfechdataart['product_regular_price'], 2)."</div></div>";
	                      }else{
	                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($rowprodtfechdataart['product_sale_price'], 2)."</div>";
	                        echo "<div class='pric_dis'><span>$</span>".number_format($rowprodtfechdataart['product_regular_price'], 2)."</div></div>";
	                      }
		                if($stock == "0"){
		               	echo "<div class='item-cart'><button class='alert alert-danger unavailable'>Out of Stock</button></div>";
		               	}else{
		               		if($attbutval != ''){
		               			echo "<div class='item-cart'><button class='selectopt'><a href='$url/$product_art_pageurl'>Select Option</a></button></div>";
		               		}elseif($attbutvalcolor != ''){
		               			echo "<div class='item-cart'><button class='selectopt'><a href='$url/$product_art_pageurl'>Select Option</a></button></div>";
		               		}else{
		               			echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
		               		}
		               	}
		        echo"</div>
		            
		            </div>
		          </div>";

			}
		}
	}
}

function homeLevingdata(){
	global $conn;
	global $url;
	$showproductart = "SELECT * FROM homeproductshow WHERE home_type='home-living' AND home_status='1' ORDER BY id DESC LIMIT 15";
	$queryprodtdataart = mysqli_query($conn,$showproductart);
	while($rowpreoftarth = mysqli_fetch_array($queryprodtdataart)){
		$produtidart = $rowpreoftarth['home_prod_id'];
		$explod_data_prodtart = explode('//', $produtidart);
		$getautop_idprodtart = $explod_data_prodtart[1];
		$getvendor_idprodtart = $explod_data_prodtart[2];

		$singlprodt_dataart = "SELECT * FROM all_product WHERE product_auto_id='$getautop_idprodtart' AND product_vender_id='$getvendor_idprodtart' AND product_status='1'";
		$queryprodtvenderart = mysqli_query($conn,$singlprodt_dataart);
		while($rowprodtfechdataart = mysqli_fetch_array($queryprodtvenderart)){
			$pId = $rowprodtfechdataart['id'];
			$product_art_img = $rowprodtfechdataart['product_image'];
			$product_art_naem = $rowprodtfechdataart['product_name'];
			$product_art_pageurl = $rowprodtfechdataart['product_page_name'];
			$product_art_price = $rowprodtfechdataart['product_regular_price'];
			$produtautoid = $rowprodtfechdataart['product_auto_id'];
			$stock = $rowprodtfechdataart['product_stock'];
			$attbutval = $rowprodtfechdataart['product_size'];
			$attbutvalcolor = $rowprodtfechdataart['product_color'];

			$getvendart = "SELECT * FROM vendor WHERE vendor_auto='$getvendor_idprodtart'";
			$vendorname_singlart = mysqli_query($conn,$getvendart);
			while($rowprodt_dataart = mysqli_fetch_array($vendorname_singlart)){
				$get_fist_name_vendart = $rowprodt_dataart['vendor_f_name'];
				$get_last_name_vendart = $rowprodt_dataart['vendor_l_name'];

			$singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";
			$queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);
			while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){
				$singl_image_val = $rowallimges_one['produt_img'];
			}

			echo "<div class='item'>
		            <div class='fas-item-wrap'>";
		            if($rowprodtfechdataart['product_approve_stmp'] == "1"){
                      	echo "<div class='approve-stemp'>
                      			<img src='$url/assets/images/stamp-of-approval-new.png' title='Approved by Gallery LaLa'>
                      		</div>";
                    }
		            echo "<a href='$url/$product_art_pageurl'>
		              <div class='item-img'>
		                <img src='$url/assets/images/product-img/$product_art_img'>
		                <img src='$url/assets/images/product-img/$singl_image_val'>
		              </div>
		              </a>
		              <div class='item-txt'>
		                <div class='item-title'>$get_fist_name_vendart $get_last_name_vendart</div>
		                <div class='item-dis'>$product_art_naem</div>";
		                if($rowprodtfechdataart['product_sale_price'] == ""){
	                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($rowprodtfechdataart['product_regular_price'], 2)."</div></div>";
	                      }else{
	                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($rowprodtfechdataart['product_sale_price'], 2)."</div>";
	                        echo "<div class='pric_dis'><span>$</span>".number_format($rowprodtfechdataart['product_regular_price'], 2)."</div></div>";
	                      }
		                if($stock == "0"){
		               	echo "<div class='item-cart'><button class='alert alert-danger unavailable'>Out of Stock</button></div>";
		               	}else{
		               		if($attbutval != ''){
		               			echo "<div class='item-cart'><button class='selectopt'><a href='$url/$product_art_pageurl'>Select Option</a></button></div>";
		               		}elseif($attbutvalcolor != ''){
		               			echo "<div class='item-cart'><button class='selectopt'><a href='$url/$product_art_pageurl'>Select Option</a></button></div>";
		               		}else{
		               			echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
		               		}
		               	}
		        echo"</div>
		            
		            </div>
		          </div>";

			}
		}
	}
}

function showhomemedia(){
	global $conn;
	global $url;
	$showadminmeida = "SELECT * FROM homemedia WHERE media_type='media' AND media_status='1' ORDER BY id DESC LIMIT 5";
	$queryshowadminmedia = mysqli_query($conn,$showadminmeida);
	while($rowshowadminmedia = mysqli_fetch_array($queryshowadminmedia)){
		$getmeidatitle = substr($rowshowadminmedia['media_title'], 0, 40);
		$getmediaurl = $rowshowadminmedia['media_link'];
		$getmediaaimg = $rowshowadminmedia['media_video_img'];
		$video_id = explode("?v=", $getmediaurl);
		$get_video_name = $video_id[1];
		$get_media_id = $rowshowadminmedia['id'];
		echo "<div class='item'>
              <div class='video-item-wrap'>
                <div class='videi-img'>
                	<a href='JavaScript:void(0);' class='mediadata' id='$get_media_id' data-id='videody$get_media_id' vid='showdata$get_media_id'>";
                		if($getmediaaimg == ""){
							echo "<object data='http://www.youtube.com/v/$video_id' type='application/x-shockwave-flash'><param name='src' value='http://www.youtube.com/v/$video_id' /></object>";
						}else{
							echo "<img src='$url/assets/images/slider/$getmediaaimg' class='img-responsive'>";
						}
                	echo "</a>
                </div>
                <div class='video-dis'>$getmeidatitle ...</div>
              </div>
            </div>";
	}
}

function showlatestnews(){
	global $conn;
	global $url;

	$showvaledata_laestnews = "SELECT * FROM homemedia WHERE media_type='latestnews' AND media_status='1'";
	$queryshowdata_laestnews = mysqli_query($conn,$showvaledata_laestnews);
	while($rowshowfwtchdat_laestnews = mysqli_fetch_array($queryshowdata_laestnews)){
		$getfehdataid_laestnews = $rowshowfwtchdat_laestnews['media_title'];
		$statusfeshprodty_laestnews = $rowshowfwtchdat_laestnews['media_link'];
		$urlfeshprodty_laestnews = $rowshowfwtchdat_laestnews['media_url_path'];
		echo "<div class='item'>
              <div class='news-item-wrap'>
                <div class='news-item-title'>$getfehdataid_laestnews</div>
                <div class='news-dis news-datarap'>"; echo wordwrap($statusfeshprodty_laestnews, 300); echo "</div>
                <div class='news-details'><a href='$url/news/$urlfeshprodty_laestnews'><i class='fa fa-arrow-right'></i></a></div>
              </div>
            </div>";
	}
}

function showmenupart(){
	global $conn;
	global $url;
	$viewmenudata = "SELECT * FROM menutable WHERE menu_type='menus' ORDER BY menu_postion ASC";
	$querymenudata = mysqli_query($conn,$viewmenudata);
	while($rowmenuviewdata = mysqli_fetch_array($querymenudata)){
		$getmenuname = $rowmenuviewdata['menu_name'];
		$getmenutiel = $rowmenuviewdata['menu_title'];
		$getmenualt = $rowmenuviewdata['menu_alt'];
		$getmenuurl = $rowmenuviewdata['menu_url'];
		echo "<li class='top-level-link'>
                <a href='$url/$getmenuurl' class='mega-menu' title='$getmenutiel' alt='$getmenualt'>$getmenuname</a>
            </li>";
	}
}

function pricefilterminmaxview(){
	global $conn;
	/*$priceminmaxview = "SELECT MAX(product_regular_price) FROM all_product";
	$queryminmaxview = mysqli_query($conn,$priceminmaxview);
	$rowpriceminx = mysqli_fetch_array($queryminmaxview);
	echo $rowpriceminxmax = $rowpriceminx[0];

	$priceminminview = "SELECT MIN(product_regular_price) FROM all_product";
	echo $queryminminview = mysqli_query($conn,$priceminminview);
	$rowpricemin = mysqli_fetch_array($queryminminview);
	$rowpriceminxmin = $rowpricemin[0];*/
		//echo (max($amkeexplddata));
		//echo (min($amkeexplddata));
		/*if(min($amkeexplddata)){
			echo "<input type='range' min='10' max='$ratepice' value='50' id='lower'>";
		}
		if(max($amkeexplddata)){
			echo "<input type='range' min='50' max='$ratepice' value='3000' id='upper'>";
	    }*/
}

/*function cehckcoupan($coupan_val,$cart_data){
	global $conn;

	foreach($cart_data as $coupan_valinsert){
		
		$cehk_date_val = "SELECT * FROM coupons WHERE coup_name='$coupan_val'";
		$cehckvale = mysqli_query($conn,$cehk_date_val);
		while($rowdate = mysqli_fetch_array($cehckvale)){
			if($rowdate['coup_s_date'] > $rowdate['coup_end_date']){
				return true;
			}else{
				return false;
			}
			if($rowdate['coup_vendorid'] == ""){}else{

				$product_id = $coupan_valinsert['id'];
				$product_autoid = $coupan_valinsert['product_auto_id'];

				$selecvenore = "SELECT * FROM all_product WHERE id='$product_id' AND product_auto_id='$product_autoid' AND product_vender_id='".$rowdate['coup_vendorid']."'";
				$query = mysqli_query($conn,$selecvenore);

				if(mysqli_num_rows($query)){
					return true;
				}else{
					return false;
				}

			}
		}

	}
}*/

function showcountprocut(){
	global $conn;

	$getallprodut = "SELECT COUNT(1) FROM all_product";
	$querycount = mysqli_query($conn,$getallprodut);
	$get_countrow = mysqli_fetch_array($querycount);
	echo $set_row = $get_countrow[0];
}

if(isset($_POST['addreview'])){
	$ratingval = addslashes($_POST['ratingvid']);
	$connetval = addslashes($_POST['comment']);
	$singlid = $_POST['name'];
	$type_val = $_POST['reviewaction'];
	$activeacct = $_POST['loginuser'];
	$dateval = date('m/d/Y');
	$timeval = date('h:i A');
	$checkalreupdate = "SELECT * FROM reviewdataval WHERE review_loginuserid='$activeacct' AND review_type='$type_val' AND review_loginid='$singlid'";
	$query_val = mysqli_query($conn,$checkalreupdate);
	if(mysqli_num_rows($query_val)){

	}else{
	$insertval = "INSERT INTO reviewdataval(review_loginid,review_loginuserid,review_date,review_time,review_type,review_rating,review_text)VALUES('$singlid','$activeacct','$dateval','$timeval','$type_val','$ratingval','$connetval')";
	$queryval = mysqli_query($conn,$insertval);
	echo "Successfully Updated";
	}
}

function getcountryname($customer_id){
	global $conn;

	$get_countuser = "SELECT * FROM customer WHERE customer_ui_id='$customer_id' LIMIT 1";
	$countuse = mysqli_query($conn,$get_countuser);
	if(mysqli_num_rows($countuse)){
		while($contvale = mysqli_fetch_array($countuse)){
			$count_nanme = $contvale['customer_country'];
		}
		$countname = "SELECT * FROM countrydata ORDER BY id ASC";
		$query = mysqli_query($conn, $countname);
		while($rowcount = mysqli_fetch_array($query)){
			if($rowcount['countname'] == $count_nanme){
				echo "<option value='".$rowcount['countname']."' selected>".$rowcount['countname']."</option>";
				//echo "<option vlaue='".$rowcount['countname']."'>".$rowcount['countname']."</option>";
			}else{
				echo "<option value='".$rowcount['countname']."'>".$rowcount['countname']."</option>";
			}
		}
	}else{
		$countname = "SELECT * FROM countrydata ORDER BY id ASC";
		$query = mysqli_query($conn, $countname);
		while($rowcount = mysqli_fetch_array($query)){
			echo "<option value='".$rowcount['countname']."'>".$rowcount['countname']."</option>";
		}
	}
}

function getstatenamecustomer($customer_id){
	global $conn;

	$get_countuser_seate = "SELECT * FROM customer WHERE customer_ui_id='$customer_id'";
	$countuse_seate = mysqli_query($conn,$get_countuser_seate);
	if(mysqli_num_rows($countuse_seate)){
		while($contvale_seate = mysqli_fetch_array($countuse_seate)){
			$count_nanme_seate = $contvale_seate['customer_country'];
			$statevale_seate = $contvale_seate['customer_state'];
		}
			$countnamevale_seate = $count_nanme_seate;
			$countname_seate = "SELECT * FROM shiptaxval WHERE shiptx_type = 'Tax' AND shiptx_countryname='$countnamevale_seate' ORDER BY shiptx_value ASC";
			$query_seate = mysqli_query($conn, $countname_seate);
			while($rowcount_seate = mysqli_fetch_array($query_seate)){
					//echo $rowcount_seate['shiptx_value'];

				if($statevale_seate == ""){
					echo "<option value='".$rowcount_seate['shiptx_value']."'>".$rowcount_seate['shiptx_value']."</option>";
				}else{
					if($statevale_seate == $rowcount_seate['shiptx_value']){
						echo "<option value='".$rowcount_seate['shiptx_value']."' selected>".$rowcount_seate['shiptx_value']."</option>";
					}
					echo "<option value='".$rowcount_seate['shiptx_value']."'>".$rowcount_seate['shiptx_value']."</option>";
				}
			}
	}else{
		while($contvale_seate = mysqli_fetch_array($countuse_seate)){
			$count_nanme_seate = $contvale_seate['customer_country'];
			$statevale_seate = $contvale_seate['customer_state'];
		}
		$countname_seate = "SELECT * FROM shiptaxval WHERE shiptx_type='shipping' AND shiptx_countryname='$count_nanme_seate' ORDER BY id ASC";
		$query_seate = mysqli_query($conn, $countname_seate);
		while($rowcount_seate = mysqli_fetch_array($query_seate)){
			echo "<option value='".$rowcount_seate['shiptx_value']."'>".$rowcount_seate['shiptx_value']."</option>";
		}
	}
}

function gettaxvale($customer_id,$gettotlavale){
	global $conn;
	//echo $customer_id;
	/*if("a2cmoo.rultnot15lgm3iiaes9hsuyc@0b9" == $customer_id){
		echo $gettotlavale;
	}*/
	$get_customercountvale = "SELECT * FROM customer WHERE customer_ui_id='$customer_id'";
	$queryvaledata = mysqli_query($conn,$get_customercountvale);
	if(mysqli_num_rows($queryvaledata)){
		while($rowvaledata = mysqli_fetch_array($queryvaledata)){
			$getstatename = $rowvaledata['customer_state'];
			if(isset($_SESSION['countryvale'])){
				$getcountryname = $_SESSION['countryvale'];
			}else{
				$getcountryname = $rowvaledata['customer_country'];
			}
			$get_statevale = "SELECT * FROM shiptaxval WHERE shiptx_type='Tax' AND shiptx_countryname='$getcountryname' AND shiptx_value='$getstatename'";
			$querygettax = mysqli_query($conn,$get_statevale);
			while($rowtaxvale = mysqli_fetch_array($querygettax)){
				$taxvale = $rowtaxvale['shiptx_rate'];
				//echo $gettotlavale;
				//echo $singleamoutn = str_replace(',','', $gettotlavale);
				echo $mathvaleadd = number_format($gettotlavale*$taxvale/100, 2);
				$_SESSION["tax_amt"] = number_format($mathvaleadd, 2);

				//$shippingCharge = number_format(shippingCharge($state, $weight), 2);
				//$shippinvaledat = $_SESSION["shippingvale"];
				if(isset($_SESSION['discount_amount'])){
            		$discounval = $_SESSION['discount_amount'];
            		$_SESSION["grandTotal"] = number_format(($gettotlavale+$mathvaleadd-$discounval), 2);
            	}else{
            		$discounval = "0";
            		$_SESSION["grandTotal"] = number_format(($gettotlavale+$mathvaleadd), 2);
            	}
				$result = array($_SESSION["grandTotal"], $_SESSION["tax_amt"], $_SESSION["shippingvale"]);
				//$result = array($_SESSION["grandTotal"], $taxAmt, $subTotal);
				
				//echo $result;
			}
			//return $taxvale;
		}
	}else{
		echo "00.00";
	}
}

/*function getshippingvale($customer_id,$gettotlavale,$wightvalue){
	global $conn;

	$get_customershiping = "SELECT * FROM customer WHERE customer_ui_id='$customer_id'";
	$queryvaleshiping = mysqli_query($conn,$get_customershiping);
	if(mysqli_num_rows($queryvaleshiping)){
		while($rowvaleshiping = mysqli_fetch_array($queryvaleshiping)){
			$getcountrynameshiping = $rowvaleshiping['customer_country'];
			$getstatenameshiping = $rowvaleshiping['customer_state'];

			$get_statevaleshiping = "SELECT * FROM shiptaxval WHERE shiptx_countryname='$getcountrynameshiping' AND shiptx_value='$getstatenameshiping'";
			$querygettaxshiping = mysqli_query($conn,$get_statevaleshiping);
			while($rowtaxvaleshiping = mysqli_fetch_array($querygettaxshiping)){
				$shippinratestate = $rowtaxvaleshiping['shiptx_value'];
				//echo $gettotlavale;
				//echo $singleamoutn = str_replace(',','', $gettotlavale);
				if($shippinratestate == "ALASKA"){
					$overallprice = "120";
				}elseif($shippinratestate == "HAWAII"){
					$overallprice = "105";
				}else{
					$get_val = is_int($wightvalue);
					if($get_val == true){
						$singwight = "1";
					}else{
						$singwight = $wightvalue;
					}
					if('4' >= $singwight){
						$overallprice = "15";
					}elseif('8' >= $singwight){
						$overallprice = "20";
					}elseif('12' >= $singwight){
						$overallprice = "23";
					}elseif('16' >= $singwight){
						$overallprice = "25";
					}elseif('20' >= $singwight){
						$overallprice = "30";
					}elseif('25' >= $singwight){
						$overallprice = "37";
					}elseif('30' >= $singwight){
						$overallprice = "44";
					}else{
						$overallprice = "62";
					}
				}
				echo $mathvaleadd = number_format($overallprice, 2);
				$_SESSION["shippingvale"] = number_format($mathvaleadd, 2);

				//$shippingCharge = number_format(shippingCharge($state, $weight), 2);
				//$_SESSION["grandTotal"] = number_format(($gettotlavale+$mathvaleadd), 2);
				//$result = array($_SESSION["grandTotal"], $_SESSION["shippingvale"]);
				//$result = array($_SESSION["grandTotal"], $taxAmt, $subTotal);
				
				//echo $result;
			}
			//return $taxvale;
		}
	}else{
		echo "00.00";
	}
}*/

function checkEXTUrlData($getvarbale){
	global $conn;

	$hceckvale = "SELECT * FROM all_product WHERE product_page_name='$getvarbale' AND product_status='1'";
	$query_data = $conn->query($hceckvale);
	if($query_data->num_rows > 0){
		$respncvale = "1";
	}else{
		$check_creater = "SELECT * FROM vendor WHERE vendor_uni_name='$getvarbale'";
		$creater_query = $conn->query($check_creater);
		if($creater_query->num_rows > 0){
			$respncvale = "2";
		}else{
			$respncvale = "0";
		}
	}
	return $respncvale;
}

function mediapoupvid(){
	global $conn;

	$mdpoup_select = "SELECT * FROM homemedia WHERE media_status='1' AND media_type='media'";
	$query_mediapo = $conn->query($mdpoup_select);
	while($rowvaluemdia = $query_mediapo->fetch_array()){
		$get_img_id = $rowvaluemdia['id'];
		$mdia_url = $rowvaluemdia['media_link'];

		echo '<div class="poup-video" id="showdata'.$get_img_id.'">
				    <div class="uper-poup">
				        <i class="fa fa-times close" data-id="videody'.$get_img_id.'" cls="showdata'.$get_img_id.'" aria-hidden="true"></i>
				        <div class="body-poup">
				            <iframe class="stopvideo" id="videody'.$get_img_id.'" src="'.$mdia_url.'" allowfullscreen></iframe>
				        </div>
				    </div>
				</div>';
	}
}

function shiptodetails($shppto_addres,$shppto_city,$shppto_country,$shppto_state,$shppto_stcode,$shppto_pincode,$custidvale,$fname_vale,$lname_vale){
	global $conn;

	$date = date('m/d/Y');
	$time = date('h:i A');
	$cehck_address = "SELECT * FROM shpptoadds WHERE cust_to_id='$custidvale' AND cust_to_status='0'";
	$query_valedate = $conn->query($cehck_address);
	if($query_valedate->num_rows > 0){
		$setshpingadd = "UPDATE shpptoadds SET cust_to_address='$shppto_addres',cust_to_city='$shppto_city',cust_to_country='$shppto_country',cust_to_state='$shppto_state',cust_to_statecode='$shppto_stcode',cust_to_postalcode='$shppto_pincode',cust_to_fname='$fname_vale',cust_to_lname='$lname_vale' WHERE cust_to_id='$custidvale' AND cust_to_status='0'";
		$quwery_setdatav = $conn->query($setshpingadd);
	}else{
		$setshpingadd = "INSERT INTO shpptoadds(cust_to_id,cust_to_address,cust_to_city,cust_to_country,cust_to_state,cust_to_statecode,cust_to_postalcode,cust_to_date,cust_to_time,cust_to_status,cust_to_fname,cust_to_lname)VALUES('$custidvale','$shppto_addres','$shppto_city','$shppto_country','$shppto_state','$shppto_stcode','$shppto_pincode','$date','$time','0','$fname_vale','$lname_vale')";
		$quwery_setdatav = $conn->query($setshpingadd);
	}
	if($quwery_setdatav == true){
		return true;
	}else{
		return false;
	}
}

function getshppitoaddshow($custidvale){
	global $conn;
	$dateshp = date('m/d/Y');
	$getshppto = "SELECT * FROM shpptoadds WHERE cust_to_status='0' AND cust_to_id='$custidvale' AND cust_to_date='$dateshp'";
	$querycusto = $conn->query($getshppto);
	while($rowvlaedata = $querycusto->fetch_array()){
		$shppintoaddres[] = $rowvlaedata;
	}
	return $shppintoaddres;
}

function getcountyvale(){
	global $conn;

	$count_namvaleda = "SELECT * FROM countrydata ORDER BY ID ASC";
	$valedatacode = $conn->query($count_namvaleda);
	while($rowvaledatd = $valedatacode->fetch_array()){
		echo "<option value='".$rowvaledatd['countname']."'>".$rowvaledatd['countname']."</option>";
	}
}

function getvalestate($Country_sshwo){
	global $conn;

	$countname_seate = "SELECT * FROM shiptaxval WHERE shiptx_type='Tax' AND shiptx_countryname='$Country_sshwo' ORDER BY id ASC";
	$query_seate = mysqli_query($conn, $countname_seate);
	while($rowcount_seate = mysqli_fetch_array($query_seate)){
		echo "<option value='".$rowcount_seate['shiptx_value']."'>".$rowcount_seate['shiptx_value']."</option>";
	}
}

?>