<?php
$arrya_catgoyval = explode('?', $_SERVER['REQUEST_URI']);
$string_url = trim(substr($arrya_catgoyval[0], 1));

$reove_valuevalue = explode("/", $string_url )[1];






$get_productcont=[];
foreach(ProductCatagroyShow($reove_valuevalue) as $prodyutcatgoy){
    $catagoryname = $prodyutcatgoy['prd_cat_name'];
    $prodyutcatgoyids = $prodyutcatgoy['id'];
    foreach(ProductCatagoyViewData($prodyutcatgoy['id']) as $prodyutcatgoy){
        $get_productcont[] = $prodyutcatgoy;
    }
}
?>



<style>
    .price-filter-inner input[type="radio"] {
        width: 10%;
        height: auto;
    }
</style>
<?php include 'includes/main-header.php';?>
<main class="main">
        <div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-12">
                            <h1 class="mb-15 text-capitalize"><?php echo $catagoryname; ?></h1>
                            <div class="breadcrumb">
                                <a href="<?php echo $url; ?>/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span> <?php echo $catagoryname; ?>
                            </div>
                        </div>
                        <!--<div class="col-xl-9 text-end d-none d-xl-block">
                            <ul class="tags-list">
                                <li class="hover-up">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Cabbage</a>
                                </li>
                                <li class="hover-up active">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Broccoli</a>
                                </li>
                                <li class="hover-up">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Artichoke</a>
                                </li>
                                <li class="hover-up">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Celery</a>
                                </li>
                                <li class="hover-up mr-0">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Spinach</a>
                                </li>
                            </ul>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <?php
                        $backtbuurl = explode('/',$_SERVER['REQUEST_URI']);
                        $mainpage = $backtbuurl[2];
                        if(!empty($mainpage)){
                        ?>
                        <div class="totall-product">
                            <button onclick="history.go(-1);" class="btn btn-success">Back </button>
                        </div>
                        <?php
                        }
                            if($final_attbuid == "0" || $final_attbuid == ""){
                            }else{
                                echo "<a href='$url".$arrya_catgoyval[0]."' class='btn btn-success'>Clear</a>";
                            }
                        ?>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Showing:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 1–<?php echo count($get_productcont); ?> of <?php echo count($get_productcont); ?> results </span>
                                    </div>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <?php
                                        $get_url = explode('?',$_SERVER['REQUEST_URI']);
                                        $url_makeexplod = explode('q=', $get_url[1]);
                                        if($url_makeexplod[1] !== ""){
                                            $final_attbuid = $url_makeexplod[1];
                                        }else{
                                            $final_attbuid = "0";
                                        }
                                    $page_name_getuel = explode("?", $_SERVER['REQUEST_URI']);
                                    ?>
                                    <select name="orderby" class="orderby price-sorting type-regular">
                                        <?php
                                            if($final_attbuid == "0"){
                                        ?>
                                        <option value="0" selected>Sort by Price</option>
                                        <option value="l2h">Low to high</option>
                                        <option value="h2l">High to low</option>
                                        <?php
                                            }elseif($final_attbuid == "low-price"){
                                        ?>
                                        <option value="0">Sort by Price</option>
                                        <option value="l2h" selected>Low to high</option>
                                        <option value="h2l">High to low</option>
                                        <?php
                                            }elseif($final_attbuid == "high-low"){
                                        ?>
                                        <option value="0">Sort by Price</option>
                                        <option value="l2h">Low to high</option>
                                        <option value="h2l" selected>High to low</option>
                                        <?php
                                            }else{
                                        ?>
                                        <option value="0">Sort by Price</option>
                                        <option value="l2h">Low to high</option>
                                        <option value="h2l">High to low</option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid products product-shop clearfix products-grid" id="paginate">
                        <?php
                        
                        foreach(ProductCatagroyShow($reove_valuevalue) as $valucat){

                        }

                        
                            foreach(ProductCatagoyViewData($valucat['id'],$final_attbuid) as $prdcatvae){
                                

                               
                                 foreach(GetProductDataValTab($prdcatvae) as $prodyutcatgoy){

                                  
                                //    echo $prodyutcatgoy['product_vender_id'];

                                // shuffle($prodyutcatgoy['product_vender_id']);
                                // echo ($prodyutcatgoy['product_auto_id']);
                         

                            
                                $careterid[] = $prodyutcatgoy['product_vender_id'];
                               

                                $productprice = shortingGetProductPriceVal($prodyutcatgoy['product_auto_id']);
                                // echo ($prodyutcatgoy['product_auto_id']);
                        ?>

         

                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 product <?php echo $prodyutcatgoy['product_auto_id']; ?>" data-price="<?php echo $productprice; ?>">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="<?php echo $url; ?>/<?php echo $prodyutcatgoy['product_page_name']; ?>">
                                            <img class="default-img" src="<?php echo $url; ?>/images/<?php echo $prodyutcatgoy['product_image']; ?>" alt="">
                                            <?php
                                                foreach(GetProductSmallImage($prodyutcatgoy['product_auto_id'],1) as $multiimagesval){
                                                    echo "<img  class='hover-img' src='$url/images/".$multiimagesval['produt_img']."' alt='Product'>";
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
                                <div class="mt-10 product-content-wrap">
                                    <h2><a href="<?php echo $url; ?>/<?php echo $prodyutcatgoy['product_page_name']; ?>"><?php echo $prodyutcatgoy['product_name']; ?></a></h2>
                                    <div>
                                        <span class="font-small text-muted">By 
                                        <?php 
                                            foreach(GetVenderDatavale($prodyutcatgoy['product_vender_id']) as $vervaldt){
                                                echo $vervaldt['vendor_f_name']." ".$vervaldt['vendor_l_name'];
                                            }
                                        ?>
                                        </span>
                                    </div>
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
                            }}
                        ?> 
                        <!--end product card-->
                    </div>
                    <!--product grid-->
                    <div class="pagination-area mt-20 mb-20">
                        <!--product list-->
                        <input type='hidden' class='current_page' />
                        <input type='hidden' class='show_per_page' />
                        <div class='page_navigation removalaesat'></div>
                    </div>
                    <!--End Deals-->
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    <div class="sidebar-widget-2 widget_search mb-50">
                        <div class="search-form searchsku">
                            <form action="">
                                <input type="search" name="q" class="search-sku" onkeyup="buttonUp();" required placeholder="Search Name / SKU">
                                <button type="submit" class="searchbtn-sku"><i class="fi-rs-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30 text-capitalize"><?php echo $catagoryname; ?></h5>
                        <ul>
                            <?php
                                echo categoryPageSetTree(0,$prodyutcatgoyids);
                            ?>
                        </ul>
                    </div>
                    <!-- Fillter By Price -->
                    <div class="sidebar-widget range mb-30">
                        <h5 class="section-title style-1 mb-30">Price Range</h5>
                        <div class="price-filter">
                            <div class="price-filter-inner">
                                <ul>
                                    <li>
                                        <div class="checkbox">
                                            <input type="radio" rel="category-one" name="priceval" value="1-100" data-min="1" data-max="100" <?php if($final_attbuid == "1-100"){ echo "checked"; } ?>/> 
                                            <label><span>Under</span> To <span>₹100</span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <input type="radio" rel="category-one" name="priceval" value="100-500" <?php if($final_attbuid == "100-500"){ echo "checked"; } ?> /> 
                                            <label><span>₹100</span> To <span>₹500</span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <input type="radio" rel="category-one" name="priceval" value="500-1000" <?php if($final_attbuid == "500-1000"){ echo "checked"; } ?>/> 
                                            <label><span>₹500</span> To <span>₹1000</span></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <input type="radio" rel="category-one" name="priceval" value="1000-5000" <?php if($final_attbuid == "1000-5000"){ echo "checked"; } ?>/> 
                                            <label><span>₹1000</span> To <span>₹5000</span></label>
                                        </div>
                                    </li>  
                                    <li>
                                        <div class="checkbox">
                                            <input type="radio" rel="category-one" name="priceval" value="5000-10000" <?php if($final_attbuid == "5000-10000"){ echo "checked"; } ?>/> 
                                            <label><span>₹5000</span> To <span>₹10000</span></label>
                                        </div>
                                    </li> 
                                    <li>
                                        <div class="checkbox">
                                            <input type="radio" rel="category-one" name="priceval" value="10000-99999999" <?php if($final_attbuid == "10000-99999999"){ echo "checked"; } ?>/> 
                                            <label><span>Over</span> <span>₹10000</span></label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30 text-capitalize">Creators</h5>
                        <ul>
                            <?php
                            $maincareterid = array_unique($careterid);
                            foreach($maincareterid as $vendorname){
                                foreach(GetVenderDatavale($vendorname) as $vervaldt_list){

                                    if(CheckVendorDataVal($vervaldt_list['vendor_auto']) == 0){
                                    }else{
                                        $array_alphe[] = array($vervaldt_list['vendor_f_name'].' '.$vervaldt_list['vendor_l_name'].'///'.$vervaldt_list['vendor_auto']);
                                    }
                                }
                            }
                            asort($array_alphe);
                            foreach($array_alphe as $valuredat){
                                foreach($valuredat as $morarrysort){
                                    $explodedat = explode('///', $morarrysort);
                                    //print_r($explodedat);
                                    $fullnameval = $explodedat[0];
                                    $autoidval = $explodedat[1];
                                    echo '<li><a href="'.$url.''.$page_name_getuel[0].'?q='.$autoidval.'">'.$fullnameval.'</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>