  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $url; ?>/admin-manager/index/" class="brand-link">
      <img src="<?php echo $url; ?>/assets/images/logo.png" alt="Admin Dashboard Logo" class="brand-image elevation-3" >
      <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo $url; ?>/admin-manager/index/" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Customers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/all-customer" class="nav-link">
                  <i class="nav-icon fa fa-eye"></i>
                  <p>
                     All Customers 
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/order/?action=all" class="nav-link">
                  <i class="nav-icon fa fa-table"></i>
                  <p>
                      Completed Orders 
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/pending-order/" class="nav-link">
                  <i class="nav-icon fa fa-table"></i>
                  <p>
                      Pending Orders 
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/order/?action=all" class="nav-link">
                  <i class="nav-icon fa fa-table"></i>
                  <p>
                     Cancellation Requests
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user-secret"></i>
              <p>
                Vendors
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/vendors" class="nav-link">
                  <i class="nav-icon fa fa-eye"></i>
                  <p>
                    Vendors
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/vendors-page?action=request" class="nav-link">
                  <i class="nav-icon fa fa-low-vision"></i>
                  <p>
                    Vendors Request
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/vendors-sale-report/" class="nav-link">
                  <i class="nav-icon fa fa-table"></i>
                  <p>
                     Vendors Sales Report 
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/vendor-products/" class="nav-link">
                  <i class="nav-icon fa fa-product-hunt"></i>
                  <p>
                     Vendors Products
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-file-text"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/all-product" class="nav-link">
                  <i class="nav-icon fa fa-clipboard"></i>
                  <p>
                    All Products
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/product" class="nav-link">
                  <i class="nav-icon fa fa-file-o"></i>
                  <p>
                    Add New Product
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/product_attitude" class="nav-link">
                  <i class="nav-icon fa fa-filter"></i>
                  <p>
                    Attributes
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/category" class="nav-link">
                  <i class="nav-icon fa fa-clipboard"></i>
                  <p>
                    Product Categories
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-gift"></i>
              <p>
                Coupons
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/cupons/" class="nav-link">
                  <i class="nav-icon fa fa-eye"></i>
                  <p>
                    All Coupons
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/addnew-cupons/" class="nav-link">
                  <i class="nav-icon fa fa-plus"></i>
                  <p>
                    Add New Coupon
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <!--<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-television"></i>
              <p>
                GLL TV
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/tv/?action=tv" class="nav-link">
                  <i class="nav-icon fa fa-slideshare"></i>
                  <p>
                    All Videos
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/gll-tv/?action=tv" class="nav-link">
                  <i class="nav-icon fa fa-slideshare"></i>
                  <p>
                    Add New Video
                  </p>
                </a>
              </li>
            </ul>
          </li>-->
          <!--<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-newspaper-o"></i>
              <p>
                GLL News
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/all-gll-tv/?action=news" class="nav-link">
                  <i class="nav-icon fa fa-file-text-o"></i>
                  <p>
                    All News
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/gll-tv/?action=news" class="nav-link">
                  <i class="nav-icon fa fa-file-text-o"></i>
                  <p>
                    Add New News
                  </p>
                </a>
              </li>
            </ul>
          </li>-->
          <!--<li class="nav-item">
            <a href="<?php echo $url; ?>/admin-manager/seo-login" class="nav-link">
              <i class="nav-icon fas fa fa-sign-in"></i>
              <p>
                Seo Login
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $url; ?>/admin-manager/emailsetting/" class="nav-link">
              <i class="nav-icon fas fa fa-envelope-o"></i>
              <p>
                Email Setting
              </p>
            </a>
          </li>-->
          <li class="nav-item">
            <a href="<?php echo $url; ?>/admin-manager/menu/?menu-name=header" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Menus
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $url; ?>/admin-manager/header/" class="nav-link">
              <i class="nav-icon fa fa-header"></i>
              <p>
                Header
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $url; ?>/admin-manager/footer/" class="nav-link">
              <i class="nav-icon fa fa-foursquare"></i>
              <p>
                Footer
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-sliders"></i>
              <p>
                Sliders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/all-slider" class="nav-link">
                  <i class="nav-icon fa fa-slideshare"></i>
                  <p>
                    All Sliders
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/slider" class="nav-link">
                  <i class="nav-icon fa fa-slideshare"></i>
                  <p>
                    Add New Slide
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-audio-description"></i>
              <p>
                Promo Offers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/all-ads" class="nav-link">
                  <i class="nav-icon fa fa-adn"></i>
                  <p>
                    All Promo Offers
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/ads/" class="nav-link">
                  <i class="nav-icon fa fa-adn"></i>
                  <p>
                    Add New Promo Offers
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-file-text"></i>
              <p>
                Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/all-pages" class="nav-link">
                  <i class="nav-icon fa fa-clipboard"></i>
                  <p>
                    All Pages
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/admin-manager/add-new-page" class="nav-link">
                  <i class="nav-icon fa fa-file-o"></i>
                  <p>
                    Add New Page
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo $url; ?>/admin-manager/all-subscribers" class="nav-link">
              <i class="nav-icon fa fa-envelope-o"></i>
              <p>
                Subscribers
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
