<?php
include_once('admin_dist/includes/uper-header.php');
include_once('admin_dist/includes/main-header.php');
include_once('admin_dist/includes/top-bar.php');
include_once('admin_dist/includes/left-menu.php');
?>
<style type="text/css">
  .menu-single .form-group input.form-control {
    width: 90%;
    float: left;
}
.menu-single .form-group span.removesingl {
    background: #f70707;
    padding: 6px 5px;
    margin-top: 1px;
    display: inline-block;
    border-radius: 3px;
    margin-left: 3px;
    color: #FFF;
    cursor: pointer;
}
.menu-single .form-group span.updatemeun {
    background: #46a001;
    color: #FFF;
    padding: 7px 6px;
    margin-left: 7px;
    border-radius: 3px;
    cursor: pointer;
}
.single-menu {
    display: inline-block;
    margin-bottom: 31px;
    width: 90%;
    float: left;
}
.menu-single .form-group .single-menu input.form-control{
  width: 100%;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menus</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/index.php">Home</a></li>
              <li class="breadcrumb-item active">Menus</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Menus</h3>
              <div class="col-sm-3 float-right">
                <select class="form-control select_postion">
                  <option value="">Select One</option>
                  <option value="header">Header</option>
                  <option value="about-us">Footer About Us</option>
                  <option value="my-account">Footer My Account</option>
                  <option value="contact-us">Footer Contact Us</option>
                </select>
              </div>
            </div>
            <!-- /.card-header left -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                <form role="form" method="post" enctype="multipart/form-data" action="">
                  <!-- pages -->
                  <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">Pages</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                      <div class="row">
                        <div class="col-md-12" data-select2-id="33">
                          <div class="form-group">
                            <select class="form-control select2bs4 select2-hidden-accessible" name="page-menudata" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <?php
                                foreach(get_page_names() as $pagename){
                                  echo "<option value='".$pagename['id']."|".$pagename['page_slug']."|".$pagename['page_name']."'>".$pagename['page_name']."</option>";
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer" style="display: block;">
                      <button type="submit" name="add-page-menu">Add Menu</button>
                    </div>
                  </div>
                  <!--pages part -->
                  </form>

                  <form role="form" method="post" enctype="multipart/form-data" action="">
                  <!-- pages -->
                  <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">Categories</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                      <div class="row">
                        <div class="col-md-12" data-select2-id="33">
                          <div class="form-group">
                            <select class="form-control select2bs4 select2-hidden-accessible" name="page-catgoy" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <?php
                                foreach(getCatagrioyesDataVal(0,0) as $catgoryval){
                                  echo "<option value='".$catgoryval['id']."|".$catgoryval['prd_cat_name']."|".$catgoryval['prd_cat_slug']."'>".$catgoryval['prd_cat_name']."</option>";
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer" style="display: block;">
                      <button type="submit" name="add-page-catgoy">Add Menu</button>
                    </div>
                  </div>
                  <!--pages part -->
                  </form>

                  <!-- Custom Menu -->
                  <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">Custom Menu</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      </div>
                    </div>
                    <form role="form" method="post" enctype="multipart/form-data" action="">
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                      <div class="row">
                        <div class="col-md-12" data-select2-id="33">
                          <!-- <div class="form-group">
                            <input type="text" class="form-control" placeholder="Icon Name">
                          </div> -->
                          <div class="form-group">
                            <input type="text" class="form-control" name="custmenu-url" placeholder="Menu Url" required>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" name="custmenu-text" placeholder="Menu Text" required>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer" style="display: block;">
                      <button type="submit" name="addcustom-link">Add Menu</button>
                    </div>
                    </form>
                  </div>
                  <!-- Custom Menu -->
                </div>
            <!-- /.card-body left -->
            <!-- /.card-header Right -->
                <div class="col-md-8">
                  <!-- pages -->
                  <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">Menu</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                      <div class="row">
                        <div class="col-md-12 row_position" data-select2-id="33">
                          <form role="form" method="post" enctype="multipart/form-data" action="">

                            <table class="table table-bordered">
                              <tr>
                                <th>Menu Name</th>
                                <th>Menu Url</th>
                                <th>Action</th>
                              </tr>
                              <tbody class="row_position">
                                <?php
                                  foreach(Get_show_menuval($_GET['menu-name']) as $menudatavl){
                                    echo "<tr class='".$menudatavl['id']."' id='".$menudatavl['id']."'><td><input type='text' value='".$menudatavl['menu_name']."' class='form-control manu_name'></td>";
                                    echo "<td><input type='text' value='".$menudatavl['menu_url']."' class='form-control manu_url'></td>";
                                    echo "<td><p class='edit_menu btn btn-success'>Edit</p>
                                              <p data-id='".$menudatavl['id']."' class='btn btn-danger delete_menu'>Delete</p>
                                          </td></tr>";
                                  }
                                ?>
                              </tbody>
                            </table>
                            
                          </form>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <!-- <div class="card-footer" style="display: block;">
                      <button type="button" name="addpage" id="updatemenu">Update Menu</button>
                    </div> -->
                  </div>
                  <!--pages part -->
                </div>
              </div>
            </div>
            <!-- /.card-body Right -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
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
  $(".select_postion").on('change', function () {
    var url = $(this).val(); // get selected value
    if (url) { // require a URL
      var main_url = "<?php echo $url; ?>";
        window.location = main_url + "/admin-manager/menu/?menu-name=" + url; // redirect
    }
    return false;
});
$(".delete_menu").click(function(){
  var get_removeid = $(this).data('id');
  //alert(get_removeid);
  $.ajax({
      url : "<?php echo $url; ?>/admin-manager/ajax-data-file/",
      method : "POST",
      data : {menueremove:1, menuremveid:get_removeid},
      success : function(data){
          console.log(data);
          //alert(data);
          alert("Successfully Deleted.");
          window.location.reload();
      }
  });
});

$( ".row_position" ).sortable({  
    delay: 150,  
    stop: function() {  
        var selectedData = new Array();  
        $('.row_position>tr').each(function() {  
            selectedData.push($(this).attr("id"));  
        });  
        updateOrder(selectedData);  
    }
});  
  
function updateOrder(data) {
    $.ajax({  
        url:"<?php echo $url; ?>/admin-manager/ajax-data-file/",  
        type:'post',  
        data:{positionmenu:data},
        success:function(){
            alert('your change successfully saved');  
        }  
    })  
}


</script>
</body>
</html>
