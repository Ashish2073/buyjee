<?php

error_reporting(0);

include_once('config_db/conn_connect.php');



$conn = conndata();




function showmenudata(){



	global $conn;

  global $url;



	$viewmenudata = "SELECT * FROM menutable WHERE menu_type='top' ORDER BY menu_postion ASC";



	$querymenudata = mysqli_query($conn,$viewmenudata);



	while($rowmenuviewdata = mysqli_fetch_array($querymenudata)){



		$getmenuname = $rowmenuviewdata['menu_name'];



		$getmenutiel = $rowmenuviewdata['menu_title'];



		$getmenualt = $rowmenuviewdata['menu_alt'];



		$getmenuurl = $rowmenuviewdata['menu_url'];



    if($getmenuurl == "index"){

      echo "<li class='top-level-link'>



                <a href='$url/' class='mega-menu' title='$getmenutiel' alt='$getmenualt'>$getmenuname</a>



            </li>";

    }else{

		echo "<li class='top-level-link'>



                <a href='$url/$getmenuurl' class='mega-menu' title='$getmenutiel' alt='$getmenualt'>$getmenuname</a>



            </li>";

    }

	}



}



function showmenufooterweare(){



  global $conn;

  global $url;

  echo '<div class="col-lg-3 col-md-3 col-sm-12">

              <div class="footr-logo2">

                  <h4>Who We Are</h4>

                  <ul class="logo-ul2">';



  $viewmenudatafooter_weare = "SELECT * FROM menutable WHERE menu_type='why_we_are' ORDER BY menu_postion ASC";



  $querymenudatafooter_weare = mysqli_query($conn,$viewmenudatafooter_weare);



  while($rowmenuviewdatafooter_weare = mysqli_fetch_array($querymenudatafooter_weare)){



    $getmenunamefooter_weare = $rowmenuviewdatafooter_weare['menu_name'];



    $getmenutielfooter_weare = $rowmenuviewdatafooter_weare['menu_title'];



    $getmenualtfooter_weare = $rowmenuviewdatafooter_weare['menu_alt'];



    $getmenuurlfooter_weare = $rowmenuviewdatafooter_weare['menu_url'];



      echo '<li><a href="'.$url.'/'.$getmenuurlfooter_weare.'" title="'.$getmenutielfooter_weare.'" alt="'.$getmenualtfooter_weare.'">'.$getmenunamefooter_weare.'</a></li>';

  }

  echo '</ul>

              </div>

          </div>';



}



function showmenufooterquick(){



  global $conn;

  global $url;

  echo '<div class="col-lg-2 col-md-2 col-sm-12">

              <div class="footr-logo2">

                  <h4>QUICK LINKS</h4>

                  <ul class="logo-ul2">';



if(isset($_SESSION['adminsessionlogin'])){

    $redirect_path = "<script>window.open('$url/admin/dashboard','_self');</script>";

    $myaccountbutton = "<li><a href='$url/admin/dashboard'>My Account</a></li>";

}elseif(isset($_SESSION['vendorsessionlogin'])){

    $redirect_path = "<script>window.open('$url/admin/dashboard','_self');</script>";

    $myaccountbutton = "<li><a href='$url/vendor/deshboard'>My Account</a></li>";

}elseif(isset($_SESSION['customersessionlogin'])){

    $redirect_path = "<script>window.open('$url/admin/dashboard','_self');</script>";

    $myaccountbutton = "<li><a href='$url/customer/deshboard'>My Account</a></li>";

}else{

    $redirect_path = "";

    $myaccountbutton = "<li><a href='login'>My Account</a></li>";

}

echo $myaccountbutton;





  $viewmenudatafooter_quick = "SELECT * FROM menutable WHERE menu_type='quick_link' ORDER BY menu_postion ASC";



  $querymenudatafooter_quick = mysqli_query($conn,$viewmenudatafooter_quick);



  while($rowmenuviewdatafooter_quick = mysqli_fetch_array($querymenudatafooter_quick)){



    $getmenunamefooter_quick = $rowmenuviewdatafooter_quick['menu_name'];



    $getmenutielfooter_quick = $rowmenuviewdatafooter_quick['menu_title'];



    $getmenualtfooter_quick = $rowmenuviewdatafooter_quick['menu_alt'];



    $getmenuurlfooter_quick = $rowmenuviewdatafooter_quick['menu_url'];



      echo '<li><a href="'.$url.'/'.$getmenuurlfooter_quick.'" title="'.$getmenutielfooter_quick.'" alt="'.$getmenualtfooter_quick.'">'.$getmenunamefooter_quick.'</a></li>';

  }

  ////////// footer login part//////////////

if(isset($_SESSION['adminsessionlogin'])){

    $headerlogut = "<li><a href='$url/admin/logout'>Logout</a></li>";

    $footerinsertform = "<li><a href='admin/logout'>Logout</a></li>";

}elseif(isset($_SESSION['vendorsessionlogin'])){

    $headerlogut = "<li><a href='$url/vendor/logout'>Logout</a></li>";

    $footerinsertform = "<li><a href='$url/vendor/logout'>Logout</a></li>";

}elseif(isset($_SESSION['customersessionlogin'])){

    $headerlogut = "<li><a href='$url/customer/logout'>Logout</a></li>";

    $footerinsertform = "<li><a href='$url/customer/logout'>Logout</a></li>";

}else{

    $footerinsertform = "<li><a href='$url/vendor_inquiry'>Vendor Inquiry</a></li>";

}



echo $footerinsertform;



  echo '</ul>

              </div>

          </div>';



}



function showmenufootercontact(){



  global $conn;

  global $url;

  echo '<div class="col-lg-3 col-md-3 col-sm-12">

              <div class="footr-logo2">

                  <h4>CONTACT US</h4>

                  <ul class="logo-ul2">';



  $viewmenudatafooter_contact = "SELECT * FROM menutable WHERE menu_type='contact' ORDER BY menu_postion ASC";



  $querymenudatafooter_contact = mysqli_query($conn,$viewmenudatafooter_contact);



  while($rowmenuviewdatafooter_contact = mysqli_fetch_array($querymenudatafooter_contact)){



    $getmenunamefooter_contact = $rowmenuviewdatafooter_contact['menu_name'];



    $getmenutielfooter_contact = $rowmenuviewdatafooter_contact['menu_title'];



    $getmenualtfooter_contact = $rowmenuviewdatafooter_contact['menu_alt'];



    $getmenuurlfooter_contact = $rowmenuviewdatafooter_contact['menu_url'];



      echo '<li><a href="'.$url.'/'.$getmenuurlfooter_contact.'" title="'.$getmenutielfooter_contact.'" alt="'.$getmenualtfooter_contact.'">'.$getmenunamefooter_contact.'</a></li>';

  }

  echo '<li><span><i class="fa fa-phone"></i></span><a href="tel:+19175293445" target="blank">+1-917-529-3445</a></li>

          <li><span><i class="fa fa-envelope-o"></i> </span> <a href="mailto:info@gallerylala.com" target="blank">info@gallerylala.com</a></li>

          </ul>

              </div>

          </div>';



}







function productnameshareid($productsingname){



	global $conn;







	$shresingid = "SELECT * FROM all_product WHERE product_page_name='$productsingname'";



	$querysharename = mysqli_query($conn,$shresingid);



	while($rowproduid = mysqli_fetch_array($querysharename)){



		$singleprodidshar = $rowproduid['product_auto_id'];



    return $singleprodidshar;

	}



}







function singleproductedit($showdataid){



	global $conn;

  global $url;



	$editviewproduct = "SELECT * FROM all_product WHERE product_auto_id='$showdataid'";



	$queryeditview = mysqli_query($conn,$editviewproduct);



	while($roweditview = mysqli_fetch_array($queryeditview)){

    

    $pId = $roweditview['id'];



		$editviewprodname = $roweditview['product_name'];



		$editviewprodlink = $roweditview['product_link'];



		$editviewprodpagename = $roweditview['product_page_name'];



		$editviewproddestion = $roweditview['product_destion'];



		$editviewprodregprice = $roweditview['product_regular_price'];



		$editviewprodsaleprice = $roweditview['product_sale_price'];



		$editviewprodcatger = $roweditview['product_catger'];



		$editviewprodtag = $roweditview['product_tags'];



		$editviewprodstock = $roweditview['product_stock'];



		$editviewprodsku = $roweditview['product_sku'];



		$editviewprodwieght = $roweditview['product_weight'];



		$editviewproddimion = $roweditview['product_dimensions'];



		$vieweditdymanshexpold = explode(',', $editviewproddimion);



		$vieweditdymanshlength = $vieweditdymanshexpold[0];



		$vieweditdymanshwigth = $vieweditdymanshexpold[1];



		$vieweditdymanshheight = $vieweditdymanshexpold[2];



		$editviewprodcolor = $roweditview['product_color'];



		$editviewprodsize = $roweditview['product_size'];



		$editviewprodvolum = $roweditview['product_volume'];



		$editviewprodimag = $roweditview['product_image'];



		$editviewproddate = $roweditview['product_date'];



		$editviewprodtime = $roweditview['product_time'];



		$editviewprodautoid = $roweditview['product_auto_id'];



		$editviewprodauvid = $roweditview['product_vender_id'];

    $editviewprodcatid = $roweditview['product_cat_id'];

    $productshot = $roweditview['product_short_des'];

		echo "<div class='row'>



            <div class='col-lg-5 col-md-5 col-sm-5'>







                <div id='fancy' class='fancy-bx'>



                    <img class='xzoom4' id='xzoom-fancy' src='$url/assets/images/product-img/$editviewprodimag' xoriginal='$url/assets/images/product-img/$editviewprodimag' />



                    <div class='xzoom-thumbs'>";



                    echo "<a href='$url/assets/images/product-img/$editviewprodimag'>



                            <img class='xzoom-gallery4' src='$url/assets/images/product-img/$editviewprodimag' xpreview='$url/assets/images/product-img/$editviewprodimag' title=''></a>";







                    $singlallimg = "SELECT * FROM product_mutli_image WHERE produt_id='$editviewprodautoid' ORDER BY img_postion ASC";



					$queryallimageprdo = mysqli_query($conn,$singlallimg);



					while($rowallimges = mysqli_fetch_array($queryallimageprdo)){



						echo "<a href='$url/assets/images/product-img/".$rowallimges['produt_img']."'>



                            <img class='xzoom-gallery4' src='$url/assets/images/product-img/".$rowallimges['produt_img']."' xpreview='$url/assets/images/product-img/".$rowallimges['produt_img']."' title=''></a>";



					}



                echo "</div>



                </div>







            </div>



            <div class='col-lg-7 col-md-7 col-sm-7'>

                <div class='pro-description'>
                    <div class='item-discriptioin'>$editviewprodname</div>";
                    echo "<div class='item-short-dis'>$productshot</div>";
                    //echo $showdataid;
                    //unset($_SESSION['filter-product']);
                    echo "<div class='loder-box'>";
                    echo "<div id='loaddata'>";
                    if(isset($_SESSION['filter-product'])){
                      //print_r($_SESSION['filter-product']);
                      $explodvale = explode('-', $_SESSION['filter-product']);
                      $valedata = $explodvale[3];
                      $tremvalid = $explodvale[2];
                      $explodvalearry = explode(',', $valedata);
                      $flterexplod = explode(',', $editviewprodcolor);
                    }else{
                      $explodvalearry = explode(',', $editviewprodcolor);
                      $flterexplod = explode(',', $editviewprodcolor);
                    }
                    echo "</div>";
                    if($showdataid == "619272343"){
                      echo "<div id='loaddata1'>";
                      if($roweditview['product_sale_price'] == "0"){
                        /*-- PRICE start --*/
                        if(isset($_SESSION['filter-product'])){

                          $prodductprice = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$editviewprodcolor'";
                          $queryget_filterval = "";

                          if($showregulsale == ""){
                            echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($showregulprice, 2)."</div></div>";
                          }else{
                            echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($showregulsale, 2)."</div>";

                            echo "<div class='pric_dis'><span>$</span>".number_format($showregulprice, 2)."</div></div>";
                          }
                        }
                        /*-- PRICE END --*/
                      }else{
                        if($roweditview['product_sale_price'] == ""){

                           echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($roweditview['product_regular_price'], 2)."</div></div>";

                        }else{

                          echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($roweditview['product_sale_price'], 2)."</div>";

                          echo "<div class='pric_dis'><span>$</span>".number_format($roweditview['product_regular_price'], 2)."</div></div>";

                        }
                      }
                    echo "</div>";
                    /*-- Out Of Stock Statr --*/
                    if($editviewprodcolor == "" || $editviewprodcolor == "0"){

                      if($editviewprodstock == "0"){
                        echo"<div class='item-stock'><span class='alert alert-danger'>Out of Stock</span></div>";
                      }else{
                        echo"<div class='item-stock'><span>$editviewprodstock</span> In Stock</div>";
                      }

                    }else{
                      echo "<div id='loaddata2'>";
                      if(isset($_SESSION['filter-product'])){
                        $querygetsr = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='$valedata' AND id='$tremvalid'";
                        $querygetqunty = $conn->query($querygetsr);
                        while($rowget_trmstrock = $querygetqunty->fetch_array()){
                          $fetch_qutty = $rowget_trmstrock['proval_trm_quanty'];
                        }
                        if($fetch_qutty == "0"){
                          echo"<div class='item-stock'><span class='alert alert-danger'>Out of Stock</span></div>";
                        }elseif($fetch_qutty == ""){
                          echo "<div class='item-stock'> In Stock</div>";
                        }else{
                          echo "<div class='item-stock'><span>$fetch_qutty</span> In Stock</div>";
                        }
                      }
                      echo "</div>";
                      foreach($flterexplod as $stockcount){
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

                            <select name='fillterval' class='item-stock sizeattbut'>
                            <option value=''>Select One $showabbutname</option>";

                            $get_tram_vale = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='$stockcount'";
                            $querytrmval = $conn->query($get_tram_vale);
                            while($rowdataval = $querytrmval->fetch_array()){
                              echo "<option value='".$rowdataval['id']."-$editviewprodcolor'>".$rowdataval['proval_trm_value']."</option>";
                            }

                        echo "</select>";
                      }
                      echo "<div id='loaddata3'>";
                      if($editviewprodcolor == "" || $editviewprodcolor == "0"){
                        if($editviewprodstock == "0"){}else{
                          echo "<div class='item-button'>
                            <form class='ad-cart' method='post' action='#'>                        
                                <button type='submit' pid=".$pId." name='add-to-cart' value='0' class='addToCart'>Add to Cart</button>
                                <button type='submit' pid=".$pId." name='buy now' value='0' class='buyNow'>Buy Now</button>
                            </form>
                            </div>";
                        }
                      }else{
                        if(isset($_SESSION['filter-product'])){
                          if($fetch_qutty == "0"){}else{
                            echo "<div class='item-button'>
                            <form class='ad-cart' method='post' action='#'>                        
                                <button type='submit' pid=".$pId." name='add-to-cart' value='0' class='addToCartsingle'>Add to Cart</button>
                                <button type='submit' pid=".$pId." name='buy now' value='0' class='buyNowsingle'>Buy Now</button>
                            </form>
                            </div>";
                          }
                        }
                      }
                      echo "</div>";        
                    }
                    /*-- Out Of Stock End --*/

                    }else{
                    /*-- new code -- */
                    /*-- old code ---*/

                //echo "<div class='item-short-dis'>$productshot</div>";

                  if($roweditview['product_sale_price'] == ""){

                     echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($roweditview['product_regular_price'], 2)."</div></div>";

                  }else{

                    echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($roweditview['product_sale_price'], 2)."</div>";

                    echo "<div class='pric_dis'><span>$</span>".number_format($roweditview['product_regular_price'], 2)."</div></div>";

                  }

                    if($editviewprodstock == "0"){



                      echo"<div class='item-stock'><span class='alert alert-danger'>Out of Stock</span></div>";



                    }else{



                      echo"<div class='item-stock'><span>$editviewprodstock</span> In Stock</div>";



                    if($editviewprodsize == ""){}elseif($editviewprodsize == "0"){}else{

                      echo "<div class='item-short-dis'>Select Size</div>

                            <select name='size' class='item-stock' id='sizeattbut'>";

                      $explod_data = explode(',', $editviewprodsize);

                      foreach ($explod_data as $value) {
                        $trm_val = trim($value);
                        echo "<option value='Size-$trm_val'>$trm_val</option>";

                      }

                      echo "</select>";

                    }

                    if($editviewprodcolor == ""){}elseif($editviewprodcolor == "0"){}else{

                      echo "<div class='item-short-dis'>Select Color</div>

                            <select name='size' class='item-stock' id='colorattbut'>";

                      $explod_datacolor = explode(',', $editviewprodcolor);

                      foreach ($explod_datacolor as $valuecolor) {
                        $trm_valcolor = trim($valuecolor);
                        echo "<option value='Color-$trm_valcolor'>$trm_valcolor</option>";

                      }

                      echo "</select>";

                    }
                  //echo "<button type='submit' pid=".$pId." name='buy now' value='0' class='buyNow'>Buy Now</button>";
              echo "<div class='item-button'>



                      <form class='ad-cart' method='post' action='#'>                        



                        <button type='submit' pid=".$pId." name='add-to-cart' value='0' class='addtoCart addToCart'>Add to Cart</button>
                        <button type='submit' pid=".$pId." name='buy now' value='0' class='buyNow'>Buy Now</button>

                    </form>



                    </div>";



                  }
                echo "</div>";
                echo "<div class='product_meta'>



                      <span class='sku_wrapper'><span class='bold-data'>SKU:</span> <span class='sku'>$editviewprodsku</span></span>";
                      /* -- old code --*/
                  }//chkingval
                    echo "<span class='posted_in catavale'><span class='bold-data'>Categories:</span> ";

                    $get_cat_valuedata = "SELECT * FROM prod_active_categories WHERE prod_produtid='$showdataid'";
                    $querycatval = $conn->query($get_cat_valuedata);
                    while($rowcatgetdata = $querycatval->fetch_array()){
                      $get_catid_val = explode(',', $rowcatgetdata['prod_catgyid']);
                    }
                    foreach ($get_catid_val as $value_cat_data) {
                      $get_catmaindata = "SELECT * FROM product_categories WHERE id='$value_cat_data'";
                      $queryvaldata = $conn->query($get_catmaindata);
                      while($rowgetvaluecat = $queryvaldata->fetch_array()){
                        echo "<a href='$url/product-category/".$rowgetvaluecat['prd_cat_slug']."' rel='".$rowgetvaluecat['prd_cat_desipt']."'>".$rowgetvaluecat['prd_cat_name']."</a><span>, </span>";
                      }
                    }

                    /*$singlvaltrimcate = substr($editviewprodcatger, 0,-1);
                    $explodsinglcat = explode('/', $singlvaltrimcate);
                        //print_r($explodcateg);
                    $id_loop = explode(',', $editviewprodcatid);
                    $zeoval = "0";
                    $sizeofval = sizeof($id_loop);
                    while($zeoval!=$sizeofval){

                      $loopidvalue = $id_loop[$zeoval];
                      $productsinglloop = $explodsinglcat[$zeoval];
                      $explodcateg = explode(',', $productsinglloop);

                    $get_urlval = "SELECT * FROM product_categories WHERE id='$loopidvalue'";
                    $queryvalcatgory = $conn->query($get_urlval);
                    while($rowvaldata = $queryvalcatgory->fetch_array()){
                      $get_urldata = array($rowvaldata['prd_cat_slug']);
                    }
                    //echo $get_urldata;
                    $implodearray = implode('/', $get_urldata);
                    $explodarray = explode('/', $implodearray);

                    if($explodcateg[0] != ""){
                      echo "<a href='$url/product-category/".$explodarray[0]."' rel='$cattrimval'>".$explodcateg[0]."</a><span>, </span>";
                    }
                    if($explodcateg[1] != ""){
                      echo "<a href='$url/product-category/".$explodarray[0]."/".$explodarray[1]."' rel='$cattrimval'>".$explodcateg[1]."</a><span>, </span>";
                    }
                    if($explodcateg[2] != ""){
                      echo "<a href='$url/product-category/".$explodarray[0]."/".$explodarray[1]."/".$explodarray[2]."' rel='$cattrimval'>".$explodcateg[2]."</a><span>, </span>";
                    }
                    if($explodcateg[3] != ""){
                      echo "<a href='$url/product-category/".$explodarray[0]."/".$explodarray[1]."/".$explodarray[2]."/".$explodarray[3]."' rel='$cattrimval'>".$explodcateg[3]."</a><span>, </span>";
                    }
                    if($explodcateg[4] != ""){
                      echo "<a href='$url/product-category/".$explodarray[0]."/".$explodarray[1]."/".$explodarray[2]."/".$explodarray[3]."/".$explodarray[4]."' rel='$cattrimval'>".$explodcateg[4]."</a><span>, </span>";
                    }
                    if($explodcateg[5] != ""){
                      echo "<a href='$url/product-category/".$explodarray[0]."/".$explodarray[1]."/".$explodarray[2]."/".$explodarray[3]."/".$explodarray[4]."/".$explodarray[5]."' rel='$cattrimval'>".$explodcateg[5]."</a><span>, </span>";
                    }
                    if($explodcateg[6] != ""){
                      echo "<a href='$url/product-category/".$explodarray[0]."/".$explodarray[1]."/".$explodarray[2]."/".$explodarray[3]."/".$explodarray[4]."/".$explodarray[4]."/".$explodarray[5]."/".$explodarray[6]."' rel='$cattrimval'>".$explodcateg[6]."</a><span>, </span>";
                    }
                    if($explodcateg[7] != ""){
                      echo "<a href='$url/product-category/".$explodarray[0]."/".$explodarray[1]."/".$explodarray[2]."/".$explodarray[3]."/".$explodarray[4]."/".$explodarray[5]."/".$explodarray[6]."/".$explodarray[7]."' rel='$cattrimval'>".$explodcateg[7]."</a><span>, </span>";
                    }
                    if($explodcateg[8] != ""){
                      echo "<a href='$url/product-category/".$explodarray[0]."/".$explodarray[1]."/".$explodarray[2]."/".$explodarray[3]."/".$explodarray[4]."/".$explodarray[5]."/".$explodarray[6]."/".$explodarray[7]."/".$explodarray[8]."' rel='$cattrimval'>".$explodcateg[8]."</a><span>, </span>";
                    }

                    $zeoval++;
                  }*/
                      /*	foreach($explodcateg as $valuecateg)



						{



							$cattrimval = trim($valuecateg);

              $catsliedhvale = preg_replace("/[^A-Za-z0-9]/","_", $cattrimval);

              echo "<a href='$url/product-category/$catsliedhvale' rel='$cattrimval'>$cattrimval</a><span>, </span>";
						}*/



                    echo"</span>";



                    //echo "<span class='tagged_as catavale'><span class='bold-data'>Tags:</span> ";

                    /*  $singlvaltrimtag = substr($editviewprodtag, 0,-1);

                    	$explodtag = explode(',', $editviewprodtag);


                      
                      	foreach($explodtag as $keytag => $valuetag)



						{



							$tagtrimval = trim($valuetag);

              $catsliedh = preg_replace("/[^A-Za-z0-9]/","-", $tagtrimval);
              if($tagtrimval == ""){}else{
                echo "<a href='$url/product-tag/$catsliedh' rel='$tagtrimval'>$tagtrimval</a><span>, </span>";
              }
						}*/



                    //echo "</span>";

                    $prodtvenderdetalsfirst = "SELECT * FROM vendor WHERE vendor_auto='$editviewprodauvid' LIMIT 1";
                      $queryprovidfirst = mysqli_query($conn,$prodtvenderdetalsfirst);
                      while($rowprodvidfirst = mysqli_fetch_array($queryprovidfirst)){
                        $prodvfnamefirst = $rowprodvidfirst['vendor_f_name'];
                        $prodvlnamefirst = $rowprodvidfirst['vendor_l_name'];
                        $prodvunnamefirst = $rowprodvidfirst['vendor_uni_name'];
                        $prodvcompnamefirst = $rowprodvidfirst['vendor_company'];
                        $prodvaddressfirst = $rowprodvidfirst['vendor_st_address'];
                        $prodvcompautofirst = $rowprodvidfirst['vendor_auto'];
                      }

                      echo "<span class='tagged_as'><span class='bold-data'>Products by</span> <a href='$url/$prodvunnamefirst'>$prodvfnamefirst $prodvlnamefirst</a></span>";

                    echo "</div>";







                echo "<div class='item-info'>



                      <ul class='nav nav-tabs' id='myTab' role='tablist'>



                          <li class='nav-item'> <a class='active nav-link' id='ds-1' data-toggle='tab' href='#ds-t1' role='tab'>Description</a></li>



                          <li class='nav-item'><a class='nav-link review-sing-btn' id='ds-2' data-toggle='tab' href='#ds-t2' role='tab'>Reviews</a></li>



                          <li class='nav-item vendor-dataval'><a class='nav-link' id='ds-3' data-toggle='tab' href='#ds-t3' role='tab'>Vendor Info</a></li>



                          <li class='nav-item'><a class='nav-link more-sing-hide' id='ds-4' data-toggle='tab' href='#ds-t4' role='tab'>More Products</a></li>



                      </ul>



                      <div class='tab-content' id='myTabContent'>



                          <div class='tab-pane active fade in' id='ds-t1' role='tabpanel' aria-labelledby='ds-1'>



                              <div class='dc-list'>



                                  <h4>Description</h4>



                                  $editviewproddestion



                              </div>



                          </div>



                          <div class='tab-pane fade' id='ds-t2' role='tabpanel' aria-labelledby='ds-2'>



                              <div class='dc-list'>



                                  <h4>Reviews</h4>";



                                  echo "<div class='reviews_list'>";



                                  $count_review = "SELECT COUNT(1) FROM reviewdataval WHERE review_type='product' AND review_loginid='$editviewprodautoid'";

                                  $querycount = mysqli_query($conn,$count_review);

                                  $rowcount = mysqli_fetch_array($querycount);

                                  $count_val = $rowcount[0];



                                  if($count_val == "0"){

                                    echo "<h5>There are no reviews yet.</h5>";

                                  }else{

                                    

                                  echo "<div class='row'>

                                            <div class='col-sm-12'>

                                              

                                              <div class='review-block'>

                                                <ul class='review-ul-list'>";



                                  $get_review = "SELECT * FROM reviewdataval WHERE review_type='product' AND review_loginid='$editviewprodautoid'";

                                  $queryval = mysqli_query($conn,$get_review);

                                  while($rowval = mysqli_fetch_array($queryval)){



                                    $get_login_user = $rowval['review_loginuserid'];



                                    if($rowval['review_rating'] == "1"){



                                      $stars = '<i class="fa fa-star"></i>';



                                    }elseif($rowval['review_rating'] == "2"){



                                      $stars = '<i class="fa fa-star"></i> <i class="fa fa-star"></i>';



                                    }elseif($rowval['review_rating'] == "3"){



                                      $stars = '<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>';

                                      

                                    }elseif($rowval['review_rating'] == "4"){



                                      $stars = '<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>';

                                      

                                    }elseif($rowval['review_rating'] == "5"){



                                      $stars = '<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>';

                                      

                                    }else{

                                      $stars = '<i class="fa fa-star"></i>';

                                    }



                                    $get_vendr = "SELECT * FROM vendor WHERE vendor_auto='$get_login_user'";

                                    $quwerycechel = mysqli_query($conn,$get_vendr);

                                    if(mysqli_num_rows($quwerycechel)){

                                      

                                      $get_vendorname = "SELECT * FROM vendor WHERE vendor_auto='$get_login_user'";

                                      $venderquery = mysqli_query($conn,$get_vendorname);

                                      while($rowvendoer = mysqli_fetch_array($venderquery)){

                                        $venderfname = $rowvendoer['vendor_f_name'];

                                        $venderlname = $rowvendoer['vendor_l_name'];

                                        $img_valvendor = $rowvendoer['vendor_img'];

                                        if($img_valvendor == "0"){

                                          $main_ing = "$url/assets/images/default-user-icon.jpg";

                                        }else{

                                          $main_ing = "$url/assets/images/$img_valvendor";

                                        }

                                          echo '<li>

                                                  <div class="row">

                                                    <div class="col-sm-2">

                                                      <div class="review_images">

                                                        <img src="'.$url.'/'.$main_ing.'" class="img-rounded">

                                                      </div>

                                                    </div>

                                                    <div class="col-sm-10">

                                                      <div class="review_name">

                                                        <div class="review-block-name"><a >'.$venderfname.' '.$venderlname.'</a></div>

                                                        <div class="review-block-date">'.$rowval['review_date'].' '.$rowval['review_time'].'</div>

                                                      </div>

                                                      <div class="stars-box">                                           

                                                      '.$stars.' '.$rowval['review_rating'].' Star.

                                                    </div>

                                                      <div class="review-block-description">'.$rowval['review_text'].'</div>

                                                    </div>

                                                  </div>

                                                </li><hr>';

                                      }



                                    }else{

                                      $cechk_user = "SELECT * FROM customer WHERE customer_ui_id='$get_login_user'";

                                      $quwerycechlk = mysqli_query($conn,$cechk_user);

                                      if(mysqli_num_rows($quwerycechlk)){

                                        //echo "0";

                                        //echo $get_login_user;

                                        $get_cunstoer = "SELECT * FROM customer WHERE customer_ui_id='$get_login_user'";

                                        $quweryvalcustome = mysqli_query($conn,$get_cunstoer);

                                        while($rowcustomer = mysqli_fetch_array($quweryvalcustome)){

                                          $first_name = $rowcustomer['customer_fname'];

                                          $last_name = $rowcustomer['customer_lname'];

                                          $img_valcutomer = $rowcustomer['customer_img'];



                                          if($img_valcutomer == "0"){

                                          $main_ingcustom = "$url/assets/images/default-user-icon.jpg";

                                        }else{

                                          $main_ingcustom = "$url/assets/images/$img_valcutomer";

                                        }

                                          echo '<li>

                                                  <div class="row">

                                                    <div class="col-sm-2">

                                                      <div class="review_images">

                                                        <img src="'.$url.'/'.$main_ingcustom.'" class="img-rounded">

                                                      </div>

                                                    </div>

                                                    <div class="col-sm-10">

                                                      <div class="review_name">

                                                        <div class="review-block-name"><a>'.$first_name.' '.$last_name.'</a></div>

                                                        <div class="review-block-date">'.$rowval['review_date'].' '.$rowval['review_time'].'</div>

                                                      </div>

                                                      <div class="stars-box">                                           

                                                       '.$stars.' '.$rowval['review_rating'].' Star.

                                                    </div>

                                                      <div class="review-block-description">'.$rowval['review_text'].'</div>

                                                    </div>

                                                  </div>

                                                </li><hr>';



                                        }



                                      }else{

                                        $cehck_admin = "SELECT * FROM userlogntable WHERE user_auto='$get_login_user'";

                                        $quweryval = mysqli_query($conn,$cehck_admin);

                                        if(mysqli_num_rows($quweryval)){



                                          $admin_detial = "SELECT * FROM userlogntable WHERE user_auto='$get_login_user'";

                                          $quweryadmin = mysqli_query($conn,$admin_detial);

                                          while($rowadmin = mysqli_fetch_array($quweryadmin)){

                                            $admin_name = "Admin";



                                            if("0" == "0"){

                                              $main_ingadmin = "$url/assets/images/default-user-icon.jpg";

                                            }else{

                                              $main_ingadmin = "$url/assets/images/$img_valcutomer";

                                            }

                                              echo '<li>

                                                      <div class="row">

                                                        <div class="col-sm-2">

                                                          <div class="review_images">

                                                            <img src="'.$url.'/'.$main_ingadmin.'" class="img-rounded">

                                                          </div>

                                                        </div>

                                                        <div class="col-sm-10">

                                                          <div class="review_name">

                                                            <div class="review-block-name"><a>Admin</a></div>

                                                            <div class="review-block-date">'.$rowval['review_date'].' '.$rowval['review_time'].'</div>

                                                          </div>

                                                          <div class="stars-box">                                           

                                                           '.$stars.' '.$rowval['review_rating'].' Star

                                                        </div>

                                                          <div class="review-block-description">'.$rowval['review_text'].'</div>

                                                        </div>

                                                      </div>

                                                    </li><hr>';



                                          }



                                        }

                                      }

                                    }

                                  }

                                  echo "</ul>

                                      </div>

                                      </div>

                                      </div>";

                                      }

                                         

                                echo "</div>";



                                echo "<h6>Be the first to review $editviewprodname</h6>                                  



                                  <div class='rating-box'>



                                    <form action='' role='form' method='post' enctype='multipart/form-data' id='commentform' class='comment-form'>



                                      <div class='comment-form-rating'>



                                          <label for='rating'>Your Rating</label>



                                          <div class='stars-box'> 



                                           



                                            <fieldset class='rating'>



                                              <input type='radio' id='star5' name='ratingvid' value='5' class='ratingvalue' />

                                              <label class='full' for='star5' title='Awesome - 5 stars'></label>



                                              <input type='radio' id='star4half' name='ratingvid' value='4.5' class='ratingvalue' />

                                              <label class='half' for='star4half' title='Pretty good - 4.5 stars'></label>



                                              <input type='radio' id='star4' name='ratingvid' value='4' class='ratingvalue' />

                                              <label class = 'full' for='star4' title='Pretty good - 4 stars'></label>



                                              <input type='radio' id='star3half' name='ratingvid' value='3.5' class='ratingvalue' />

                                              <label class='half' for='star3half' title='Meh - 3.5 stars'></label>



                                              <input type='radio' id='star3' name='ratingvid' value='3' class='ratingvalue' />

                                              <label class = 'full' for='star3' title='Meh - 3 stars'></label>



                                              <input type='radio' id='star2half' name='ratingvid' value='2.5' class='ratingvalue' />

                                              <label class='half' for='star2half' title='Kinda bad - 2.5 stars'></label>



                                              <input type='radio' id='star2' name='ratingvid' value='2' class='ratingvalue' />

                                              <label class = 'full' for='star2' title='Kinda bad - 2 stars'></label>



                                              <input type='radio' id='star1half' name='ratingvid' value='1.5' class='ratingvalue' />

                                              <label class='half' for='star1half' title='Meh - 1.5 stars'></label>



                                              <input type='radio' id='star1' name='ratingvid' value='1' class='ratingvalue' />

                                              <label class = 'full' for='star1' title='Sucks big time - 1 star'></label>



                                              <input type='radio' id='starhalf' name='ratingvid' value='0.5' class='ratingvalue' />

                                              <label class='half' for='starhalf' title='Sucks big time - 0.5 stars'></label>



                                          </fieldset>            



                                          



                                        </div>



                                         



                                      </div>



                                      <div class='comment-form-comment'>



                                          <label for=''>Your Review&nbsp;<span class='required'>*</span></label>



                                          <textarea id='comment' name='comment' cols='45' rows='8' required></textarea>

                                          <input type='hidden' name='normaname' class='normaname' value='$editviewprodautoid' required>



                                      </div>";



                                        if(isset($_SESSION['adminsessionlogin'])){

                                          echo '<input type="hidden" name="useractive" class="useractive" value="'.$_SESSION['adminsessionlogin'].'">';

                                          echo '<div class="form-submit">



                                                  <input name="addreview" type="button" id="addreview" class="submit" value="Submit">                                          



                                              </div>';

                                        }elseif(isset($_SESSION['vendorsessionlogin'])){

                                          echo '<input type="hidden" name="useractive" class="useractive" value="'.$_SESSION['vendorsessionlogin'].'">';

                                          echo '<div class="form-submit">



                                                  <input name="addreview" type="button" id="addreview" class="submit" value="Submit">                                          



                                              </div>';

                                        }elseif(isset($_SESSION['customersessionlogin'])){

                                          echo '<input type="hidden" name="useractive" class="useractive" value="'.$_SESSION['customersessionlogin'].'">';

                                          echo '<div class="form-submit">



                                                  <input name="addreview" type="button" id="addreview" class="submit" value="Submit">                                          



                                              </div>';

                                        }else{

                                          echo '<div class="py-3 mb-4 pl-3" style="border-top: 2px solid #0fa8ae;background-color: #f7f6f7;">

                                                Login? <a href="'.$url.'/login">Click here to login</a>

                                              </div>';

                                        }



                                echo "</form>                                    



                                </div>



                              </div>



                          </div>";







                        echo"<div class='tab-pane fade' id='ds-t3' role='tabpanel' aria-labelledby='ds-3'>



                            <div class='dc-list'>



                               <h4>Vendor Information</h4>



                              <ul class='list-unstyled'>";



                              $prodtvenderdetals = "SELECT * FROM vendor WHERE vendor_auto='$editviewprodauvid' LIMIT 1";



                              $queryprovid = mysqli_query($conn,$prodtvenderdetals);



                              while($rowprodvid = mysqli_fetch_array($queryprovid)){



                              	$prodvfname = $rowprodvid['vendor_f_name'];



                              	$prodvlname = $rowprodvid['vendor_l_name'];



                              	$prodvunname = $rowprodvid['vendor_uni_name'];



                              	$prodvcompname = $rowprodvid['vendor_company'];

                                $prodvaddress = $rowprodvid['vendor_st_address'];


                              	$prodvcompauto = $rowprodvid['vendor_auto'];



                              }



                            echo "<li class='store-name'>



                                    <span>Store Name: </span>";



                                    if($prodvcompname == ""){



                                    	echo "<span class='details'><a href='$url/$prodvunname'>$prodvfname $prodvlname</a></span></li>";



                                    }else{



                                    	echo "<span class='details'><a href='$url/$prodvunname'>$prodvcompname</a></span></li>";



                                    }



                            echo "<li class='seller-name'>



                                    <span>Vendor: </span>";



                            echo "<span class='details'><a href='$url/$prodvunname'>$prodvfname $prodvlname</a></span></li>";



                            echo "<li class='store-address'>



                                    <span><b>Vendor's Location: </b></span>";



                            echo "<span class='details'>$prodvaddress</span></li>";



                            echo "<li class='clearfix'>No ratings found yet!</li>";



                        echo "</ul>



                            </div>



                          </div>







                          <div class='tab-pane fade' id='ds-t4' role='tabpanel' aria-labelledby='ds-4'>



                            <div class='dc-list'>


                                <ul class='more-product'>";


                                	echo "<div class='vendor_link'><a href='$url/$prodvunname'>Go to Vendor Store</a></div>";


                            echo"</ul>



                              



                            </div>



                          </div>







                      </div>



                    </div>



                </div>



                <!-- End here pro list -->



            </div>



        </div>";



	}



}







function showrelateproduct($showdataid,$productsingname){



	global $conn;

  global $url;



	$showallreletprodt = "SELECT * FROM all_product";



	$showrwlatprot = mysqli_query($conn,$showallreletprodt);



	while($rowshoprodt = mysqli_fetch_array($showrwlatprot)){



  $stock = $rowshoprodt['product_stock'];



  $pId = $rowshoprodt['id'];



		$prodtsinglcatall = $rowshoprodt['product_catger'];



		$explodrelateprodtall = explode(",", $prodtsinglcatall);



		$singleprodtcatidall = $explodrelateprodtall[0];



		$singlverreletid = $rowshoprodt['product_vender_id'];



		$singl_prodt_id_one = $rowshoprodt['product_auto_id'];







		$venornamerelteprod = "SELECT * FROM vendor WHERE vendor_auto='$singlverreletid'";



		$quewryrelstprodt = mysqli_query($conn,$venornamerelteprod);



		while($rowrletstprodtcvend = mysqli_fetch_array($quewryrelstprodt)){



			$vemdrofname = $rowrletstprodtcvend['vendor_f_name'];



			$vemdrolname = $rowrletstprodtcvend['vendor_l_name'];



		}

$singleprodtcatid = "";

$relatdproductid = "SELECT * FROM all_product WHERE product_auto_id='$showdataid'";



  $queryrelteprodt = mysqli_query($conn,$relatdproductid);



  while ($rowrelateprod = mysqli_fetch_array($queryrelteprodt)){



    $prodtsinglcat = $rowrelateprod['product_catger'];



    $explodrelateprodt = explode(",", $prodtsinglcat);



    $singleprodtcatid = $explodrelateprodt[0];



  }



		if($singleprodtcatidall == $singleprodtcatid){



			if($productsingname == $rowshoprodt['product_page_name']){}else{







				$singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$singl_prodt_id_one' ORDER BY img_postion DESC";



				$queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);



				while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){



					$singl_image_val = $rowallimges_one['produt_img'];



				}



				echo "<div class='item' $pId>



			            <div class='fas-item-wrap'>



			              <a href='$url/".$rowshoprodt['product_page_name']."'>



			              <div class='item-img'>



			                <img src='$url/assets/images/product-img/".$rowshoprodt['product_image']."'>



			                <img src='$url/assets/images/product-img/$singl_image_val'>



			              </div>



			              </a>



			              <div class='item-txt'>



			                <div class='item-title'>$vemdrofname $vemdrolname</div>



			                <div class='item-dis'>".$rowshoprodt['product_name']."</div>";



                      if($rowshoprodt['product_sale_price'] == ""){

                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($rowshoprodt['product_regular_price'], 2)."</div></div>";

                      }else{

                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($rowshoprodt['product_sale_price'], 2)."</div>";

                        echo "<div class='pric_dis'><span>$</span>".number_format($rowshoprodt['product_regular_price'], 2)."</div></div>";

                      }

                      if($stock == "0"){

                      echo "<div class='item-cart'><button class='alert alert-danger unavailable'>Out of Stock</button></div>";

                    }else{

                      echo "<div class='item-cart'><button pid='$pId' class='add-cart addToCart'>Add to Cart</button></div>";

                    }



			    echo "</div>



			            </div>



			          </div>";



	          }



	    }



	}



}



function pricemaxval($uperprice,$typename){

  global $conn;



  $sqlmin = "SELECT MIN(product_regular_price) FROM all_product";

  $resultmin = mysqli_query($conn, $sqlmin);

  $rowmin = mysqli_fetch_array($resultmin);

  $minvalmin = $rowmin[0];



  $sqlmax = "SELECT MAX(product_regular_price) FROM all_product";

  $resultmax = mysqli_query($conn, $sqlmax);

  $rowmax = mysqli_fetch_array($resultmax);

  $minvalmax = $rowmax[0];

  if($uperprice == ""){

    $vale_data = '<input type="range" min="'.$minvalmin.'" max="'.$minvalmax.'" value="'.$minvalmin.'" id="lower"><input type="range" min="'.$minvalmin.'" max="'.$minvalmax.'" value="'.$minvalmax.'" id="upper">';
  }elseif($uperprice == "0"){
    //echo $uperprice;
    $vale_data = '<input type="range" min="'.$minvalmin.'" max="'.$minvalmax.'" value="'.$minvalmin.'" id="lower"><input type="range" min="'.$minvalmin.'" max="'.$minvalmax.'" value="'.$minvalmax.'" id="upper">';
  }else{

    $get_price = $urluper;
    $explode_vale = explode('-', $get_price);
    $lowpriceval = $explode_vale[0];
    $hightval = $explode_vale[1];
    $vale_data = '<input type="range" min="'.$lowpriceval.'" max="'.$hightval.'" value="'.$lowpriceval.'" id="lower"><input type="range" min="'.$lowpriceval.'" max="'.$hightval.'" value="'.$hightval.'" id="upper">';
  }

  echo '<fieldset class="filter-price">

          <div class="price-field">

              '.$vale_data.'

          </div>

          <div class="price-wrap">



              <div class="price-container">

                  <div class="price-wrap-1">



                      <label for="one">$</label>

                      <input id="one">

                  </div>

                  <div class="price-wrap_line">-</div>

                  <div class="price-wrap-2">

                      <label for="two">$</label>

                      <input id="two">



                  </div>

              </div>

              <button type="button" class="price-title pricefilter">FILTER</button>

          </div>

      </fieldset>';



}







/*function getcatcount(){



  global $conn;

  echo "<div class='card mob-filter'>";



  $showsubcat = "SELECT * FROM product_categories";

  $quewrysingcat = mysqli_query($conn,$showsubcat);

  while($row_getval = mysqli_fetch_array($quewrysingcat)){

    $explodedata = explode('//', $row_getval['prd_cat_prent_categ']);

    $exploadsingl_one = $explodedata[1];

    $exploadsingl_two = $explodedata[2];

    $exploadsingl_three = $explodedata[3];



    $explodcomma = explode(',', $exploadsingl_one);

    $singl_valcomma = $explodcomma[0];

    //$imploadval = implode('//', $explodedata);

}

    $singlcat_page = "SELECT * FROM product_categories ORDER BY id DESC";

    $getmainhed = mysqli_query($conn,$singlcat_page);

    while($rowshow = mysqli_fetch_array($getmainhed)){

      $main_cat_name = $rowshow['prd_cat_name'];

      $mainmane = $rowshow['prd_cat_prent_categ'];

      



      if($mainmane == ""){

      //$makearray = preg_replace("/\b(\w+)\s+\\1\b/i", "$1", $main_cat_name);

      echo "<div class='card-header'>

              <a class='card-link' data-toggle='collapse' href='#collapseOne'>$main_cat_name

                <span class='count'><span class='post_count'>1</span></span>

              </a>

            </div>";

    }



    }*/



    /*echo "<div id='collapseOne' class='collapse show' data-parent='#accordion'>

          <div class='caparent'><a href='?categories=$exploadsingl_one'>$singl_valcomma</a> <span class='count'><span class='post_count'> 20 </span></span></div>

            <div class='card-body'>

                <ul class='children2'>

                    <li class='caitem'><a href='#'></a> <span class='count'><span class='post_count'> 0 </span></span>

                    </li>

                </ul>

              </div>

        </div>";*/

/*  echo "</div>";

}*/

/*<div class='caparent'><a href='#'>".$row_getval['prd_cat_name']."</a> <span class='count'><span class='post_count'> 20 </span></span></div>*/

/*  $countproductjely = "SELECT COUNT(1) FROM all_product WHERE product_catger='MEN'";



  $quyercutjely = mysqli_query($conn,$countproductjely);



  $fetchcutjely = mysqli_fetch_array($quyercutjely);



  echo $rowshowval = $fetchcutjely[0];*/



function cateSubcatTreedroup($parent_id = 0, $sub_mark = ''){
    global $conn;
    $query = $conn->query("SELECT * FROM product_categories WHERE prd_cat_prent_categ = $parent_id ORDER BY prd_cat_postion ASC");
   
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            /*$cata_uslset = preg_replace("/[^A-Za-z0-9]/","-", $row['prd_cat_slug']);*/
            $cata_uslset = $row['prd_cat_slug'];
            echo '<option value="'.$cata_uslset.'">'.$sub_mark.$row['prd_cat_name'].'</option>';
            cateSubcatTreedroup($row['id'], $sub_mark.'--');
        }
    }
}


function viewallproductbydate(){



  global $conn;

  global $url;



  $sql = "SELECT * FROM all_product WHERE product_status='1' ORDER BY id DESC LIMIT 12";



  $qry = mysqli_query($conn,$sql);



  $count = 1;



  $numRows = mysqli_num_rows($qry);



  if(mysqli_num_rows($qry) !=  0 ){



    while($row = mysqli_fetch_array($qry)){



      $pId = $row['id'];



      $pName = $row['product_name'];



      $regPrice = $row['product_regular_price'];



      $salePrice = $row['product_sale_price'];



      $produtautoid = $row['product_auto_id'];



      $vendorid = $row['product_vender_id'];

      $stock = $row['product_stock'];
      $attbutval = $row['product_size'];
      $attbutvalcolor = $row['product_color'];





      if(!empty($salePrice)){



        $finalPrice = $salePrice;



      }else{



        $finalPrice = $regPrice;



      }



      $productImg = $row['product_image'];



      //$productDes = substr($row['product_destion'], 0, 50);







      $singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";



      $queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);



      while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){



        $singl_image_val = $rowallimges_one['produt_img'];



      }



      $get_vendro_naem = "SELECT * FROM vendor WHERE vendor_auto='$vendorid'";

      $querydata = mysqli_query($conn,$get_vendro_naem);

      while($rowsinglval = mysqli_fetch_array($querydata)){

        $firstnam = $rowsinglval['vendor_f_name'];

        $lasttnam = $rowsinglval['vendor_l_name'];

      }



      $pieces = explode(" ", $pName);

      $first_part = implode(" ", array_splice($pieces, 0, 4));



      echo '<li>



                <div class="fas-item-wrap">';

                if($row['product_approve_stmp'] == "1"){
                        echo "<div class='approve-stemp'>
                            <img src='$url/assets/images/stamp-of-approval-new.png' title='Approved by Gallery LaLa'>
                          </div>";
                    }

                echo '<a href="'.$url.'/'.$row['product_page_name'].'">



                  <div class="item-img">



                    <img src="'.$url.'/assets/images/product-img/'.$productImg.'">



                    <img src="'.$url.'/assets/images/product-img/'.$singl_image_val.'">



                  </div>



                  </a>



                  <div class="item-txt">



                    <div class="item-title">'.$firstnam.' '.$lasttnam.'</div>



                    <div class="item-dis">'.$first_part.'</div>';



                    if($row['product_sale_price'] == ""){

                           echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($row['product_regular_price'], 2)."</div></div>";

                        }else{

                          echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($row['product_sale_price'], 2)."</div>";

                          echo "<div class='pric_dis'><span>$</span>".number_format($row['product_regular_price'], 2)."</div></div>";

                        }



                    if($stock == "0"){

                    echo "<div class='item-cart'><button class='alert alert-danger unavailable'>Out of Stock</button></div>";

                    }else{

                      if($attbutval != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }elseif($attbutvalcolor != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }else{
                        echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
                      }

                    }



          echo '</div>



                



                </div>



              </li>';



    }







  }else{



    echo "<li>No Vendors Found</li>";



  }



}







function showallnews(){



  global $conn;

  global $url;





  $showvaledata_laestnews = "SELECT * FROM homemedia WHERE media_type='latestnews' AND media_status='1'";



  $queryshowdata_laestnews = mysqli_query($conn,$showvaledata_laestnews);



  while($rowshowfwtchdat_laestnews = mysqli_fetch_array($queryshowdata_laestnews)){



    $getfehdataid_laestnews = $rowshowfwtchdat_laestnews['media_title'];



    $statusfeshprodty_laestnews = $rowshowfwtchdat_laestnews['media_link'];



    $statusfeshprodty_url = $rowshowfwtchdat_laestnews['media_url_path'];







    echo "<li>



              <div class='news-item-wrap'>



                <div class='news-item-title'>$getfehdataid_laestnews</div>



                <div class='news-dis news-datarap'>$statusfeshprodty_laestnews</div>



                <div class='news-details'><a href='$url/news/$statusfeshprodty_url'><i class='fa fa-arrow-right'></i></a></div>



              </div>



            </li>";



  }



}







function getsinglnewid($productsingname){



  global $conn;



  $shownewid = "SELECT * FROM homemedia WHERE media_type='latestnews' AND media_status='1' AND media_url_path='$productsingname' ORDER BY id DESC LIMIT 1";



  $querynewid = mysqli_query($conn,$shownewid);



  while($rowsinglnewdidval = mysqli_fetch_array($querynewid)){



    $singlautoidnew = $rowsinglnewdidval['media_auto_id'];



    return $singlautoidnew;

  }

}







function showsinglallnews($showsinglnewid){



  global $conn;







  $showvaledata_laestnews = "SELECT * FROM homemedia WHERE media_type='latestnews' AND media_status='1' AND media_auto_id='$showsinglnewid' ORDER BY id DESC LIMIT 1";



  $queryshowdata_laestnews = mysqli_query($conn,$showvaledata_laestnews);



  while($rowshowfwtchdat_laestnews = mysqli_fetch_array($queryshowdata_laestnews)){



    $getfehdataid_laestnews = $rowshowfwtchdat_laestnews['media_title'];



    $statusfeshprodty_laestnews = $rowshowfwtchdat_laestnews['media_link'];



    $statusfeshprodty_url = $rowshowfwtchdat_laestnews['media_url_path'];







    echo "<div class='news-item-title'>$getfehdataid_laestnews</div>



                <div class='news-dis'>$statusfeshprodty_laestnews</div>";



  }



}

/************ show hover **********/

function fetchCategoryTreeList($parent, $category) {

    $html = "";

    if (isset($category['prd_cat_prent_categ'][$parent])) {

      $html .= "<ul>\n";

      foreach ($category['prd_cat_prent_categ'][$parent] as $cat_id) {

        if (!isset($category['prd_cat_prent_categ'][$cat_id])) {

          $html .= "<li>\n  <a href='" . $category['product_categories'][$cat_id]['prd_cat_name'] . "'>" . $category['product_categories'][$cat_id]['prd_cat_name'] . "</a>\n</li> \n";

        }

        if (isset($category['prd_cat_prent_categ'][$cat_id])) {

          $html .= "<li>\n  <a href='" . $category['product_categories'][$cat_id]['prd_cat_name'] . "'>" . $category['product_categories'][$cat_id]['prd_cat_name'] . "</a> \n";

          $html .= buildCategory($cat_id, $category);

          $html .= "</li> \n";

        }

      }

      $html .= "</ul> \n";

    }

    return $html;

  }



/*function fetchCategoryTreeList($parent = 0, $user_tree_array = ''){

  global $conn;

  global $url;

    if (!is_array($user_tree_array))

    $user_tree_array = array();

 

  $sql = "SELECT * FROM product_categories WHERE 1 AND prd_cat_prent_categ=$parent ORDER BY id DESC";

  $query = mysqli_query($conn,$sql);

  if (mysqli_num_rows($query) > 0) {

     $user_tree_array[] = "<div class='card mob-filter'><div class='card-header'>";

    while ($row = mysqli_fetch_object($query)) {

    $url_data = preg_replace("/[^A-Za-z0-9]/","_", $row->prd_cat_name);

    $user_tree_array[] = "<a href='".$url."/product-category/?".$url_data."'>". $row->prd_cat_name."</a><span class='count'><span class='post_count'>".$row->prd_cat_count."</span></span></div>";

      $user_tree_array = fetchCategoryTreeList($row->id, ."<li>$user_tree_array</li>");

    }

  $user_tree_array[] = "</div>";

  }

  return $user_tree_array;

}*/





function categories()

{

  global $conn;

  

  $sql = "SELECT * FROM product_categories WHERE prd_cat_prent_categ=0 ORDER BY prd_cat_postion ASC";

  $result = $conn->query($sql);

  

  $categories = array();

  

  while($row = $result->fetch_assoc())

  {
    if($row['prd_cat_count'] == "0" || $row['prd_cat_count'] == ""){}else{
      $categories[] = array(

        'id' => $row['id'],

        'parent_id' => $row['prd_cat_prent_categ'],

        'category_name' => $row['prd_cat_name'],

        'category_slug' => $row['prd_cat_slug'],

        'category_count' => $row['prd_cat_count'],

        'subcategory' => sub_categories($row['id']),

      );
    }

  }

  

  return $categories;

}



function sub_categories($id)

{

  global $conn;

  

  $sql = "SELECT * FROM product_categories WHERE prd_cat_prent_categ=$id";

  $result = $conn->query($sql);

  

  $categories = array();

  

  while($row = $result->fetch_assoc())

  { 

    if($row['prd_cat_count'] == "0" || $row['prd_cat_count'] == ""){}else{

      $categories[] = array(

        'id' => $row['id'],

        'parent_id' => $row['prd_cat_prent_categ'],

        'category_name' => $row['prd_cat_name'],

        'category_slug' => $row['prd_cat_slug'],

        'category_count' => $row['prd_cat_count'],

        'subcategory' => sub_categories($row['id']),

      );
    }

  }

  return $categories;

}



function viewsubcat($categories)

{

  $html = '<ul class="children2"><li class="caitem">';

  

  foreach($categories as $category){

    $url_data = preg_replace("/[^A-Za-z0-9]/","_", $category['category_name']);

    $urlvaldata = $category['category_slug'];
    $url_parint_id = $category['parent_id'];

    $html .= '<li><a href="'.$url.'/product-category/'.$urlvaldata.'">'.$category['category_name'].'</a></li>';

    if(!empty($category['subcategory'])){

      $html .= viewsubcat($category['subcategory']);

    }

  }

  $html .= '</li></ul>';

  

  return $html;

}



function storecatdata($singvenderid){

  global $conn;



  $selectvendorcat = "SELECT * FROM all_product WHERE product_vender_id='$singvenderid'";

  $queryval = mysqli_query($conn,$selectvendorcat);

  while($rowsinglval = mysqli_fetch_array($queryval)){

    $getcatname = $rowsinglval['product_catger'];

    $explode = array_unique(array(explode(',', $getcatname)));

  }



  foreach ($explode as $value) {

    $singlval = $value[0];

    $singlvaltwo = $value[1];

    $singlvalthree = $value[2];

    $singlvalfour = $value[3];

    if($singlval == ""){}else{

      echo '<li><a href="#">'.$singlval.'</a></li>';

    }

    if($singlvaltwo == ""){}else{

      echo '<ul class="one"><li><a href="#">'.$singlvaltwo.'</a></li></ul>';

    }

    if($singlvalthree == ""){}else{

      echo '<ul class="inner"><li><a href="#">'.$singlvalthree.'</a></li></ul>';

    }

    if($singlvalfour == ""){}else{

       echo '<ul class="foruth"><li><a href="#">'.$singlvalfour.'</a></li></ul>';

    }

  }



}



function reviewviewvendor($singvenderid){

  global $conn;

  global $url;



  $count_review = "SELECT COUNT(1) FROM reviewdataval WHERE review_type='vendor' AND review_loginid='$singvenderid'";

  $querycount = mysqli_query($conn,$count_review);

  $rowcount = mysqli_fetch_array($querycount);

  $count_val = $rowcount[0];

  if($count_val == "0"){

    echo "<h5>There are no reviews yet.</h5>";

  }else{

    

  echo '<div class="row">

            <div class="col-sm-12">

              

              <div class="review-block">

                <ul class="review-ul-list">';



  $get_review = "SELECT * FROM reviewdataval WHERE review_type='vendor' AND review_loginid='$singvenderid'";

  $queryval = mysqli_query($conn,$get_review);

  while($rowval = mysqli_fetch_array($queryval)){

    $get_login_user = $rowval['review_loginuserid'];



    if($rowval['review_rating'] == "1"){



      $stars = '<i class="fa fa-star"></i>';



    }elseif($rowval['review_rating'] == "2"){



      $stars = '<i class="fa fa-star"></i> <i class="fa fa-star"></i>';



    }elseif($rowval['review_rating'] == "3"){



      $stars = '<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>';

      

    }elseif($rowval['review_rating'] == "4"){



      $stars = '<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>';

      

    }elseif($rowval['review_rating'] == "5"){



      $stars = '<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>';

      

    }else{

      $stars = '<i class="fa fa-star"></i>';

    }



    $get_vendr = "SELECT * FROM vendor WHERE vendor_auto='$get_login_user'";

    $quwerycechel = mysqli_query($conn,$get_vendr);

    if(mysqli_num_rows($quwerycechel)){

      

      $get_vendorname = "SELECT * FROM vendor WHERE vendor_auto='$get_login_user'";

      $venderquery = mysqli_query($conn,$get_vendorname);

      while($rowvendoer = mysqli_fetch_array($venderquery)){

        $venderfname = $rowvendoer['vendor_f_name'];

        $venderlname = $rowvendoer['vendor_l_name'];

        $img_valvendor = $rowvendoer['vendor_img'];

        if($img_valvendor == "0"){

          $main_ing = "assets/images/default-user-icon.jpg";

        }else{

          $main_ing = "assets/images/$img_valvendor";

        }

          echo '<li>

                  <div class="row">

                    <div class="col-sm-2">

                      <div class="review_images">

                        <img src="'.$url.'/'.$main_ing.'" class="img-rounded">

                      </div>

                    </div>

                    <div class="col-sm-10">

                      <div class="review_name">

                        <div class="review-block-name"><a >'.$venderfname.' '.$venderlname.'</a></div>

                        <div class="review-block-date">'.$rowval['review_date'].' '.$rowval['review_time'].'</div>

                      </div>

                      <div class="stars-box">                                           

                      '.$stars.' '.$rowval['review_rating'].' Star.

                    </div>

                      <div class="review-block-description">'.$rowval['review_text'].'</div>

                    </div>

                  </div>

                </li><hr>';

      }



    }else{

      $cechk_user = "SELECT * FROM customer WHERE customer_ui_id='$get_login_user'";

      $quwerycechlk = mysqli_query($conn,$cechk_user);

      if(mysqli_num_rows($quwerycechlk)){



        $get_cunstoer = "SELECT * FROM customer WHERE customer_ui_id='$get_login_user'";

        $quweryvalcustome = mysqli_query($get_cunstoer);

        while($rowcustomer = mysqli_fetch_array($quweryvalcustome)){

          $first_name = $rowcustomer['customer_fname'];

          $last_name = $rowcustomer['customer_lname'];

          $img_valcutomer = $rowcustomer['customer_img'];



          if($img_valcutomer == "0"){

          $main_ingcustom = "$url/assets/images/default-user-icon.jpg";

        }else{

          $main_ingcustom = "$url/assets/images/$img_valcutomer";

        }

          echo '<li>

                  <div class="row">

                    <div class="col-sm-2">

                      <div class="review_images">

                        <img src="'.$url.'/'.$main_ingcustom.'" class="img-rounded">

                      </div>

                    </div>

                    <div class="col-sm-10">

                      <div class="review_name">

                        <div class="review-block-name"><a>'.$first_name.' '.$last_name.'</a></div>

                        <div class="review-block-date">'.$rowval['review_date'].' '.$rowval['review_time'].'</div>

                      </div>

                      <div class="stars-box">                                           

                       '.$stars.' '.$rowval['review_rating'].' Star.

                    </div>

                      <div class="review-block-description">'.$rowval['review_text'].'</div>

                    </div>

                  </div>

                </li><hr>';



        }



      }else{

        $cehck_admin = "SELECT * FROM userlogntable WHERE user_auto='$get_login_user'";

        $quweryval = mysqli_query($conn,$cehck_admin);

        if(mysqli_num_rows($quweryval)){



          $admin_detial = "SELECT * FROM userlogntable WHERE user_auto='$get_login_user'";

          $quweryadmin = mysqli_query($conn,$admin_detial);

          while($rowadmin = mysqli_fetch_array($quweryadmin)){

            $admin_name = "Admin";



            if("0" == "0"){

              $main_ingadmin = "$url/assets/images/default-user-icon.jpg";

            }else{

              $main_ingadmin = "$url/assets/images/$img_valcutomer";

            }

              echo '<li>

                      <div class="row">

                        <div class="col-sm-2">

                          <div class="review_images">

                            <img src="'.$url.'/'.$main_ingadmin.'" class="img-rounded">

                          </div>

                        </div>

                        <div class="col-sm-10">

                          <div class="review_name">

                            <div class="review-block-name"><a>Admin</a></div>

                            <div class="review-block-date">'.$rowval['review_date'].' '.$rowval['review_time'].'</div>

                          </div>

                          <div class="stars-box">                                           

                           '.$stars.' '.$rowval['review_rating'].' Star

                        </div>

                          <div class="review-block-description">'.$rowval['review_text'].'</div>

                        </div>

                      </div>

                    </li><hr>';

          }



        }

      }

    }

  }

  echo '</ul>

      </div>

      </div>';

      }

  echo '</div>';

}



function footershow(){

  global $conn;



  $footerval = "SELECT * FROM footer";

  $query = mysqli_query($conn,$footerval);

  while($row = mysqli_fetch_array($query)){

    echo '<span class="copy-txt" style="text-align: left;">'.$row['footer_copyright'].'</span>';

  }

}



function tracknumber($numbertrck){

  global $conn;



  $cehcknumber = "SELECT * FROM traking_customer WHERE trk_cust_number='$numbertrck'";

  $query_val = mysqli_query($conn,$cehcknumber);

  if(mysqli_num_rows($query_val)){



  $track_num = "SELECT * FROM traking_customer WHERE trk_cust_number='$numbertrck' LIMIT 1";

  $queryval = mysqli_query($conn,$track_num);

  while($row_val = mysqli_fetch_array($queryval)){

    $get_numbnertrack = $row_val['trk_cust_number'];

    $get_fedexval = trim($row_val['trk_cust_fedexnum']);

  }

  if($get_fedexval == ""){

      return "1";

    }else{

      return $get_fedexval;

    }

  }else{

    return "2";

  }

}



function ontimepassword($otp_val,$new_password,$auto_id,$onetime_id){

  global $conn;



  $mdfiveval = MD5($new_password);

  $onetimepass = "SELECT * FROM onetmpswd WHERE onetmpswd_auto='$auto_id' AND onetmpswd_auto_id='$onetime_id' AND onetmpswd_password='$otp_val' AND onetmpswd_stats='0'";

  $quyeryval = mysqli_query($conn,$onetimepass);

  while($rowval = mysqli_fetch_array($quyeryval)){



    $update_password = "UPDATE userlogntable SET user_password='$mdfiveval' WHERE user_auto='$auto_id'";

    $queruval = mysqli_query($conn,$update_password);



    $passwordset = "UPDATE onetmpswd SET onetmpswd_stats='1' WHERE onetmpswd_auto='$auto_id' AND onetmpswd_auto_id='$onetime_id' AND onetmpswd_password='$otp_val'";

    $vale_data = mysqli_query($conn,$passwordset);

    if($vale_data == true){

      return true;

    }else{

      return false;

    }



  }

}



function cechkandmail($email_cehck){

  global $conn;



  $dataemialcehck = "SELECT * FROM userlogntable WHERE user_email='$email_cehck'";

  $emailcehclk = mysqli_query($conn,$dataemialcehck);

  if(mysqli_num_rows($emailcehclk)){

    while($rowemail = mysqli_fetch_array($emailcehclk)){

      $email_vale = $rowemail['user_email'];

      $type_vale = $rowemail['user_type'];

      $status_vale = $rowemail['user_status'];

      $fname_vale = $rowemail['user_first_name'];

      $lanem_vale = $rowemail['user_lastname'];

      $auto_id = $rowemail['user_auto'];

      $token = str_shuffle($email_vale);



      if($type_vale == "admin"){

        return false;

      }else{



        $to = $email_vale;



        $subject = "Password Reset Link";



        $from = "no-reply@gallerylala.com";



         



        // To send HTML mail, the Content-type header must be set



        $headers  = 'MIME-Version: 1.0' . "\r\n";



        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



         



        // Create email headers



        $headers .= 'From: '.$from."\r\n".







        'X-Mailer: PHP/' . phpversion();







        $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>



        <html xmlns='http://www.w3.org/1999/xhtml'>



        <head>



        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />



        <title>Gallery La La</title>



        <meta name='viewport' content='width=device-width, initial-scale=1.0'/>



        </head>



        <body style='margin: 0; padding: 0;'>



            <table border='0' cellpadding='0' cellspacing='0' width='100%'> 



                <tr>



                    <td style='padding: 10px 0 30px 0;'>



                        <table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border: 1px solid #cccccc; border-collapse: collapse;'>



                            <tr>



                                <td align='center' bgcolor='#0fa8ae' style='padding: 40px 0 30px 0; color: #FFF; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;'>



                                    <img src='https://gallerylala.com/assets/images/logo.png' alt='Creating Email Magic' width='300' height='230' style='display: block;' />



                                </td>



                            </tr>



                            <tr>



                                <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>



                                    <table border='0' cellpadding='0' cellspacing='0' width='100%'>


                                        <tr>



                                            <td style='color: #153643; font-family: Arial, sans-serif; font-size: 20px; padding-bottom: 15px;'>



                                                Hello<b> ".$fname_vale." ".$lanem_vale.",</b>



                                            </td>



                                        </tr>



                                        <tr>



                                            <td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 30px;'>


                                                Please click <a href='https://gallerylala.com/resetpassword?token=".$token."&auto=".$auto_id."&email=".$email_vale."'>here</a> to reset your password. <br/><br/><br/>



                                                Regards<br/>


                                                Gallery La La<br/>



                                            </td>



                                        </tr>



                                    </table>



                                </td>



                            </tr>



                            <tr>



                                <td bgcolor='#0fa8ae' style='padding: 30px 30px 30px 30px;'>



                                    <table border='0' cellpadding='0' cellspacing='0' width='100%'>



                                        <tr>



                                            <td style='color: #ffffff; font-family: Arial, sans-serif; font-size: 14px; text-align:center;' width='100%'>



                                                &copy;2020 Gallery La La LLC. All Rights Reserved.<br/><br/>



                                            </td>



                                        </tr>



                                    </table>



                                </td>



                            </tr>



                        </table>



                    </td>



                </tr>



            </table>



        </body>



        </html>";



        // Sending email





      mail($to, $subject, $message, $headers);



      $date = date('m/d/Y');

      $time = date('H:i:s');



      $insert_vale = "INSERT INTO forgotpassword(tokenval,autoval,emailval,statusval,date_vale,time_vale)VALUES('$token','$auto_id','$email_vale','0','$date','$time')";

      $queryval = mysqli_query($conn, $insert_vale);

      if($queryval == true){

        return true;

      }else{

        return false;

      }

      }

    }

  }else{

    return false;

  }

}



function valedatevalue($get_token,$auto_token,$email_token){

  global $conn;

  $date_val = date('m/d/Y');

  $valdate_vale = "SELECT * FROM forgotpassword WHERE tokenval='$get_token' AND autoval='$auto_token' AND emailval='$email_token' AND statusval='0' AND date_vale='$date_val'";

  $queryval = mysqli_query($conn,$valdate_vale);

  if(mysqli_num_rows($queryval)){

    return true;

  }else{

    return false;

  }

}



function setnewpass($new_password,$auto_token,$email_token,$get_token){

  global $conn;

  $newpasswordvale = MD5($new_password);

  $set_new_passw = "UPDATE forgotpassword SET statusval='1' WHERE tokenval='$get_token' AND autoval='$auto_token' AND emailval='$email_token'";

  $querymy = mysqli_query($conn,$set_new_passw);



  $updatepass = "UPDATE userlogntable SET user_password='$newpasswordvale' WHERE user_email='$email_token' AND user_auto='$auto_token'";

  $querypass = mysqli_query($conn,$updatepass);

  if($querypass == true){

    return true;

  }else{

    return false;

  }

}



function productcatgres($setprodval,$get_query=0){

  global $conn;

  $setprodval = $setprodval;

$uper_id = $_SERVER['REQUEST_URI'];
$get_pagename = explode('/product-category/', $uper_id);
$implode_value = implode('/', $get_pagename);
$explode_vale = explode('/', $implode_value);
$impldefilter = implode('', $explode_vale);
$withoutfilter = explode('?', $setprodval);
$filtervalue = substr($withoutfilter[1], 2);
$setprodval_new = strtok($setprodval, "?");

$singlidcat = $get_pagename[2];
$seturl_apge = preg_replace("/[^A-Za-z0-9]/","_", $singlidcat);
$pagematch = preg_replace("/[^A-Za-z0-9]/"," ", $singlidcat);

$get_catcountva = "SELECT * FROM product_categories WHERE prd_cat_slug='$setprodval_new'";
$querysetval = $conn->query($get_catcountva);
if($querysetval->num_rows > 0){
  while($rowgetqueryva = $querysetval->fetch_array()){
    $get_countcatval[] = $rowgetqueryva['prd_cat_count'];
    $get_slugval = $rowgetqueryva['prd_cat_name'];
    $get_catgroyid = $rowgetqueryva['prd_cat_prent_categ'];
  }
}else{
  $get_countcatval[] = "0";
}
if($get_countcatval[0] == "0" || $get_countcatval[0] == ""){
  echo "No products in this category.";
}else{

//echo $get_catname_val;
//echo $get_slugval;  product_catger LIKE '%$get_catname_val%' OR
//print_r($explode_vale);
//print_r($get_cat_name);

echo "<ul class='producfilter-item'>";

//print_r($explode_vale);
//echo strtok($explode_vale[3], '?');
if($get_query == "0"){
  $explode_single_val = explode('?', $get_pagename[1]);
  $pagename_get = explode('/', $explode_single_val[0]);
  //print_r($pagename_get);
  $explodeone = $pagename_get[0];
  $explodetwo = $pagename_get[1];
  $explodethree = $pagename_get[2];
  $explodefour = $pagename_get[3];
}else{
$explodeone = strtok($explode_vale[1], '?');
$explodetwo = strtok($explode_vale[2], '?');
$explodethree = strtok($explode_vale[3], '?');
$explodefour = strtok($explode_vale[4], '?');

 if($get_query == "latest"){
  $product_filter_val = "1";
 }elseif($get_query == "low_price"){
  $product_filter_val = "2";
 }elseif($get_query == "high_price"){
  $product_filter_val = "3";
 }elseif($get_query !== ""){
  $product_filter_val = "4";
 }
//echo $product_filter_val;
}
//echo $explodeone;

if($explodefour == ""){
if($explodethree == ""){
if($explodetwo == ""){
if($explodeone == ""){}else{

  $arrrayvaledat = $explodeone;
  $selctcatval = "SELECT * FROM product_categories WHERE prd_cat_slug='$arrrayvaledat'";
  $quueryvale = $conn->query($selctcatval);
  while($row_valedata = $quueryvale->fetch_array()){
    $get_cat_name = $row_valedata['prd_cat_name'];

    //$product_filter_val;
    if($get_query == "0"){
      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_catger LIKE '$get_cat_name%'";
    }elseif($product_filter_val == "1"){
      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_catger LIKE '$get_cat_name%' ORDER BY id DESC";
    }elseif($product_filter_val == "2"){

      $get_lowprice = "SELECT MIN(product_regular_price) FROM all_product WHERE product_status='1' AND product_catger LIKE '$get_cat_name%'";
      $queryval = mysqli_query($conn,$get_lowprice);
      $vallowqyeru = mysqli_fetch_array($queryval);
      $show_val = $vallowqyeru[0];

      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_regular_price>='$show_val' AND product_catger LIKE '$get_cat_name%' ORDER BY `product_regular_price` ASC";

    }elseif($product_filter_val == "3"){
      
      $get_lowprice = "SELECT MAX(product_regular_price) FROM all_product WHERE product_status='1' AND product_catger LIKE '$get_cat_name%'";
      $queryval = mysqli_query($conn,$get_lowprice);
      $vallowqyeru = mysqli_fetch_array($queryval);
      $show_val = $vallowqyeru[0];

      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_regular_price<='$show_val' AND product_catger LIKE '$get_cat_name%' ORDER BY `product_regular_price` DESC";

    }elseif($product_filter_val == "4"){

      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_name LIKE '%$get_query%' OR product_sku LIKE '%$get_query%' AND  product_catger LIKE '$get_cat_name%' ORDER BY id DESC";

    }else{
      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_catger LIKE '$get_cat_name%'";
    }

        $qry = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($qry)){

      $pId = $row['id'];

      $pName = $row['product_name'];

      $regPrice = $row['product_regular_price'];

      $salePrice = $row['product_sale_price'];

      $produtautoid = $row['product_auto_id'];

      $vendorid = $row['product_vender_id'];

      $stock = $row['product_stock'];
      $attbutval = $row['product_size'];
      $attbutvalcolor = $row['product_color'];



      if(!empty($salePrice)){

        $finalPrice = $salePrice;

      }else{

        $finalPrice = $regPrice;

      }

      $productImg = $row['product_image'];

      //$productDes = substr($row['product_destion'], 0, 50);



      $singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";

      $queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);

      while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){

        $singl_image_val = $rowallimges_one['produt_img'];

      }



      $pieces = explode(" ", $pName);

      $first_part = implode(" ", array_splice($pieces, 0, 4));

      

      $get_vendro_naem = "SELECT * FROM vendor WHERE vendor_auto='$vendorid'";

      $querydata = mysqli_query($conn,$get_vendro_naem);

      while($rowsinglval = mysqli_fetch_array($querydata)){

        $firstnam = $rowsinglval['vendor_f_name'];

        $lasttnam = $rowsinglval['vendor_l_name'];

      }

      echo '<li>

                <div class="fas-item-wrap">';

                if($rowvale['product_approve_stmp'] == "1"){
                    echo "<div class='approve-stemp'>
                        <img src='$url/assets/images/stamp-of-approval-new.png' title='Approved by Gallery LaLa'>
                      </div>";
                }

                echo '<a href="'.$url.'/'.$row['product_page_name'].'">

                  <div class="item-img">

                    <img src="'.$url.'/assets/images/product-img/'.$productImg.'">

                    <img src="'.$url.'/assets/images/product-img/'.$singl_image_val.'">

                  </div>

                  </a>

                  <div class="item-txt">

                    <div class="item-title">'.$firstnam.' '.$lasttnam.'</div>

                    <div class="item-dis">'.$first_part.'</div>';

                    if($row['product_sale_price'] == ""){

                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($row['product_regular_price'], 2)."</div></div>";

                      }else{

                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($row['product_sale_price'], 2)."</div>";

                        echo "<div class='pric_dis'><span>$</span>".number_format($row['product_regular_price'], 2)."</div></div>";

                      }

                    if($stock == "0"){

                    echo '<div class="item-cart"><button class="alert alert-danger unavailable">Out of Stock</button></div>';

                    }else{

                      if($attbutval != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }elseif($attbutvalcolor != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }else{
                        echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
                      }

                    }

            echo'</div>

                

                </div>

              </li>';

    }
  }
}// Repert
}else{
if($explodetwo != ""){

  $onevaledat = $explodeone;
  $querygetvalone = "SELECT * FROM product_categories WHERE prd_cat_slug='$onevaledat'";
  $valuequweryone = $conn->query($querygetvalone);
  while($rowqueryvale = $valuequweryone->fetch_array()){
    $catname_singl = $rowqueryvale['prd_cat_name'];

  $arrrayvaledat = $explodeone.'/'.$explodetwo;
  $selctcatval = "SELECT * FROM product_categories WHERE prd_cat_slug='$arrrayvaledat'";
  $quueryvale = $conn->query($selctcatval);
  while($row_valedata = $quueryvale->fetch_array()){
  $get_cat_nametwo = $catname_singl.','.$row_valedata['prd_cat_name'];


    //$product_filter_val;
    if($get_query == "0"){
      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_catger LIKE '%$get_cat_nametwo%'";
    }elseif($product_filter_val == "1"){
      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_catger LIKE '%$get_cat_nametwo%' ORDER BY id DESC";
    }elseif($product_filter_val == "2"){

      $get_lowprice = "SELECT MIN(product_regular_price) FROM all_product WHERE product_status='1' AND product_catger LIKE '%$get_cat_nametwo%'";
      $queryval = mysqli_query($conn,$get_lowprice);
      $vallowqyeru = mysqli_fetch_array($queryval);
      $show_val = $vallowqyeru[0];

      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_regular_price>='$show_val' AND product_catger LIKE '%$get_cat_nametwo%' ORDER BY `product_regular_price` ASC";

    }elseif($product_filter_val == "3"){
      
      $get_lowprice = "SELECT MAX(product_regular_price) FROM all_product WHERE product_status='1' AND product_catger LIKE '%$get_cat_nametwo%'";
      $queryval = mysqli_query($conn,$get_lowprice);
      $vallowqyeru = mysqli_fetch_array($queryval);
      $show_val = $vallowqyeru[0];

      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_regular_price<='$show_val' AND product_catger LIKE '%$get_cat_nametwo%' ORDER BY `product_regular_price` DESC";

    }elseif($product_filter_val == "4"){

      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_name LIKE '%$get_query%' OR product_sku LIKE '%$get_query%' AND  product_catger LIKE '%$get_cat_nametwo%' ORDER BY id DESC";

    }else{
      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_catger LIKE '%$get_cat_nametwo%'";
    }

        $qry = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($qry)){

      $pId = $row['id'];

      $pName = $row['product_name'];

      $regPrice = $row['product_regular_price'];

      $salePrice = $row['product_sale_price'];

      $produtautoid = $row['product_auto_id'];

      $vendorid = $row['product_vender_id'];

      $stock = $row['product_stock'];
      $attbutval = $row['product_size'];
      $attbutvalcolor = $row['product_color'];



      if(!empty($salePrice)){

        $finalPrice = $salePrice;

      }else{

        $finalPrice = $regPrice;

      }

      $productImg = $row['product_image'];

      //$productDes = substr($row['product_destion'], 0, 50);



      $singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";

      $queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);

      while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){

        $singl_image_val = $rowallimges_one['produt_img'];

      }



      $pieces = explode(" ", $pName);

      $first_part = implode(" ", array_splice($pieces, 0, 4));

      

      $get_vendro_naem = "SELECT * FROM vendor WHERE vendor_auto='$vendorid'";

      $querydata = mysqli_query($conn,$get_vendro_naem);

      while($rowsinglval = mysqli_fetch_array($querydata)){

        $firstnam = $rowsinglval['vendor_f_name'];

        $lasttnam = $rowsinglval['vendor_l_name'];

      }

      echo '<li>

                <div class="fas-item-wrap">';

                if($rowvale['product_approve_stmp'] == "1"){
                    echo "<div class='approve-stemp'>
                        <img src='$url/assets/images/stamp-of-approval-new.png' title='Approved by Gallery LaLa'>
                      </div>";
                }

                echo '<a href="'.$url.'/'.$row['product_page_name'].'">

                  <div class="item-img">

                    <img src="'.$url.'/assets/images/product-img/'.$productImg.'">

                    <img src="'.$url.'/assets/images/product-img/'.$singl_image_val.'">

                  </div>

                  </a>

                  <div class="item-txt">

                    <div class="item-title">'.$firstnam.' '.$lasttnam.'</div>

                    <div class="item-dis">'.$first_part.'</div>';

                    if($row['product_sale_price'] == ""){

                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($row['product_regular_price'], 2)."</div></div>";

                      }else{

                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($row['product_sale_price'], 2)."</div>";

                        echo "<div class='pric_dis'><span>$</span>".number_format($row['product_regular_price'], 2)."</div></div>";

                      }

                    if($stock == "0"){

                    echo '<div class="item-cart"><button class="alert alert-danger unavailable">Out of Stock</button></div>';

                    }else{

                      if($attbutval != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }elseif($attbutvalcolor != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }else{
                        echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
                      }

                    }

            echo'</div>

                

                </div>

              </li>';

    }
  }
  }
}// Repert
}
}else{
  if($explodethree != ""){

  $onevaledat = $explodeone;
  $querygetvalone = "SELECT * FROM product_categories WHERE prd_cat_slug='$onevaledat'";
  $valuequweryone = $conn->query($querygetvalone);
  while($rowqueryvale = $valuequweryone->fetch_array()){
    $catname_singl = $rowqueryvale['prd_cat_name'];

    $twovaledat = $onevaledat.'/'.$explodetwo;
    $querygetvaltwo = "SELECT * FROM product_categories WHERE prd_cat_slug='$twovaledat'";
    $valuequweryteo = $conn->query($querygetvaltwo);
    while($rowqueryvaletwo = $valuequweryteo->fetch_array()){
      $catname_singlrtwo = $rowqueryvaletwo['prd_cat_name'];

  $arrrayvaledat = $explodeone.'/'.$explodetwo.'/'.$explodethree;
  $selctcatval = "SELECT * FROM product_categories WHERE prd_cat_slug='$arrrayvaledat'";
  $quueryvale = $conn->query($selctcatval);
  while($row_valedata = $quueryvale->fetch_array()){
  $get_cat_nametwo = $catname_singl.','.$catname_singlrtwo.','.$row_valedata['prd_cat_name'];

    //$product_filter_val;
    if($get_query == "0"){
      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_catger LIKE '%$get_cat_nametwo%'";
    }elseif($product_filter_val == "1"){
      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_catger LIKE '%$get_cat_nametwo%' ORDER BY id DESC";
    }elseif($product_filter_val == "2"){

      $get_lowprice = "SELECT MIN(product_regular_price) FROM all_product WHERE product_status='1' AND product_catger LIKE '%$get_cat_nametwo%'";
      $queryval = mysqli_query($conn,$get_lowprice);
      $vallowqyeru = mysqli_fetch_array($queryval);
      $show_val = $vallowqyeru[0];

      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_regular_price>='$show_val' AND product_catger LIKE '%$get_cat_nametwo%' ORDER BY 'product_regular_price' ASC";

    }elseif($product_filter_val == "3"){
      
      $get_lowprice = "SELECT MAX(product_regular_price) FROM all_product WHERE product_status='1' AND product_catger LIKE '%$get_cat_nametwo%'";
      $queryval = mysqli_query($conn,$get_lowprice);
      $vallowqyeru = mysqli_fetch_array($queryval);
      $show_val = $vallowqyeru[0];

      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_regular_price<='$show_val' AND product_catger LIKE '%$get_cat_nametwo%' ORDER BY 'product_regular_price' DESC";

    }elseif($product_filter_val == "4"){

      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_name LIKE '%$get_query%' OR product_sku LIKE '%$get_query%' AND  product_catger LIKE '$get_cat_nametwo%' ORDER BY id DESC";

    }else{
      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_catger LIKE '%$get_cat_nametwo%'";
    }
    $qry = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($qry)){

      $pId = $row['id'];

      $pName = $row['product_name'];

      $regPrice = $row['product_regular_price'];

      $salePrice = $row['product_sale_price'];

      $produtautoid = $row['product_auto_id'];

      $vendorid = $row['product_vender_id'];

      $stock = $row['product_stock'];
      $attbutval = $row['product_size'];
      $attbutvalcolor = $row['product_color'];



      if(!empty($salePrice)){

        $finalPrice = $salePrice;

      }else{

        $finalPrice = $regPrice;

      }

      $productImg = $row['product_image'];

      //$productDes = substr($row['product_destion'], 0, 50);



      $singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";

      $queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);

      while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){

        $singl_image_val = $rowallimges_one['produt_img'];

      }



      $pieces = explode(" ", $pName);

      $first_part = implode(" ", array_splice($pieces, 0, 4));

      

      $get_vendro_naem = "SELECT * FROM vendor WHERE vendor_auto='$vendorid'";

      $querydata = mysqli_query($conn,$get_vendro_naem);

      while($rowsinglval = mysqli_fetch_array($querydata)){

        $firstnam = $rowsinglval['vendor_f_name'];

        $lasttnam = $rowsinglval['vendor_l_name'];

      }

      echo '<li>

                <div class="fas-item-wrap">';

                if($rowvale['product_approve_stmp'] == "1"){
                    echo "<div class='approve-stemp'>
                        <img src='$url/assets/images/stamp-of-approval-new.png' title='Approved by Gallery LaLa'>
                      </div>";
                }

                echo '<a href="'.$url.'/'.$row['product_page_name'].'">

                  <div class="item-img">

                    <img src="'.$url.'/assets/images/product-img/'.$productImg.'">

                    <img src="'.$url.'/assets/images/product-img/'.$singl_image_val.'">

                  </div>

                  </a>

                  <div class="item-txt">

                    <div class="item-title">'.$firstnam.' '.$lasttnam.'</div>

                    <div class="item-dis">'.$first_part.'</div>';

                    if($row['product_sale_price'] == ""){

                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($row['product_regular_price'], 2)."</div></div>";

                      }else{

                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($row['product_sale_price'], 2)."</div>";

                        echo "<div class='pric_dis'><span>$</span>".number_format($row['product_regular_price'], 2)."</div></div>";

                      }

                    if($stock == "0"){

                    echo '<div class="item-cart"><button class="alert alert-danger unavailable">Out of Stock</button></div>';

                    }else{

                      if($attbutval != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }elseif($attbutvalcolor != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }else{
                        echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
                      }

                    }

            echo'</div>

                

                </div>

              </li>';

    }
  }
}
}
}// Repert
}
}else{

  if($explodefour != ""){

  $onevaledat = $explodeone;
  $querygetvalone = "SELECT * FROM product_categories WHERE prd_cat_slug='$onevaledat'";
  $valuequweryone = $conn->query($querygetvalone);
  while($rowqueryvale = $valuequweryone->fetch_array()){
    $catname_singl = $rowqueryvale['prd_cat_name'];

    $twovaledat = $onevaledat.'/'.$explodetwo;
    $querygetvaltwo = "SELECT * FROM product_categories WHERE prd_cat_slug='$twovaledat'";
    $valuequweryteo = $conn->query($querygetvaltwo);
    while($rowqueryvaletwo = $valuequweryteo->fetch_array()){
      $catname_singlrtwo = $rowqueryvaletwo['prd_cat_name'];

      $threevaledat = $onevaledat.'/'.$explodetwo.'/'.$explodethree;
      $querygetvalthree = "SELECT * FROM product_categories WHERE prd_cat_slug='$threevaledat'";
      $valuequwerythree = $conn->query($querygetvalthree);
      while($rowqueryvalethree = $valuequwerythree->fetch_array()){
        $catname_singlrthree = $rowqueryvalethree['prd_cat_name'];

  $arrrayvaledat = $explodeone.'/'.$explodetwo.'/'.$explodethree.'/'.$explodefour;
  $selctcatval = "SELECT * FROM product_categories WHERE prd_cat_slug='$arrrayvaledat'";
  $quueryvale = $conn->query($selctcatval);
  while($row_valedata = $quueryvale->fetch_array()){
  $get_cat_nametwo = $catname_singl.','.$catname_singlrtwo.','.$catname_singlrthree.','.$row_valedata['prd_cat_name'];

    //$product_filter_val;
    if($get_query == "0"){
      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_catger LIKE '$get_cat_nametwo%'";
    }elseif($product_filter_val == "1"){
      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_catger LIKE '$get_cat_nametwo%' ORDER BY id DESC";
    }elseif($product_filter_val == "2"){

      $get_lowprice = "SELECT MIN(product_regular_price) FROM all_product WHERE product_status='1' AND product_catger LIKE '$get_cat_nametwo%'";
      $queryval = mysqli_query($conn,$get_lowprice);
      $vallowqyeru = mysqli_fetch_array($queryval);
      $show_val = $vallowqyeru[0];

      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_regular_price>='$show_val' AND product_catger LIKE '$get_cat_nametwo%' ORDER BY `product_regular_price` ASC";

    }elseif($product_filter_val == "3"){
      
      $get_lowprice = "SELECT MAX(product_regular_price) FROM all_product WHERE product_status='1' AND product_catger LIKE '$get_cat_nametwo%'";
      $queryval = mysqli_query($conn,$get_lowprice);
      $vallowqyeru = mysqli_fetch_array($queryval);
      $show_val = $vallowqyeru[0];

      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_regular_price<='$show_val' AND product_catger LIKE '$get_cat_nametwo%' ORDER BY `product_regular_price` DESC";

    }elseif($product_filter_val == "4"){

      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_name LIKE '%$get_query%' OR product_sku LIKE '%$get_query%' AND  product_catger LIKE '$get_cat_nametwo%' ORDER BY id DESC";

    }else{
      $sql = "SELECT * FROM all_product WHERE product_status='1' AND product_catger LIKE '$get_cat_nametwo%'";
    }

        $qry = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($qry)){

      $pId = $row['id'];

      $pName = $row['product_name'];

      $regPrice = $row['product_regular_price'];

      $salePrice = $row['product_sale_price'];

      $produtautoid = $row['product_auto_id'];

      $vendorid = $row['product_vender_id'];

      $stock = $row['product_stock'];
      $attbutval = $row['product_size'];
      $attbutvalcolor = $row['product_color'];



      if(!empty($salePrice)){

        $finalPrice = $salePrice;

      }else{

        $finalPrice = $regPrice;

      }

      $productImg = $row['product_image'];

      //$productDes = substr($row['product_destion'], 0, 50);



      $singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";

      $queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);

      while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){

        $singl_image_val = $rowallimges_one['produt_img'];

      }



      $pieces = explode(" ", $pName);

      $first_part = implode(" ", array_splice($pieces, 0, 4));

      

      $get_vendro_naem = "SELECT * FROM vendor WHERE vendor_auto='$vendorid'";

      $querydata = mysqli_query($conn,$get_vendro_naem);

      while($rowsinglval = mysqli_fetch_array($querydata)){

        $firstnam = $rowsinglval['vendor_f_name'];

        $lasttnam = $rowsinglval['vendor_l_name'];

      }

      echo '<li>

                <div class="fas-item-wrap">';

                if($rowvale['product_approve_stmp'] == "1"){
                    echo "<div class='approve-stemp'>
                        <img src='$url/assets/images/stamp-of-approval-new.png' title='Approved by Gallery LaLa'>
                      </div>";
                }

                echo '<a href="'.$url.'/'.$row['product_page_name'].'">

                  <div class="item-img">

                    <img src="'.$url.'/assets/images/product-img/'.$productImg.'">

                    <img src="'.$url.'/assets/images/product-img/'.$singl_image_val.'">

                  </div>

                  </a>

                  <div class="item-txt">

                    <div class="item-title">'.$firstnam.' '.$lasttnam.'</div>

                    <div class="item-dis">'.$first_part.'</div>';

                    if($row['product_sale_price'] == ""){

                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($row['product_regular_price'], 2)."</div></div>";

                      }else{

                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".number_format($row['product_sale_price'], 2)."</div>";

                        echo "<div class='pric_dis'><span>$</span>".number_format($row['product_regular_price'], 2)."</div></div>";

                      }

                    if($stock == "0"){

                    echo '<div class="item-cart"><button class="alert alert-danger unavailable">Out of Stock</button></div>';

                    }else{

                      if($attbutval != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }elseif($attbutvalcolor != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }else{
                        echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
                      }

                    }

            echo'</div>

                

                </div>

              </li>';

    }
  }
}
}
}
}// Repert
}
/*  $get_relates = "SELECT * FROM all_product WHERE product_status='1' AND product_catger LIKE '$setprodval%'";

    $query_singl = mysqli_query($conn,$get_relates);

    while($rowvale = mysqli_fetch_array($query_singl)){



      $get_catedata = $rowvale['product_catger'];

      $get_product_id = $rowvale['product_auto_id'];

      $explode_catname = explode(',', $get_catedata);
}*/
  echo "</ul>";
}

}


function producttag($setprodval){

  global $conn;

  $setprodval = $setprodval;

$uper_id = $_SERVER['REQUEST_URI'];
$get_pagename = explode('/', $uper_id);
$singlidcat = $get_pagename[2];
$seturl_apge = preg_replace("/[^A-Za-z0-9]/","_", $singlidcat);

  //$;
  if($seturl_apge == "Home___Living"){
    $setprodval_new = "Home & Living";
  }elseif($seturl_apge == "Blanket___Throw"){
    $setprodval_new = "Home & Living";
  }else{
    $setprodval_new = $setprodval;
  }
//echo $setprodval_new;
/*echo $setprodval_new;*/

  echo "<ul class='producfilter-item'>";

  $get_relates = "SELECT * FROM all_product WHERE product_status='1'";

    $query_singl = mysqli_query($conn,$get_relates);

    while($rowvale = mysqli_fetch_array($query_singl)){

      $get_catedata = $rowvale['product_tags'];

      $get_product_id = $rowvale['product_auto_id'];

      $explode_catname = explode(',', $get_catedata);

/*print_r($explode_catname);*/
/*if(in_array($pageid, $explode_catname)){
  echo $pageid;
}else{
  echo $explode_catname[0];
}*/
      if($explode_catname[0] == $setprodval_new){

        $sql = "SELECT * FROM all_product WHERE product_auto_id='$get_product_id' AND product_status='1' ORDER BY id DESC";

        $qry = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($qry)){

      $pId = $row['id'];

      $pName = $row['product_name'];

      $regPrice = $row['product_regular_price'];

      $salePrice = $row['product_sale_price'];

      $produtautoid = $row['product_auto_id'];

      $vendorid = $row['product_vender_id'];

      $stock = $row['product_stock'];
      $attbutval = $row['product_size'];
      $attbutvalcolor = $row['product_color'];



      if(!empty($salePrice)){

        $finalPrice = $salePrice;

      }else{

        $finalPrice = $regPrice;

      }

      $productImg = $row['product_image'];

      //$productDes = substr($row['product_destion'], 0, 50);



      $singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";

      $queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);

      while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){

        $singl_image_val = $rowallimges_one['produt_img'];

      }



      $pieces = explode(" ", $pName);

      $first_part = implode(" ", array_splice($pieces, 0, 4));

      

      $get_vendro_naem = "SELECT * FROM vendor WHERE vendor_auto='$vendorid'";

      $querydata = mysqli_query($conn,$get_vendro_naem);

      while($rowsinglval = mysqli_fetch_array($querydata)){

        $firstnam = $rowsinglval['vendor_f_name'];

        $lasttnam = $rowsinglval['vendor_l_name'];

      }

      echo '<li>

                <div class="fas-item-wrap">';

                if($rowvale['product_approve_stmp'] == "1"){
                    echo "<div class='approve-stemp'>
                        <img src='$url/assets/images/stamp-of-approval-new.png' title='Approved by Gallery LaLa'>
                      </div>";
                }

                echo '<a href="'.$url.'/'.$row['product_page_name'].'">

                  <div class="item-img">

                    <img src="'.$url.'/assets/images/product-img/'.$productImg.'">

                    <img src="'.$url.'/assets/images/product-img/'.$singl_image_val.'">

                  </div>

                  </a>

                  <div class="item-txt">

                    <div class="item-title">'.$firstnam.' '.$lasttnam.'</div>

                    <div class="item-dis">'.$first_part.'</div>';

                    if($row['product_sale_price'] == ""){

                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".$row['product_regular_price']."</div></div>";

                      }else{

                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".$row['product_sale_price']."</div>";

                        echo "<div class='pric_dis'><span>$</span>".$row['product_regular_price']."</div></div>";

                      }

                    if($stock == "0"){

                    echo '<div class="item-cart"><button class="alert alert-danger unavailable">Out of Stock</button></div>';

                    }else{

                      if($attbutval != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }elseif($attbutvalcolor != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }else{
                        echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
                      }

                    }

            echo'</div>

                

                </div>

              </li>';

    }

      }elseif($explode_catname[1] == $setprodval_new){
        /*echo $pageid;
        echo $explode_catname[1];*/
        /*echo $explode_catname[1];*/
        $sql = "SELECT * FROM all_product WHERE product_auto_id='$get_product_id' AND product_status='1' ORDER BY id DESC";

        $qry = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($qry)){

      $pId = $row['id'];

      $pName = $row['product_name'];

      $regPrice = $row['product_regular_price'];

      $salePrice = $row['product_sale_price'];

      $produtautoid = $row['product_auto_id'];

      $vendorid = $row['product_vender_id'];

      $stock = $row['product_stock'];
      $attbutval = $row['product_size'];
      $attbutvalcolor = $row['product_color'];



      if(!empty($salePrice)){

        $finalPrice = $salePrice;

      }else{

        $finalPrice = $regPrice;

      }

      $productImg = $row['product_image'];

      //$productDes = substr($row['product_destion'], 0, 50);



      $singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion  DESC";

      $queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);

      while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){

        $singl_image_val = $rowallimges_one['produt_img'];

      }



      $pieces = explode(" ", $pName);

      $first_part = implode(" ", array_splice($pieces, 0, 4));

      

      $get_vendro_naem = "SELECT * FROM vendor WHERE vendor_auto='$vendorid'";

      $querydata = mysqli_query($conn,$get_vendro_naem);

      while($rowsinglval = mysqli_fetch_array($querydata)){

        $firstnam = $rowsinglval['vendor_f_name'];

        $lasttnam = $rowsinglval['vendor_l_name'];

      }

      echo '<li>

                <div class="fas-item-wrap">

                  <a href="'.$url.'/'.$row['product_page_name'].'">

                  <div class="item-img">

                    <img src="'.$url.'/assets/images/product-img/'.$productImg.'">

                    <img src="'.$url.'/assets/images/product-img/'.$singl_image_val.'">

                  </div>

                  </a>

                  <div class="item-txt">

                    <div class="item-title">'.$firstnam.' '.$lasttnam.'</div>

                    <div class="item-dis">'.$first_part.'</div>';

                    if($row['product_sale_price'] == ""){

                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".$row['product_regular_price']."</div></div>";

                      }else{

                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".$row['product_sale_price']."</div>";

                        echo "<div class='pric_dis'><span>$</span>".$row['product_regular_price']."</div></div>";

                      }

                    if($stock == "0"){

                    echo '<div class="item-cart"><button class="alert alert-danger unavailable">Out of Stock</button></div>';

                    }else{

                      if($attbutval != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }elseif($attbutvalcolor != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }else{
                        echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
                      }

                    }

            echo'</div>

                

                </div>

              </li>';

    }

      }elseif($explode_catname[2] == $setprodval_new){
        $sql = "SELECT * FROM all_product WHERE product_auto_id='$get_product_id' AND product_status='1' ORDER BY id DESC";

        $qry = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($qry)){

      $pId = $row['id'];

      $pName = $row['product_name'];

      $regPrice = $row['product_regular_price'];

      $salePrice = $row['product_sale_price'];

      $produtautoid = $row['product_auto_id'];

      $vendorid = $row['product_vender_id'];

      $stock = $row['product_stock'];
      $attbutval = $row['product_size'];
      $attbutvalcolor = $row['product_color'];


      if(!empty($salePrice)){

        $finalPrice = $salePrice;

      }else{

        $finalPrice = $regPrice;

      }

      $productImg = $row['product_image'];

      //$productDes = substr($row['product_destion'], 0, 50);



      $singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";

      $queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);

      while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){

        $singl_image_val = $rowallimges_one['produt_img'];

      }



      $pieces = explode(" ", $pName);

      $first_part = implode(" ", array_splice($pieces, 0, 4));

      

      $get_vendro_naem = "SELECT * FROM vendor WHERE vendor_auto='$vendorid'";

      $querydata = mysqli_query($conn,$get_vendro_naem);

      while($rowsinglval = mysqli_fetch_array($querydata)){

        $firstnam = $rowsinglval['vendor_f_name'];

        $lasttnam = $rowsinglval['vendor_l_name'];

      }

      echo '<li>

                <div class="fas-item-wrap">

                  <a href="'.$url.'/'.$row['product_page_name'].'">

                  <div class="item-img">

                    <img src="'.$url.'/assets/images/product-img/'.$productImg.'">

                    <img src="'.$url.'/assets/images/product-img/'.$singl_image_val.'">

                  </div>

                  </a>

                  <div class="item-txt">

                    <div class="item-title">'.$firstnam.' '.$lasttnam.'</div>

                    <div class="item-dis">'.$first_part.'</div>';

                    if($row['product_sale_price'] == ""){

                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".$row['product_regular_price']."</div></div>";

                      }else{

                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".$row['product_sale_price']."</div>";

                        echo "<div class='pric_dis'><span>$</span>".$row['product_regular_price']."</div></div>";

                      }

                    if($stock == "0"){

                    echo '<div class="item-cart"><button class="alert alert-danger unavailable">Out of Stock</button></div>';

                    }else{

                      if($attbutval != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }elseif($attbutvalcolor != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }else{
                        echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
                      }

                    }

            echo'</div>

                

                </div>

              </li>';

    }

      }elseif($explode_catname[3] == $setprodval_new){

        $sql = "SELECT * FROM all_product WHERE product_auto_id='$get_product_id' AND product_status='1' ORDER BY id DESC";

        $qry = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($qry)){

      $pId = $row['id'];

      $pName = $row['product_name'];

      $regPrice = $row['product_regular_price'];

      $salePrice = $row['product_sale_price'];

      $produtautoid = $row['product_auto_id'];

      $vendorid = $row['product_vender_id'];

      $stock = $row['product_stock'];
      $attbutval = $row['product_size'];
      $attbutvalcolor = $row['product_color'];



      if(!empty($salePrice)){

        $finalPrice = $salePrice;

      }else{

        $finalPrice = $regPrice;

      }

      $productImg = $row['product_image'];

      //$productDes = substr($row['product_destion'], 0, 50);



      $singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";

      $queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);

      while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){

        $singl_image_val = $rowallimges_one['produt_img'];

      }



      $pieces = explode(" ", $pName);

      $first_part = implode(" ", array_splice($pieces, 0, 4));

      

      $get_vendro_naem = "SELECT * FROM vendor WHERE vendor_auto='$vendorid'";

      $querydata = mysqli_query($conn,$get_vendro_naem);

      while($rowsinglval = mysqli_fetch_array($querydata)){

        $firstnam = $rowsinglval['vendor_f_name'];

        $lasttnam = $rowsinglval['vendor_l_name'];

      }

      echo '<li>

                <div class="fas-item-wrap">

                  <a href="'.$url.'/'.$row['product_page_name'].'">

                  <div class="item-img">

                    <img src="'.$url.'/assets/images/product-img/'.$productImg.'">

                    <img src="'.$url.'/assets/images/product-img/'.$singl_image_val.'">

                  </div>

                  </a>

                  <div class="item-txt">

                    <div class="item-title">'.$firstnam.' '.$lasttnam.'</div>

                    <div class="item-dis">'.$first_part.'</div>';

                    if($row['product_sale_price'] == ""){

                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".$row['product_regular_price']."</div></div>";

                      }else{

                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".$row['product_sale_price']."</div>";

                        echo "<div class='pric_dis'><span>$</span>".$row['product_regular_price']."</div></div>";

                      }

                    if($stock == "0"){

                    echo '<div class="item-cart"><button class="alert alert-danger unavailable">Out of Stock</button></div>';

                    }else{

                      if($attbutval != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }elseif($attbutvalcolor != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }else{
                        echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
                      }

                    }

            echo'</div>

                

                </div>

              </li>';

    }

      }elseif($explode_catname[4] == $setprodval_new){

        $sql = "SELECT * FROM all_product WHERE product_auto_id='$get_product_id' AND product_status='1' ORDER BY id DESC";

        $qry = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($qry)){

      $pId = $row['id'];

      $pName = $row['product_name'];

      $regPrice = $row['product_regular_price'];

      $salePrice = $row['product_sale_price'];

      $produtautoid = $row['product_auto_id'];

      $vendorid = $row['product_vender_id'];

      $stock = $row['product_stock'];

      $attbutval = $row['product_size'];
      $attbutvalcolor = $row['product_color'];


      if(!empty($salePrice)){

        $finalPrice = $salePrice;

      }else{

        $finalPrice = $regPrice;

      }

      $productImg = $row['product_image'];

      //$productDes = substr($row['product_destion'], 0, 50);



      $singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";

      $queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);

      while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){

        $singl_image_val = $rowallimges_one['produt_img'];

      }



      $pieces = explode(" ", $pName);

      $first_part = implode(" ", array_splice($pieces, 0, 4));

      

      $get_vendro_naem = "SELECT * FROM vendor WHERE vendor_auto='$vendorid'";

      $querydata = mysqli_query($conn,$get_vendro_naem);

      while($rowsinglval = mysqli_fetch_array($querydata)){

        $firstnam = $rowsinglval['vendor_f_name'];

        $lasttnam = $rowsinglval['vendor_l_name'];

      }

      echo '<li>

                <div class="fas-item-wrap">

                  <a href="'.$url.'/'.$row['product_page_name'].'">

                  <div class="item-img">

                    <img src="'.$url.'/assets/images/product-img/'.$productImg.'">

                    <img src="'.$url.'/assets/images/product-img/'.$singl_image_val.'">

                  </div>

                  </a>

                  <div class="item-txt">

                    <div class="item-title">'.$firstnam.' '.$lasttnam.'</div>

                    <div class="item-dis">'.$first_part.'</div>';

                    if($row['product_sale_price'] == ""){

                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".$row['product_regular_price']."</div></div>";

                      }else{

                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".$row['product_sale_price']."</div>";

                        echo "<div class='pric_dis'><span>$</span>".$row['product_regular_price']."</div></div>";

                      }

                    if($stock == "0"){

                    echo '<div class="item-cart"><button class="alert alert-danger unavailable">Out of Stock</button></div>';

                    }else{

                      if($attbutval != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }elseif($attbutvalcolor != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }else{
                        echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
                      }

                    }

            echo'</div>

                

                </div>

              </li>';

    }

      }elseif($explode_catname[5] == $setprodval_new){

        $sql = "SELECT * FROM all_product WHERE product_auto_id='$get_product_id' AND product_status='1' ORDER BY id DESC";

        $qry = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($qry)){

      $pId = $row['id'];

      $pName = $row['product_name'];

      $regPrice = $row['product_regular_price'];

      $salePrice = $row['product_sale_price'];

      $produtautoid = $row['product_auto_id'];

      $vendorid = $row['product_vender_id'];

      $stock = $row['product_stock'];
      $attbutval = $row['product_size'];
      $attbutvalcolor = $row['product_color'];


      if(!empty($salePrice)){

        $finalPrice = $salePrice;

      }else{

        $finalPrice = $regPrice;

      }

      $productImg = $row['product_image'];

      //$productDes = substr($row['product_destion'], 0, 50);



      $singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";

      $queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);

      while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){

        $singl_image_val = $rowallimges_one['produt_img'];

      }



      $pieces = explode(" ", $pName);

      $first_part = implode(" ", array_splice($pieces, 0, 4));

      

      $get_vendro_naem = "SELECT * FROM vendor WHERE vendor_auto='$vendorid'";

      $querydata = mysqli_query($conn,$get_vendro_naem);

      while($rowsinglval = mysqli_fetch_array($querydata)){

        $firstnam = $rowsinglval['vendor_f_name'];

        $lasttnam = $rowsinglval['vendor_l_name'];

      }

      echo '<li>

                <div class="fas-item-wrap">

                  <a href="'.$url.'/'.$row['product_page_name'].'">

                  <div class="item-img">

                    <img src="'.$url.'/assets/images/product-img/'.$productImg.'">

                    <img src="'.$url.'/assets/images/product-img/'.$singl_image_val.'">

                  </div>

                  </a>

                  <div class="item-txt">

                    <div class="item-title">'.$firstnam.' '.$lasttnam.'</div>

                    <div class="item-dis">'.$first_part.'</div>';

                    if($row['product_sale_price'] == ""){

                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".$row['product_regular_price']."</div></div>";

                      }else{

                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".$row['product_sale_price']."</div>";

                        echo "<div class='pric_dis'><span>$</span>".$row['product_regular_price']."</div></div>";

                      }

                    if($stock == "0"){

                    echo '<div class="item-cart"><button class="alert alert-danger unavailable">Out of Stock</button></div>';

                    }else{

                      if($attbutval != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }elseif($attbutvalcolor != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }else{
                        echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
                      }
                    }

            echo'</div>

                

                </div>

              </li>';

    }

      }elseif($explode_catname[6] == $setprodval_new){

        $sql = "SELECT * FROM all_product WHERE product_auto_id='$get_product_id' AND product_status='1' ORDER BY id DESC";

        $qry = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($qry)){

      $pId = $row['id'];

      $pName = $row['product_name'];

      $regPrice = $row['product_regular_price'];

      $salePrice = $row['product_sale_price'];

      $produtautoid = $row['product_auto_id'];

      $vendorid = $row['product_vender_id'];

      $stock = $row['product_stock'];
      $attbutval = $row['product_size'];
      $attbutvalcolor = $row['product_color'];



      if(!empty($salePrice)){

        $finalPrice = $salePrice;

      }else{

        $finalPrice = $regPrice;

      }

      $productImg = $row['product_image'];

      //$productDes = substr($row['product_destion'], 0, 50);



      $singlallimg_one = "SELECT * FROM product_mutli_image WHERE produt_id='$produtautoid' ORDER BY img_postion DESC";

      $queryallimageprdo_one = mysqli_query($conn,$singlallimg_one);

      while($rowallimges_one = mysqli_fetch_array($queryallimageprdo_one)){

        $singl_image_val = $rowallimges_one['produt_img'];

      }



      $pieces = explode(" ", $pName);

      $first_part = implode(" ", array_splice($pieces, 0, 4));

      

      $get_vendro_naem = "SELECT * FROM vendor WHERE vendor_auto='$vendorid'";

      $querydata = mysqli_query($conn,$get_vendro_naem);

      while($rowsinglval = mysqli_fetch_array($querydata)){

        $firstnam = $rowsinglval['vendor_f_name'];

        $lasttnam = $rowsinglval['vendor_l_name'];

      }

      echo '<li>

                <div class="fas-item-wrap">

                  <a href="'.$url.'/'.$row['product_page_name'].'">

                  <div class="item-img">

                    <img src="'.$url.'/assets/images/product-img/'.$productImg.'">

                    <img src="'.$url.'/assets/images/product-img/'.$singl_image_val.'">

                  </div>

                  </a>

                  <div class="item-txt">

                    <div class="item-title">'.$firstnam.' '.$lasttnam.'</div>

                    <div class="item-dis">'.$first_part.'</div>';

                    if($row['product_sale_price'] == ""){

                         echo "<div class='item-price'><div class='pric_reg'><span>$</span>".$row['product_regular_price']."</div></div>";

                      }else{

                        echo "<div class='item-price'><div class='pric_reg'><span>$</span>".$row['product_sale_price']."</div>";

                        echo "<div class='pric_dis'><span>$</span>".$row['product_regular_price']."</div></div>";

                      }

                    if($stock == "0"){

                    echo '<div class="item-cart"><button class="alert alert-danger unavailable">Out of Stock</button></div>';

                    }else{

                      if($attbutval != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }elseif($attbutvalcolor != ''){
                        echo "<div class='item-cart'><button class='selectopt'><a href=$url/".$row['product_page_name'].">Select Option</a></button></div>";
                      }else{
                        echo "<div class='item-cart'><button pid=$pId class='add-cart addToCart'>Add to Cart</button></div>";
                      }

                    }

            echo'</div>

                

                </div>

              </li>';

    }

      }

}
  echo "</ul>";

}

?>