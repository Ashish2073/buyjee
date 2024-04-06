<?php include 'includes/upper-header.php'; ?>

<title>Vendor Inquiry</title>

<!--- Main Header ----->
<script defer="defer">
  _affirm_config = {
    public_api_key:  "IXUH742ZGVLBDE5G",
    script:          "https://cdn1.affirm.com/js/v2/affirm.js"
  };
  (function(l,g,m,e,a,f,b){var d,c=l[m]||{},h=document.createElement(f),n=document.getElementsByTagName(f)[0],k=function(a,b,c){return function(){a[b]._.push([c,arguments])}};c[e]=k(c,e,"set");d=c[e];c[a]={};c[a]._=[];d._=[];c[a][b]=k(c,a,b);a=0;for(b="set add save post open empty reset on off trigger ready setProduct".split(" ");a<b.length;a++)d[b[a]]=k(c,e,b[a]);a=0;for(b=["get","token","url","items"];a<b.length;a++)d[b[a]]=function(){};h.async=!0;h.src=g[f];n.parentNode.insertBefore(h,n);delete g[f];d(g);l[m]=c})(window,_affirm_config,"affirm","checkout","ui","script","ready");
 // Use your live public API Key and https://cdn1.affirm.com/js/v2/affirm.js script to point to Affirm production environment.
</script>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '720269638774470'); 
fbq('track', 'PageView');
</script>
<!-- Global site tag (gtag.js) - Google Ads: 669487509 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-669487509"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-669487509'); </script>
<!-- Event snippet for Add to cart conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-669487509/WZNkCJXp5eUCEJWjnr8C', 'event_callback': callback }); return false; } </script>
<noscript>
<img height="1" width="1" src="https://www.facebook.com/tr?id=720269638774470&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-49905888-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

 

  gtag('config', 'UA-49905888-1');
</script>

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
<link rel="canonical" href="https://buyjee.com/">
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

<link rel="stylesheet" href="https://buyjee.com/assets/css/new_menu.css" />
<link rel="stylesheet" type="text/css" href="">
<meta name="description" content="Find exquisite products carefully selected from independent brands, designers and artists.">
<meta name="keywords" content="">
<link rel="canonical" href="https://buyjee.com/">
<meta name="twitter:card" value="summary">
<meta property="og:title" content="Gallery La La - Shop Quality and Shop Luxury" >
<meta property="og:type" content="product" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="og:image" content="https://buyjee.com/images/122762882.jpg" xmlns:og="http://opengraphprotocol.org/schema/">
<meta property="og:image" content="https://buyjee.com/images/122762882.jpg">
<meta property="og:description" content="Find exquisite products carefully selected from independent brands, designers and artists." xmlns:og="http://opengraphprotocol.org/schema/">

<?php
  }
}
?>

<style type="text/css">
  /*new menu bar style*/
  .navbar-default{position: relative;}
  .menu-bar .inner{width: 100%; display: block;}

.nav {
  display: flex;
  justify-content: space-between;
  position: inherit;
}

.nav a {
  display: block;
  text-decoration: none;
}

.nav > li > a {
  padding: 10px 15px;
  text-transform: uppercase;
  color: #fff;
}

.nav > li {
  position: relative;
}

.nav > li > ul {
  background: #fff;
  position: absolute;
  z-index: 99;
  
  top: 100%;
 
  opacity: 0;
  visibility: hidden;
  transform: translateY(20px);
  transition: all 300ms ease-in-out 500ms;
  transition: all 300ms ease-in-out;
}

.nav > li > ul > li > a {
  padding: 10px 15px;
}

.nav > li > ul > li > a:hover {
  background-color: rgba(0, 0, 0, 0.15);
}

.nav > li:hover > ul {
  opacity: 1;
  visibility: visible;
  transform: translateY(0px);
  transition: all 300ms ease-in-out;
}

.nav > li:hover > ul.hovul {top: 73%;}

.nav > li > a:hover {
  background-color: rgba(0, 0, 0, 0.05);
}

.nav .big-nav-pos_static {
  position: static;
}

.nav .pos_relative {
  position: relative;
}

.nav .big-nav-pos_static > ul {
  min-height: 200px;
  position: absolute;
  top: 100%;
  left: 10%;
  right: 10%;
  width: 80%;
  background:#fff;
}

.nav > li > ul.sub-menu{
  width: 300px;
  left: 0;
}

.nav > li > ul.sub-menu > li > ul{
  position: relative;
  left: 0;
  padding-left: 10px;
}

.nav > li > ul.sub-menu > li > ul > li {}
.nav > li > ul.sub-menu > li > ul > li > a{display: block; padding: 10px 15px;}
.nav > li > ul.sub-menu > li > ul > li :hover {
    background-color: rgba(0, 0, 0, 0.15);
}

.nav .big-nav-pos_static > ul > li {
  width: 25%;
}

.nav .big-nav-pos_static > ul.creatorul > li {
  width: 25%;
  float: left;
}

.nav .big-nav-pos_static > ul > li.show > a {
  background: #f5f5f5;
}
.nav .big-nav-pos_static > ul > li > a {
  padding: 10px;
  border-bottom:1px solid #f5f5f5;
  display: block;
}

.nav .big-nav-pos_static > ul > li > a > i{float: right; font-size: 14px; margin-top: 8px;}

.nav .big-nav-pos_static > ul > li > ul {
  display: none;
  position: absolute;
  top: 0;
  left: 25%;
  width: 75%;
  background:#fff;
  border-left: 1px solid #ccc;
}

.nav .big-nav-pos_static > ul > li.show > ul {
  display: block;
}

.nav .big-nav-pos_static > ul > li > ul > li {
  display: inline-block;
  vertical-align: middle;
  width:calc(33.33% - 1px);
  padding: 0px 15px;
  float: left;
}



.nav .big-nav-pos_static > ul > li > ul > li > a {
  font-weight: bold;
  border-bottom: 1px solid #f5f5f5;
}

.nav .big-nav-pos_static > ul > li > ul > li a {
  padding: 7px 15px;
  display: block;
}
</style>



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
    <header class="home-header">
    <div class="header-contaienr">
      <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--button-->
                <?php
                  foreach(GLLHederGetsection() as $logoset){
                    if($logoset['head_logo'] == "" && $logoset['head_logo'] == "0"){}else{
                ?>
                <a class="navbar-brand" href="<?php echo $url; ?>/">
                  <img src="https://buyjee.com/assets/images/logo-white.png">
                  <img src="<?php echo $url; ?>/images/<?php echo $logoset['head_logo']; ?>" alt="GLL Logo">

                </a>
                <?php
                    }
                  }
                ?>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="menu-bar">


              <div id="header">
  
    <div class="inner">
      <ul class="nav">
        <li class="pos_relative"><a href="https://buyjee.com/new-arrivals/">New Arrivals</a></li>
        <li class="big-nav-pos_static"><a href="javascript:void(0);">The Creators</a>
          <ul class="hovul creatorul">
            <li><a href="https://buyjee.com/1-people">1 People </a></li>
            <li><a href="https://buyjee.com/alpenglow-workshop">Alpenglow Workshop</a></li>
            <li><a href="https://buyjee.com/ayala-naphtali">Ayala Naphtali</a></li>
            <!-- <li><a href="https://www.gallerylala.com/barbara-wilkinson">Barbara Wilkinson Jewelry</a></li>
            <li><a href="https://www.gallerylala.com/big-lovie">Big Lovie </a></li>
            <li><a href="https://www.gallerylala.com/candy-palazzo">Candy Palazzo</a></li>
            <li><a href="https://www.gallerylala.com/cecilia-s-steel">Cecilia's Steel</a></li>
            <li><a href="https://www.gallerylala.com/citron-clothing">Citron Clothing</a></li>
            <li><a href="https://www.gallerylala.com/david-vigon">David Vigon</a></li>
            <li><a href="https://www.gallerylala.com/fili-plaza">Fili Plaza</a></li>
            <li><a href="https://www.gallerylala.com/griffith-evans">Griffith Evans</a></li>
            <li><a href="https://www.gallerylala.com/ismail-sanal">Ismail Sanal</a></li>
            <li><a href="https://www.gallerylala.com/jennifer-ritz">Jennifer Ritz</a></li>
            <li><a href="https://www.gallerylala.com/knots-studio">Knots Studio</a></li>
            <li><a href="https://www.gallerylala.com/kovasky">Kovasky </a></li>
            <li><a href="https://www.gallerylala.com/lisa-medoff">Lisa Medoff</a></li>
            <li><a href="https://www.gallerylala.com/marilyn-henrion">Marilyn Henrion</a></li>
            <li><a href="https://www.gallerylala.com/naturevsfuture">NatureVsFuture </a></li>
            <li><a href="https://www.gallerylala.com/olaf-olsson">Olaf Olsson</a></li>
            <li><a href="https://www.gallerylala.com/patent-of-heart">Patent of Heart</a></li>
            <li><a href="https://www.gallerylala.com/pauletta-brooks">Pauletta Brooks</a></li>
            <li><a href="https://www.gallerylala.com/ranchoaparte">Rancho Aparte</a></li>
            <li><a href="https://www.gallerylala.com/signe-drulle">Signe Drulle</a></li>
            <li><a href="https://www.gallerylala.com/studio-duarte">Studio Duarte</a></li>
            <li><a href="https://www.gallerylala.com/tie-babies">Tie Babies</a></li> -->
         </ul>             
        </li>
        <li class="big-nav-pos_static"><a href="javascript:void(0);">Women</a>
          <ul class="hovul">
            <li><a href="https://www.gallerylala.com/women/">All Women <i class="fa fa-long-arrow-right"></i></a></li>
            <li class="show"><a href="https://www.gallerylala.com/women/accessories/">Accessories <i class="fa fa-chevron-right"></i></a>
              <ul class="megaul megaul2">
                 <li><a href="https://www.gallerylala.com/women/accessories/belts/"><span>Belts</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/accessories/hats/"><span>Hats</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/accessories/neckwear/"><span>Neckwear</span></a></li>
                 <!-- <li><a href="/women/accessories/sarongs/"><span>Sarongs</span></a></li> -->
                 <li><a href="https://www.gallerylala.com/women/accessories/scarves/"><span>Scarves</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/accessories/sunglasses/"><span>Sunglasses</span></a></li>
              </ul>
            </li>
            <li><a href="https://www.gallerylala.com/women/bags/">Bags <i class="fa fa-chevron-right"></i></a>
              <ul>
                 <li><a href="https://www.gallerylala.com/women/bags/belt-bags/"><span>Belt Bags</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/bags/clutches/"><span>Clutches</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/bags/crossbodies/"><span>Crossbodies</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/bags/handbags/"><span>Handbags</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/bags/totes/"><span>Totes</span></a></li>
              </ul>
            </li>
            <li><a href="https://www.gallerylala.com/women/clothing/">Clothing <i class="fa fa-chevron-right"></i></a>
              <ul class="megaul megaul2">
                 <li><a href="https://www.gallerylala.com/women/clothing/activewear/"><span>Activewear</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/blouses-shirts/"><span>Blouses &amp; Shirts</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/cardigans/"><span>Cardigans</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/coats/"><span>Coats</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/dresses/"><span>Dresses</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/jackets/"><span>Jackets</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/jumpsuits-rompers/"><span>Jumpsuits &amp; Rompers</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/kimonos/"><span>Kimonos</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/leggings/"><span>Leggings</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/pants/"><span>Pants</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/shorts/"><span>Shorts</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/skirts/"><span>Skirts</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/sweaters/"><span>Sweaters</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/sweatshirts/"><span>Sweatshirts</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/swimwear/"><span>Swimwear</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/tops/"><span>Tops</span></a></li>
                 <li><a href="https://www.gallerylala.com/women/clothing/underwear/"><span>Underwear</span></a></li>
              </ul>
            </li>
            <li><a href="https://www.gallerylala.com/women/jewelry/">Jewelry <i class="fa fa-chevron-right"></i></a>
                <ul class="megaul megaul2">
                  <li><a href="https://www.gallerylala.com/women/jewelry/anklets/"><span>Anklets</span></a></li>
                  <li><a href="https://www.gallerylala.com/women/jewelry/bracelets/"><span>Bracelets</span></a></li>
                  <li><a href="https://www.gallerylala.com/women/jewelry/earrings/"><span>Earrings</span></a></li>
                  <li><a href="https://www.gallerylala.com/women/jewelry/necklaces/"><span>Necklaces</span></a></li>
                  <li><a href="https://www.gallerylala.com/women/jewelry/rings/"><span>Rings</span></a></li>            
                </ul>
            </li>

            <li><a href="https://www.gallerylala.com/women/shoes/">Shoes <i class="fa fa-chevron-right"></i></a>
                <ul class="megaul megaul2">
                  <li><a href="https://www.gallerylala.com/women/shoes/flats/"><span>Flats</span></a></li> 
                  <li><a href="https://www.gallerylala.com/women/shoes/heels/"><span>Heels</span></a></li> 
                  <li><a href="https://www.gallerylala.com/women/shoes/sandals/"><span>Sandals</span></a></li> 
                  <li><a href="https://www.gallerylala.com/women/shoes/sneakers/"><span>Sneakers</span></a></li>
                </ul>
            </li>
          </ul>
        </li>

        <li class="pos_relative"><a href="javascript:void(0);">Men</a>
          <ul class="sub-menu">
             <li><a href="https://www.gallerylala.com/men/">All Men</a></li>
             <li>
                <a href="https://www.gallerylala.com/men/accessories/"><strong>Accessories</strong> </a>
                <ul>
                   <li><a href="https://www.gallerylala.com/men/accessories/bow-ties/">Bow Ties</a></li>
                   <li><a href="https://www.gallerylala.com/men/accessories/hats/">Hats</a></li>
                   <li><a href="https://www.gallerylala.com/men/accessories/neckties/">Neckties </a></li>
                   <li><a href="https://www.gallerylala.com/men/accessories/pocket-squares/">Pocket Squares</a></li>
                   <li><a href="https://www.gallerylala.com/men/accessories/scarves/">Scarves</a></li>
                </ul>
             </li>
             <li>
                <a href="https://www.gallerylala.com/men/clothing/"><strong>Clothing</strong></a>
                <ul>
                   <li><a href="https://www.gallerylala.com/men/clothing/shirts/">Shirts</a></li>
                   <li><a href="https://www.gallerylala.com/men/clothing/sweatshirts/">Sweatshirts</a></li>
                </ul>
             </li>
             <li>
                <a href="https://www.gallerylala.com/men/jewelry/"><strong>Jewelry</strong></a>
                <ul>
                   <li><a href="https://www.gallerylala.com/men/jewelry/bracelets/">Bracelets</a></li>
                </ul>
             </li>
          </ul>          
        </li>

        <li class="pos_relative"><a href="javascript:void(0);">Kids</a>
          <ul class="sub-menu">
             <li><a href="https://www.gallerylala.com/kids/">All Kids</a></li>
             <li>
                <a href="https://www.gallerylala.com/kids/boys-clothing/"><strong>Boys Clothing</strong></a>
                <ul>
                   <li><a href="https://www.gallerylala.com/kids/boys-clothing/sweatshirts/">Sweatshirts</a></li>
                </ul>
             </li>
             <li>
                <a href="https://www.gallerylala.com/kids/girls-clothing/"><strong>Girls Clothing</strong> </a>
                <ul>
                   <li><a href="https://www.gallerylala.com/kids/girls-clothing/sweatshirts/">Sweatshirts</a></li>
                </ul>
             </li>
             <li><a href="https://www.gallerylala.com/kids/essentials"><strong>Essentials</strong></a></li>
            </ul>           
        </li>

        <li class="pos_relative"><a href="javascript:void(0);">Art</a>
          <ul class="sub-menu">
              <li><a href="https://www.gallerylala.com/art/">All Art</a></li>
              <li><a href="https://www.gallerylala.com/art/fiber-art/"><strong>Fiber Art</strong></a></li>
              <li><a href="https://www.gallerylala.com/art/paintings/"><strong>Paintings</strong></a></li>
              <li><a href="https://www.gallerylala.com/art/prints/"><strong>Prints</strong></a></li>  
          </ul>           
        </li>

        <li class="pos_relative"><a href="javascript:void(0);">Home & Living</a>
          <ul class="sub-menu">
            <li><a href="https://www.gallerylala.com/home-living/"><strong>All Home &amp; Living</strong></a></li>
            <li><a href="https://www.gallerylala.com/home-living/benches/">Benches</a></li>
            <li><a href="https://www.gallerylala.com/home-living/blankets-throws/">Blankets &amp; Throws</a></li>
            <li><a href="https://www.gallerylala.com/home-living/ottomans/">Ottomans</a></li>
            <li><a href="https://www.gallerylala.com/home-living/pillows/">Pillows</a></li>
            <li><a href="https://www.gallerylala.com/home-living/stools/">Stools</a></li>
          </ul>           
        </li>
        
      </ul>
    </div>
  
</div>



























              <div style="display: none;">
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <!-- menu bar start -->
                    <ul class="nav navbar-nav">
                      <?php
                        foreach(Get_show_menuval("header") as $heradrval){
                          if($heradrval['menu_url'] == "#the-creators"){
                      ?>
                        <li class="mega-link dropdown">
                          <a href="#" class="dropdown-toggle"><?php echo $heradrval['menu_name']; ?></a>
                          <div class="mega-menu dropdown-menu">
                             <div class="mega-wrap row">
                                <div class="col-md-12"><h6><?php echo $heradrval['menu_name']; ?></h6></div>
                                 <div class="col-sm-12">
                                    <div class="wrapoverflow style4">                                     
                                     <ul class="megaul megaul2">
                                      <?php
                                        foreach(GetVenderDatavale() as $value_vendor){
                                          foreach(GetPermissionvalData($value_vendor['vendor_auto']) as $permissionval){
                                            if($permissionval['user_p_block'] == "0"){
                                              if($permissionval['user_p_email_ap'] == "1"){
                                      ?>                             
                                        <li><a href="<?php echo $url; ?>/<?php echo $value_vendor['vendor_uni_name']; ?>"><?php echo $value_vendor['vendor_f_name']; ?> <?php echo $value_vendor['vendor_l_name']; ?></a></li>
                                        <?php
                                          } }}}
                                        ?>
                                     </ul>
                                   </div>
                                 </div>
                             </div> 
                          </div>
                        </li>
                      <?php
                          }elseif($heradrval['menu_id'] == ""){
                      ?>
                        <li class="dropdown">
                          <a href="<?php echo $heradrval['menu_url']; ?>"><?php echo $heradrval['menu_name']; ?></a>
                        </li>
                      <?php
                          }elseif($heradrval['menu_url'] == "women"){
                      ?>
                      <li class="mega-link dropdown">
                          <a href="javascript:void(0);" class="dropdown-toggle">Women </a>
                            <div class="mega-menu dropdown-menu">
                               <div class="mega-wrap row">
                                   <div class="col-md-12">
                                      <ul class="style4">
                                          <li><a href="<?php echo $url; ?>/women/">All Women</a></li>
                                      </ul>
                                      
                                      <?php $categories = categories_MainMnu(); ?>
                                      <?php foreach($categories as $category){ ?>
                                          <ul class="ulw33 submenu3 style4">
                                            <li><a href="<?php echo $url; ?>/<?php echo $category['category_url']; ?>"><?php echo $category['category_name'] ?></a>
                                          <?php 
                                            if( ! empty($category['subcategory'])){
                                              echo viewsubcat_MainManu($category['subcategory']);
                                              echo "</li>";
                                            } 
                                          ?>
                                        </ul>
                                      <?php } ?>
                                      <!-- <ul class="ulw33 submenu3 style4">
                                        <li><a href="<?php echo $url; ?>/women/accessories/"><strong>Accessories</strong></a>
                                            <ul>
                                              <li><a href="<?php echo $url; ?>/women/accessories/belts/"><span>Belts</span></a></li>
                                              <li><a href="<?php echo $url; ?>/women/accessories/hats/"><span>Hats</span></a></li>
                                              <li><a href="<?php echo $url; ?>/women/accessories/neckwear/"><span>Neckwear</span></a></li>
                                              <li><a href="<?php echo $url; ?>/women/accessories/scarves/"><span>Scarves</span></a></li>
                                              <li><a href="<?php echo $url; ?>/women/accessories/sunglasses/"><span>Sunglasses</span></a></li>

                                          </ul>
                                        </li>                                            
                                        <li><a href="<?php echo $url; ?>/women/bags/"><strong>Bags</strong></a>
                                          <ul>
                                             <li><a href="<?php echo $url; ?>/women/bags/belt-bags/"><span>Belt Bags</span></a></li>
                                            <li><a href="<?php echo $url; ?>/women/bags/clutches/"><span>Clutches</span></a></li>
                                            <li><a href="<?php echo $url; ?>/women/bags/crossbodies/"><span>Crossbodies</span></a></li>
                                            <li><a href="<?php echo $url; ?>/women/bags/handbags/"><span>Handbags</span></a>
                                            <li><a href="<?php echo $url; ?>/women/bags/totes/"><span>Totes</span></a></li>      
                                          </ul>
                                        </li> 
                                      </ul> -->
                                          <!-- <ul class="ulw33 submenu3 style4">
                                            <li><a href="<?php echo $url; ?>/women/clothing/"><strong>Clothing</strong></a>
                                                <ul>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/activewear/"><span>Activewear</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/blouses-shirts/"><span>Blouses & Shirts</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/cardigans/"><span>Cardigans</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/coats/"><span>Coats</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/dresses/"><span>Dresses</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/jackets/"><span>Jackets</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/jumpsuits-rompers/"><span>Jumpsuits & Rompers</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/kimonos/"><span>Kimonos</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/leggings/"><span>Leggings</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/pants/"><span>Pants</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/shorts/"><span>Shorts</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/skirts/"><span>Skirts</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/sweaters/"><span>Sweaters</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/sweatshirts/"><span>Sweatshirts</span></a></li>  
                                                  <li><a href="<?php echo $url; ?>/women/clothing/swimwear/"><span>Swimwear</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/tops/"><span>Tops</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/clothing/underwear/"><span>Underwear</span></a></li>
                                              </ul>
                                            </li>  
                                                                                     
                                          </ul>

                                      
                                          <ul class="ulw33 submenu3 style4">                                            
                                            <li><a href="<?php echo $url; ?>/women/jewelry/"><strong>Jewelry</strong></a>
                                                <ul>
                                                  <li><a href="<?php echo $url; ?>/women/jewelry/anklets/"><span>Anklets</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/jewelry/bracelets/"><span>Bracelets</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/jewelry/earrings/"><span>Earrings</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/jewelry/necklaces/"><span>Necklaces</span></a></li>
                                                  <li><a href="<?php echo $url; ?>/women/jewelry/rings/"><span>Rings</span></a></li>            
                                              </ul>
                                            </li>
                                            <li><a href="<?php echo $url; ?>/women/shoes/"><strong>Shoes</strong></a>
                                              <ul>
                                                <li><a href="<?php echo $url; ?>/women/shoes/flats/"><span>Flats</span></a></li> 
                                                <li><a href="<?php echo $url; ?>/women/shoes/heels/"><span>Heels</span></a></li> 
                                                <li><a href="<?php echo $url; ?>/women/shoes/sandals/"><span>Sandals</span></a></li> 
                                                <li><a href="<?php echo $url; ?>/women/shoes/sneakers/"><span>Sneakers</span></a></li>
                                              </ul>
                                            </li>
                                          </ul>               -->                       
                                                                          
                                   </div>
                                   <!--clothing-->
                               </div>
                             </div>
                        </li>
                      <?php
                          }else{
                      ?>
                        <?php
                        //foreach(GetMainCatagroy($heradrval['menu_id']) as $get_main_cat){
                      ?>
                        <!-- <li class="mega-link dropdown">
                          <a href="<?php //echo $url; ?>/<?php //echo $get_main_cat['prd_cat_slug']; ?>" class="dropdown-toggle" ><?php //echo $get_main_cat['prd_cat_name']; ?> </a>
                            <div class="mega-menu dropdown-menu">
                               <div class="mega-wrap row">
                                  <div class="col-md-12"><h6><?php //echo $get_main_cat['prd_cat_name']; ?></h6></div>
                                   <div class="col-sm-12">
                                    <div class="row">
                                      
                                        <div class="col-md-4">
                                          <div class="submenu3 style4">
                                            <?php
                                              //foreach(SubCatgoyvaleu($get_main_cat['id']) as $valeucatset){
                                            ?>
                                              <ul>
                                                <li><a href="<?php //echo $url; ?>/<?php //echo $valeucatset['prd_cat_slug']; ?>"><strong><?php //echo $valeucatset['prd_cat_name']; ?></strong></a></li>
                                              </ul>
                                            <?php
                                              //}
                                            ?>
                                          </div>
                                        </div>                                      
                                    </div>                                      
                                   </div>
                               </div>
                             </div>
                        </li> -->
                      <?php
                        //}
                      ?>
                      <?php
                          }
                        }
                      ?> 
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle">Men</a>
                            <ul class="sub-menu dropdown-menu">
                              <li><a href="<?php echo $url; ?>/men/">All Men</a></li>
                                <li><a href="<?php echo $url; ?>/men/accessories/"><strong>Accessories</strong> </a>
                                  <ul>
                                    
                                    <li><a href="<?php echo $url; ?>/men/accessories/bow-ties/">Bow Ties</a></li>
                                    <li><a href="<?php echo $url; ?>/men/accessories/hats/">Hats</a></li>
                                    <li><a href="<?php echo $url; ?>/men/accessories/neckties/">Neckties </a></li>
                                    <li><a href="<?php echo $url; ?>/men/accessories/pocket-squares/">Pocket Squares</a></li>
                                    <li><a href="<?php echo $url; ?>/men/accessories/scarves/">Scarves</a></li>
                                  </ul>
                                </li>                                
                                <li><a href="<?php echo $url; ?>/men/clothing/"><strong>Clothing</strong></a>
                                    <ul>
                                      <li><a href="<?php echo $url; ?>/men/clothing/shirts/">Shirts</a></li>
                                      <li><a href="<?php echo $url; ?>/men/clothing/sweatshirts/">Sweatshirts</a></li>                                    
                                    </ul>
                                </li>
                                <li><a href="<?php echo $url; ?>/men/jewelry/"><strong>Jewelry</strong></a>
                                  <ul>
                                    <li><a href="<?php echo $url; ?>/men/jewelry/bracelets/">Bracelets</a></li>                                    
                                  </ul>
                                </li>
                                                             
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle">Kids</a>
                            <ul class="sub-menu dropdown-menu">
                              <li><a href="<?php echo $url; ?>/kids/">All Kids</a></li>
                                <li><a href="<?php echo $url; ?>/kids/boys-clothing/"><strong>Boys Clothing</strong></a>
                                  <ul>
                                    <li><a href="<?php echo $url; ?>/kids/boys-clothing/sweatshirts/">Sweatshirts</a></li>                                    
                                  </ul>
                                </li>
                                <li><a href="<?php echo $url; ?>/kids/girls-clothing/"><strong>Girls Clothing</strong> </a>
                                  <ul>
                                    <li><a href="<?php echo $url; ?>/kids/girls-clothing/sweatshirts/">Sweatshirts</a></li>                                    
                                  </ul>
                                </li> 
                                <li><a href="<?php echo $url; ?>/kids/essentials"><strong>Essentials</strong></a></li>                               
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle">Art</a>
                            <ul class="sub-menu dropdown-menu">
                                <li><a href="<?php echo $url; ?>/art/">All Art</a></li>
                                <li><a href="<?php echo $url; ?>/art/fiber-art/"><strong>Fiber Art</strong></a></li>
                                <li><a href="<?php echo $url; ?>/art/paintings/"><strong>Paintings</strong></a></li>
                                <li><a href="<?php echo $url; ?>/art/prints/"><strong>Prints</strong></a></li>  
                            </ul>
                        </li> 

                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle">Home & Living</a>
                            <ul class="sub-menu dropdown-menu">
                              <li><a href="<?php echo $url; ?>/home-living/"><strong>All Home & Living</strong></a></li>
                              <li><a href="<?php echo $url; ?>/home-living/benches/">Benches</a></li>
                              <li><a href="<?php echo $url; ?>/home-living/blankets-throws/">Blankets & Throws</a></li>
                              <li><a href="<?php echo $url; ?>/home-living/ottomans/">Ottomans</a></li>
                              <li><a href="<?php echo $url; ?>/home-living/pillows/">Pillows</a></li>
                              <li><a href="<?php echo $url; ?>/home-living/stools/">Stools</a></li>
                            </ul>
                        <li>     
                    </ul>
                               
            </div>
            <!-- /.navbar-collapse -->

</div>
            </div>
            

            <div class="right-header">  
            <!-- search section -->
                  <div class="topheader">
          
              <div class="toprigh">
                <div class="header-right">
                  <?php
                  foreach(GLLHederGetsection() as $header_footer){
                    $iconjson = json_decode($header_footer['head_topbarstaus']);
                  ?>
                  <ul class="site-header-cart menu">
                      <?php
                        if($iconjson[0] == "1"){
                      ?>
                      <li>
                          <div class="btnsearch">
                              <i id="btnshow" class="a pe-7s-search"></i>
                              <i id="btnhide" class="a2 pe-7s-close"></i>
                          </div>                          
                      </li>
                      <?php } ?>
                      <?php
                        if($iconjson[2] == "1"){
                          if(isset($_SESSION['customersessionlogin'])){
                              $cutomervale = $_SESSION['customersessionlogin'];
                          }else{
                              $cutomervale = "0";
                          }
                          foreach(GetWhisListData($cutomervale) as $valueset){
                            $get_count[] = $valueset['whis_prd_id'];
                          }
                          $rray_countvl = count($get_count);
                      ?>
                      <li>
                        <a href="<?php echo $url; ?>/wishlist/" title=""><span class="count rounded-crcl"><?php echo $rray_countvl; ?></span>
                              <i class="pe-7s-like icon"></i>
                          </a>
                      </li>
                      <!--wish list-->
                      <?php } ?>
                      <?php
                        if($iconjson[1] == "1"){
                      ?>
                      <li>
                          <a href="<?php echo $url; ?>/cart/" title=""><span class="count rounded-crcl" id="load_cart_data">
                            <?php
                              if(isset($_SESSION['customersessionlogin'])){
                                  $customercountval = $_SESSION['customersessionlogin'];
                                  $cart_value = "SELECT * FROM cart_user WHERE cart_userid='$customercountval' AND cart_status='0'";
                              }else{
                                  $customercountval = "";
                                  $cart_value = "SELECT * FROM cart_user WHERE cart_user_ip='$ip' AND cart_userid='$customercountval' AND cart_status='0'";
                              }
                              $fecth_cvalue = $contdb->query($cart_value);
                              if($fecth_cvalue->num_rows > 0){
                                  while ($row_getprodocunt = $fecth_cvalue->fetch_array()) {
                                      $get_qunityvale += $row_getprodocunt['cart_prdo_qutity'];
                                  }
                                  echo $get_count = $get_qunityvale;
                              }else{
                                  echo $get_count = "0";
                              }
                              ?>
                            </span>
                              <i class="pe-7s-cart icon"></i>
                          </a>
                      </li>
                      <!--cart-->
                      <?php } ?>
                  </ul>
                  <?php
                    if($iconjson[3] == "1"){
                  ?>
                  <?php
                  if(isset($_SESSION['adminsessionlogin'])){
                      $redirect_path = "$url/admin-manager/index/";
                      $myaccountbutton = "<i class='pe-7s-users icon'></i><span>Admin Account</span>";
                  ?>
                  <ul class="login">
                      <li>
                        <a href="<?php echo $redirect_path; ?>" class="btn-login" >
                          <?php echo $myaccountbutton; ?>
                        </a>
                      </li>
                  </ul> 
                  <?php
                  }elseif(isset($_SESSION['vendorsessionlogin'])){
                      foreach(GetVenderDatavale($_SESSION['vendorsessionlogin']) as $datavale){
                        $ge_fname = $datavale['vendor_f_name'];
                        $firstchapt = substr($ge_fname, 0, 1);
                      }
                      /*echo '<ul class="login">
                                <li>
                                  <a href="javascript:void(0);" class="btn-login" ><i class="pe-7s-users icon"></i>
                                    <span>'.$firstchapt.'</span>
                                  </a>
                                  <div class="logboxR">                          
                                    <div class="usr_name">'.$firstchapt.'</div>
                                    <div class="usr_title">'.$ge_fname.'</div>
                                    <div class="usr_link"><a href="'.$url.'/vendor/dashboard/">Go to dasgboard</a></div>
                                    <div class="logut_link"><a href="'.$url.'/vendor/logout/">Log Out</a></div>
                                  </div>
                                </li>
                            </ul>';*/

                      $redirect_path = "$url/vendor/dashboard/";
                      $myaccountbutton = "<i class='pe-7s-users icon'></i><span>$ge_fname</span>";
                  ?>
                  <ul class="login">
                      <li>
                        <a href="<?php echo $redirect_path; ?>" class="btn-login" >
                          <?php echo $myaccountbutton; ?>
                        </a>
                      </li>
                  </ul>
                  <?php
                  }elseif(isset($_SESSION['customersessionlogin'])){
                    if(!empty(GetCustomerDataVal())){
                      foreach(GetCustomerDataVal($_SESSION['customersessionlogin']) as $get_cutsmename){
                        $fname_vale = $get_cutsmename['customer_fname'];
                      }
                    }else{
                      $fname_vale = "My Account";
                    }
                    $redirect_path = "$url/customer/dashboard/";
                    $myaccountbutton = "<i class='pe-7s-users icon'></i><span>$fname_vale</span>";
                  ?>
                  <ul class="login">
                      <li>
                        <a href="<?php echo $redirect_path; ?>" class="btn-login" >
                          <?php echo $myaccountbutton; ?>
                        </a>
                      </li>
                  </ul>
                  <?php 
                      /*echo '<ul class="login">
                                <li>
                                  <a href="javascript:void(0);" class="btn-login" ><i class="pe-7s-users icon"></i>
                                    <span>G</span>
                                  </a>
                                  <div class="logboxR">                          
                                    <div class="usr_name">G</div>
                                    <div class="usr_title">Guest User</div>
                                    <div class="usr_title">Be a regular customer</div>
                                    <div class="logut_link"><a href="'.$url.'/register/">Create an account</a></div>
                                  </div>
                                </li>
                            </ul>';*/
                    }else{
                      foreach(GetCustomerDataVal($_SESSION['customersessionlogin']) as $datavale){
                        $ge_fname = $datavale['customer_fname'].' '.$datavale['customer_lname'];
                        $firstchapt = substr($ge_fname, 0, 1);
                      }
                      /*echo '<ul class="login">
                                <li>
                                  <a href="javascript:void(0);" class="btn-login" ><i class="pe-7s-users icon"></i>
                                    <span>'.$firstchapt.'</span>
                                  </a>
                                  <div class="logboxR">                          
                                    <div class="usr_name">'.$firstchapt.'</div>
                                    <div class="usr_title">'.$ge_fname.'</div>
                                    <div class="usr_link"><a href="'.$url.'/customer/dashboard/">Go to dasgboard</a></div>
                                    <div class="logut_link"><a href="'.$url.'/customer/logout">Log Out</a></div>
                                  </div>
                                </li>
                            </ul>';*/
                    }
                  }else{
                      $redirect_path = "$url/login/";
                      $myaccountbutton = "<i class='pe-7s-users icon'></i><span>LOGIN / SIGN UP</span>";
                  ?>
                  <ul class="login">
                      <li>
                        <a href="<?php echo $redirect_path; ?>" class="btn-login" >
                          <?php echo $myaccountbutton; ?>
                        </a>
                      </li>
                  </ul>
                  <?php
                  }
                  ?>
                <?php }} ?>
            </div>
            <!--right-->
              </div>
            
        </div>
          </div>  
        </nav>
    </div>      
        
    </header>
    <!--header-->
<!---- Main Header Manu -->
<style type="text/css">
    #result span.red {
    padding: 9px 0px;
    margin-bottom: 15px;
    cursor: auto;
}
</style>
  <div class="main-banner inner-banner banner-scroll" style="background: url('<?php echo $url; ?>/assets/images/about-banner.jpg') no-repeat center center;">
        <div class="fixed-banner ">
            <div class="banner-content">
                <div class="content-wrap mb-0 banner-overlay">
                    <div class="inner">
                        <!-- <h2>Shop Page</h2> -->
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <!-- <li><a href="#">About Us</a></li> -->
                            <li class="active">Vendor Inquiry</li>
                        </ol>
                    </div>
                </div>
                <!--content wrap-->
            </div>
            <!--banner content-->
        </div>
    </div>
    <!--main banner-->

<section class="about-top p-tb50">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content-section">
                    <div class="login-section">
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--about top-->
<?php include 'includes/footer.php'; ?>


<script type="text/javascript">
  jQuery(function($) {
  // Add en remove class on menu item hover  
  $('.big-nav-pos_static > ul > li').mouseover(function(){
    $(this).addClass('show').siblings().removeClass('show');
  });
  
  // Get the minimum height the big-nav elemtn
  var min_height = 50;
  $('.big-nav-pos_static > ul > li > ul').each(function(){
    var this_height = $(this).outerHeight();
    if (this_height > min_height) min_height = this_height;
  });
  $('.big-nav-pos_static > ul, .nav .big-nav-pos_static > ul > li > ul').css('min-height', min_height + 'px');
  
});
</script>