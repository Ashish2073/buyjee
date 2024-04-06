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
/*if(isset($_GET['delete']) && isset($_GET['id'])){
    $deletablevale = "id='".$_GET['id']."'";
    $delete_vale = DeleteALlDataVlae('slideres_table_content',$deletablevale);
    if($delete_vale == true){
      echo "<script>alert('Successfully Delete.');window.location.href='$url/admin-manager/slider/';</script>";
	}else{
		echo "<script>alert('Please Try Again.');</script>"; 
    }
}*/
?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Offers</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/">Home</a></li>

              <li class="breadcrumb-item active">Offers</li>

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

              <h3 class="card-title">All Offers</h3>

            </div>

            <div class="card-body">

              <table class="table">
                <thead>
                  <tr>
                    <th>Offer Title</th>
                    <th>Offer Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="set-protal">
                  <?php
                    $sliderdata = GetAdsSectionVal();
                    foreach($sliderdata as $slidrvalue){
                      if($slidrvalue['adsimg_status'] == "0"){
                        $statusale = "Inactive";
                      }elseif($slidrvalue['adsimg_status'] == "1"){
                        $statusale = "Active";
                      }
                  ?>
                    <tr id="<?php echo $slidrvalue['id']; ?>">
                      <td><?php echo $slidrvalue['adsimg_name']; ?></td>
                      <td style="width: 20%;"><img src='<?php echo $url; ?>/images/<?php echo $slidrvalue['adsimg_image']; ?>' class="img-responsive"></td>
                      <td><?php echo $statusale; ?></td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="<?php echo $url; ?>/admin-manager/ads/?edit=<?php echo $slidrvalue['id']; ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                          <a href="<?php echo $url; ?>/admin-manager/ads/?delete=action&id=<?php echo $slidrvalue['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
        data:{promoads:data},
        success:function(){
            alert('Change has been successfully saved.');  
            window.location.href = "";
        }  
    }); 
}
</script>