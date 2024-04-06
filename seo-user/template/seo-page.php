<?php
$get_pagevale = $pageautoid;
foreach(get_seotitlekeywords($get_pagevale) as $valeuset){
  $set_vale_title = $valeuset['seo_title'];
  $set_vale_decrtn = $valeuset['seo_desrpt'];
  $set_vale_keyword = $valeuset['seo_keyword'];
  $set_vale_indeing = $valeuset['seo_indexing'];
  $set_vale_img = $valeuset['seo_imageval'];
}
?>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">SEO</h3>
  </div>
<div class="card-body">
  <div class="form-group">
    <label for="seotitle">Title</label>
    <input type="text" class="form-control" id="seotitle" value="<?php echo $set_vale_title; ?>" placeholder="Title" name="seotitle">
    <?php if($set_vale_title !== ""){ ?>
      <input type="hidden" name="pageseochk" value="<?php echo $valeuset['seo_autovale']; ?>">
    <?php }else{ ?>
      <input type="hidden" name="pageseochk" value="new">
    <?php } ?>
  </div>
  <div class="form-group">
    <label for="seodescription">Description</label>
    <input type="text" class="form-control" id="seodescription" name="seodescription" placeholder="Description" value="<?php echo $set_vale_decrtn; ?>">
  </div>
  <div class="form-group">
    <label for="seokeywords">Keywords</label>
    <input type="text" class="form-control" id="seokeywords" name="seokeywords" placeholder="Keywords" value="<?php echo $set_vale_keyword; ?>">
  </div>
  <div class="form-group">
    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
      <?php
        if($set_vale_indeing == "Yes"){
      ?>
        <input type="checkbox" class="custom-control-input" value="Yes" name="setindeseo" checked id="seoindeinfvale">
      <?php
        }elseif($set_vale_indeing == "No"){
      ?>
        <input type="checkbox" class="custom-control-input" name="setindeseo" value="Yes" id="seoindeinfvale">
      <?php
        }else{
      ?>
        <input type="checkbox" class="custom-control-input" name="setindeseo" checked value="Yes" id="seoindeinfvale">
      <?php
        }
      ?>
      <label class="custom-control-label" for="seoindeinfvale">Indexing</label>
    </div>
  </div>
  <div class="form-group">
    <label for="multisinlpvtwo">Image</label>
    <?php if($set_vale_img == ""){
    ?>
    <div class="col-md-4 form-group" id="singleimagepvtwo">
    </div>
    <?php
    }else{?>
      <div class="col-md-4 form-group" id="singleimagepvtwo">
        <img src="<?php echo $url; ?>/images/<?php echo $set_vale_img; ?>" class="img-responsive">
      </div>
    <?php } ?>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" class="custom-file-input" name="seimgvale" id="multisinlpvtwo" onchange="return singlfileprivewiltwo()">
        <input type="hidden" name="seimgvalechking" value="<?php echo $valeuset['seo_imageval']; ?>">
        <label class="custom-file-label" for="multisinlpvtwo">Choose file</label>
      </div>
    </div>
  </div>
</div>
</div>