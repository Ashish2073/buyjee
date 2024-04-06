<?php include 'includes/upper-header.php'; ?>

<?php include 'includes/main-header.php';?>
<style type="text/css">
li#data131 {
    display: none;
}
.hideshow{
        display: none;
    }
</style>
<?php
$get_prod_val = explode('?',$_SERVER['REQUEST_URI']);
$url_makeexplod = explode('st=', $get_prod_val[1]);
?>
<main class="main">
        <div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-12">
                            <h1 class="mb-15">Search</h1>
                            <div class="breadcrumb">
                                <a href="<?php echo $url; ?>/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span> Search <span></span> <?php echo $url_makeexplod[1]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-12">
                    <div class="row product-grid products product-shop" id="paginate">
                        <?php
                          $explodevale_seond = explode('&price=', $url_makeexplod[1]);
                          if($explodevale_seond[1] == ""){
                            $get_url_valeu = SearchBoxMain($url_makeexplod[1]);
                          }else{
                            $get_url_valeu = SearchBoxMain($explodevale_seond[0],$explodevale_seond[1]);
                          }
                          if($get_url_valeu == "0"){
                            echo "No Result Found";
                          }else{
                            foreach($get_url_valeu as $idsvaleset){
                            foreach(GetProductDataValTab($idsvaleset) as $productids){
                                $careterid[] = $productids['product_vender_id'];
                              $productprice = shortingGetProductPriceVal($productids['product_auto_id']);
                          ?>
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 product <?php echo $productids['product_auto_id']; ?>" id="data<?php echo $productids['id']; ?>" data-price="<?php echo $productprice; ?>">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="<?php echo $url; ?>/<?php echo $productids['product_page_name']; ?>">
                                            <img class="default-img" src="<?php echo $url; ?>/images/<?php echo $productids['product_image']; ?>" alt="">
                                            <?php
                                                  foreach(GetProductSmallImage($productids['product_auto_id'],1) as $multiimagesval){
                                                      echo "<img class='hover-img' src='$url/images/".$multiimagesval['produt_img']."' alt='Product'>";
                                                  }
                                              ?>
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <?php
                                          if(isset($_SESSION['customersessionlogin'])){
                                              echo GetAddtoWishList($productids['product_auto_id'],$_SESSION['customersessionlogin']);
                                          }else{
                                             echo GetAddtoWishList($productids['product_auto_id']);
                                          }
                                        ?>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <h2><a href="<?php echo $url; ?>/<?php echo $productids['product_page_name']; ?>"><?php echo $productids['product_name']; ?></a></h2>
                                    <div>
                                        <span class="font-small text-muted">By 
                                        <?php 
                                          foreach(GetVenderDatavale($productids['product_vender_id']) as $vervaldt){
                                              echo $vervaldt['vendor_f_name']." ".$vervaldt['vendor_l_name'];
                                          }
                                        ?>
                                        </span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <?php
                                              echo GetProductPriceVal($productids['product_auto_id']);
                                            ?>
                                        </div>
                                        <div class="add-cart">
                                            <?php echo GetAddtocartButton($productids['product_auto_id']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }}
                          }
                        ?>
                        <input type='hidden' class='current_page' />
                          <input type='hidden' class='show_per_page' />
                          <div class='page_navigation removalaesat'></div>
                        <!--end product card-->
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>

<script type="text/javascript">
/*$(document).ready(function(){
    $("body").delegate(".adtoCartSingle", "click", function(event){
    event.preventDefault();
    var p_id = $(this).attr('pid');
    //alert(p_id);
    $.ajax({
        url : "<?php echo $url; ?>/action/",
        method : "POST",
        data : {adtoCartSingle:1, proId:p_id},
        success : function(data){
            console.log(data);
            //alert(data);
            if(data == 0){
                alert("Successfully added to cart");
                window.location.reload();
            }else if(data == 1){
                alert("Already added to cart.");
                window.location.reload();
            }
          }
      });
    });
});*/
</script>