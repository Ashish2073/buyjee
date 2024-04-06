<?php
echo "<div id='loaddata1'>";
  if($roweditview['product_regular_price'] == "0"){
    /*-- PRICE start --*/
    //unset($_SESSION['filter-product']);
    //print_r($_SESSION['filter-product']);
    //$prouct_auto_id = $showdataid;
    if($trem_product_id == $pId){

        $checking_data = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_id='$trem_get_ids' AND prot_trm_prodtid='$editviewprodcolor'";
        $querycheckval = $conn->query($checking_data);
        if($querycheckval->num_rows > 0){
          while ($rowdatachecking = $querycheckval->fetch_array()) {
            $get_sale_price = $rowdatachecking['prot_trm_saleprc'];
            $get_regul_price = $rowdatachecking['prot_trm_regulprc'];
            $get_quntity = $rowdatachecking['prot_trm_quantity'];
            //$datavale = $get_sale_price."|".$get_regul_price."|".$get_quntity;
            //echo "00";
            if($get_sale_price == "0"){
              $productprice = $get_regul_price;
              echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($get_regul_price, 2)."</div></div>";
            }else{
              $holl_price_data = $get_sale_price;
              $productprice = $get_sale_price;
              echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($get_sale_price, 2)."</div>";

              echo "<div class='pric_dis'><span>$</span>".number_format($get_regul_price, 2)."</div></div>";
            }
            $holl_price_data = $productprice;
            $_SESSION['price']=$productprice;
          }
        }

    }else{

      $checking_data = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$editviewprodcolor'";
        $querycheckval = $conn->query($checking_data);
        if($querycheckval->num_rows > 0){
          while ($rowdatachecking = $querycheckval->fetch_array()) {
            $get_sale_price = $rowdatachecking['prot_trm_saleprc'];
            $get_regul_price = $rowdatachecking['prot_trm_regulprc'];
          }

          $get_min_sale_price = "SELECT MIN(prot_trm_saleprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$editviewprodcolor'";
          $query_min_slae_pr = $conn->query($get_min_sale_price);
          $fetch_min_sale_price = $query_min_slae_pr->fetch_array();
          $row_set_min_sale_pric = $fetch_min_sale_price[0];

          $get_max_sale_price = "SELECT MAX(prot_trm_saleprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$editviewprodcolor'";
          $query_max_slae_pr = $conn->query($get_max_sale_price);
          $fetch_max_sale_price = $query_max_slae_pr->fetch_array();
          $row_set_max_sale_pric = $fetch_max_sale_price[0];

          $get_min_regul_price = "SELECT MIN(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$editviewprodcolor'";
          $query_min_regul_pr = $conn->query($get_min_regul_price);
          $fetch_min_regul_price = $query_min_regul_pr->fetch_array();
          $row_set_min_regul_pric = $fetch_min_regul_price[0];

          $get_max_reular_price = "SELECT MAX(prot_trm_regulprc) FROM product_attbut_vartarry WHERE prot_trm_prodtid='$editviewprodcolor'";
          $query_max_reular_pr = $conn->query($get_max_reular_price);
          $fetch_max_reular_price = $query_max_reular_pr->fetch_array();
          $row_set_max_reular_pric = $fetch_max_reular_price[0];

          //echo $makecount_sale_max;
            if($get_sale_price == "0"){
              $productprice = number_format($get_regul_price, 2);
              if($row_set_min_regul_pric == $row_set_max_reular_pric){
                $holl_price_data = $row_set_max_reular_pric;
                echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($get_regul_price, 2)."</div></div>";
              }else{
                $holl_price_data = $row_set_min_regul_pric;
                echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($row_set_min_regul_pric, 2)." - <span>$</span>".number_format($row_set_max_reular_pric, 2)."</div></div>";
              }
            }else{
              $productprice = number_format($get_sale_price, 2);
              if($row_set_min_sale_pric == $row_set_max_sale_pric){
                $holl_price_data = $row_set_max_sale_pric;
                echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($get_sale_price, 2)."</div>";

                echo "<div class='pric_dis'><span>$</span>".number_format($get_regul_price, 2)."</div></div>";
              }else{
                $holl_price_data = $row_set_min_sale_pric;
                echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($row_set_min_sale_pric, 2)." - <span>$</span>".number_format($row_set_max_sale_pric, 2)."</div></div>";
              }
            }
        }
    }
    /*-- PRICE END --*/
  }else{
    if($roweditview['product_sale_price'] == ""){

       echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($roweditview['product_regular_price'], 2)."</div></div>";
       $holl_price_data = $roweditview['product_regular_price'];

    }else{

      echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($roweditview['product_sale_price'], 2)."</div>";
      $holl_price_data = $roweditview['product_sale_price'];

      echo "<div class='pric_dis'><span>$</span>".number_format($roweditview['product_regular_price'], 2)."</div></div>";

    }
  }
echo "</div>";
/*if($countryname == "United States"){*/
  echo '<p class="affirm-as-low-as" data-amount="'.$holl_price_data.'00"></p>';
/*}*/
?>