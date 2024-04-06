<?php
if($editviewprodcolor == "" || $editviewprodcolor == "0"){

  if($editviewprodstock == "0"){
    echo"<div class='item-stock'><span class='alert alert-danger'>Out of Stock</span></div>";
  }else{
    echo"<div class='item-stock'><span>$editviewprodstock</span> In Stock</div>";
  }

  echo "<div id='loaddata3'>";
    if($editviewprodstock == "0"){
    }else{
    	$checking_single_vert = "SELECT * FROM cart_user WHERE cart_prdo_auto_id='$editviewprodautoid'";
    	$query_get_singdat = $conn->query($checking_single_vert);
    	if($query_get_singdat > 0){

    		while($rowset_vertionval = $query_get_singdat->fetch_array()){
    			$get_singleprotqunt = $rowset_vertionval['cart_prdo_qutity'];
    		}
    		if($editviewprodstock == ""){
    			echo "<div class='item-button'>
		        <form class='ad-cart' method='post' action='#'>                        
		            <button type='submit' pid=".$pId." name='add-to-cart' value='0' class='addToCart addtoCart'>Add to Cart</button>
		            <button type='submit' pid=".$pId." name='buy now' value='0' class='buyNow'>Buy Now</button>
		        </form>
		        </div>";
    		}else{
    			if($editviewprodstock > $get_singleprotqunt){
		          echo "<div class='item-button'>
			        <form class='ad-cart' method='post' action='#'>                        
			            <button type='submit' pid=".$pId." name='add-to-cart' value='0' class='addToCart addtoCart'>Add to Cart</button>
			            <button type='submit' pid=".$pId." name='buy now' value='0' class='buyNow'>Buy Now</button>
			        </form>
			        </div>";
		        }else{
		            //echo "<p class='stockover'>You can't add more quantity due to limitted stock.</p>";
              echo "<div class='item-button'>
              <form class='ad-cart' method='post' action='#'>                        
                  <button type='submit' pid=".$pId." name='add-to-cart' value='0' class='addToCart addtoCart'>Add to Cart</button>
                  <button type='submit' pid=".$pId." name='buy now' value='0' class='buyNow'>Buy Now</button>
              </form>
              </div>";
		        }
    		}
    	}else{
    		echo "<div class='item-button'>
	        <form class='ad-cart' method='post' action='#'>                        
	            <button type='submit' pid=".$pId." name='add-to-cart' value='0' class='addToCart addtoCart'>Add to Cart</button>
	            <button type='submit' pid=".$pId." name='buy now' value='0' class='buyNow'>Buy Now</button>
	        </form>
	        </div>";
    	}
    }
  echo "</div>";

}else{
  echo "<div id='loaddata2'>";
	  if($get_Qunity_val == "Quantity"){}elseif($get_Qunity_val == "0"){
	  	echo"<div class='item-stock'><span class='alert alert-danger'>Out of Stock</span></div>";
	  }elseif($get_Qunity_val == ""){
	  	echo "<div class='item-stock'> In Stock</div>";
	  }else{
	  	echo "<div class='item-stock'><span>$get_Qunity_val</span> In Stock</div>";
	  }
  echo "</div>";

  $vertion_session_id = explode(',', $editviewprodcolor);

  foreach($vertion_session_id as $stockcount){
    if($stockcount != ""){
      $get_hold_idtotle = "SELECT * FROM product_active_attbut WHERE attbut_productid='$stockcount'";
      $querystockval = $conn->query($get_hold_idtotle);
      while($rowshowstork = $querystockval->fetch_array()){
        $get_attbutid = $rowshowstork['attbut_id'];

        $get_attbutterm = "SELECT * FROM product_attbut WHERE id='$get_attbutid'";
        $querygettrem = $conn->query($get_attbutterm);
        while($querugetroe = $querygettrem->fetch_array()){
          $showabbutname = $querugetroe['pd_attbut_name'];
        }
      }
      echo "<div class='item-short-dis'>Select $showabbutname</div>

          <select name='fillterval[]' data-id='$pId' class='item-stock sizeattbut'>
          <option value='0'>Select $showabbutname</option>";

          if($trem_get_ids == "0"){
          	/*$get_tram_vale = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='$stockcount' ORDER BY proval_trm_postion ASC";
	          $querytrmval = $conn->query($get_tram_vale);
	          while($rowdataval = $querytrmval->fetch_array()){
              $array_vale[] = $rowdataval['id'].','.$rowdataval['proval_trm_value'].'|';
	          }
            foreach($array_vale as $key_valevat => $vertvaledat){
              $explodedataval = explode('|', $vertvaledat);
              foreach($explodedataval as $eplodatvale){
                $explode_dataval = explode(',', $eplodatvale);
                $exploddataid = $explode_dataval[0];
                $exploddataname = $explode_dataval[1];
                if($exploddataid == "" && $exploddataname == ""){}else{
                  echo "<option value='".$exploddataid."'>".$exploddataname."</option>";
                }
              }
            }*/
            $get_tram_vale = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='$stockcount' ORDER BY CAST(proval_trm_postion AS UNSIGNED INTEGER)";
            $querytrmval = $conn->query($get_tram_vale);
            while($rowdataval = $querytrmval->fetch_array()){
              $get_value_data = $rowdataval['id'];
              $get_id_datatrem = $rowdataval['id'];
              $get_name_datatrem = $rowdataval['proval_trm_value'];
                echo "<option value='".$get_id_datatrem."'>".$get_name_datatrem."</option>";
            }
          }else{
          	$array_make_id = explode(',', $trem_get_ids);
      		$get_tram_vale = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='$stockcount' ORDER BY CAST(proval_trm_postion AS UNSIGNED INTEGER)";
	        $querytrmval = $conn->query($get_tram_vale);
	        while($rowdataval = $querytrmval->fetch_array()){
	        	$get_value_data = $rowdataval['id'];
	        	$get_id_datatrem = $rowdataval['id'];
	        	$get_name_datatrem = $rowdataval['proval_trm_value'];

	        	if(in_array($get_value_data, $array_make_id)){
	        		echo "<option value='".$get_id_datatrem."' selected>".$get_name_datatrem."</option>";
	        	}else{
	        		echo "<option value='".$get_id_datatrem."'>".$get_name_datatrem."</option>";
	        	}
	        }
          }

      echo "</select>";
    }
  }
  echo "<div id='loaddata3'>";
  //echo $editviewprodcolor;
  if($editviewprodcolor == "" || $editviewprodcolor == "0"){
    if($editviewprodstock == "0"){}else{
      echo "<div class='item-button'>
        <form class='ad-cart' method='post' action='#'>                        
            <button type='submit' pid=".$pId." name='add-to-cart' value='0' class='addToCart addtoCart'>Add to Cart</button>
            <button type='submit' pid=".$pId." name='buy now' value='0' class='buyNow'>Buy Now</button>
        </form>
        </div>";
    }
  }else{

  	if($get_Qunity_val == "Quantity"){
  		echo "<div class='item-button'>
        <form class='ad-cart' method='post' action='#'>                        
            <button type='submit' pid='' name='add-to-cart' value='0' class='addToCart addtoCart'>Add to Cart</button>
            <button type='submit' pid='' name='buy now' value='0' class='buyNow'>Buy Now</button>
        </form>
        </div>";
  	}elseif($get_Qunity_val == "0"){
	}elseif($get_Qunity_val == ""){
		if($qunity_cart_notincre == "1"){
		  	echo "<div class='item-button'>
	        <form class='ad-cart' method='post' action='#'>                        
	            <button type='submit' pid=".$pId." name='add-to-cart' value='0' class='addToCart addtoCart'>Add to Cart</button>
	            <button type='submit' pid=".$pId." name='buy now' value='0' class='buyNow'>Buy Now</button>
	        </form>
	        </div>";
    	}else{
        echo "<div class='item-button'>
          <form class='ad-cart' method='post' action='#'>                        
              <button type='submit' pid=".$pId." name='add-to-cart' value='0' class='addToCart addtoCart'>Add to Cart</button>
              <button type='submit' pid=".$pId." name='buy now' value='0' class='buyNow'>Buy Now</button>
          </form>
          </div>";
    		//echo "<p class='stockover'>You can't add more quantity due to limitted stock.</p>";
    	}
	}else{
		if($qunity_cart_notincre == "1"){
		  	echo "<div class='item-button'>
	        <form class='ad-cart' method='post' action='#'>                        
	            <button type='submit' pid=".$pId." name='add-to-cart' value='0' class='addToCart addtoCart'>Add to Cart</button>
	            <button type='submit' pid=".$pId." name='buy now' value='0' class='buyNow'>Buy Now</button>
	        </form>
	        </div>";
    	}else{
        echo "<div class='item-button'>
          <form class='ad-cart' method='post' action='#'>                        
              <button type='submit' pid=".$pId." name='add-to-cart' value='0' class='addToCart addtoCart'>Add to Cart</button>
              <button type='submit' pid=".$pId." name='buy now' value='0' class='buyNow'>Buy Now</button>
          </form>
          </div>";
    		//echo "<p class='stockover'>You can't add more quantity due to limitted stock.</p>";
    	}
	}

  }
  echo "</div>";        
}
?>