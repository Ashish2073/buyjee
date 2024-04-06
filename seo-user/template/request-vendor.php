<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Vendor Request</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/">Home</a></li>

              <li class="breadcrumb-item active">Vendor Request</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">
        <!-- left box -->
        <!-- right Box -->
        <div class="col-md-12">

          <div class="card card-primary">

            <div class="card-header">

              <h3 class="card-title">Vendor Request</h3>

            </div>

            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Email Id</th>
                    <th>Phone</th>
                    <th>Date / Time</th>
                    <th>View Details</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach(GetVenderDatavale() as $valuecvnsor){
                    foreach(GetPermissionvalData($valuecvnsor['vendor_auto']) as $vendorpermisn){
                      if($vendorpermisn['user_p_email_ap'] == "1"){}else{
                  ?>
                  <tr class='blockvendor'>
                    <td style="width: 20%;"><img src="<?php echo $url; ?>/customer/images/default-user-icon.jpg" style="width: 30%;"></td>
                    <td><?php echo $valuecvnsor['vendor_f_name']; ?> <?php echo $valuecvnsor['vendor_l_name']; ?></td>
                    <td><?php echo $valuecvnsor['vendor_company']; ?></td>
                    <td><?php echo $valuecvnsor['vendor_email']; ?></td>
                    <td><?php echo $valuecvnsor['vendor_phone']; ?></td>
                    <td><?php echo $valuecvnsor['vendor_date']; ?></br><?php echo $valuecvnsor['vendor_time']; ?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="<?php echo $url; ?>/admin-manager/vendors-page?action=edit&id=<?php echo $valuecvnsor['vendor_auto']; ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php }}} ?>
                </tbody>
              </table>

            </div>

            <!-- /.card-body -->

          </div>

          <!-- /.card -->

        </div>
        <!-- right Box -->

      </div>

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

</div>

<!-- ./wrapper -->