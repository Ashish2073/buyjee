<?php include 'includes/upper-header.php'; ?>
<?php include 'includes/main-header.php';?>
<!--End header-->
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="<?php echo $url; ?>/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Wishlist
                </div>
            </div>
        </div>
        <div class="container mb-30 mt-50">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="mb-50">
                        <h1 class="heading-2 mb-10">Your Wishlist</h1>
                    </div>
                    <div class="table-responsive shopping-summery">
                        <?php
                        if(GetWhisListData($cutomervale)){
                        ?>
                        <table class="table table-wishlist">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col" colspan="2" class="pl-30">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock Status</th>
                                    <th scope="col">Action</th>
                                    <th scope="col" class="end">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_SESSION['customersessionlogin'])){
                                    $cutomervale = $_SESSION['customersessionlogin'];
                                }else{
                                    $cutomervale = "0";
                                }
                                foreach(GetWhisListData($cutomervale) as $whilstval){
                                    foreach(GetProductDataValTab($whilstval['whis_prd_id']) as $prodctswhish){
                                ?>
                                <tr class="pt-30">
                                    <td class="image product-thumbnail pt-40 pl-30"><img src="<?php echo $url; ?>/images/<?php echo $prodctswhish['product_image']; ?>" alt="Img"></td>
                                    <td class="product-des product-name">
                                        <h6><a class="product-name mb-10" href="<?php echo $url; ?>/<?php echo $prodctswhish['product_page_name']; ?>"><?php echo $prodctswhish['product_name']; ?></a></h6>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <?php
                                            echo GetProductPriceVal($prodctswhish['product_auto_id']);
                                        ?>
                                    </td>
                                    <td class="text-center detail-info" data-title="Stock">
                                        <?php
                                        if($prodctswhish['product_regular_price'] == "0" || $prodctswhish['product_regular_price'] == ""){
                                            StockProdutVertionval($prodctswhish['product_color']);
                                        }else{
                                            if($prodctswhish['product_stock'] == ""){
                                                echo "<span class='stock-status in-stock mb-0'> In Stock</span>";
                                                echo '<input type="hidden" id="stokqunt" value="10">';
                                            }elseif($prodctswhish['product_stock'] == "0"){
                                                echo "<span class='stock-status out-stock mb-0'> Out Of Stock</span>";
                                                echo '<input type="hidden" id="stokqunt" value="'.$prodctswhish['product_stock'].'">';
                                            }else{
                                                echo "<span class='stock-status in-stock mb-0'> (".$prodctswhish['product_stock'].") In Stock </span>";
                                                echo '<input type="hidden" id="stokqunt" value="'.$prodctswhish['product_stock'].'">';
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                       <?php echo GetAddtocartButton($prodctswhish['product_auto_id']); ?>
                                    </td>
                                    <td class="action text-center" data-title="Remove">
                                        <a href="javascript:void(0)" class="text-body removewhislist" data-id="<?php echo $whilstval['id']; ?>"><i class="fi-rs-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                        }else{
                        ?>
                        <div class="cart-table text-center"><h2>Your Wishlist is Empty</h2></div>
                        <?php
                        }
                        ?>
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
    if($("#pdqunity").val()){
        var p_quntiy = $("#pdqunity").val();
        //alert(p_quntiy);
    }else{
        var p_quntiy = "1";
        //alert(p_quntiy);
    }
    //alert(p_id);
    $.ajax({
        url : "<?php echo $url; ?>/action/",
        method : "POST",
        data : {adtoCartSingle:1, proId:p_id, quityval:p_quntiy},
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