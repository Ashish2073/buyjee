<?php
$singvenderid = urlmakeid($get_page_name);
$chkingurl = CheckVendorDataVal($singvenderid);
if($chkingurl == "0"){
  echo "<script>window.location.href='$url';</script>";
}
foreach(GetVenderDatavale($singvenderid) as $valuevend){

}
?>

<?php include 'includes/main-header.php'; ?>
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="<?php echo $url; ?>/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> <?php echo vendorName($singvenderid); ?>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="archive-header-3 mt-30 mb-80" style="background-image: url(<?php echo vendorSlider($singvenderid); ?>)">
                <div class="archive-header-3-inner">
                    <div class="vendor-logo mr-50">
                        <?php echo vendorProfileImage($singvenderid); ?>
                    </div>
                    <div class="vendor-content">
                        <h3 class="mb-5 text-white"><?php echo vendorName($singvenderid); ?></h3>
                        <div class="row">
                            <!--<div class="col-lg-3">
                                <div class="vendor-info text-white mb-15">
                                    <ul class="font-sm">
                                        <li><img class="mr-5" src="assets/imgs/theme/icons/icon-location.svg" alt=""><strong>Address: </strong> <span>5171 W Campbell Ave undefined, Utah 53127 United States</span></li>
                                        <li><img class="mr-5" src="assets/imgs/theme/icons/icon-contact.svg" alt=""><strong>Call Us:</strong><span>(+91) - 540-025-124553</span></li>
                                    </ul>
                                </div>
                            </div>-->
                            <!--<div class="col-lg-4">
                                <div class="follow-social">
                                    <h6 class="mb-15 text-white">Follow Us</h6>
                                    <ul class="social-network">
                                        <li class="hover-up">
                                            <a href="#">
                                                <img src="assets/imgs/theme/icons/social-tw.svg" alt="">
                                            </a>
                                        </li>
                                        <li class="hover-up">
                                            <a href="#">
                                                <img src="assets/imgs/theme/icons/social-fb.svg" alt="">
                                            </a>
                                        </li>
                                        <li class="hover-up">
                                            <a href="#">
                                                <img src="assets/imgs/theme/icons/social-insta.svg" alt="">
                                            </a>
                                        </li>
                                        <li class="hover-up">
                                            <a href="#">
                                                <img src="assets/imgs/theme/icons/social-pin.svg" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3><?php echo vendorName($singvenderid); ?></h3>
                    <ul class="nav nav-tabs links" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">All Products</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">About Creator</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">Shipping and Returns</button>
                        </li>
                    </ul>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            <?php
                                foreach(vendorProductMainPage($singvenderid) as $prodyutcatgoy){
    
                                $careterid[] = $prodyutcatgoy['product_vender_id'];
                                //print_r($makeprice);
                                $productprice = shortingGetProductPriceVal($prodyutcatgoy['product_auto_id']);
                            ?>
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="<?php echo $url; ?>/<?php echo $prodyutcatgoy['product_page_name']; ?>">
                                                <img class="default-img" src="<?php echo $url; ?>/images/<?php echo $prodyutcatgoy['product_image']; ?>" alt="">
                                                <?php
                                                    foreach(GetProductSmallImage($prodyutcatgoy['product_auto_id'],1) as $multiimagesval){
                                                        echo "<img class='hover-img' src='$url/images/".$multiimagesval['produt_img']."' alt='Product'>";
                                                    }
                                                ?>
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <?php
                                                if(isset($_SESSION['customersessionlogin'])){
                                                    echo GetAddtoWishList($prodyutcatgoy['product_auto_id'],$_SESSION['customersessionlogin']);
                                                }else{
                                                   echo GetAddtoWishList($prodyutcatgoy['product_auto_id']);
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="<?php echo $url; ?>/<?php echo $prodyutcatgoy['product_page_name']; ?>"><?php echo $prodyutcatgoy['product_name']; ?></a></h2>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <?php
                                                    echo GetProductPriceVal($prodyutcatgoy['product_auto_id']);
                                                ?>
                                            </div>
                                            <div class="add-cart">
                                                <?php echo GetAddtocartButton($prodyutcatgoy['product_auto_id']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                            <!--end product card-->
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab one-->
                    <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                        <div class="row product-grid-4">
                            <div class="boxsettingbox">
                                <h4 class="section-title style-1 mb-30 animated animated">About Creator</h4>
                                <?php echo aboutVendor($singvenderid); ?>
                            </div>
                            <!--end product card-->
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab two-->
                    <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                        <div class="row product-grid-4">
                            <div class="boxsettingbox">
                                <h4 class="section-title style-1 mb-30 animated animated">Shipping and Returns</h4>
                                <?php echo termsCondition($singvenderid); ?>
                            </div>
                            <!--end product card-->
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab three-->
                </div>
                <!--End tab-content-->
            </div>
        </section>
        </div>
    </main>