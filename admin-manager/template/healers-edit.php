<?php
if(isset($_GET['edit']) && isset($_GET['pageid'])){
  $edit_data = ViewHealerDetails($_GET['edit'],$_GET['pageid']);
  foreach($edit_data as $edit_helerdat){
?>
<!-- right Box -->
        <div class="col-md-5">

          <div class="card card-primary">

            <div class="card-header">

              <h3 class="card-title">Edit <?php echo $edit_helerdat['heal_title']; ?></h3>

            </div>

            <form role="form" method="post" enctype="multipart/form-data" action="">
              <div class="card-body pad">

                  <div class="row">

                    <div class="col-md-12">

                          <div class="form-group">

                              <label>Category Name</label>

                              <input type="text" class="form-control chaking-pagename" name="healer-catename" placeholder="Enter ..." value="<?php echo $edit_helerdat['heal_catgryname']; ?>" required>

                          </div>

                      </div>
                      <input type="hidden" name="page_action" value="Edit">
                      <div class="col-md-12">

                          <div class="form-group">

                              <label>Title</label>

                              <input type="text" class="form-control chaking-pagename" value="<?php echo $edit_helerdat['heal_title']; ?>" name="healer-title" placeholder="Enter ..." required>

                          </div>

                      </div>

                      <div class="col-md-12">

                          <div class="form-group">

                              <label>Button</label>

                              <input type="text" class="form-control form-group" name="healer-button-link" placeholder="Button Link" value="<?php echo $edit_helerdat['heal_button_link']; ?>">

                              <input type="text" class="form-control form-group" name="healer-button-name" placeholder="Button Name" value="<?php echo $edit_helerdat['heal_button_name']; ?>">

                          </div>

                      </div>

                      <div class="col-md-12">

                        <div class="form-group">

                            <label>Image</label>

                            <div class="row">
                              <div class="col-md-5">
                                <img src="<?php echo $url; ?>/images/<?php echo $edit_helerdat['heal_image']; ?>" class="img-responsive">
                              </div>
                              <div class="col-md-7">
                                <label>Image Dimensions (W-203 x H-303)px</label>
                                <input type="file" class="form-control form-group" name="healer-image">
                                <input type="hidden" value="<?php echo $edit_helerdat['heal_image']; ?>" name="healer-image-chking">
                              </div>
                            </div>
                        </div>

                    </div>

                      <div class="form-group">

                        <input type="submit" value="Update" name="add-new-healer" class="btn btn-success float-right">

                    </div>

                  </div>

              </div>

          </form>

          </div>

          <!-- /.card -->

        </div>
        <!-- right Box -->
<?php
}}else{
?>
<!-- right Box -->
        <div class="col-md-5">

          <div class="card card-primary">

            <div class="card-header">

              <h3 class="card-title">Add New Forum Category</h3>

            </div>

            <form role="form" method="post" enctype="multipart/form-data" action="">
              <div class="card-body pad">

                  <div class="row">

                    <div class="col-md-12">

                          <div class="form-group">

                              <label>Category Name</label>

                              <input type="text" class="form-control chaking-pagename" name="healer-catename" placeholder="Enter ..." value="" required>

                          </div>

                      </div>
                      <input type="hidden" name="page_action" value="Add New">
                      <div class="col-md-12">

                          <div class="form-group">

                              <label>Title</label>

                              <input type="text" class="form-control chaking-pagename" value="" name="healer-title" placeholder="Enter ..." required>

                          </div>

                      </div>

                      <div class="col-md-12">

                          <div class="form-group">

                              <label>Button</label>

                              <input type="text" class="form-control form-group" name="healer-button-link" placeholder="Button Link" value="">

                              <input type="text" class="form-control form-group" name="healer-button-name" placeholder="Button Name" value="">

                          </div>

                      </div>

                      <div class="col-md-12">

                        <div class="form-group">

                            <label>Image</label>

                            <div class="row">
                              <div class="col-md-5">
                                <img src="" class="img-responsive">
                              </div>
                              <div class="col-md-7">
                                <label>Image Dimensions (W-203 x H-303)px</label>
                                <input type="file" class="form-control form-group" name="healer-image">
                                <input type="hidden" value="" name="healer-image-chking">
                              </div>
                            </div>
                        </div>

                    </div>

                      <div class="form-group">

                        <input type="submit" value="Add" name="add-new-healer" class="btn btn-success float-right">

                    </div>

                  </div>

              </div>

          </form>

          </div>

          <!-- /.card -->

        </div>
        <!-- right Box -->
<?php
}
?>