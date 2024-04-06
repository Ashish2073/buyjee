<?php
$floder_path_name = $file_path."/images";
if(isset($_POST['login'])){

	$email = $_POST['email'];

	$password = MD5($_POST['password']);

	$_login_chking = uniqid();

	$_SESSION['login-user']=$_login_chking;

	$chking_login_user = login_setup_data($email,$password,$_login_chking);

	if($chking_login_user == "0"){

		echo "<script>alert('This Security Reasons your not login your account. Please try again.');</script>";

	}elseif($chking_login_user == "1"){

		echo "<script>alert('Your account has been blocked. Contact admin@jioitservices.com for more information.');</script>";

	}elseif($chking_login_user == "2"){

		echo "<script>alert('Your Email ID/Username or Password is Incorrect.');</script>";

	}elseif($chking_login_user == "3"){

		echo "<script>alert('You have no account in Buyjee.');</script>";

	}

}

if(isset($_POST['head-updatedata'])){
	$post_Header_logo = "head-thumimage";
	$post_Header_logock = $_POST['head-thumimage-chking'];
	$herder_new_same = images_upload($post_Header_logo);
	$fileinfoHedLogo = @getimagesize($_FILES["head-thumimage"]["tmp_name"]);
    $widthHedLogo = $fileinfoHedLogo[0];
    $heightHedLogo = $fileinfoHedLogo[1];
	if($herder_new_same == "0"){
		$_head_new_img = $post_Header_logock;
		$Hed001 = "0";
	}else{
	    if($widthHedLogo == "320" || $heightHedLogo == "157") {
    		$_head_new_img = $herder_new_same;
    		move_uploaded_file($_FILES['head-thumimage']['tmp_name'], "$floder_path_name/$herder_new_same");
    		$Hed001 = "0";
	    }else{
            echo "<script>alert('Image dimension should be within 320X157px');</script>";
            $Hed001 = "1";
        }
	}

	$post_favicon = "faviconimage";
	$post_faviconchk = $_POST['faviconimage-chking'];
	$post_favicon_same = images_upload($post_favicon);
	$fileinfoHedFavi = @getimagesize($_FILES["faviconimage"]["tmp_name"]);
    $widthHedFavi = $fileinfoHedFavi[0];
    $heightHedFavi = $fileinfoHedFavi[1];
	if($post_favicon_same == "0"){
		$_favicon_img = $post_faviconchk;
		$Hed002 = "0";
	}else{
	    if($widthHedFavi == "160" || $heightHedFavi == "160") {
    		$_favicon_img = $post_favicon_same;
    		move_uploaded_file($_FILES['faviconimage']['tmp_name'], "$floder_path_name/$post_favicon_same");
    		$Hed002 = "0";
	    }else{
            echo "<script>alert('Image dimension should be within 160X160px');</script>";
            $Hed002 = "1";
        }

	}

	$top_baricon = array($_POST['searchbarinst'],$_POST['cariconinst'],$_POST['whishlistinst'],$_POST['myaccountinst']);
	$topbariconstaus = json_encode($top_baricon);

	$type = "edit";
	$_Post_pageid = $_POST['pageids'];

	$InsertHerderdata = GLLHeaderSection($_head_new_img,$type,$_favicon_img,$topbariconstaus,$_Post_pageid);
	if($InsertHerderdata == true && $Hed001 = "0" && $Hed002 = "0"){
		echo "<script>alert('Successfully Updated');</script>";
	}else{
		echo "<script>alert('Please Try Again.');</script>";
	}
}

if(isset($_POST['ft-expressbtn'])){
	$footer_page_id = $_POST['page_idsdata'];

	$footer_imgname_express = "ft-expressimg";
	$footer_imgchk_express = $_POST['ft-expressimg-chking'];
	$footer_imguplod_express = images_upload($footer_imgname_express);
	if($footer_imguplod_express == "0"){
		$footer_img_express = $footer_imgchk_express;
	}else{
		$footer_img_express = $footer_imguplod_express;
		move_uploaded_file($_FILES['ft-expressimg']['tmp_name'], "$floder_path_name/$footer_imguplod_express");
	}

	$make_array = array(addslashes(trim($_POST['ft-expresstitle'])),addslashes(trim($_POST['ft-expresssubtitle'])),$footer_img_express);
	$jeson_end_express = json_encode($make_array);
	$type = "edit";
	$box_type = $_POST['box_type'];

	$update_datafooter = GLLUpdateFooterData($jeson_end_express,$footer_page_id,$type,$box_type);
	if($update_datafooter == true){
		echo "<script>alert('Successfully Updated.');</script>";
	}else{
		echo "<script>alert('Please Try Again.');</script>";
	}
}

if(isset($_POST['ft-securebtn'])){
	$footer_page_id = $_POST['page_idsdata'];

	$footer_imgname_secure = "ft-secureimg";
	$footer_imgchk_secure = $_POST['ft-secureimg-chking'];
	$footer_imguplod_secure = images_upload($footer_imgname_secure);
	if($footer_imguplod_secure == "0"){
		$footer_img_secure = $footer_imgchk_secure;
	}else{
		$footer_img_secure = $footer_imguplod_secure;
		move_uploaded_file($_FILES['ft-secureimg']['tmp_name'], "$floder_path_name/$footer_imguplod_secure");
	}

	$make_array = array(addslashes(trim($_POST['ft-securetitle'])),addslashes(trim($_POST['ft-securesubtitle'])),$footer_img_secure);
	$jeson_end_express = json_encode($make_array);
	$type = "edit";
	$box_type = $_POST['box_type'];

	$update_datafooter = GLLUpdateFooterData($jeson_end_express,$footer_page_id,$type,$box_type);
	if($update_datafooter == true){
		echo "<script>alert('Successfully Updated.');</script>";
	}else{
		echo "<script>alert('Please Try Again.');</script>";
	}
}

if(isset($_POST['ft-savebtn'])){
	$footer_page_id = $_POST['page_idsdata'];

	$footer_imgname_save = "ft-saveimg";
	$footer_imgchk_save = $_POST['ft-saveimg-chking'];
	$footer_imguplod_save = images_upload($footer_imgname_save);
	if($footer_imguplod_save == "0"){
		$footer_img_save = $footer_imgchk_save;
	}else{
		$footer_img_save = $footer_imguplod_save;
		move_uploaded_file($_FILES['ft-saveimg']['tmp_name'], "$floder_path_name/$footer_imguplod_save");
	}

	$make_array = array(addslashes(trim($_POST['ft-savetitle'])),addslashes(trim($_POST['ft-savesubtitle'])),$footer_img_save);
	$jeson_end_express = json_encode($make_array);
	$type = "edit";
	$box_type = $_POST['box_type'];

	$update_datafooter = GLLUpdateFooterData($jeson_end_express,$footer_page_id,$type,$box_type);
	if($update_datafooter == true){
		echo "<script>alert('Successfully Updated.');</script>";
	}else{
		echo "<script>alert('Please Try Again.');</script>";
	}
}

if(isset($_POST['ft-bestbtn'])){
	$footer_page_id = $_POST['page_idsdata'];

	$footer_imgname_best = "ft-bestimg";
	$footer_imgchk_best = $_POST['ft-bestimg-chking'];
	$footer_imguplod_best = images_upload($footer_imgname_best);
	if($footer_imguplod_best == "0"){
		$footer_img_best = $footer_imgchk_best;
	}else{
		$footer_img_best = $footer_imguplod_best;
		move_uploaded_file($_FILES['ft-bestimg']['tmp_name'], "$floder_path_name/$footer_imguplod_best");
	}

	$make_array = array(addslashes(trim($_POST['ft-besttitle'])),addslashes(trim($_POST['ft-bestsubtitle'])),$footer_img_best);
	$jeson_end_express = json_encode($make_array);
	$type = "edit";
	$box_type = $_POST['box_type'];

	$update_datafooter = GLLUpdateFooterData($jeson_end_express,$footer_page_id,$type,$box_type);
	if($update_datafooter == true){
		echo "<script>alert('Successfully Updated.');</script>";
	}else{
		echo "<script>alert('Please Try Again.');</script>";
	}
}

if(isset($_POST['footer-updatedata'])){
	$footer_page_id = $_POST['page_idsdata'];

	$make_array = array(addslashes(trim($_POST['ft-main-emailtitle'])),addslashes(trim($_POST['ft-main-emailbtn'])),addslashes(trim($_POST['ft-main-copyrihgt'])));
	$jeson_end_express = json_encode($make_array);
	$jsonemailcont = json_encode(array($_POST['head-number'],$_POST['head-email']));
	$type = "edit";
	$box_type = $_POST['box_type'];

	$socialicon = array($_POST['head-fb'],$_POST['head-twiter'],$_POST['head-linkdin'],$_POST['head-youtub'],$_POST['head-instgrm'],$_POST['head-whatsap']);
	$array_json = json_encode($socialicon);
	$home_id = $_POST['headeridsval'];
	UpdateAllDataFileds("header","head_socialicon='$array_json',head_numberbox='$jsonemailcont'","id='$home_id'");
	$update_datafooter = GLLUpdateFooterData($jeson_end_express,$footer_page_id,$type,$box_type);
	if($update_datafooter == true){
		echo "<script>alert('Successfully Updated.');</script>";
	}else{
		echo "<script>alert('Please Try Again.');</script>";
	}
}

if(isset($_POST['new-slider'])){
	$_slider_img_desk = "slider-deskimage";
	$_uplod_image_desk = images_upload($_slider_img_desk);
	$fileinfoSldNewDSK = @getimagesize($_FILES["slider-deskimage"]["tmp_name"]);
    $widthSldNewDSK = $fileinfoSldNewDSK[0];
    $heightSldNewDSK = $fileinfoSldNewDSK[1];
	if($_uplod_image_desk == "0"){
		$_slidermagename_desk = "0";
		$SldNewDSK01 = "0";
	}else{
	    if($widthSldNewDSK == "1920" || $heightSldNewDSK == "767") {
    		$_slidermagename_desk = $_uplod_image_desk;
    		move_uploaded_file($_FILES['slider-deskimage']['tmp_name'], "$floder_path_name/$_uplod_image_desk");
    		$SldNewDSK01 = "0";
	    }else{
            echo "<script>alert('Image dimension should be within 1920X767px');</script>";
            $SldNewDSK01 = "1";
        }
	}

	$_slider_img_mobile = "slider-mobilimage";
	$_uplod_image_mobile= images_upload($_slider_img_mobile);
	$fileinfoSldNewMob = @getimagesize($_FILES["slider-mobilimage"]["tmp_name"]);
    $widthSldNewMob = $fileinfoSldNewMob[0];
    $heightSldNewMob = $fileinfoSldNewMob[1];
	if($_uplod_image_mobile == "0"){
		$_slidermagename_mobile = "0";
		$SldNewDSK02 = "0";
	}else{
	    if($widthSldNewMob == "650" || $heightSldNewMob == "420") {
    		$_slidermagename_mobile = $_uplod_image_mobile;
    		move_uploaded_file($_FILES['slider-mobilimage']['tmp_name'], "$floder_path_name/$_uplod_image_mobile");
    		$SldNewDSK02 = "0";
	    }else{
            echo "<script>alert('Image dimension should be within 650X420px');</script>";
            $SldNewDSK02 = "1";
        }
	}

	$_slider_contetn = addslashes(trim($_POST['slider-text-content']));
	$_slider_url_array = json_encode(array(addslashes(trim($_POST['slider-url'])),$_POST['slider-target']));
	$_Slider_stauts = $_POST['slider-status'];

	$_insert_slider = InsertSliderDataVal($_slidermagename_desk,$_slidermagename_mobile,$_slider_contetn,$_slider_url_array,$_Slider_stauts);
	if($_insert_slider == true && $SldNewDSK01 == "0" && $SldNewDSK02 == "0"){
		echo "<script>alert('Successfully Add.');window.location.href='$url/admin-manager/all-slider/';</script>";
	}
}

if(isset($_POST['new-slider-edit'])){
	$_slideedit_dekimg = "slider-edit-image";
	$_slideedit_image_desk = images_upload($_slideedit_dekimg);
	$fileinfoSlidDSK = @getimagesize($_FILES["slider-edit-image"]["tmp_name"]);
    $widthSlidDSK = $fileinfoSlidDSK[0];
    $heightSlidDSK = $fileinfoSlidDSK[1];
	if($_slideedit_image_desk == "0"){
		$_slideedit_desk = $_POST['img-chking-slider'];
		$Slid001 = "0";
	}else{
	    if($widthSlidDSK == "1920" || $heightSlidDSK == "767") {
    		$_slideedit_desk = $_slideedit_image_desk;
    		move_uploaded_file($_FILES['slider-edit-image']['tmp_name'], "$floder_path_name/$_slideedit_image_desk");
    		$Slid001 = "0";
	    }else{
            echo "<script>alert('Image dimension should be within 1920X767px');</script>";
            $Slid001 = "1";
        }
	}

	$_slideedit_mobimg = "slider-edit-imagemob";
	$_slideedit_image_mob = images_upload($_slideedit_mobimg);
	$fileinfoSlidMOB = @getimagesize($_FILES["slider-edit-imagemob"]["tmp_name"]);
    $widthSlidMOB = $fileinfoSlidMOB[0];
    $heightSlidMOB = $fileinfoSlidMOB[1];
	if($_slideedit_image_mob == "0"){
		$_slideedit_mob = $_POST['img-chking-slidermob'];
		$Slid002 = "0";
	}else{
	    if($widthSlidMOB == "650" || $heightSlidMOB == "420") {
    		$_slideedit_mob = $_slideedit_image_mob;
    		move_uploaded_file($_FILES['slider-edit-imagemob']['tmp_name'], "$floder_path_name/$_slideedit_image_mob");
    		$Slid002 = "0";
	    }else{
            echo "<script>alert('Image dimension should be within 650X420px');</script>";
            $Slid002 = "1";
        }
	}

	$_slideedit_cont = addslashes(trim($_POST['slider-edit-text-content']));
	$_slideedit_url = json_encode(array(addslashes(trim($_POST['slider-url-edit'])),$_POST['slider-edit-target']));
	$_slideedit_status = $_POST['slider-edit-status'];
	$update_datafiled = "slid_upertitle='".$_slideedit_cont."',slid_image='".$_slideedit_desk."',slid_mob_img='".$_slideedit_mob."',slid_url='".$_slideedit_url."',slid_status='".$_slideedit_status."'";
	$where_update = "id='".$_GET['edit']."'";
	$Update_querydat = UpdateAllDataFileds('slideres_table_content',$update_datafiled,$where_update);
	if($Update_querydat == true && $Slid001 == "0" && $Slid002 == "0"){
		echo "<script>alert('Successfully Updated.');window.location.href='$url/admin-manager/all-slider/'</script>";
	}
}

if(isset($_POST['add-new-page'])){
	$_page_name = trim(addslashes($_POST['pagename']));
	$_page_url = makeurl($_page_name);
	$_page_content = trim(addslashes($_POST['page-text-content']));
	$_page_customlink = $_POST['page-custom-link'];
	$_page_status = $_POST['page-status'];
	$_page_new_bgiimg = 'page-new-image';
	$_page_newcking_img = $_POST['page-new-image-chking'];
	$page_new_same = images_upload($_page_new_bgiimg);
	if($page_new_same == "0"){
		$_pahg_new_img = $_page_newcking_img;
	}else{
		$_pahg_new_img = $page_new_same;
		move_uploaded_file($_FILES['page-new-image']['tmp_name'], "$floder_path_name/$page_new_same");
	}

	$SEO_img = "seimgvale";
	$seo_imguplod = images_upload($SEO_img);
	if($seo_imguplod == "0"){
		$seo_thnualname = $_POST['seimgvalechking'];
	}else{
		$seo_thnualname = $seo_imguplod;
		move_uploaded_file($_FILES['seimgvale']['tmp_name'], "$floder_path_name/$seo_imguplod");
	}
	$randvale = rand();
	$seoTitle = addslashes(trim($_POST['seotitle']));
	$seodesctrion = addslashes(trim($_POST['seodescription']));
	$seokeyword = addslashes(trim($_POST['seokeywords']));
	$seoindexing = $_POST['setindeseo'];
	if($seoindexing == ""){
		$seoindexingvale = "No";
	}else{
		$seoindexingvale = $seoindexing;
	}
	$seopage_url = $_page_url;
	$seoPcknewold = $_POST['pageseochk'];
	if($seoPcknewold == "new"){
        $uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }elseif($seoPcknewold == ""){
    	$uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }else{
        $uploadatevale = "UPDATE seotable SET seo_title='$seoTitle',seo_desrpt='$seodesctrion',seo_keyword='$seokeyword',seo_indexing='$seoindexingvale',seo_imageval='$seo_thnualname',seo_page_name='$seopage_url' WHERE seo_autovale='$seoPcknewold'";
    }

    $qeryvaleuset = $contdb->query($uploadatevale);

	$insert_page_name = GllInsertNewPage($_page_url,$_page_name,$_page_content,$_page_customlink,$_page_status,$_pahg_new_img);
	if($insert_page_name == true){
		echo "<script>window.location.href='$url/admin-manager/all-pages/';</script>";
	}else{
		echo "<script>alert('Please try again. This page name already in our database.');</script>";
	}
}

if(isset($_POST['new-ads-edit'])){
	$_ads_edit_uplodimg = images_upload("ads-image-edit");
	$fileinfoAds = @getimagesize($_FILES["ads-image-edit"]["tmp_name"]);
    $widthAds = $fileinfoAds[0];
    $heightAds = $fileinfoAds[1];
	if($_ads_edit_uplodimg == "0"){
		$_ads_edit_uplodname = $_POST['ads-image-edit-chkg'];
		$Ads001 = "0";
	}else{
	    if($widthAds == "720" || $heightAds == "384") {
    		$_ads_edit_uplodname = $_ads_edit_uplodimg;
    		move_uploaded_file($_FILES['ads-image-edit']['tmp_name'], "$floder_path_name/$_ads_edit_uplodimg");
    		$Ads001 = "0";
	    }else{
            echo "<script>alert('Image dimension should be within 720X384px');</script>";
            $Ads001 = "1";
        }
	}
	if($Ads001 == "0"){
    	$upatevale = "adsimg_image='".$_ads_edit_uplodname."',adsimg_url='".$_POST['slider-url-edit']."',adsimg_status='".$_POST['ads-status-edit']."',adsimg_name='".addslashes(trim($_POST['ads-title-edit']))."',adsimg_urltarget='".$_POST['ads-target-edit']."'";
    	$ads_edit_adsval = UpdateAllDataFileds("ads_imagesection",$upatevale,"id='".$_GET['edit']."'");
	    echo "<script>alert('Successfully Updated.');</script>";
	}
}

if(isset($_POST['new-ads'])){
	$ads_title = addslashes(trim($_POST['ads-title']));
	$_ads_uploadimg = "ads-deskimage";
	$_ads_uplodimg = images_upload($_ads_uploadimg);
	$fileinfoAdsNew = @getimagesize($_FILES["ads-deskimage"]["tmp_name"]);
    $widthAdsNew = $fileinfoAdsNew[0];
    $heightAdsNew = $fileinfoAdsNew[1];
	if($_ads_uplodimg == "0"){
		$_ads_uplodname = "0";
		$AdsNew001 = "0";
	}else{
	    if($widthAdsNew == "720" || $heightAdsNew == "384") {
    		$_ads_uplodname = $_ads_uplodimg;
    		move_uploaded_file($_FILES['ads-deskimage']['tmp_name'], "$floder_path_name/$_ads_uplodimg");
    		$AdsNew001 = "0";
	    }else{
            echo "<script>alert('Image dimension should be within 720X384px');</script>";
            $AdsNew001 = "1";
        }
	}
	$ads_url_set = addslashes(trim($_POST['ads-url']));
	$ads_target_set = $_POST['ads-target'];
	$ads_status_set = $_POST['ads-status'];
    if($AdsNew001 == "0"){
    	$insert_Updatedat = InsertAdsaleDataT($ads_title,$_ads_uplodname,$ads_url_set,$ads_target_set,$ads_status_set);
    	if($insert_Updatedat == true){
    		echo "<script>alert('Successfully Added.');window.location.href='$url/admin-manager/ads/';</script>";
    	}
    }
}

if(isset($_POST['catgoyaddnew'])){
	$_catgoy_mainimg = "catgoy_mainimg";
	$_catgoy_mainimguplod = images_upload($_catgoy_mainimg);
	$fileinfoCatNew = @getimagesize($_FILES["catgoy_mainimg"]["tmp_name"]);
    $widthCatNew = $fileinfoCatNew[0];
    $heightCatNew = $fileinfoCatNew[1];
	if($_catgoy_mainimguplod == "0"){
		$_catgoy_mainimgname = "0";
		$CatNew001 = "0";
	}else{
	    if($widthCatNew == "120" || $heightCatNew == "120") {
    		$_catgoy_mainimgname = $_catgoy_mainimguplod;
    		move_uploaded_file($_FILES['catgoy_mainimg']['tmp_name'], "$floder_path_name/$_catgoy_mainimguplod");
    		$CatNew001 = "0";
	    }else{
	        echo "<script>alert('Image dimension should be within 120X120px');</script>";
            $CatNew001 = "1";
	    }
	}

	$_catgoy_hoverimg = "catgoy_hoverimg";
	$_catgoy_hoverimguplod = images_upload($_catgoy_hoverimg);
	if($_catgoy_hoverimguplod == "0"){
		$_catgoy_hoverimgname = "0";
	}else{
		$_catgoy_hoverimgname = $_catgoy_hoverimguplod;
		move_uploaded_file($_FILES['catgoy_hoverimg']['tmp_name'], "$floder_path_name/$_catgoy_hoverimguplod");
	}

	$image_jsondata = json_encode(array($_catgoy_mainimgname,$_catgoy_hoverimgname));
	$_catgoy_name = addslashes(trim($_POST['catgoy_name']));
	$_catgoy_sulg_make = makeurl($_catgoy_name);
	$_cat_pant_id = explode('|', $_POST['catgoy_parent']);
	$_catgoy_parentid = $_cat_pant_id[0];
	if($_cat_pant_id[1] == ""){
		$_catgoy_parenturl = $_catgoy_sulg_make;
	}else{
		$_catgoy_parenturl = $_cat_pant_id[1].'/'.$_catgoy_sulg_make;
	}
	$_catgoy_seo_title = addslashes(trim($_POST['catgoy_seo_title']));
	$_catgoy_seo_keywod = addslashes(trim($_POST['catgoy_seo_keywor']));
	$_catgoy_seo_index = $_POST['catgoy_seo_indexng'];
	$_catgoy_seo_desction = addslashes(trim($_POST['catgoy_seo_descriptn']));

	$SEO_img = "seimgvale";
	$seo_imguplod = images_upload($SEO_img);
	$fileinfoSeo = @getimagesize($_FILES["seimgvale"]["tmp_name"]);
    $widthSeo = $fileinfoSeo[0];
    $heightSeo = $fileinfoProfile[1];
	if($seo_imguplod == "0"){
		$seo_thnualname = $_POST['seimgvalechking'];
		$CatNew002 = "0";
	}else{
	    if($widthSeo == "700" || $heightSeo == "400") {
    		$seo_thnualname = $seo_imguplod;
    		move_uploaded_file($_FILES['seimgvale']['tmp_name'], "$floder_path_name/$seo_imguplod");
    		$CatNew002 = "0";
	    }else{
            echo "<script>alert('Image dimension should be within 700X400px');</script>";
            $CatNew002 = "1";
        }
	}
	$randvale = rand();
	$seoTitle = addslashes(trim($_POST['seotitle']));
	$seodesctrion = addslashes(trim($_POST['seodescription']));
	$seokeyword = addslashes(trim($_POST['seokeywords']));
	$seoindexing = $_POST['setindeseo'];
	if($seoindexing == ""){
		$seoindexingvale = "No";
	}else{
		$seoindexingvale = $seoindexing;
	}
	$seopage_url = $_catgoy_parenturl;
	$seoPcknewold = $_POST['pageseochk'];
	if($seoPcknewold == "new"){
        $uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }elseif($seoPcknewold == ""){
    	$uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }else{
        $uploadatevale = "UPDATE seotable SET seo_title='$seoTitle',seo_desrpt='$seodesctrion',seo_keyword='$seokeyword',seo_indexing='$seoindexingvale',seo_imageval='$seo_thnualname',seo_page_name='$seopage_url' WHERE seo_autovale='$seoPcknewold'";
    }
    if(trim($_catgoy_name) == ""){
        echo "<script>alert('Please enter Category Name.');window.location.href='$url/admin-manager/category/';</script>";
    }else{
    $qeryvaleuset = $contdb->query($uploadatevale);

	$auto_idval = uniqid();
	$blankvale = "";
	$cat_rows = "prd_cat_name,prd_cat_slug,prd_cat_prent_categ,prd_cat_auto_id,prd_cat_count,prd_cat_seoauto,prd_cat_postion,prd_cat_imagevale,prd_cat_main_url,prd_cat_hidevale";
	$cat_datarow = "'$_catgoy_name','$_catgoy_sulg_make','$_catgoy_parentid','$auto_idval','$blankvale','$auto_idval','$blankvale','$image_jsondata','$_catgoy_parenturl','1'";
	$add_catagoyvale = GllInsertDataAllTable('product_categories',$cat_rows,$cat_datarow);
	$cat_seo_rows = "seo_title,seo_desrpt,seo_keyword,seo_page_name,seo_autovale,seo_indexing";
	$cat_seo_datarow = "'$_catgoy_seo_title','$_catgoy_seo_desction','$_catgoy_seo_keywod','$_catgoy_sulg_make','$auto_idval','$_catgoy_seo_index'";
	$add_catagoseo = GllInsertDataAllTable('seotable',$cat_seo_rows,$cat_seo_datarow);

	
		echo "<script>alert('Successfully Add');window.location.href='$url/admin-manager/category/';</script>";
    }

}

if(isset($_POST['catgoyaddnewseo'])){
	$_catgoy_mainimg = "catgoy_mainimg";
	$_catgoy_mainimguplod = images_upload($_catgoy_mainimg);
	if($_catgoy_mainimguplod == "0"){
		$_catgoy_mainimgname = "0";
	}else{
		$_catgoy_mainimgname = $_catgoy_mainimguplod;
		move_uploaded_file($_FILES['catgoy_mainimg']['tmp_name'], "$floder_path_name/$_catgoy_mainimguplod");
	}

	$_catgoy_hoverimg = "catgoy_hoverimg";
	$_catgoy_hoverimguplod = images_upload($_catgoy_hoverimg);
	if($_catgoy_hoverimguplod == "0"){
		$_catgoy_hoverimgname = "0";
	}else{
		$_catgoy_hoverimgname = $_catgoy_hoverimguplod;
		move_uploaded_file($_FILES['catgoy_hoverimg']['tmp_name'], "$floder_path_name/$_catgoy_hoverimguplod");
	}

	$image_jsondata = json_encode(array($_catgoy_mainimgname,$_catgoy_hoverimgname));
	$_catgoy_name = addslashes(trim($_POST['catgoy_name']));
	$_catgoy_sulg_make = makeurl($_catgoy_name);
	$_cat_pant_id = explode('|', $_POST['catgoy_parent']);
	$_catgoy_parentid = $_cat_pant_id[0];
	if($_cat_pant_id[1] == ""){
		$_catgoy_parenturl = $_catgoy_sulg_make;
	}else{
		$_catgoy_parenturl = $_cat_pant_id[1].'/'.$_catgoy_sulg_make;
	}
	$_catgoy_seo_title = addslashes(trim($_POST['catgoy_seo_title']));
	$_catgoy_seo_keywod = addslashes(trim($_POST['catgoy_seo_keywor']));
	$_catgoy_seo_index = $_POST['catgoy_seo_indexng'];
	$_catgoy_seo_desction = addslashes(trim($_POST['catgoy_seo_descriptn']));

	$SEO_img = "seimgvale";
	$seo_imguplod = images_upload($SEO_img);
	if($seo_imguplod == "0"){
		$seo_thnualname = $_POST['seimgvalechking'];
	}else{
		$seo_thnualname = $seo_imguplod;
		move_uploaded_file($_FILES['seimgvale']['tmp_name'], "$floder_path_name/$seo_imguplod");
	}
	$randvale = rand();
	$seoTitle = addslashes(trim($_POST['seotitle']));
	$seodesctrion = addslashes(trim($_POST['seodescription']));
	$seokeyword = addslashes(trim($_POST['seokeywords']));
	$seoindexing = $_POST['setindeseo'];
	if($seoindexing == ""){
		$seoindexingvale = "No";
	}else{
		$seoindexingvale = $seoindexing;
	}
	$seopage_url = $_catgoy_parenturl;
	$seoPcknewold = $_POST['pageseochk'];
	if($seoPcknewold == "new"){
        $uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }elseif($seoPcknewold == ""){
    	$uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }else{
        $uploadatevale = "UPDATE seotable SET seo_title='$seoTitle',seo_desrpt='$seodesctrion',seo_keyword='$seokeyword',seo_indexing='$seoindexingvale',seo_imageval='$seo_thnualname',seo_page_name='$seopage_url' WHERE seo_autovale='$seoPcknewold'";
    }

    $qeryvaleuset = $contdb->query($uploadatevale);

	$auto_idval = uniqid();
	$blankvale = "";
	$cat_rows = "prd_cat_name,prd_cat_slug,prd_cat_prent_categ,prd_cat_auto_id,prd_cat_count,prd_cat_seoauto,prd_cat_postion,prd_cat_imagevale,prd_cat_main_url";
	$cat_datarow = "'$_catgoy_name','$_catgoy_sulg_make','$_catgoy_parentid','$auto_idval','$blankvale','$auto_idval','$blankvale','$image_jsondata','$_catgoy_parenturl'";
	$add_catagoyvale = GllInsertDataAllTable('product_categories',$cat_rows,$cat_datarow);
	$cat_seo_rows = "seo_title,seo_desrpt,seo_keyword,seo_page_name,seo_autovale,seo_indexing";
	$cat_seo_datarow = "'$_catgoy_seo_title','$_catgoy_seo_desction','$_catgoy_seo_keywod','$_catgoy_sulg_make','$auto_idval','$_catgoy_seo_index'";
	$add_catagoseo = GllInsertDataAllTable('seotable',$cat_seo_rows,$cat_seo_datarow);

	if($add_catagoseo == true){
		echo "<script>alert('Successfully Add');window.location.href='$url/seo-user/category/';</script>";
	}

}

if(isset($_POST['edit_catgoyvale'])){
	$update_catgoy_img = "editcatgoy_mainimg";
	$update_catgoy_imguplod = images_upload($update_catgoy_img);
	
	$fileinfoCatMainimg = @getimagesize($_FILES["editcatgoy_mainimg"]["tmp_name"]);
    $widthCatMainimg = $fileinfoCatMainimg[0];
    $heightCatMainimg = $fileinfoCatMainimg[1];
    
	if($update_catgoy_imguplod == "0"){
		$update_catgoy_imgname = $_POST['editcatgoy_mainimgchk'];
		$Cat001 = "0";
	}else{
	    if($widthCatMainimg == "120" || $heightCatMainimg == "120") {
	        $update_catgoy_imgname = $update_catgoy_imguplod;
		    move_uploaded_file($_FILES['editcatgoy_mainimg']['tmp_name'], "$floder_path_name/$update_catgoy_imguplod");
		    $Cat001 = "0";
        }else{
		    echo "<script>alert('Image dimension should be within 120X120px');</script>";
            $Cat001 = "1";
        }
	}

	$update_catgoy_hovermg = "editcatgoy_hoverimg";
	$update_catgoy_hoverimguplod = images_upload($update_catgoy_hovermg);
	if($update_catgoy_hoverimguplod == "0"){
		$update_catgoy_hoverimgname = $_POST['editcatgoy_hoverimgchk'];
	}else{
		$update_catgoy_hoverimgname = $update_catgoy_hoverimguplod;
		move_uploaded_file($_FILES['editcatgoy_hoverimg']['tmp_name'], "$floder_path_name/$update_catgoy_hoverimguplod");
	}
	$update_jsoinimg = json_encode(array($update_catgoy_imgname,$update_catgoy_hoverimgname));
	$update_catgoy_name = addslashes(trim($_POST['editcatgoy_name']));
	$update_catgoy_slugval = makeurl($update_catgoy_name);
	$_cat_pant_id = explode('|', $_POST['editcatgoy_parent']);
	$update_catgoy_prent = $_cat_pant_id[0];
	if($_cat_pant_id[1] == ""){
		$_catgoy_parenturl = $update_catgoy_slugval;
	}else{
		$_catgoy_parenturl = $_cat_pant_id[1].'/'.$update_catgoy_slugval;
	}
	$update_catgoy_seotitle = addslashes(trim($_POST['editcatgoy_seo_title']));
	$update_catgoy_keyword = addslashes(trim($_POST['editcatgoy_seo_keywor']));
	$update_catgoy_indexing = $_POST['editcatgoy_seo_indexng'];
	$update_catgoy_desction = addslashes(trim($_POST['editcatgoy_seo_descriptn']));

	$SEO_img = "seimgvale";
	$seo_imguplod = images_upload($SEO_img);
	$fileinfoSeo = @getimagesize($_FILES["seimgvale"]["tmp_name"]);
    $widthSeo = $fileinfoSeo[0];
    $heightSeo = $fileinfoProfile[1];
	if($seo_imguplod == "0"){
		$seo_thnualname = $_POST['seimgvalechking'];
		$Cat002 = "0";
	}else{
	    if($widthSeo == "700" || $heightSeo == "400") {
    		$seo_thnualname = $seo_imguplod;
    		move_uploaded_file($_FILES['seimgvale']['tmp_name'], "$floder_path_name/$seo_imguplod");
    		$Cat002 = "0";
	    }else{
	        echo "<script>alert('Image dimension should be within 700X400px');</script>";
            $Cat002 = "1";
	    }
	}
	$randvale = rand();
	$seoTitle = addslashes(trim($_POST['seotitle']));
	$seodesctrion = addslashes(trim($_POST['seodescription']));
	$seokeyword = addslashes(trim($_POST['seokeywords']));
	$seoindexing = $_POST['setindeseo'];
	if($seoindexing == ""){
		$seoindexingvale = "No";
	}else{
		$seoindexingvale = $seoindexing;
	}
	$seopage_url = $_catgoy_parenturl;
	$seoPcknewold = $_POST['pageseochk'];
	if($seoPcknewold == "new"){
        $uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }elseif($seoPcknewold == ""){
    	$uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }else{
        $uploadatevale = "UPDATE seotable SET seo_title='$seoTitle',seo_desrpt='$seodesctrion',seo_keyword='$seokeyword',seo_indexing='$seoindexingvale',seo_imageval='$seo_thnualname',seo_page_name='$seopage_url' WHERE seo_autovale='$seoPcknewold'";
    }

    $qeryvaleuset = $contdb->query($uploadatevale);

	$update_catgoy_seoid = $_POST['seottabliid'];

	$catgoytablfildes = "prd_cat_name='$update_catgoy_name',prd_cat_slug='$update_catgoy_slugval',prd_cat_prent_categ='$update_catgoy_prent',prd_cat_imagevale='$update_jsoinimg',prd_cat_main_url='$_catgoy_parenturl'";
	$get_update_idval = "id='".$_GET['edit']."'";

	$update_catgoyset = UpdateAllDataFileds("product_categories",$catgoytablfildes,$get_update_idval);

	$catgoyseofildes = "seo_title='$update_catgoy_seotitle',seo_keyword='$update_catgoy_keyword',seo_page_name='$update_catgoy_slugval',seo_indexing='$update_catgoy_indexing',seo_desrpt='$update_catgoy_desction'";
	$get_update_seoid = "id='$update_catgoy_seoid'";

	$update_catgoyset = UpdateAllDataFileds("seotable",$catgoyseofildes,$get_update_seoid);
	if($update_catgoyset == true && $Cat001 == "0" && $Cat002 == "0"){
		echo "<script>alert('Successfully Updated');window.location.href='$url/admin-manager/category/';</script>";
	}
}

if(isset($_POST['edit_catgoyvaleseo'])){
	$update_catgoy_img = "editcatgoy_mainimg";
	$update_catgoy_imguplod = images_upload($update_catgoy_img);
	if($update_catgoy_imguplod == "0"){
		$update_catgoy_imgname = $_POST['editcatgoy_mainimgchk'];
	}else{
		$update_catgoy_imgname = $update_catgoy_imguplod;
		move_uploaded_file($_FILES['editcatgoy_mainimg']['tmp_name'], "$floder_path_name/$update_catgoy_imguplod");
	}

	$update_catgoy_hovermg = "editcatgoy_hoverimg";
	$update_catgoy_hoverimguplod = images_upload($update_catgoy_hovermg);
	if($update_catgoy_hoverimguplod == "0"){
		$update_catgoy_hoverimgname = $_POST['editcatgoy_hoverimgchk'];
	}else{
		$update_catgoy_hoverimgname = $update_catgoy_hoverimguplod;
		move_uploaded_file($_FILES['editcatgoy_hoverimg']['tmp_name'], "$floder_path_name/$update_catgoy_hoverimguplod");
	}
	$update_jsoinimg = json_encode(array($update_catgoy_imgname,$update_catgoy_hoverimgname));
	$update_catgoy_name = addslashes(trim($_POST['editcatgoy_name']));
	$update_catgoy_slugval = makeurl($update_catgoy_name);
	$_cat_pant_id = explode('|', $_POST['editcatgoy_parent']);
	$update_catgoy_prent = $_cat_pant_id[0];
	if($_cat_pant_id[1] == ""){
		$_catgoy_parenturl = $update_catgoy_slugval;
	}else{
		$_catgoy_parenturl = $_cat_pant_id[1].'/'.$update_catgoy_slugval;
	}
	$update_catgoy_seotitle = addslashes(trim($_POST['editcatgoy_seo_title']));
	$update_catgoy_keyword = addslashes(trim($_POST['editcatgoy_seo_keywor']));
	$update_catgoy_indexing = $_POST['editcatgoy_seo_indexng'];
	$update_catgoy_desction = addslashes(trim($_POST['editcatgoy_seo_descriptn']));

	$SEO_img = "seimgvale";
	$seo_imguplod = images_upload($SEO_img);
	if($seo_imguplod == "0"){
		$seo_thnualname = $_POST['seimgvalechking'];
	}else{
		$seo_thnualname = $seo_imguplod;
		move_uploaded_file($_FILES['seimgvale']['tmp_name'], "$floder_path_name/$seo_imguplod");
	}
	$randvale = rand();
	$seoTitle = addslashes(trim($_POST['seotitle']));
	$seodesctrion = addslashes(trim($_POST['seodescription']));
	$seokeyword = addslashes(trim($_POST['seokeywords']));
	$seoindexing = $_POST['setindeseo'];
	if($seoindexing == ""){
		$seoindexingvale = "No";
	}else{
		$seoindexingvale = $seoindexing;
	}
	$seopage_url = $_catgoy_parenturl;
	$seoPcknewold = $_POST['pageseochk'];
	if($seoPcknewold == "new"){
        $uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }elseif($seoPcknewold == ""){
    	$uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }else{
        $uploadatevale = "UPDATE seotable SET seo_title='$seoTitle',seo_desrpt='$seodesctrion',seo_keyword='$seokeyword',seo_indexing='$seoindexingvale',seo_imageval='$seo_thnualname',seo_page_name='$seopage_url' WHERE seo_autovale='$seoPcknewold'";
    }

    $qeryvaleuset = $contdb->query($uploadatevale);

	$update_catgoy_seoid = $_POST['seottabliid'];

	$catgoytablfildes = "prd_cat_name='$update_catgoy_name',prd_cat_slug='$update_catgoy_slugval',prd_cat_prent_categ='$update_catgoy_prent',prd_cat_imagevale='$update_jsoinimg',prd_cat_main_url='$_catgoy_parenturl'";
	$get_update_idval = "id='".$_GET['edit']."'";

	$update_catgoyset = UpdateAllDataFileds("product_categories",$catgoytablfildes,$get_update_idval);

	$catgoyseofildes = "seo_title='$update_catgoy_seotitle',seo_keyword='$update_catgoy_keyword',seo_page_name='$update_catgoy_slugval',seo_indexing='$update_catgoy_indexing',seo_desrpt='$update_catgoy_desction'";
	$get_update_seoid = "id='$update_catgoy_seoid'";

	$update_catgoyset = UpdateAllDataFileds("seotable",$catgoyseofildes,$get_update_seoid);
	if($update_catgoyset == true){
		echo "<script>alert('Successfully Updated');window.location.href='$url/seo-user/category/';</script>";
	}
}

if(isset($_POST['editseocatagorydata'])){
	$SEO_img = "seimgvale";
	$seo_imguplod = images_upload($SEO_img);
	if($seo_imguplod == "0"){
		$seo_thnualname = $_POST['seimgvalechking'];
	}else{
		$seo_thnualname = $seo_imguplod;
		move_uploaded_file($_FILES['seimgvale']['tmp_name'], "$floder_path_name/$seo_imguplod");
	}
	$randvale = rand();
	$seoTitle = addslashes(trim($_POST['seotitle']));
	$seodesctrion = addslashes(trim($_POST['seodescription']));
	$seokeyword = addslashes(trim($_POST['seokeywords']));
	$seoindexing = $_POST['setindeseo'];
	if($seoindexing == ""){
		$seoindexingvale = "No";
	}else{
		$seoindexingvale = $seoindexing;
	}
	$seopage_url = $_POST['pageurvale'];
	$seoPcknewold = $_POST['pageseochk'];
	if($seoPcknewold == "new"){
        $uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }elseif($seoPcknewold == ""){
    	$uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }else{
        $uploadatevale = "UPDATE seotable SET seo_title='$seoTitle',seo_desrpt='$seodesctrion',seo_keyword='$seokeyword',seo_indexing='$seoindexingvale',seo_imageval='$seo_thnualname',seo_page_name='$seopage_url' WHERE seo_autovale='$seoPcknewold'";
    }
    $qeryvaleuset = $contdb->query($uploadatevale);

    if($qeryvaleuset == true){
		echo "<script>alert('Successfully Updated.');</script>";
	}else{
		echo "<script>alert('Please try again.');</script>";
	}
}

if(isset($_POST['home_updatepage'])){
	$_homeadssect = $_POST['home_adssect'];
	foreach($_homeadssect as $valuedataset){
		$setadsval .= $valuedataset.',';
	}
	$hom_additi_title = addslashes(trim($_POST['home_addi_title']));
	$hom_additi_img1 = "hero-uper-img1";
	$hom_additi_img1uplod = images_upload($hom_additi_img1);
	if($hom_additi_img1uplod == "0"){
		$hom_additi_img1name = $_POST['home_addi_image-chking'];
	}else{
		$hom_additi_img1name = $hom_additi_img1uplod;
		move_uploaded_file($_FILES['hero-uper-img1']['tmp_name'], "$floder_path_name/$hom_additi_img1uplod");
	}
	$_hom_addit_conten = addslashes(trim($_POST['home_addi_leftcont']));
	$_hom_addit_setlcaty = $_POST['home_addi_catgy'];
	foreach($_hom_addit_setlcaty as $addl_value){
		$addlicatgoy .= $addl_value.',';
	}
	$alatestarryjson = json_encode(array($hom_additi_title,$hom_additi_img1name,$_hom_addit_conten));
	$_hom_shop_title = addslashes(trim($_POST['home_shopqut_title']));
	$_home_arvil_title = addslashes(trim($_POST['home_arrivl_title']));
	$_home_arrjson = json_encode(array(addslashes(trim($_POST['home_arrivl_btname'])),addslashes(trim($_POST['home_arrivl_btnurl']))));
	$_home_sburitbt = addslashes(trim($_POST['home_subtn_title']));

	$_home_woman_title = addslashes(trim($_POST['home_wocalt_title']));
	$_home_woman_btnarray = json_encode(array(addslashes(trim($_POST['home_wocalt_btnname'])),addslashes(trim($_POST['home_wocalt_btnurl']))));

	$_home_man_title = addslashes(trim($_POST['home_mencalt_title']));
	$_home_man_btnarray = json_encode(array(addslashes(trim($_POST['home_mencalt_btnname'])),addslashes(trim($_POST['home_mencalt_btnurl']))));

	$_home_kids_title = addslashes(trim($_POST['home_kidcalt_title']));
	$_home_kids_btnarray = json_encode(array(addslashes(trim($_POST['home_kidcalt_btnname'])),addslashes(trim($_POST['home_kidcalt_btnurl']))));

	$_home_arts_title = addslashes(trim($_POST['home_artcalt_title']));
	$_home_arts_btnarray = json_encode(array(addslashes(trim($_POST['home_artcalt_btnname'])),addslashes(trim($_POST['home_artcalt_btnurl']))));

	$_home_homecat_title = addslashes(trim($_POST['home_homcalt_title']));
	$_home_homecat_btnarray = json_encode(array(addslashes(trim($_POST['home_homcalt_btnname'])),addslashes(trim($_POST['home_homcalt_btnurl']))));

	$_home_newgll_title = addslashes(trim($_POST['home_newgll_title']));
	$_home_newgll_btnarray = json_encode(array(addslashes(trim($_POST['home_newgll_btnname'])),addslashes(trim($_POST['home_newgll_btnurl']))));

	$_home_tv_title = addslashes(trim($_POST['home_tvgll_title']));
	$_home_tv_btnarray = json_encode(array(addslashes(trim($_POST['home_tvgll_btnname'])),addslashes(trim($_POST['home_tvgll_btnurl']))));

	$hom_gllsect_img1 = "home_gllsect_imag";
	$hom_gllsect_img1uplod = images_upload($hom_gllsect_img1);
	if($hom_gllsect_img1uplod == "0"){
		$hom_gllsect_img1name = $_POST['home_gllsect_imag_chking'];
	}else{
		$hom_gllsect_img1name = $hom_gllsect_img1uplod;
		move_uploaded_file($_FILES['home_gllsect_imag']['tmp_name'], "$floder_path_name/$hom_gllsect_img1uplod");
	}
	$_home_gllset_content = addslashes(trim($_POST['home_gllsect_contetn']));
	$hom_gllsect_img2 = "home_gllsect_imag2";
	$hom_gllsect_img2uplod = images_upload($hom_gllsect_img2);
	if($hom_gllsect_img2uplod == "0"){
		$hom_gllsect_img2name = $_POST['home_gllsect_imag2chking'];
	}else{
		$hom_gllsect_img2name = $hom_gllsect_img2uplod;
		move_uploaded_file($_FILES['home_gllsect_imag2']['tmp_name'], "$floder_path_name/$hom_gllsect_img2uplod");
	}
	$_home_gllsectionarray = json_encode(array($hom_gllsect_img1name,$hom_gllsect_img2name));
	$_home_instagm_contetn = json_encode(array(addslashes(trim($_POST['home_instgm_title'])),$_POST['home_instgm_noofpost']));

	$SEO_img = "seimgvale";
	$seo_imguplod = images_upload($SEO_img);
	if($seo_imguplod == "0"){
		$seo_thnualname = $_POST['seimgvalechking'];
	}else{
		$seo_thnualname = $seo_imguplod;
		move_uploaded_file($_FILES['seimgvale']['tmp_name'], "$floder_path_name/$seo_imguplod");
	}
	$randvale = rand();
	$seoTitle = addslashes(trim($_POST['seotitle']));
	$seodesctrion = addslashes(trim($_POST['seodescription']));
	$seokeyword = addslashes(trim($_POST['seokeywords']));
	$seoindexing = $_POST['setindeseo'];
	if($seoindexing == ""){
		$seoindexingvale = "No";
	}else{
		$seoindexingvale = $seoindexing;
	}
	$seopage_url = "home-page";
	$seoPcknewold = $_POST['pageseochk'];
	if($seoPcknewold == "new"){
        $uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }elseif($seoPcknewold == ""){
    	$uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }else{
        $uploadatevale = "UPDATE seotable SET seo_title='$seoTitle',seo_desrpt='$seodesctrion',seo_keyword='$seokeyword',seo_indexing='$seoindexingvale',seo_imageval='$seo_thnualname',seo_page_name='$seopage_url' WHERE seo_autovale='$seoPcknewold'";
    }

    $qeryvaleuset = $contdb->query($uploadatevale);

	$update_datafiled = "hom_adsdata='$setadsval',hom_latstadsion='$alatestarryjson',hom_latst_catagoy='$addlicatgoy',hom_showimage='$_hom_shop_title',hom_newarvil='$_home_arvil_title',hom_newarvil_produt='$_home_arrjson',hom_subrtion='$_home_sburitbt',hom_womancal='$_home_woman_title',hom_woman_catgy='$_home_woman_btnarray',hom_mencal='$_home_man_title',hom_man_catgroy='$_home_man_btnarray',hom_kidscatgy='$_home_kids_title',hom_kids_catgoy='$_home_kids_btnarray',hom_artscat='$_home_arts_title',hom_arts_catgoy='$_home_arts_btnarray',hom_homelingcat='$_home_homecat_title',hom_homeliv_cat='$_home_homecat_btnarray',hom_gllnews_title='$_home_newgll_title',hom_gllnews_catgy='$_home_newgll_btnarray',hom_gll_tv_title='$_home_tv_title',hom_gll_tv_catgy='$_home_tv_btnarray',hom_gallery_image='$_home_gllsectionarray',hom_gallerytext='$_home_gllset_content',hom_instastatus='$_home_instagm_contetn'";
	
	$_getupdateid = "hom_auto_id='".$_GET['ut']."' AND hom_id_page='".$_GET['page-id']."'";
	$updatehomevale = UpdateAllDataFileds("home_tabelpagecont",$update_datafiled,$_getupdateid);
	if($updatehomevale == true){
		echo "<script>alert('Successfully Updated');window.location.href='$url/admin-manager/edit-page/?page-id=".$_GET['page-id']."&ut=".$_GET['ut']."';</script>";
	}
}

if(isset($_POST['EditVendorBtn'])){
	$get_vesnor_id = $_GET['id'];
	$vensor_prfileimg = "vend_prilfe";
	$vensor_prfileimguplod = images_upload($vensor_prfileimg);
	$fileinfoProfile = @getimagesize($_FILES["vend_prilfe"]["tmp_name"]);
    $widthProfile = $fileinfoProfile[0];
    $heightProfile = $fileinfoProfile[1];
	if($vensor_prfileimguplod == "0"){
		$vensor_prfileimgname = $_POST['vend_prilfe_chking'];
		$msg001 = "0";
	}else{
	    if($widthProfile == "200" || $heightProfile == "200") {
    		$vensor_prfileimgname = $vensor_prfileimguplod;
    		move_uploaded_file($_FILES['vend_prilfe']['tmp_name'], "$floder_path_name/$vensor_prfileimguplod");
    		$msg001 = "0";
    	}else{
    	    echo "<script>alert('Image dimension should be within 200X200px');</script>";
    	    $msg001 = "1";
    	}
	}
	$vnsorst_addrs = $_POST['vend_smalcity'].', '.$_POST['vend_smalcountcode'];
	if($_POST['vend_storeurl'] == ""){
		$amke_url = makeurl(addslashes(trim($_POST['vend_fname'])).'-'.addslashes(trim($_POST['vend_lname'])));
	}else{
		$amke_url = $_POST['vend_storeurl'];
	}

	$SEO_img = "seimgvale";
	$seo_imguplod = images_upload($SEO_img);
	$fileinfoSeo = @getimagesize($_FILES["seimgvale"]["tmp_name"]);
    $widthSeo = $fileinfoSeo[0];
    $heightSeo = $fileinfoProfile[1];
	if($seo_imguplod == "0"){
		$seo_thnualname = $_POST['seimgvalechking'];
		$msg002 = "0";
	}else{
	    if($widthSeo == "700" || $heightSeo == "400") {
    		$seo_thnualname = $seo_imguplod;
    		move_uploaded_file($_FILES['seimgvale']['tmp_name'], "$floder_path_name/$seo_imguplod");
        		$msg002 = "0";
    	}else{
    	    echo "<script>alert('Image dimension should be within 700X400px');</script>";
    	    $msg002 = "1";
    	}
	}
    
	$randvale = rand();
	$seoTitle = addslashes(trim($_POST['seotitle']));
	$seodesctrion = addslashes(trim($_POST['seodescription']));
	$seokeyword = addslashes(trim($_POST['seokeywords']));
	$seoindexing = $_POST['setindeseo'];
	if($seoindexing == ""){
		$seoindexingvale = "No";
	}else{
		$seoindexingvale = $seoindexing;
	}
	$seopage_url = $amke_url;
	$seoPcknewold = $_POST['pageseochk'];
	if($seoPcknewold == "new"){
        $uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }elseif($seoPcknewold == ""){
    	$uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }else{
        $uploadatevale = "UPDATE seotable SET seo_title='$seoTitle',seo_desrpt='$seodesctrion',seo_keyword='$seokeyword',seo_indexing='$seoindexingvale',seo_imageval='$seo_thnualname',seo_page_name='$seopage_url' WHERE seo_autovale='$seoPcknewold'";
    }

    $qeryvaleuset = $contdb->query($uploadatevale);
	
	$update_profile = UpdateAllDataFileds("vendor","vendor_f_name='".addslashes(trim($_POST['vend_fname']))."',vendor_l_name='".addslashes(trim($_POST['vend_lname']))."',vendor_uni_name='$amke_url',vendor_company='".addslashes(trim($_POST['vend_compname']))."',vendor_email='".addslashes(trim($_POST['vend_emailid']))."',vendor_phone='".addslashes(trim($_POST['vend_phone']))."',vendor_url='".addslashes(trim($_POST['vend_website']))."',vendor_img='$vensor_prfileimgname',vendor_commi_type='".$_POST['admincomty']."',vendor_commi_val='".$_POST['vend_admincomision']."',vendor_address='".addslashes(trim($_POST['vend_addrss']))."',vendor_st_address='$vnsorst_addrs',vendor_city='".addslashes(trim($_POST['vend_city']))."',vendor_state='".addslashes(trim($_POST['vend_statecode']))."',vendor_zipcode='".addslashes(trim($_POST['vend_zipcode']))."',vendor_country='".addslashes(trim($_POST['vend_country']))."'","vendor_auto='$get_vesnor_id'");
	$vendor_statusval = $_POST['vend_status'];
	if($vendor_statusval == ""){
		$vnosrstautnum = "0";
	}else{
		$vnosrstautnum = $vendor_statusval;
	}
	$venodr_proststut = $_POST['vend_profilests'];
	if($venodr_proststut == ""){
		$vensor_protvale = "1";
	}else{
		$vensor_protvale = $venodr_proststut;
	}
	$bannerstus = $_POST['vend_uplbanner'];
	if($bannerstus == ""){
		$bannername = "no";
	}else{
		$bannername = $bannerstus;
	}
	if($_POST['vend_uplopropic'] == ""){
		$profilepick = "no";
	}else{
		$profilepick = $_POST['vend_uplopropic'];
	}
	if($_POST['vend_abotedit'] == ""){
		$aboutedit = "no";
	}else{
		$aboutedit = $_POST['vend_abotedit'];
	}
	if($_POST['vend_shpiedit'] == ""){
		$shppingval = "no";
	}else{
		$shppingval = $_POST['vend_shpiedit'];
	}
	if($_POST['vend_peronedit'] == ""){
		$perofilfile = "no";
	}else{
		$perofilfile = $_POST['vend_peronedit'];
	}

	$update_permission = UpdateAllDataFileds("userpermission","user_p_email_ap='$vnosrstautnum',user_p_block='$vensor_protvale',user_banner='$bannername',user_profilepic='$profilepick',user_aboutval='$aboutedit',user_shhpinval='$shppingval',user_addresedt='$perofilfile'","user_p_id='$get_vesnor_id'");
	$chking_newcust = "SELECT * FROM about_me WHERE uid='$get_vesnor_id'";
	$query_vale = $contdb->query($chking_newcust);
	if($query_vale->num_rows > 0){
		$Update_aboutensor = UpdateAllDataFileds("about_me","about_content='".addslashes(trim($_POST['vend_about']))."'","uid='$get_vesnor_id'");
	}else{
		$aboucontval = addslashes(trim($_POST['vend_about']));
		$rowname_about = "uid,type,about_content,submitDate,submitTime";
		$rowvalues_about = "'$get_vesnor_id','vendor','$aboucontval','$date','$time'";
		$insert_aboutvale = GllInsertDataAllTable("about_me",$rowname_about,$rowvalues_about);
	}
	$chkincondt = "SELECT * FROM termsCondition WHERE uid='$get_vesnor_id'";
	$query_chk_tream = $contdb->query($chkincondt);
	if($query_chk_tream->num_rows > 0){
		$Update_shpingval = UpdateAllDataFileds("termsCondition","terms='".addslashes(trim($_POST['vend_shppingval']))."'","uid='$get_vesnor_id'");
	}else{
		$trim_contvale = addslashes(trim($_POST['vend_shppingval']));
		$rowname_trm = "uid,type,terms,submitDate,submitTime";
		$rowvalues_trm = "'$get_vesnor_id','vendor','$trim_contvale','$date','$time'";
		$trim_insetvale = GllInsertDataAllTable("termsCondition",$rowname_trm,$rowvalues_trm);
	}
	$updatelogintable = UpdateAllDataFileds("userlogntable","user_email='".addslashes(trim($_POST['vend_emailid']))."'","user_auto='$get_vesnor_id'");
	$vensor_bannerimg = "vend_banner";
	$vensor_bannerimguplod = images_upload($vensor_bannerimg);
	$fileinfoVenBanner = @getimagesize($_FILES["vend_banner"]["tmp_name"]);
    $widthVenBanner = $fileinfoVenBanner[0];
    $heightVenBanner = $fileinfoVenBanner[1];
	if($vensor_bannerimguplod == "0"){
		$vensor_bannerimgname = $_POST['vend_banner_chking'];
		$msg003 = "0";
	}else{
	    if($widthSeo == "1600" || $heightSeo == "533") {
    		$vensor_bannerimgname = $vensor_bannerimguplod;
    		move_uploaded_file($_FILES['vend_banner']['tmp_name'], "$floder_path_name/$vensor_bannerimguplod");
    		$msg003 = "0";
	    }else{
    	    echo "<script>alert('Image dimension should be within 1600X533px');</script>";
    	    $msg003 = "1";
    	}
	}
    
	$banner_upload = UpdateBannerDataVal($vensor_bannerimgname,$get_vesnor_id);
	if($banner_upload == true && $msg001 == "0" && $msg002 == "0" && $msg003 == "0"){
		echo "<script>alert('Successfully Updated');</script>";
	}
}

if(isset($_POST['editseovendordata'])){
	$SEO_img = "seimgvale";
	$seo_imguplod = images_upload($SEO_img);
	if($seo_imguplod == "0"){
		$seo_thnualname = $_POST['seimgvalechking'];
	}else{
		$seo_thnualname = $seo_imguplod;
		move_uploaded_file($_FILES['seimgvale']['tmp_name'], "$floder_path_name/$seo_imguplod");
	}
	$randvale = rand();
	$seoTitle = addslashes(trim($_POST['seotitle']));
	$seodesctrion = addslashes(trim($_POST['seodescription']));
	$seokeyword = addslashes(trim($_POST['seokeywords']));
	$seoindexing = $_POST['setindeseo'];
	if($seoindexing == ""){
		$seoindexingvale = "No";
	}else{
		$seoindexingvale = $seoindexing;
	}
	$seopage_url = $_POST['stroeurl'];
	$seoPcknewold = $_POST['pageseochk'];
	if($seoPcknewold == "new"){
        $uploadatevaleseo = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }elseif($seoPcknewold == ""){
    	$uploadatevaleseo = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }else{
        $uploadatevaleseo = "UPDATE seotable SET seo_title='$seoTitle',seo_desrpt='$seodesctrion',seo_keyword='$seokeyword',seo_indexing='$seoindexingvale',seo_imageval='$seo_thnualname',seo_page_name='$seopage_url' WHERE seo_autovale='$seoPcknewold'";
    }
    $qeryvaleusetseo = $contdb->query($uploadatevaleseo);
    if($qeryvaleusetseo == true){
    	echo "<script>alert('Successfully Updated.');</script>";
    }else{
    	echo "<script>alert('Please try again.');</script>";
    }
}

if(isset($_POST['resetvendorpassword'])){
	$_paasword_postget = $_GET['id'];
	if(addslashes(trim($_POST['vend_newpass'])) == addslashes(trim($_POST['vend_newpass2']))){
		$new_passwordval = addslashes(trim(MD5($_POST['vend_newpass'])));
		$update_assword = UpdateAllDataFileds("userlogntable","user_password='$new_passwordval'","user_auto='$_paasword_postget'");
		if($update_assword == true){
			echo "<script>alert('Successfully Reset Password.');</script>";
		}
	}else{
		echo "<script>alert('Your retype password not match your new password.');</script>";
	}
}

if(isset($_POST['tvnews_btn'])){
	$_tvnes_title = addslashes(trim($_POST['tvnews_title']));
	$make_tvurl = makeurl($_tvnes_title);
	$_tvnes_thnual = 'tvnews_thunal';
	$_tvnes_thnualuplod = images_upload($_tvnes_thnual);
	if($_tvnes_thnualuplod == "0"){
		$_tvnes_thnualname = "0";
	}else{
		$_tvnes_thnualname = $_tvnes_thnualuplod;
		move_uploaded_file($_FILES['tvnews_thunal']['tmp_name'], "$floder_path_name/$_tvnes_thnualuplod");
	}
	$_tvnes_video = addslashes(trim($_POST['tvnews_video']));
	$_tvnes_contetn = addslashes(trim($_POST['tvnews_contetn']));
	$_tvnes_status = $_POST['tvnews_status'];
	$_get_action = $_GET['action'];

	$insert_tvnews = GllInsertDataAllTable("gllnewstv_section","tvnews_title,tvnews_thunal,tvnews_contetn,tvnews_video,tvnews_type,tvnews_date,tvnews_time,tvnews_status,tvnewsval_url","'".$_tvnes_title."','".$_tvnes_thnualname."','".$_tvnes_contetn."','".$_tvnes_video."','".$_get_action."','".$date."','".$time."','".$_tvnes_status."','".$make_tvurl."'");
	if($insert_tvnews == true){
		echo "<script>alert('Successfully Add');window.location.href='$url/admin-manager/all-gll-tv/?action=".$_GET['action']."';</script>";
	}
}

if(isset($_POST['edit_tvnes_btn'])){
	$edit_image_valedat = "edit_tvnes_img";
	$edit_tvnes_thnualuplod = images_upload($edit_image_valedat);
	if($edit_tvnes_thnualuplod == "0"){
		$edit_tvnes_thnualname = $_POST['edit_tvnes_imgchk'];
	}else{
		$edit_tvnes_thnualname = $edit_tvnes_thnualuplod;
		move_uploaded_file($_FILES['edit_tvnes_img']['tmp_name'], "$floder_path_name/$edit_tvnes_thnualuplod");
	}
	$update_dataal = UpdateAllDataFileds("gllnewstv_section","tvnews_title='".addslashes(trim($_POST['edit_tvnes_title']))."',tvnews_thunal='$edit_tvnes_thnualname',tvnews_contetn='".addslashes(trim($_POST['edit_tvnes_contet']))."',tvnews_video='".addslashes(trim($_POST['edit_tvnes_video']))."',tvnews_status='".$_POST['edit_tvnes_status']."',tvnewsval_url='".makeurl(addslashes(trim($_POST['edit_tvnes_title'])))."'","id='".$_GET['edit']."' AND tvnews_type='".$_GET['action']."'");
	if($update_dataal == true){
		echo "<script>alert('Successfully Updated');window.location.href='$url/admin-manager/gll-tv/?action=".$_GET['action']."&edit=".$_GET['edit']."';</script>";
	}
}

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
    		move_uploaded_file($_FILES['prodtmainimg']['tmp_name'], "$floder_path_name/$product_imguplod");
    		$Prod_006 = "0";
	    }else{
            echo "<script>alert('Image dimension should be within 720X720px.');</script>";
            $Prod_006 = "1";
        }
	}
    $shortdata = addslashes($_POST['shordest']);
    if(!empty($shortdata)){
        $Prod_002 == "0";
    }else{
        echo "<script>alert('Your Short Description Required.');</script>";
        $Prod_002 == "1";
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

    $SEO_img = "seimgvale";
	$seo_imguplod = images_upload($SEO_img);
	$fileinfoSeo = @getimagesize($_FILES["seimgvale"]["tmp_name"]);
    $widthSeo = $fileinfoSeo[0];
    $heightSeo = $fileinfoProfile[1];
	if($seo_imguplod == "0"){
		$seo_thnualname = $_POST['seimgvalechking'];
		$Prod_005 == "0";
	}else{
	    if($widthSeo == "700" || $heightSeo == "400") {
    		$seo_thnualname = $seo_imguplod;
    		move_uploaded_file($_FILES['seimgvale']['tmp_name'], "$floder_path_name/$seo_imguplod");
    		$Prod_005 = "0";
	    }else{
            echo "<script>alert('Image dimension should be within 700X400px');</script>";
            $Prod_005 = "1";
        }
	}
	$randvale = rand();
	$seoTitle = addslashes(trim($_POST['seotitle']));
	$seodesctrion = addslashes(trim($_POST['seodescription']));
	$seokeyword = addslashes(trim($_POST['seokeywords']));
	$seoindexing = $_POST['setindeseo'];
	if($seoindexing == ""){
		$seoindexingvale = "No";
	}else{
		$seoindexingvale = $seoindexing;
	}
	$seopage_url = $prodaddpagename;
	$seoPcknewold = $_POST['pageseochk'];
	if($seoPcknewold == "new"){
        $uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }elseif($seoPcknewold == ""){
    	$uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }else{
        $uploadatevale = "UPDATE seotable SET seo_title='$seoTitle',seo_desrpt='$seodesctrion',seo_keyword='$seokeyword',seo_indexing='$seoindexingvale',seo_imageval='$seo_thnualname',seo_page_name='$seopage_url' WHERE seo_autovale='$seoPcknewold'";
    }
    if(trim($prodtaddname) == ""){
        echo "<script>alert('Please fill Product Name.');</script>";
    }else{
        if(trim($shortdata) == ""){
            echo "<script>alert('Please fill Short Description.');</script>";
        }else{
            if(trim($prodtaddsku) == ""){
                echo "<script>alert('Please fill SKU.');</script>";
            }else{
                // if(trim($prodtaddregprice) == ""){
                //     echo "<script>alert('Please fill Regular Price.');</script>";
                // }else{
                    $qeryvaleuset = $contdb->query($uploadatevale);
                    $lowminholdmain = $_POST['prodminthold'];
                    $update_datafiled = "product_vender_id='$venderdataadd',product_name='$chkingprodname',product_link='$prodtaddlink',product_page_name='$prodaddpagename',product_destion='$prodtadddest',product_short_des='$shortdata',product_regular_price='$prodtaddregprice',product_sale_price='$prodtaddsalprice',product_catger='$product_url',product_catger_ids='$prodtcat_val',product_stock='$prodtaddstock',product_sku='$prodtaddsku',product_image='$edit_tvnes_thnualname',product_date='$date',product_time='$time',product_status='1',product_discount='$discountvale',product_dis_type='$product_dis_type',product_approve_stmp='1',product_shppin_domst='$shippingratesdest',product_shppin_inters='$shippingratesint',product_recomateprd='$recomadepd',product_min_price='$lowminholdmain'";
                    $_getupdateid = "id='".$_GET['pageid']."' AND product_auto_id='".$_GET['autoid']."'";
                    $insert_data = UpdateAllDataFileds("all_product",$update_datafiled,$_getupdateid);
                    if($insert_data == true){
                        echo "<script>alert('$pagename');</script>";
                    }
                // }
            }
        }
    }
}

if(isset($_POST['editseoproductdata'])){

	$SEO_img = "seimgvale";
	$seo_imguplod = images_upload($SEO_img);
	if($seo_imguplod == "0"){
		$seo_thnualname = $_POST['seimgvalechking'];
	}else{
		$seo_thnualname = $seo_imguplod;
		move_uploaded_file($_FILES['seimgvale']['tmp_name'], "$floder_path_name/$seo_imguplod");
	}
	$randvale = rand();
	$seoTitle = addslashes(trim($_POST['seotitle']));
	$seodesctrion = addslashes(trim($_POST['seodescription']));
	$seokeyword = addslashes(trim($_POST['seokeywords']));
	$seoindexing = $_POST['setindeseo'];
	if($seoindexing == ""){
		$seoindexingvale = "No";
	}else{
		$seoindexingvale = $seoindexing;
	}
	$seopage_url = $_POST['pageprodval'];
	$seoPcknewold = $_POST['pageseochk'];
	if($seoPcknewold == "new"){
        $uploadatevaleseo = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }elseif($seoPcknewold == ""){
    	$uploadatevaleseo = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }else{
        $uploadatevaleseo = "UPDATE seotable SET seo_title='$seoTitle',seo_desrpt='$seodesctrion',seo_keyword='$seokeyword',seo_indexing='$seoindexingvale',seo_imageval='$seo_thnualname',seo_page_name='$seopage_url' WHERE seo_autovale='$seoPcknewold'";
    }

    $seoprodtpage = $contdb->query($uploadatevaleseo);
	if($seoprodtpage == true){
		echo "<script>alert('Successfully Updated.');</script>";
	}else{
		echo "<script>alert('Please try again.');</script>";
	}
}

if(isset($_POST['coupengent'])){

    $coupantype = $_POST['coupantype'];
    $coupansingvendor = $_POST['coupanvenodr'];
    $coupanvendorid = $_POST['coupanvendorid'];
    $coupanamount = $_POST['coupanamout'];
    $coupansdate = $_POST['coupansdate'];
    $coupanedate = $_POST['coupanedate'];
    $coupanname = $_POST['coupanename'];
    $noofusecoup = $_POST['coupannoofuse'];
    $date = date('Y/m/d');
    $time = date('h:i A');

    $insertdata = createcoupons($noofusecoup,$coupantype,$coupansingvendor,$coupanvendorid,$coupanamount,$date,$time,$coupansdate,$coupanedate,$coupanname);

    if($insertdata == true){
        echo "<script>alert('Successfully Add.');</script>";
    }else{
        echo "<script>alert('Please Try Again.');</script>";
    }
}

if(isset($_POST['add-page-menu'])){
	$getpaename = explode('|', $_POST['page-menudata']);
	$page_id = $getpaename[0];
	$page_Sulg = $getpaename[1];
	$page_name = $getpaename[2];
	$get_urldat = $_GET['menu-name'];
    if($page_name == ""){}else{
    	$rowname = "menu_id,menu_name,menu_url,menu_typename";
    	$rowvalues = "'$page_id','$page_name','$page_Sulg','$get_urldat'";
    	$insertpage = GllInsertDataAllTable("menudatatable",$rowname,$rowvalues);
    	if($insertpage == true){
    		echo "<script>alert('Successfully Add2.');window.location.href='$url/admin-manager/menu/?menu-name=header';</script>";
    	}else{
    		echo "<script>alert('Please Try Again.');window.location.href='$url/admin-manager/menu/?menu-name=header';</script>";
    	}
    }
}

if(isset($_POST['add-page-catgoy'])){
	$cat_pagename = explode('|', $_POST['page-catgoy']);
	$cat_ids = $cat_pagename[0];
	$cat_pgname = $cat_pagename[1];
	$cat_page_url = $cat_pagename[2];
	$get_urldat = $_GET['menu-name'];

	$cat_rowname = "menu_id,menu_name,menu_url,menu_typename";
	$cat_rowvalues = "'$cat_ids','$cat_pgname','$cat_page_url','$get_urldat'";
	$insertcatpage = GllInsertDataAllTable("menudatatable",$cat_rowname,$cat_rowvalues);
	if($insertcatpage == true){
		echo "<script>alert('Successfully Add.');window.location.href='$url/admin-manager/menu/?menu-name=header';</script>";
	}else{
		echo "<script>alert('Please Try Again.');window.location.href='$url/admin-manager/menu/?menu-name=header';</script>";
	}
}

if(isset($_POST['addcustom-link'])){
	$custmlink_url = addslashes(trim($_POST['custmenu-url']));
	$custmlink_name = addslashes(trim($_POST['custmenu-text']));
	$get_urldat = $_GET['menu-name'];
	$unqli_id = uniqid();
    if($custmlink_url == "" && $custmlink_name == ""){
        echo "<script>alert('Please fill URL and Name.');</script>";
    }else{
    	$custom_rowname = "menu_id,menu_name,menu_url,menu_typename";
    	$custom_rowvalues = "'$unqli_id','$custmlink_name','$custmlink_url','$get_urldat'";
    	$insertcustompage = GllInsertDataAllTable("menudatatable",$custom_rowname,$custom_rowvalues);
    	if($insertcustompage == true){
    		echo "<script>alert('Successfully Add.');</script>";
    	}else{
    		echo "<script>alert('Please Try Again.');</script>";
    	}
    }
}

if(isset($_POST['forpassdata'])){
  $email_cehck = $_POST['email'];
  $cehck_value = cechkandmail($email_cehck);
  if($cehck_value == true){
    echo "<script>alert('Check Your Email');</script>";
  }else{
    echo "<script>alert('Please Try Again. Your Email Id is not in our database.');</script>";
  }
}

if(isset($_POST['customer'])){

	$fname = trim($_POST['Firstname']);

	$lname = trim($_POST['lname']);

	$email = trim($_POST['emailid']);

	$password = MD5($_POST['password']);

	if(isset($_POST['page-validate'])){
		$_post_checkout = "checkout";
	}else{
		$_post_checkout = "0";
	}

	if($fname != "" || $lname != "" || $email != "" || $password != ""){

	$compny = $_POST['Comname'];

	$website_url = $_POST['weburl'];

	$singlvednname = str_replace(" ","-", $fname);

	$singlvedlast = str_replace(" ","-", $lname);

	$sing_val_data = $singlvednname.'-'.$singlvedlast;



	$auto_num = uniqid();

	$singlauto = $auto_num.$email;

	$shaffauto = str_shuffle($singlauto);

	$cehck_email = "SELECT * FROM userlogntable WHERE user_email='$email'";

	$cehkquery = mysqli_query($contdb, $cehck_email);

	if(mysqli_num_rows($cehkquery)){
		$youwnt = "you'd";
		if($_post_checkout == "checkout"){
			echo "<script>alert('Please use another email address if you would like to create a new account.');window.location.href='$url/checkout-login/'</script>";
		}else{
			echo "<script>alert('Please use another email address if would like to create a new account.');window.location.href='$url/register/'</script>";
		}
	}else{

		$checkname = "SELECT * FROM customer WHERE customer_name_url='$sing_val_data'";

		$query_namecehck = mysqli_query($contdb,$checkname);

		if(mysqli_num_rows($query_namecehck)){

			/*echo "<span class='red'></span>";*/
			if($_post_checkout == "checkout"){
				echo "<script>alert('This User Name Already Used Please Try to again different User Name.');window.location.href='$url/checkout-login/'</script>";
			}else{
				echo "<script>alert('This User Name Already Used Please Try to again different User Name.');window.location.href='$url/register/'</script>";
			}

		}else{

			$vendorinsert = "INSERT INTO userlogntable(user_first_name,user_email,user_lastname,user_password,user_session_id,user_cookies,user_type,user_status,user_auto)VALUES('$fname','$email','$lname','$password','0','0','customer','0','$shaffauto')";

			$vendor_login = mysqli_query($contdb, $vendorinsert);



			$vendorall = "INSERT INTO customer(customer_fname,customer_lname,customer_name_url,customer_ui_id,customer_img,customer_address,customer_gender,customer_age,customer_phone,customer_auto,customer_date,customer_time,customer_active)VALUES('$fname','$lname','$sing_val_data','$shaffauto','0','0','0','0','0','$auto_num','$date','$time','1')";

			$venderquery = mysqli_query($contdb, $vendorall);

			if($vendor_login == true){

				if($_post_checkout == "checkout"){
					session_start();
					include_once('phpmailer/customer-email.php');
					echo "<script>window.location.href='$url/checkout/';</script>";
					$_SESSION['customersessionlogin']=$shaffauto;
				}else{
					session_start();
					include_once('phpmailer/customer-email.php');
					echo "<script>alert('You are now an official Buyjee customer. Thank you!.');window.location.href='$url/';</script>";
					$_SESSION['customersessionlogin']=$shaffauto;
				}
			}
		}
	}
	}else{
		if($_post_checkout == "checkout"){
			echo "<script>alert('Please Fill Form Properly.');window.location.href='$url/checkout-login/';</script>";
		}else{
			echo "<script>alert('Please Fill Form Properly.');window.location.href='$url/register/';</script>";
		}
	}
}

if(isset($_POST['edit-min-page'])){
	$url_change_val = addslashes(trim($_POST['edit-min-title']));
	$make_urlval = makeurl($url_change_val);
	$contval = addslashes(trim($_POST['edit-min-cont']));
	$customlik = $_POST['edit-min-custlink'];
	$stauvsal = $_POST['edit-min-status'];
	$get_pageid = $_GET['page-id'];
	$get_auttiid = $_GET['ut'];

	$SEO_img = "seimgvale";
	$seo_imguplod = images_upload($SEO_img);
	if($seo_imguplod == "0"){
		$seo_thnualname = $_POST['seimgvalechking'];
	}else{
		$seo_thnualname = $seo_imguplod;
		move_uploaded_file($_FILES['seimgvale']['tmp_name'], "$floder_path_name/$seo_imguplod");
	}
	$randvale = rand();
	$seoTitle = addslashes(trim($_POST['seotitle']));
	$seodesctrion = addslashes(trim($_POST['seodescription']));
	$seokeyword = addslashes(trim($_POST['seokeywords']));
	$seoindexing = $_POST['setindeseo'];
	if($seoindexing == ""){
		$seoindexingvale = "No";
	}else{
		$seoindexingvale = $seoindexing;
	}
	$seopage_url = $make_urlval;
	$seoPcknewold = $_POST['pageseochk'];
	if($seoPcknewold == "new"){
        $uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }elseif($seoPcknewold == ""){
    	$uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }else{
        $uploadatevale = "UPDATE seotable SET seo_title='$seoTitle',seo_desrpt='$seodesctrion',seo_keyword='$seokeyword',seo_indexing='$seoindexingvale',seo_imageval='$seo_thnualname',seo_page_name='$seopage_url' WHERE seo_autovale='$seoPcknewold'";
    }

    $qeryvaleuset = $contdb->query($uploadatevale);

	$updateval = "page_name='$url_change_val',page_slug='$make_urlval',page_content='$contval',page_cst_link='$customlik',page_status='$stauvsal',page_brcomimg='0'";
	$updatewhere = "id='$get_pageid' AND page_unqi_id='$get_auttiid'";
	$updatesta = UpdateAllDataFileds('all_pagestable',$updateval,$updatewhere);
	if($updatesta == true){
		echo "<script>alert('Successfully Updated.');</script>";
	}else{
		echo "<script>alert('Please try again.');</script>";
	}
}

if(isset($_POST['editseopagedata'])){
	$SEO_img = "seimgvale";
	$seo_imguplod = images_upload($SEO_img);
	if($seo_imguplod == "0"){
		$seo_thnualname = $_POST['seimgvalechking'];
	}else{
		$seo_thnualname = $seo_imguplod;
		move_uploaded_file($_FILES['seimgvale']['tmp_name'], "$floder_path_name/$seo_imguplod");
	}
	$randvale = rand();
	$seoTitle = addslashes(trim($_POST['seotitle']));
	$seodesctrion = addslashes(trim($_POST['seodescription']));
	$seokeyword = addslashes(trim($_POST['seokeywords']));
	$seoindexing = $_POST['setindeseo'];
	if($seoindexing == ""){
		$seoindexingvale = "No";
	}else{
		$seoindexingvale = $seoindexing;
	}
	$seopage_url = $_POST['geturlval'];
	$seoPcknewold = $_POST['pageseochk'];
	if($seoPcknewold == "new"){
        $uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }elseif($seoPcknewold == ""){
    	$uploadatevale = "INSERT INTO seotable(seo_title,seo_desrpt,seo_keyword,seo_indexing,seo_imageval,seo_autovale,seo_page_name)VALUES('$seoTitle','$seodesctrion','$seokeyword','$seoindexingvale','$seo_thnualname','$randvale','$seopage_url')";
    }else{
        $uploadatevale = "UPDATE seotable SET seo_title='$seoTitle',seo_desrpt='$seodesctrion',seo_keyword='$seokeyword',seo_indexing='$seoindexingvale',seo_imageval='$seo_thnualname',seo_page_name='$seopage_url' WHERE seo_autovale='$seoPcknewold'";
    }
    $qeryvaleuset = $contdb->query($uploadatevale);
    if($qeryvaleuset == true){
		echo "<script>alert('Successfully Updated.');</script>";
	}else{
		echo "<script>alert('Please try again.');</script>";
	}
}

if(isset($_POST['mainsearch'])){
	$explode_valeset = addslashes(trim($_POST['mainsearch']));
	$explode_vale = makeurl($explode_valeset);
	if($explode_valeset != ""){
		echo "<script>window.location.href='$url/search/?st=$explode_vale';</script>";
	}
}

if(isset($_POST['cupan_edital'])){
	$_getvaleis = $_GET['id'];
	$updateval_coup = "coup_type='".$_POST['coupantype_edit']."',coup_vendorid='".$_POST['coupanvenodr_edit']."',coup_product_id='".$_POST['coupanvendorid']."',coup_amount='".$_POST['coupanamout']."',coup_s_date='".$_POST['coupansdate']."',coup_end_date='".$_POST['coupanedate']."',coup_name='".$_POST['coupanename']."',coup_noofuse='".$_POST['coupannoofuse']."'";
	$updatewhere_coup = "id='$_getvaleis'";
	$updateale = UpdateAllDataFileds('coupons',$updateval_coup,$updatewhere_coup);
	echo "<script>alert('Successfully Updated.');window.location.href='$url/admin-manager/coupons_edit/?id=$_getvaleis';</script>";
}

if(isset($_POST['subemailbtn'])){
	$emaili = $_POST['subemail'];

	$checking_email = "SELECT * FROM newslatter WHERE newsl_ip='$ip' AND newsl_email='$emaili'";
	$query_aleset = $contdb->query($checking_email);
	if($query_aleset->num_rows > 0){
		echo "<script>window.location.href='$url/thanks-for-subscribing-newsletter/';</script>";
	}else{
		$insertvalee = GllInsertDataAllTable("newslatter","newsl_email,newsl_ip,newsl_date,newsl_time","'".$emaili."','".$ip."','".$date."','".$time."'");
		$query_setval = $contdb->query($insertvalee);
		echo "<script>window.location.href='$url/thanks-for-subscribing-newsletter/';</script>";
	}
}

if(isset($_POST['eidtupdtae'])){
	$prodtaddname = addslashes(trim($_POST['tilepded']));
    if(addslashes(trim($_POST['slugprd'])) == ""){
    	$newpdurlname = ChakingProductName($prodtaddname);
    }else{
    	$newpdurlname = ChakingProductName(addslashes(trim($_POST['slugprd'])));
    }
    $chkingprodname = ChakingProductName($prodtaddname);
    $prodaddpagename= makeurl($newpdurlname);
    $prodtaddsku = addslashes($_POST['skupdtvl']);
    $prodtaddcateg = $_POST['prodt_cat'];
    $prodtcat_val = "";
    $product_url = "";
    foreach($prodtaddcateg as $value_cat){
    	$explode_val = explode('|', $value_cat);
		$product_url .= $explode_val[0] .',';
		$prodtcat_val .= $explode_val[1] .',';
    }
    $prodtaddlink = $url.'/'.trim($prodaddpagename);
    $venderdataadd = $_POST['setvendordat'];
    $update_datafiled = "product_vender_id='$venderdataadd',product_name='$chkingprodname',product_link='$prodtaddlink',product_page_name='$prodaddpagename',product_catger_ids='$prodtcat_val',product_sku='$prodtaddsku'";

    $_getupdateid = "id='".$_POST['pageid']."' AND product_auto_id='".$_POST['autoid']."'";
    $insert_data = UpdateAllDataFileds("all_product",$update_datafiled,$_getupdateid);
    if($insert_data == true){
        echo "<script>alert('Successfully Updated.');</script>";
    }else{
        echo "<script>alert('Please Try Again.');</script>";
    }
}

if(isset($_POST['addnewseouser'])){
	$_seouser_fname = $_POST['fname'];
	$_seouser_lname = $_POST['lname'];
	$_seouser_emailid = $_POST['emailid'];
	$_seouser_password = MD5($_POST['passwordvale']);
	$_seouser_action = $_POST['statusaction'];
	if($_seouser_fname !== "" && $_seouser_lname !== "" && $_seouser_emailid !== "" && $_seouser_password !== "" && $_seouser_action !== ""){

		$chking_emailid = "SELECT * FROM userlogntable WHERE user_email='$_seouser_emailid'";
		$queryale = $contdb->query($chking_emailid);
		if($queryale->num_rows > 0){
			echo "<script>alert('That email id already in our database.');window.location.href='$url/admin-manager/seo/?action=addnew';</script>";
		}else{
			$auto_id = MD5(rand().uniqid());
			$rowname = "user_first_name,user_email,user_lastname,user_password,user_type,user_status,user_auto";
			$rowvalues = "'$_seouser_fname','$_seouser_emailid','$_seouser_lname','$_seouser_password','seouser','$_seouser_action','$auto_id'";
			$insertdata = GllInsertDataAllTable("userlogntable",$rowname,$rowvalues);
			if($insertdata == true){
				echo "<script>alert('Successfully Added.');window.location.href='$url/admin-manager/seo-login/';</script>";
			}else{
				echo "<script>alert('Please try again.');window.location.href='$url/admin-manager/seo/?action=addnew';</script>";
			}
		}
	}else{
		echo "<script>alert('First fill please details.');</script>";
	}
}

if(isset($_POST['updateseouser'])){
	$_updateseo_fname = $_POST['updatefname'];
	$_updateseo_lname = $_POST['updatelname'];
	$_updateseo_email = $_POST['updateemailid'];
	$_updateseo_password = $_POST['updatepasswordvale'];
	$_updateseo_stauts = $_POST['updatestatusaction'];
	$_updateseo_autoid = $_POST['getuserid'];
	$_updateseo_id = $_POST['getid'];

	if($_updateseo_fname !== "" && $_updateseo_lname !== "" && $_updateseo_email !== "" && $_updateseo_stauts !== "" && $_updateseo_autoid !== "" && $_updateseo_id !== ""){
		if($_updateseo_password !== ""){
			$passwordmd = MD5($_updateseo_password);
			$update_datafiled = "user_first_name='$_updateseo_fname',user_email='$_updateseo_email',user_lastname='$_updateseo_lname',user_password='$passwordmd',user_status='$_updateseo_stauts'";
			$_getupdateid = "user_auto='$_updateseo_autoid' AND id='$_updateseo_id'";
			$updateseouservael = UpdateAllDataFileds("userlogntable",$update_datafiled,$_getupdateid);
		}else{
			$update_datafiled = "user_first_name='$_updateseo_fname',user_email='$_updateseo_email',user_lastname='$_updateseo_lname',user_status='$_updateseo_stauts'";
			$_getupdateid = "user_auto='$_updateseo_autoid' AND id='$_updateseo_id'";
			$updateseouservael = UpdateAllDataFileds("userlogntable",$update_datafiled,$_getupdateid);
		}
		if($updateseouservael == true){
			echo "<script>alert('Successfully Updated.');window.location.href='$url/admin-manager/seo-login/';</script>";
		}else{
			echo "<script>alert('Please try again.');</script>";
		}
	}else{
		echo "<script>alert('First fill please required fields.');</script>";
	}
}
if(isset($_POST['updatecodbtn'])){
    $getcutoemid = $_POST['updatetrngid'];
    $customerid = $_POST['hidecustrid'];
    $updatetrngtionid = UpdateAllDataFileds("customer_order","tnx_id='$getcutoemid'","id='$customerid'");
    if($updatetrngtionid == true){
		echo "<script>alert('Successfully Updated.');</script>";
	}else{
		echo "<script>alert('Please try again.');</script>";
	}
}
?>