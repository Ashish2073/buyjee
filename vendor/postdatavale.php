<?php
if(isset($_POST['addproduct'])){
    
    $prodtaddname = addslashes(trim($_POST['prodttitle']));
    if(addslashes(trim($_POST['peramlink'])) == ""){
    	$newpdurlname = ChakingProductName($prodtaddname);
    }else{
    	$newpdurlname = ChakingProductName(addslashes(trim($_POST['peramlink'])));
    }
    $chkingprodname = ChakingProductName($prodtaddname);
    $prodaddpagename= makeurl($newpdurlname);
    $prodtaddlink = $url.'/'.trim($prodaddpagename);
    $prodtadddest = addslashes($_POST['texteditor']);
    $prodtaddregprice = addslashes($_POST['prodregprice']);
    $prodtaddsalprice = addslashes($_POST['prodsalgprice']);
    $prodtaddstock = addslashes($_POST['prodstock']);
    $prodtaddsku = addslashes($_POST['prodsku']);
    $venderdataadd = $_POST['venderdata'];
    $prodtaddcateg = $_POST['prodt_cat'];
    $prodtcat_val = "";
    $product_url = "";
    foreach($prodtaddcateg as $value_cat){
    	$explode_val = explode('|', $value_cat);
		$product_url .= $explode_val[0] .',';
		$prodtcat_val .= $explode_val[1] .',';
    }

    $product_img = "prodtmainimg";
	$product_imguplod = images_upload($product_img);
	$fileinfoMainImg = @getimagesize($_FILES["prodtmainimg"]["tmp_name"]);
    $widthMainImg = $fileinfoMainImg[0];
    $heightMainImg = $fileinfoMainImg[1];
	if($product_imguplod == "0"){
		$edit_tvnes_thnualname = $_POST['mainimgchkig'];
		$Prod_006 = "0";
	}else{
	    if($widthMainImg == "720" || $heightMainImg == "720") {
    		$edit_tvnes_thnualname = $product_imguplod;
    		move_uploaded_file($_FILES['prodtmainimg']['tmp_name'], "$file_path/$product_imguplod");
    		$Prod_006 = "0";
	    }else{
            // echo "<script>alert('Image dimension should be within 720X720px.');</script>";
            $Prod_006 = "1";
        }
	}
    $shortdata = addslashes($_POST['shordest']);
    if(!empty($shortdata)){
        $Prod_002 == "0";
    }else{
        // echo "<script>alert('Your Short Description Required.');</script>";
        // $Prod_002 == "1";
    }
    $discountvale = addslashes($_POST['disountvalue']);
    $product_dis_type = $_POST['dissontype'];
    $domist_shpping = $_POST['domistupdtae'];
    if($domist_shpping == ""){
      $shippingratesdest = "12";
    }else{
      $shippingratesdest = $domist_shpping;
    }
    $internal_shpping = $_POST['internolupdate'];
    if($internal_shpping == ""){
      $shippingratesint = "20";
    }else{
      $shippingratesint = $internal_shpping;
    }
    $_get_pageautid = $_GET['autoid'];
    $_readcmdeps = $_POST['recmatepd'];
    $recomadepd = "";
    foreach($_readcmdeps as $reacmvale){
    	$recomadepd .= $reacmvale.',';
    }

    $pagename = $_POST['suname'];
    
    $multiimages = AddNewProudtcvaleimages($_FILES['prodtallimg'],$_get_pageautid);
    // print_r($multiimages);
    // die();
    
	$randvale = rand();
    if(trim($prodtaddname) == ""){
        echo "<script>alert('Please fill Product Name.');</script>";
    }else{
        if(trim($shortdata) == ""){
            echo "<script>alert('Please fill Short Description.');</script>";
        }else{
            if(trim($prodtaddsku) == ""){
                echo "<script>alert('Please fill SKU.');</script>";
            }else{
                if(trim($Prod_006) == 1){
                    echo "<script>alert('Upload image 720x720.');</script>";
                }else{
                    $lowminholdmain = $_POST['prodminthold'];
                    $update_datafiled = "product_vender_id='$venderdataadd',product_name='$chkingprodname',product_link='$prodtaddlink',product_page_name='$prodaddpagename',product_destion='$prodtadddest',product_short_des='$shortdata',product_regular_price='$prodtaddregprice',product_sale_price='$prodtaddsalprice',product_catger='$product_url',product_catger_ids='$prodtcat_val',product_stock='$prodtaddstock',product_sku='$prodtaddsku',product_image='$edit_tvnes_thnualname',product_date='$date',product_time='$time',product_status='0',product_discount='$discountvale',product_dis_type='$product_dis_type',product_approve_stmp='1',product_shppin_domst='$shippingratesdest',product_shppin_inters='$shippingratesint',product_recomateprd='$recomadepd',product_min_price='$lowminholdmain'";
                    $_getupdateid = "id='".$_GET['pageid']."' AND product_auto_id='".$_GET['autoid']."'";
                    $insert_data = UpdateAllDataFileds("all_product",$update_datafiled,$_getupdateid);
                    if($insert_data == true){
                        echo "<script>alert('Successfully Uploaded');window.location.href='https://buyjee.com/vendor/approved-products';</script>";
                    }
                }
            }
        }
    }
}
?>