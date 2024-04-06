<?php
if(isset($_GET['edit'])){
  $edit_data = GetTagDataVal($_GET['edit']);
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

                              <label>Tags Name</label>

                              <input type="text" class="form-control chaking-pagename" name="healer-catename" placeholder="Enter ..." value="<?php echo $edit_helerdat['tag_name']; ?>" required>

                          </div>

                      </div>
                      <input type="hidden" name="page_action" value="Edit">
                      
                      <div class="form-group">

                        <input type="submit" value="Update" name="add-new-tag" class="btn btn-success float-right">

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

              <h3 class="card-title">Add New tag</h3>

            </div>

            <form role="form" method="post" enctype="multipart/form-data" action="">
              <div class="card-body pad">

                  <div class="row">

                    <div class="col-md-12">

                          <div class="form-group">

                              <label>Tag Name</label>

                              <input type="text" class="form-control chaking-pagename" name="blog_tagval" placeholder="Enter ..." value="" required>

                          </div>

                      </div>
                      <input type="hidden" name="page_action" value="Add New">

                      <div class="form-group">

                        <input type="submit" value="Add" name="Tageaddnew" class="btn btn-success float-right">

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