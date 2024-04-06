<?php
$session_valuedata = $_SESSION['vendorsessionlogin'];
/*$get_data_val = "SELECT * FROM userpermission WHERE user_p_id='$session_valuedata'";
$query_daa = $conn->query($get_data_val);
while($rowvaldata = $query_daa->fetch_array()){
    $banner_hide = $rowvaldata['user_banner'];
    $profiel_hide = $rowvaldata['user_profilepic'];
    $about_hide = $rowvaldata['user_aboutval'];
    $shpping_hide = $rowvaldata['user_shhpinval'];
    $addressval = $rowvaldata['user_addresedt'];
}*/
?>
<aside class="left-sidebar" data-sidebarbg="skin5">

            <!-- Sidebar scroll-->

            <div class="scroll-sidebar">

                <div class="prfbox">
                    <!--<div class="useimg">-->
                    <!--    <a href="<?php echo $url; ?>dashboard/">-->
                    <!--        <img src="https://buyjee.com/assets/images/logo.png">-->
                    <!--    </a>-->
                    <!--</div>-->
                    <div class="urr_btn">
                        <a href="https://buyjee.com/<?php echo getvendrurl(); ?>" target="_blank" class="storebtn">Go to Your Store</a>
                        <a href="https://buyjee.com/" class="ursshop">SHOP</a>
                    </div>             
                </div>

                <!-- Sidebar navigation-->                
                <nav class="sidebar-nav">

                    <ul id="sidebarnav" class="m-t-30">

                        <li class="sidebar-item"> 

                            <a class="sidebar-link" href="<?php echo $url; ?>dashboard/">

                                <i class="mdi mdi-view-dashboard"></i>

                                <span class="hide-menu">Dashboard </span>

                            </a>

                        </li>

                        <!--<li class="sidebar-item"> 

                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">

                                <i class="fa fa-user-secret"></i>

                                <span class="hide-menu">Vendor </span>

                            </a>

                            <ul aria-expanded="false" class="collapse  first-level">
                                <?php
                                    if($about_hide == "no"){}elseif($about_hide == "yes"){
                                ?>
                                <li class="sidebar-item">

                                    <a href="<?php echo $url; ?>about-vendor" class="sidebar-link">

                                        <i class="fa fa-plus"></i>

                                        <span class="hide-menu"> About Vendor </span>

                                    </a>

                                </li>
                                <?php } ?>
                                <?php 
                                if($shpping_hide == "no"){}elseif($shpping_hide == "yes"){
                                ?>
                                <li class="sidebar-item">

                                    <a href="<?php echo $url; ?>terms-conditions" class="sidebar-link">

                                        <i class="fa fa-plus"></i>

                                        <span class="hide-menu">Return & Shipping Policy </span>

                                    </a>

                                </li>
                            <?php } ?>

                            </ul>

                        </li>-->

                        <li class="sidebar-item">

                            <a href="<?php echo $url; ?>add-bank/" class="sidebar-link">

                                <i class="fa fa-university"></i>

                                <span class="hide-menu"> Add Bank Details </span>

                            </a>

                        </li>

                        <li class="sidebar-item"> 

                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">

                                <i class="fa fa-camera"></i>

                                <span class="hide-menu">Media </span>

                            </a>

                            <ul aria-expanded="false" class="collapse  first-level">

                                <li class="sidebar-item">

                                    <a href="<?php echo $url; ?>banners" class="sidebar-link">

                                        <i class="fa fa-camera-retro"></i>

                                        <span class="hide-menu"> All banners </span>

                                    </a>

                                </li>

                            </ul>

                        </li>

                        <li class="sidebar-item">

                            <a href="<?php echo $url; ?>approved-products" class="sidebar-link">

                                <i class="fa fa-product-hunt"></i>

                                <span class="hide-menu"> Products </span>

                            </a>

                        </li>

                        <li class="sidebar-item"> 

                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">

                                <i class="fa fa-archive"></i>

                                <span class="hide-menu">Orders </span>

                            </a>

                            <ul aria-expanded="false" class="collapse  first-level">

                                <li class="sidebar-item">

                                    <a href="<?php echo $url; ?>completed-order" class="sidebar-link">

                                        <i class="mdi mdi-view-dashboard"></i>

                                        <span class="hide-menu"> Completed Orders </span>

                                    </a>

                                </li>
                                <li class="sidebar-item">

                                    <a href="<?php echo $url; ?>pending-orders" class="sidebar-link">

                                        <i class="mdi mdi-view-dashboard"></i>

                                        <span class="hide-menu"> Pending Orders </span>

                                    </a>

                                </li>

                                <!-- <li class="sidebar-item">

                                    <a href="<?php //echo $url; ?>sale_report" class="sidebar-link">

                                        <i class="mdi mdi-view-dashboard"></i>

                                        <span class="hide-menu"> Sales Report </span>

                                    </a>

                                </li> -->

                            </ul>

                        </li>
                        <!-- <li class="sidebar-item"> 

                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">

                                <i class="fa fa-commenting"></i>

                                <span class="hide-menu">Chat </span>

                            </a>

                            <ul aria-expanded="false" class="collapse  first-level">

                                <li class="sidebar-item">

                                    <a href="<?php //echo $url; ?>chat" class="sidebar-link">

                                        <i class="mdi mdi-view-dashboard"></i>

                                        <span class="hide-menu"> Chat to user </span>

                                    </a>

                                </li>

                            </ul>

                        </li> -->
                        <li class="sidebar-item">

                            <a href="<?php echo $url; ?>logout/" class="sidebar-link">

                                <i class="fa fa-power-off"></i>

                                <span class="hide-menu"> Logout </span>

                            </a>

                        </li>

                    </ul>

                </nav>

                <!-- End Sidebar navigation -->

               <!--  <div class="gllwlogo">
                <img src="https://www.gallerylala.com/customer/images/logo-white.png">
            </div> -->

            </div>

            <!-- End Sidebar scroll-->

        </aside>