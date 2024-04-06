<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

?>
<style type="text/css">
  a.btn.btn-danger.btnseptu {
    margin: 0px 19px;
    color: #FFF;
    cursor: pointer;
}
a.uppy-Dashboard-poweredBy {
    display: none !important;
}
div#loadtableabut {
    background: #f5f5f5;
    padding: 11px 8px;
}
#loadtableabut table.table.table-bordered {
    border: 1px solid;
    width: 100%;
    display: inline-table;
}
#loadtableabut .set_tablevale tr {
    cursor: grab;
}
td.editvertion, td.delectvertion {
    cursor: pointer;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #007bff;
    border: 1px solid #007bff;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: #fff;
}
p#alertvertion {
    background: #007bff;
    padding: 5px 11px;
    margin-top: 11px;
    border-radius: 4px;
    color: #FFF;
}
.modal-dialog {
    max-width: 650px;
}
.my-error-class {
    color:#FF0000;  /* red */
}
</style>
<?php
if(isset($_GET['pageid']) && isset($_GET['autoid'])){
}else{
  $paenameval = AddNewPageOneTimeSeo();
  echo "<script>window.location.href='$paenameval';</script>";
}
foreach(GetProductDataValTab($_GET['autoid']) as $product_data){
$pageautoid = $product_data['product_page_name'];
}
?>
<link href="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.css" rel="stylesheet">
 
<script src="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.js"></script>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">
            <?php
              if($product_data['product_name'] == ""){
            ?>
            <h1>Add New Product</h1>
            <?php
              }else{
            ?>
            <h1>Edit</h1>
            <?php
              }
            ?>
            
          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/seo-user/">Home</a></li>

              <?php
                if($product_data['product_name'] == ""){
              ?>
              <li class="breadcrumb-item active">Add New Product</li>
              <?php
                }else{
              ?>
              <li class="breadcrumb-item active">Edit</li>
              <?php
                }
              ?>
              
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
                                      if($product_data['product_vender_id'] == $vendername['vendor_auto']){
                              ?>
                                <option value="<?php echo $vendername['vendor_auto']; ?>" selected><?php echo $vendername['vendor_f_name']; ?> <?php echo $vendername['vendor_l_name']; ?></option>
                              <?php
                                }else{
                              ?>
                                <option value="<?php echo $vendername['vendor_auto']; ?>"><?php echo $vendername['vendor_f_name']; ?> <?php echo $vendername['vendor_l_name']; ?></option>
                              <?php
                                }
                              }}}
                              ?>
                            </select>
                        </div>
                      </div>

                    <div class="col-md-12">

                        <div class="form-group">

                            <label>Product Name</label>

                            <input type="text" class="form-control chaking-pagename" name="prodttitle" placeholder="Product Name" value="<?php echo $product_data['product_name']; ?>" id="chckprodt" required>
                            <div id="result"></div>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Permalink </label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><?php echo $url; ?>/</span>
                              </div>
                              <input type="text" class="form-control" value="<?php echo $product_data['product_page_name']; ?>" name="peramlink" placeholder="Permalink">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <div class="mb-3">

                            <label>Product Description</label>

                            <textarea class="textarea" name="texteditor" placeholder="Place some text here..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $product_data['product_destion']; ?></textarea>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="mb-3">

                            <label>Short Description</label>

                            <input type="text" class="form-control chaking-pagename" name="shordest" placeholder="Short Description" value="<?php echo $product_data['product_short_des']; ?>" required>

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
                                          <input type="text" class="form-control chaking-pagename" name="prodsku" placeholder="SKU" value="<?php echo $product_data['product_sku']; ?>" required>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Domestic $</span>
                                        </div>
                                        <input type="text" class="form-control" value="<?php echo $product_data['product_shppin_domst']; ?>" name="domistupdtae" placeholder="Domestic $">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">International $</span>
                                        </div>
                                        <input type="text" name="internolupdate" value="<?php echo $product_data['product_shppin_inters']; ?>" class="form-control" placeholder="International $">
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.tab-pane -->
                                  <div class="tab-pane" id="tab_2">
                                    <div class="col-md-12">
                                      <p id="mainalertregsal"></p>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Regular price ($)</i></span>
                                        </div>
                                        <?php 
                                        if($product_data['product_regular_price'] == "0" || $product_data['product_regular_price'] == ""){
                                          $productprice = "";
                                        }else{
                                          $productprice = $product_data['product_regular_price'];
                                        }
                                        ?>
                                        <input type="text" name="prodregprice" value="<?php echo $productprice; ?>" class="form-control mainregular" placeholder="Price">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Sale price ($)</i></span>
                                        </div>
                                        <input type="text" name="prodsalgprice" value="<?php echo $product_data['product_sale_price']; ?>" class="form-control mainsale" placeholder="Price">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Low stock threshold</i></span>
                                        </div>
                                        <input type="number" name="prodminthold" value="<?php echo $product_data['product_min_price']; ?>" class="form-control" placeholder="Low stock threshold">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">Stock Quantity</i></span>
                                        </div>
                                        <input type="text" name="prodstock" value="<?php echo $product_data['product_stock']; ?>" class="form-control" placeholder="Stock Quantity">
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
                                              <select class="form-control" id="attbuteval" name="getattbut">
                                                <option value="">Select One</option>
                                                <?php
                                                    echo get_attbutval();
                                                ?>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-md-2">
                                            <div class="form-group">
                                              <div class="form-group"></div>
                                              <button type="button" class="btn btn-primary" id="addattbut">Add</button>
                                            </div>
                                          </div>
                                          <div class="col-md-12">
                                            <div id="lodvalue">
                                              <?php
                                                if(isset($_GET['autoid'])){
                                                  //echo $_GET['autoid'];
                                                  echo ge_show_attbutval($_GET['autoid'],$product_data['product_color']);
                                                }
                                              ?>
                                            </div>
                                          </div>
                                          <div class="col-md-12">
                                            <button type="button"id="saveattbut" class="buttonb btn btn-primary">Save</button>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                                        <p id="alertvertion"></p>
                                        <div id="loadvariations">
                                            <?php
                                                if(isset($_GET['autoid'])){
                                                    //print_r($get_attseion);
                                                    show_trem_val($_GET['autoid'],$product_data['product_color']);
                                                }
                                            ?>
                                        </div>
                                        <p id="alertdengs"></p>
                                        <div class="col-md-4 form-group">
                                            <button type="button" class="saveatbutvert buttonb btn btn-primary">Add</button>
                                        </div>
                                        <div id="loadtableabut">
                                            <table class="table table-bordered">
                                                <?php 
                                                    if(isset($_GET['autoid'])){
                                                      vertionattbut($_GET['autoid'],$product_data['product_color']);
                                                    }
                                                ?>
                                            </table>
                                            <div class="col-md-4 form-group">
                                              <button type="button" class="savetablever buttonb btn btn-primary">Save Variations</button>
                                        </div>
                                        </div>
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
                    <input type="hidden" name="dissontype" value="<?php echo $product_data['product_discount']; ?>">
                    <input type="hidden" class="form-control" value="<?php echo $product_data['product_discount']; ?>" name="disountvalue">
                </div>
                <?php include_once("template/seo-page.php"); ?>
              </div>
              <div class="col-md-4">
                <!-- /.col (left) -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Action</h3>
                  </div>
                  <div class="card-body">
                    <!-- Date range -->
                    <div class="form-group">
                      <?php
                      if($product_data['product_name'] == ""){
                      ?>
                        <input type="submit" value="Publish" name="addproduct" class="btn btn-primary float-left" id="submitbtnadd">
                        <input type="hidden" name="suname" value="Successfully Added.">
                      <?php }else{ ?>
                        <input type="submit" value="Update" name="addproduct" class="btn btn-primary float-left" id="submitbtnadd">
                        <input type="hidden" name="suname" value="Successfully Updated.">
                      <?php } ?>
                      <a class="btn btn-danger btnseptu" href="<?php echo $url; ?>/seo-user/all-product/">Cancel</a>
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
                  <div class="card-body catory-setht">
                    <!-- Date range -->
                    <div class="form-group">
                      <?php
                        echo ProductInnercategoryTree($product_data['product_catger_ids'],$parent_id = 0, $sub_mark = '');
                      ?>
                      
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card repert this -->

                <!-- /.col (left) -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Related Products</h3>
                  </div>
                  <div class="card-body">
                    <!-- Date range -->
                    <div class="form-group">
                      <div class="select2-purple">
                        <select class="select2" multiple="multiple" data-placeholder="SKU" data-dropdown-css-class="select2-purple" name="recmatepd[]" style="width: 100%;">
                          <?php
                          $ecplodeval = explode(',', $product_data['product_recomateprd']);
                            foreach(GetProductDataValTab() as $valueproduct){
                              if(in_array($valueproduct['product_auto_id'],$ecplodeval)){
                              echo "<option value='".$valueproduct['product_auto_id']."' selected>".$valueproduct['product_sku']."</option>";
                            }else{
                              echo "<option value='".$valueproduct['product_auto_id']."'>".$valueproduct['product_sku']."</option>";
                            }
                            }
                          ?>
                        </select>
                      </div>
                        <!-- /.form-group -->
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
                    <div id="singleimageview">
                      <img src="<?php echo $url; ?>/images/<?php echo $product_data['product_image']; ?>" class="img-responsive">
                    </div>
                    <label>Image</label>
                    <input type="file" class="form-control form-group" id="singleimage" name="prodtmainimg" onchange="return singlfileValidation()">
                    <input type="hidden" name="mainimgchkig" value="<?php echo $product_data['product_image']; ?>">
                  </div>
                </div>
                <!-- /.card repert this -->

                <!-- /.col (left) -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Product Gallery (Max Upload Size 2MB)</h3>
                  </div>
                  <div class="col-md-12">
                    <div id="multiimagesview" class="row_position">
                      <?php
                        foreach(GetProductSmallImage($_GET['autoid']) as $mutlipaimages){
                          echo "<div><i class='fa fa-trash-o removeval' data-id='".$mutlipaimages['id']."|".$mutlipaimages['produt_img']."'></i><img src='$url/images/".$mutlipaimages['produt_img']."' class='img-responsive' id='".$mutlipaimages['id']."'></div>";
                        }
                      ?>
                    </div>
                    <!-- <div id="drag-drop-area"></div> -->
                    <label>Image</label>
                    <input type="file" class="form-control form-group mutliimages" name="prodtallimg[]" multiple>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Variations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="vertionshow"></div>
        <button type="button" id="vertionupdate" class="buttonb btn btn-primary">Update</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="clickclose" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <?php

include_once('admin_dist/includes/footer.php');

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- <script class="text/javascript">
  var uppy = Uppy.Core()
    .use(Uppy.Dashboard, {
      inline: true,
      target: '#drag-drop-area'
    })
    .use(Uppy.Tus, {endpoint: 'https://www.gallerylala.com/images/'}) //you can put upload URL here, where you want to upload images

  uppy.on('complete', (result) => {
    console.log('Upload complete! We’ve uploaded these files:', result.successful)
  })
</script> -->
<script type="text/javascript">
var get_lient = $("#load-datasetion").length;
if(get_lient == 0 && get_lient == ""){
  $("#saveattbut").hide();
}else{
  $("#saveattbut").show();
}
$("#addattbut").click(function(){
  $("#saveattbut").show();
});
$( ".row_position" ).sortable({  
    delay: 150,  
    stop: function() {  
        var selectedData = new Array();  
        $('.row_position>div>img').each(function() {  
            selectedData.push($(this).attr("id"));  
        });  
        updateOrder(selectedData);
    }
});  
  
function updateOrder(data) {
    $.ajax({  
        url:"<?php echo $url; ?>/seo-user/ajax-data-file/",  
        type:'post',
        data:{postinmutipd:data},
        success:function(){
            //alert('Successfully Changed.');  
            //window.location.href = "";
        }  
    })  
}

$("body").delegate(".savetablever", "click", function(){
    var selectedData = [];
    $('.set_tablevale>tr').each(function() {
        selectedData.push($(this).attr("id"));
    });
    //alert(selectedData);
    updateOrdertablecick(selectedData);
});
  
function updateOrdertablecick(data) {
    $.ajax({  
        url:"<?php echo $url; ?>/seo-user/ajax-data-file/",  
        type:'post',
        data:{tablevale:data},
        success:function(response){
            //alert(response);
            alert('Successfully Saved.');
            //window.location.href = "";
        }  
    })
}

$( ".set_tablevale" ).sortable({  
    delay: 150,  
    stop: function() {
        var selectedData = new Array();  
        $('.set_tablevale>tr').each(function() {  
            selectedData.push($(this).attr("id"));  
        });  
        //alert(selectedData);
        updateOrdertable(selectedData);
    }
});  
  
function updateOrdertable(data) {
    $.ajax({  
        url:"<?php echo $url; ?>/seo-user/ajax-data-file/",  
        type:'post',
        data:{tablevale:data},
        success:function(response){
            //alert(response);
            //alert('Successfully Changed.');  
            //window.location.href = "";
        }  
    })  
}

$('.removeval').click(function(){
  var get_multimg = $(this).data("id");
 //alert(get_multimg);
 $.ajax({  
      url:"<?php echo $url; ?>/seo-user/ajax-data-file/",  
      type:'post',
      data:{imageremovmulti:get_multimg},
      success:function(){
          alert('successfully delete');
          window.location.href = "";
      }  
  });
});
function dataedit(vertionid){
  var vercheck = "new";
  var secionval = "<?php echo $_GET['pageid']; ?>";
  $.ajax({
      type: "POST",
      url: "<?php echo $url; ?>/seo-user/ajax-data-file/",
      data : {addnewvert:1, verindid:vertionid, vertioncehck:vercheck, sessionvale:secionval},
      success : function(response){
        //alert(response);
        $("#vertionshow").html(response);
      }        
  });
}
$(".removeabbut").click(function(){
  var getidval = $(this).data('id');
  $.ajax({
      type: "POST",
      url: "<?php echo $url; ?>/seo-user/ajax-data-file/",
      data : {removeabut:1, abutid:getidval},
      success : function(response){
        //alert(response);
        $("#lodvalue").load(" #lodvalue");
        $("#loadvariations").load(" #loadvariations");
        $("#loadtableabut").load(" #loadtableabut");
      }        
  });
});
var submit_button = document.getElementById("submitbtnadd");

submit_button.addEventListener("click", function(e) {
  var required = document.querySelectorAll("input[required]");
  
  required.forEach(function(element) {
    if(element.value.trim() == "") {
      element.style.borderColor = "red";
    }
  });
});

$(".salepricever").keyup(function(){
  var regualrpice = $(".regpricever").val();
  var saleprice = $(".salepricever").val();
  if(regualrpice < saleprice){
    $("#alertdengs").html("<span class='alert alert-danger'>Sales price can not be greater than regular price.</span>");
  }else{
    $("#alertdengs").html("");
  }
});
$(".salepricever").keydown(function(){
  var regualrpice = $(".regpricever").val();
  var saleprice = $(".salepricever").val();
  if(regualrpice < saleprice){
    $("#alertdengs").html("<span class='alert alert-danger'>Sales price can not be greater than regular price.</span>");
  }else{
    $("#alertdengs").html("");
  }
});

$(".mainsale").keyup(function(){
  var mainregualrpice = $(".mainregular").val();
  var mainsaleprice = $(".mainsale").val();
  if(mainregualrpice < mainsaleprice){
    $("#mainalertregsal").html("<span class='alert alert-danger'>Sales price can not be greater than regular price.</span>");
  }else{
    $("#mainalertregsal").html("");
  }
});
$(".mainsale").keydown(function(){
  var mainregualrpice = $(".mainregular").val();
  var mainsaleprice = $(".mainsale").val();
  if(mainregualrpice < mainsaleprice){
    $("#mainalertregsal").html("<span class='alert alert-danger'>Sales price can not be greater than regular price.</span>");
  }else{
    $("#mainalertregsal").html("");
  }
});
</script>