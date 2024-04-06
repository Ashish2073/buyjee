<?php
$page_id = "88";
$home_pagedata = AboutContetDataVal($page_id);
foreach ($home_pagedata as $value) {
  $get_about_title = $value['abutpg_title'];
  $get_about_brdimg = $value['abutpg_brdimg'];
  $get_about_restitle = $value['abutpg_resours_title'];
  $get_about_resecont = $value['abutpg_resours_cont'];
  $get_about_reseimg = $value['abutpg_resours_img'];
  $get_about_vis_title = $value['abutpg_vision_title'];
  $get_about_vis_cont = $value['abutpg_vision_cont'];
  $get_about_vis_img = $value['abutpg_vision_img'];
  $get_about_mis_title = $value['abutpg_mission_title'];
  $get_about_mission_cont = $value['abutpg_mission_cont'];
  $get_about_mission_img = $value['abutpg_mission_img'];
  $get_about_number = $value['abutpg_numberdata'];
  $get_about_numbertitle = $value['abutpg_numtitle'];
}
?>
<style>
    .add_morenumber {
    background: #007BFF;
    float: left;
    padding: 8px 14px;
    color: #FFF;
    border-radius: 5px;
    cursor: pointer;
}
.numbeox .mb-3 {
    border-bottom: 1px solid #CCC;
    padding-bottom: 9px;
}
.width-100 {
    width: 100%;
    padding: 1px 10px;
}
.border_bottom {
    border-bottom: 1px solid #909090;
    margin-bottom: 19px;
}
</style>
<!-- Start About Section -->
<div class="width-100">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        About Section

      </h3>

    </div>

    <!-- /.card-header -->
   <div class="card-body pad">

      <div class="row">
            
          <div class="col-md-12">

              <div class="mb-3">

                  <label>Title</label>

                  <input type="text" name="abut-title" class="form-control form-group" value="<?php echo $get_about_title; ?>" placeholder="Title">

              </div>

          </div>

          <div class="col-md-12">

            <div class="form-group">

                <label>Breadcrumb Image (1900x368)</label>

                <div class="row">
                  <div class="col-md-2">
                    <img src="<?php echo $url; ?>/images/<?php echo $get_about_brdimg; ?>" class="img-responsive">
                  </div>
                  <div class="col-md-10">
                    <label>Image Dimensions</label>
                    <input type="file" class="form-control form-group" name="about-image">
                    <input type="hidden" value="<?php echo $get_about_brdimg; ?>" name="about-image-chking">
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<!-- End About Section -->
<!-- Start OUR HERO'S Section -->
<div class="width-100">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Our Resources Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">
            
            <div class="col-md-12">

                <div class="form-group">

                    <label>Title</label>

                        <input type="text" class="form-control form-group" value="<?php echo $get_about_restitle; ?>" name="obut-res-title" placeholder="Title">
                    </div>
                </div>

            <div class="col-md-12">

            <div class="form-group">

                <label>Image</label>

                <div class="row">
                  <div class="col-md-2">
                    <img src="<?php echo $url; ?>/images/<?php echo $get_about_reseimg; ?>" class="img-responsive">
                  </div>
                  <div class="col-md-10">
                    <label>Image Dimensions (370x365px)</label>
                    <input type="file" class="form-control form-group" name="obut-res-img">
                    <input type="hidden" value="<?php echo $get_about_reseimg; ?>" name="obut-res-imgchking">
                  </div>
                </div>
            </div>
          </div>

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Content</label>

                    <textarea class="textarea" name="obut-res-content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $get_about_resecont; ?></textarea>

                </div>

            </div>

            </div>

        </div>

    </div>

  </div>
  
  <div class="width-100">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Our Vision Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">
            
            <div class="col-md-12">

                <div class="form-group">

                    <label>Title</label>

                        <input type="text" class="form-control form-group" value="<?php echo $get_about_vis_title; ?>" name="abut-visn-title" placeholder="Title">
                    </div>
                </div>

            <div class="col-md-12">

            <div class="form-group">

                <label>Image</label>

                <div class="row">
                  <div class="col-md-2">
                    <img src="<?php echo $url; ?>/images/<?php echo $get_about_vis_img; ?>" class="img-responsive">
                  </div>
                  <div class="col-md-10">
                    <label>Image Dimensions (370x365px)</label>
                    <input type="file" class="form-control form-group" name="abut-visn-img">
                    <input type="hidden" value="<?php echo $get_about_vis_img; ?>" name="abut-visn-imgchking">
                  </div>
                </div>
            </div>
          </div>

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Content</label>

                    <textarea class="textarea" name="abut-visn-contetn" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $get_about_vis_cont; ?></textarea>

                </div>

            </div>

            </div>

        </div>

    </div>

  </div>
  
  <div class="width-100">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Our Mission Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">
            
            <div class="col-md-12">

                <div class="form-group">

                    <label>Title</label>

                        <input type="text" class="form-control form-group" value="<?php echo $get_about_mis_title; ?>" name="abut-miss-title" placeholder="Title">
                    </div>
                </div>

            <div class="col-md-12">

            <div class="form-group">

                <label>Image</label>

                <div class="row">
                  <div class="col-md-2">
                    <img src="<?php echo $url; ?>/images/<?php echo $get_about_mission_img; ?>" class="img-responsive">
                  </div>
                  <div class="col-md-10">
                    <label>Image Dimensions (370x365px)</label>
                    <input type="file" class="form-control form-group" name="abut-miss-img">
                    <input type="hidden" value="<?php echo $get_about_mission_img; ?>" name="abut-miss-imgchking">
                  </div>
                </div>
            </div>
          </div>

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Content</label>

                    <textarea class="textarea" name="abut-miss-contetn" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $get_about_mission_cont; ?></textarea>

                </div>

            </div>

            </div>

        </div>

    </div>

  </div>
<!-- End OUR HERO'S Section -->
<!-- Start Mission Section -->
<div class="width-100">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Number Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">
            <div class="col-md-12">
              <div class="numbeox">
                <div class="mb-3">
                  <input type="text" name="updatenumbrtitle" placeholder="Title" class="form-control" value="<?php echo $get_about_numbertitle; ?>">
                </div>
              </div>
            </div>
            <div class="col-md-12">
                <div class="numbeox">
                    <div class="mb-3">

                        <?php
                          $data_decode = json_decode($get_about_number);
                          $date_vale_one = explode(',', $data_decode[0]);
                          $date_vale_two = explode(',', $data_decode[1]);
                          $marrag_array = array_combine($date_vale_one,$date_vale_two);
                          foreach ($marrag_array as $key_vale => $value) {
                            if($key_vale != ""){
                              echo "<div class='border_bottom'>";
                              echo '<input type="text" class="form-control form-group" value="'.$key_vale.'" name="about-number-val[]" placeholder="Number">';
                            }
                            if($value != ""){
                              echo '<input type="text" class="form-control form-group" value="'.$value.'" name="about-number-title[]" placeholder="Title">';
                              echo "</div>";
                            }
                          }
                        ?>
                    </div>
                </div>
                <div class="mb-3">
                    <p class="add_morenumber">Add New Row</p>
                </div>

            </div>

        </div>

    </div>

  </div>

</div>
<!-- End OUR Mission Section -->
<div class="width-100">

  <div class="form-group">

    <input type="submit" value="Update" name="edit-about" class="btn btn-success float-left">

  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".add_morenumber").click(function(){
      $(".numbeox").append('<div class="mb-3"><input type="text" class="form-control form-group" value="" name="about-number-val[]" placeholder="Number"><input type="text" class="form-control form-group" value="" name="about-number-title[]" placeholder="Title"></div>');
    });
  });
</script>