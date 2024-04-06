<?php
function login_setup_data($email,$password,$_login_chking){

    global $contdb;
    global $url;
    if($_login_chking = $_SESSION['login-user']){

        $chking_user_status = "SELECT * FROM userlogntable WHERE user_first_name='$email' AND user_status='0' OR user_email='$email' AND user_status='0'";
        $query_user_status = $contdb->query($chking_user_status);
        if($query_user_status->num_rows > 0){

            $chking_user_chking = "SELECT * FROM userlogntable WHERE user_first_name='$email' AND user_password='$password' AND user_status='0' OR user_email='$email' AND user_password='$password' AND user_status='0'";
            $query_user_cking = $contdb->query($chking_user_chking);
            if($query_user_cking->num_rows > 0){

                while($row_usergetdetl = $query_user_cking->fetch_array()){
                    //echo "<script>alert('".$row_usergetdetl['user_auto']."');</script>";
                    if($row_usergetdetl['user_type'] == "admin"){

                        $_SESSION['adminLoginIdSession']=$row_usergetdetl['user_auto'];

                        echo "<script>window.location.href='$url/admin-manager/index/';</script>";

                    }elseif($row_usergetdetl['user_type'] == "vendor"){

                        $_SESSION['vendorsessionlogin']=$row_usergetdetl['user_auto'];
                        echo "<script>window.location.href='$url/vendor/dashboard/';</script>";

                    }elseif($row_usergetdetl['user_type'] == "customer"){
                        
                        $_SESSION['customersessionlogin']=$row_usergetdetl['user_auto'];

                        echo "<script>window.location.href='$url/';</script>";

                    }elseif($row_usergetdetl['user_type'] == "seouser"){
                        
                        $_SESSION['seouserloginsection']=$row_usergetdetl['user_auto'];

                        echo "<script>window.location.href='$url/seo-user/index/';</script>";

                    }else{
                        return 3;
                    }
                
                }
            
            }else{
                return 2; /*=== username or password not correct ====*/
            }

        }else{
            return 1; /*=== Account not active ====*/
        }

    }else{
        return 0; /*=== security Reasons ====*/
    }

}


/*======== Url Maker ========*/
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

/*======== Image Upload ============*/

function images_upload($image_name){



    global $file_path;







    $undate = rand();



    $floder_path_name = $file_path."/images";



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

/*============ Insert All Data Query =================*/
function GllInsertDataAllTable($talename,$rowname,$rowvalues){
	global $contdb, $date, $time;
    
	$insertalldata = "INSERT INTO $talename($rowname)VALUES($rowvalues)";
	$query_insertdata = $contdb->query($insertalldata);
	if($query_insertdata == true){
		return true;
	}else{
		return false;
	}
}

function GLLTotal_Customer_Count(){
     global $contdb;

     $count_customer = "SELECT COUNT(1) FROM customer";
     $query_customer_count = $contdb->query($count_customer);
     $fetch_cust_count = $query_customer_count->fetch_array();
     $row_custm_count = $fetch_cust_count[0];
     return $row_custm_count;
}

function GLLTotal_Vendor_Count(){
    global $contdb;

    $count_vendor = "SELECT COUNT(1) FROM vendor";
    $query_vrndor_count = $contdb->query($count_vendor);
    $fetch_ven_count = $query_vrndor_count->fetch_array();
    $row_vndor_count = $fetch_ven_count[0];
    return $row_vndor_count;
}

function GLLTotal_Product_Count($active="0",$vesnorautoid="0"){
    global $contdb;

    if($active == "0"){
        if($vesnorautoid == "0"){
            $count_product = "SELECT COUNT(1) FROM all_product";
        }else{
            $count_product = "SELECT COUNT(1) FROM all_product WHERE product_vender_id='$vesnorautoid'";
        }
    }else{
        $count_product = "SELECT COUNT(1) FROM all_product WHERE product_status='$active'";
    }
    $query_product_count = $contdb->query($count_product);
    $fetch_product_count = $query_product_count->fetch_array();
    $row_product_count = $fetch_product_count[0];
    return $row_product_count;
}


function GLLVendor_RequestData(){
    global $contdb;

    $vendor_rquest = "SELECT * FROM vendor";
    $query_vendor = $contdb->query($vendor_rquest);
    while($row_getvend_reqst = $query_vendor->fetch_array()){
        $venor_auto_id = $row_getvend_reqst['vendor_auto'];

        $permission_vendor = "SELECT * FROM userpermission WHERE user_p_id='$venor_auto_id' AND user_p_email_ap='0'";
        $query_perquery = $contdb->query($permission_vendor);
        while ($row_permisionval = $query_perquery->fetch_array()) {
            $array_request_data[] = $row_getvend_reqst;
        }
    }
    return $array_request_data;
}

function GLLCoupan_ViewData($activeStatus="0",$coupanid="0"){
    global $contdb;

    if($activeStatus == "0"){
        if($coupanid == "0"){
            $Coupan_view = "SELECT * FROM coupons ORDER BY id DESC";
        }else{
            $Coupan_view = "SELECT * FROM coupons WHERE id='$coupanid'";
        }
    }else{
        $Coupan_view = "SELECT * FROM coupons WHERE coup_status='$activeStatus'";
    }
    $query_coupanval = $contdb->query($Coupan_view);
    while($row_CoupanVale = $query_coupanval->fetch_array()){
        $array_CoupanVall[] = $row_CoupanVale;
    }
    return $array_CoupanVall;
}

function GLLHeaderSection($_head_new_img,$type,$_favicon_img,$topbariconstaus,$_Post_pageid='0'){
    global $contdb, $date, $time;

    if($type == "insert"){
        $Insert_Data = "INSERT INTO header(head_logo,head_favicon,head_topbarstaus,head_date,head_time)VALUES('$_head_new_img','$_favicon_img','$topbariconstaus','$date','$time')";
    }elseif($type == "edit"){
        $Insert_Data = "UPDATE header SET head_logo='$_head_new_img',head_favicon='$_favicon_img',head_topbarstaus='$topbariconstaus' WHERE id='$_Post_pageid'";
    }
    $query_update = $contdb->query($Insert_Data);
    return true;
}

function GLLHederGetsection($heder_id=0){
    global $contdb, $date, $time;

    if($heder_id == "0"){
        $selet_gethadr = "SELECT * FROM header ORDER BY id DESC";
    }else{
        $selet_gethadr = "SELECT * FROM header WHERE id='$heder_id'";
    }
    $query_selectval = $contdb->query($selet_gethadr);
    while($row_selefetch = $query_selectval->fetch_array()){
        $get_herderslect[] = $row_selefetch;
    }
    return $get_herderslect;
}

function GLLFooterGetData($footer_id=0){
    global $contdb, $date, $time;

    if($footer_id == "0"){
        $get_footerdata = "SELECT * FROM footer";
    }else{
        $get_footerdata = "SELECT * FROM footer WHERE id='$footer_id'";
    }
    $query_ge_footer = $contdb->query($get_footerdata);
    while($row_get_footer = $query_ge_footer->fetch_array()){
        $footerarryval[] = $row_get_footer;
    }
    return $footerarryval;
}

function GLLUpdateFooterData($jeson_end_express=0,$footer_page_id,$type,$box_type=0){
    global $contdb, $date, $time;

    if($type == "edit"){
        if($box_type == "express"){
            $update_datavale = "UPDATE footer SET footer_express_cont='$jeson_end_express' WHERE id='$footer_page_id'";
        }elseif($box_type == "secure"){
            $update_datavale = "UPDATE footer SET footer_secure_cont='$jeson_end_express' WHERE id='$footer_page_id'";
        }elseif($box_type == "save"){
            $update_datavale = "UPDATE footer SET footer_save_cont='$jeson_end_express' WHERE id='$footer_page_id'";
        }elseif($box_type == "best"){
            $update_datavale = "UPDATE footer SET footer_best_cont='$jeson_end_express' WHERE id='$footer_page_id'";
        }elseif($box_type == "mainfooter"){
            $update_datavale = "UPDATE footer SET footer_copyright='$jeson_end_express' WHERE id='$footer_page_id'";
        }
    }
    $query_footerupdat = $contdb->query($update_datavale);
    return true;
}

function GLLGetSliderData($sliderdata="0"){
	global $contdb, $date, $time;

	if($sliderdata == "0"){
		$Sliderdataval = "SELECT * FROM slideres_table_content ORDER BY CAST(slid_postion AS UNSIGNED INTEGER)";
	}else{
		$Sliderdataval = "SELECT * FROM slideres_table_content WHERE id='$sliderdata'";
	}
    $query_get_data = $contdb->query($Sliderdataval);
    while($row_getslider = $query_get_data->fetch_array()){
        $slder_arrayval[] = $row_getslider;
    }
    return $slder_arrayval;
}

function GLlImagesDataVale($images_id="0"){
    global $contdb, $date, $time;

    if($images_id == "0"){
        $select_imagedat = "SELECT * FROM images_data ORDER BY id DESC";
    }else{
        $select_imagedat = "SELECT * FROM images_data WHERE id='$images_id'";
    }
    $query_get_imag = $contdb->query($select_imagedat);
    while($rowgetimages = $query_get_imag->fetch_array()){
        $array_imagesdtl[] = $rowgetimages;
    }
    return $array_imagesdtl;
}

function GLLImageInsertDataDl($imagname="0",$olf_filename="0"){
    global $contdb, $date, $time;

    if($imagname == "0"){
        return false;
    }else{
        if($olf_filename == "0"){
            $insert_datatype = "INSERT INTO images_data(image_name,image_date,image_time)VALUES('$imagname','$date','$time')";
            $queryinsert = $contdb->query($insert_datatype);
            return true;
        }else{
            $insert_datatype = "INSERT INTO images_data(image_name,image_old,image_date,image_time)VALUES('$imagname','$olf_filename','$date','$time')";
        $queryinsert = $contdb->query($insert_datatype);
        return true;
        }
    }
}

function DeleteImageVale($_delete_imgid,$deletype){
    global $contdb, $date, $time, $url;

    if($deletype == "delete"){
        $_dlet_vale = "DELETE FROM images_data WHERE id='$_delete_imgid'";
        
    }
    $deletvalet = $contdb->query($_dlet_vale);
    return true;
}

function InsertSliderDataVal($_slidermagename_desk,$_slidermagename_mobile,$_slider_contetn,$_slider_url_array,$_Slider_stauts){
    global $contdb, $date, $time, $url;

    $insert_sliderval = "INSERT INTO slideres_table_content(slid_upertitle,slid_image,slid_mob_img,slid_url,slid_status,slid_date,slid_time)VALUES('$_slider_contetn','$_slidermagename_desk','$_slidermagename_mobile','$_slider_url_array','$_Slider_stauts','$date','$time')";
    $query_insert = $contdb->query($insert_sliderval);
    return true;
}

function UpdateAllDataFileds($updatetablename,$update_datafiled,$_getupdateid){
    global $contdb, $date, $time, $url;

    $update_datahol = "UPDATE $updatetablename SET $update_datafiled WHERE $_getupdateid";
    $query_valedat = $contdb->query($update_datahol);
    return true;
}

function DeleteALlDataVlae($deltetable,$deletid){
    global $contdb, $date, $time, $url;

    $delete_datavale = "DELETE FROM $deltetable WHERE $deletid";
    $query_deltval = $contdb->query($delete_datavale);
    return true;
}

function DeleteALlDataVlaeALL($deltetable){
    global $contdb, $date, $time, $url;

    $delete_datavale = "DELETE FROM $deltetable";
    $query_deltval = $contdb->query($delete_datavale);
    return true;
}

function GllInsertNewPage($_page_url,$_page_name,$_page_content,$_page_customlink,$_page_status,$_pahg_new_img){
    global $contdb, $date, $time, $url;

    $unqi_id = uniqid();
    $chking_pagename = "SELECT * FROM all_pagestable WHERE page_name='$_page_name'";
    $query_ckpage = $contdb->query($chking_pagename);
    if($query_ckpage->num_rows > 0){
        return false;
    }else{
        $insert_pagename = "INSERT INTO all_pagestable(page_name,page_slug,page_content,page_cst_link,page_status,page_date,page_time,page_unqi_id,page_brcomimg)VALUES('$_page_name','$_page_url','$_page_content','$_page_customlink','$_page_status','$date','$time','$unqi_id','$_pahg_new_img')";
        $query_insertpage = $contdb->query($insert_pagename);
        return true;
    }
}

function get_page_names($page_id="0",$page_auto_id="0",$page_sulg="0"){
    global $contdb, $date, $time, $url;
    if($page_id == "0" && $page_auto_id == "0"){
        if($page_sulg == "0"){
            $get_page_details = "SELECT * FROM all_pagestable ORDER BY id DESC";
        }else{
            $get_page_details = "SELECT * FROM all_pagestable WHERE page_slug='$page_sulg'";
        }
    }else{
        $get_page_details = "SELECT * FROM all_pagestable WHERE id='$page_id' AND page_unqi_id='$page_auto_id' ORDER BY id DESC";
    }
    $query_getpagename = $contdb->query($get_page_details);
    while($row_get_pagename = $query_getpagename->fetch_array()){
        $get_details_page[] = $row_get_pagename;
    }
    return $get_details_page;
}

function GetHomePageDataval($pagename="0",$pageidauto="0",$pageid="0"){
    global $contdb, $date, $time, $url;

    if($pagename == "0"){
        if($pageidauto == "0" && $pageid == "0"){
            $selcethompag = "SELECT * FROM home_tabelpagecont ORDER BY id DESC";
        }else{
            $selcethompag = "SELECT * FROM home_tabelpagecont WHERE hom_auto_id='$pageidauto' AND hom_id_page='$pageid'";
        }
    }else{
        $selcethompag = "SELECT * FROM home_tabelpagecont WHERE hom_slug='$pagename'";
    }
    $query_homepage = $contdb->query($selcethompag);
    while($row_homepage = $query_homepage->fetch_array()){
        $hompagedata[] = $row_homepage;
    }
    return $hompagedata;
}

function GetAdsSectionVal($page_id="0"){
    global $contdb, $date, $time, $url;

    if($page_id == "0"){
        $_select_adsval = "SELECT * FROM ads_imagesection ORDER BY CAST(adsimg_postion AS UNSIGNED INTEGER)";
    }else{
        $_select_adsval = "SELECT * FROM ads_imagesection WHERE id='$page_id'";
    }
    $query_adsval = $contdb->query($_select_adsval);
    while($row_valeads = $query_adsval->fetch_array()){
        $array_adsvale[] = $row_valeads;
    }
    return $array_adsvale;
}

function InsertAdsaleDataT($ads_title,$_ads_uplodname,$ads_url_set,$ads_target_set,$ads_status_set){
	global $contdb, $date, $time, $url;

	$insetadsvaltde = "INSERT INTO ads_imagesection(adsimg_image,adsimg_url,adsimg_date,adsimg_time,adsimg_status,adsimg_name,adsimg_urltarget)VALUES('$_ads_uplodname','$ads_url_set','$date','$time','$ads_status_set','$ads_title','$ads_target_set')";
	$queryvlaeads = $contdb->query($insetadsvaltde);
	return true;
}

function getCatagrioyesDataVal($catagoyid="0",$maincat="11"){
	global $contdb, $date, $time, $url, $ip;

	if($catagoyid == "0"){
        if($maincat == "11"){
            $cattegoryval = "SELECT * FROM product_categories ORDER BY prd_cat_postion ASC";
        }else{
            $cattegoryval = "SELECT * FROM product_categories WHERE prd_cat_prent_categ='$maincat'";
        }
	}else{
		$cattegoryval = "SELECT * FROM product_categories WHERE id='$catagoyid'";
	}
	$querycatal = $contdb->query($cattegoryval);
	while($rowcatvale = $querycatal->fetch_array()){
		$catvalearray[] = $rowcatvale;
	}
	return $catvalearray;
}


function categoryTree($main_catfory="0",$parent_id = 0, $sub_mark = ''){
    global $contdb, $date, $time, $url, $ip;
    $query = $contdb->query("SELECT * FROM product_categories WHERE prd_cat_prent_categ = $parent_id AND prd_cat_hidevale='1' ORDER BY id ASC");
    if($query->num_rows > 0){
        while($row = $query->fetch_array()){
        	if($main_catfory == "0"){
	            echo '<option value="'.$row['id'].'|'.$row['prd_cat_main_url'].'">'.$sub_mark.$row['prd_cat_name'].'</option>';
	            categoryTree(0,$row['id'], $sub_mark.'---');
	        }elseif($main_catfory == $row['id']){
	        	echo '<option value="'.$row['id'].'|'.$row['prd_cat_main_url'].'" selected>'.$sub_mark.$row['prd_cat_name'].'</option>';

	            categoryTree($main_catfory,$row['id'], $sub_mark.'---');
	        }else{
	        	echo '<option value="'.$row['id'].'|'.$row['prd_cat_main_url'].'">'.$sub_mark.$row['prd_cat_name'].'</option>';
	            categoryTree($main_catfory,$row['id'], $sub_mark.'---');
	        }
        }
    }
}

function categoryTreeInAdmin($main_catfory="0",$parent_id = 0, $sub_mark = ''){
    global $contdb, $date, $time, $url, $ip;
    if($parent_id == "0"){
        $query = $contdb->query("SELECT * FROM product_categories WHERE prd_cat_prent_categ = $parent_id ORDER BY CAST(prd_cat_postion AS UNSIGNED INTEGER)");
    }else{
        $query = $contdb->query("SELECT * FROM product_categories WHERE prd_cat_prent_categ = $parent_id ORDER BY prd_cat_name ASC");
    }
    if($query->num_rows > 0){
        while($row = $query->fetch_array()){
                if($parent_id == "0"){
                    echo '<ul class="acnav__list acnav__list--level'.$row['id'].'"><li class="has-children">';
                    echo '<div class="acnav__label acnav__label--level-'.$row['id'].'">
                              '.$row['prd_cat_name'].'
                              <span class="righticon">';
                        $hidevaleset = $row['prd_cat_hidevale'];
                        if($hidevaleset == "1"){
                            echo '<a href="'.$url.'/admin-manager/category/?hideid='.$row['id'].'&hide=0"><i class="fa fa-eye"></i></a>';
                        }elseif($hidevaleset == "0"){
                            echo '<a href="'.$url.'/admin-manager/category/?hideid='.$row['id'].'&hide=1" class="lossbg"><i class="fa fa-eye-slash"></i></a>';
                        }else{
                            echo '<a href="'.$url.'/admin-manager/category/?hideid='.$row['id'].'&hide=1" class="lossbg"><i class="fa fa-eye-slash"></i></a>';
                        }
                    echo '<a href="'.$url.'/admin-manager/addnew-category/?edit='.$row['id'].'"><i class="fa fa-pencil"></i></a>
                        <a href="'.$url.'/admin-manager/category/?delete=action&id='.$row['id'].'&seoid='.$row['prd_cat_seoauto'].'"><i class="fa fas fa-trash"></i></a>
                              </span>
                            </div>';
                    categoryTreeInAdmin($main_catfory,$row['id'], $sub_mark);
                    echo '</li></ul>';
                }else{
                    echo '<ul class="acnav__list acnav__list--level'.$row['id'].'"><li class="has-children newset">';
                    echo '<div class="acnav__label acnav__label--level-'.$row['id'].'">
                              '.$row['prd_cat_name'].'
                              <span class="righticon">';
                        $hidevaleset = $row['prd_cat_hidevale'];
                        if($hidevaleset == "1"){
                            echo '<a href="'.$url.'/admin-manager/category/?hideid='.$row['id'].'&hide=0"><i class="fa fa-eye"></i></a>';
                        }elseif($hidevaleset == "0"){
                            echo '<a href="'.$url.'/admin-manager/category/?hideid='.$row['id'].'&hide=1" class="lossbg"><i class="fa fa-eye-slash"></i></a>';
                        }
                    echo '<a href="'.$url.'/admin-manager/addnew-category/?edit='.$row['id'].'"><i class="fa fa-pencil"></i></a>
                        <a href="'.$url.'/admin-manager/category/?delete=action&id='.$row['id'].'&seoid='.$row['prd_cat_seoauto'].'"><i class="fa fas fa-trash"></i></a>
                              </span>
                            </div>';
                    categoryTreeInAdmin($main_catfory,$row['id'], $sub_mark);
                    echo '</li></ul>';
                }
        }
    }
}

function categoryTreeInSEOAdmin($main_catfory="0",$parent_id = 0, $sub_mark = ''){
    global $contdb, $date, $time, $url, $ip;
    if($parent_id == "0"){
        $query = $contdb->query("SELECT * FROM product_categories WHERE prd_cat_prent_categ = $parent_id ORDER BY CAST(prd_cat_postion AS UNSIGNED INTEGER)");
    }else{
        $query = $contdb->query("SELECT * FROM product_categories WHERE prd_cat_prent_categ = $parent_id ORDER BY prd_cat_name ASC");
    }
    if($query->num_rows > 0){
        while($row = $query->fetch_array()){
                if($parent_id == "0"){
                    echo '<ul class="acnav__list acnav__list--level'.$row['id'].'"><li class="has-children">';
                    echo '<div class="acnav__label acnav__label--level-'.$row['id'].'">
                              '.$row['prd_cat_name'].'
                              <span class="righticon">';
                        $hidevaleset = $row['prd_cat_hidevale'];
                        if($hidevaleset == "1"){
                            echo '<a href="'.$url.'/seo-user/category/?hideid='.$row['id'].'&hide=0"><i class="fa fa-eye"></i></a>';
                        }elseif($hidevaleset == "0"){
                            echo '<a href="'.$url.'/seo-user/category/?hideid='.$row['id'].'&hide=1" class="lossbg"><i class="fa fa-eye-slash"></i></a>';
                        }
                    echo '<a href="'.$url.'/seo-user/addnew-category/?edit='.$row['id'].'"><i class="fa fa-pencil"></i></a>
                        <a href="'.$url.'/seo-user/category/?delete=action&id='.$row['id'].'&seoid='.$row['prd_cat_seoauto'].'"><i class="fa fas fa-trash"></i></a>
                              </span>
                            </div>';
                    categoryTreeInSEOAdmin($main_catfory,$row['id'], $sub_mark);
                    echo '</li></ul>';
                }else{
                    echo '<ul class="acnav__list acnav__list--level'.$row['id'].'"><li class="has-children newset">';
                    echo '<div class="acnav__label acnav__label--level-'.$row['id'].'">
                              '.$row['prd_cat_name'].'
                              <span class="righticon">';
                        $hidevaleset = $row['prd_cat_hidevale'];
                        if($hidevaleset == "1"){
                            echo '<a href="'.$url.'/seo-user/category/?hideid='.$row['id'].'&hide=0"><i class="fa fa-eye"></i></a>';
                        }elseif($hidevaleset == "0"){
                            echo '<a href="'.$url.'/seo-user/category/?hideid='.$row['id'].'&hide=1" class="lossbg"><i class="fa fa-eye-slash"></i></a>';
                        }
                    echo '<a href="'.$url.'/seo-user/addnew-category/?edit='.$row['id'].'"><i class="fa fa-pencil"></i></a>
                        <a href="'.$url.'/seo-user/category/?delete=action&id='.$row['id'].'&seoid='.$row['prd_cat_seoauto'].'"><i class="fa fas fa-trash"></i></a>
                              </span>
                            </div>';
                    categoryTreeInSEOAdmin($main_catfory,$row['id'], $sub_mark);
                    echo '</li></ul>';
                }
        }
    }
}

function SeoDataGetValeTabl($seoid="0",$autoid="0"){
	global $contdb, $date, $time, $url, $ip;

	if($seoid == "0"){
		if($autoid == "0"){
			$seldet_seodata = "SELECT * FROM seotable ORDER BY id DESC";
		}else{
			$seldet_seodata = "SELECT * FROM seotable WHERE seo_autovale='$autoid'";
		}
	}else{
		$seldet_seodata = "SELECT * FROM seotable WHERE id='$seoid'";
	}
	$qery_valeata = $contdb->query($seldet_seodata);
	while($rowseodaa = $qery_valeata->fetch_array()){
		$arrayseovale[] = $rowseodaa;
	}
	return $arrayseovale;
}

function get_seotitlekeywords($set_idvale){
    global $contdb, $date, $time, $url, $ip;

    $get_namevale = "SELECT * FROM seotable WHERE seo_page_name='$set_idvale'";
    $queryvalseo = $contdb->query($get_namevale);
    while($rowseovale = $queryvalseo->fetch_array()){
        $getstvaleseo[] = $rowseovale;
    }
    return $getstvaleseo;
}

function GetVenderDatavale($vendroautoid=0,$venor_slug=0){
    global $contdb, $date, $time, $url, $ip;

    if($vendroautoid == "0"){
        if($venor_slug == "0"){
            $selectvendor = "SELECT * FROM vendor ORDER BY vendor_f_name ASC";
        }else{
            $selectvendor = "SELECT * FROM vendor WHERE vendor_uni_name='$venor_slug'";
        }
    }else{
        $selectvendor = "SELECT * FROM vendor WHERE vendor_auto='$vendroautoid'";
    }
    $queryvendat = $contdb->query($selectvendor);
    while($row_vendordata = $queryvendat->fetch_array()){
        $arrayvendorevl[] = $row_vendordata;
    }
    return $arrayvendorevl;
}

function CheckVendorDataVal($vendorname){
    global $contdb, $date, $time, $url, $ip;

    /*$checkvend = "SELECT * FROM vendor WHERE vendor_uni_name='$vendorname'";
    $queryvaleset = $contdb->query($checkvend);
    while($rowvalechk = $queryvaleset->fetch_array()){
        $get_unqld = $rowvalechk['vendor_auto'];*/

        $getchkingval = "SELECT * FROM userpermission WHERE user_p_id='$vendorname' AND user_p_block='1'";
        $querychkval = $contdb->query($getchkingval);
        if($querychkval->num_rows > 0){
            return "0";
        }else{
            return "1";
        }
    /*}*/
}

function GetPermissionvalData($permissionautoid){
    global $contdb, $date, $time, $url, $ip;

    $select_permision = "SELECT * FROM userpermission WHERE user_p_id='$permissionautoid'";
    $queryvaledat = $contdb->query($select_permision);
    while($row_venorersmin = $queryvaledat->fetch_array()){
        $set_permindata[] = $row_venorersmin;
    }
    return $set_permindata;
}

function GetBannerDataVale($vensorid,$vendortype,$stauts){
    global $contdb, $date, $time, $url, $ip;

    if($stauts == "All"){
        $getbannerimg = "SELECT * FROM banners WHERE uid='$vensorid' AND type='$vendortype'";
    }else{
        $getbannerimg = "SELECT * FROM banners WHERE uid='$vensorid' AND type='$vendortype' AND status='$stauts'";
    }
    $query_setvenr = $contdb->query($getbannerimg);
    while($rowgetane = $query_setvenr->fetch_array()){
        $arraybnanner[] = $rowgetane;
    }
    return $arraybnanner;
}

function GetProductDataValTab($productautoid="0",$vendorautoid="0",$product_slug="0",$prodout_id="0"){
    global $contdb, $date, $time, $url, $ip;

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
    $query_getprodut = $contdb->query($get_product);
    while($row_getprosuct = $query_getprodut->fetch_array()){
        $arraypodutval[] = $row_getprosuct;
    }
    return $arraypodutval;
}

function GetAboutVendor($vendorauotid,$vesnoretpe){
    global $contdb, $date, $time, $url, $ip;

    $select_about = "SELECT * FROM about_me WHERE uid='$vendorauotid' AND type='$vesnoretpe'";
    $queryvaleabut = $contdb->query($select_about);
    while($rowgetvalne = $queryvaleabut->fetch_array()){
        $selectabutarray[] = $rowgetvalne;
    }
    return $selectabutarray;
}

function GetShppingTreamValue($vendorauotid,$vesnoretpe){
    global $contdb, $date, $time, $url, $ip;

    $selectshpping = "SELECT * FROM termsCondition WHERE uid='$vendorauotid' AND type='$vesnoretpe'";
    $query_shpiinval = $contdb->query($selectshpping);
    while($row_geralushpin = $query_shpiinval->fetch_array()){
        $sppingvalearray[] = $row_geralushpin;
    }
    return $sppingvalearray;
}

function UpdateBannerDataVal($vensor_bannerimgname,$get_vesnor_id){
    global $contdb, $date, $time, $url, $ip;

    $chking_bannerval = "SELECT * FROM banners WHERE uid='$get_vesnor_id'";
    $qury_banner = $contdb->query($chking_bannerval);
    if($qury_banner->num_rows > 0){
        $update_query = "UPDATE banners SET bannerName='$vensor_bannerimgname' WHERE uid='$get_vesnor_id'";
    }else{
        $update_query = "INSERT INTO banners(uid,type,bannerName,submitDate,submitTime,status)VALUES('$get_vesnor_id','vendor','$vensor_bannerimgname','$date','$time','active')";
    }
    $query_setval = $contdb->query($update_query);
    return true;
}

function GetCustomerDataVal($customerautoid="0"){
    global $contdb, $date, $time, $url, $ip;

    if($customerautoid == "0"){
        $selectcustomvl = "SELECT * FROM customer ORDER BY id DESC";
    }else{
        $selectcustomvl = "SELECT * FROM customer WHERE customer_ui_id='$customerautoid'";
    }
    $query_custom = $contdb->query($selectcustomvl);
    while ($row_customer = $query_custom->fetch_array()) {
        $customerarray[] = $row_customer;
    }
    return $customerarray;
}

function GetLoginUserDetails($autoid,$logintype="0"){
    global $contdb, $date, $time, $url, $ip;

    if($logintype == "0"){
        if($autoid == "0"){
            $customevaledt = "SELECT * FROM userlogntable";
        }else{
            $customevaledt = "SELECT * FROM userlogntable WHERE user_auto='$autoid'";
        }
    }else{
        if($autoid == "0"){
            $customevaledt = "SELECT * FROM userlogntable WHERE user_type='$logintype'";
        }else{
            $customevaledt = "SELECT * FROM userlogntable WHERE user_type='$logintype' AND user_auto='$autoid'";
        }
    }
    $queryvaledt = $contdb->query($customevaledt);
    while($rowvalelogin = $queryvaledt->fetch_array()){
        $logindetals[] = $rowvalelogin;
    }
    return $logindetals;
}

function CustomerOderTable($customerid="0",$shpping_id="0"){
    global $contdb, $date, $time, $url, $ip;

    if($customerid == "0"){
        $customorder = "SELECT * FROM customer_order ORDER BY id DESC";
    }else{
        $customorder = "SELECT * FROM customer_order WHERE customer_id='$customerid' AND p_serty_id='$shpping_id' LIMIT 1";
    }
    $query_custordr = $contdb->query($customorder);
    while($row_customerval = $query_custordr->fetch_array()){
        $custoer_arrayorder[] = $row_customerval;
    }
    return $custoer_arrayorder;
}

function CustomerShppingValue($customershpid,$shppingid){
    global $contdb, $date, $time, $url, $ip;

    $selectshpo = "SELECT * FROM shipping_table WHERE mul_shipp_custid='$customershpid' AND mul_shipp_setid='$shppingid'";
    $queryvaleshp = $contdb->query($selectshpo);
    while($rowsethping = $queryvaleshp->fetch_array()){
        $arrayshppingvl[] = $rowsethping;
    }
    return $arrayshppingvl;
}

function GetCustomerToAddress($Cusrid,$shppinddate){
	global $contdb, $date, $time, $url, $ip;

	$shpping_addres = "SELECT * FROM shpptoadds WHERE cust_to_id='$cust_to_id' AND cust_to_date='$shppinddates'";
	$query_shigval = $contdb->query($shpping_addres);
	while($rowqueryshp = $query_shigval->fetch_array()){
		$arryatoadd[] = $rowqueryshp;
	}
	return $arryatoadd;
}

function GetTvNewsSection($tvnewsid="0",$type,$limit="0",$slugurl="0"){
	global $contdb, $date, $time, $url, $ip;

	if($tvnewsid == "0"){
        if($limit == "0"){
            if($slugurl == "0"){
                $selectnews = "SELECT * FROM gllnewstv_section WHERE tvnews_type='$type' ORDER BY tvnews_date DESC, tvnews_time DESC";
            }else{
                $selectnews = "SELECT * FROM gllnewstv_section WHERE tvnews_type='$type' AND tvnewsval_url='$slugurl'";
            }
        }else{
            $selectnews = "SELECT * FROM gllnewstv_section WHERE tvnews_type='$type' ORDER BY tvnews_date DESC, tvnews_time DESC LIMIT $limit";
        }
	}else{
		$selectnews = "SELECT * FROM gllnewstv_section WHERE id='$tvnewsid' AND tvnews_type='$type'";
	}
	$query_newsdat = $contdb->query($selectnews);
	while($rowsetnews = $query_newsdat->fetch_array()){
		$array_newsval[] = $rowsetnews;
	}
	return $array_newsval;
}

function GetTvOnlyNewsSection($tvnewsid="0",$type,$limit="0",$slugurl="0"){
    global $contdb, $date, $time, $url, $ip;

    if($tvnewsid == "0"){
        if($limit == "0"){
            if($slugurl == "0"){
                $selectnews = "SELECT * FROM gllnewstv_section WHERE tvnews_type='$type' ORDER BY CAST(tvnews_poestion AS UNSIGNED INTEGER)";
            }else{
                $selectnews = "SELECT * FROM gllnewstv_section WHERE tvnews_type='$type' AND tvnewsval_url='$slugurl'";
            }
        }else{
            $selectnews = "SELECT * FROM gllnewstv_section WHERE tvnews_type='$type' ORDER BY CAST(tvnews_poestion AS UNSIGNED INTEGER) LIMIT $limit";
        }
    }else{
        $selectnews = "SELECT * FROM gllnewstv_section WHERE id='$tvnewsid' AND tvnews_type='$type'";
    }
    $query_newsdat = $contdb->query($selectnews);
    while($rowsetnews = $query_newsdat->fetch_array()){
        $array_newsval[] = $rowsetnews;
    }
    return $array_newsval;
}

function getHomeGllNewsSetion($type,$limit){
    global $contdb, $date, $time, $url, $ip;

    if($limit == "0"){
        $selectnews = "SELECT * FROM gllnewstv_section WHERE tvnews_type='$type' AND tvnews_status='1' ORDER BY tvnews_date DESC, tvnews_time DESC";
    }else{
        $selectnews = "SELECT * FROM gllnewstv_section WHERE tvnews_type='$type' AND tvnews_status='1' ORDER BY tvnews_date DESC, tvnews_time DESC LIMIT $limit";
    }
    $query_newsdat = $contdb->query($selectnews);
    while($rowsetnews = $query_newsdat->fetch_array()){
        $array_newsval[] = $rowsetnews;
    }
    return $array_newsval;
}

function getHomeGllNewsSetionTV($type,$limit){
    global $contdb, $date, $time, $url, $ip;

    if($limit == "0"){
        $selectnews = "SELECT * FROM gllnewstv_section WHERE tvnews_type='$type' AND tvnews_status='1' ORDER BY CAST(tvnews_poestion AS UNSIGNED INTEGER)";
    }else{
        $selectnews = "SELECT * FROM gllnewstv_section WHERE tvnews_type='$type' AND tvnews_status='1' ORDER BY CAST(tvnews_poestion AS UNSIGNED INTEGER) LIMIT $limit";
    }
    $query_newsdat = $contdb->query($selectnews);
    while($rowsetnews = $query_newsdat->fetch_array()){
        $array_newsval[] = $rowsetnews;
    }
    return $array_newsval;
}

function GllHomenewarvil($limit_set,$product_autid="0"){
    global $contdb, $date, $time, $url, $ip;
    if($product_autid == "0"){
        $get_newarvila = "SELECT * FROM all_product WHERE product_status='1' ORDER BY id DESC LIMIT $limit_set";
    }else{
        $get_newarvila = "SELECT * FROM all_product WHERE product_status='1' AND product_auto_id='$product_autid'";
    }
    $query_setnewarl = $contdb->query($get_newarvila);
    while($row_get_newarvl = $query_setnewarl->fetch_array()){
        $array_newarvial[] = $row_get_newarvl;
    }
    return $array_newarvial;
}

function GetProductPriceVal($prouct_autoid){
    global $contdb, $date, $time, $url, $ip;

    $prodt_valueata = "SELECT * FROM all_product WHERE product_status='1' AND product_auto_id='$prouct_autoid'";
    $query_price = $contdb->query($prodt_valueata);
    while($row_priceval = $query_price->fetch_array()){
        $price_value = $row_priceval['product_regular_price'];
        $attbutvalcolor = $row_priceval['product_color'];
        $value_theravl = $prouct_autoid;

        if($price_value == "0" || $price_value == ""){

          $get_vertionprice = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$value_theravl'";
          $queryvaledat = $contdb->query($get_vertionprice);
          while($rowgetdatval = $queryvaledat->fetch_array()){
            $get_total_regulor = $rowgetdatval['prot_trm_regulprc'];
            $sale_price = $rowgetdatval['prot_trm_saleprc'];
          }
          if($sale_price == "0" || $sale_price == ""){
            $sale_min = "SELECT MIN(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$value_theravl'";
            $sale_resultmin = $contdb->query($sale_min);
            $sale_rowmin = $sale_resultmin->fetch_array();
            $sale_minvalmin = $sale_rowmin[0];

            $sale_max = "SELECT MAX(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$value_theravl'";
            $sale_resultmax = $contdb->query($sale_max);
            $sale_rowmax = $sale_resultmax->fetch_array();
            $sale_minvalmax = $sale_rowmax[0];
            if($sale_minvalmin == $sale_minvalmax){
              $price = "<span id='p_price' data-id='$get_total_regulor'>₹".number_format($get_total_regulor, 2)."</span>";
            }else{
              $price = "<span>₹".number_format($sale_minvalmin, 2)."</span> - <span id='p_price' data-id='$sale_minvalmax'>₹".number_format($sale_minvalmax, 2)."</span>";
            }
          }else{
            $sale_min = "SELECT MIN(prot_trm_saleprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$value_theravl'";
            $sale_resultmin = $contdb->query($sale_min);
            $sale_rowmin = $sale_resultmin->fetch_array();
            $sale_minvalmin = $sale_rowmin[0];

            $sale_max = "SELECT MAX(prot_trm_saleprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$value_theravl'";
            $sale_resultmax = $contdb->query($sale_max);
            $sale_rowmax = $sale_resultmax->fetch_array();
            $sale_minvalmax = $sale_rowmax[0];
              if($sale_minvalmin == $sale_minvalmax){
                $price = "<span class='old-price'>₹".number_format($get_total_regulor, 2)."</span><span id='p_price' data-id='$sale_minvalmin'>₹".number_format($sale_minvalmin, 2)."</span>";
              }else{
                $price = "<span id='p_price' data-id='$sale_minvalmin'>₹".number_format($sale_minvalmin, 2)."</span> - <span id='p_price' data-id='$sale_minvalmax'>₹".number_format($sale_minvalmax, 2)."</span>";
              }
          }
        }else{
            if($row_priceval['product_sale_price'] == ""){
                 $price = "<span id='p_price' data-id='".$row_priceval['product_regular_price']."'>₹".number_format($row_priceval['product_regular_price'], 2)."</span>";
              }else{
                $price = "<span class='old-price'>₹".number_format($row_priceval['product_regular_price'], 2)."</span><span id='p_price' data-id='".$row_priceval['product_sale_price']."'>₹".$row_priceval['product_sale_price']."</span>";
            }
        }
    }
    return $price;
}

function AffrimGetProductPriceVal($prouct_autoid){
    global $contdb, $date, $time, $url, $ip;

    $prodt_valueata = "SELECT * FROM all_product WHERE product_status='1' AND product_auto_id='$prouct_autoid'";
    $query_price = $contdb->query($prodt_valueata);
    while($row_priceval = $query_price->fetch_array()){
        $price_value = $row_priceval['product_regular_price'];
        $attbutvalcolor = $row_priceval['product_color'];
        $attbutvalautoid = $row_priceval['product_auto_id'];

        if($price_value == "0" || $price_value == ""){

          $get_vertionprice = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$attbutvalautoid'";
          $queryvaledat = $contdb->query($get_vertionprice);
          while($rowgetdatval = $queryvaledat->fetch_array()){
            $get_total_regulor = $rowgetdatval['prot_trm_regulprc'];
            $sale_price = $rowgetdatval['prot_trm_saleprc'];
          }
          if($sale_price == "0" || $sale_price == ""){
            $sale_min = "SELECT MIN(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$attbutvalautoid'";
            $sale_resultmin = $contdb->query($sale_min);
            $sale_rowmin = $sale_resultmin->fetch_array();
            $sale_minvalmin = $sale_rowmin[0];

            $sale_max = "SELECT MAX(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$attbutvalautoid'";
            $sale_resultmax = $contdb->query($sale_max);
            $sale_rowmax = $sale_resultmax->fetch_array();
            $sale_minvalmax = $sale_rowmax[0];
            if($sale_minvalmin == $sale_minvalmax){
              $price = "<p class='affirm-as-low-as' data-page-type='product' data-amount='".$get_total_regulor."00'></p>";
            }else{
              $price = "<p class='affirm-as-low-as' data-page-type='product' data-amount='".$sale_minvalmax."00'></p>";
            }
          }else{
            $sale_min = "SELECT MIN(prot_trm_saleprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor'";
            $sale_resultmin = $contdb->query($sale_min);
            $sale_rowmin = $sale_resultmin->fetch_array();
            $sale_minvalmin = $sale_rowmin[0];

            $sale_max = "SELECT MAX(prot_trm_saleprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$attbutvalautoid'";
            $sale_resultmax = $contdb->query($sale_max);
            $sale_rowmax = $sale_resultmax->fetch_array();
            $sale_minvalmax = $sale_rowmax[0];
              if($sale_minvalmin == $sale_minvalmax){
                $price = "<p class='affirm-as-low-as' data-page-type='product' data-amount='".$sale_minvalmin."00'></p>";
              }else{
                $price = "<p class='affirm-as-low-as' data-page-type='product' data-amount='".$sale_minvalmax."00'></p>";
              }
          }
        }else{
            if($row_priceval['product_sale_price'] == ""){
                 $price = "<p class='affirm-as-low-as' data-page-type='product' data-amount='".$row_priceval['product_regular_price']."00'></p>";
              }else{
                $price = "<p class='affirm-as-low-as' data-page-type='product' data-amount='".$row_priceval['product_sale_price']."00'></p>";
            }
        }
    }
    return $price;
}

function shortingGetProductPriceVal($prouct_autoid){
    global $contdb, $date, $time,$ip;

    $prodt_valueata = "SELECT * FROM all_product WHERE product_status='1' AND product_auto_id='$prouct_autoid'";
    $query_price = $contdb->query($prodt_valueata);
    while($row_priceval = $query_price->fetch_array()){
        $price_value = $row_priceval['product_regular_price'];
        $attbutvalcolor = $row_priceval['product_color'];
        $attbutvalautoid = $row_priceval['product_auto_id'];

        if($price_value == "0" || $price_value == ""){

          $get_vertionprice = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$attbutvalautoid'";
          $queryvaledat = $contdb->query($get_vertionprice);
          while($rowgetdatval = $queryvaledat->fetch_array()){
            $get_total_regulor = $rowgetdatval['prot_trm_regulprc'];
            $sale_price = $rowgetdatval['prot_trm_saleprc'];
          }
          if($sale_price == "0" || $sale_price == ""){
            $sale_min = "SELECT MIN(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$attbutvalautoid'";
            $sale_resultmin = $contdb->query($sale_min);
            $sale_rowmin = $sale_resultmin->fetch_array();
            $sale_minvalmin = $sale_rowmin[0];

            $sale_max = "SELECT MAX(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$attbutvalautoid'";
            $sale_resultmax = $contdb->query($sale_max);
            $sale_rowmax = $sale_resultmax->fetch_array();
            $sale_minvalmax = $sale_rowmax[0];
            if($sale_minvalmin == $sale_minvalmax){
              $price = $get_total_regulor;
            }else{
              $price = $sale_minvalmax;
            }
          }else{
            $sale_min = "SELECT MIN(prot_trm_saleprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$attbutvalautoid'";
            $sale_resultmin = $contdb->query($sale_min);
            $sale_rowmin = $sale_resultmin->fetch_array();
            $sale_minvalmin = $sale_rowmin[0];

            $sale_max = "SELECT MAX(prot_trm_saleprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$attbutvalautoid'";
            $sale_resultmax = $contdb->query($sale_max);
            $sale_rowmax = $sale_resultmax->fetch_array();
            $sale_minvalmax = $sale_rowmax[0];
              if($sale_minvalmin == $sale_minvalmax){
                $price = $sale_minvalmin;
              }else{
                $price = $sale_minvalmax;
              }
          }
        }else{
            if($row_priceval['product_sale_price'] == ""){
                 $price = $row_priceval['product_regular_price'];
              }else{
                $price = $row_priceval['product_sale_price'];
            }
        }
    }
    return $price;
}


function GetAddtocartButton($prouct_autoid){
    global $contdb, $date, $time, $url, $ip;

    $_selectcart = "SELECT * FROM all_product WHERE product_status='1' AND product_auto_id='$prouct_autoid'";
    $query_cart = $contdb->query($_selectcart);
    while($row_cartval = $query_cart->fetch_array()){
        $attbutvalcolor = $row_cartval['product_color'];
        $googleurlset = $url.'/'.$row_cartval['product_page_name'];

        if($row_cartval['product_regular_price'] == "0" || $row_cartval['product_regular_price'] == ""){

            $get_vertionprice = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$prouct_autoid'";
              $queryvaledat = $contdb->query($get_vertionprice);
              while($rowgetdatval = $queryvaledat->fetch_array()){
                $get_total_quntity = $rowgetdatval['prot_trm_quantity'];
                $get_val_quntity[] = str_replace('0','01',$rowgetdatval['prot_trm_quantity']);
              }
              $arrayvale = array_unique($get_val_quntity);
            $impldevale = implode(',', $arrayvale);
              if($impldevale == '01'){
                //print_r($get_val_quntity);
                $addtocart = "<a class='add btn-danger unavailable' data-toggle='tooltip' data-placement='top' title='Out of stock'><i class='fi-rs-shopping-cart' class='outofstockqut'></i></a>";
              }else{
                //print_r($get_val_quntity);
                $addtocart = '<span class="add" data-toggle="tooltip" data-placement="top" title="Select Option"><a href="'.$url.'/'.$row_cartval['product_page_name'].'"><i class="fi-rs-shopping-cart"></i></a></span>';
              }
        }else{
            if($row_cartval['product_stock'] == ""){
                $get_cart_val = "SELECT * FROM cart_user WHERE cart_prdo_auto_id='$prouct_autoid' AND cart_user_ip='$ip'";
                $get_valsetset = $contdb->query($get_cart_val);
                if($get_valsetset->num_rows > 0){
                    $addtocart = '<span class="add adtoCartSingle already-addcart" data-toggle="tooltip" data-placement="top" title="Already in cart " pid="'.$row_cartval['id'].'"><a href="javascript:void(0);"><i class="fi-rs-shopping-cart"></i></a></span>';    
                }else{
                    $addtocart = '<span class="add adtoCartSingle" data-toggle="tooltip" data-placement="top" title="Add to Cart " pid="'.$row_cartval['id'].'"><a href="javascript:void(0);"><i class="fi-rs-shopping-cart"></i></a></span>';
                }
                
            }elseif($row_cartval['product_stock'] == "0"){
                $addtocart = "<sapn class='add btn-danger unavailable' data-toggle='tooltip' data-placement='top' title='Out of stock'><i class='fi-rs-shopping-cart' class='outofstockqut'></i></span>";
            }else{
                $get_cart_val = "SELECT * FROM cart_user WHERE cart_prdo_auto_id='$prouct_autoid' AND cart_user_ip='$ip'";
                $get_valsetset = $contdb->query($get_cart_val);
                if($get_valsetset->num_rows > 0){
                      $addtocart = '<sapn class="add adtoCartSingle already-addcart" data-toggle="tooltip" data-placement="top" title="Already in cart" pid="'.$row_cartval['id'].'"><a href="javascript:void(0);"><i class="fi-rs-shopping-cart"></i></a></span>';  
                }else{
                    $addtocart = '<span class="add adtoCartSingle" data-toggle="tooltip" data-placement="top" title="Add to Cart" pid="'.$row_cartval['id'].'"><a href="javascript:void(0);"><i class="fi-rs-shopping-cart"></i></a></span>'; 
                }
            }
        }
    }
    return $addtocart;
}

function GetAddtoWishList($prouct_autoid,$cutomerid="0"){
    global $contdb, $date, $time, $url, $ip, $brower;

    if($cutomerid == "0"){
        $selt_btnvale = "SELECT * FROM wishlistbl_table WHERE whis_prd_id='$prouct_autoid' AND whis_ip='$ip' AND whis_broswer='$brower'";
    }else{
        $selt_btnvale = "SELECT * FROM wishlistbl_table WHERE whis_prd_id='$prouct_autoid' AND whis_customerd='$cutomerid'";
    }
    $query_valeuset = $contdb->query($selt_btnvale);
    if($query_valeuset->num_rows > 0){
        $whisbtnvale = "<a class='action-btn already-wishlist' aria-label='Already in wish list'><i class='fi-rs-heart'></i></a>";
    }else{
        $whisbtnvale = "<a class='action-btn adtoLike' data-id='$prouct_autoid' aria-label='Add to Wishlist'><i class='fi-rs-heart'></i></a>";
    }
    return $whisbtnvale;
}

function GetProductSmallImage($get_productautoid,$limit="0"){
    global $contdb, $date, $time, $url, $ip;
    
    if($limit == "0"){
        $product_imgval = "SELECT * FROM product_mutli_image WHERE produt_id='$get_productautoid' ORDER BY img_postion ASC, id ASC";
    }else{
        $product_imgval = "SELECT * FROM product_mutli_image WHERE produt_id='$get_productautoid' ORDER BY img_postion ASC, id ASC LIMIT $limit";
    }
    $query_multiimag = $contdb->query($product_imgval);
    while($row_imgvalary = $query_multiimag->fetch_array()){
        $array_multiimg[] = $row_imgvalary;
    }
    return $array_multiimg;
}

function GetCatagroyProduct($limit,$catagoryname){
    global $contdb, $date, $time, $url, $ip;

    $get_months = "SELECT * FROM delayhomepost";
    $getmt = $contdb->query($get_months);
    while($getvaleset = $getmt->fetch_array()){
        $get_monthsvale = $getvaleset['postmonths'];
        $get_sdate = $getvaleset['postsdate'];
        $get_edate = $getvaleset['postedate'];
        $timeget = $getvaleset['timevale'];
    }
    $adddays = date("Y-m-d", strtotime("+$get_monthsvale days"));
    $adddays_onday = date("Y-m-d", strtotime("+1 days"));
    /*if(($date >= $get_edate)){
        $updatevale = "UPDATE delayhomepost SET postsdate='$adddays_onday', postedate='$adddays', timevale='$time'";
        $queryvaleset = $contdb->query($updatevale);
        $select_catgyprot = "SELECT * FROM all_product WHERE product_status='1' AND FIND_IN_SET('$catagoryname', product_catger) ORDER BY RAND() DESC LIMIT $limit";
    }else{*/
        $select_catgyprot = "SELECT * FROM all_product WHERE product_status='1' AND FIND_IN_SET('$catagoryname', product_catger) ORDER BY RAND() DESC LIMIT $limit";
    /*}*/

    $query_getcat = $contdb->query($select_catgyprot);
    while($rowcat_pd = $query_getcat->fetch_array()){
        $get_product_catgy[] = $rowcat_pd;
    }
    return $get_product_catgy;
}

function GetCatagroyProduct_woman_one($limit,$catagoryname){
    global $contdb, $date, $time, $url, $ip;

    $get_months = "SELECT * FROM delayhomepost";
    $getmt = $contdb->query($get_months);
    while($getvaleset = $getmt->fetch_array()){
        $get_monthsvale = $getvaleset['postmonths'];
        $get_sdate = $getvaleset['postsdate'];
        $get_edate = $getvaleset['postedate'];
        $timeget = $getvaleset['timevale'];
    }
    $adddays = date("Y-m-d", strtotime("+$get_monthsvale days"));
    $adddays_onday = date("Y-m-d", strtotime("+1 days"));
    if(($date >= $get_edate)){
        $updatevale = "UPDATE delayhomepost SET postsdate='$adddays_onday', postedate='$adddays', timevale='$time'";
        $queryvaleset = $contdb->query($updatevale);
        $select_catgyprot = "SELECT * FROM all_product WHERE product_status='1' AND FIND_IN_SET('$catagoryname', product_catger) ORDER BY RAND() DESC LIMIT $limit";
    }else{
        $select_catgyprot = "SELECT * FROM all_product WHERE product_status='1' AND FIND_IN_SET('$catagoryname', product_catger) ORDER BY product_image DESC LIMIT $limit";
    }

    $query_getcat = $contdb->query($select_catgyprot);
    while($rowcat_pd = $query_getcat->fetch_array()){
        $get_product_catgy[] = $rowcat_pd['product_auto_id'];
    }
    return $get_product_catgy;
}

function GetCatagroyProductmen($limit,$catagoryname){
    global $contdb, $date, $time, $url, $ip;

    $get_months = "SELECT * FROM delayhomepost";
    $getmt = $contdb->query($get_months);
    while($getvaleset = $getmt->fetch_array()){
        $get_monthsvale = $getvaleset['postmonths'];
        $get_sdate = $getvaleset['postsdate'];
        $get_edate = $getvaleset['postedate'];
        $timeget = $getvaleset['timevale'];
    }
    $adddays = date("Y-m-d", strtotime("+$get_monthsvale days"));
    $adddays_onday = date("Y-m-d", strtotime("+1 days"));
    /*if(($date >= $get_edate)){
        $updatevale = "UPDATE delayhomepost SET postsdate='$adddays_onday', postedate='$adddays', timevale='$time'";
        $queryvaleset = $contdb->query($updatevale);
        $select_catgyprot = "SELECT * FROM all_product WHERE product_status='1' AND FIND_IN_SET('$catagoryname', product_catger) ORDER BY RAND() DESC LIMIT $limit";
    }else{*/
        $select_catgyprot = "SELECT * FROM all_product WHERE product_status='1' AND FIND_IN_SET('$catagoryname', product_catger) ORDER BY RAND() DESC LIMIT $limit";
    /*}*/
    $query_getcat = $contdb->query($select_catgyprot);
    while($rowcat_pd = $query_getcat->fetch_array()){
        $get_product_catgy[] = $rowcat_pd;
    }
    return $get_product_catgy;
}

function page_name_checking($get_page_name=0,$page_id=0){
    global $contdb;
    if($page_id == "0"){
        $checking_pagename = "SELECT * FROM all_pagestable WHERE page_slug='$get_page_name' AND page_status='1' LIMIT 1";
        $query_pagename = $contdb->query($checking_pagename);
        if($query_pagename->num_rows > 0){
            while($get_pagedata = $query_pagename->fetch_array()){
                $custom_url = $get_pagedata['page_cst_link'];
            }
            if($custom_url != ""){
                $page_name =  $custom_url;
            }else{
                $page_name = 'pages.php';
            }
        }else{
            $_productname = "SELECT * FROM all_product WHERE product_page_name='$get_page_name' AND product_status='1'";
            $query_produt = $contdb->query($_productname);
            if($query_produt->num_rows > 0){
                while($rowgtvalepro = $query_produt->fetch_array()){
                    $page_name = 'products-details.php';
                }
            }else{
                $chec_catgy = "SELECT * FROM product_categories WHERE prd_cat_main_url='$get_page_name' AND prd_cat_hidevale='1' LIMIT 1";
                $query_catgy = $contdb->query($chec_catgy);
                if($query_catgy->num_rows > 0){
                    $page_name = 'product-cat.php';
                }else{

                    $get_venornae = "SELECT * FROM vendor WHERE vendor_uni_name='$get_page_name' LIMIT 1";
                    $query_get_venodr = $contdb->query($get_venornae);
                    if($query_get_venodr->num_rows > 0){
                        $page_name = 'single-vendor.php';
                    }else{

                        $_get_glltvval = "SELECT * FROM gllnewstv_section WHERE tvnewsval_url='$get_page_name' LIMIT 1";
                        $query_tval = $contdb->query($_get_glltvval);
                        if($query_tval->num_rows > 0){
                            $page_name = 'gll-news-detail.php';
                        }else{
                            $page_name = '404.php';
                        }
                    }
                }
            }
        }
    }else{
        $page_name = '404.php'; 
    }
    return $page_name;
}

function VertionsSetSinglePD($product_vertion,$selectedid="0"){
    global $contdb, $date, $time, $url, $ip;

      $vertion_session_id = explode(',', $product_vertion);
      echo '<table class="variations" id="'.$product_vertion.'">
            <tbody>';
      foreach($vertion_session_id as $stockcount){
        if($stockcount != ""){
          $get_hold_idtotle = "SELECT * FROM product_active_attbut WHERE attbut_productid='$stockcount'";
          $querystockval = $contdb->query($get_hold_idtotle);
          while($rowshowstork = $querystockval->fetch_array()){
            $get_attbutid = $rowshowstork['attbut_id'];

            $get_attbutterm = "SELECT * FROM product_attbut WHERE id='$get_attbutid'";
            $querygettrem = $contdb->query($get_attbutterm);
            while($querugetroe = $querygettrem->fetch_array()){
              $showabbutname = $querugetroe['pd_attbut_name'];
            
          echo "<tr><td class='label'><label>$showabbutname</label></td>
                <td class='value'>
                    <select name='fillterval[]' data-id='$pId' class='item-stock sizeattbut'>
                    <option value='0'>Select $showabbutname</option>";

                $blank = "";
                $vartionval = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='$stockcount' AND proval_trm_attid='$get_attbutid' AND proval_trm_postion='$blank'";
                $chceckvartion = $contdb->query($vartionval);
                if($chceckvartion->num_rows > 0){
                    $get_tram_vale = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='$stockcount' AND proval_trm_attid='$get_attbutid' ORDER BY id DESC";
                }else{
                    $get_tram_vale = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='$stockcount' AND proval_trm_attid='$get_attbutid' ORDER BY CAST(proval_trm_postion AS UNSIGNED INTEGER)";
                }
                $querytrmval = $contdb->query($get_tram_vale);
                while($rowdataval = $querytrmval->fetch_array()){
                  $get_value_data = $rowdataval['id'];
                  $get_id_datatrem = $rowdataval['id'];
                  $get_name_datatrem = $rowdataval['proval_trm_value'];
                  $trim_post = $rowdataval['proval_trm_postion'];

                  $chking_pricevale = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_id='$get_id_datatrem' AND prot_trm_prodtid='$product_vertion'";
                  $querycking = $contdb->query($chking_pricevale);
                  if($querycking->num_rows > 0){
                    if($selectedid == "0"){
                        echo "<option value='".$get_id_datatrem."'>".$get_name_datatrem."</option>";
                    }else{
                        $selecionarray = explode(',', $selectedid);
                        if(in_array($get_id_datatrem, $selecionarray)){
                            echo "<option value='".$get_id_datatrem."' selected>".$get_name_datatrem."</option>";
                        }else{
                            echo "<option value='".$get_id_datatrem."'>".$get_name_datatrem."</option>";
                        }
                    }
                  }
                }

          echo "</select></td></tr>";
          }
          }
        }
      }
      echo '</tbody>
              </table>';
}

function SingleProductPagePrice($product_vertionid,$verion_id="0"){
    global $contdb, $date, $time, $url, $ip;


    $checking_data = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_id='$verion_id' AND prot_trm_prodtid='$product_vertionid'";
    $querycheckval = $contdb->query($checking_data);
    if($querycheckval->num_rows > 0){
      while ($rowdatachecking = $querycheckval->fetch_array()) {
        $get_sale_price = $rowdatachecking['prot_trm_saleprc'];
        $get_regul_price = $rowdatachecking['prot_trm_regulprc'];
        $get_quntity = $rowdatachecking['prot_trm_quantity'];
        //$datavale = $get_sale_price."|".$get_regul_price."|".$get_quntity;
        //echo "00";
        if($get_sale_price == "0" || $get_sale_price == ""){
          $productprice = $get_regul_price;
          echo "<ins id='p_price' data-id='".$get_regul_price."'>₹".number_format($get_regul_price, 2)."</ins>";
        }else{
          $holl_price_data = $get_sale_price;
          $productprice = $get_sale_price;
          echo "<ins id='p_price' data-id='".$get_sale_price."'>₹".number_format($get_sale_price, 2)."</ins>";

          echo "<del>₹".number_format($get_regul_price, 2)."</del>";
        }
      }
    }else{
        $checking_data = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$product_vertionid'";
        $querycheckval = $contdb->query($checking_data);
        if($querycheckval->num_rows > 0){
          while ($rowdatachecking = $querycheckval->fetch_array()) {
            $get_sale_price = $rowdatachecking['prot_trm_saleprc'];
            $get_regul_price = $rowdatachecking['prot_trm_regulprc'];
            $array_rgulprice[] = $get_regul_price;
            $get_quntity = $rowdatachecking['prot_trm_quantity'];
          }
          if($get_sale_price == "0" || $get_sale_price == ""){
                $productprice = $get_regul_price;
                $sale_min = "SELECT MIN(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$product_vertionid'";
                $sale_resultmin = $contdb->query($sale_min);
                $sale_rowmin = $sale_resultmin->fetch_array();
                $sale_minvalmin = $sale_rowmin[0];

                $sale_max = "SELECT MAX(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$product_vertionid'";
                $sale_resultmax = $contdb->query($sale_max);
                $sale_rowmax = $sale_resultmax->fetch_array();
                $sale_minvalmax = $sale_rowmax[0];
                if($sale_minvalmin == $sale_minvalmax){
                  echo "<ins id='p_price' data-id='$get_regul_price'>₹".number_format($get_regul_price, 2)."</ins>";
                }else{
                  echo "<ins>₹".number_format($sale_minvalmin, 2)."</ins> - <ins id='p_price' data-id='$sale_minvalmax'>₹".number_format($sale_minvalmax, 2)."</ins>";
                }
              /*echo "<ins id='p_price' data-id='".$get_regul_price."'>₹".number_format($get_regul_price, 2)."</ins>";*/
            }else{
              $holl_price_data = $get_sale_price;
              $productprice = $get_sale_price;
              echo "<ins id='p_price' data-id='".$get_sale_price."'>₹".number_format($get_sale_price, 2)."</ins>";

              echo "<del>₹".number_format($get_regul_price, 2)."</del>";
            }
        }
    }
}

function SingleProductPagePriceAddToCart($product_vertionid,$verion_id="0"){
    global $contdb, $date, $time, $url, $ip;


    $checking_data = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_id='$verion_id' AND prot_trm_prodtid='$product_vertionid'";
    $querycheckval = $contdb->query($checking_data);
    if($querycheckval->num_rows > 0){
      while ($rowdatachecking = $querycheckval->fetch_array()) {
        $get_sale_price = $rowdatachecking['prot_trm_saleprc'];
        $get_regul_price = $rowdatachecking['prot_trm_regulprc'];
        $get_quntity = $rowdatachecking['prot_trm_quantity'];
        //$datavale = $get_sale_price."|".$get_regul_price."|".$get_quntity;
        //echo "00";
        if($get_sale_price == "0" || $get_sale_price == ""){
          $productprice = $get_regul_price;
          $arrayvelset = array($get_regul_price);
        }else{
          $holl_price_data = $get_sale_price;
          $productprice = $get_sale_price;
         $arrayvelset = array($get_sale_price,$get_regul_price);
        }
      }
    }else{
        $checking_data = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$product_vertionid'";
        $querycheckval = $contdb->query($checking_data);
        if($querycheckval->num_rows > 0){
          while ($rowdatachecking = $querycheckval->fetch_array()) {
            $get_sale_price = $rowdatachecking['prot_trm_saleprc'];
            $get_regul_price = $rowdatachecking['prot_trm_regulprc'];
            $array_rgulprice[] = $get_regul_price;
            $get_quntity = $rowdatachecking['prot_trm_quantity'];
          }
          if($get_sale_price == "0" || $get_sale_price == ""){
                $productprice = $get_regul_price;
                $sale_min = "SELECT MIN(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$product_vertionid'";
                $sale_resultmin = $contdb->query($sale_min);
                $sale_rowmin = $sale_resultmin->fetch_array();
                $sale_minvalmin = $sale_rowmin[0];

                $sale_max = "SELECT MAX(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$product_vertionid'";
                $sale_resultmax = $contdb->query($sale_max);
                $sale_rowmax = $sale_resultmax->fetch_array();
                $sale_minvalmax = $sale_rowmax[0];
                if($sale_minvalmin == $sale_minvalmax){
                  $arrayvelset = array($get_regul_price);
                }else{
                  $arrayvelset = array($sale_minvalmin,$sale_minvalmax);
                }
              /*echo "<ins id='p_price' data-id='".$get_regul_price."'>₹".number_format($get_regul_price, 2)."</ins>";*/
            }else{
              $holl_price_data = $get_sale_price;
              $productprice = $get_sale_price;
              $arrayvelset = array($get_sale_price,$get_regul_price);
            }
        }
    }
    return $arrayvelset;
}

function AfframSingleProductPagePrice($product_vertionid,$verion_id="0"){
    global $contdb, $date, $time, $url, $ip;


    $checking_data = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_id='$verion_id' AND prot_trm_prodtid='$product_vertionid'";
    $querycheckval = $contdb->query($checking_data);
    if($querycheckval->num_rows > 0){
      while ($rowdatachecking = $querycheckval->fetch_array()) {
        $get_sale_price = $rowdatachecking['prot_trm_saleprc'];
        $get_regul_price = $rowdatachecking['prot_trm_regulprc'];
        $get_quntity = $rowdatachecking['prot_trm_quantity'];
        //$datavale = $get_sale_price."|".$get_regul_price."|".$get_quntity;
        //echo "00";
        if($get_sale_price == "0" || $get_sale_price == ""){
          $productprice = $get_regul_price;
          echo "<p class='affirm-as-low-as' data-page-type='product' data-amount='".$get_regul_price."00'></p>";
        }else{
          $holl_price_data = $get_sale_price;
          $productprice = $get_sale_price;
          echo "<p class='affirm-as-low-as' data-page-type='product' data-amount='".$get_sale_price."00'></p>";
        }
      }
    }else{
        $checking_data = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$product_vertionid'";
        $querycheckval = $contdb->query($checking_data);
        if($querycheckval->num_rows > 0){
          while ($rowdatachecking = $querycheckval->fetch_array()) {
            $get_sale_price = $rowdatachecking['prot_trm_saleprc'];
            $get_regul_price = $rowdatachecking['prot_trm_regulprc'];
            $get_quntity = $rowdatachecking['prot_trm_quantity'];
          }
          if($get_sale_price == "0" || $get_sale_price == ""){
              $productprice = $get_regul_price;
              echo "<p class='affirm-as-low-as' data-page-type='product' data-amount='".$get_regul_price."00'></p>";
            }else{
              $holl_price_data = $get_sale_price;
              $productprice = $get_sale_price;
              echo "<p class='affirm-as-low-as' data-page-type='product' data-amount='".$get_sale_price."00'></p>";
            }
        }
    }
}

function StockProdutVertionval($prouct_verid,$vertionval="0"){
    global $contdb, $date, $time, $url, $ip;

    $get_quntity_value = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_id='$vertionval' AND prot_trm_prodtid='$prouct_verid'";
    $get_qunityvale = $contdb->query($get_quntity_value);
    if($get_qunityvale->num_rows > 0){
        while($row_qunityvale_dat = $get_qunityvale->fetch_array()){
          $get_Qunity_val = $row_qunityvale_dat['prot_trm_quantity'];
          if($get_Qunity_val == ""){
            echo "<span class='stock-status in-stock mb-0'> In Stock</span>";
            echo '<input type="hidden" id="stokqunt" value="10">';
          }elseif($get_Qunity_val == "0"){
            echo "<span class='stock-status out-stock mb-0'>Out of stock </span>";
            echo '<input type="hidden" id="stokqunt" value="0">';
          }else{
            echo "<span class='stock-status in-stock mb-0'> (".$get_Qunity_val.") In Stock </span>";
            echo '<input type="hidden" id="stokqunt" value="'.$get_Qunity_val.'">';
          }
        }
    }else{
        echo "<span class='stock-status in-stock mb-0'> In Stock</span>";
        echo '<input type="hidden" id="stokqunt" value="10">';
    }
}

function AddToCartButtonSet($prouct_verid,$productid,$vertionval="0",$pagename="0"){
    global $contdb, $date, $time, $url, $ip;

    $get_quntity_value = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_id='$vertionval' AND prot_trm_prodtid='$prouct_verid'";
    $get_qunityvale = $contdb->query($get_quntity_value);
    if($get_qunityvale->num_rows > 0){
        while($row_qunityvale_dat = $get_qunityvale->fetch_array()){
            $get_cart_val = "SELECT * FROM cart_user WHERE cart_prdo_auto_id='$productid' AND cart_user_ip='$ip'";
            $get_valsetset = $contdb->query($get_cart_val);
            if($get_valsetset->num_rows > 0){
                $get_Qunity_val = $row_qunityvale_dat['prot_trm_quantity'];
                if($get_Qunity_val == ""){
                    echo '<button class="button alt addToCart alredyadd" pid="'.$productid.'" title="Already in cart">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                        </button>';
                  }elseif($get_Qunity_val == "0"){}else{
                    echo '<button class="button alt addToCart alredyadd" pid="'.$productid.'" title="Already in cart">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                        </button>';
                }
            }else{
                $get_Qunity_val = $row_qunityvale_dat['prot_trm_quantity'];
                if($get_Qunity_val == ""){
                    echo '<button class="button alt addToCart" pid="'.$productid.'">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                        </button>';
                  }elseif($get_Qunity_val == "0"){}else{
                    echo '<button class="button alt addToCart" pid="'.$productid.'">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                        </button>';
                }
            }
        }
    }else{
        echo '<button class="button alt addToCart" pid="'.$productid.'">
                <i class="fa fa-shopping-cart"></i> Add to Cart
            </button>';
    }
}

function ProductCatagroyShow($catagroyname=0){
    global $contdb, $date, $time, $url, $ip;

    if($catagroyname == "0"){
        $selectatpro = "SELECT * FROM product_categories WHERE prd_cat_hidevale='1'";
    }else{
        $selectatpro = "SELECT * FROM product_categories WHERE prd_cat_main_url='$catagroyname' AND prd_cat_hidevale='1'";
    }
    $query_catprod = $contdb->query($selectatpro);
    while($row_catprodut = $query_catprod->fetch_array()){
        $catgor_productarry[] = $row_catprodut;
    }
    return $catgor_productarry;
}

function ProductCatagoyViewData($product_catid,$product_filt="0"){
    global $contdb, $date, $time, $url, $ip;

    if($product_filt == "0" || $product_filt == ""){
        $get_catagoyrod = "SELECT * FROM all_product WHERE FIND_IN_SET('$product_catid', product_catger_ids) AND product_status='1' ORDER BY RAND() DESC";
        $query_setpouct = $contdb->query($get_catagoyrod);
        while($row_productt = $query_setpouct->fetch_array()){
            $productctarry[] = $row_productt['product_auto_id'];
        }
        return $productctarry;
    }else{

        $get_vendorval = $product_filt;

        /*$get_catagoyrod = "SELECT * FROM all_product WHERE FIND_IN_SET('$product_catid', product_catger_ids) AND product_status='1'";
        $query_setpouct = $contdb->query($get_catagoyrod);
        while($rowvaleset = $query_setpouct->fetch_array()){*/

            $_get_vendort_data = "SELECT * FROM all_product WHERE product_vender_id='$get_vendorval' AND product_status='1' AND FIND_IN_SET('$product_catid', product_catger_ids)";
            $query_valeuset = $contdb->query($_get_vendort_data);
            if($query_valeuset->num_rows > 0){
                while($rowget_singal = $query_valeuset->fetch_array()){
                    $productctarry[] = $rowget_singal['product_auto_id'];
                }
                return $productctarry;
            }else{
                $get_mainptf = "SELECT * FROM all_product WHERE product_sku='$get_vendorval' AND FIND_IN_SET('$product_catid', product_catger_ids) AND product_status='1' OR product_name LIKE '%$get_vendorval%' AND FIND_IN_SET('$product_catid', product_catger_ids) AND product_status='1'";
                $get_mainvale_pd = $contdb->query($get_mainptf);
                if($get_mainvale_pd->num_rows > 0){
                    while($rowget_singal = $get_mainvale_pd->fetch_array()){
                        $productctarry[] = $rowget_singal['product_auto_id'];
                    }
                    return $productctarry;
                }else{
                    $filtrvale = explode('-', $product_filt);
                    $get_minval = $filtrvale[0];
                    $get_maxval = $filtrvale[1];
                    /*echo $product_catid;*/
                    $get_catagoyrod = "SELECT * FROM all_product WHERE FIND_IN_SET('$product_catid', product_catger_ids) AND product_status='1'";
                    $query_setpouct = $contdb->query($get_catagoyrod);
                    while($rowvaleset = $query_setpouct->fetch_array()){
                        if($rowvaleset['product_regular_price'] == "0" || $rowvaleset['product_regular_price'] == ""){
                            $ge_colorvaert = $rowvaleset['product_color'];
                            $vet_idsval = $rowvaleset['product_auto_id'];

                            $get_catval = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$ge_colorvaert' AND prot_trm_regulprc BETWEEN $get_minval AND $get_maxval OR prot_trm_prodtid='$vet_idsval' AND prot_trm_regulprc BETWEEN $get_minval AND $get_maxval";
                            $query_valeidsval = $contdb->query($get_catval);
                            while($row_catvaleset = $query_valeidsval->fetch_array()){
                                $productctarry[] = $row_catvaleset['prot_trm_prodtid'];
                            }
                            /*if(!empty($productctarry)){
                                return $productctarry;
                            }*/
                            
                        }else{
                            if($rowvaleset['product_sale_price'] == "0" || $rowvaleset['product_sale_price'] == ""){
                                $get_mainptf = "SELECT * FROM all_product WHERE product_regular_price BETWEEN $get_minval AND $get_maxval AND product_status='1' AND FIND_IN_SET('$product_catid', product_catger_ids)";
                                $get_mainvale_pd = $contdb->query($get_mainptf);
                                while($rowget_singal = $get_mainvale_pd->fetch_array()){
                                    $productctarry[] = $rowget_singal['product_auto_id'];
                                }
                                /*if(!empty($productctarry)){
                                    return $productctarry;
                                }*/
                            }else{
                                $get_mainptf = "SELECT * FROM all_product WHERE product_sale_price BETWEEN $get_minval AND $get_maxval AND product_status='1' AND FIND_IN_SET('$product_catid', product_catger_ids)";
                                $get_mainvale_pd = $contdb->query($get_mainptf);
                                while($rowget_singal = $get_mainvale_pd->fetch_array()){
                                    $productctarry[] = $rowget_singal['product_auto_id'];
                                }
                                /*if(!empty($productctarry)){
                                    return $productctarry;
                                }*/
                            }
                        }
                    }
                    /*if(!empty($productctarry)){*/
                        return array_unique($productctarry);
                    /*}*/
                }
            }
        /*}*/
    }
}

function categoryPageSetTree($main_catfory="0",$parent_id = 0, $sub_mark = '', $end_maks=''){
    global $contdb, $date, $time, $url, $ip;

    if($parent_id == "0"){
        $query = $contdb->query("SELECT * FROM product_categories WHERE prd_cat_prent_categ = $parent_id AND prd_cat_hidevale='1' ORDER BY CAST(prd_cat_postion AS UNSIGNED INTEGER)");
    }else{
        $query = $contdb->query("SELECT * FROM product_categories WHERE prd_cat_prent_categ = $parent_id AND prd_cat_hidevale='1' ORDER BY prd_cat_name ASC");
    }
    /*$query = $contdb->query("SELECT * FROM product_categories WHERE prd_cat_prent_categ = $parent_id ORDER BY CAST(prd_cat_postion AS UNSIGNED INTEGER)");*/
    if($query->num_rows > 0){
        while($row = $query->fetch_array()){
            echo $sub_mark.'<li><a href="'.$url.'/'.$row['prd_cat_main_url'].'"><strong>'.$row['prd_cat_name'].'</strong></a></li>'.$end_maks;
            categoryPageSetTree(0,$row['id'], $sub_mark.'<ul>', $end_maks.'</ul>');
        }
    }
}

function CatagoyPriceRang($catagoryids){
    global $contdb, $date, $time, $url, $ip;

    $prodt_valueata_rang = "SELECT * FROM all_product WHERE product_status='1' AND FIND_IN_SET('$catagoryids', product_catger_ids)";
    $query_price_rang = $contdb->query($prodt_valueata_rang);
    while($row_priceval_rang = $query_price_rang->fetch_array()){
        $price_value_rang = $row_priceval_rang['product_regular_price'];
        $attbutvalcolor_rang = $row_priceval_rang['product_color'];
        $proudtvauroid = $row_priceval_rang['product_auto_id'];

        if($price_value_rang == "0" || $price_value_rang == ""){

          $get_vertionprice_rang = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor_rang' OR prot_trm_prodtid='$proudtvauroid'";
          $queryvaledat_rang = $contdb->query($get_vertionprice_rang);
          while($rowgetdatval_rang = $queryvaledat_rang->fetch_array()){
            $get_total_regulor_rang = $rowgetdatval_rang['prot_trm_regulprc'];
            $sale_price_rang = $rowgetdatval_rang['prot_trm_saleprc'];
          }
            if($sale_price_rang == "0" || $sale_price_rang == ""){
                $price_rang_rang = $get_total_regulor_rang;
            }else{
                $price_rang_rang .= $sale_price_rang;
            }
        }else{
            if($row_priceval_rang['product_sale_price'] == ""){
                $price_rang_rang = $row_priceval_rang['product_regular_price'];
              }else{
                $price_rang_rang .= $row_priceval_rang['product_sale_price'];
            }
        }
        $arrya_vale[] = $price_rang_rang;
    }
    return $arrya_vale;
}

function AddNewPageOneTime(){
    global $contdb, $date, $time, $url, $ip, $auto_id;

    $unqidva = $auto_id;
    $addpageval = "INSERT INTO all_product(product_auto_id,product_status,product_shppin_domst,product_shppin_inters)VALUES('$unqidva','0','12','20')";
    $query_paegeval = $contdb->query($addpageval);
    $ge_valeurl = $contdb->insert_id;
    $url_return = $url."/admin-manager/product/?pageid=".$ge_valeurl."&autoid=".$unqidva;
    return $url_return;
}

function AddNewPageOneTimeSeo(){
    global $contdb, $date, $time, $url, $ip, $auto_id;

    $unqidva = $auto_id;
    $addpageval = "INSERT INTO all_product(product_auto_id,product_status,product_shppin_domst,product_shppin_inters)VALUES('$unqidva','0','12','20')";
    $query_paegeval = $contdb->query($addpageval);
    $ge_valeurl = $contdb->insert_id;
    $url_return = $url."/seo-user/product/?pageid=".$ge_valeurl."&autoid=".$unqidva;
    return $url_return;
}

function ProductInnercategoryTree($main_catfory="0",$parent_id = 0, $sub_mark = ''){
    global $contdb, $date, $time, $url, $ip;

    echo '<div class="catgoyval">';
    if($parent_id == "0"){
        $query = $contdb->query("SELECT * FROM product_categories WHERE prd_cat_prent_categ = $parent_id AND prd_cat_hidevale='1' ORDER BY CAST(prd_cat_postion AS UNSIGNED INTEGER)");
    }else{
        $query = $contdb->query("SELECT * FROM product_categories WHERE prd_cat_prent_categ = $parent_id AND prd_cat_hidevale='1' ORDER BY prd_cat_name ASC");
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

function get_attbutval(){
    global $contdb, $url;

    $get_attbut = "SELECT * FROM product_attbut";
    $queryvaldat = $contdb->query($get_attbut);
    while($rowgetvaldata = $queryvaldat->fetch_array()){
        $get_id_name = $rowgetvaldata['id'];
        $get_nameval = $rowgetvaldata['pd_attbut_name'];

        echo "<option value='$get_id_name|$get_nameval'>$get_nameval</option>";
    }
}

function ge_show_attbutval($get_attseion,$get_idsale){
    global $contdb, $url;
    $arrayvaledt = $get_attseion.','.$get_idsale;
    $array_vale = explode(',', $arrayvaledt);
    foreach($array_vale as $abutvalvalue) {
        $get_data_value = "SELECT * FROM product_active_attbut WHERE attbut_productid='$abutvalvalue'";
        $query_datavale = $contdb->query($get_data_value);
        while($rowqueryval = $query_datavale->fetch_array()){
            $get_sessionval = $rowqueryval['attbut_id'];
            $get_idmain = $rowqueryval['id'];

            $selectget_valudata = "SELECT * FROM product_attbut WHERE id='$get_sessionval'";
            $queryfetnam = $contdb->query($selectget_valudata);
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
            $queryvaleat = $contdb->query($get_vetiondata);
            while($row_get_vale = $queryvaleat->fetch_array()){
                $get_values_data[] = $row_get_vale['proval_trm_value'];
            }
            //print_r($get_values_data);
            $selevaledat = "SELECT * FROM product_attbut_value WHERE prod_attname_id='$get_sessionval'";
            $cehckteramval = $contdb->query($selevaledat);
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
    global $contdb, $url;

    $explodevale = $get_attseion.','.$setidsvale;
    echo '<div class="datarow insert-val">';
    echo '<div class="card-header" role="tab" id="heading-A"><div class="row">';
    $xplode_dataval = explode(',', $explodevale);
    foreach($xplode_dataval as $termvalue){
        $get_main_attbut = "SELECT * FROM product_active_attbut WHERE attbut_productid='$termvalue'";
        $queryatbutmain = $contdb->query($get_main_attbut);
        while($rowgetmainabtu = $queryatbutmain->fetch_array()){
            $get_sizevale = $rowgetmainabtu['attbut_id'];

            $get_nameabbut = "SELECT * FROM product_attbut WHERE id='$get_sizevale'";
            $queyvalabbut = $contdb->query($get_nameabbut);
            while($rowgetabbutnae = $queyvalabbut->fetch_array()){
                $get_abbutname = $rowgetabbutnae['pd_attbut_name'];

                    echo '<div class="col-md-3 form-group"><select class="attbuteval form-control" name="getattbut[]">
                        <option value="0">Select '.$get_abbutname.'</option>';

                        $get_termvaleu = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='$termvalue' AND proval_trm_attid='$get_sizevale' ORDER BY proval_trm_value ASC";
                        $queryvaldatul = $contdb->query($get_termvaleu);
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
    global $contdb, $url;

    $arrayexplovael = $sesinovertion.','.$setvaletvl;

    $explodearryval = explode(',', $arrayexplovael);
    echo '<tr>';
    foreach($explodearryval as $valtermedit){
        //$lastidval = "22";
        $get_main_attbut = "SELECT * FROM product_active_attbut WHERE attbut_productid='$valtermedit'";
        $queryatbutmain = $contdb->query($get_main_attbut);
        while($rowgetmainabtu = $queryatbutmain->fetch_array()){
            $get_sizevale = $rowgetmainabtu['attbut_id'];

            $get_nameabbut = "SELECT * FROM product_attbut WHERE id='$get_sizevale'";
            $queyvalabbut = $contdb->query($get_nameabbut);
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
    $vertsetser = $contdb->query($verionvalset);
    if($vertsetser->num_rows > 0){
        $vertionvale = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$sesinovertion' OR prot_trm_prodtid='$setvaletvl' ORDER BY id ASC";
    }else{
        $vertionvale = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$sesinovertion' OR prot_trm_prodtid='$setvaletvl' ORDER BY CAST(prot_trm_postion AS UNSIGNED INTEGER)";
    }
    $vertionval = $contdb->query($vertionvale);
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
        $query_queryvtrem = $contdb->query($get_vertionname);
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

function AddNewProudtcvaleimages($prodtaddallimag,$_get_pageautid){
    global $contdb, $url, $file_path;

    $floder_path_name = $file_path."/images/";
    $myfile = $prodtaddallimag;
    $keepName = false; // change this for file name.
    $response = array();
    for ($i = 0; $i < count($myfile["name"]); $i++) {
        if ($myfile["name"][$i] <> "" && $myfile["error"][$i] == 0) {
            $randiddata = rand(88888,99999999);
                $file_extention = @strtolower(@end(@explode(".", $myfile["name"][$i])));
                $file_name = date("Ymd") . '_' . rand(10000, 990000) . '.' . $file_extention;
            if (move_uploaded_file($myfile["tmp_name"][$i], $floder_path_name . $file_name) === FALSE) {
                //Set Original File Name if Upload Error
                $response[] = array ('error'=>true,'msg'=>"Error While Uploading the File",'fileName'=>$myfile["name"][$i]);
            } else {
                $insertmutliimgprod = "INSERT INTO product_mutli_image(produt_img,produt_auto_id,produt_id)VALUES('$file_name','$randiddata','$_get_pageautid')";
                $queryinsertmutl = $contdb->query($insertmutliimgprod);
            }
        }
    }
}

function ChakingProductName($prodtaddname){
    global $contdb, $url, $auto_id;

    $chekiname = "SELECT * FROM all_product WHERE product_name='$prodtaddname'";
    $queryvale = $contdb->query($chekiname);
    if($queryvale->num_rows > 1){
        $namepagenae = $prodtaddname.'-'.$auto_id;
    }else{
        $namepagenae = $prodtaddname;
    }
    return $namepagenae;
}

function MinStockFreshHold(){
    global $contdb, $url, $auto_id;

    $get_minstock = "SELECT * FROM all_product WHERE product_status='1'";
    $get_stokquyer = $contdb->query($get_minstock);
    while($get_product_vale = $get_stokquyer->fetch_array()){
        if($get_product_vale['product_regular_price'] == "0" || $get_product_vale['product_regular_price'] == ""){
            
        }else{
           $get_productstock = $get_product_vale['product_stock'];
           $get_lowstock = $get_product_vale['product_min_price'];
            if($get_lowstock == ""){}else{
                if($get_productstock < $get_lowstock){
                    echo '<li class="set-img">
                            <img src="'.$url.'/images/'.$get_product_vale['product_image'].'" alt="Products Image">
                          <a class="users-list-name" href="'.$url.'/admin-manager/product/?pageid='.$get_product_vale['id'].'&autoid='.$get_product_vale['product_auto_id'].'" target="_blank">'.$get_product_vale['product_name'].'</a>
                        </li>';
                }
            }
        }
    }

    $get_vertionvale = "SELECT DISTINCT prot_trm_quantity,prot_trm_lowstck,prot_trm_prodtid FROM product_attbut_vartarry";
    $queryvlae = $contdb->query($get_vertionvale);
    while($quorvale = $queryvlae->fetch_array()){
        if($quorvale['prot_trm_quantity'] == ""){}elseif($quorvale['prot_trm_quantity'] == "0"){
            if($quorvale['prot_trm_quantity'] <= $quorvale['prot_trm_lowstck']){
                $get_ids_val[] = $quorvale['prot_trm_prodtid'];
            }elseif($quorvale['prot_trm_quantity'] == ""){
                $get_ids_val[] = "0";
            }
        }
    }
    $make_arrayvalue = $get_ids_val;
    if(in_array('0', $make_arrayvalue)){}else{
       foreach($make_arrayvalue as $valesetpd){
        $get_vertonvale = "SELECT * FROM all_product WHERE product_auto_id='$valesetpd' OR product_color='$valesetpd' AND product_status='1'";
            $query_valenameval = $contdb->query($get_vertonvale);
            if($query_valenameval->num_rows > 0){
                while($querysetdaat = $query_valenameval->fetch_array()){
                    echo '<li class="set-img">
                        <img src="'.$url.'/images/'.$querysetdaat['product_image'].'" alt="Stock">
                          <a class="users-list-name" href="'.$url.'/admin-manager/product/?pageid='.$querysetdaat['id'].'&autoid='.$querysetdaat['product_auto_id'].'" target="_blank">'.$querysetdaat['product_name'].'</a>
                        </li>';
                }
            }
       }
    }
}

function dublicateprodut_value($tablname,$Coluname,$valuesname){
    global $contdb, $url, $auto_id;

    $insertgetvale = "INSERT INTO $tablname($Coluname)VALUES($valuesname)";
    $query_valedbul = $contdb->query($insertgetvale);
    $insertidfirst = $contdb->insert_id;
    return $insertidfirst;
}

function RelatedProductSinglepd($realtdprodt,$venor_prodcut){
    global $contdb, $url, $auto_id;

    if($realtdprodt == ""){
        $select_ratedn = "SELECT * FROM all_product WHERE product_vender_id='$venor_prodcut' AND product_status='1'";
        $queryaledat = $contdb->query($select_ratedn);
        while($query_venor = $queryaledat->fetch_array()){
            $array_valueset[] = $query_venor;
        }
    }else{
        $explode_value = explode(',', $realtdprodt);
        foreach($explode_value as $catvalue){
            $select_ratedn = "SELECT * FROM all_product WHERE product_auto_id='$catvalue' AND product_status='1'";
            $query_product = $contdb->query($select_ratedn);
            while($rowcatproduct = $query_product->fetch_array()){
                $array_valueset[] = $rowcatproduct;
            }
        }
        $select_secondrd = "SELECT * FROM all_product WHERE product_vender_id='$venor_prodcut' AND product_status='1'";
        $queryaledatscd = $contdb->query($select_secondrd);
        while($query_venorscd = $queryaledatscd->fetch_array()){
            $array_valueset[] = $query_venorscd;
        }
    }
    return $array_valueset;
}


function vendorsales(){
    global $contdb, $url, $auto_id ,$query_vale;
    
    $orderval = "SELECT * FROM customer_order WHERE payment_url_status='1'";
    //echo $query_vale;
    $get_vendor_produt = mysqli_query($contdb,"SELECT * FROM all_product WHERE product_vender_id='$query_vale'");
    if(mysqli_num_rows($get_vendor_produt)){
        while($row_vale_query = mysqli_fetch_array($get_vendor_produt)){
            $prod_aut_vale = $row_vale_query['product_auto_id'];
            
            $cutor_vale = mysqli_query($contdb,"SELECT * FROM customer_order WHERE payment_url_status='1' AND product_auto_id='$prod_aut_vale'");
            while($row_vale_data = mysqli_fetch_array($cutor_vale)){
               $sget_prod_vale = $row_vale_data['product_auto_id'];
               
               $orderval = "SELECT * FROM customer_order WHERE payment_url_status='1' AND product_auto_id='$sget_prod_vale'";  
            }
        }
    }else{
        //echo "1";
        $orderval = "SELECT * FROM customer_order WHERE payment_url_status='1' AND payment_response='$query_vale'";
    }
    $queryorder = mysqli_query($contdb,$orderval);
    while($roworder = mysqli_fetch_array($queryorder)){
        $get_produt_auto = $roworder['product_auto_id'];
        $gest_secout_val = $roworder['p_serty_id'];
        $get_cancle_respon = $roworder['payment_response'];
        $productname = $roworder['p_name'];
        $custerm_id = $roworder['customer_id'];
        $paid_amoutn = $roworder['p_price'];
        $get_trans_id = $roworder['tnx_id'];
        $custer_date = date("m-d-Y", strtotime($roworder['p_date']));
        $custer_time = $roworder['p_time'];
        echo "<tr>";
        $produtc_val = "SELECT * FROM all_product WHERE product_auto_id='$get_produt_auto'";
        $queryprodt = mysqli_query($contdb,$produtc_val);
        while($productid = mysqli_fetch_array($queryprodt)){
            $vendor_val = $productid['product_vender_id'];

            $vendor_valid = "SELECT * FROM vendor WHERE vendor_auto='$vendor_val'";
            $queryvendor = mysqli_query($contdb,$vendor_valid);
            while($row_val = mysqli_fetch_array($queryvendor)){
                $venodr_fname = $row_val['vendor_f_name'];
                $venodr_lname = $row_val['vendor_l_name'];
                $venodr_img = $row_val['vendor_img'];
                $venodr_companyname = $row_val['vendor_company'];
                $venodr_emaid = $row_val['vendor_email'];
            
            $get_customer_vale = "SELECT * FROM customer WHERE customer_ui_id='$custerm_id'";
            $query_cut = mysqli_query($contdb,$get_customer_vale);
            while($row_custer = mysqli_fetch_array($query_cut)){
                $get_f_name = $row_custer['customer_fname'];
                $get_l_name = $row_custer['customer_lname'];
            }
            
            if($get_cancle_respon == "1"){

                echo "<td style='width:10%;'><img src='$url/images/vendor_images/$venodr_img' style='width:100%;'></td>
                <td>$productname</td>
                <td>$venodr_fname $venodr_lname</td>
                <td>$get_f_name $get_l_name</td>
                <td>$paid_amoutn</td>
                <td>Completed Order</td>
                <td>$get_trans_id</td>
                <td>$custer_date / $custer_time</td>";

            }elseif($get_cancle_respon == "2"){
                echo "<td style='width:10%;'><img src='$url/images/vendor_images/$venodr_img' style='width:100%;'></td>
                <td>$productname</td>
                <td>$venodr_fname $venodr_lname</td>
                <td>$get_f_name $get_l_name</td>
                <td>$paid_amoutn</td>
                <td>Cancel Order</td>
                <td>No ID</td>
                <td>$custer_date / $custer_time</td>";
            }
        }
        }
        echo "</tr>";
    }
}

function coupanshow(){
    global $contdb, $url, $auto_id, $date;

    $showcoupan = "SELECT * FROM coupons";
    $querycoupan = mysqli_query($contdb,$showcoupan);
    while($rowcoupan = mysqli_fetch_array($querycoupan)){
        $coupan_id = $rowcoupan['id'];
        if(date("m-d-Y", strtotime($rowcoupan['coup_end_date'])) >= date("m-d-Y", strtotime($date))){
            echo "<tr>";
        }else{
            echo "<tr class='color-red $date'>";
        }
            if($rowcoupan['coup_type'] == "1"){
                echo "<td>Flat</td>";
            }elseif($rowcoupan['coup_type'] == "2"){
                echo "<td>Percentage</td>";
            }
        echo "<td>".$rowcoupan['coup_name']."</td>
                <td>".date("m-d-Y", strtotime($rowcoupan['coup_s_date']))."</td>
                <td>".date("m-d-Y", strtotime($rowcoupan['coup_end_date']))."</td>";
        echo "<td>".$rowcoupan['coup_noofuse']."</td>";
            /*if($rowcoupan['coup_status'] == "1"){
                echo "<td>Active</td>";
            }elseif($rowcoupan['coup_status'] == "2"){
                echo "<td>Expride</td>";
            }*/
            if(date("m-d-Y", strtotime($rowcoupan['coup_end_date'])) >= date("m-d-Y", strtotime($date))){
                echo "<td>Active</td>";
            }else{
                echo "<td>Expired</td>";
            }
        echo "<td><a href='$url/admin-manager/coupons_edit/?id=$coupan_id'>Edit</a>
                <a href='$url/admin-manager/cupons/?id=$coupan_id&delete=0'>Delete</a></td>
            </tr>";
    }
}

function vendername($vendorid="0"){

    global $contdb, $url, $auto_id;

    if($vendorid == "0"){

        $vendername = "SELECT * FROM vendor";

        $queryvender = mysqli_query($contdb,$vendername);

        while($rowvenderview = mysqli_fetch_array($queryvender)){

            echo "<option value='".$rowvenderview['vendor_auto']."'>".$rowvenderview['vendor_f_name']." ".$rowvenderview['vendor_l_name']."</option>";
        }

    }else{

        $vendername = "SELECT * FROM vendor";

        $queryvender = mysqli_query($contdb,$vendername);

        while($rowvenderview = mysqli_fetch_array($queryvender)){

            if($vendorid == $rowvenderview['vendor_auto']){
                echo "<option value='".$rowvenderview['vendor_auto']."' selected>".$rowvenderview['vendor_f_name']." ".$rowvenderview['vendor_l_name']."</option>";
            }else{
                echo "<option value='".$rowvenderview['vendor_auto']."'>".$rowvenderview['vendor_f_name']." ".$rowvenderview['vendor_l_name']."</option>";
            }
        }
    }
}

function createcoupons($noofusecoup,$coupantype,$coupansingvendor,$coupanvendorid,$coupanamount,$date,$time,$coupansdate,$coupanedate,$coupanname){
    global $contdb, $url, $auto_id;

    $genratcout = "INSERT INTO coupons(coup_type,coup_vendorid,coup_product_id,coup_amount,coup_date,coup_time,coup_status,coup_usetime,coup_s_date,coup_end_date,coup_name,coup_noofuse)VALUES('$coupantype','$coupansingvendor','$coupanvendorid','$coupanamount','$date','$time','1','0','$coupansdate','$coupanedate','$coupanname','$noofusecoup')";
    $querycoup = mysqli_query($contdb,$genratcout);
    if($querycoup = true){
        return true;
    }else{
        return false;
    }
}

function GetMainCatagroy($cat_foyrids="0"){
    global $contdb, $url, $auto_id;

    if($cat_foyrids == "0"){
        $get_careeterval = "SELECT * FROM product_categories WHERE prd_cat_prent_categ='0' AND prd_cat_hidevale='1'";
    }else{
        $get_careeterval = "SELECT * FROM product_categories WHERE id='$cat_foyrids' AND prd_cat_hidevale='1'";
    }
    $query_catgoy = $contdb->query($get_careeterval);
    while($rowget_vale = $query_catgoy->fetch_array()){
        $arrya_main_catgoy[] = $rowget_vale;
    }
    return $arrya_main_catgoy;
}

function SubCatgoyvaleu($maincatid){
    global $contdb, $url, $auto_id;

    $get_maincatvale = "SELECT * FROM product_categories WHERE prd_cat_prent_categ='$maincatid' AND prd_cat_hidevale='1'";
    $query_subcat = $contdb->query($get_maincatvale);
    while($rowvaleucat = $query_subcat->fetch_array()){
        $subcatarray[] = $rowvaleucat;
        SubCatgoyvaleu($rowvaleucat['id']);
    }
    return $subcatarray;
}

function couponDateValidate($code){
    global $contdb, $url, $auto_id;
    $todayDate = date('m/d/Y');
    $sql = "SELECT * FROM coupons WHERE '$todayDate' between coup_s_date and coup_end_date AND coup_name = '$code' AND coup_status = 1";
    $result = mysqli_query($contdb,$sql);
    $rowCount = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
        $resultset[] = $row;
    }
    $data = array($rowCount, $resultset);
    return $data;
}

//Coupon Validate
function couponValidate($code){
    global $contdb, $url, $auto_id;
    $sql = "SELECT * FROM coupons WHERE coup_name = '$code' AND coup_status = 1";
    $result = mysqli_query($contdb,$sql);
    $rowCount = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
        $resultset[] = $row;
    }
    $data = array($rowCount, $resultset);
    return $data;
}

function login_checking_code($login_name,$login_password){
  global $contdb, $url, $ip;

  $checkpassword = "SELECT * FROM userlogntable WHERE user_password='$login_password' AND user_email='$login_name'";
  $cehck_val = mysqli_query($contdb,$checkpassword);
  if(mysqli_num_rows($cehck_val)){

      $get_auto_id = "SELECT * FROM userlogntable WHERE user_password='$login_password' AND user_email='$login_name'";
      $nuvale = mysqli_query($contdb,$get_auto_id);
      while($rowval = mysqli_fetch_array($nuvale)){
          $auto_val_id = $rowval['user_auto'];
      $update_productval = "UPDATE cart_user SET cart_userid='$auto_val_id' WHERE cart_user_ip='$ip' AND cart_status='0'";
      $queryupdatecart = $contdb->query($update_productval);
      $_SESSION['customersessionlogin']=$auto_val_id;
    }
    return true;
  }else{
    unset($_SESSION['customersessionlogin']);
    return false;
  }
}

function gust_user_sessiondata($fname,$lname,$address,$country,$state,$city,$postalcode,$phone,$otherNote,$email_idgust,$email){
  global $contdb, $url, $auto_id, $ip;
  
    $date = date('m/d/Y');
    $time = date('H:i:s');

    $update_datauser = "INSERT INTO customer(customer_fname,customer_lname,customer_address,customer_country,customer_state,customer_city,customer_pincode,customer_phone,customer_otherNote,customer_ui_id,customer_img,customer_date,customer_time,customer_active,customer_type)VALUES('$fname','$lname','$address','$country','$state','$city','$postalcode','$phone','$otherNote','$email_idgust','0','$date','$time','1','Guest')";
    $query_customergudt = $contdb->query($update_datauser);

    $insert_login_detal = "INSERT INTO userlogntable(user_first_name,user_email,user_lastname,user_password,user_session_id,user_type,user_status,user_auto)VALUES('Guest','$email','User','Guest','0','customer','0','$email_idgust')";
    $query_loginset_user = $contdb->query($insert_login_detal);

    $create_useremailid = MD5(uniqid());
    $update_productval = "UPDATE cart_user SET cart_userid='$email_idgust' WHERE cart_user_ip='$ip' AND cart_status='0'";
    $queryupdatecart = $contdb->query($update_productval);
    $_SESSION['customersessionlogin']=$email_idgust;
    $_SESSION['gust_customer']="GuestCoustomer";
    return true;
}

function customerData($custid){
    global $contdb, $url, $auto_id;

    $sql = "SELECT * FROM customer INNER JOIN userlogntable ON userlogntable.user_auto = customer.customer_ui_id WHERE customer_ui_id='$custid'";
    $qry = mysqli_query($contdb,$sql);
    while($row = mysqli_fetch_assoc($qry)){
        $resultset = $row;
    }
    return $resultset;
}

function getcountryname($customer_id){
    global $contdb ,$url;

    $get_countuser = "SELECT * FROM customer WHERE customer_ui_id='$customer_id' LIMIT 1";
    $countuse = mysqli_query($contdb,$get_countuser);
    if(mysqli_num_rows($countuse)){
        /*if(isset($_SESSION['gust_customer'])){
            $countname = "SELECT * FROM countries_db ORDER BY id ASC";
            $query = mysqli_query($contdb, $countname);
            while($rowcount = mysqli_fetch_array($query)){
                echo "<option value='".$rowcount['name']."'>".$rowcount['name']."</option>";
            }
        }else{*/
            while($contvale = mysqli_fetch_array($countuse)){
                $count_nanme = $contvale['customer_country'];
            }
            $countname = "SELECT * FROM countries_db ORDER BY id ASC";
            $query = mysqli_query($contdb, $countname);
            while($rowcount = mysqli_fetch_array($query)){
                if($rowcount['name'] == $count_nanme){
                    echo "<option value='".$rowcount['name']."' selected>".$rowcount['name']."</option>";
                    //echo "<option vlaue='".$rowcount['countname']."'>".$rowcount['countname']."</option>";
                }else{
                    echo "<option value='".$rowcount['name']."'>".$rowcount['name']."</option>";
                }
            }
        /*}*/
    }else{
        $countname = "SELECT * FROM countries_db ORDER BY id ASC";
        $query = mysqli_query($contdb, $countname);
        while($rowcount = mysqli_fetch_array($query)){
            echo "<option value='".$rowcount['name']."'>".$rowcount['name']."</option>";
        }
    }
}

function getstatenamecustomer($customer_id){
    global $contdb;

    $get_countuser_seate = "SELECT * FROM customer WHERE customer_ui_id='$customer_id'";
    $countuse_seate = mysqli_query($contdb,$get_countuser_seate);
    if(mysqli_num_rows($countuse_seate)){
        /*if(isset($_SESSION['gust_customer'])){
            while($contvale_seate = mysqli_fetch_array($countuse_seate)){
                $count_nanme_seate = $contvale_seate['customer_country'];
                $statevale_seate = $contvale_seate['customer_state'];
            }
            if($count_nanme_seate == ""){
                $countname_seate = "SELECT * FROM states ORDER BY name ASC";
                $query_seate = mysqli_query($contdb, $countname_seate);
                while($rowcount_seate = mysqli_fetch_array($query_seate)){
                    echo "<option value='".$rowcount_seate['name']."'>".$rowcount_seate['name']."</option>";
                }
            }else{
                $country_set = "SELECT * FROM countries_db WHERE name='$count_nanme_seate'";
                $get_valuecount = mysqli_query($contdb,$country_set);
                while($rowvaluecont = $get_valuecount->fetch_array()){
                    $get_countid = $rowvaluecont['id'];
                }
                $countname_seate = "SELECT * FROM states WHERE country_id='$get_countid' ORDER BY name ASC";
                $query_seate = mysqli_query($contdb, $countname_seate);
                while($rowcount_seate = mysqli_fetch_array($query_seate)){
                    echo "<option value='".$rowcount_seate['name']."'>".$rowcount_seate['name']."</option>";
                }
            }
        }else{*/
            while($contvale_seate = mysqli_fetch_array($countuse_seate)){
                $count_nanme_seate = $contvale_seate['customer_country'];
                $statevale_seate = $contvale_seate['customer_state'];
            }
            $countnamevale_seate = $count_nanme_seate;
            $country_set = "SELECT * FROM countries_db WHERE name='$countnamevale_seate'";
            $get_valuecount = mysqli_query($contdb,$country_set);
            while($rowvaluecont = $get_valuecount->fetch_array()){
                $get_countid = $rowvaluecont['id'];
            }
            $countname_seate = "SELECT * FROM states WHERE country_id='$get_countid' ORDER BY name ASC";
            $query_seate = mysqli_query($contdb, $countname_seate);
            while($rowcount_seate = mysqli_fetch_array($query_seate)){

                /*if($statevale_seate == ""){
                    echo "<option value='".$rowcount_seate['name']."'>".$rowcount_seate['name']."</option>";
                }else{*/
                    if($statevale_seate == $rowcount_seate['name']){
                        echo "<option value='".stripslashes($rowcount_seate['name'])."' selected>".stripslashes($rowcount_seate['name'])."</option>";
                    }else{
                        echo "<option value='".stripslashes($rowcount_seate['name'])."'>".stripslashes($rowcount_seate['name'])."</option>";
                    }
                /*}*/
            }
       /* }*/
    }else{
        while($contvale_seate = mysqli_fetch_array($countuse_seate)){
            $count_nanme_seate = $contvale_seate['customer_country'];
            $statevale_seate = $contvale_seate['customer_state'];
        }
        $country_set = "SELECT * FROM countries_db WHERE name='$count_nanme_seate' LIMIT 1";
        $get_valuecount = mysqli_query($contdb,$country_set);
        while($rowvaluecont = $get_valuecount->fetch_array()){
            $get_countid = $rowvaluecont['id'];
        }
        $countname_seate = "SELECT * FROM states WHERE country_id='$get_countid' ORDER BY name ASC";
        $query_seate = mysqli_query($contdb, $countname_seate);
        while($rowcount_seate = mysqli_fetch_array($query_seate)){
            echo "<option value='".stripslashes($rowcount_seate['name'])."'>".stripslashes($rowcount_seate['name'])."</option>";
        }
    }
}

function getshppitoaddshow($custidvale){
    global $contdb, $date;
    $dateshp = $date;
    $getshppto = "SELECT * FROM shpptoadds WHERE cust_to_status='0' AND cust_to_id='$custidvale' AND cust_to_date='$dateshp'";
    $querycusto = $contdb->query($getshppto);
    while($rowvlaedata = $querycusto->fetch_array()){
        $shppintoaddres[] = $rowvlaedata;
    }
    return $shppintoaddres;
}

function shiptodetails($shppto_addres,$shppto_city,$shppto_country,$shppto_state,$shppto_stcode,$shppto_pincode,$custidvale,$fname_vale,$lname_vale,$phoneal,$emailvale){
    global $contdb, $date, $time;

    $cehck_address = "SELECT * FROM shpptoadds WHERE cust_to_id='$custidvale' AND cust_to_status='0'";
    $query_valedate = $contdb->query($cehck_address);
    if($query_valedate->num_rows > 0){
        $setshpingadd = "UPDATE shpptoadds SET cust_to_address='$shppto_addres',cust_to_city='$shppto_city',cust_to_country='$shppto_country',cust_to_state='$shppto_state',cust_to_statecode='$shppto_stcode',cust_to_postalcode='$shppto_pincode',cust_to_fname='$fname_vale',cust_to_lname='$lname_vale',cust_to_phone='$phoneal',cust_to_emaild='$emailvale' WHERE cust_to_id='$custidvale' AND cust_to_status='0'";
        $quwery_setdatav = $contdb->query($setshpingadd);
    }else{
        $setshpingadd = "INSERT INTO shpptoadds(cust_to_id,cust_to_address,cust_to_city,cust_to_country,cust_to_state,cust_to_statecode,cust_to_postalcode,cust_to_date,cust_to_time,cust_to_status,cust_to_fname,cust_to_lname,cust_to_phone,cust_to_emaild)VALUES('$custidvale','$shppto_addres','$shppto_city','$shppto_country','$shppto_state','$shppto_stcode','$shppto_pincode','$date','$time','0','$fname_vale','$lname_vale','$phoneal','$emailvale')";
        $quwery_setdatav = $contdb->query($setshpingadd);
    }
    if($quwery_setdatav == true){
        return true;
    }else{
        return false;
    }
}

function getvalestate($Country_sshwo,$State_sshwo="0"){
    global $contdb;

    $get_countid = "SELECT * FROM countries_db WHERE name='$Country_sshwo'";
    $query_vale = $contdb->query($get_countid);
    while($row_getcounid = $query_vale->fetch_array()){
        $countid = $row_getcounid['id'];
    }
    $countname_seate = "SELECT * FROM states WHERE country_id='$countid'";
    $query_seate = mysqli_query($contdb, $countname_seate);
    while($rowcount_seate = mysqli_fetch_array($query_seate)){
        if($State_sshwo == $rowcount_seate['name']){
            echo "<option value='".$rowcount_seate['name']."' selected>".$rowcount_seate['name']."</option>";
        }else{
            echo "<option value='".$rowcount_seate['name']."'>".$rowcount_seate['name']."</option>";
        }
    }
}

function gettaxvale($customer_id,$gettotlavale){
    global $contdb;
    //echo $customer_id;
    /*if("a2cmoo.rultnot15lgm3iiaes9hsuyc@0b9" == $customer_id){
        echo $gettotlavale;
    }*/
    $get_customercountvale = "SELECT * FROM customer WHERE customer_ui_id='$customer_id'";
    $queryvaledata = mysqli_query($contdb,$get_customercountvale);
    if(mysqli_num_rows($queryvaledata)){
        while($rowvaledata = mysqli_fetch_array($queryvaledata)){
            $getstatename = $rowvaledata['customer_state'];
            if(isset($_SESSION['countryvale'])){
                $getcountryname = $_SESSION['countryvale'];
            }else{
                $getcountryname = $rowvaledata['customer_country'];
            }
            if($getstatename == "" && $getcountryname == ""){
                $_SESSION["tax_amt"] = "0.00";
            }else{
                $get_statevale = "SELECT * FROM shiptaxval WHERE shiptx_type='Tax' AND shiptx_countryname='$getcountryname' AND shiptx_value='$getstatename'";
                $querygettax = mysqli_query($contdb,$get_statevale);
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
        }
    }else{
        echo "00.00";
    }
}

function getcountyvale($get_country="0"){
    global $contdb;

    if($get_country == "0"){
        $count_namvaleda = "SELECT * FROM countries_db ORDER BY name ASC";
        $valedatacode = $contdb->query($count_namvaleda);
        while($rowvaledatd = $valedatacode->fetch_array()){
            echo "<option value='".$rowvaledatd['name']."'>".$rowvaledatd['name']."</option>";
        }
    }else{
        $count_namvaleda = "SELECT * FROM countries_db ORDER BY name ASC";
        $valedatacode = $contdb->query($count_namvaleda);
        while($rowvaledatd = $valedatacode->fetch_array()){
            if($rowvaledatd['name'] == $get_country){
                echo "<option value='".$rowvaledatd['name']."' selected>".$rowvaledatd['name']."</option>";
            }else{
                echo "<option value='".$rowvaledatd['name']."'>".$rowvaledatd['name']."</option>";
            }
        }
    }
}

function get_adminvnr_county($get_countval="0"){
    global $contdb;

    $count_namvaleda = "SELECT * FROM countries_db ORDER BY name ASC";
    $valedatacode = $contdb->query($count_namvaleda);
    while($rowvaledatd = $valedatacode->fetch_array()){
        if($get_countval == "0"){
            echo "<option value='".$rowvaledatd['name']."'>".$rowvaledatd['name']."</option>";
        }elseif($get_countval == $rowvaledatd['name']){
            echo "<option value='".$rowvaledatd['name']."' selected>".$rowvaledatd['name']."</option>";
        }else{
            echo "<option value='".$rowvaledatd['name']."'>".$rowvaledatd['name']."</option>";
        }
    }
}

function stateTax($state){
    global $contdb;
    $sql = "SELECT * FROM shiptaxval WHERE shiptx_value = '$state' AND shiptx_type = 'Tax'";
    $result = mysqli_query($contdb,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $resultset[] = $row;
    }
    return $resultset;
}

function urlmakeid($get_val){
    global $contdb;

    $getvendorid = "SELECT * FROM vendor WHERE vendor_uni_name='$get_val'";
    $queryvalid = mysqli_query($contdb,$getvendorid);
    while($rowdataid = mysqli_fetch_array($queryvalid)){
        $vid_auto_id = $rowdataid['vendor_auto'];
    }
    return $vid_auto_id;
}
function vendorName($singvenderid){
    global $contdb;
    global $url;
    $venderprofile_img = "SELECT * FROM vendor WHERE vendor_auto='$singvenderid'";
    $queryprofiimg = mysqli_query($contdb,$venderprofile_img);
    while($rowvenderleftdata = mysqli_fetch_array($queryprofiimg)){
        if(!empty($rowvenderleftdata['vendor_company'])){
            $singlenameval = $rowvenderleftdata['vendor_company'];
        }else{
            $singlenameval = $rowvenderleftdata['vendor_f_name']." ".$rowvenderleftdata['vendor_l_name'];
        }
    }
    return $singlenameval;
}
function vendorProfileImage($singvenderid){
    global $contdb;
    global $url;
    $venderprofile_img = "SELECT * FROM vendor WHERE vendor_auto='$singvenderid'";
    $queryprofiimg = mysqli_query($contdb,$venderprofile_img);
    while($rowvenderleftdata = mysqli_fetch_array($queryprofiimg)){
        if(file_exists("$url/images/vendor_images/".$rowvenderleftdata['vendor_img']."")){
            if($rowvenderleftdata['vendor_img'] == ""){
                $imagename = "<img src='$url/images/2042928033.png'>";
            }else{
                $imagename = "<img src='$url/images/vendor_images/".$rowvenderleftdata['vendor_img']."'>";
            }
        }else{
            if($rowvenderleftdata['vendor_img'] == ""){
                $imagename = "<img src='$url/images/2042928033.png'>";
            }else{
                $imagename = "<img src='$url/images/".$rowvenderleftdata['vendor_img']."'>";
            }
        }
    }
    return $imagename;
}
function vendorStoreName($singvenderid){
    global $contdb;
    global $url;
    $venderprofile_img = "SELECT * FROM vendor WHERE vendor_auto='$singvenderid'";
    $queryprofiimg = mysqli_query($contdb,$venderprofile_img);
    while($rowvenderleftdata = mysqli_fetch_array($queryprofiimg)){
        $storeurl = $singlenameval;
    }
    return $storeurl;
}
function vendorProfile($singvenderid){
    global $contdb;
    global $url;
    $venderprofile_img = "SELECT * FROM vendor WHERE vendor_auto='$singvenderid'";
    $queryprofiimg = mysqli_query($contdb,$venderprofile_img);
    while($rowvenderleftdata = mysqli_fetch_array($queryprofiimg)){
        if(!empty($rowvenderleftdata['vendor_company'])){
            $singlenameval = $rowvenderleftdata['vendor_company'];
        }else{
            $singlenameval = $rowvenderleftdata['vendor_f_name']." ".$rowvenderleftdata['vendor_l_name'];
        }
        echo "<div class='store-image'>
                <span>";
                if(file_exists("$url/images/vendor_images/".$rowvenderleftdata['vendor_img']."")){
                    if($rowvenderleftdata['vendor_img'] == ""){
                        echo "<img src='$url/images/2042928033.png'>";
                    }else{
                        echo "<img src='$url/images/vendor_images/".$rowvenderleftdata['vendor_img']."'>";
                    }
                }else{
                    if($rowvenderleftdata['vendor_img'] == ""){
                        echo "<img src='$url/images/2042928033.png'>";
                    }else{
                        echo "<img src='$url/images/".$rowvenderleftdata['vendor_img']."'>";
                    }
                }
                echo"</span>
            </div>
            <div class='store-name'>".$singlenameval."</div>";
    }
}

function venderaddress($singvenderid){
    global $contdb;
    $venderadd = "SELECT * FROM vendor WHERE vendor_auto='$singvenderid'";
    $qweuyaddresvedn = mysqli_query($contdb,$venderadd);
    while($rowvenderaddres = mysqli_fetch_array($qweuyaddresvedn)){
        echo "<li>".$rowvenderaddres['vendor_st_address']."</li>";
    }
}

function vendorSlider($singvenderid){
    global $contdb;
    global $url;
    $venderprofile_banner = "SELECT * FROM banners WHERE uid='$singvenderid' AND type='vendor' AND status='active' LIMIT 1";
    $queryproilebaner = mysqli_query($contdb,$venderprofile_banner);
    while($rowvenderrightdata = mysqli_fetch_array($queryproilebaner)){
        if(file_exists("$url/images/store-slider/".$rowvenderrightdata['bannerName']."")){
            echo "$url/images/store-slider/".$rowvenderrightdata['bannerName']."";
        }else{
            echo "$url/images/".$rowvenderrightdata['bannerName']."";
        }
    }
}

function vendorProduct($singvenderid){
    global $contdb;
    global $url;
    $venderprofile_product = "SELECT * FROM all_product WHERE product_vender_id='$singvenderid' AND product_status='1' ORDER BY id DESC";
    $quweryprofpros = mysqli_query($contdb,$venderprofile_product);
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
        $quwerydataval = mysqli_query($contdb,$getvenorname);
        while($rowprodtvenor = mysqli_fetch_array($quwerydataval)){
            $firstnamevenorprodt = $rowprodtvenor['vendor_f_name'];
            $lastnamevenorprodt = $rowprodtvenor['vendor_l_name'];
        }

        $singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC, id DESC";
            $queryallimageprdo_one = mysqli_query($contdb,$singlallimg_one);
            while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){
                $singl_image_val = $rowallimges_one['produt_img'];
        }
        echo "<li class='product'>
                <figure>                                        
                    <!--icons-->
                    <div class='product-wrap base-align'>
                        <a href='$url/".$rowvenderrightprodt['product_page_name']."'>
                        <img src='$url/images/".$rowvenderrightprodt['product_image']."'>
                        <img src='$url/images/$singl_image_val'>
                        </a>
                    </div>
                </figure>
                <!--figure-->

                <div class='content'>
                    <div class='creator-title'>
                        $firstnamevenorprodt $lastnamevenorprodt
                    </div>
                    <h6><a href='$url/".$rowvenderrightprodt['product_page_name']."'>$name_val</a></h6><div class='bottom'>";
                    if($rowvenderrightprodt['product_regular_price'] == "0" || $rowvenderrightprodt['product_regular_price'] == ""){

                            $get_vertionprice = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$produtautoid'";
                            $queryvaledat = $contdb->query($get_vertionprice);
                            while($rowgetdatval = $queryvaledat->fetch_array()){
                                $get_total_regulor = $rowgetdatval['prot_trm_regulprc'];
                                $sale_price = $rowgetdatval['prot_trm_saleprc'];
                                $quntity[] = $rowgetdatval['prot_trm_quantity'];
                                $quntityadd += $rowgetdatval['prot_trm_quantity'];
                            }
                            if($sale_price == "0" || $sale_price == ""){
                                $sale_min = "SELECT MIN(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$produtautoid'";
                                $sale_resultmin = mysqli_query($contdb, $sale_min);
                                $sale_rowmin = mysqli_fetch_array($sale_resultmin);
                                $sale_minvalmin = $sale_rowmin[0];

                                $sale_max = "SELECT MAX(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$produtautoid'";
                                $sale_resultmax = mysqli_query($contdb, $sale_max);
                                $sale_rowmax = mysqli_fetch_array($sale_resultmax);
                                $sale_minvalmax = $sale_rowmax[0];
                                if($sale_minvalmin == $sale_minvalmax){
                                  echo "<div class='price'><ins>₹".number_format($get_total_regulor, 2)."</ins></div>";
                                }else{
                                  echo "<div class='price'><ins>₹".number_format($sale_minvalmin, 2)."</ins> - <ins>₹".number_format($sale_minvalmax, 2)."</ins></div>";
                                }
                            }else{
                                $sale_min = "SELECT MIN(prot_trm_saleprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$produtautoid'";
                                  $sale_resultmin = mysqli_query($contdb, $sale_min);
                                  $sale_rowmin = mysqli_fetch_array($sale_resultmin);
                                  $sale_minvalmin = $sale_rowmin[0];

                                  $sale_max = "SELECT MAX(prot_trm_saleprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$attbutvalcolor' OR prot_trm_prodtid='$produtautoid'";
                                  $sale_resultmax = mysqli_query($contdb, $sale_max);
                                  $sale_rowmax = mysqli_fetch_array($sale_resultmax);
                                  $sale_minvalmax = $sale_rowmax[0];
                                    if($sale_minvalmin == $sale_minvalmax){
                                        echo "<div class='price'><del>₹".number_format($get_total_regulor, 2)."</del> <ins>₹".number_format($sale_minvalmin, 2)."</ins></div>";
                                    }else{
                                        echo "<div class='price'><ins>₹".number_format($sale_minvalmin, 2)."</ins> - <ins>₹".number_format($sale_minvalmax, 2)."</ins></div>";
                                    }
                            }
                            if(in_array("", $quntity)){
                                $qunityvale = "1";
                            }else{
                                if($quntityadd == "0"){
                                    $qunityvale = "0";
                                }else{
                                    $qunityvale = "1";
                                }
                            }
                            if($qunityvale == "0"){
                                echo "<div class='buy-icons'>";
                               echo "<span class='likbtn'>                                           
                                        <button class='btn adtoLike' data-id='$produtautoid' data-toggle='tooltip' data-placement='top' title='Add to Wishlist'><i class='fi-rs-heart'></i></button>
                                    </span>";
                                echo "<span class='addbtn'><button class='btn btn-danger unavailable'><img src='$url/images/emptycart2.png' class='outofstockqut'></button></span></div>";
                            }else{
                                echo "<div class='buy-icons'>";
                                echo "<span class='likbtn'>                                           
                                        <button class='btn adtoLike' data-id='$produtautoid' data-toggle='tooltip' data-placement='top' title='Add to Wishlist'><i class='fi-rs-heart'></i></button>
                                    </span>";
                                echo "<span class='addbtn'>
                                            <button class='btn' data-toggle='tooltip' data-placement='top' title='Select Option'><a href='$url/$product_fash_pageurl'><i class='fi-rs-shopping-cart'></i></a></button>
                                        </span></div>";
                            }

                        }else{
                            if($rowvenderrightprodt['product_sale_price'] == ""){
                                 echo "<div class='price'><ins>₹".number_format($rowvenderrightprodt['product_regular_price'], 2)."</ins></div>";
                              }else{
                                echo "<div class='price'><del>₹".number_format($rowvenderrightprodt['product_regular_price'], 2)."</del> <ins>₹".number_format($rowvenderrightprodt['product_sale_price'], 2)."</ins>";
                                echo "</div>";
                              }
                              
                            if($stock == "0"){
                                echo "<div class='buy-icons'>";
                                echo "<span class='likbtn'>                                           
                                        <button class='btn adtoLike' data-id='$produtautoid' data-toggle='tooltip' data-placement='top' title='Add to Wishlist'><i class='fi-rs-heart'></i></button>
                                    </span>";
                                echo "<span class='addbtn'><button class='btn btn-danger unavailable' data-toggle='tooltip' data-placement='top' title='Out of stock'><img src='$url/images/emptycart2.png' class='outofstockqut'></button></span></div>";
                            }else{
                                echo "<div class='buy-icons'>";
                                echo "<span class='likbtn'>                                           
                                        <button class='btn adtoLike' data-id='$produtautoid' data-toggle='tooltip' data-placement='top' title='Add to Wishlist'><i class='fi-rs-heart'></i></button>
                                    </span>";
                                echo "<span class='addbtn'>
                                            <button class='btn adtoCartSingle' data-toggle='tooltip' data-placement='top' pid='$pId' title='Add to Cart'><i class='fi-rs-shopping-cart'></i></button>
                                        </span>
                                    </div>";
                            }
                        }
                echo "</div></div>
            </li>";
    }
}

function vendorProductMainPage($singvenderid){
    global $contdb;
    global $url;
    $venderprofile_product = "SELECT * FROM all_product WHERE product_vender_id='$singvenderid' AND product_status='1' ORDER BY id DESC";
    $quweryprofpros = mysqli_query($contdb,$venderprofile_product);
    while($rowvenderrightprodt = mysqli_fetch_array($quweryprofpros)){

        $arrayvales[] = $rowvenderrightprodt;
    }
    return $arrayvales;
}

function aboutVendor($singvenderid){
    global $contdb;
    $venderprofile_about = "SELECT * FROM about_me WHERE uid='$singvenderid' AND type='vendor'";
    $aboutweyvend = mysqli_query($contdb,$venderprofile_about);
    while($rowvenderrightabout = mysqli_fetch_array($aboutweyvend)){
        echo "".$rowvenderrightabout['about_content']."";
    }
}

function termsCondition($singvenderid){
    global $contdb;
    $venderprofile_teams = "SELECT * FROM termsCondition WHERE uid='$singvenderid' AND type='vendor'";
    $qweuyternmvn = mysqli_query($contdb,$venderprofile_teams);
    while($rowvenderrightteam = mysqli_fetch_array($qweuyternmvn)){
        echo "".$rowvenderrightteam['terms']."";
    }
}

function reviewviewvendor($singvenderid){

  global $contdb;

  global $url;



  $count_review = "SELECT COUNT(1) FROM reviewdataval WHERE review_type='vendor' AND review_loginid='$singvenderid'";

  $querycount = mysqli_query($contdb,$count_review);

  $rowcount = mysqli_fetch_array($querycount);

  $count_val = $rowcount[0];

  if($count_val == "0"){

    echo "<h5>There are no reviews yet.</h5>";

  }else{

    

  echo '<div class="row">

            <div class="col-sm-12">

              

              <div class="review-block">

                <ul class="review-ul-list">';



  $get_review = "SELECT * FROM reviewdataval WHERE review_type='vendor' AND review_loginid='$singvenderid'";

  $queryval = mysqli_query($contdb,$get_review);

  while($rowval = mysqli_fetch_array($queryval)){

    $get_login_user = $rowval['review_loginuserid'];



    if($rowval['review_rating'] == "1"){



      $stars = '<i class="fa fa-star"></i>';



    }elseif($rowval['review_rating'] == "2"){



      $stars = '<i class="fa fa-star"></i> <i class="fa fa-star"></i>';



    }elseif($rowval['review_rating'] == "3"){



      $stars = '<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>';

      

    }elseif($rowval['review_rating'] == "4"){



      $stars = '<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>';

      

    }elseif($rowval['review_rating'] == "5"){



      $stars = '<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>';

      

    }else{

      $stars = '<i class="fa fa-star"></i>';

    }



    $get_vendr = "SELECT * FROM vendor WHERE vendor_auto='$get_login_user'";

    $quwerycechel = mysqli_query($contdb,$get_vendr);

    if(mysqli_num_rows($quwerycechel)){

      

      $get_vendorname = "SELECT * FROM vendor WHERE vendor_auto='$get_login_user'";

      $venderquery = mysqli_query($contdb,$get_vendorname);

      while($rowvendoer = mysqli_fetch_array($venderquery)){

        $venderfname = $rowvendoer['vendor_f_name'];

        $venderlname = $rowvendoer['vendor_l_name'];

        $img_valvendor = $rowvendoer['vendor_img'];

        if($img_valvendor == "0"){

          $main_ing = "assets/images/default-user-icon.jpg";

        }else{

          $main_ing = "assets/images/$img_valvendor";

        }

          echo '<li>

                  <div class="row">

                    <div class="col-sm-2">

                      <div class="review_images">

                        <img src="'.$url.'/'.$main_ing.'" class="img-rounded">

                      </div>

                    </div>

                    <div class="col-sm-10">

                      <div class="review_name">

                        <div class="review-block-name"><a >'.$venderfname.' '.$venderlname.'</a></div>

                        <div class="review-block-date">'.$rowval['review_date'].' '.$rowval['review_time'].'</div>

                      </div>

                      <div class="stars-box">                                           

                      '.$stars.' '.$rowval['review_rating'].' Star.

                    </div>

                      <div class="review-block-description">'.$rowval['review_text'].'</div>

                    </div>

                  </div>

                </li><hr>';

      }



    }else{

      $cechk_user = "SELECT * FROM customer WHERE customer_ui_id='$get_login_user'";

      $quwerycechlk = mysqli_query($contdb,$cechk_user);

      if(mysqli_num_rows($quwerycechlk)){



        $get_cunstoer = "SELECT * FROM customer WHERE customer_ui_id='$get_login_user'";

        $quweryvalcustome = mysqli_query($get_cunstoer);

        while($rowcustomer = mysqli_fetch_array($quweryvalcustome)){

          $first_name = $rowcustomer['customer_fname'];

          $last_name = $rowcustomer['customer_lname'];

          $img_valcutomer = $rowcustomer['customer_img'];



          if($img_valcutomer == "0"){

          $main_ingcustom = "$url/assets/images/default-user-icon.jpg";

        }else{

          $main_ingcustom = "$url/assets/images/$img_valcutomer";

        }

          echo '<li>

                  <div class="row">

                    <div class="col-sm-2">

                      <div class="review_images">

                        <img src="'.$url.'/'.$main_ingcustom.'" class="img-rounded">

                      </div>

                    </div>

                    <div class="col-sm-10">

                      <div class="review_name">

                        <div class="review-block-name"><a>'.$first_name.' '.$last_name.'</a></div>

                        <div class="review-block-date">'.$rowval['review_date'].' '.$rowval['review_time'].'</div>

                      </div>

                      <div class="stars-box">                                           

                       '.$stars.' '.$rowval['review_rating'].' Star.

                    </div>

                      <div class="review-block-description">'.$rowval['review_text'].'</div>

                    </div>

                  </div>

                </li><hr>';



        }



      }else{

        $cehck_admin = "SELECT * FROM userlogntable WHERE user_auto='$get_login_user'";

        $quweryval = mysqli_query($contdb,$cehck_admin);

        if(mysqli_num_rows($quweryval)){



          $admin_detial = "SELECT * FROM userlogntable WHERE user_auto='$get_login_user'";

          $quweryadmin = mysqli_query($contdb,$admin_detial);

          while($rowadmin = mysqli_fetch_array($quweryadmin)){

            $admin_name = "Admin";



            if("0" == "0"){

              $main_ingadmin = "$url/assets/images/default-user-icon.jpg";

            }else{

              $main_ingadmin = "$url/assets/images/$img_valcutomer";

            }

              echo '<li>

                      <div class="row">

                        <div class="col-sm-2">

                          <div class="review_images">

                            <img src="'.$url.'/'.$main_ingadmin.'" class="img-rounded">

                          </div>

                        </div>

                        <div class="col-sm-10">

                          <div class="review_name">

                            <div class="review-block-name"><a>Admin</a></div>

                            <div class="review-block-date">'.$rowval['review_date'].' '.$rowval['review_time'].'</div>

                          </div>

                          <div class="stars-box">                                           

                           '.$stars.' '.$rowval['review_rating'].' Star

                        </div>

                          <div class="review-block-description">'.$rowval['review_text'].'</div>

                        </div>

                      </div>

                    </li><hr>';

          }



        }

      }

    }

  }

  echo '</ul>

      </div>

      </div>';

      }

  echo '</div>';

}

function showmakname($singvenderid){
    global $contdb;

    $showname = "SELECT * FROM vendor WHERE vendor_auto='$singvenderid'";
    $queryname = mysqli_query($contdb,$showname);
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

function Get_show_menuval($type,$menu_id='0'){
    global $contdb;

    if($menu_id == "0"){
        $get_manual = "SELECT * FROM menudatatable WHERE menu_typename='$type' ORDER BY menu_postion ASC";
    }else{
        $get_manual = "SELECT * FROM menudatatable WHERE menu_typename='$type' AND id='$menu_id'";
    }
    $menu_query = $contdb->query($get_manual);
    while($rowvalue = $menu_query->fetch_array()){
        $array_menu[] = $rowvalue;
    }
    return $array_menu;
}

function cechkandmail($email_cehck){

  global $contdb;



  $dataemialcehck = "SELECT * FROM userlogntable WHERE user_email='$email_cehck'";

  $emailcehclk = mysqli_query($contdb,$dataemialcehck);

  if(mysqli_num_rows($emailcehclk)){

    while($rowemail = mysqli_fetch_array($emailcehclk)){

      $email_vale = $rowemail['user_email'];

      $type_vale = $rowemail['user_type'];

      $status_vale = $rowemail['user_status'];

      $fname_vale = $rowemail['user_first_name'];

      $lanem_vale = $rowemail['user_lastname'];

      $auto_id = $rowemail['user_auto'];

      $token = str_shuffle($email_vale);



      if($type_vale == "admin"){

        return false;

      }else{



        $to = $email_vale;



        $subject = "Password Reset Link";



        $from = "no-reply@jioitservices.com";



         



        // To send HTML mail, the Content-type header must be set



        $headers  = 'MIME-Version: 1.0' . "\r\n";



        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



         



        // Create email headers



        $headers .= 'From: '.$from."\r\n".







        'X-Mailer: PHP/' . phpversion();







        $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>



        <html xmlns='http://www.w3.org/1999/xhtml'>



        <head>



        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />



        <title>BuyJee</title>



        <meta name='viewport' content='width=device-width, initial-scale=1.0'/>



        </head>



        <body style='margin: 0; padding: 0;'>



            <table border='0' cellpadding='0' cellspacing='0' width='100%'> 



                <tr>



                    <td style='padding: 10px 0 30px 0;'>



                        <table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border: 1px solid #cccccc; border-collapse: collapse;'>



                            <tr>



                                <td align='center' bgcolor='#0fa8ae' style='padding: 40px 0 30px 0; color: #FFF; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;'>



                                    <img src='https://buyjee.com/images/2042928033.png' alt='Creating Email Magic' width='300' height='230' style='display: block;' />



                                </td>



                            </tr>



                            <tr>



                                <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>



                                    <table border='0' cellpadding='0' cellspacing='0' width='100%'>


                                        <tr>



                                            <td style='color: #153643; font-family: Arial, sans-serif; font-size: 20px; padding-bottom: 15px;'>



                                                Hello<b> ".$fname_vale." ".$lanem_vale.",</b>



                                            </td>



                                        </tr>



                                        <tr>



                                            <td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 30px;'>


                                                Please click <a href='https://buyjee.com/resetpassword?token=".$token."&auto=".$auto_id."&email=".$email_vale."'>here</a> to reset your password. <br/><br/><br/>



                                                Regards<br/>


                                                Buyjee<br/>



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



                                                &copy;2020 Sarvodaya infotech. All Rights Reserved.<br/><br/>



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





      mail($to, $subject, $message, $headers);



      $date = date('m/d/Y');

      $time = date('H:i:s');



      $insert_vale = "INSERT INTO forgotpassword(tokenval,autoval,emailval,statusval,date_vale,time_vale)VALUES('$token','$auto_id','$email_vale','0','$date','$time')";

      $queryval = mysqli_query($contdb, $insert_vale);

      if($queryval == true){

        return true;

      }else{

        return false;

      }

      }

    }

  }else{

    return false;

  }

}

function GetShpiingNameTable($shppingname){
    global $contdb;

    $queryvaleset = "SELECT * FROM shipping_compy WHERE shipping_c_name='$shppingname'";
    $query_valeset = $contdb->query($queryvaleset);
    while($queryale = $query_valeset->fetch_array()){
        $arrayshpinval[] = $queryale;
    }
    return $arrayshpinval;
}

function valedatevalue($get_token,$auto_token,$email_token){

  global $contdb;

  $date_val = date('m/d/Y');

  $valdate_vale = "SELECT * FROM forgotpassword WHERE tokenval='$get_token' AND autoval='$auto_token' AND emailval='$email_token' AND statusval='0' AND date_vale='$date_val'";

  $queryval = mysqli_query($contdb,$valdate_vale);

  if(mysqli_num_rows($queryval)){

    return true;

  }else{

    return false;

  }

}

function setnewpass($new_password,$auto_token,$email_token,$get_token){

  global $contdb;

  $newpasswordvale = MD5($new_password);

  $set_new_passw = "UPDATE forgotpassword SET statusval='1' WHERE tokenval='$get_token' AND autoval='$auto_token' AND emailval='$email_token'";

  $querymy = mysqli_query($contdb,$set_new_passw);



  $updatepass = "UPDATE userlogntable SET user_password='$newpasswordvale' WHERE user_email='$email_token' AND user_auto='$auto_token'";

  $querypass = mysqli_query($contdb,$updatepass);

  if($querypass == true){

    return true;

  }else{

    return false;

  }

}

function WishListGet_insertdata($cutomer_login,$prdotid){
    global $contdb, $ip, $date, $time;

    if($cutomer_login == "0"){
        $inset_Prdoct = "INSERT INTO wishlistbl_table(whis_prd_id,whis_ip,whis_customerd,whis_date,whis_time)VALUES('$prdotid','$ip','$ip','$date','$time')";
    }else{
        $inset_Prdoct = "INSERT INTO wishlistbl_table(whis_prd_id,whis_ip,whis_customerd,whis_date,whis_time)VALUES('$prdotid','$ip','$cutomer_login','$date','$time')";
    }

    $insert_daaval = $contdb->query($inset_Prdoct);
    if($insert_daaval == true){
        return true;
    }else{
        return false;
    }
}

function SearchBoxMain($url_makeexplod,$getpricevale=0){
    global $contdb, $ip, $date, $time, $url;

    $setcount = 0;
    foreach(explode('-', $url_makeexplod) as $aluesetdata){
        if($setcount < 2){
            $twovale = $aluesetdata;
        }else{
            $twovale = $aluesetdata.' ';
        }
        /*$_seelctvalue = "SELECT * FROM all_product WHERE product_name LIKE '%$aluesetdata%' AND product_status='1' OR product_destion LIKE '%$aluesetdata%' AND product_status='1' OR product_short_des LIKE '%$aluesetdata%' AND product_status='1' OR product_catger LIKE '%$aluesetdata%' AND product_status='1' OR product_sku LIKE '%$aluesetdata%' AND product_status='1' OR FIND_IN_SET('$aluesetdata', product_name) AND product_status='1'";*/
        if($getpricevale == "0"){
            $_seelctvalue = "SELECT * FROM all_product WHERE product_name LIKE '%$twovale%' AND product_status='1' OR product_catger LIKE '%$twovale%' AND product_status='1' OR product_sku LIKE '%$twovale%' AND product_status='1' ORDER BY product_auto_id DESC";
            $query_valueget_set = $contdb->query($_seelctvalue);
            if($query_valueget_set->num_rows > 0){
                while($row_valeset = $query_valueget_set->fetch_array()){
                    $contetval[] = $row_valeset['product_auto_id'];
                }
            }else{
                $contetval = "0";
            }

        }else{
            $explodevale = explode('-', $getpricevale);
            $get_minval = $explodevale[0];
            $get_maxval = $explodevale[1];
            $_seelctvalue = "SELECT * FROM all_product WHERE product_name LIKE '%$twovale%' AND product_status='1' OR product_catger LIKE '%$twovale%' AND product_status='1' OR product_sku LIKE '%$twovale%' AND product_status='1' ORDER BY product_auto_id DESC";
            $query_valueget_set = $contdb->query($_seelctvalue);
            if($query_valueget_set->num_rows > 0){
                while($rowvaleset = $query_valueget_set->fetch_array()){
                    if($rowvaleset['product_regular_price'] == "0" || $rowvaleset['product_regular_price'] == ""){
                        $ge_colorvaert = $rowvaleset['product_color'];
                        $vet_idsval = $rowvaleset['product_auto_id'];

                        $get_catval = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$ge_colorvaert' AND prot_trm_regulprc BETWEEN $get_minval AND $get_maxval OR prot_trm_prodtid='$vet_idsval' AND prot_trm_regulprc BETWEEN $get_minval AND $get_maxval";
                        $query_valeidsval = $contdb->query($get_catval);
                        while($row_catvaleset = $query_valeidsval->fetch_array()){
                            $contetval[] = $row_catvaleset['prot_trm_prodtid'];
                        }
                        
                    }else{

                        $get_mainptf = "SELECT * FROM all_product WHERE product_name LIKE '%$twovale%' AND product_status='1' AND product_regular_price BETWEEN $get_minval AND $get_maxval AND product_status='1' AND FIND_IN_SET('$product_catid', product_catger_ids) OR product_catger LIKE '%$twovale%' AND product_status='1' AND product_regular_price BETWEEN $get_minval AND $get_maxval AND product_status='1' AND FIND_IN_SET('$product_catid', product_catger_ids) OR product_sku LIKE '%$twovale%' AND product_status='1' AND product_regular_price BETWEEN $get_minval AND $get_maxval AND product_status='1' AND FIND_IN_SET('$product_catid', product_catger_ids)";
                        $get_mainvale_pd = $contdb->query($get_mainptf);
                        while($rowget_singal = $get_mainvale_pd->fetch_array()){
                            $contetval[] = $rowget_singal['product_auto_id'];
                        }
                    }
                }
            }else{
                $contetval = "0";
            }
        }
        $setcount++;
    }
    return array_unique($contetval);
}

function GetWhisListData($cutomervale="0"){
    global $contdb, $ip, $date, $time, $url, $brower;

    if($cutomervale == "0"){
        $getwholist = "SELECT * FROM wishlistbl_table WHERE whis_ip='$ip' AND whis_broswer='$brower'";
    }else{
        $getwholist = "SELECT * FROM wishlistbl_table WHERE whis_ip='$ip' AND whis_customerd='$cutomervale' AND whis_broswer='$brower'";
    }
    $query_valeuwhis = $contdb->query($getwholist);
    while($rowgetwholist = $query_valeuwhis->fetch_array()){
        $array_vislist[] = $rowgetwholist;
    }
    return $array_vislist;
}

function getdownloadorder(){
    global $contdb;
    global $url;
    
    $ordercusto = "SELECT * FROM customer_order ORDER BY id DESC";
    $queryorder = mysqli_query($contdb,$ordercusto);
    while($roworder = mysqli_fetch_array($queryorder)){
        $get_shippingadd = $roworder['p_shipping_address'];
        $get_cumoterid = $roworder['customer_id'];
        $get_shippingfee = $roworder['p_shpping_amount'];
    }
}

function attbtesame(){
    global $contdb;
    global $url;

    $get_attbut = "SELECT * FROM product_attbut";
    $queryattval = $contdb->query($get_attbut);
    if($queryattval->num_rows > 0){
        while($rowattvaldat = $queryattval->fetch_array()){
            $get_attid = $rowattvaldat['id'];
            echo "<tr class='maincate'>
                    <td>".$rowattvaldat['pd_attbut_name']."</td>";
            echo "<td>";
            $get_teamval = "SELECT * FROM product_attbut_value WHERE prod_attname_id='$get_attid'";
            $queryteamval = $contdb->query($get_teamval);
            while($rowvalueteam = $queryteamval->fetch_array()){
                $teramname = $rowvalueteam['prod_attname_name'].',';
                echo $teramname;
            }
            echo "<br/><a href='$url/admin-manager/product_attid_term/?attname=".$rowattvaldat['pd_attbut_name']."&attbutid=".$rowattvaldat['id']."'>Configure terms</a></td>";
            echo "<td><a href='$url/admin-manager/product_attitude-edit/?pagetype=edit&".$rowattvaldat['id']."'>Edit</a></td>
                    <td><a href='$url/admin-manager/product_attitude/?pagetype=delete&".$rowattvaldat['id']."'>Delete</a></td>
                </tr>";
        }
    }
}

function attbtesameSeo(){
    global $contdb;
    global $url;

    $get_attbut = "SELECT * FROM product_attbut";
    $queryattval = $contdb->query($get_attbut);
    if($queryattval->num_rows > 0){
        while($rowattvaldat = $queryattval->fetch_array()){
            $get_attid = $rowattvaldat['id'];
            echo "<tr class='maincate'>
                    <td>".$rowattvaldat['pd_attbut_name']."</td>";
            echo "<td>";
            $get_teamval = "SELECT * FROM product_attbut_value WHERE prod_attname_id='$get_attid'";
            $queryteamval = $contdb->query($get_teamval);
            while($rowvalueteam = $queryteamval->fetch_array()){
                $teramname = $rowvalueteam['prod_attname_name'].',';
                echo $teramname;
            }
            echo "<br/><a href='$url/seo-user/product_attid_term/?attname=".$rowattvaldat['pd_attbut_name']."&attbutid=".$rowattvaldat['id']."'>Configure terms</a></td>";
            echo "<td><a href='$url/seo-user/product_attitude-edit/?pagetype=edit&".$rowattvaldat['id']."'>Edit</a></td>
                    <td><a href='$url/seo-user/product_attitude/?pagetype=delete&".$rowattvaldat['id']."'>Delete</a></td>
                </tr>";
        }
    }
}

function attbuteaddteram($caterinsertnam=0,$caterinsertslug=0,$get_pagename,$get_idval=0,$get_teramid=0){
    global $contdb;
    global $url;

    if($get_pagename == ""){
        $slugranderval = trim(strtolower(preg_replace("/[^A-Za-z0-9]/","-", $caterinsertslug)));
        $insertattbutval = "INSERT INTO product_attbut_value(prod_attname_name,prod_attname_slug,prod_attname_id)VALUES('$caterinsertnam','$slugranderval','$get_idval')";
        $queryvalattint = $contdb->query($insertattbutval);
        if($queryvalattint == true){
            return true;
        }else{
            return false;
        }
    }elseif($get_pagename == "edit"){
        $slugranderval = trim(strtolower(preg_replace("/[^A-Za-z0-9]/","-", $caterinsertslug)));
        $editvalue = "UPDATE product_attbut_value SET prod_attname_name='$caterinsertnam',prod_attname_slug='$slugranderval' WHERE id='$get_teramid' AND prod_attname_id='$get_idval'";
        $queryeditval = $contdb->query($editvalue);
        if($queryeditval == true){
            return true;
        }else{
            return false;
        }
    }elseif($get_pagename == "delete"){
        $delectvale = "DELETE FROM product_attbut_value WHERE prod_attname_id='$get_idval' AND id='$get_teramid'";
        $querydelect = $contdb->query($delectvale);
        if($querydelect == true){
            return true;
        }else{
            return false;
        }
    }
}

function attbtesameteram($get_idval,$get_attname){
    global $contdb;
    global $url;

    $get_attbut = "SELECT * FROM product_attbut_value WHERE prod_attname_id='$get_idval' ORDER BY id DESC";
    $queryattval = $contdb->query($get_attbut);
    if($queryattval->num_rows > 0){
        while($rowattvaldat = $queryattval->fetch_array()){
            //$get_attid = $rowattvaldat['id'];
            echo "<tr class='maincate'>
                    <td>".$rowattvaldat['prod_attname_name']."</td>
                    <td><a href='$url/admin-manager/product_attid_term/?attname=$get_attname&attbutid=$get_idval&pagetype=edit&termid=".$rowattvaldat['id']."'>Edit</a></td>
                    <td><a href='$url/admin-manager/product_attid_term/?attname=$get_attname&attbutid=$get_idval&pagetype=delete&termid=".$rowattvaldat['id']."'>Delete</a></td>
                </tr>";
        }
    }
}

function attbtesameteramSeo($get_idval,$get_attname){
    global $contdb;
    global $url;

    $get_attbut = "SELECT * FROM product_attbut_value WHERE prod_attname_id='$get_idval' ORDER BY id DESC";
    $queryattval = $contdb->query($get_attbut);
    if($queryattval->num_rows > 0){
        while($rowattvaldat = $queryattval->fetch_array()){
            //$get_attid = $rowattvaldat['id'];
            echo "<tr class='maincate'>
                    <td>".$rowattvaldat['prod_attname_name']."</td>
                    <td><a href='$url/seo-user/product_attid_term/?attname=$get_attname&attbutid=$get_idval&pagetype=edit&termid=".$rowattvaldat['id']."'>Edit</a></td>
                    <td><a href='$url/seo-user/product_attid_term/?attname=$get_attname&attbutid=$get_idval&pagetype=delete&termid=".$rowattvaldat['id']."'>Delete</a></td>
                </tr>";
        }
    }
}

function attbuteadd($caterinsertnam=0,$caterinsertslug=0,$get_pagename,$get_idval=0){
    global $contdb;
    global $url;

    if($get_pagename == ""){
        $slugranderval = trim(strtolower(preg_replace("/[^A-Za-z0-9]/","-", $caterinsertslug)));
        $insertattbutval = "INSERT INTO product_attbut(pd_attbut_name,pd_attbut_slug)VALUES('$caterinsertnam','$slugranderval')";
        $queryvalattint = $contdb->query($insertattbutval);
        if($queryvalattint == true){
            return true;
        }else{
            return false;
        }
    }elseif($get_pagename == "edit"){
        $slugranderval = trim(strtolower(preg_replace("/[^A-Za-z0-9]/","-", $caterinsertslug)));
        $editvalue = "UPDATE product_attbut SET pd_attbut_name='$caterinsertnam',pd_attbut_slug='$slugranderval' WHERE id='$get_idval'";
        $queryeditval = $contdb->query($editvalue);
        if($queryeditval == true){
            return true;
        }else{
            return false;
        }
    }elseif($get_pagename == "delete"){
        $delectvale = "DELETE FROM product_attbut WHERE id='$get_idval'";
        $querydelect = $contdb->query($delectvale);

        $delectream = "DELETE FROM product_attbut_value WHERE prod_attname_id='$get_idval'";
        $deletform = $contdb->query($delectream);
        if($querydelect == true){
            return true;
        }else{
            return false;
        }
    }
}

function SubscrribeDataVale(){
    global $contdb;
    global $url;

    $get_sutionvale = "SELECT * FROM newslatter ORDER BY id DESC";
    $qyueryvale = $contdb->query($get_sutionvale);
    while($rowgetset = $qyueryvale->fetch_array()){
        $arrysubid[] = $rowgetset;
    }
    return $arrysubid;
}

function GetSingleVertion($idsvertion){
    global $contdb;

    foreach(explode(',', $idsvertion) as $valueset){
        // echo $valueset;
        $get_onepart = "SELECT * FROM product_variationsdata WHERE id='$valueset'";
        $qery_valeset = $contdb->query($get_onepart);
        while($rowvaelset = $qery_valeset->fetch_array()){
            $get_singleids = $rowvaelset['proval_trm_attid'];
            $get_valuename = $rowvaelset['proval_trm_value'];
        }

        $get_secondvale = "SELECT * FROM product_attbut WHERE id='$get_singleids'";
        $querygetsecond = $contdb->query($get_secondvale);
        while($rowsecondval = $querygetsecond->fetch_array()){
            $getname_vale = $rowsecondval['pd_attbut_name'];
        }
        $setretrnval = $getname_vale.': '.$get_valuename.'<br/>';
    }
    return $setretrnval;
}

function USATimeZoneSettime($timeverble){

    $timesetvarble = date("m-d-Y", strtotime($timeverble));

    return $timesetvarble;
}

function mostviewproductsdatvale($produtautoid,$product_url){
    global $contdb, $ip, $date, $time;

    $get_alrdyid = "SELECT * FROM maxviewproducts WHERE userip='$ip' AND product_auto_id='$produtautoid'";
    $queryvaleset = $contdb->query($get_alrdyid);
    if($queryvaleset->num_rows > 0){
        while($rowsetval = $queryvaleset->fetch_array()){
            $get_numercunt = $rowsetval['numberofview']+1;
        }
        $insertdatacale = "UPDATE maxviewproducts SET numberofview='$get_numercunt' WHERE userip='$ip' AND product_auto_id='$produtautoid'";
    }else{
        $insertdatacale = "INSERT INTO maxviewproducts(product_auto_id,userip,usertime,userdate,numberofview,product_url)VALUES('$produtautoid','$ip','$time','$date','0','$product_url')";
    }
    $insertvale = $contdb->query($insertdatacale);
}

function MotViewProdctsViewData(){
    global $contdb, $ip, $date, $time;

    $get_mostviewdata = "SELECT * FROM maxviewproducts ORDER BY id DESC LIMIT 12";
    $query_valeset = $contdb->query($get_mostviewdata);
    while($rowgetview = $query_valeset->fetch_array()){
        $array_valeset = $rowgetview['product_auto_id'];
        
        $get_valuest = "SELECT * FROM all_product WHERE product_auto_id='$array_valeset' AND product_status='1' ORDER BY CAST(id AS UNSIGNED INTEGER)";
        $query_setvale = $contdb->query($get_valuest);
        while($rowsetvale = $query_setvale->fetch_array()){
            $arayvaleset[] = $rowsetvale;
        }
    }
    return $arayvaleset;
}

function GetEmailDataVale($idvale=0){
    global $contdb, $ip, $date, $time;

    if($idvale == "0"){
        $get_emaildaat = "SELECT * FROM email_templatedatamange ORDER BY id DESC";
    }else{
        $get_emaildaat = "SELECT * FROM email_templatedatamange WHERE id='$idvale'";
    }
    $queryaleset = $contdb->query($get_emaildaat);
    while($rowsetemail = $queryaleset->fetch_array()){
        $arrayemaildat[] = $rowsetemail;
    }
    return $arrayemaildat;
}

function PostDealyData(){
    global $contdb, $ip, $date, $time;

    $get_months = "SELECT * FROM delayhomepost";
    $getmt = $contdb->query($get_months);
    while($getvaleset = $getmt->fetch_array()){
        $get_monthsvale = $getvaleset['postmonths'];
        $get_sdate = $getvaleset['postsdate'];
        $get_edate = $getvaleset['postedate'];
        $timeget = $getvaleset['timevale'];
    }
    $adddays = date("Y-m-d", strtotime("+$get_monthsvale days"));
    $adddays_onday = date("Y-m-d", strtotime("+1 days"));
    /*if(($date >= "2022-04-05")){
        echo "dat 1";
    }else{
        echo "dat 2";
    }*/
    if(($date >= $get_edate)){
        $updatevale = "UPDATE delayhomepost SET postsdate='$adddays_onday', postedate='$adddays', timevale='$time'";
        $queryvaleset = $contdb->query($updatevale);
        return "1";
    }else{
        return "0";
    }
    /*$insertdatavale = "INSERT INTO delayhomepost(postsdate,postedate,postmonths)VALUES('$date','$date','7')";
    $ueryinsert = $contdb->query($insertdatavale);*/
}

function categories_MainMnu($catidsval)
{
    global $contdb, $ip, $date, $time;
    $sql = "SELECT * FROM product_categories WHERE prd_cat_prent_categ='$catidsval' ORDER BY prd_cat_name ASC";
    $result = $contdb->query($sql);
    $categories = array();
    while($row = $result->fetch_array())
    {
        $categories[] = array(
            'id' => $row['id'],
            'parent_id' => $row['prd_cat_prent_categ'],
            'category_name' => $row['prd_cat_name'],
            'subcategory' => sub_categories_MainMenu($row['id']),
            'category_url' => $row['prd_cat_main_url'],
        );
    }   
    return $categories;
}


function sub_categories_MainMenu($id)
{   
    global $contdb, $ip, $date, $time;
    
    $sql = "SELECT * FROM product_categories WHERE prd_cat_prent_categ=$id ORDER BY prd_cat_name ASC";
    $result = $contdb->query($sql);
    $categories = array();
    while($row = $result->fetch_array())
    {
        $categories[] = array(
            'id' => $row['id'],
            'parent_id' => $row['prd_cat_prent_categ'],
            'category_name' => $row['prd_cat_name'],
            'subcategory' => sub_categories_MainMenu($row['id']),
            'category_url' => $row['prd_cat_main_url'],
        );
    }
    return $categories;
}

function viewsubcat_MainManu($categories)
{
    $html = '<ul>';
    foreach($categories as $category){

        $html .= '<li><a href="'.$url.'/'.$category['category_url'].'">'.$category['category_name'].'</a></li>';
        
        if( ! empty($category['subcategory'])){
            $html .= viewsubcat_MainManu($category['subcategory']);
        }
    }
    $html .= '</ul>';
    
    return $html;
}
/*---- Menu Tree -----*/
function GetAllCatagoryvael(){
    global $contdb, $ip, $date, $time;
    $getFirstLavelCat = "SELECT * FROM product_categories WHERE prd_cat_hidevale='1'";
    $queryCatmenu = $contdb->query($getFirstLavelCat);
    if($queryCatmenu->num_rows > 0){
        while($rowcatvael = $queryCatmenu->fetch_array()){
            $getidsval[] = $rowcatvael['prd_cat_prent_categ'];
        }
    }
    return $getidsval;
}
function GetFirstFaceMneuCat($catagoryurl){
    global $contdb, $ip, $date, $time ,$url;
    $getFirstLavelCat = "SELECT * FROM product_categories WHERE prd_cat_slug='$catagoryurl' AND prd_cat_hidevale='1'";
    $queryCatmenu = $contdb->query($getFirstLavelCat);
    if($queryCatmenu->num_rows > 0){
        $html = "<li>";
            while($rowcatvael = $queryCatmenu->fetch_array()){
                if(in_array($rowcatvael['id'],GetAllCatagoryvael())){
                    $html .= "<a href='$url/".$rowcatvael['prd_cat_main_url']."'>".$rowcatvael['prd_cat_name']." <i class='fi-rs-angle-down'></i></a>";
                    $html .= GetSubMenuLevevice($rowcatvael['id']);
                }else{
                    $html .= "<a href='$url/".$rowcatvael['prd_cat_main_url']."'>".$rowcatvael['prd_cat_name']."</a>";
                }
            }
        $html .= "</li>";
    }
    return $html;
}
function GetSubMenuLevevice($idsmenu){
    global $contdb, $ip, $date, $time;
    $getFirstLavelCat = "SELECT * FROM product_categories WHERE prd_cat_prent_categ='$idsmenu' AND prd_cat_hidevale='1'";
    $queryCatmenu = $contdb->query($getFirstLavelCat);
    if($queryCatmenu->num_rows > 0){
        $html .= "<ul class='sub-menu'>";
            while($rowgetsubcata = $queryCatmenu->fetch_array()){
                if(in_array($rowgetsubcata['id'],GetAllCatagoryvael())){
                    $html .= "<li><a href='$url/".$rowgetsubcata['prd_cat_main_url']."'>".$rowgetsubcata['prd_cat_name']." <i class='fi-rs-angle-right'></i></a>";
                    $html .= GetMoreCataoryVal($rowgetsubcata['id']);
                    $html .= "</li>";
                }else{
                    $html .= "<li><a href='$url/".$rowgetsubcata['prd_cat_main_url']."'>".$rowgetsubcata['prd_cat_name']."</a></li>";   
                }
            }
        $html .= "</ul>";
    }
    return $html;
}
function GetMoreCataoryVal($idsmenu){
    global $contdb, $ip, $date, $time;
    $getFirstLavelCat = "SELECT * FROM product_categories WHERE prd_cat_prent_categ='$idsmenu' AND prd_cat_hidevale='1'";
    $queryCatmenu = $contdb->query($getFirstLavelCat);
    if($queryCatmenu->num_rows > 0){
        $html .= "<ul class='level-menu level-menu-modify'>";
            while($rowgetsubcata = $queryCatmenu->fetch_array()){
                if(in_array($rowgetsubcata['id'],GetAllCatagoryvael())){
                    $html .= "<li><a href='$url/".$rowgetsubcata['prd_cat_main_url']."'>".$rowgetsubcata['prd_cat_name']." <i class='fi-rs-angle-right'></i></a>";
                    $html .= GetMoreCataoryVal($rowgetsubcata['id']);
                    $html .= "</li>";
                }else{
                    $html .= "<li><a href='$url/".$rowgetsubcata['prd_cat_main_url']."'>".$rowgetsubcata['prd_cat_name']."</a></li>";   
                }
            }
        $html .= "</ul>";
    }
    return $html;
}
/*---- Menu Tree -----*/
?>