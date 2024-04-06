<?php
$home_pagedata = GetHomePageDataval(0,$_GET['ut'],$_GET['page-id']);
foreach($home_pagedata as $valuehome){
  $product_cagoy = explode(',', $valuehome['hom_latst_catagoy']);
  $arrayadsval = explode(',', $valuehome['hom_adsdata']);
}
?>
<!-- Start About Section -->
<div class="col-md-12 d-xl-none">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Offers Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">

          <div class="col-md-12">
              <div class="form-group">
                <label>Select Promo Offers</label>
                <div class="select2-purple">
                  <select class="select2" multiple="multiple" name="home_adssect[]" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php
                      foreach(GetAdsSectionVal() as $valeadsvale){
                        if(in_array($valeadsvale['id'], $arrayadsval)){
                          echo "<option value='".$valeadsvale['id']."' selected>".$valeadsvale['adsimg_name']."</option>";
                        }else{
                          echo "<option value='".$valeadsvale['id']."'>".$valeadsvale['adsimg_name']."</option>";
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <!-- /.form-group -->
            </div>

        </div>

    </div>

  </div>

</div>
<!-- End About Section -->
<!-- Start OUR HERO'S Section -->
<div class="col-md-12">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Latest Addition Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">
            <?php
            $homelatest_addition = json_decode($valuehome['hom_latstadsion']);
            ?>
            <div class="col-md-12">

                <div class="mb-3">

                    <label>Title</label>

                    <input name="home_addi_title" placeholder="Place some text here" value="<?php echo $homelatest_addition[0]; ?>" class="form-control">

                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">

                    <label>Image One</label>

                    <div class="row">
                      <div class="col-md-2">
                        <img src="<?php echo $url; ?>/images/<?php echo $homelatest_addition[1]; ?>" name="home_addi_image" class="img-responsive">
                      </div>
                      <div class="col-md-10">
                        <label>Image Dimensions (W-420 x H-566)px</label>
                        <input type="file" class="form-control form-group" name="hero-uper-img1">
                        <input type="hidden" value="<?php echo $homelatest_addition[1]; ?>" name="home_addi_image-chking">
                      </div>
                    </div>
                </div>

            </div>

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Left Content</label>

                    <textarea class="textarea" name="home_addi_leftcont" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $homelatest_addition[2]; ?></textarea>

                </div>

            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Select Category</label>
                <div class="select2-purple">
                  <select class="select2" multiple="multiple" name="home_addi_catgy[]" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php
                      $get_alert_data = getCatagrioyesDataVal();
                      foreach ($get_alert_data as $alertvalue) {
                        if(in_array($alertvalue['id'], $product_cagoy)){
                          echo "<option value='".$alertvalue['id']."' selected>".$alertvalue['prd_cat_name']."</option>";
                        }else{
                          echo "<option value='".$alertvalue['id']."'>".$alertvalue['prd_cat_name']."</option>";
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <!-- /.form-group -->
            </div>

            </div>

        </div>

    </div>
  </div>
<!-- End OUR HERO'S Section -->
<!-- Start Mission Section -->
<div class="col-md-12">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Shop Quality Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Title</label>

                    <textarea class="textarea" name="home_shopqut_title" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $valuehome['hom_showimage']; ?></textarea>

                </div>

            </div>

        </div>

    </div>

  </div>

</div>
<!-- End OUR Mission Section -->
<!-- Start OUR HEALER'S Section -->
<div class="col-md-12">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        New Arrivals Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Title</label>

                    <textarea class="textarea" name="home_arrivl_title" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $valuehome['hom_newarvil']; ?></textarea>

                </div>

            </div>
            <?php
            $arrbtn = json_decode($valuehome['hom_newarvil_produt']);
            ?>
            <div class="col-md-4">

                <div class="mb-3">

                    <label>Button Name</label>

                    <input type="text" class="form-control form-group" value="<?php echo $arrbtn[0]; ?>" name="home_arrivl_btname" placeholder="Title">

                </div>

            </div>
            <div class="col-md-8">

                <div class="mb-3">

                    <label>Button Url</label>

                    <input type="text" class="form-control form-group" value="<?php echo $arrbtn[1]; ?>" name="home_arrivl_btnurl" placeholder="Title">

                </div>

            </div>
        </div>

    </div>

  </div>

</div>
<!-- End OUR HEALER'S Section -->
<div class="col-md-12">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Subscribe Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Title</label>

                    <textarea class="textarea" name="home_subtn_title" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $valuehome['hom_subrtion']; ?></textarea>

                </div>

            </div>
        </div>

    </div>

  </div>

</div>
<div class="col-md-12">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Women Collection Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Title</label>

                    <textarea class="textarea" name="home_wocalt_title" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $valuehome['hom_womancal']; ?></textarea>

                </div>

            </div>
            <?php
            $womanbtn = json_decode($valuehome['hom_woman_catgy']);
            ?>
            <div class="col-md-4">

                <div class="mb-3">

                    <label>Button Name</label>

                    <input type="text" class="form-control form-group" value="<?php echo $womanbtn[0]; ?>" name="home_wocalt_btnname" placeholder="Title">

                </div>

            </div>
            <div class="col-md-8">

                <div class="mb-3">

                    <label>Button Url</label>

                    <input type="text" class="form-control form-group" value="<?php echo $womanbtn[1]; ?>" name="home_wocalt_btnurl" placeholder="Title">

                </div>

            </div>
        </div>

    </div>

  </div>

</div>

<div class="col-md-12">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Men Collection Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Title</label>

                    <textarea class="textarea" name="home_mencalt_title" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $valuehome['hom_mencal']; ?></textarea>

                </div>

            </div>
            <?php
            $menbtnval = json_decode($valuehome['hom_man_catgroy']);
            ?>
            <div class="col-md-4">

                <div class="mb-3">

                    <label>Button Name</label>

                    <input type="text" class="form-control form-group" value="<?php echo $menbtnval[0]; ?>" name="home_mencalt_btnname" placeholder="Title">

                </div>

            </div>
            <div class="col-md-8">

                <div class="mb-3">

                    <label>Button Url</label>

                    <input type="text" class="form-control form-group" value="<?php echo $menbtnval[1]; ?>" name="home_mencalt_btnurl" placeholder="Title">

                </div>

            </div>
        </div>

    </div>

  </div>

</div>

<div class="col-md-12">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Kids Collection Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Title</label>

                    <textarea class="textarea" name="home_kidcalt_title" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $valuehome['hom_kidscatgy']; ?></textarea>

                </div>

            </div>
            <?php
            $men_btnval = json_decode($valuehome['hom_kids_catgoy']);
            ?>
            <div class="col-md-4">

                <div class="mb-3">

                    <label>Button Name</label>

                    <input type="text" class="form-control form-group" value="<?php echo $men_btnval[0]; ?>" name="home_kidcalt_btnname" placeholder="Title">

                </div>

            </div>
            <div class="col-md-8">

                <div class="mb-3">

                    <label>Button Url</label>

                    <input type="text" class="form-control form-group" value="<?php echo $men_btnval[1]; ?>" name="home_kidcalt_btnurl" placeholder="Title">

                </div>

            </div>
        </div>

    </div>

  </div>

</div>

<div class="col-md-12">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Art Collection Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Title</label>

                    <textarea class="textarea" name="home_artcalt_title" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $valuehome['hom_artscat']; ?></textarea>

                </div>

            </div>
            <?php
            $artsbtn = json_decode($valuehome['hom_arts_catgoy']);
            ?>
            <div class="col-md-4">

                <div class="mb-3">

                    <label>Button Name</label>

                    <input type="text" class="form-control form-group" value="<?php echo $artsbtn[0]; ?>" name="home_artcalt_btnname" placeholder="Title">

                </div>

            </div>
            <div class="col-md-8">

                <div class="mb-3">

                    <label>Button Url</label>

                    <input type="text" class="form-control form-group" value="<?php echo $artsbtn[1]; ?>" name="home_artcalt_btnurl" placeholder="Title">

                </div>

            </div>
        </div>

    </div>

  </div>

</div>

<div class="col-md-12">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Home Collection Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Title</label>

                    <textarea class="textarea" name="home_homcalt_title" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $valuehome['hom_homelingcat']; ?></textarea>

                </div>

            </div>
            <?php
            $homecalbtn = json_decode($valuehome['hom_homeliv_cat']);
            ?>
            <div class="col-md-4">

                <div class="mb-3">

                    <label>Button Name</label>

                    <input type="text" class="form-control form-group" value="<?php echo $homecalbtn[0]; ?>" name="home_homcalt_btnname" placeholder="Title">

                </div>

            </div>
            <div class="col-md-8">

                <div class="mb-3">

                    <label>Button Url</label>

                    <input type="text" class="form-control form-group" value="<?php echo $homecalbtn[1]; ?>" name="home_homcalt_btnurl" placeholder="Title">

                </div>

            </div>
        </div>

    </div>

  </div>

</div>

<div class="col-md-12">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Gll News Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Title</label>

                    <textarea class="textarea" name="home_newgll_title" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $valuehome['hom_gllnews_title']; ?></textarea>

                </div>

            </div>
            <?php
            $gllnewsbtn = json_decode($valuehome['hom_gllnews_catgy']);
            ?>
            <div class="col-md-4">

                <div class="mb-3">

                    <label>Button Name</label>

                    <input type="text" class="form-control form-group" value="<?php echo $gllnewsbtn[0]; ?>" name="home_newgll_btnname" placeholder="Title">

                </div>

            </div>
            <div class="col-md-8">

                <div class="mb-3">

                    <label>Button Url</label>

                    <input type="text" class="form-control form-group" value="<?php echo $gllnewsbtn[1]; ?>" name="home_newgll_btnurl" placeholder="Title">

                </div>

            </div>
        </div>

    </div>

  </div>

</div>

<div class="col-md-12">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Gll Tv Section

      </h3>

    </div>

    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Title</label>

                    <textarea class="textarea" name="home_tvgll_title" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $valuehome['hom_gll_tv_title']; ?></textarea>

                </div>

            </div>
            <?php
            $glltvbtn = json_decode($valuehome['hom_gll_tv_catgy']);
            ?>
            <div class="col-md-4">

                <div class="mb-3">

                    <label>Button Name</label>

                    <input type="text" class="form-control form-group" value="<?php echo $glltvbtn[0]; ?>" name="home_tvgll_btnname" placeholder="Title">

                </div>

            </div>
            <div class="col-md-8">

                <div class="mb-3">

                    <label>Button Url</label>

                    <input type="text" class="form-control form-group" value="<?php echo $glltvbtn[1]; ?>" name="home_tvgll_btnurl" placeholder="Title">

                </div>

            </div>
        </div>

    </div>

  </div>

</div>


<div class="col-md-12">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Gallery LaLa Section

      </h3>

    </div>
<?php
$allerysection = json_decode($valuehome['hom_gallery_image']);
?>
    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">


            <div class="col-md-12">

                <div class="form-group">

                    <label>Title Image</label>

                    <div class="row">
                      <div class="col-md-2">
                        <img src="<?php echo $url; ?>/images/<?php echo $allerysection[0]; ?>" class="img-responsive">
                      </div>
                      <div class="col-md-10">
                        <label>Image Dimensions (W-420 x H-566)px</label>
                        <input type="file" class="form-control form-group" name="home_gllsect_imag">
                        <input type="hidden" value="<?php echo $allerysection[0]; ?>" name="home_gllsect_imag_chking">
                      </div>
                    </div>
                </div>

            </div>

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Content</label>

                    <textarea class="textarea" name="home_gllsect_contetn" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $valuehome['hom_gallerytext']; ?></textarea>

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label>Image</label>

                    <div class="row">
                      <div class="col-md-2">
                        <img src="<?php echo $url; ?>/images/<?php echo $allerysection[1]; ?>" class="img-responsive">
                      </div>
                      <div class="col-md-10">
                        <label>Image Dimensions (W-420 x H-566)px</label>
                        <input type="file" class="form-control form-group" name="home_gllsect_imag2">
                        <input type="hidden" value="<?php echo $allerysection[1]; ?>" name="home_gllsect_imag2chking">
                      </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

  </div>

</div>

<div class="col-md-12">

  <div class="card card-outline card-info">

    <div class="card-header">

      <h3 class="card-title">

        Instagram Section

      </h3>

    </div>
<?php
$instagnbtn = json_decode($valuehome['hom_instastatus']);
?>
    <!-- /.card-header -->
  <div class="card-body pad">

        <div class="row">

            <div class="col-md-12">

                <div class="mb-3">

                    <label>Title</label>

                    <textarea class="textarea" name="home_instgm_title" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $instagnbtn[0]; ?></textarea>

                </div>

            </div>
            <div class="col-md-12">

                <div class="mb-3">

                    <label>Show Number of Post</label>

                    <input type="number" class="form-control form-group" value="<?php echo $instagnbtn[1]; ?>" name="home_instgm_noofpost" placeholder="Title">

                </div>

            </div>
        </div>

    </div>

  </div>
    <?php $pageautoid = "home-page"; ?>
    <?php include_once("template/seo-page.php"); ?>

</div>

<div class="col-md-12">

  <div class="form-group">

    <input type="submit" value="Update" name="home_updatepage" class="btn btn-success float-left">

  </div>
</div>