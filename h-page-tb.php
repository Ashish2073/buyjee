<?php include 'includes/main-header.php'; ?>
<main class="main">
        <section class="home-slider position-relative mb-10">
            <div class="container-fluid pl-0 pr-0">
                <div class="home-slide-cover">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                        <?php
                            foreach(GLLGetSliderData() as $sliderloop){
                                $useragent=$_SERVER['HTTP_USER_AGENT'];
                                if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
                                    $sliderimage = $sliderloop['slid_mob_img'];
                                }else{
                                    $sliderimage = $sliderloop['slid_image'];
                                }
                                if($sliderloop['slid_status'] == "1"){
                                $sliderurl = json_decode($sliderloop['slid_url']);
                        ?>     
                        <div class="single-hero-slider single-animation-wrap" style="background-image: url(<?php echo $url; ?>/images/<?php echo $sliderimage; ?>)">
                            <div class="slider-content">
                                <h1 class="display-2 mb-40"><?php echo $sliderloop['slid_upertitle']; ?></h1>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
        </section>
        <!--End hero slider-->
        <section class="popular-categories section-padding">
            <div class="container wow animate__animated animate__fadeIn">
                <div class="section-title">
                    <div class="title w-100">
                        <h3 class="w-100 pb-2 border-bottom">Categories <a href="<?php echo $url; ?>/all-categories/" class="btn btn-success float-end">View All </a></h3>
                    </div>
                    <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
                </div>
                <div class="carausel-10-columns-cover position-relative">
                    <div class="carausel-10-columns" id="carausel-10-columns">
                        <?php
                            foreach(ProductCatagroyShow() as $catgoryvale){
                                $catgroyimagfe = json_decode($catgoryvale['prd_cat_imagevale']);
                        ?>
                        <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <figure class="img-hover-scale  overflow-hidden">
                                <a href="<?php echo $url; ?>/<?php echo $catgoryvale['prd_cat_main_url']; ?>"><img class="addblockfile" src="<?php echo $url; ?>/images/<?php echo $catgroyimagfe[0]; ?>" alt="">
                                </a>
                            </figure>
                            <h6><a href="<?php echo $url; ?>/<?php echo $catgoryvale['prd_cat_main_url']; ?>"><?php echo $catgoryvale['prd_cat_name']; ?></a></h6>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!--End category slider-->
        <section class="banners mb-25">
            <div class="container">
                <div class="row">
                    <?php
                        foreach(GetAdsSectionVal() as $adssection){
                            if($adssection['adsimg_status'] == "1"){
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <a href="<?php echo $adssection['adsimg_url']; ?>" target="<?php echo $adssection['adsimg_urltarget']; ?>">
                                <img src="<?php echo $url; ?>/images/<?php echo $adssection['adsimg_image']; ?>" alt="">
                                <!--<div class="banner-text">-->
                                <!--    <h4><?php echo $adssection['adsimg_name']; ?></h4>-->
                                <!--    <a  class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>-->
                                <!--</div>-->
                            </a>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </section>
        <!--End banners-->
        <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title title style-2 wow animate__animated animate__fadeIn">
                    <h3 class="w-100 pb-2 border-bottom">All Products</h3>
                    <span class="boxviewall"><a href="<?php echo $url; ?>/new-arrivals/">View All</a></span>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            <?php
                                  foreach(GllHomenewarvil("15") as $productnewarl){
                              ?>
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="<?php echo $url; ?>/<?php echo $productnewarl['product_page_name']; ?>">
                                                <img class="default-img" src="<?php echo $url; ?>/images/<?php echo $productnewarl['product_image']; ?>" alt="">
                                                <?php
                                                      foreach(GetProductSmallImage($productnewarl['product_auto_id'],1) as $multiimagesval){
                                                          echo "<img class='hover-img' src='$url/images/".$multiimagesval['produt_img']."' alt='Product'>";
                                                      }
                                                  ?>
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <?php
                                                  if(isset($_SESSION['customersessionlogin'])){
                                                      echo GetAddtoWishList($productnewarl['product_auto_id'],$_SESSION['customersessionlogin']);
                                                  }else{
                                                     echo GetAddtoWishList($productnewarl['product_auto_id']);
                                                  }
                                              ?>
                                        </div>
                                        <!--<div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="sale">17%</span>
                                        </div>-->
                                    </div>
                                    <div class="product-content-wrap mt-15">
                                        <h2><a href="<?php echo $url; ?>/<?php echo $productnewarl['product_page_name']; ?>"><?php echo $productnewarl['product_name']; ?></a></h2>
                                        <div>
                                            <span class="font-small text-muted">By <?php 
                          foreach(GetVenderDatavale($productnewarl['product_vender_id']) as $vervaldt){
                              echo $vervaldt['vendor_f_name']." ".$vervaldt['vendor_l_name'];
                          }
                      ?></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <?php
                                                      echo GetProductPriceVal($productnewarl['product_auto_id']);
                                                  ?>
                                            </div>
                                            <div class="add-cart">
                                                <?php echo GetAddtocartButton($productnewarl['product_auto_id']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!--end product card-->
                        </div>
                        <!--End product-grid-4-->
                    </div>
                </div>
                <!--End tab-content-->
            </div>
        </section>
        <!--Products Tabs-->
        <section class="section-padding mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 mb-sm-12 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <h4 class="section-title style-1 mb-30 animated animated">RECENTLY VIEWED PRODUCTS</h4>
                        <div class="product-list-small animated animated row">
                            <?php
                                foreach(MotViewProdctsViewData() as $recommendview){
                            ?>
                            <div class="col-xl-3 col-lg-3 col-md-3 mb-sm-3 mb-40">
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="<?php echo $url; ?>/<?php echo $recommendview['product_page_name']; ?>"><img src="<?php echo $url; ?>/images/<?php echo $recommendview['product_image']; ?>" alt=""></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="<?php echo $url; ?>/<?php echo $recommendview['product_page_name']; ?>"><?php echo $recommendview['product_name']; ?></a>
                                        </h6>
                                        <div class="product-price">
                                            <?php
                                                echo GetProductPriceVal($recommendview['product_auto_id']);
                                            ?>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End 4 columns-->
    </main>