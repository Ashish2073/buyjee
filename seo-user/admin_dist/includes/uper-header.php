<?php include_once('session-chaking.php'); ?>
<?php
foreach(GetLoginUserDetails($_SESSION['seouserloginsection'],"seouser") as $seouser){
  $fnname = $seouser['user_first_name'];
  $lnname = $seouser['user_lastname'];
  $emailid = $seouser['user_email'];
  $Userid = $seouser['user_auto'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php echo $fnname; ?> <?php echo $lnname; ?> | Gallery La La</title>
  <link rel="stylesheet" href="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>/seo-user/admin_dist/includes/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/toastr/toastr.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Quicksand&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Boogaloo&family=Charm:wght@700&family=Molengo&display=swap" rel="stylesheet">