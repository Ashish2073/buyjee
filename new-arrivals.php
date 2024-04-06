<?php include 'includes/upper-header.php'; ?>  

<?php include 'includes/main-header.php'; ?>

<main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="<?php echo $url; ?>/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Shop
                </div>
            </div>
        </div>
        <div class="page-content pt-80 pb-80">
            <div class="container">
                <div class="row  product-grid-4">
                    <?php
                      foreach(GllHomenewarvil("150") as $productnewarl){
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
                            <div class="product-content-wrap">
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
                </div>
            </div>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>