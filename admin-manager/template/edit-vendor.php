<style>
    img.img-responsive {
    width: 100%;
}
span.staupdf {
    width: 100%;
    text-align: center;
    font-size: 60px;
    margin: auto;
    float: left;
    background: #007bff;
    margin-bottom: 10px;
    color: #FFF;
}
</style>
<?php
$edit_courseata = GetVenderDatavale($_GET['id']);
foreach($edit_courseata as $valecourseval){
  foreach(GetPermissionvalData($valecourseval['vendor_auto']) as $venorpermisin){
    $_vesnor_fname = $valecourseval['vendor_f_name'];
    $_vesnor_lname = $valecourseval['vendor_l_name'];
    $_vesnor_joingdate = $valecourseval['vendor_date'];
    $_vesnor_joingtime = $valecourseval['vendor_time'];
    $_vesnor_profileimg = $valecourseval['vendor_img'];
    foreach(GetBannerDataVale($valecourseval['vendor_auto'],"vendor","active") as $valebannerdat){
      $_vesnor_bannerimg = $valebannerdat['bannerName'];
    }
}
foreach(GetProductDataValTab("0",$valecourseval['vendor_auto']) as $productvale){
  if($productvale['product_status'] == "1"){
    $countproduct[] = $productvale['product_status'];
  }
}
foreach(GetAboutVendor($_GET['id'],'vendor') as $aboutconent){
}
foreach(GetShppingTreamValue($_GET['id'],'vendor') as $shppingconent){
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

            <h1>Edit <?php echo $_vesnor_fname; ?> <?php echo $_vesnor_lname; ?></h1>

          </div>

          <div class="col-sm-6">

            <a href="<?php echo $url; ?>/<?php echo $valecourseval['vendor_uni_name']; ?>/" class="btn btn-primary float-right" target="_blank">View Store</a>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">

        <div class="col-md-12">

          <div class="card card-outline card-info">

            <div class="card-header">

              <h3 class="card-title">

                Edit <?php echo $_vesnor_fname; ?> <?php echo $_vesnor_lname; ?>

              </h3>
              <span class="total-count">
                Account Created Date: <?php echo USATimeZoneSettime($_vesnor_joingdate); ?> - <?php echo $_vesnor_joingtime; ?>
              </span>
              <span class="total-count">
                Total Products: <a href="<?php echo $url; ?>/admin-manager/vendor-products/?filter=<?php echo $valecourseval['vendor_auto']; ?>" target="_blank"><?php echo GLLTotal_Product_Count("0",$_GET['id']); ?></a>
              </span>
              <!-- /. tools -->

            </div>

            <!-- /.card-header -->
          <form role="form" method="post" enctype="multipart/form-data" action="">
            <div class="card-body pad">

                <div class="row">

                  <div class="col-md-4">

                        <div class="form-group">
                          <div id="singleimagepvone">
                            <?php
                              if(!empty($_vesnor_profileimg)){
                              $profileexplod = file_exists($url.'/images/vendor_images/'.$_vesnor_profileimg);
                              if($profileexplod){
                            ?>
                            <img src="<?php echo $url; ?>/images/vendor_images/<?php echo $_vesnor_profileimg; ?>" class="img-responsive">
                            <?php
                              }else{
                            ?>
                            <img src="<?php echo $url; ?>/images/<?php echo $_vesnor_profileimg; ?>" class="img-responsive">
                            <?php
                              }}else{
                            ?>
                            <img src="<?php echo $url; ?>/customer/images/default-user-icon.jpg" class="img-responsive">
                            <?php
                              }
                            ?>
                          </div>
                        </div>

                    </div>
                    <div class="col-md-8">

                        <div class="form-group">

                            <label>Upload profile picture (Size: 200 x 200 px)</label>

                            <input type="file" class="form-control" name="vend_prilfe" id="multisinlpvone" onchange="return singlfileprivewildone()">
                            <input type="hidden" class="form-control" name="vend_prilfe_chking" value="<?php echo $_vesnor_profileimg; ?>">
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                          <div id="singleimagepvtwo">
                          <?php
                          if(!empty($_vesnor_bannerimg)){
                            $profileexplodsecd = file_exists($url.'/images/store-slider/'.$_vesnor_bannerimg);
                            if($profileexplodsecd){
                          ?>
                            <img src="<?php echo $url; ?>/images/store-slider/<?php echo $_vesnor_bannerimg; ?>" class="img-responsive">
                          <?php
                          }else{
                          ?>
                          <img src="<?php echo $url; ?>/images/<?php echo $_vesnor_bannerimg; ?>" class="img-responsive">
                          <?php
                          }}else{
                          ?>
                          <img src="<?php echo $url; ?>/customer/images/default-user-icon.jpg" class="img-responsive">
                          <?php
                          }
                          ?>
                        </div>
                        </div>

                    </div>
                    <div class="col-md-8">

                        <div class="form-group">

                            <label>Upload store banner (Size: 1600 x 533 px)</label>

                            <input type="file" class="form-control" name="vend_banner" id="multisinlpvtwo" onchange="return singlfileprivewiltwo()">
                            <input type="hidden" class="form-control" name="vend_banner_chking" value="<?php echo $_vesnor_bannerimg; ?>">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name</label>

                            <input type="text" class="form-control chaking-pagename" name="vend_fname" id="postnamechking" value="<?php echo $_vesnor_fname; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>

                            <input type="text" class="form-control chaking-pagename" name="vend_lname" id="postnamechking" value="<?php echo $_vesnor_lname; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Company Name</label>

                            <input type="text" class="form-control chaking-pagename" name="vend_compname" id="postnamechking" value="<?php echo $valecourseval['vendor_company']; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email Id</label>

                            <input type="text" class="form-control chaking-pagename" name="vend_emailid" id="postnamechking" value="<?php echo $valecourseval['vendor_email']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Phone</label>

                            <input type="text" class="form-control chaking-pagename" name="vend_phone" id="postnamechking" value="<?php echo $valecourseval['vendor_phone']; ?>">
                        </div>
                    </div>
                    <?php
                      $strtaddres = explode(',', $valecourseval['vendor_st_address']);
                    ?>
                      <input type="hidden" class="form-control chaking-pagename" name="vend_smalcity" value="<?php echo $strtaddres[0]; ?>">
                      <input type="hidden" class="form-control chaking-pagename" name="vend_smalstate" value="<?php echo $strtaddres[1]; ?>">
                      <input type="hidden" class="form-control chaking-pagename" name="vend_smalcountcode" value="<?php echo $strtaddres[1]; ?>">
                    <div class="col-md-6">
                        <label>GLL Vendor Store URL</label>
                        <div class="input-group mb-3">
                          <div class="input-group-append">
                            <span class="input-group-text"><?php echo $url; ?>/</span>
                          </div>
                          <input type="text" class="form-control" value="<?php echo $valecourseval['vendor_uni_name']; ?>" name="vend_storeurl" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Website or Product Link</label>
                          <input type="text" class="form-control" value="<?php echo $valecourseval['vendor_url']; ?>" name="vend_website">
                        </div>
                    </div>
                    <div class="col-md-12">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Vendor Shipping Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>Street Address</label>
                                  <input type="text" class="form-control" value="<?php echo $valecourseval['vendor_address']; ?>" name="vend_addrss" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>City</label>
                                  <input type="text" class="form-control" value="<?php echo $valecourseval['vendor_city']; ?>" name="vend_city" required>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" value="<?php echo $valecourseval['vendor_state']; ?>" name="vend_statecode">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>Zip Code</label>
                                  <input type="text" class="form-control" value="<?php echo $valecourseval['vendor_zipcode']; ?>" name="vend_zipcode" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>Country</label>
                                  <select name="vend_country" class="form-control" required>
                                    <option value="">select your country</option>
                                  <?php
                                    if($valecourseval['vendor_country'] == ""){
                                      echo get_adminvnr_county();
                                    }else{
                                      echo get_adminvnr_county($valecourseval['vendor_country']);
                                    }
                                  ?>
                                  </select>
                                </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Vendor Validation</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>Reset Password</label>
                                  <button type="button" class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#resetpassword">Reset</button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>Vendor Status</label>
                                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <?php
                                      if($venorpermisin['user_p_email_ap'] == "1"){
                                    ?>
                                      <input type="checkbox" class="custom-control-input" name="vend_status" value="1" id="customSwitch1" checked>
                                    <?php }elseif($venorpermisin['user_p_email_ap'] == "0"){ ?>
                                      <input type="checkbox" class="custom-control-input" name="vend_status" value="1" id="customSwitch1">
                                    <?php } ?>
                                    <label class="custom-control-label" for="customSwitch1"></label>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>Vendor Profile Status</label>
                                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <?php
                                      if($venorpermisin['user_p_block'] == "1"){
                                    ?>
                                    <input type="checkbox" class="custom-control-input" name="vend_profilests" value="0" id="customSwitch3">
                                    <?php
                                      }elseif($venorpermisin['user_p_block'] == "0"){
                                    ?>
                                    <input type="checkbox" class="custom-control-input" name="vend_profilests" value="0" id="customSwitch3" checked>
                                    <?php
                                      }
                                    ?>
                                    <label class="custom-control-label" for="customSwitch3"></label>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Admin Commission Type</label>
                                      <select class="form-control" name="admincomty">
                                        <?php
                                          if($valecourseval['vendor_commi_type'] == "percentage"){
                                        ?>
                                          <option value="percentage" selected>Percentage</option>
                                          <option value="flat">Flat</option>
                                        <?php
                                          }elseif($valecourseval['vendor_commi_type'] == "flat"){
                                        ?>
                                          <option value="percentage">Percentage</option>
                                          <option value="flat" selected>Flat</option>
                                        <?php }else{
                                        ?>
                                          <option value="percentage">Percentage</option>
                                          <option value="flat">Flat</option>
                                        <?php
                                        } ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Admin Commission</label>
                                      <input type="text" class="form-control" name="vend_admincomision" value="<?php echo $valecourseval['vendor_commi_val']; ?>">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Delete Vendor</label>
                                    <button type="button" class="btn btn-block btn-outline-primary"  data-toggle="modal" data-target="#delete" data-id="<?php echo $url; ?>/admin-manager/vendors/?action=delete&id=<?php echo $valecourseval['id']; ?>&eandid=<?php echo $valecourseval['vendor_auto'];?>" id="deletebtn">Delete</button>
                                  </div>
                              </div>

                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Vendor Dashboard Permissions</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>Permission to upload store banner</label>
                                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <?php
                                    if($venorpermisin['user_banner'] == "no"){
                                    ?>
                                      <input type="checkbox" class="custom-control-input" name="vend_uplbanner" value="yes" id="customSwitch10">
                                    <?php
                                    }elseif($venorpermisin['user_banner'] == "yes"){
                                    ?>
                                      <input type="checkbox" class="custom-control-input" name="vend_uplbanner" value="yes" id="customSwitch10" checked>
                                    <?php
                                    }
                                    ?>
                                    <label class="custom-control-label" for="customSwitch10"></label>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>Permission to upload profile picture</label>
                                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <?php
                                    if($venorpermisin['user_profilepic'] == "no"){
                                    ?>
                                      <input type="checkbox" class="custom-control-input" name="vend_uplopropic" value="yes" id="customSwitch12">
                                    <?php
                                    }elseif($venorpermisin['user_profilepic'] == "yes"){
                                    ?>
                                    <input type="checkbox" class="custom-control-input" name="vend_uplopropic" value="yes" id="customSwitch12" checked>
                                    <?php
                                    }
                                    ?>
                                    <label class="custom-control-label" for="customSwitch12"></label>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>Permission to edit 'About Us' content</label>
                                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <?php
                                    if($venorpermisin['user_aboutval'] == "no"){
                                    ?>
                                      <input type="checkbox" class="custom-control-input" name="vend_abotedit" value="yes" id="customSwitch13">
                                    <?php
                                    }elseif($venorpermisin['user_aboutval'] == "yes"){
                                    ?>
                                      <input type="checkbox" class="custom-control-input" name="vend_abotedit" value="yes" id="customSwitch13" checked>
                                    <?php
                                    }
                                    ?>
                                    <label class="custom-control-label" for="customSwitch13"></label>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Permission to edit 'Shipping/Returns' policy content</label>
                                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <?php
                                    if($venorpermisin['user_shhpinval'] == "no"){
                                    ?>
                                      <input type="checkbox" class="custom-control-input" name="vend_shpiedit" value="yes" id="customSwitch14">
                                    <?php
                                    }elseif($venorpermisin['user_shhpinval'] == "yes"){
                                    ?>
                                      <input type="checkbox" class="custom-control-input" name="vend_shpiedit" value="yes" id="customSwitch14" checked>
                                    <?php
                                    }
                                    ?>
                                    <label class="custom-control-label" for="customSwitch14"></label>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>Permission to edit 'Personal Information'</label>
                                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <?php
                                    if($venorpermisin['user_addresedt'] == "no"){
                                    ?>
                                      <input type="checkbox" class="custom-control-input" name="vend_peronedit" value="yes" id="customSwitch15">
                                    <?php
                                    }elseif($venorpermisin['user_addresedt'] == "yes"){
                                    ?>
                                      <input type="checkbox" class="custom-control-input" name="vend_peronedit" value="yes" id="customSwitch15" checked>
                                    <?php
                                    }
                                    ?>
                                    <label class="custom-control-label" for="customSwitch15"></label>
                                  </div>
                                </div>
                            </div>

                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                    </div>

                    <div class="col-md-12">

                        <div class="mb-3">

                            <label>About Creator</label>

                            <textarea class="textarea" name="vend_about" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $aboutconent['about_content']; ?></textarea>

                        </div>

                    </div>
                    <div class="col-md-12">

                        <div class="mb-3">

                            <label>Shipping and Returns</label>

                            <textarea class="textarea" name="vend_shppingval" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $shppingconent['terms']; ?></textarea>

                        </div>

                    </div>
                    <div class="col-md-12">
                      <?php $pageautoid = $valecourseval['vendor_uni_name']; ?>
                      <?php include_once("template/seo-page.php"); ?>
                    </div>

                    <div class="form-group">

                      <input type="submit" value="Update" name="EditVendorBtn" class="btn btn-success float-right">

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

  <!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->