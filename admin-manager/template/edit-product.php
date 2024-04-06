<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

?>
<?php
if(isset($_GET['pageid']) && isset($_GET['autoid'])){
}else{
  $paenameval = AddNewPageOneTime();
  echo "<script>window.location.href='$paenameval';</script>";
}
?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Add New Product</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/">Home</a></li>

              <li class="breadcrumb-item active">Add New Product</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">

        <div class="col-md-12">

          <div class="card card-outline card-info">

            <div class="card-header">

              <h3 class="card-title">

                New Product

              </h3>

            </div>

            <!-- /.card-header -->
          <form role="form" method="post" enctype="multipart/form-data" action="">
            <div class="card-body pad">

                <div class="row">

                  <div class="col-md-8">
                    <div class="row">

                      <div class="col-md-12">
                        <div class="form-group">
                            <label>Select Vendor Name</label>
                            <select name="venderdata" class="form-control" required>
                              <option value="">Select one</option>
                              <?php
                                foreach(GetVenderDatavale() as $vendername){
                                  foreach(GetPermissionvalData($vendername['vendor_auto']) as $vendorpermision){
                                    if($vendorpermision['user_p_block'] == "0"){
                              ?>
                                <option value="<?php echo $vendername['vendor_auto']; ?>"><?php echo $vendername['vendor_f_name']; ?></option>
                              <?php
                                }}}
                              ?>
                            </select>
                        </div>
                      </div>

                    <div class="col-md-12">

                        <div class="form-group">

                            <label>Product Name</label>

                            <input type="text" class="form-control chaking-pagename" name="prodttitle" placeholder="Product Name" id="chckprodt" required>
                            <div id="result"></div>
                        </div>

                    </div>
                    <div class="col-md-12">
                      <label>Permalink</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control">
                        <div class="input-group-prepend">
                          <button type="button" class="btn btn-success">Edit</button>
                        </div>
                        <!-- /btn-group -->
                      </div>
                      <!-- /input-group -->
                    </div>

                    <div class="col-md-12">

                        <div class="mb-3">

                            <label>Product Description</label>

                            <textarea class="textarea" name="page-text-content" placeholder="Place some text here..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="mb-3">

                            <label>Short Description</label>

                            <input type="text" class="form-control chaking-pagename" name="pagename" placeholder="Short Description" required>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="row">
                          <div class="col-12">
                            <!-- Custom Tabs -->
                            <div class="card">
                              <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3">Stock Management</h3>
                                <ul class="nav nav-pills ml-auto p-2">
                                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Inventory</a></li>
                                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">General</a></li>
                                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Variations</a></li>
                                </ul>
                              </div><!-- /.card-header -->
                              <div class="card-body">
                                <div class="tab-content">
                                  <div class="tab-pane active" id="tab_1">
                                    <div class="col-md-12">
                                      <div class="mb-3">
                                          <label>SKU</label>
                                          <input type="text" class="form-control chaking-pagename" name="pagename" placeholder="SKU" required>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Domestic $</span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="Domestic $">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">International $</span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="International $">
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.tab-pane -->
                                  <div class="tab-pane" id="tab_2">
                                    <div class="col-md-12">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Regular price ($)</i></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="Price">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Sale price ($)</i></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="Price">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Stock Quantity</i></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="Stock Quantity">
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.tab-pane -->
                                  <div class="tab-pane" id="tab_3">
                                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                      <li class="nav-item">
                                        <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Attributes</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Variations</a>
                                      </li>
                                    </ul>
                                    <div class="tab-content" id="custom-content-below-tabContent">
                                      <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                                        <div class="row">
                                          <div class="col-md-10">
                                            <div class="form-group">
                                              <div class="form-group"></div>
                                              <select class="custom-select">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-md-2">
                                            <div class="form-group">
                                              <div class="form-group"></div>
                                              <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                          </div>
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label>Value(s):</label>
                                              <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                                <option>Alabama</option>
                                                <option>Alaska</option>
                                                <option>California</option>
                                                <option>Delaware</option>
                                                <option>Tennessee</option>
                                                <option>Texas</option>
                                                <option>Washington</option>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                              
                                            </div>
                                          </div>
                                          <div class="col-md-12">
                                            <button type="button" class="btn btn-primary">Save Attribute</button>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                                         Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam. 
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                              </div><!-- /.card-body -->
                            </div>
                            <!-- ./card -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->

                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Discount Type</label>
                            <select class="form-control">
                              <option>option 1</option>
                              <option>option 2</option>
                              <option>option 3</option>
                              <option>option 4</option>
                              <option>option 5</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Discount Value</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-md-4">
                <!-- /.col (left) -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Status</h3>
                  </div>
                  <div class="card-body">
                    <!-- Date range -->
                    <div class="form-group">
                      <input type="submit" value="Add" name="add-new-page" class="btn btn-primary float-left">
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card repert this -->

                <!-- /.col (left) -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Product Categories</h3>
                  </div>
                  <div class="card-body">
                    <!-- Date range -->
                    <div class="form-group">
                      <input type="submit" value="Add" name="add-new-page" class="btn btn-primary float-left">
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card repert this -->

                <!-- /.col (left) -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Product Image (Max Upload Size 2MB)</h3>
                  </div>
                  <div class="col-md-12">
                    <label>Image</label>
                    <input type="file" class="form-control form-group" name="page-new-image">
                    <input type="hidden" value="0" name="page-new-image-chking">
                  </div>
                </div>
                <!-- /.card repert this -->

                <!-- /.col (left) -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Product Gallery (Max Upload Size 2MB)</h3>
                  </div>
                  <div class="col-md-12">
                    <label>Image</label>
                    <input type="file" class="form-control form-group" name="page-new-image">
                    <input type="hidden" value="0" name="page-new-image-chking">
                  </div>
                </div>
                <!-- /.card repert this -->
              </div>
            </div>
            </div>

          </form>

          </div>

        </div>

        <!-- /.col-->

      </div>

      <!-- ./row -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

</div>

<!-- ./wrapper -->

 <?php

include_once('admin_dist/includes/footer.php');

?>