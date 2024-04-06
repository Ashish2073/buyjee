<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <!-- <a href="<?php //echo $url; ?>/customer/dashboard/" class="brand-link">
    <span class="brand-text font-weight-light">Dashboard</span>
  </a> -->
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?php echo $url; ?>/customer/dashboard/" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo $url; ?>/" class="nav-link">
            <i class="nav-icon fas fa fa-cart-plus"></i>
            <p>
              Shop
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo $cus_url; ?>/order-lists/" class="nav-link">
            <i class="nav-icon fa fa-history"></i>
            <p>
              Orders
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo $cus_url; ?>/logout/" class="nav-link">
            <i class="nav-icon fa fa-sign-out"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>