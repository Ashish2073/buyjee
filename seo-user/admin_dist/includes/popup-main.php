<!-- image large modal -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h4 class="modal-title" id="myModalLabel">Large Modal</h4> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tabbox">
          <ul class="nav nav-tabs tabsul">
            <li id="first"><a href="#firsttab" id="firstatg" data-toggle="tab">Upload Files</a></li>
            <li class="active" id="seondt"><a href="#secondtab" id="seconddata" data-toggle="tab">Media Library</a></li>
            
          </ul>
          <div class="tab-content">
            <div class="tab-pane" id="firsttab">
              <div class="uploadfile mt15">
                <form role="form" method="post" enctype="multipart/form-data" action="">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group text-center">                    
                            <input type="file" class="form-control" name="mediafile" id="imagefile" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="button" id="fupForm"value="Upload" class="btn btn-success float-right" name="ft-expressbtn">
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="tab-pane active" id="secondtab">
              <div class="media-library">
                <div class="row">
                  <div class="col-md-9">
                    <div id="loaddata">
                      <ul class="imglist mt15">
                        <?php
                        $images_dataval = GLlImagesDataVale();
                        foreach($images_dataval as $imagesvale){
                        ?>
                          <li class="clickactivecl" data-id="<?php echo $imagesvale['id']; ?>"><img src="<?php echo $url; ?>/images/<?php echo $imagesvale['image_name']; ?>" class="img-responsive"></li>
                      <?php } ?>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-3"> 
                    <div class="attachimg">
                      <h3>Attachment Details</h3>
                      <div id="load_demoshow">
                        <div class="row">
                          <div class="col-sm-3">
                            <img id="img_nameval" src="https://www.gallerylala.com/new-design/images/1887800591.jpg" class="img-responsive">
                          </div>
                          <div class="col-sm-9">
                            <div class="rdis">
                              <div class="ftitle" id="ftitle">file name.jpg</div>
                              <div class="fdate" id="fdate">April 14, 21</div>
                              <div class="fdel" id="deletval"><a href="javascript:void(0);">Delete Permanently</a></div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="titlebox">
                          <div class="form-group">
                            <label>Alt Text</label>
                            <input type="text" class="form-control" id="aletimg" name="ft-expressimg" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" id="titleimg" name="ft-expressimg" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Caption</label>
                            <textarea class="form-control" id="catipimg" name="ft-expressimg" placeholder="Enter ...">
                              
                            </textarea>
                           
                        </div>
                        
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" value="Save" class="btn btn-success" name="ft-expressbtn">
                  </div>
                </div>
                
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Add New Menu Popup -->

<!-- Modal -->
<div class="modal fade" id="resetpassword" tabindex="-1" role="dialog" aria-labelledby="resetpassword" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resetpasswordmen">Reset Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="post" enctype="multipart/form-data" action="">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>New Password:</label>
                    <input type="password" class="form-control chaking-pagename" name="vend_newpass" id="postnamechking" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Retype New Password:</label>
                    <input type="password" class="form-control chaking-pagename" name="vend_newpass2" id="postnamechking" required>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="resetvendorpassword" class="btn btn-primary">Reset</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteaccount">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="deletebox">
          <h3>Are you sure you want to delete ?</h3>
          <div class="row">
            <div class="col-md-6">
              <a href="#" id="deleteurl" class="btn-info">Delete</a>
            </div>
            <div class="col-md-6">
              <button type="button" class="canclevale" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div> -->
    </div>
  </div>
</div>