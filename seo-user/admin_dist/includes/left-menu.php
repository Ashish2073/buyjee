  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $url; ?>/seo-user/index/" class="brand-link">
      <img src="<?php echo $url; ?>/assets/images/logo.png" alt="<?php echo $fnname; ?> <?php echo $lnname; ?>" class="brand-image elevation-3" >
      <span class="brand-text font-weight-light"><?php echo $fnname; ?> <?php echo $lnname; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo $url; ?>/seo-user/index/" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
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
                <a href="<?php echo $url; ?>/seo-user/vendors" class="nav-link">
                  <i class="nav-icon fa fa-eye"></i>
                  <p>
                    Vendors
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
                <a href="<?php echo $url; ?>/seo-user/all-product" class="nav-link">
                  <i class="nav-icon fa fa-clipboard"></i>
                  <p>
                    All Products
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/seo-user/product" class="nav-link">
                  <i class="nav-icon fa fa-file-o"></i>
                  <p>
                    Add New Product
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/seo-user/product_attitude" class="nav-link">
                  <i class="nav-icon fa fa-filter"></i>
                  <p>
                    Attributes
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $url; ?>/seo-user/category" class="nav-link">
                  <i class="nav-icon fa fa-clipboard"></i>
                  <p>
                    Product Categories
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-newspaper-o"></i>
              <p>
                GLL News
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $url; ?>/seo-user/all-gll-tv/?action=news" class="nav-link">
                  <i class="nav-icon fa fa-file-text-o"></i>
                  <p>
                    All News
                  </p>
                </a>
              </li>
            </ul>
          </li> -->
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
                <a href="<?php echo $url; ?>/seo-user/all-pages" class="nav-link">
                  <i class="nav-icon fa fa-clipboard"></i>
                  <p>
                    All Pages
                  </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
