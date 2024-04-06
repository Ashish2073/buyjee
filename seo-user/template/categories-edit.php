<?php
if(isset($_GET['edit'])){
  $edit_data = GetCategoriesDatavale(0,$_GET['edit']);
  foreach($edit_data as $edit_helerdat){
?>
<!-- right Box -->
        <div class="col-md-5">

          <div class="card card-primary">

            <div class="card-header">

              <h3 class="card-title">Edit <?php echo $edit_helerdat['catagy_name']; ?></h3>

            </div>

            <form role="form" method="post" enctype="multipart/form-data" action="">
              <div class="card-body pad">

                  <div class="row">

                    <div class="col-md-12">

                          <div class="form-group">

                              <label>Category Name</label>

                              <input type="text" class="form-control chaking-pagename" name="catename-edit" placeholder="Enter ..." value="<?php echo $edit_helerdat['catagy_name']; ?>" required>

                          </div>

                      </div>
                      <div class="col-md-12">

                          <div class="form-group">

                              <label>Category Parent</label>

                              <select class="form-control" name="catroy_parent">
                                <option value=''>Select One</option>
                                <?php
                                  $get_catagoryat = GetCategoriesDatavale();
                                  foreach($get_catagoryat as $valueKeyData){
                                    if($edit_helerdat['on_id'] == $valueKeyData['catagy_perant_id']){
                                      echo "<option value='".$valueKeyData['on_id']."' selected>".$valueKeyData['catagy_name']."</option>";
                                    }else{
                                      echo "<option value='".$valueKeyData['on_id']."'>".$valueKeyData['catagy_name']."</option>";
                                    }
                                    
                                  }
                                ?>
                              </select>

                          </div>

                      </div>
                      <div class="form-group">

                        <input type="submit" value="Update" name="edit_catoryvale" class="btn btn-success float-right">

                    </div>

                  </div>

              </div>

          </form>

          </div>

          <!-- /.card -->

        </div>
        <!-- right Box -->
<?php
}}
?>