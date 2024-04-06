<?php
foreach(GetProductDataValTab("0","0",$get_page_name) as $productdetils){

}
$get_url = explode('?',$_SERVER['REQUEST_URI']);
$url_makeexplod = explode('=', $get_url[1]);
if($url_makeexplod[0] == "selection"){
    $explode_vale = str_replace('-', ',', $url_makeexplod[1]);
    $final_attbuid = $explode_vale;
}else{
    $final_attbuid = "0";
}

$productvaleset = $productdetils['product_color'];
if($productvaleset == ""){
    $productvale = $productdetils['product_auto_id'];
}else{
    $checking_datavale = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$productvaleset'";
    $queryvalest = $contdb->query($checking_datavale);
    if($queryvalest->num_rows > 0){
        $productvale = $productdetils['product_color'];
    }else{
        $productvale = $productdetils['product_auto_id'];
    }
}
$arraycountpd = explode(',', $productvale);
foreach($arraycountpd as $stockcountarray){
    $get_hold_idtotle = "SELECT * FROM product_active_attbut WHERE attbut_productid='$stockcountarray'";
    $queryarrayset = $contdb->query($get_hold_idtotle);
    if($queryarrayset->num_rows > 0){
        $makevertionval[] = $productvale;
    }else{
        $makevertionval[] = $productdetils['product_color'];
    }
}
$unql_val = array_unique($makevertionval);
$implodevaertion = implode('', $unql_val);

/*===== Most View Products =====*/
mostviewproductsdatvale($productdetils['product_auto_id'],$get_page_name);
?>
<?php include 'includes/main-header.php'; ?>
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="<?php echo $url; ?>/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> <?php echo $productdetils['product_name']; ?>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50 mt-30">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        <figure class="border-radius-10">
                                            <img src="<?php echo $url; ?>/images/<?php echo $productdetils['product_image']; ?>" alt="product image">
                                        </figure>
                                        <?php
                                            foreach(GetProductSmallImage($productdetils['product_auto_id']) as $multiimages){
                                            $pdname = $multiimages['produt_img'];
                                            $arrayvale[] = array("src" => "$url/images/$pdname","opts" => array("thumb" => "$url/images/$pdname"));
                                            /*print_r($arrayvale);*/
                                        ?>
                                        <figure class="border-radius-10">
                                            <img src="<?php echo $url; ?>/images/<?php echo $multiimages['produt_img']; ?>" alt="product image">
                                        </figure>
                                        <?php
                                            }
                                            $array_jsoncode = substr(json_encode($arrayvale), 1);
                                        ?>
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails">
                                        <div><img src="<?php echo $url; ?>/images/<?php echo $productdetils['product_image']; ?>" alt="product image"></div>
                                        <?php
                                            foreach(GetProductSmallImage($productdetils['product_auto_id']) as $multiimages){
                                            $pdname = $multiimages['produt_img'];
                                            $arrayvale[] = array("src" => "$url/images/$pdname","opts" => array("thumb" => "$url/images/$pdname"));
                                            /*print_r($arrayvale);*/
                                        ?>
                                        <div><img src="<?php echo $url; ?>/images/<?php echo $multiimages['produt_img']; ?>" alt="product image"></div>
                                        <?php
                                            }
                                            $array_jsoncode = substr(json_encode($arrayvale), 1);
                                        ?>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info pr-30 pl-30">
                                    <?php
                                    	if($productdetils['product_regular_price'] == "0" || $productdetils['product_regular_price'] == ""){
                                            if($final_attbuid == "0"){
                                                StockProdutVertionval($productvale);
                                            }else{
                                                StockProdutVertionval($productvale,$final_attbuid);
                                            }
                                    	}else{
                                    		if($productdetils['product_stock'] == ""){
                                    			echo "<span class='stock-status in-stock'> In Stock</span>";
                                                echo '<input type="hidden" id="stokqunt" value="10">';
                                    		}elseif($productdetils['product_stock'] == "0"){
                                                echo "<span class='stock-status out-stock'>Out Of Stock</span>";
                                                echo '<input type="hidden" id="stokqunt" value="'.$productdetils['product_stock'].'">';
                                            }else{
                                    			echo "<span class='stock-status in-stock'> (".$productdetils['product_stock'].") In Stock</span>";
                                                echo '<input type="hidden" id="stokqunt" value="'.$productdetils['product_stock'].'">';
                                    		}
                                    	}
                                    ?>
                                    <h2 class="title-detail"><?php echo $productdetils['product_name']; ?></h2>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <?php
                                            if($productdetils['product_regular_price'] == "0" || $productdetils['product_regular_price'] == ""){
                                                if($final_attbuid == "0"){
                                                    SingleProductPagePrice($productvale);
                                                }else{
                                                    SingleProductPagePrice($productvale,$final_attbuid);
                                                }
                                            }else{
                                                echo GetProductPriceVal($productdetils['product_auto_id']);
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="short-desc mb-30">
                                        <p class="font-lg"><?php echo $productdetils['product_short_des']; ?></p>
                                    </div>
                                    <!--variation-->
                                    <?php
                                    //echo $implodevaertion;
                                    if($productdetils['product_regular_price'] == "0" || $productdetils['product_regular_price'] == ""){
                                        if($final_attbuid == "0"){
                                            VertionsSetSinglePD($implodevaertion);
                                        }else{
                                            VertionsSetSinglePD($implodevaertion,$final_attbuid);
                                        }
                                    }
                                    ?>
                                    <div class="detail-extralink mb-10">
                                        <div class="detail-qty border radius seletionsingle">
                                            <select class="qtyValue input-text qty qty-val" id="pdqunity">
                                                <?php
                                                    if($productdetils['product_stock']){
                                                        $prodcutstok = $productdetils['product_stock'];
                                                    }else{
                                                        $prodcutstok = "3";
                                                    }
                                                    for ($x = 1; $x <= $prodcutstok; $x++) {
                                                      echo "<option value='$x'>$x</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="product-extra-link2">
                                            <?php
                                            if($productdetils['product_regular_price'] == "0" || $productdetils['product_regular_price'] == ""){
                                                if($final_attbuid == "0"){
                                                    AddToCartButtonSet($productvale,$productdetils['product_auto_id'],0,$get_page_name);
                                                }else{
                                                    AddToCartButtonSet($productvale,$productdetils['product_auto_id'],$final_attbuid,$get_page_name);
                                                }
                                            }else{
                                                $singlepdid = $productdetils['product_auto_id'];
                                                $get_cart_val_singl = "SELECT * FROM cart_user WHERE cart_prdo_auto_id='$singlepdid' AND cart_user_ip='$ip'";
                                                $get_valsetset_sing = $contdb->query($get_cart_val_singl);
                                                if($get_valsetset_sing->num_rows > 0){
                                                    if($productdetils['product_stock'] == ""){
                                                        echo '<button class="button alt adtoCartSingle alredyadd button-add-to-cart" pid="'.$productdetils['id'].'" onclick="return gtag_report_conversion('.$url.'/'.$get_page_name.')" title="Already in cart">
                                                                <i class="fi-rs-shopping-cart"></i> Add to Cart
                                                            </button>';
                                                    }elseif($productdetils['product_stock'] == "0"){
                                                    }else{
                                                        echo '<button class="button alt adtoCartSingle alredyadd button-add-to-cart" pid="'.$productdetils['id'].'" onclick="return gtag_report_conversion('.$url.'/'.$get_page_name.')" title="Already in cart">
                                                                <i class="fi-rs-shopping-cart"></i> Add to Cart
                                                            </button>';
                                                    }
                                                }else{
                                                    if($productdetils['product_stock'] == ""){
                                                        echo '<button class="button alt adtoCartSingle button-add-to-cart" pid="'.$productdetils['id'].'" onclick="return gtag_report_conversion('.$url.'/'.$get_page_name.')">
                                                                <i class="fi-rs-shopping-cart"></i> Add to Cart
                                                            </button>';
                                                    }elseif($productdetils['product_stock'] == "0"){
                                                    }else{
                                                        echo '<button class="button alt adtoCartSingle button-add-to-cart" pid="'.$productdetils['id'].'" onclick="return gtag_report_conversion('.$url.'/'.$get_page_name.')">
                                                                <i class="fi-rs-shopping-cart"></i> Add to Cart
                                                            </button>';
                                                    }
                                                }
                                            }
                                            ?>
                                            <?php
                                            $singlepdidwish = $productdetils['product_auto_id'];
                                            if(isset($_SESSION['customersessionlogin'])){
                                                $cutomerid = $_SESSION['customersessionlogin'];
                                                $selt_btnvale_whis = "SELECT * FROM wishlistbl_table WHERE whis_prd_id='$singlepdidwish' AND whis_customerd='$cutomerid'";
                                            }else{
                                                $selt_btnvale_whis = "SELECT * FROM wishlistbl_table WHERE whis_prd_id='$singlepdidwish' AND whis_ip='$ip'";
                                            }
                                            $query_valeuset = $contdb->query($selt_btnvale_whis);
                                            if($query_valeuset->num_rows > 0){
                                            ?>
                                            <a class="button-wish adtoLike alredyadd action-btn hover-up" data-id="<?php echo $productdetils['product_auto_id']; ?>">
                                                <i class="fi-rs-heart"></i>
                                            </a>
                                            <?php }else{ ?>
                                                <a class="button-wish adtoLike action-btn hover-up" data-id="<?php echo $productdetils['product_auto_id']; ?>">
                                                    <i class="fi-rs-heart"></i>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="font-xs">
                                        <ul class="mr-50 float-start">
                                            <li class="mb-5">SKU: <span class="text-brand"><?php echo $productdetils['product_sku']; ?></span></li>
                                            <li class="mb-5">Category:
                                            <?php 
                                            foreach(explode(',', $productdetils['product_catger_ids']) as $ids_vale){
                                                foreach(getCatagrioyesDataVal($ids_vale,11) as $get_catgoyval){
                                                    $valuesetdat[] = "<span class='text-brand ml-5'><a href='$url/".$get_catgoyval['prd_cat_main_url']."/' rel='".$get_catgoyval['prd_cat_name']."'>".$get_catgoyval['prd_cat_name']."</a></span>";
                                                }
                                            }
                                            echo $imploevale = implode(', ', $valuesetdat);
                                                /*$get_explodeva = substr($productdetils['product_catger'], 0, -1);
                                                foreach(explode(',', $get_explodeva) as $catgoryval){
                                                    $valuedat[] = $catgoryval.', ';
                                                }
                                                echo $valuedtval = substr(implode('', $valuedat), 0, -2);*/
                                            ?>
                                            </li>
                                            <?php
                                            foreach(GetVenderDatavale($productdetils['product_vender_id']) as $vensorname){
                                            ?>
                                            <li class="mb-5">Products by: <a href='<?php echo $url; ?>/<?php echo $vensorname['vendor_uni_name']; ?>'><span class="in-stock text-brand ml-5"><?php echo $vensorname['vendor_f_name']; ?> <?php echo $vensorname['vendor_l_name']; ?></span></a></li>
                                            <?php } ?>
                                            <li>Shipped from: <span class="in-stock text-brand ml-5"><?php echo $vensorname['vendor_country']; ?></span></li>
                                        </ul>
                                        <!--<ul class="float-start">
                                        <li>Share</li>
                                        <li><a href="mailto:?subject=<?php echo $productdetils['product_name']; ?>&body=I want to purchase <?php echo $url; ?>/<?php echo $get_page_name; ?>"><i class="fa fa-envelope-o"></i></a></li>
                                        <li><a href="http://www.facebook.com/sharer.php?u=<?php echo $url; ?>/<?php echo $get_page_name; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>/<?php echo $get_page_name; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>/<?php echo $get_page_name; ?>&title=<?php echo $productdetils['product_name']; ?>&summary=<?php echo $productdetils['product_short_des']; ?>&source=LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="https://www.instagram.com/sharer.php?u=<?php echo $url; ?>/<?php echo $get_page_name; ?>" target="_blank"><i class="fa fa-instagram "></i></a></li>
                                        </ul>-->
                                    </div>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Product Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">About Creator</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Shipping and Returns</a>
                                    </li>
                                    <!--<li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                                    </li>-->
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <?php echo $productdetils['product_destion']; ?>
                                    </div>
                                    <div class="tab-pane fade" id="Additional-info">
                                        <?php 
                                      		foreach(GetAboutVendor($productdetils['product_vender_id'],"vendor") as $aboutval){
                                      			echo $aboutval['about_content']; 
                                      		}
                                  		?>
                                    </div>
                                    <div class="tab-pane fade" id="Vendor-info">
                                        <?php 
                                      		foreach(GetShppingTreamValue($productdetils['product_vender_id'],"vendor") as $trimhppin){
                                      			echo $trimhppin['terms']; 
                                      		}
                                  		?>
                                    </div>
                                    <!--div class="tab-pane fade" id="Reviews">
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h4 class="mb-30">Customer questions & answers</h4>
                                                    <div class="comment-list">
                                                        <div class="single-comment justify-content-between d-flex mb-30">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="assets/imgs/blog/author-2.png" alt="">
                                                                    <a href="#" class="font-heading text-brand">Sienna</a>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="d-flex justify-content-between mb-10">
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                        </div>
                                                                        <div class="product-rate d-inline-block">
                                                                            <div class="product-rating" style="width: 100%"></div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-comment justify-content-between d-flex mb-30 ml-30">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="assets/imgs/blog/author-3.png" alt="">
                                                                    <a href="#" class="font-heading text-brand">Brenna</a>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="d-flex justify-content-between mb-10">
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                        </div>
                                                                        <div class="product-rate d-inline-block">
                                                                            <div class="product-rating" style="width: 80%"></div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="assets/imgs/blog/author-4.png" alt="">
                                                                    <a href="#" class="font-heading text-brand">Gemma</a>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="d-flex justify-content-between mb-10">
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                        </div>
                                                                        <div class="product-rate d-inline-block">
                                                                            <div class="product-rating" style="width: 80%"></div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4 class="mb-30">Customer reviews</h4>
                                                    <div class="d-flex mb-30">
                                                        <div class="product-rate d-inline-block mr-15">
                                                            <div class="product-rating" style="width: 90%"></div>
                                                        </div>
                                                        <h6>4.8 out of 5</h6>
                                                    </div>
                                                    <div class="progress">
                                                        <span>5 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>4 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>3 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>2 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                                    </div>
                                                    <div class="progress mb-30">
                                                        <span>1 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                                    </div>
                                                    <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-form">
                                            <h4 class="mb-15">Add a review</h4>
                                            <div class="product-rate d-inline-block mb-30"></div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    <form class="form-contact comment_form" action="#" id="commentForm">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="button button-contactForm">Submit Review</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h2 class="section-title style-1 mb-30">Related products</h2>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    <?php
                                        foreach(RelatedProductSinglepd($productdetils['product_recomateprd'],$productdetils['product_vender_id']) as $recommend){
                                    ?>
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="<?php echo $url; ?>/<?php echo $recommend['product_page_name']; ?>" tabindex="0">
                                                        <img class="default-img" src="<?php echo $url; ?>/images/<?php echo $recommend['product_image']; ?>" alt="">
                                                        <?php
                                                            foreach(GetProductSmallImage($recommend['product_auto_id'],1) as $multiimagesval){
                                                                echo "<img class='hover-img' src='$url/images/".$multiimagesval['produt_img']."' alt='Product'>";
                                                            }
                                                        ?>
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <?php
                                                        if(isset($_SESSION['customersessionlogin'])){
                                                            echo GetAddtoWishList($recommend['product_auto_id'],$_SESSION['customersessionlogin']);
                                                        }else{
                                                           echo GetAddtoWishList($recommend['product_auto_id']);
                                                        }
                                                    ?>
                                                    <?php echo GetAddtocartButton($recommend['product_auto_id']); ?>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="<?php echo $url; ?>/<?php echo $recommend['product_page_name']; ?>" tabindex="0"><?php echo $recommend['product_name']; ?></a></h2>
                                                <div class="product-price">
                                                    <?php
                                                        echo GetProductPriceVal($recommend['product_auto_id']);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>