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
</style>
<?php
if(isset($_GET['action'])){
  if($_GET['action'] == "addnew"){
    include_once("template/add-new-seo-user.php");
  }
}
if(isset($_GET['edit'])){
    include_once("template/edit-seo-user.php");
}
if(isset($_GET['delete']) && isset($_GET['id'])){
  if($_GET['delete'] == "action"){
    $deletablevale = "id='".$_GET['id']."' AND user_type='seouser'";
    $delete_vale = DeleteALlDataVlae('userlogntable',$deletablevale);
    if($delete_vale == true){
        echo "<script>alert('Successfully Deleted.');window.location.href='$url/admin-manager/seo-login/';</script>";
    }else{
      echo "<script>alert('Please Try Again.');window.location.href='$url/admin-manager/seo-login/';</script>"; 
    }
  }
}
?>

 <?php

include_once('admin_dist/includes/footer.php');

?>