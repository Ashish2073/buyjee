<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

?>
<style type="text/css">
  img.img-responsive {
    width: 100% !important;
}
p.form-group.p-tag {
    width: 100%;
}
</style>

<?php
if(isset($_GET['action']) && isset($_GET['delete']) && isset($_GET['id'])){
    $getvale = $_GET['action'];
    $deletablevale = "id='".$_GET['id']."' AND tvnews_type='".$_GET['action']."'";
    $delete_vale = DeleteALlDataVlae('gllnewstv_section',$deletablevale);
    if($delete_vale == true){
      echo "<script>alert('Successfully Deleted.');window.location.href='$url/admin-manager/tv/?action=$getvale';</script>";
	}else{
		echo "<script>alert('Please Try Again.');</script>"; 
  }
}
if($_GET['action'] == "tv"){
  $pagetyr = "TV";
  $tvname = "Video Thumbnail";
}elseif($_GET['action'] == "news"){
  $pagetyr = "News";
  $tvname = "Thumbnail Image";
}
?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>GLL <?php echo $pagetyr; ?></h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/index/">Home</a></li>

              <li class="breadcrumb-item active">GLL <?php echo $pagetyr; ?></li>

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

              <h3 class="card-title">All GLL <?php echo $pagetyr; ?></h3>

            </div>

            <div class="card-body">

              <table class="table">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th><?php echo $tvname; ?></th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="set-protal">
                  <?php
                    $sliderdata = GetTvOnlyNewsSection("0",$_GET['action']);
                    foreach($sliderdata as $slidrvalue){
                      if($slidrvalue['tvnews_status'] == "0"){
                        $statusale = "Inactive";
                      }elseif($slidrvalue['tvnews_status'] == "1"){
                        $statusale = "Active";
                      }
                  ?>
                    <tr id="<?php echo $slidrvalue['id']; ?>">
                      <td><?php echo $slidrvalue['tvnews_title']; ?></td>
                      <td class="img-set"><img src='<?php echo $url; ?>/images/<?php echo $slidrvalue['tvnews_thunal']; ?>'></td>
                      <td><?php echo $statusale; ?></td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="<?php echo $url; ?>/admin-manager/gll-tv/?action=<?php echo $_GET['action']; ?>&edit=<?php echo $slidrvalue['id']; ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                          <a href="<?php echo $url; ?>/admin-manager/tv/?action=<?php echo $_GET['action']; ?>&delete=action&id=<?php echo $slidrvalue['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
$( ".set-protal" ).sortable({  
    delay: 150,  
    stop: function() {  
        var selectedData = new Array();  
        $('.set-protal>tr').each(function() {  
            selectedData.push($(this).attr("id"));  
        });  
        updateOrder(selectedData);
    }
});  
  
function updateOrder(data) {
    $.ajax({  
        url:"<?php echo $url; ?>/admin-manager/ajax-data-file/",  
        type:'post',
        data:{tvsetval:data},
        success:function(){
            alert('your change successfully saved');  
            window.location.href = "";
        }  
    }); 
}
</script>