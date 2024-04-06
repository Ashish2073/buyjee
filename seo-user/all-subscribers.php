<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

?>
<?php
if(isset($_GET['delete']) && isset($_GET['id'])){
    $deletablevale = "id='".$_GET['id']."'";
    $delete_vale = DeleteALlDataVlae('newslatter',$deletablevale);
    if($delete_vale == true){
      echo "<script>alert('Successfully Deleted.');window.location.href='$url/admin-manager/all-subscribers/';</script>";
  }else{
    echo "<script>alert('Please Try Again.');</script>"; 
    }
}
?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>All Subscribers</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/index/">Home</a></li>

              <li class="breadcrumb-item active">All Subscribers</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">
        <!-- right Box -->
        <div class="col-md-12">

          <div class="card card-primary">

            <div class="card-header">

              <h3 class="card-title">All Subscribers</h3>



              <div class="card-tools">

                <input type="button" id="btnExport" class="float-right btn btn-success" value="Export to CSV">

              </div>

            </div>

            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped table tableexportcsv">
                <thead>
                  <tr>
                    <th>Email</th>
                    <th>Ip</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contdatvale = SubscrribeDataVale();
                  foreach($contdatvale as $contdatavel){
                    echo '<tr><td>'.$contdatavel['newsl_email'].'</td>
                        <td>'.$contdatavel['newsl_ip'].'</td>
                        <td>'.$contdatavel['newsl_date'].'</td>
                        <td>'.$contdatavel['newsl_time'].'</td>
                        <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="'.$url.'/admin-manager/all-subscribers/?delete=action&id='.$contdatavel['id'].'" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                      </td></tr>';
                  }
                  ?>
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



  <!-- Control Sidebar -->

  <aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

  </aside>

  <!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->

 <?php

include_once('admin_dist/includes/footer.php');

?>