<!------------- Seo Part ----------------->
<?php
if(isset($_GET['datatbid'])){
  $pageamseo = $_GET['datatbid'];
}else{
  $pageamseo = "home-page";
}
foreach(get_seotitlekeywords($pageamseo) as $seodata){
}
  if($seodata['seo_title'] != ""){
?>
<title><?php echo $seodata['seo_title']; ?></title>
<?php
if($seodata['seo_indexing'] == "Yes"){
?>
<meta name="robots" content="index, follow" />
<?php
}elseif($seodata['seo_indexing'] == "No"){
?>
<meta name="robots" content="noindex, nofollow" />
<?php
}else{
?>
<meta name="robots" content="index, follow" />
<?php
}
?>
<meta name="description" content="<?php echo $seodata['seo_desrpt']; ?>">
<meta name="keywords" content="<?php echo $seodata['seo_keyword']; ?>">
<link rel="canonical" href="https://buyjee.com">
<meta name="twitter:card" value="summary">
<meta property="og:type" content="product" />
<meta property="og:title" content="<?php echo $seodata['seo_title']; ?>" >
<?php
if($pageamseo == "home-page"){
?>
<meta property="og:url" content="<?php echo $url; ?>/" />
<?php
}else{
?>
<meta property="og:url" content="<?php echo $url; ?>/<?php echo $pageamseo; ?>" />
<?php
}
?>
<meta property="og:image" content="<?php echo $url; ?>/images/<?php echo $seodata['seo_imageval']; ?>" xmlns:og="http://opengraphprotocol.org/schema/">
<meta property="og:image" content="<?php echo $url; ?>/images/<?php echo $seodata['seo_imageval']; ?>">
<meta property="og:description" content="<?php echo $seodata['seo_desrpt']; ?>" xmlns:og="http://opengraphprotocol.org/schema/">
<?php
}else{
  $get_pagename = $_GET['datatbid'];
  $productseo = "SELECT * FROM all_product WHERE product_page_name='$get_pagename' AND product_status='1'";
  $query_produtseo = $contdb->query($productseo);
  if($query_produtseo->num_rows > 0){
    while($row_get_seo = $query_produtseo->fetch_array()){
      $Pagename = $row_get_seo['product_name'];
      $seopddesct = $row_get_seo['product_short_des'];
      $seopdimage = $row_get_seo['product_image'];
    }
?>
<title><?php echo $Pagename; ?></title>
<meta name="description" content="<?php echo $seopddesct; ?>">
<meta name="keywords" content="">
<link rel="canonical" href="<?php echo $url; ?>/<?php echo $get_pagename; ?>">
<meta name="twitter:card" value="summary">
<meta property="og:title" content="<?php echo $Pagename; ?>" >
<meta property="og:type" content="product" />
<meta property="og:url" content="<?php echo $url; ?>/<?php echo $get_pagename; ?>" />
<meta property="og:image" content="<?php echo $url; ?>/images/<?php echo $seopdimage; ?>" xmlns:og="http://opengraphprotocol.org/schema/">
<meta property="og:image" content="<?php echo $url; ?>/images/<?php echo $seopdimage; ?>">
<meta property="og:description" content="<?php echo $seopddesct; ?>" xmlns:og="http://opengraphprotocol.org/schema/">
<?php
  }else{
?>
<title>Buyjee - Shop Quality and Shop Luxury</title>
<meta name="description" content="Find exquisite products carefully selected from independent brands, designers and artists.">
<meta name="keywords" content="">
<link rel="canonical" href="https://buyjee.com">
<meta name="twitter:card" value="summary">
<meta property="og:title" content="Buyjee - Shop Quality and Shop Luxury" >
<meta property="og:type" content="product" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="og:image" content="https://buyjee.com/images/122762882.jpg" xmlns:og="http://opengraphprotocol.org/schema/">
<meta property="og:image" content="https://buyjee.com/images/122762882.jpg">
<meta property="og:description" content="Find exquisite products carefully selected from independent brands, designers and artists." xmlns:og="http://opengraphprotocol.org/schema/">
<?php
  }
}
?>
</head>

<body>
<?php
if(isset($_SESSION['customersessionlogin'])){
  $cutmervale = $_SESSION['customersessionlogin'];
  $update_datafiled = "whis_customerd='$cutmervale'";
  $_getupdateid = "whis_ip='$ip'";
  $get_whishlist = UpdateAllDataFileds("wishlistbl_table",$update_datafiled,$_getupdateid);
}
?>
    <header class="header-area header-style-1 header-height-2">
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <?php
                          foreach(GLLHederGetsection() as $logoset){
                            if($logoset['head_logo'] == "" && $logoset['head_logo'] == "0"){}else{
                        ?>
                        <a href="<?php echo $url; ?>/">
                          <img src="<?php echo $url; ?>/images/<?php echo $logoset['head_logo']; ?>" alt="Logo">
                
                        </a>
                        <?php
                            }
                          }
                        ?>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form class="searchbox-top" role="form" method="post" enctype="mutlipart/form-data" action="">
                                <select class="select-active">
                                    <option>All Categories</option>
                                    <?php categoryTree(); ?>
                                </select>
                              <input id="search" tabindex="0" type="search" placeholder="Search" autocomplete="off" autofocus="" name="mainsearch" class="search-box" required="">                          </form>
                        </div>

                       
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <?php
                                      if(isset($_SESSION['customersessionlogin'])){
                                          $cutomervale = $_SESSION['customersessionlogin'];
                                      }else{
                                          $cutomervale = "0";
                                      }
                                    
                                      $get_count=[];
                                      foreach(GetWhisListData($cutomervale) as $valueset){
                                        $get_count[] = $valueset['whis_prd_id'];
                                      }
                                      $rray_countvl = count($get_count);
                                    ?>
                                    
                                    <a href="shop-wishlist.html"> 
                                        <img class="svgInject" alt="Buyjee" src="<?php echo $url; ?>/assetsnew/imgs/theme/icons/icon-heart.svg">
                                        <span class="pro-count blue"><?php echo $rray_countvl; ?></span>
                                    </a>
                                    <a href="<?php echo $url; ?>/wishlist/"><span class="lable">Wishlist</span></a>
                                </div>
                                <div class="header-action-icon-2">
                                      <?php
                                      if(isset($_SESSION['customersessionlogin'])){
                                          $customercountval = $_SESSION['customersessionlogin'];
                                          $cart_value = "SELECT COUNT(*) FROM cart_user WHERE cart_userid='$customercountval' AND cart_status='0' AND cart_user_browser='$brower'";
                                      }else{
                                          $customercountval = "";
                                          $cart_value = "SELECT COUNT(*) FROM cart_user WHERE cart_user_ip='$ip' AND cart_status='0' AND cart_user_browser='$brower'";
                                      }

                                     
                                      $fecth_cvalue = $contdb->query($cart_value);
                                      $row_getprodocunt = $fecth_cvalue->fetch_array();
                                      $get_count_cart = $row_getprodocunt[0];

                                     
                                      /*if($fecth_cvalue->num_rows > 0){
                                          while ($row_getprodocunt = $fecth_cvalue->fetch_array()) {
                                              $get_qunityvale[] = $row_getprodocunt['cart_prdo_name'];
                                          }
                                          $get_count_cart = $get_qunityvale;
                                      }else{
                                          $get_count_cart = "0";
                                      }*/
                                      ?> 
                                    <a class="mini-cart-icon" href="<?php echo $url; ?>/cart/">
                                        <img alt="Buyjee" src="<?php echo $url; ?>/assetsnew/imgs/theme/icons/icon-cart.svg">
                                        <span class="pro-count blue"><?php echo $get_count_cart; ?></span>
                                    </a>
                                    <a href="<?php echo $url; ?>/cart/"><span class="lable">Cart</span></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="#">
                                        <img class="svgInject" alt="Buyjee" src="<?php echo $url; ?>/assetsnew/imgs/theme/icons/icon-user.svg">
                                    </a>
                                    <a href="#"><span class="lable ml-0">Account</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <?php
                                              if(isset($_SESSION['adminsessionlogin'])){
                                                  $redirect_path = "$url/admin-manager/index/";
                                              ?>
                                            <li>
                                                <a href="<?php echo $redirect_path; ?>"><i class="fi fi-rs-user mr-10"></i>Admin</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $url; ?>/admin-manager/logout/"><i class="fi fi-rs-sign-out mr-10"></i>Logout</a>
                                            </li>
                                            <?php }elseif(isset($_SESSION['vendorsessionlogin'])){ ?>
                                            <?php
                                                    $ge_fname=""; $firstchapt="";
                                                foreach(GetVenderDatavale($_SESSION['vendorsessionlogin']) as $datavale){
                                                    $ge_fname = $datavale['vendor_f_name'];
                                                    $firstchapt = substr($ge_fname, 0, 1);
                                                  }
                                                  $redirect_path = "$url/vendor/dashboard/";
                                            ?>
                                            <li>
                                                <a href="<?php echo $redirect_path; ?>"><i class="fi fi-rs-user mr-10"></i><?php echo $ge_fname; ?></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $url; ?>/vendor/logout/"><i class="fi fi-rs-sign-out mr-10"></i>Logout</a>
                                            </li>
                                            <?php }elseif(isset($_SESSION['customersessionlogin'])){ ?>
                                                <?php if(!empty(GetCustomerDataVal())){
                                                  foreach(GetCustomerDataVal($_SESSION['customersessionlogin']) as $get_cutsmename){
                                                    $fname_vale = $get_cutsmename['customer_fname'];
                                                  }
                                                }else{
                                                  $fname_vale = "My Account";
                                                }
                                                $redirect_path = "$url/customer/dashboard/";
                                            ?>
                                            <li>
                                                <a href="<?php echo $redirect_path; ?>"><i class="fi fi-rs-user mr-10"></i><?php echo $fname_vale; ?></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $url; ?>/customer/logout/"><i class="fi fi-rs-sign-out mr-10"></i>Logout</a>
                                            </li>
                                            <?php }else{ ?>
                                            <li>
                                                <a href="<?php echo $url; ?>/login/"><i class="fi fi-rs-sign-out mr-10"></i>LOGIN / SIGN UP</a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <?php
                          foreach(GLLHederGetsection() as $logoset){
                            if($logoset['head_logo'] == "" && $logoset['head_logo'] == "0"){}else{
                        ?>
                        <a href="<?php echo $url; ?>/">
                          <img src="<?php echo $url; ?>/images/<?php echo $logoset['head_logo']; ?>" alt="Logo">

                        </a>
                        <?php
                            }
                          }
                        ?>
                    </div>

                   


                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                     <?php
                                        foreach(Get_show_menuval("header") as $heradrval){
                                            $chkingcatagoymenu = "SELECT * FROM product_categories WHERE prd_cat_slug='".$heradrval['menu_url']."' AND prd_cat_hidevale='1'";
                                            $qiueryckingval = $contdb->query($chkingcatagoymenu);
                                            if($qiueryckingval->num_rows > 0){
                                                
                                                echo GetFirstFaceMneuCat($heradrval['menu_url']);
                                            }else{
                                                echo '<li>
                                                    <a href='.$url.'/'.$heradrval['menu_url'].'>'.$heradrval['menu_name'].'</a>
                                                </li>';

                                                
                                            }
                                        }
                                    ?> 
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-flex">
                        <img src="<?php echo $url; ?>/assetsnew/imgs/theme/icons/icon-headphone.svg" alt="hotline">
                        <?php
                        foreach(GLLHederGetsection() as $phoneshow){
                            $phonenum = json_decode($phoneshow['head_numberbox']);
                        ?>
                        <p class="text-center"><a href='tel:<?php echo $phonenum[0]; ?>'><?php echo $phonenum[0]; ?></a><span>24/7 Support Center</span></p>
                        <?php } ?>
                    </div>
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <?php
                                  if(isset($_SESSION['customersessionlogin'])){
                                      $cutomervale2 = $_SESSION['customersessionlogin'];
                                  }else{
                                      $cutomervale2 = "0";
                                  }
                                  $get_count2=[];
                                  foreach(GetWhisListData($cutomervale2) as $valueset2){
                                    $get_count2[] = $valueset2['whis_prd_id'];
                                  }
                                  $rray_countvl2 = count($get_count2);
                                ?>
                                <a href="<?php echo $url; ?>/wishlist/">
                                    <img alt="Buyjee" src="<?php echo $url; ?>/assetsnew/imgs/theme/icons/icon-heart.svg">
                                    <span class="pro-count white"><?php echo $rray_countvl2; ?></span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <?php
                                  if(isset($_SESSION['customersessionlogin'])){
                                      $customercountval = $_SESSION['customersessionlogin'];
                                      $cart_value = "SELECT COUNT(*) FROM cart_user WHERE cart_userid='$customercountval' AND cart_status='0' AND cart_user_browser='$brower'";
                                  }else{
                                      $customercountval = "";
                                      $cart_value = "SELECT COUNT(*) FROM cart_user WHERE cart_user_ip='$ip' AND cart_status='0' AND cart_user_browser='$brower'";
                                  }
                                  $fecth_cvalue = $contdb->query($cart_value);
                                  $row_getprodocunt = $fecth_cvalue->fetch_array();
                                  $get_count_cart = $row_getprodocunt[0];
                                  ?>
                                <a class="mini-cart-icon" href="<?php echo $url; ?>/cart/">
                                    <img alt="Buyjee" src="<?php echo $url; ?>/assetsnew/imgs/theme/icons/icon-cart.svg">
                                    <span class="pro-count white"><?php echo $get_count_cart; ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <?php
                      foreach(GLLHederGetsection() as $logoset){
                        if($logoset['head_logo'] == "" && $logoset['head_logo'] == "0"){}else{
                    ?>
                    <a href="<?php echo $url; ?>/">
                      <img src="<?php echo $url; ?>/images/<?php echo $logoset['head_logo']; ?>" alt="Logo">

                    </a>
                    <?php
                        }
                      }
                    ?>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form class="searchbox-top" role="form" method="post" enctype="mutlipart/form-data" action="">
                        <input id="search" tabindex="0" type="search" placeholder="Search" autocomplete="off" autofocus="" name="mainsearch" class="search-box" required="">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <?php
                                foreach(Get_show_menuval("header") as $heradrval){
                                
                                   echo '<li>
                                            <a href='.$url.'/'.$heradrval['menu_url'].'>'.$heradrval['menu_name'].'</a>
                                        </li>'; 
                                }
                            ?>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-social-icon mb-10 mt-50">
                    <h6 class="mb-15">Follow Us</h6>
                    <?php
                    foreach(GLLHederGetsection() as $socilicon){
                        $socialicon = json_decode($socilicon['head_socialicon']);
                    ?>
                    <?php
                        if($socialicon[0] != ""){
                    ?>
                        <a href="<?php echo $socialicon[0]; ?>" target="_blank"><img src="<?php echo $url; ?>/assetsnew/imgs/theme/icons/icon-facebook-white.svg" alt=""></a>
                    <?php } ?>
                    <?php
                        if($socialicon[1] != ""){
                    ?>
                    <a href="<?php echo $socialicon[1]; ?>" target="_blank"><img src="<?php echo $url; ?>/assetsnew/imgs/theme/icons/icon-twitter-white.svg" alt=""></a>
                    <?php } ?>
                    <?php
                        if($socialicon[2] != ""){
                    ?>
                    <a href="<?php echo $socialicon[2]; ?>" target="_blank"><img src="<?php echo $url; ?>/assetsnew/imgs/theme/icons/icon-linkdin-white.png" alt=""></a>
                    <?php } ?>
                    <?php
                        if($socialicon[3] != ""){
                    ?>
                    <a href="<?php echo $socialicon[3]; ?>" target="_blank"><img src="<?php echo $url; ?>/assetsnew/imgs/theme/icons/icon-youtube-white.svg" alt=""></a>
                    <?php } ?>
                    <?php
                        if($socialicon[4] != ""){
                    ?>
                    <a href="<?php echo $socialicon[4]; ?>" target="_blank"><img src="<?php echo $url; ?>/assetsnew/imgs/theme/icons/icon-instagram-white.svg" alt=""></a>
                    <?php } ?>
                    <?php
                        if($socialicon[5] != ""){
                    ?>
                    <a href="https://api.whatsapp.com/send?phone=91<?php echo $socialicon[5]; ?>" target="_blank"><img src="<?php echo $url; ?>/assetsnew/imgs/theme/icons/icon-whatapp-white.png" alt=""></a>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!--End header-->