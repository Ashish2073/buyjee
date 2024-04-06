<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

?>
<style type="text/css">
  img.img-responsive {
    width: 100% !important;
}
p.form-group.p-tag {
    width: 100%;
}

.nav-wrap {
  width: 100%;
  margin: 1em auto 0;
}
@media (min-width: 992px) {
  .nav-wrap {
    
  }
}

[hidden] {
  display: none;
  visibility: hidden;
}

.acnav {
  width: 100%;
}
.acnav__list {
  padding: 0;
  margin: 0;
  list-style: none;
}
.acnav__list--level1 {
  border: 1px solid #015a7a;
}
.has-children > .acnav__label::before {
  content: "\f054";
  display: inline-block;
  font: normal normal normal 14px/1 FontAwesome;
  font-size: inherit;
  text-rendering: auto;
  margin-right: 1em;
  transition: transform 0.3s;
}

.has-children .newset > .acnav__label::before {
  content: "\f142";
  display: inline-block;
  font: normal normal normal 14px/1 FontAwesome;
  font-size: inherit;
  text-rendering: auto;
  margin-right: 1em;
  transition: transform 0.3s;
}
.has-children.is-open > .acnav__label::before {
  transform: rotate(90deg);
}
.acnav__link, .acnav__label {
  display: block;
  font-size: 1rem;
  padding: 1em;
  margin: 0;
  cursor: pointer;
  color: #015a7a;
  background: #efefef;
  box-shadow: inset 0 -1px #03526e;
  transition: color 0.25s ease-in, background-color 0.25s ease-in;
}
.acnav__link:focus, .acnav__link:hover, .acnav__label:focus, .acnav__label:hover {
  color: #015a7a;
  background: #dcdcdc;
}
.acnav__link--level2, .acnav__label--level2 {
  padding-left: 3em;
  background: #2d6b7e;
}
.acnav__link--level2:focus, .acnav__link--level2:hover, .acnav__label--level2:focus, .acnav__label--level2:hover {
  background: #296272;
}
.acnav__link--level3, .acnav__label--level3 {
  padding-left: 5em;
  background: #296272;
}
.acnav__link--level3:focus, .acnav__link--level3:hover, .acnav__label--level3:focus, .acnav__label--level3:hover {
  background: #255867;
}
.acnav__link--level4, .acnav__label--level4 {
  padding-left: 7em;
  background: #255867;
}
.acnav__link--level4:focus, .acnav__link--level4:hover, .acnav__label--level4:focus, .acnav__label--level4:hover {
  background: #214f5c;
}
.acnav__list--level2, .acnav__list--level3, .acnav__list--level4 {
  display: none;
}
.is-open > .acnav__list--level2, .is-open > .acnav__list--level3, .is-open > .acnav__list--level4 {
  display: block;
}

.acnav__label .righticon{float: right; margin-top: -4px;}
.acnav__label .righticon a{display:inline-block; vertical-align: middle; background: #fff; color: #015a7a; font-size: 15px; width: 30px; height: 30px; border-radius: 50px; line-height: 30px; border: 1px solid #015a7a; text-align: center;}
li.has-children.newset {
    margin-left: 30px;
}
a.lossbg {
    background: #e82727 !important;
    color: #FFF !important;
    border: 1px solid #FFF !important;
}
</style>

<?php
if(isset($_GET['delete']) && isset($_GET['id']) && isset($_GET['seoid'])){
    $deletablevale = "id='".$_GET['id']."'";
    $delete_vale = DeleteALlDataVlae("product_categories",$deletablevale);
    $delete_seotitle = "seo_autovale='".$_GET['seoid']."'";
    $delete_seovale = DeleteALlDataVlae("seotable",$delete_seotitle);
    if($delete_seovale == true){
      echo "<script>alert('Successfully Deleted.');window.location.href='$url/seo-user/category/';</script>";
    }else{
      echo "<script>alert('Please Try Again.');</script>"; 
    }
}

if(isset($_GET['hideid']) && isset($_GET['hide'])){
  $updateseroid = "id='".$_GET['hideid']."'";
  $update_datafiled = "prd_cat_hidevale='".$_GET['hide']."'";
  $updateset = UpdateAllDataFileds("product_categories",$update_datafiled,$updateseroid);
  if($updateset == true){
      echo "<script>alert('Successfully Updated.');window.location.href='$url/seo-user/category/';</script>";
    }else{
      echo "<script>alert('Please Try Again.');</script>"; 
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

            <h1>Categories</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/seo-user/">Home</a></li>

              <li class="breadcrumb-item active">Categories</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">

        <!-- left box -->
        <!-- right Box -->
        <div class="col-md-12">

          <div class="card card-primary">

            <div class="card-header">

              <h3 class="card-title">All Categories</h3>

                <a href="<?php echo $url; ?>/seo-user/addnew-category/" class="btn btn-sm btn-success float-right">Add New Category</a>

            </div>

            <div class="card-body">

              <section class="nav-wrap">
  
              <!-- start accordion nav block -->
              <nav class="acnav" role="navigation">
                <?php echo categoryTreeInSEOAdmin(); ?>
              </nav>
            </section>
            </div>

            <!-- /.card-body -->

          </div>

          <!-- /.card -->

        </div>
        <!-- right Box -->

      </div>

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

</div>

<!-- ./wrapper -->

 <?php

include_once('admin_dist/includes/footer.php');

?>
<script type="text/javascript">
  $(document).ready(function(){
  $('.acnav__label').click(function () {
  var label = $(this);
  var parent = label.parent('.has-children');
  var list = label.siblings('.acnav__list');

  if ( parent.hasClass('is-open') ) {
    list.slideUp('fast');
    parent.removeClass('is-open');
  }
  else {
    list.slideDown('fast');
    parent.addClass('is-open');
  }
});
  
});
</script>