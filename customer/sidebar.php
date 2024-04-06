<div class="user_left"> 
    <div id="pmd-main">
        <!-- Left sidebar -->

        <aside id="basicSidebar" class="pmd-sidebar pmd-z-depth" role="navigation">
            <div class="prfbox">
            <!--<div class="useimg"><a href="<?php echo $url; ?>/customer/dashboard/"><img src="https://buyjee.com/customer/images/logo-white.png"></a></div>-->
            <!-- <div class="usr_nam form-group"><a href="<?php //echo $url; ?>/customer/dashboard/"><?php //echo customrname(); ?></a></div> -->
            <div class="urr_btn">
                <a href="<?php echo $url; ?>/" class="storebtn" >SHOP</a>
                <!-- <a href="<?php //echo $cus_url; ?>/logout/" class="urslogout">Logout</a> -->
            </div>             
            </div>

            <ul class="nav flex-column pmd-sidebar-nav">
                <li class="nav-item pmd-user-info">
                    <a class="nav-link" href="<?php echo $url; ?>/customer/dashboard/">
                        <i class="fa fa-tachometer"></i>
                        <span>Dashboard</span>
                    </a>
                    <!-- <ul class="collapse" id="collapseExample" data-parent="#basicSidebar">
                        <li class="nav-item">
                            <a class="nav-link" href="logout">
                                <i class="fa fa-sign-out"></i>
                                <span class="media-body">Logout</span>
                            </a>
                        </li>
                    </ul> -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $cus_url; ?>/order-lists/">
                        <i class="fa fa-shopping-basket" ></i>
                        <span>My Orders</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php //echo $cus_url; ?>/chat">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <span class="media-body">Chat</span>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="<?php echo $cus_url; ?>/logout/">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>

            <!-- <div class="gllwlogo">
                <img src="https://www.gallerylala.com/customer/images/logo-white.png">
            </div> -->
        </aside>
    </div>
</div>