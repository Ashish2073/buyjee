<?php include_once('dis-setting/connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />

    <?php
      foreach(GLLHederGetsection() as $favicon){
        if($favicon['head_favicon'] == "" && $favicon['head_favicon'] == "0"){}else{
    ?>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="<?php echo $url; ?>/images/<?php echo $favicon['head_favicon']; ?>" />
    <?php
        }
      }
    ?>
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo $url; ?>/assetsnew/css/plugins/animate.min.css<?php echo $varsetval; ?>">
    <link rel="stylesheet" href="<?php echo $url; ?>/assetsnew/css/main.css<?php echo $varsetval; ?>">